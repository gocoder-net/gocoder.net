<?php
	/**
	 * @class  sejin7940_copy
	 * @author sejin7940 (sejin7940@nate.com)
	 * @brief  sejin7940_copy 모듈의 상위 class
	 **/

	class sejin7940_copy extends ModuleObject {

		/**
		 * @brief 설치시 추가 작업이 필요할시 구현
		 **/
		function moduleInstall() {
			
			return new Object();
		}

		/**
		 * @brief 설치가 이상이 없는지 체크하는 method
		 **/
		function checkUpdate() {
			$oDB = &DB::getInstance();
			$oModuleModel = &getModel('module');

			return false;
		}

		/**
		 * @brief 업데이트 실행
		 **/
		function moduleUpdate() {
			$oDB = &DB::getInstance();			
            $oModuleModel = &getModel('module');
            $oModuleController = &getController('module');

			return new Object(0, 'success_updated');
		}

		/**
		 * @brief 캐시 파일 재생성
		 **/
		function recompileCache() {
			
		}
	}
?>