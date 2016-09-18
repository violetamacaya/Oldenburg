$(document).ready(function(){
    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 50) {
            $('.header').addClass('fixed');
            $('.logo').hide();
            $('.header').height(50);
            $('.menu').css('padding-top', 21);
        } else {
            $('.header').removeClass('fixed');
            $('.logo').show();
            $('.header').height(160);
            $('.menu').css('padding-top', 0);
        }

        if ($(window).scrollTop() > 0 && $(window).scrollTop() < 550) { //Inicio
            $('.menu li').removeClass('active');
            $('.home-li').addClass('active');
            $('.carousel-indicators').show();

        }
        if ($(window).scrollTop() > 550 && $(window).scrollTop() < 1150) { //Noticias
            $('.menu li').removeClass('active');
            $('.noticias-li').addClass('active');
            $('.carousel-indicators').hide();
        }
        if ($(window).scrollTop() > 1050 && $(window).scrollTop() < 1810) { //Carta
            $('.menu li').removeClass('active');
            $('.carta-li').addClass('active');
        }
        //alert( $('#noticias').offset().top)
    });

    $('.menu').on('click','a', function(event){
        event.preventDefault();
        var o =  $( $(this).attr("href") ).offset();
        var sT = o.top - $(".fixed").outerHeight(true); // get the fixedbar height
        // compute the correct offset and scroll to it.
        if($(this).attr("href")=='#home'){
            window.scrollTo(0,0);
        }
        else{
            window.scrollTo(0,sT);
        }

    });
    
    
    
});