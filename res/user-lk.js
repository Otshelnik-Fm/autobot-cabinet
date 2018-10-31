/* global Rcl */
// в своём лк - список контактов и всплывающий чат в них

// получим id контакта
var idContacts = '';
function atbcGetId(){
    jQuery(document).on('click','#tab-chat .contact-box', function() {
        idContacts = jQuery(this).data('contact');
    });
}
rcl_add_action('rcl_footer','atbcGetId');

// скроем форму ответа у автобота
function atbcClearAutobotPM(){
    var autobot = +Rcl.autobot;

    if(autobot === idContacts){
        var cModal = jQuery('.rcl-chat-window.ssi-modal');
        cModal.find('.chat-private').attr('data-ids', idContacts);
        cModal.find('.chat-form, .chat-users-box').remove();
    }
}
rcl_add_action('rcl_get_ajax_chat_window','atbcClearAutobotPM');
