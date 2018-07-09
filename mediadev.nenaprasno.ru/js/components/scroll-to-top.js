(function( $ ) {
    $.fn.scrollToTop = function() {
        var $scrollBtn = $(this);

        $scrollBtn.on('click', function (e) {
            $('body,html').animate({
                scrollTop: 0
            }, 400);
            return false;
        });

        function display() {
            var bottom_btn = $('.scroll-to-top').offset().top + $('.scroll-to-top').height();
            var top_footer = $('footer').offset().top;
            if (($(window).scrollTop() > 600) && (bottom_btn < top_footer)) {
                $scrollBtn.addClass('active');
            } else {
                $scrollBtn.removeClass('active');
            }
        }

        $(window).scroll(function () {
            display();
        });

        display();
    }
}( jQuery ));
