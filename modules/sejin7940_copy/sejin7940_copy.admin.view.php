<?php
	/**
	 * @class  sejin7940_copyAdminView
	 * @author sejin7940 (sejin7940@nate.com)
	 * @brief  sejin7940_copy 모듈의 AdminView class
	 **/

	class sejin7940_copyAdminView extends sejin7940_copy {

		/**
		 * @brief Initialization
		 **/
		function init() {
            $oModuleModel = &getModel('module');
            $config = $oModuleModel->getModuleConfig('sejin7940_copy');
            Context::set('config', $config);				

			$this->setTemplatePath($this->module_path.'tpl');			
		}


		function dispSejin7940_copyAdminConfig() {
            $oModuleModel = &getModel('module');
            $config = $oModuleModel->getModuleConfig('sejin7940_copy');
            Context::set('config', $config);				

			$this->setTemplateFile('config.html');
		}


		function dispSejin7940_copyAdminCopy() {
            $oModuleModel = &getModel('module');
            $config = $oModuleModel->getModuleConfig('sejin7940_copy');
            Context::set('config', $config);				

			$this->setTemplateFile('copy.html');
		}

	}
?>