$(document).ready(function() {

    if ($('.toggle-menu').is(":visible")) {
        $('.side-menu .level1 :first-child').addClass("current");

        for (var i = 1; i < 3; i++) {
            var name = 'news-item-' + i;
            $('.' + name).hide();
        }

    }
    console.log($(window).width());
    if ($(window).width() > 972 && $(window).width() < 1189) {
        console.log("entro");

     for (var i = 1; i < 3; i++) {
     var name = 'news-item-' + i;
     $('.' + name).hide();
     }

    }

    $('.ipWidget-Noticias .right-arrow').unbind('click').click(function (){

        if($('.news-item:visible').last().next().is($('.right-arrow'))){
            var html = $('.ipWidget-Noticias .news-item').first().wrap();
            $('.ipWidget-Noticias .right-arrow').before(html);
        }
        $('.news-item:visible').last().next().show();
        $('.news-item:visible').first().hide();
    });

    $('.ipWidget-Noticias .left-arrow').unbind('click').click(function (){

        if($('.news-item:visible').first().prev().is($('.left-arrow'))){
            var html = $('.ipWidget-Noticias .news-item').last().wrap();
            $('.ipWidget-Noticias .left-arrow').after(html);
        }
        $('.news-item:visible').first().prev().show();
        $('.news-item:visible').last().hide();

    });

    var toggleMenu = $('.toggle-menu');

    toggleMenu.unbind('click').click(function () {
        if ($('.menu').is(":visible")) {
            $('.menu').hide(500);
            $('.ipWidget .carousel-indicators').show();
        }
        else {
            $('.menu').show(500);
            $('.ipWidget .carousel-indicators').hide();
        }
    });


    var aChildren = $(".menu li").children(); // find the a children of the list items

    var aArray = []; // create the empty aArray
    for (var i=0; i < aChildren.length; i++) {
        var aChild = aChildren[i];
        var ahref = $(aChild).attr('href');
        aArray.push(ahref);
    }

    $(window).scroll(function(){
        var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
        var windowHeight = $(window).height(); // get the height of the window
        var docHeight = $(document).height();

        for (var i=0; i < aArray.length; i++) {
            var theID = aArray[i];
            var divPos = $(theID).offset().top; // get the offset of the div from the top of page
            var divHeight = $(theID).height(); // get the height of the div in question
            if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
                $("a[href='" + theID + "']").parent().addClass("active");
            } else {
                $("a[href='" + theID + "']").parent().removeClass("active");
            }
        }
        if(windowPos + windowHeight == docHeight) {
            if (!$(".menu li:first-child a").parent().hasClass("active")) {
                var navActiveCurrent = $(".menu").attr("href");
                $("a[href='" + navActiveCurrent + "']").parent().removeClass("active");
                $(".menu li:first-child a").parent().addClass("active");
            }
        }
        if ($(window).scrollTop() > 50) {
            $('.header').addClass('fixed');
        } else {
            $('.header').removeClass('fixed');
        }
    });



});
