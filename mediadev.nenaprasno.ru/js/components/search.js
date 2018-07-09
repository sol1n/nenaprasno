(function() {
    function hideEvent(e, closestEl, hideFunc) {
        if(!$(e.target).closest(closestEl).length) {
            hideFunc();
            $(document).off('click', 'body', hideEvent);
        }
    }

    $('.js-search').click(function () {
        var searchOverlay = '#search-overlay',
            searchWrapper = '#search-overlay > .main-search-wrapper';

        function show() {
            $('.js-search').addClass('active');
            $(searchOverlay).addClass('active');
            $(searchWrapper + " input")[0].focus();

            $(document).on('click', 'body', function (e) {
                hideEvent(e, searchWrapper, hide);
            });
        }

        function hide() {
            $('.js-search').removeClass('active');
            $('.js-search-wrapper, ' + searchOverlay).removeClass('active');
        }

        if ($(this).hasClass('active')) {
            hide();
        } else {
            show();
        }

        return false;
    });
})();