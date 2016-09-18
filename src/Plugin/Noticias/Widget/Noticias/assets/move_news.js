$(document).ready(function(){
    for (var i = 0; i < 3; i++) {
        var name = 'news-item-' + i;
        $('.' + name).show();
    }

    $('.ipWidget-Noticias .right-arrow').unbind('click').click(function (){
        $('.news-item:visible').first().hide();

        if($('.news-item:visible').last().next().is($('.right-arrow'))){
            var html = $('.ipWidget-Noticias .news-item').first().wrap();
            $('.ipWidget-Noticias .right-arrow').before(html);
        }
        $('.news-item:visible').last().next().show();
    });


    $('.ipWidget-Noticias .left-arrow').unbind('click').click(function (){
        $('.news-item:visible').last().hide();

        if($('.news-item:visible').first().prev().is($('.left-arrow'))){
            var html = $('.ipWidget-Noticias .news-item').last().wrap();
            $('.ipWidget-Noticias .left-arrow').after(html);
        }
        $('.news-item:visible').first().prev().show();
    });

    $('.ipWidget-Noticias .news-item .button-news').click(function () {
        $('.news-row').hide();
        var id_clicked = $(this).data("id");
        var name = 'layout-new-' + id_clicked;
        $('.'+ name).show();
    });
    $('.ipWidget-Noticias .layout-new .x-button').click(function () {
        $('.layout-new').hide();
        $('.news-row').show();
    });
    $('.ipWidget-Noticias .layout-new .back-button').click(function () {
        $('.layout-new').hide();
        $('.news-row').show();
    });

});
