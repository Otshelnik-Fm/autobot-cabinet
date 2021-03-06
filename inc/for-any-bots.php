<?php

/*

  ╔═╗╔╦╗╔═╗╔╦╗
  ║ ║ ║ ╠╣ ║║║ https://otshelnik-fm.ru
  ╚═╝ ╩ ╚  ╩ ╩

 */

if ( ! defined( 'ABSPATH' ) )
    exit;


/*
  Добавление кнопки в чат
 */
//$arg = [
//    'icon'=>'',
//    'text'=>'',
//    'command'=>'',
//    'exclude_db'=>'',
//    'callback'=>'',
//];
function autobot_add_button( $arg ) {
    $ico     = ( isset( $arg['icon'] ) ) ? $arg['icon'] : '';
    $text    = ( isset( $arg['text'] ) ) ? $arg['text'] : '';
    $command = ( isset( $arg['command'] ) ) ? $arg['command'] : '';

    $dop_class   = '';
    $data_action = '';

    if ( isset( $arg['exclude_db'] ) && isset( $arg['callback'] ) ) {
        $dop_class   = 'cer_not_db';
        $data_action = $arg['callback'];
    }

    return rcl_get_button( [
        'type'   => 'simple',
        'label'  => $text,
        'icon'   => $ico,
        'status' => '',
        'class'  => 'cer_button ' . $dop_class . ' cer_' . $command . '',
        'href'   => '',
        'data'   => [ 'cer_command' => '!' . $command, 'cer_action' => $data_action ]
        ] );
}

function autobot_chat_wrapper( $message ) {
    $out = '<div class="chat-message">';
    $out .= '<span class="user-avatar">';
    $out .= '<a href="' . rcl_get_tab_permalink( AUTOBOT_ID, 'chat' ) . '">' . get_avatar( AUTOBOT_ID, 50 ) . '</a>';
    $out .= '</span>';

    $out .= '<div class="message-manager" style="width:23px;height:1px;"></div>';

    $out .= '<div class="message-wrapper">';
    $out .= '<div class="message-box">';
    $out .= '<span class="author-name">' . get_the_author_meta( 'display_name', AUTOBOT_ID ) . '</span>';
    $out .= '<div class="message-text">';
    $out .= convert_smilies( nl2br( $message ) );
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';

    return $out;
}
