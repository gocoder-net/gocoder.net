<?php

	/**
	 * @brief  외부 페이지 위젯
	 * @author Eundong (dh1024@gmail.com) 
	 **/

	class opageWidget extends WidgetHandler {
		function proc($args){
			if(!$args->widget_sequence) $args->widget_sequence = 0;
			if(!$args->path) return '경로 설정이 반드시 필요합니다.';

			$oPageView = &getView('page');
			
			$cache_file = sprintf("%sfiles/cache/opage/%d.%s.cache.php", _XE_PATH_, $args->widget_sequence, Context::getSslStatus());
			if(preg_match("/^([a-z]+):\/\//i",$args->path)) $content = $oPageView->getHtmlPage($args->path, 0, $cache_file);
			else $content = $oPageView->executeFile($args->path, 0, $cache_file);
			
			Context::set('opage_content', $content);

			$tpl_path = sprintf('%sskins/%s', $this->widget_path, $args->skin);
			$oTemplate = &TemplateHandler::getInstance();
			return $oTemplate->compile($tpl_path, 'box');
		}			
	}
	
?>
