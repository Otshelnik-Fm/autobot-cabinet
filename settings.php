<?php

if (!defined('ABSPATH')) exit; // запрет прямого доступа к файлу


function atbc_settings($content){

    $opt = new Rcl_Options(__FILE__);

    $content .= $opt->options('Настройки Autobot', array(
            $opt->options_box('&nbsp;&nbsp;&nbsp;Основные&nbsp;настройки&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                array(
                    array(
                        'type' => 'number',
                        'title'=>'Впишите ID Автобота:',
                        'slug'=>'atbc_id',
                        'notice'=> 'Обязательно',
                        'help'=> 'Смотри инструкцию по созданию и настройке Автобота на странице описания товара, вкладка "Настройки"'
                    )
                )
            ),
        )
    );

    return $content;
}
add_filter('admin_options_wprecall','atbc_settings');
