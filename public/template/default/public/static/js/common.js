$(function(){
    $(".side-bar-qq").mouseover(function() {
        $(this).animate({
            width:"148px"
        },300);
    }).mouseleave(function() {
        $(this).animate({
            width:"56px"
        },300);
    });
});