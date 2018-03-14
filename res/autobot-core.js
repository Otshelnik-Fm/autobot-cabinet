/* global rcl_chat_sound */

(function($){

$('.cer_button').on('click',function(){
    var txt = $(this).data('cer_command');
    var area = $('.rcl-smiles').data('area');

    $('#'+area).val($('#'+area).text()+txt);

    rcl_chat_add_new_message($('.chat-form form'));
});
    
    
$('.cer_button.cer_not_db').on('click',function(){
    var token = $('.rcl-chat.chat-general').data('token');
    var action = $(this).data('cer_action');
    rcl_ajax({
        data: 'action='+action,
        success: function(data){

            if(data['content']){
                setTimeout(function(){
                    $('.chat-messages').append(data['content']).find('.chat-message').last().animateCss('zoomIn');
                    rcl_chat_scroll_bottom(token);
                    $.ionSound.play(rcl_chat_sound.sounds[0]);
                },1000);
            }
        }
    });
      	
    return false;
});
    
    
})(jQuery);