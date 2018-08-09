(function( $ ) {
    $.fn.textTips = function() {

        popup = $('.tip-popup');//тултип
        var w =  $(window).width();//определяем ширину экрана
        mobile = false;
        if(w<'768'){
            mobile = true;
        }

        this.click(function () {
            //если тултип выбранного элемента не отображается показываем
            if( ($(this).data('tip')!='') && ($(this).data('tip') !== popup.find('.text').html() )  ) {
                var title = '';//получаем заголовок тултипа
                if( $(this).attr('title') ) {
                    title = $(this).attr('title');
                } else {
                    title = $(this).html();
                }
                //получаем заголовок тултипа
                title = title.charAt(0).toUpperCase() + title.substr(1);
                var text = $(this).data('tip');//получаем текст тултипа

                var off_top = $(this).offset().top;//получаем позицию элемента(по вертикали)
                popup.show();
                popup.offset({top:off_top});//переносим тултип на один уровень с элементом(по вертикали)
                popup.hide();

                if (mobile) {
                    $('.tip-bg').show();//показываем подложку тултипа в мобильной версии
                }
                popup.animate({left: "+=0px", width: 'show', opacity: 'show'}, 300);//показываем тултип
                popup.find('.title').html(title);//задаем заголовок тултипа
                popup.find('.text').html(text);//задаем текст тултипа
            }
            return false;
        });

        $('.cross').click(function () {
            popup.find('.title').html('');//очищаем соодержимое
            popup.find('.text').html('');
            popup.animate({width: 'hide', opacity: 'hide'}, 300);//скрываем тултип
            if (mobile) {//скрываем затенение экрана
                $('.tip-bg').hide();
            }
            return false;
        });

        $(document).mouseup(function (e){
            if( $(e.target).data('tip') !== popup.find('.text').html() ) {
                if (!popup.is(e.target) && popup.has(e.target).length === 0) {
                        popup.find('.title').html('');//очищаем соодержимое
                        popup.find('.text').html('');
                        popup.animate({width: 'hide', opacity: 'hide'}, 300);//скрываем тултип
                        if (mobile) {//скрываем затенение экрана
                            $('.tip-bg').hide();
                        }
                }
                return false;
            }
        });

    }
}( jQuery ));
