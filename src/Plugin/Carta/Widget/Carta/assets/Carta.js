/**
 * Created by Viole on 18/05/2016.
 */
$(document).ready(function(){
    var liCount = $(".slidingDiv").size();
    var liActive = parseInt(liCount / 2) + 1;
    $(".recipes .container > div.slidingDiv:nth-of-type(" + liActive + ")").css("display", "block");
    activeid = "#" + $(".cart-list li.active").data('div');
    $(".slidingDiv-wrapper").find(activeid).show();
    $(".cart-list li").on("mouseenter", function() {
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
        container = $(".slidingDiv-wrapper");
        child = ".slidingDiv";
        $this = $(this), id = $this.data("div"), id = "#" + id;
        container.children(child).hide();
        container.children(id).show();
    });

});