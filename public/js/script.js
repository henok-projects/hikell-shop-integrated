function toggleMenu(menu) {
    var isShown = $('.' + menu).hasClass("block");
    if ( isShown ) {
        $( '.' + menu ).removeClass( 'block' );
        $( '.' + menu ).addClass( 'hidden' );
    } else {
        $( '.' + menu ).removeClass( 'hidden' );
        $( '.' + menu ).addClass( 'block' );
    }
}
