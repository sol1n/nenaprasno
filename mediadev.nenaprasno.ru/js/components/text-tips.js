(function( $ ) {
    $.fn.textTips = function() {

        this.click(function () {
            if(!$(this).find('.tip-popup').is(":visible")){
                $(this).find('.tip-popup').animate({left: "+=0px",width: 'show', opacity: 'show'}, 400);
            }
            return false;
        });

        $('.cross').click(function () {
            var popup = $(this).parent();
            if(popup.is(":visible")){
                popup.animate({width: 'hide', opacity: 'hide'}, 300);
            }
            return false;
        });

        $(document).mouseup(function (e){
            var all_popups = $('.tip-popup');
            if (!all_popups.is(e.target) && all_popups.has(e.target).length === 0) {
                all_popups.animate({width: 'hide', opacity: 'hide'}, 300);
            }
            return false;
        });

    }
}( jQuery ));
