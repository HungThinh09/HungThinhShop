$(function(){
    $('#backTop').fadeOut();
    $(window).scroll(function(){
        if($(this).scrollTop()){
            $('#backTop').fadeIn();
        }else{
            $('#backTop').fadeOut();
        }
    });
    $('#backTop').click(function() {
        $('body, html').animate({scrollTop: 0}, 500);
    });
});