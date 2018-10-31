<?php

/*

╔═╗╔╦╗╔═╗╔╦╗
║ ║ ║ ╠╣ ║║║ https://otshelnik-fm.ru
╚═╝ ╩ ╚  ╩ ╩

*/


// подключаем настройки в админке, но не в управлении мультисайта
// баг мультисайта описан здесь https://otshelnik-fm.ru/?p=3629
if( is_admin() && !is_network_admin() ){
    require_once 'settings.php';
}



// функционал для чатботов
require_once 'inc/for-any-bots.php';



// это кабинет автобота
function atbc_is_autobot(){
    global $user_LK;
    if( rcl_is_office() && $user_LK == AUTOBOT_ID ) return true;

    return false;
}


// ресурсы для чат-ботов
function atbc_load_resource(){
    if( atbc_is_autobot() ){ // это кабинет Автобота
        rcl_enqueue_style('autobot_lk', rcl_addon_url('res/autobot-lk.css', __FILE__));

        if ( is_user_logged_in() ){
            rcl_enqueue_script('autobot_lk_logged', rcl_addon_url( 'res/autobot-lk-logged.js', __FILE__ ), false, true);
        }
    }

    if ( !is_user_logged_in() ) return false;

    global $user_ID;
    if( rcl_is_office($user_ID) ){
        rcl_enqueue_script('autobot_user_lk', rcl_addon_url( 'res/user-lk.js', __FILE__ ), false, true);
    }

    rcl_enqueue_style('autobot_core_style', rcl_addon_url('res/atbc-core.css', __FILE__));
    rcl_enqueue_script('autobot_core_script', rcl_addon_url( 'res/atbc-core.js', __FILE__ ), false, true);

}
add_action('rcl_enqueue_scripts', 'atbc_load_resource');



// идентификатор автобота для прочих ботов
function atbc_dlobal_init(){
     define('AUTOBOT_ID', rcl_get_option('atbc_id', 19667722446));
}
add_action('init', 'atbc_dlobal_init', 5);



// доступна js-переменная Rcl.autobot - содержит id автобота
function atbc_variable_autobot($data){
    $data['autobot'] = AUTOBOT_ID;

    return $data;
}
add_filter('rcl_init_js_variables','atbc_variable_autobot',10);


// критичные стили
// выше удалили блоки скриптом - но они с запаздыванием отрабатывают
// поэтому мы их вначале скроем стилями. А по готовности скрипт удалит их
// так мы избавимся от их "моргания"
function atbc_inline_style($styles){
    if( !atbc_is_autobot() ) return $styles;

    $styles .= '
        .office-theme-control .tc_usr_info,
        #rcl-office .user-status,
        .chat-users-box {
            display: none;
        }
    ';

    return $styles;
}
add_filter('rcl_inline_styles','atbc_inline_style',10);



// в кабинете автобота удалим лишние вкладки
function atbc_del_except_chat_tab($tabs){
    if( !atbc_is_autobot() ) return $tabs;

    global $user_ID;

    foreach ($tabs as $tab){
        if( $user_ID == AUTOBOT_ID && $tab['id'] == 'profile' ){
            $tab['order'] = 2;
            if( isset($tab['first']) ) unset($tab['first']);

            $n_tab[] = $tab;
        }

        if( $tab['id'] == 'chat' ){
            $tab['name'] = 'Сообщения сайта';
            $tab['order'] = 1;
            $tab['first'] = 1;
            if(!$user_ID){                                          // гость. ему свой текст
                $tab['content']['0']['callback']['name'] = 'atbc_change_guest_text';
            }

            $n_tab[] = $tab;
        }
    }

    return $n_tab;
}
add_filter('rcl_tabs','atbc_del_except_chat_tab');


// для гостя сменим текст с "Авторизуйтесь, чтобы написать пользователю сообщение"
function atbc_change_guest_text(){
   $guest_text = '<div class="chat-notice">'
                   . '<span class="notice-error">Этот бот сможет рассылать вам новости сайта, подписки и уведомления.<br/>'
                       . 'Войдите на сайт и проверьте его работу</span>'
                . '</div>';
    return $guest_text;
}


// удалим кнопки подписаться и в черный список. Это в ЛК бота не нужно
function atbc_del_feed_button(){
    if( !atbc_is_autobot() ) return false;

    remove_action('init','rcl_add_block_black_list_button',10);
    remove_action('init','rcl_add_block_feed_button');

}
add_action('init','atbc_del_feed_button',5);



// отменим стандартный вывод кнопки "Подробная информация" - "Информация о пользователе"
function atbc_del_userinfo_button(){
    if( atbc_is_autobot() ){
        remove_filter('rcl_avatar_icons','rcl_add_user_info_button',10);
    }
}
add_action('init', 'atbc_del_userinfo_button');



// без токена юзер не сможет отправить сообщение боту - а юзер боту писать не должен
function atbc_clear($data_hidden){
    if( atbc_is_autobot() ){
        unset($data_hidden['chat[token]']);
    }
    return $data_hidden;
}
add_filter('rcl_chat_hidden_fields','atbc_clear',5);



// возле имени (используя шаблон theme control!) бота, слева от него выведем аву. Чтоб не было безлико
function atbc_set_ava_autobot_before_name(){
    global $user_LK;
    if( atbc_is_autobot() ){
        echo '<div style="margin-right: 10px;">'.get_avatar($user_LK, 40).'</div>';
    }
}
add_action('tc_pre_username','atbc_set_ava_autobot_before_name');



// в чате с автоботом oembed на свой же сайт отключим
function atbc_remove_autobot_oembed(){
    if( atbc_is_autobot() ){
        global $rcl_options;
        $rcl_options['chat']['oembed'] = 0; // отключим у бота oEmbed
    }
}
add_action('init', 'atbc_remove_autobot_oembed',5);



// отменим часовую рассылку от реколл чата и напишем свою замену с учетом юзера чатбота
remove_action('rcl_cron_hourly','rcl_chat_send_notify_messages',10);
add_action('rcl_cron_hourly','atbc_chat_send_notify_messages',10);
function atbc_chat_send_notify_messages(){
    global $wpdb;

    $mailtext = rcl_get_option('messages_mail');

    $mess = $wpdb->get_results("SELECT * FROM ".RCL_PREF."chat_messages WHERE message_status='0' && private_key!='0' && message_time  > date_sub('".current_time('mysql')."', interval 1 hour)");

    if(!$mess) return false;

    $messages = array();
    foreach($mess as $m){
        $messages[$m->private_key][$m->user_id][] = $m->message_content;
    }

    rcl_add_log('Дополнение автобота. Отправка непрочитанных сообщений личного чата');

    foreach($messages as $addressat_id=>$data){
        $content = '';
        $to = get_the_author_meta('user_email',$addressat_id);

        $cnt = count($data);

        foreach($data as $author_id=>$array_messages){
            $url = rcl_get_tab_permalink($author_id,'chat');
            if($author_id == AUTOBOT_ID) $url = get_author_posts_url(AUTOBOT_ID);
            $content .= '<div style="overflow:hidden;clear:both;border-bottom:1px solid #e5e5e5;margin: 0 0 10px;">';
                $content .= '<h3 style="margin: 0 0 10px;">Вам было отправлено сообщение:</h3>';
                $content .= '<div style="float:left;margin-right:15px;">'.get_avatar($author_id,55).'</div>';
                $content .= '<p style="margin: 0 0 10px;">от пользователя: "'.get_the_author_meta('display_name',$author_id).'"</p>';

                if($mailtext || $author_id == AUTOBOT_ID){ // в настройках стоит опция "отправлять полный текст сообщения", или это автобот
                    $message = implode('<br>',$array_messages);

                    $content .= '<p style="margin: 0 0 10px;"><b>Текст сообщения:</b></p>';
                    $content .= '<p style="background-color: #f5f5f5;padding: 8px 12px;margin: 0;">'.wp_unslash($message).'</p>';
                }

                $content .= '<p>Вы можете прочитать сообщение перейдя по ссылке: <a href="'.$url.'">'.$url.'</a></p>';

                if(rcl_exist_addon('subscription-two')){
                    if($author_id == AUTOBOT_ID){
                        $user_cab = rcl_format_url(get_author_posts_url($addressat_id),'sbt_tab');
                        $content .= '<p><small>';
                            $content .= 'Управление подпиской вам доступно в вашем личном кабинете: ';
                            $content .= '<a href="'.$user_cab.'">Перейти к управлению подпиской</a>';
                        $content .= '<small></p>';
                    }
                }

            $content .= '</div>';
        }

        $title = 'Для вас ' . atbc_counting($cnt,array('новое сообщение','новых сообщения','новых сообщений') );

        rcl_mail($to, $title, $content);
    }

}
// склонения "сообщений, сообщения"
function atbc_counting($n,$w=array('','','')){
    $x=($xx=abs($n)%100)%10;
    return $n.' '.$w[($xx>10 AND $xx<15 OR !$x OR $x>4 AND $x<10)?2:($x==1?0:1)];
}





// удалим хук допа чата (отвечает за вывод панели контактов или если отключено - вывод в реколлбаре)
remove_action('rcl_bar_setup','rcl_bar_add_chat_icon',10);

// свой вывод сделаем в реколлбаре
add_action('rcl_bar_setup','atbc_bar_add_chat_icon',8);
function atbc_bar_add_chat_icon(){
    if(!is_user_logged_in()) return false;

    global $user_ID;
    $data = atbc_chat_noread_messages_amount($user_ID);

    if( defined('OTFM') ){ // константа определена на моем домене в моем ВП шаблоне
        $autobot_url = '/author/autobot/';
        $label = 'Подписки';
    } else {
        $autobot_url = get_author_posts_url( AUTOBOT_ID ); // дает +2 запроса к бд. Поэтому напрямую его на своем домене
        $label = 'Сообщения';
    }

    rcl_bar_add_icon('ac_autobot',
        array(
            'icon'  =>  'fa-slack',
            'url'   =>  $autobot_url,
            'label' =>  $label,
            'counter'=> $data['autobot']
        )
    );

    $chat_option = rcl_get_option('chat');
    if($chat_option['contact_panel'] == 0){ // панель контактов снизу
        rcl_bar_add_icon('rcl-messages',
            array(
                'icon'=>'fa-envelope',
                'url'=>rcl_get_tab_permalink($user_ID,'chat'),
                'label'=>'Личные сообщения',
                'counter'=>$data['messages']
            )
        );
    }
}

// посчитаем непрочитанные сообщения отдельно:
// все сообщения - исключая автобота
// и отдельно сообщения автобота. Одним запросом
function atbc_chat_noread_messages_amount($user_id){
    global $wpdb;

    $table = RCL_PREF ."chat_messages";
    $total_result = $wpdb->get_row("
        SELECT
            (SELECT COUNT(t1.message_id)
                FROM ".$table." AS t1
                WHERE t1.user_id NOT IN (".AUTOBOT_ID.")
                AND t1.private_key = '".$user_id."'
                AND t1.message_status = '0') AS messages,

            (SELECT COUNT(t2.message_id)
                FROM ".$table." AS t2
                WHERE t2.user_id = ".AUTOBOT_ID."
                AND t2.private_key = '".$user_id."'
                AND t2.message_status = '0') AS autobot
        ",ARRAY_A);

    return $total_result;
}



// миничат у автобота скроем textarea
function atbc_minichat_clear_autobot_textarea(){
    global $rcl_options;

    if(!isset($rcl_options['chat']['contact_panel'])||!$rcl_options['chat']['contact_panel']) return false; // выкл миничат
    if( !is_user_logged_in() ) return false; // гость

// стилями скроем быстро, пока по таймауту не удалится нужная инфа скриптом
$style = '
#rcl-chat-noread-box .rcl-mini-chat[data-ids="'.AUTOBOT_ID.'"] .chat-form{
    display:none;
}
';

    $script = '
jQuery("#rcl-chat-noread-box .rcl-chat-user.contact-box").on("click", function () {
    var idContact = jQuery(this).data("contact");
    jQuery("#rcl-chat-noread-box .rcl-mini-chat").attr("data-ids", idContact);
});
function atbcCleaMiniChat(){
    var idContact = jQuery("#rcl-chat-noread-box .rcl-mini-chat").attr("data-ids");
    if('.AUTOBOT_ID.' == idContact){
        setTimeout(function(){
            jQuery("#rcl-chat-noread-box .rcl-chat.chat-private").attr("data-token","");
            jQuery("#rcl-chat-noread-box .chat-form").remove();
        },1500);
    }
}
rcl_add_action("rcl_init_chat","atbcCleaMiniChat");
';

    // сожмём в строку
    $script_min = atbc_inline($script);
    $style_min = atbc_inline($style);

    echo "\r\n<script>".$script_min.'</script><style>'.$style_min."</style>\r\n";
}
add_action('wp_footer', 'atbc_minichat_clear_autobot_textarea', 15);



// сожмем скрипты или стили для инлайна
function atbc_inline($src){

    // удаляем пробелы, переносы, табуляцию
    $src_cleared =  preg_replace('/ {2,}/','',str_replace(array("\r\n", "\r", "\n", "\t"), '', $src));

    // пробелы перед :
    $src_non_space = str_replace(': ', ':', $src_cleared);

    // перед скобкой пробел не нужен
    $src_sanity = str_replace(' {', '{', $src_non_space);

    return $src_sanity;
}
