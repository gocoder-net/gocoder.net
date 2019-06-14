<?php
if (!defined("__XE__")) exit();

/**
 * @file: stop_spambot_xe.addon.php
 * @author: KSChung(http://chungfamily.woweb.net/)
 * @brief: protect spambot for a particular action
 * */
$ver = 'Stop_spambot(V2.4)';
$int_01 = 123581321;
$token = time() + $int_01;
$mask_base = $addon_info->mask_text._XE_PATH_;
$mask = $mask_base.$token;
$name_text = "c".md5($mask);
$value = md5($name_text);
$delay = (int)$addon_info->delay;
$notice_msg = '';

if (!$delay)
{
	$delay = 120;
}
$form_id = "";
$str = "";
$act = Context::get('act');

if ($act == 'dispMemberSignUpForm')
{
	$form_id = "form#fo_insert_member";
	$str = "insertMember";
} 
elseif ($act == 'dispBoardWrite') 
{
	$form_id = "form#fo_write";
	$str = "insert";
}
elseif (Context::get('document_srl')) 
{
	$form_id = "form.boardEditor";
	$str = "insert_comment";
}
elseif (Context::get('listStyle')=='planner_weekly') 
{
	$form_id = "form#fo_week";
}
if ($called_position == 'before_module_proc')
{
	// 1st(spam-bot check)
	if ($this->act == 'procMemberInsert' || $this->act == 'procBoardInsertDocument' || $this->act == 'procBoardInsertComment' )
	{
		$pin_in = Context::get('pin_22');
		$pin = floor($pin_in/1000);
		$token_in = (int)Context::get('token_1l');
		$mask2 = $mask_base.$token_in;
		$name_text2 = "c".md5($mask2);
		$value2 = md5($name_text2);
		if (!class_exists('BaseObject') && class_exists('Object'))
		{
			class_alias('Object', 'BaseObject'); // for old XE
		}

		if (Context::get($name_text2) != $value2 || $pin_in < 1500 || !($token_in + $pin >= $token - $delay && $token_in + $pin <= $token +1 ) )
		{
			if ($this->act == 'procMemberInsert')
			{
				$user_id = '가입시도_id: '.Context::get('user_id');
				$act_type = ' (회원가입) ';
				$sub_title = '(변수,가입)';
				header("HTTP/1.1 404 Not Found");
				if ($addon_info->redirect)
				{
					header('Location: '.$addon_info->redirect);
				}
				else
				{
					$redirect = 'https://www.google.com/search?q=spam&dcr=0&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiQs5-n9tfZAhVJqI8KHe0JB-4Q_AUICigB&biw=1536&bih=734';
					header('Location: '.$redirect);
				}
			}
			else
			{
				$user_id = $logged_info->user_id;
				$board_title = '(게시판: '.$this->module_info->browser_title.') ';
				$sub_title = '(변수,쓰기)';
				if ($this->act == 'procBoardInsertDocument')
				{
					$act_type = ' (문서등록) ';
					$doc_title = ' (문서제목: '.Context::get('title').') ';
				}
				elseif ($this->act == 'procBoardInsertComment') 
				{
					$act_type = ' (댓글등록) ';
					$doc_title = '';
				}
				$message = $addon_info->message_text;
				if (!$message) 
				{
					$message = "Hey buddy, don't try to fool us!";
				}
				$output = new BaseObject(-1, $message);
				$oDisplayHandler = new DisplayHandler();
				$oDisplayHandler->printContent($output);
			}
			if ($addon_info->mgr_id)
			{
				$browser = ' ('.$_SERVER['HTTP_USER_AGENT'].')';
				$ip_arr = explode('.', $_SERVER['REMOTE_ADDR']);
				$oMemberModel = getModel('member');
				$mgr_info = $oMemberModel->getMemberInfoByUserID($addon_info->mgr_id);
				$sender_srl = $mgr_info->member_srl;
				$member_srl = $mgr_info->member_srl;
				$title = $ver.' '.date("y-m-d H:i:s").' 검출'.$sub_title.$ip_arr[0];
				$notice_msg .= '변수불일치(스팸봇?)  Login_ID:('.$user_id.'),  IP:('.$_SERVER['REMOTE_ADDR'].') '.$act_type.$browser.$board_title.$doc_title;
				$oCommunicationController = getController('communication');
				$oCommunicationController->sendMessage($sender_srl, $member_srl, $title, $notice_msg, false);
			}
			Context::Close();
			exit();
		}
	}
	// 2nd(manual-input check)
	if (!$this->grant->manager && ($this->act == 'procBoardInsertDocument' || $this->act == 'procBoardInsertComment'))
	{
		$_content = Context::get('content');
		if (!strlen($_content)) return;

		if ($addon_info->max_count == '' || $addon_info->max_count == 0)
		{
			$max_cnt = 6;
		}
		else
		{
			$max_cnt = $addon_info->max_count;
		}
		if ($_COOKIE['_ssCnt'] >= $max_cnt) 
		{
			$output = new BaseObject(-1, 'Warning!\n사용 금지된 단어의 등록시도가 '.$max_cnt.'회 이상 있었습니다.\n브라우저를 다시 시작하세요.');
			$oDisplayHandler = new DisplayHandler();
			$oDisplayHandler->printContent($output);
			Context::close();
			exit();
		}

		// css
		if ($addon_info->target_css != 'none')
		{
			$tmp_content = html_entity_decode($_content);
			$cls_name = '(ui-helper-hidden|ui-datepicker|wfsr|sound_only|display-none)';
			$_style = '(display\s*:\s*none|visibility\s*:\s*hidden)';
			//if (preg_match('/\<.*\s+class\s*=.*?'.$cls_name.'\s?.*?\>(.*?)\<a\s+(.*?)(https?:\/\/)/is', $tmp_content))//링크 있으면
			if (preg_match('/\<.*\s+class\s*=.*?'.$cls_name.'\s*.*?\>(.*?)/is', $tmp_content))//링크 없어도
			{
				$ind_css = 'Y';//(V1.4)추가
				$notice_msg .= 'CSS코드검출됨, ';
			} 
			elseif (preg_match('/\<.*\s+style\s*=.*?'.$_style.'\s*.*?\>(.*?)\<\s*a\s+(.*?)(https?:\/\/)/is', $tmp_content))
			{
				$ind_css = 'Y';//(V1.4)추가
				$notice_msg .= 'CSS코드검출됨, ';
			}
		}

		// empty <a>tag (V2.3)추가
		if ($addon_info->empty_tag != 'none')
		{
			$tmp_content = preg_replace('/[\x00-\x1F\x7F]/', '', html_entity_decode($_content));
			$dom = new DOMDocument;
			@$dom = DOMDocument::loadHTML('<?xml encoding="utf-8" ?>' . $tmp_content);
			$links = $dom->getElementsByTagName('a');
			if (count($links))
			{
				foreach ($links as $link)
				{
					if (!trim($link->nodeValue))
					{
						$ind_empty_tag = 'Y';
						$notice_msg .= '내용없는 "a" 태그 검출됨, ('.$link->getAttribute('href').' '.$link->getAttribute('title').'), ';
						break;
					}
				}
			}
		}

		//스팸필터및 한글조건 검토 대상 사용자(V1.2추가)
		if ($addon_info->target != 'none' || $addon_info->target != '')
		{
			if (($addon_info->target == 'none_user' && !$logged_info->member_srl) || ($addon_info->target == 'none_mgr' && !$this->grant->manager))
			{
				$target_user = 'Y'; 
			}
		}
		if ($target_user == 'Y') //검토 대상자인 경우 실행
		{
			//hangul
			$no_hangul_option = $addon_info->no_hangul_option;
			if ($no_hangul_option != 'allow' && $no_hangul_option != '')
			{
				if (!preg_match('/[ㄱ-ㅣ가-힣]/u', $_content))
				{
					if ($no_hangul_option == 'notallow_link' && preg_match('#<a\s|https?://#is', $_content))
					{
						$ind_hg_spam = 'Y';//한글이 없으면서 링크가 있으면 스팸처리
						$notice_msg .= '한글조건검출됨, ';
					}
					elseif ($no_hangul_option == 'notallow')
					{
						$ind_hg_spam = 'Y';//한글이 없으면 스팸처리
						$notice_msg .= '한글조건검출됨, ';
					}
				}
			}

			//key word
			$spam_word_arr = explode(',', preg_replace('/[^A-Za-zㄱ-ㅣ가-힣0-9,]/', '', $addon_info->spam_word));
			if (strlen($spam_word_arr[0]))
			{
				$_content = strip_tags($_content);//html 태그제거
				$_content = preg_replace('/&nbsp;/', '', $_content);//html 엔티티를 문자로 바꾼 후 공란제거
				$_content = preg_replace('/\s+/', '', html_entity_decode($_content));//html 엔티티를 문자로 바꾼 후 공란제거
				foreach($spam_word_arr as $key => $value) 
				{
					$pattern = '';
					if (preg_match('/[ㄱ-ㅣ가-힣]/u', $value)) {
						$pattern .= 'ㄱ-ㅣ가-힣';
					}
					if (preg_match('/[A-Za-z]/', $value)) {
						$pattern .= 'A-Za-z';
					}
					if (preg_match('/[0-9]/', $value)) {
						$pattern .= '0-9';
					}
					$pattern = '/[^'.$pattern.']/';
					$tmp_content = preg_replace($pattern, '', $_content);//알파벳, 한글, 숫자 이외의 문자제거

					if ($value && preg_match('/'.preg_quote($value,'/').'/is', $tmp_content))
					{ 
						$ind_word_spam = 'Y';//스팸단어가 있으면 스팸처리
						$notice_msg .= '키워드검출됨('.$value.'), ';
						break;
					}
				}
			}
		}
	}
	if ($ind_hg_spam == 'Y' || $ind_word_spam == 'Y' || $ind_css == 'Y' || $ind_empty_tag == 'Y')
	{
		$ssCnt = $_COOKIE['_ssCnt'] + 1;
		setcookie('_ssCnt', $ssCnt, 0,'/');
		$output = new BaseObject(-1, '" "'.'는 사용 금지된 단어입니다');
		$oDisplayHandler = new DisplayHandler();
		$oDisplayHandler->printContent($output);
		if ($addon_info->mgr_id)
		{
			$browser = ' ('.$_SERVER['HTTP_USER_AGENT'].')';
			$ip_arr = explode('.', $_SERVER['REMOTE_ADDR']);
			$sub_title = '(필터,쓰기)';
			if ($this->act == 'procBoardInsertDocument')
			{
				$act_type = ' (문서등록) ';
				$doc_title = ' (문서제목: '.Context::get('title').') ';
			}
			elseif ($this->act == 'procBoardInsertComment') 
			{
				$act_type = ' (댓글등록) ';
				$doc_title = '';
			}
			$board_title = '(게시판: '.$this->module_info->browser_title.')';
			$oMemberModel = getModel('member');
			$mgr_info = $oMemberModel->getMemberInfoByUserID($addon_info->mgr_id);
			$sender_srl = $mgr_info->member_srl;
			$member_srl = $mgr_info->member_srl;
			$title = $ver.' '.date("y-m-d H:i:s").' 검출'.$sub_title.$ip_arr[0];
			$notice_msg .= '  Login_ID:('.$logged_info->user_id.'),  IP:('.$_SERVER['REMOTE_ADDR'].') '.$act_type.$browser.$board_title.$doc_title;
			$oCommunicationController = getController('communication');
			$oCommunicationController->sendMessage($sender_srl, $member_srl, $title, $notice_msg, false);
		}
		Context::close();
		exit();
	}
}

if ($called_position == 'before_display_content' && $form_id != "")
{

if (!isset($_COOKIE['_ssCnt'])) 
{
	setcookie('_ssCnt', 0, 0, '/');
}
$form_jS = '
<script type="text/javascript">
//<![CDATA[
jQuery(function($) 
{
	$(document).ready(function() 
	{
		$("input:text").keydown(function (key) {
			if (key.keyCode == 13){ //enter
				key.preventDefault(); // donot submit form
			}
		});
		$("#WzTtDiV_ss").text($.now());
		$(":submit").mousedown(function(e) 
		{
			if (!$("input[name='.$name_text.']").val() && !$("input[name=token_1l]").val() && e.pageX && e.pageY) 
			{
				if ($("'.$form_id.'").length > 0){
					$("'.$form_id.'").append(\'<input type="hidden" name="'.$name_text.'" value=""/>\');
					$("'.$form_id.'").append(\'<input type="hidden" name="token_1l" value="'.$token.'"/>\');
					$("'.$form_id.'").append(\'<input type="hidden" name="pin_22" value=""/>\');
					$(this).closest("form").children("input[name='.$name_text.']").val("'.$value.'");
					$("'.$form_id.'").children("input[name=pin_22]").val( $.now()-$("#WzTtDiV_ss").text() );
				}
				else
				{
					$("form").each(function()
					{
					//var txt = $(this).attr(\'onsubmit\'); 
					//if (/'.$str.'/i.test(txt))
					//{
						$(this).append(\'<input type="hidden" name="'.$name_text.'" value=""/>\');
						$(this).append(\'<input type="hidden" name="token_1l" value="'.$token.'"/>\');
						$(this).append(\'<input type="hidden" name="pin_22" value=""/>\');
						$(this).children("input[name='.$name_text.']").val("'.$value.'");
						$(this).children("input[name=pin_22]").val( $.now()-$("#WzTtDiV_ss").text() );
					//}
					});
				}
			}
		});
	});
});
//]]>
</script>
';
	Context::addHtmlHeader('<div id="WzTtDiV_ss" style="visibility:hidden; position: absolute; overflow: hidden; padding: 0px; width: 0px; left: 0px; top: 0px;"></div>');
	Context::addHtmlFooter($form_jS);
	unset($form_jS, $name_text, $value, $form_id, $message, $token, $tmp_content);
}
/* End of file stop_spambot_xe.addon.php */
/* Location: ./addons/stop_spambot_xe/stop_spambot_xe.addon.php */
