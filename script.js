$(function(){
    var targetPosition = $('nav').offset().top;

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();

            if (scroll >= targetPosition){
                $('nav').addClass("motion");
            }else{
                $('nav').removeClass("motion");
            }      
    });
});

$(function(){
    var targetPosition = $('.cafe').offset().top;
    
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
    
            if (scroll >= targetPosition - 240){
                $('.jump').addClass('fadein');
            }else{
                $('.jump').removeClass('fadein');
            }      
     });
});

$(function(){
    $('.jump').click(function(){
        $('html,body').animate({scrollTop:0});
    });
});

$(function(){
    $('.alert a,.menu,.signin').hover(function(){
        $(this).css('opacity','0.8');
    },function(){
        $(this).css('opacity','')
    });
});

$(function(){
    $('.signin').on('click',function(){
        $('.open_modal').fadeIn();
        $('.signin_box').css({'margin-top':'0','opacity':'1'});
    });
    $('.overlay').on('click',function(){
        $('.open_modal').fadeOut();
        $('.signin_box').css({'margin-top':'50vh','opacity':'0'});
    });
});

