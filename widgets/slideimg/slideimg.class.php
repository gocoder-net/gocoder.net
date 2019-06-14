<?php
 
    class slideimg extends WidgetHandler{
 
        function proc($args) {
 
            // 템플릿의 스킨 경로를 지정 (skin, colorset에 따른 값을 설정)
            $tpl_path = sprintf('%sskins/%s', $this->widget_path, $args->skin);
			Context::set('effect_p', $args->effect_p);
			Context::set('delay_p', $args->delay_p);
            Context::set('count_p', $args->count_p);
            
			Context::set('smslide_1', $args->smslide_1);
			Context::set('smslide_1_url', $args->smslide_1_url);
			Context::set('smslide_1_text', $args->smslide_1_text);
			Context::set('smslide_1_target', $args->smslide_1_target);

			Context::set('smslide_2', $args->smslide_2);
			Context::set('smslide_2_url', $args->smslide_2_url);
			Context::set('smslide_2_text', $args->smslide_2_text);
			Context::set('smslide_2_target', $args->smslide_2_target);

			Context::set('smslide_3', $args->smslide_3);
			Context::set('smslide_3_url', $args->smslide_3_url);
			Context::set('smslide_3_text', $args->smslide_3_text);
			Context::set('smslide_3_target', $args->smslide_3_target);

			Context::set('smslide_4', $args->smslide_4);
			Context::set('smslide_4_url', $args->smslide_4_url);
			Context::set('smslide_4_text', $args->smslide_4_text);
			Context::set('smslide_4_target', $args->smslide_4_target);

			Context::set('smslide_5', $args->smslide_5);
			Context::set('smslide_5_url', $args->smslide_5_url);
			Context::set('smslide_5_text', $args->smslide_5_text);
			Context::set('smslide_5_target', $args->smslide_5_target);

            /*Context::set('smslide_2', $args->smslide_2);
            Context::set('smslide_3', $args->smslide_3);
            Context::set('smslide_4', $args->smslide_4);
            Context::set('smslide_5', $args->smslide_5);*/
 
            // 템플릿 파일명
            $tpl_file = 'skin';
            // 템플릿 컴파일
            $oTemplate = &TemplateHandler::getInstance();
            return $oTemplate->compile($tpl_path, $tpl_file);
    }
}
 
?>