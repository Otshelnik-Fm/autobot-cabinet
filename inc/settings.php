<?php

if ( ! defined( 'ABSPATH' ) )
    exit;


add_filter( 'rcl_options', 'atbc_addon_options' );
function atbc_addon_options( $options ) {
    // создаем блок
    $options->add_box( 'atbc_box_id', array(
        'title' => 'Настройки Autobot',
        'icon'  => 'fa-microchip'
    ) );

    $mess = '';

    if ( ! rcl_exist_addon( 'bot-anekbot' ) ) {
        $mess .= rcl_get_notice( [
            'type' => 'success', // info,success,warning,error,simple
            'icon' => 'fa-smile-o',
            'text' => '<a href="https://codeseller.ru/products/bot-anekbot/" target="_blank">Bot AnekBot</a> '
            . '- По команде в чат выдает случайный анекдот. Юмор от дополнения Автобота'
            ] );
    }

    if ( ! rcl_exist_addon( 'bot-bash-org' ) ) {
        $mess .= rcl_get_notice( [
            'type' => 'warning',
            'icon' => 'fa-bullhorn',
            'text' => '<a href="https://codeseller.ru/products/bot-bash-org/" target="_blank">Bot Bash.org</a> '
            . '- По команде в чат выдает новую случайную цитату с сайта Bash.org'
            ] );
    }

    if ( ! rcl_exist_addon( 'bot-exchange-rates' ) ) {
        $mess .= rcl_get_notice( [
            'type' => 'info',
            'icon' => 'fa-money',
            'text' => '<a href="https://codeseller.ru/products/bot-exchange-rates/" target="_blank">Bot Exchange Rates</a> '
            . '- По команде в чат выводит курс валют - доллар и евро из 3-х разных банков'
            ] );
    }

    if ( ! rcl_exist_addon( 'bot-rules' ) ) {
        $mess .= rcl_get_notice( [
            'type' => 'error',
            'text' => '<a href="https://codeseller.ru/products/bot-rules/" target="_blank">Bot Rules</a> '
            . '- По команде в чат выводит правила поведения в чате. Дополнение для Автобота'
            ] );
    }

    if ( ! rcl_exist_addon( 'bot-user-info' ) ) {
        $mess .= rcl_get_notice( [
            'type' => 'simple',
            'icon' => 'fa-info-circle',
            'text' => '<a href="https://codeseller.ru/products/bot-user-info/" target="_blank">Bot User Info</a> '
            . '- По команде в чат выводит информацию о пользователе и его статистику в чате'
            ] );
    }

    if ( ! rcl_exist_addon( 'bot-weather-in-the-city' ) ) {
        $mess .= rcl_get_notice( [
            'type' => 'success',
            'icon' => 'fa-snowflake-o',
            'text' => '<a href="https://codeseller.ru/products/bot-weather-in-the-city/" target="_blank">Bot Weather In The City</a> '
            . '- По команде в чат выводит погоду в заданном городе'
            ] );
    }


    // создаем группу 1
    $options->box( 'atbc_box_id' )->add_group( 'atbc_group_1', array(
        'title' => 'Основные настройки:'
    ) )->add_options( array(
        [
            'title'  => 'Впишите ID Автобота:',
            'type'   => 'number',
            'slug'   => 'atbc_id',
            'notice' => 'Обязательно<style>#options-group-atbc_group_2 .rcl-notice__text{text-align:left;margin-left:18px;}</style>',
            'help'   => 'Смотри инструкцию по созданию и настройке Автобота на '
            . '<a href="https://codeseller.ru/products/autobot-cabinet/" '
            . 'target="_blank">странице описания товара</a>, вкладка "Настройки"',
        ]
    ) );

    // сообщения
    if ( ! empty( $mess ) ) {
        // создаем группу 2
        $options->box( 'atbc_box_id' )->add_group( 'atbc_group_2', array(
            'title' => 'К дополнению Autobot есть расширения:'
        ) )->add_options( array(
            [
                'type'    => 'custom',
                'content' => $mess
            ],
        ) );
    }


    return $options;
}
