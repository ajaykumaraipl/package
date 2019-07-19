$(document).ready(function(){
    /* toggle left menu */
    var counterBurger = 0;
    $(".burger-button").click(function(){
        counterBurger++;
        if(counterBurger % 2 == 0){
            $(".navbar-left").css({
                "width": "272px",
                "text-align": "left"
            });
            $(".prio-row1").css("padding-top","24px");
            $(".prio-row3").css("padding-top","48px");
            $(".top-navbar").css({
                "width": "calc(100% - 272px)",
                "margin-left": "272px"
            });
            $(".main-content-dashboard").css({
                "width": "calc(100% - 272px)",
                "margin-left": "272px"
            });
            $(".lightbox1").css({
                "width": "calc(100% - 272px)",
                "left": "272px"
            });
            $(".tag-sm").css("display","none");
            $(".navbar-left-lg").css("display","inline-block");
        }else{
            $(".navbar-left").css({
                "width": "80px",
                "text-align": "center"
            });
            $(".prio-row1").css("padding-top","28px");
            $(".prio-row3").css("padding-top","144px");
            $(".top-navbar").css({
                "width": "calc(100% - 80px)",
                "margin-left": "80px"
            });
            $(".main-content-dashboard").css({
                "width": "calc(100% - 80px)",
                "margin-left": "80px"
            });
            $(".lightbox1").css({
                "width": "calc(100% - 80px)",
                "left": "80px"
            });
            $(".tag-sm").css("display","block");
            $(".navbar-left-lg").css("display","none");
        }
    });

    /* nicescroll for left navbar */
    $(".navbar-left").niceScroll({
		cursorcolor:"#BCBCBC",
		cursorwidth:"4px",
		cursorborder:"0px",
		cursorborderradius:"50px",
		autohidemode: false,
		smoothscroll: true,
		grabcursorenabled: true
    });

    /* notifications popup */
    $(".notifications").click(function(){
        $(".user-popup").removeClass("user-popup-active");
        $(".notifications-popup").toggleClass("notifications-popup-active");
        $(".user").removeClass("user-active");
        $(".notifications").toggleClass("notifications-active");
    });

    /* user popup */
    $(".user").click(function(){
        $(".notifications-popup").removeClass("notifications-popup-active");
        $(".user-popup").toggleClass("user-popup-active");
        $(".notifications").removeClass("notifications-active");
        $(".user").toggleClass("user-active");
    });
});


