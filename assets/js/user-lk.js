/* global Rcl */
// в своём лк - список контактов и всплывающий чат в них

// получим id контакта
rcl_add_action( 'rcl_footer', 'atbcGetId' );
var idContacts = '';
function atbcGetId() {
    jQuery( document ).on( 'click', '#tab-chat .contact-box', function() {
        idContacts = jQuery( this ).data( 'contact' );
    } );
}

// скроем форму ответа у автобота
rcl_add_action( 'rcl_get_ajax_chat_window', 'atbcClearAutobotPM' );
function atbcClearAutobotPM() {
    var autobot = +Rcl.autobot;

    if ( autobot === idContacts ) {
        var cModal = jQuery( '.rcl-chat-window.ssi-modal' );
        cModal.find( '.chat-private' ).attr( 'data-ids', idContacts );
        cModal.find( '.chat-form, .chat-users-box' ).remove();
    }
}

// direct message - скроем форму ответа у автобота
rcl_add_action( 'dms_get_pm', 'atbcClearAutobotPMforDM' );
function atbcClearAutobotPMforDM() {
    var autobot = +Rcl.autobot;

    if ( autobot === idContacts ) {
        jQuery( '#subtab-private-contacts .chat-form' ).remove();
    }
}
