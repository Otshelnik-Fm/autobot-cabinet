/* global rcl_chat_sound */

(function($){

$(document).on( 'click', '.cer_button', function() {
    var txt = $(this).data('cer_command');                  // получим команду
    var form = $(this).parents('.chat-form').find('form');  // найдем форму
    
    var area = $(form).find('.rcl-smiles').data('area');    // в ней у смайлов идентификатор

    $('#'+area).val(txt);           // вставим в форму

    rcl_chat_add_new_message(form); // отправим
});
    
$(document).on( 'click', '.cer_button.cer_not_db', function() {
    var cHat = $(this).parents('.rcl-chat.chat-general');
    var token = $(cHat).data('token');

    var action = $(this).data('cer_action');
    rcl_ajax({
        data: 'action='+action,
        success: function(data){
            if(data['content']){
                setTimeout(function(){
                    $(cHat).find('.chat-messages').append(data['content']).find('.chat-message').last().animateCss('zoomIn');
                    rcl_chat_scroll_bottom(token);
                    $.ionSound.play(rcl_chat_sound.sounds[0]);
                },1000);
            }
        }
    });
      	
    return false;
});
    
})(jQuery);
