$('.article-block a').each(function () {
    $(this).attr('target', '_BLANK');
});

$(document).ready(function () {
    $('[data-toggle]').toggler();
    $('[data-scroll-to-top]').scrollToTop();

    $(document).on('click', '.articles-block-loadmore', function () {
        var row_count = $('.row').length;
        $('.n' + row_count).after('<div class="row n' + (row_count + 1) + '"></div>');

        // Контейнер, в котором хранятся элементы
        var targetContainer = $('.n' + (row_count + 1)),
            // URL, из которого будем брать элементы
            url = $('.articles-block-loadmore').attr('data-url');

        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function (data) {

                    //  Удаляем старую навигацию
                    $('.articles-block-loadmore').remove();

                    var elements = $(data).find('.col-xs-6, .col-md-4'),  // Ищем элементы
                        pagination = $(data).find('.articles-block-loadmore'); // Ищем навигацию

                    targetContainer.append(elements); // Добавляем посты в конец контейнера
                    targetContainer.after(pagination); // добавляем навигацию следом
                }
            })
        }

    });

});
