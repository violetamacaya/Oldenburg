$(document).ready(function(){
    var num_events = $('.event-item').length;

    $('.ipWidget-Eventos .right-arrow').unbind('click').click(function (){
        var id_visible = $('.event-item:visible').data('id');
        var next = id_visible + 1;
        if(next == num_events){
            next = 0;
        }
        $('.event-item-'+ id_visible).hide();
        $('.event-item-'+ next).show();
    });


    $('.ipWidget-Eventos .left-arrow').unbind('click').click(function (){
        var id_visible = $('.event-item:visible').data('id');
        var next = id_visible - 1;
        console.log(next);
        if(next < 0){
            next = num_events-1;
        }
        $('.event-item-'+ id_visible).hide();
        $('.event-item-'+ next).show();
    });

});
