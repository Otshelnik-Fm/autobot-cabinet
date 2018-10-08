<?php

/*

  ╔═╗╔╦╗╔═╗╔╦╗
  ║ ║ ║ ╠╣ ║║║ https://otshelnik-fm.ru
  ╚═╝ ╩ ╚  ╩ ╩

 */

if (!defined('ABSPATH')) exit;


//$arg = [
//    'icon'=>'',
//    'text'=>'',
//    'command'=>'',
//    'exclude_db'=>'',
//    'callback'=>'',
//];
function autobot_add_button($arg){
    $ico = ( isset($arg['icon']) ) ? '<i class="rcli '.$arg['icon'].'"></i>' : '';
    $text = ( isset($arg['text']) ) ? $arg['text'] : '';
    $command = ( isset($arg['command']) ) ? $arg['command'] : '';

    $dop_class = '';
    $data_action = '';

    if( isset($arg['exclude_db']) && isset($arg['callback']) ){
        $dop_class = 'cer_not_db';
        $data_action = 'data-cer_action="'.$arg['callback'].'"';
    }

    $out = '<div class="cer_box atbc_c_'.$command.'">';
        $out .= '<span class="cer_button '.$dop_class.' cer_'.$command.'" data-cer_command="!'.$command.'" '.$data_action.'>';
            $out .= $ico;
            $out .= $text;
        $out .= '</span>';
    $out .= '</div>';

    return $out;
}


function autobot_chat_wrapper($message){
    $out = '<div class="chat-message">';
        $out .= '<span class="user-avatar">';
            $out .= '<a href="'.rcl_get_tab_permalink(AUTOBOT_ID,'chat').'">'.get_avatar(AUTOBOT_ID, 50).'</a>';
        $out .= '</span>';

        $out .= '<div class="message-manager" style="width:23px;height:1px;"></div>';

        $out .= '<div class="message-wrapper">';
            $out .= '<div class="message-box">';
                $out .= '<span class="author-name">'.get_the_author_meta('display_name',AUTOBOT_ID).'</span>';
                $out .= '<div class="message-text">';
                    $out .= $message;
                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';

    return $out;
}
