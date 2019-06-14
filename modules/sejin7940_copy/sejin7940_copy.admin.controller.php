<?php
	/**
	 * @class  sejin7940_copyAdminController
	 * @author sejin7940 (sejin7940@nate.com)
	 * @brief  sejin7940_copy 모듈의 AdminController class
	 **/

	class sejin7940_copyAdminController extends sejin7940_copy {

		/**
		 * @brief Initialization
		 **/
		function init() {
			
		}


        /**
         * @brief 관리자 - 설정 저장
         **/
        function procSejin7940_copyAdminConfig() {
            $config = Context::getRequestVars();
            $oModuleController = &getController('module');
            $oModuleController->insertModuleConfig('sejin7940_copy', $config);

            $this->setMessage('success_saved');
        }



		// 게시판 설정 복사 실행 단계 
		function procSejin7940_copyAdminCopy() {

            $obj = Context::getRequestVars();

			$test = $this->procSejin7940_copyCopy($obj);
			if(count($errorLog) > 0)
			{
				$message = implode('\n', $errorLog);
				$this->setMessage($message);
			}
			else
			{
				$mseeage = $lang->success_registed;
            	$this->setMessage('success_registed');
			}

			if(!in_array(Context::getRequestMethod(),array('XMLRPC','JSON'))) {

				$returnUrl =  getNotEncodedUrl('', 'module', 'admin', 'act', 'dispSejin7940_copyAdminCopy','target_module',$obj->target_module,'target_module2',$obj->target_module2,'copy_all',$obj->copy_all,'copy_setting',$obj->copy_setting,'copy_category',$obj->copy_category,'copy_extra_vars',$obj->copy_extra_vars,'copy_part',$obj->copy_part,'copy_skin',$obj->copy_skin,'copy_mskin',$obj->copy_mskin,'copy_grant',$obj->copy_grant,'copy_manager',$obj->copy_manager);


				header('location:'.$returnUrl);

				return;
			}

		}

		
		// 실제 게시판 설정 복사  (다른 모듈에서도 사용할 수 있도록 분리)
		function procSejin7940_copyCopy($obj) {

            $oModuleModel = &getModel('module');
            $oModuleController = &getController('module');

			
			// 기준 모듈 
			$module_srl = $obj->target_module;  // 기준 모듈의 module_srl 값 - target_module
			if(!$module_srl && $obj->target_mid) {  // mid 로도 복사 가능하게 - 기준 모듈 mid - target_mid
				$oModuleModel = &getModel('module');
				$module_info = $oModuleModel -> getModuleInfoByMid($obj->target_mid, $obj->site_srl);
				$module_srl = $module_info->module_srl;
			}
			else {
	            $module_info = $oModuleModel->getModuleInfoByModuleSrl($module_srl);
			}


			// 복사할 대상
			$module_srl2 = $obj->target_module2;  // 복사대상 module_srl 값 - target_module2
			if(!$module_srl2 && $obj->target_mid2) { // mid 로도 복사 가능하게 - 복사대상 mid - target_mid2
				$oModuleModel = &getModel('module');
				$module_info2 = $oModuleModel -> getModuleInfoByMid($obj->target_mid2, $obj->site_srl2);
				$module_srl2 = $module_info2->module_srl;
			}
			if(!$module_srl2) return new Object(-1,'복사할 대상이 없습니다');

			$module = $module_info->module;

			$module_part_config = $oModuleModel->getModulePartConfig($module, $module_srl);  // 목록설정

			$admin_id = $oModuleModel->getAdminId($module_srl);  // 게시판 관리자들

			// 원본 권한 추출
            $module_args->module_srl = $module_srl;
            $output = executeQueryArray('module.getModuleGrants', $module_args);
            $grant = array();
            if($output->data) {
                foreach($output->data as $key => $val) $grant[$val->name][] = $val->group_srl;
            }


			// 원본 게시판 설정 추출
			$extra_args->module_srl = $module_srl;
			$extra_output = executeQueryArray('module.getModuleExtraVars', $extra_args);
			if ($extra_output->toBool() && is_array($extra_output->data)){
				foreach($extra_output->data as $info){
					$extra_vars->{$info->name} = $info->value;
				}
			}

			// 원본 스킨 정보 추출
			$tmpModuleSkinVars = $oModuleModel->getModuleSkinVars($module_srl);
			if($tmpModuleSkinVars)
			{
				foreach($tmpModuleSkinVars AS $key=>$value)
				{
					$moduleSkinVars->{$key} = $value->value;
				}
			}

			// 원본 모바일 스킨 정보 추출
			$tmpModuleMobileSkinVars = $oModuleModel->getModuleMobileSkinVars($module_srl);
			if($tmpModuleMobileSkinVars)
			{
				foreach($tmpModuleMobileSkinVars AS $key=>$value)
				{
					$moduleMobileSkinVars->{$key} = $value->value;
				}
			}

            $oDB = &DB::getInstance();
            $oDB->begin();

			$triggerObj->originModuleSrl = $module_srl;
			$triggerObj->moduleSrlList = array();

			$errorLog = array();

			$db_info = Context::getDBInfo();
			$prefix = $db_info->master_db["db_table_prefix"];
			$oDB = &DB::getInstance();

			if($module_srl2)	{

				$module_srl2_array = explode(',',$module_srl2);
				for($m=0;$m<count($module_srl2_array);$m++) {

					// 이동할 모듈 번호 설정
					$module_srl2 = $module_srl2_array[$m]; 

					array_push($triggerObj->moduleSrlList, $module_srl2);

		            $module_info2 = $oModuleModel->getModuleInfoByModuleSrl($module_srl2);

					$module_info->mid = $module_info2->mid;
					$module_info->browser_title = $module_info2->browser_title;
					$module_info->module_srl = $module_info2->module_srl;
					$module_info->site_srl = $module_info2->site_srl;  // 카페 등의 경우 대비해 추가

//					$module_info->is_skin_fix = 'Y';
					if($obj->copy_all=='Y' || $obj->copy_setting=='Y') {

						executeQuery('module.updateModule', $module_info);
						if ($extra_vars) {
							$oModuleController->insertModuleExtraVars($module_srl2, $extra_vars);   // 목록설정을 비롯해 기본설정 복사
						}
						if( $module_part_config ) {
							$oModuleController->insertModulePartConfig($module, $module_srl2, $module_part_config);   
						}
					}
					if($obj->copy_all=='Y' || $obj->copy_part=='Y') {
						$query_part = "select * FROM ".$prefix."module_part_config WHERE module!='".$module."' AND module_srl=".$module_srl;
						$query_part=$oDB->_query($query_part); 
						$result_part = $oDB->_fetch($query_part);

						if(!is_array($result_part)) {$result_part = array($result_part);}
						foreach($result_part as $key_result=>$val_result) {
							${'module_part_config_'.$val_result->module} = $oModuleModel->getModulePartConfig($val_result->module, $module_srl);  // 추가설정
							$oModuleController->insertModulePartConfig($val_result->module, $module_srl2, ${'module_part_config_'.$val_result->module});   // 추가설정 복사
						}

					}
					if(($obj->copy_all=='Y' || $obj->copy_extra_vars=='Y')) {
						$oDocumentController = &getController('document');
						$oDocumentController->triggerCopyModuleExtraKeys($triggerObj);

					}

					if(($obj->copy_all=='Y' || $obj->copy_manager=='Y') && $admin_id) {
						foreach($admin_id as $key_admin=>$val_admin) {
							$oMemberModel = &getModel('member');
							$admin_info = $oMemberModel->getMemberInfoByMemberSrl($val_admin->member_srl);
							$oModuleController->insertAdminId($module_srl2, $admin_info->user_id);
						}
					}
					
					if($obj->copy_all=='Y' || $obj->copy_category=='Y') {
						$this->copyModuleCategory($triggerObj->originModuleSrl, $module_srl2);
						$oDocumentController = &getController('document');
						$oDocumentController->makeCategoryFile($module_srl2);  // 캐시파일 재생성 없이도 분류가 바로 생성되도록 보완
					}
					if(($obj->copy_all=='Y' || $obj->copy_grant=='Y') && count($grant)) $oModuleController->insertModuleGrants($module_srl2, $grant);
					if(($obj->copy_all=='Y' || $obj->copy_skin=='Y') && $moduleSkinVars) $oModuleController->insertModuleSkinVars($module_srl2, $moduleSkinVars);  // 여기서  _insertModuleSkinVars  의 query 가 등록 안 되는 서버도 있음 
					if(($obj->copy_all=='Y' || $obj->copy_mskin=='Y') && $moduleMobileSkinVars) $oModuleController->insertModuleMobileSkinVars($module_srl2, $moduleMobileSkinVars);

				}
            }
            $oDB->commit();

		}





		// 카테고리 복사 기능 - 카테고리 이름이 같은 경우는 복사 안 되고 없는 카테고리만 복사되도록 보완
		function copyModuleCategory($source_module_srl, $copy_module_srl) {

			$oDocumentModel = &getModel('document');
			$oDocumentController = &getController('document');

			$category_title = Array(); 
			$new_category_list = $oDocumentModel->getCategoryList($copy_module_srl); 
			foreach($new_category_list as $val) {
				$args_info->category_srl = $val->category_srl;
				$output_info = executeQuery('document.getCategory', $args_info);
				$category_info = $output_info->data;

				if(!in_array($category_info->title,$category_title)) $category_title[] = $category_info->title;

			}
/*
			if(count($new_category_list)) {
				return new Object(-1,'미리 설정된 카테고리가 존재하고 있어 복사가 불가능합니다. 복사를 워하시면 카테고리를 전부 지워주세요');
			}
*/
			$category_list = $oDocumentModel->getCategoryList($source_module_srl); 

			$category_copy = Array(); 
			$category_copy[0] = '0';

			foreach($category_list as $val) {
				if(!array_key_exists($val->category_srl, $category_copy)) {
					$category_copy[$val->category_srl] = getNextSequence();
				}
			}

			foreach($category_list as $val) {

				$args_info->category_srl = $val->category_srl;
				$output_info = executeQuery('document.getCategory', $args_info);
				$category_info = $output_info->data;

				if(!in_array($category_info->title,$category_title)) {
					$obj_copy->category_srl = $category_copy[$val->category_srl];
					$obj_copy->module_srl = $copy_module_srl;
					$obj_copy->title = $category_info->title;
					$obj_copy->description = $val->description;
					$obj_copy->expand = $category_info->expand;
					$obj_copy->parent_srl = $category_copy[$val->parent_srl];
					$obj_copy->group_srls = $category_info->group_srls;
					$obj_copy->list_order = $category_copy[$val->list_order];
					$obj_copy->color = $category_info->color;
				
					$output = executeQuery('document.insertCategory', $obj_copy);
				}
			}
		}



		
        function procSejin7940_copyAdminCopyBoard($obj) {

		}


	}
?>