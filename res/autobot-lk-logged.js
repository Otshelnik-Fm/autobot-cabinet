jQuery(document).ready(function() {
    jQuery('#rcl-office .user-status,.chat-users-box,.chat-form,.tc_usr_info').remove(); // удалим лишние блоки
    
    jQuery('#rcl-office .author-name').text('AutoBot');
    
    var count = jQuery('#ac_autobot .rcb_nmbr');
    
    var num = count.html(); // подсветим кол-во блоков. значение возьмем с иконки
    if(num > 0){
        jQuery('.chat-message:nth-last-child(-n+'+num+')').addClass('aub_active');
    }
    
    jQuery(count).removeClass('counter_not_null').text('0'); // очистим счетчик
});