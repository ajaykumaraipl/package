$(document).ready(function(){
    $(".bubble").click(function(){
        $(".bubble").removeClass("activeBubble");
        $(this).addClass("activeBubble");
    });
    $(".bubble1").click(function(){
        $(".contentRightVideo").hide();
        $(".contentRightVideo1").show();
    });
    $(".bubble2").click(function(){
        $(".contentRightVideo").hide();
        $(".contentRightVideo2").show();
    });
    $(".bubble3").click(function(){
        $(".contentRightVideo").hide();
        $(".contentRightVideo3").show();
    });
    
    $('.search-div1 input').blur(function() {
        $(this).parent().children("svg").children("path").removeClass("activeSearch");
    })
    .focus(function() {
        $(this).parent().children("svg").children("path").addClass("activeSearch");
    });

    $(".prioContainedButtonPrimaryDiv").click(function(){
        $(this).children("a").addClass("disabled");
        $(".booknowPopup").toggle();
    });

    $(".targetDots").click(function(){
        $(".targetDotsPopup").toggle();
        $(document).mouseup(function(e) 
        {
            var targetDotsPopup = $(".targetDotsPopup");

            // if the target of the click isn't the container nor a descendant of the container
            if (!targetDotsPopup.is(e.target) && targetDotsPopup.has(e.target).length === 0) 
            {
                targetDotsPopup.hide();
            }
        });
    });

    $('.topInput').on("focus", function(){
        $(this).parent().children("svg").children("path").addClass("active");
    });
    $('.topInput').click(function(){
        $(".lightbox-version2").hide();
        $(".lightbox-version3").hide();
        $(".lightbox-version1").show();
        $(".lightbox-version1").find(".lightbox-background").animate({'opacity': 1}, 200);
        $(".lightbox-version1").find(".lightbox-popup-content-inside").animate({
            opacity: 1
        },300, function() {
        // Animation complete.
        });
    });
    $(".lightbox-version1 .lightbox-background").click(function(){
        $(".topInput").parent().children("svg").children("path").removeClass("active");
        $(".lightbox-version1").hide();
        $(".lightbox-version1").find(".lightbox-background").animate({'opacity': 0}, 200);
        $(".lightbox-version1").find(".lightbox-popup-content-inside").animate({
            opacity: 0
        },300, function() {
        // Animation complete.
        });
    });

    $('.shopPopup').click(function(){
        $(".lightbox-version1").hide();
        $(".lightbox-version3").hide();
        $(".lightbox-version2").show();
        $(".lightbox-version2").show();
        $(".lightbox-version2").find(".lightbox-background").animate({'opacity': 1}, 200);
        $(".lightbox-popup2").animate({
            opacity: 1
        },300, function() {
        // Animation complete.
        });
    });
    $(".lightbox-version2 .lightbox-background").click(function(){
        $(".lightbox-version2").hide();
        $(".lightbox-version2").find(".lightbox-background").animate({'opacity': 0}, 200);
        $(".lightbox-popup2").animate({
            opacity: 0
        },300, function() {
        // Animation complete.
        });
    });



    $(".lightbox-version3 .lightbox-background").click(function(){
        $(".lightbox-version3").hide();
        $(".lightbox-version3").find(".lightbox-background").animate({'opacity': 0}, 200);
        $(".lightbox3-popup-content").animate({
            opacity: 0
        },300, function() {
        // Animation complete.
        });
    });
    $(".closeHostCode").click(function(){
        $(".lightbox-version3").hide();
        $(".lightbox-version3").find(".lightbox-background").animate({'opacity': 0}, 200);
        $(".lightbox3-popup-content").animate({
            opacity: 0
        },300, function() {
        // Animation complete.
        });
    });
    $(".submitHostCode").click(function(){
        var hostCodeValue = $("#hostCode").val();
        if(hostCodeValue == "521463"){
            $(".submitHostCode").hide();
            $("#hostCode").css("border","1px solid #EAEAEA");
            $(".errorMessage p").html("");
            $(".hostCodePermission").show();
        }else{
            $("#hostCode").css("border","1px solid #FF4411");
            $(".errorMessage p").html("This code is not available. Please re-type it.");
        }
    });
    $(".cancelHostCode").click(function(){
        $("#hostCode").val("");
        var hostCodeValue = $("#hostCode").val();
        $(".hostCodePermission").hide();
        $(".submitHostCode").show();
    });
    $(".targetDotsPopup-item").click(function(){
        $(".lightbox-version1").hide();
        $(".lightbox-version2").hide();
        $(".lightbox-version3").css("display","flex");
        $(".lightbox-version3").find(".lightbox-background").animate({'opacity': 1}, 200);
        $(".lightbox3-popup-content").animate({
            opacity: 1
        },300, function() {
        // Animation complete.
        });
    });

    $(".contentNews").niceScroll({
		cursorcolor:"#BCBCBC",
		cursorwidth:"6px",
		cursorborder:"0px",
		cursorborderradius:"10px",
		autohidemode: false,
		smoothscroll: true,
		grabcursorenabled: true
    });



    /* sales panel 
    ==============================*/
    $(".col1").mouseenter(function() {
        $(".col1Info").show();
    }).mouseleave(function() {
        $(".col1Info").hide();
    });
    $(".col2").mouseenter(function() {
        $(".col2Info").show();
    }).mouseleave(function() {
        $(".col2Info").hide();
    });
    $(".col3").mouseenter(function() {
        $(".col3Info").show();
    }).mouseleave(function() {
        $(".col3Info").hide();
    });
    $(".col4").mouseenter(function() {
        $(".col4Info").show();
    }).mouseleave(function() {
        $(".col4Info").hide();
    });
    $(".col5").mouseenter(function() {
        $(".col5Info").show();
    }).mouseleave(function() {
        $(".col5Info").hide();
    });
	var cities = [
		"American Tours",
		"Brighton Tours",
		"London School",
		"London Tours and Tickets",
		"London City Sightseeing",
		"Bucharest",
		"Madrid",
        "Barcelona",
        "American Tours",
		"Brighton Tours",
		"London School",
		"London Tours and Tickets",
        "London City Sightseeing",
        "American Tours",
		"Brighton Tours",
		"London School",
		"London Tours and Tickets",
		"London City Sightseeing"
	]; 
	var citiesLength = cities.length;
	for(var j=0;j<citiesLength;j++){
        $(".dropdownPartner .option-box .wrapOptionBox").append('<div class="option-box-item"><p>' + cities[j] + "</p></div>");
        $(".wrapOptionBox").getNiceScroll().resize();
    }
    if(citiesLength > 5){
        $(".cursor-background").css("display","block");
        $(".wrapOptionBox").css("height","175px");
        $(".wrapOptionBox").css("overflow-y","auto");
        $(".wrapOptionBox").getNiceScroll().resize();
    }
    $(".wrapOptionBox").getNiceScroll().resize();
    $(".option-box-item").click(function(){
        var activeOption = $(this).children("p").text();
        if(activeOption.length > 20) activeOption = activeOption.substring(0, 20);
        $(".partnerSalesOption").children().children("span").html(activeOption);
        $(".dropdownPartner").css("display","none");
        $(".prio-buttonPopup").removeClass("prio-buttonPopupActive");
        $(".wrapOptionBox").getNiceScroll().resize();
    });

    $(".partnerInput").keyup(function(){
        $(".dropdownPartner .option-box .wrapOptionBox").html('<div class="cursor-background"></div>');
		var lengthValue = $(".partnerInput").val().length;
        var inputValue = $(".partnerInput").val();
        var ktCities = 0;
		for(var j=0;j<citiesLength;j++){
			if(cities[j].substring(0,lengthValue).toLowerCase() == inputValue.toLowerCase()){
                $(".dropdownPartner .option-box .wrapOptionBox").append('<div class="option-box-item"><p>' + cities[j] + "</p></div>");
                ktCities++;
			}
        }
        if(ktCities == 0){
            $(".wrapOptionBox").append('<p class="oops">Oops! No partner found with this name.</p>');
            $(".wrapOptionBox").css("overflow-y","hidden");
            $(".cursor-background").css("display","none");
        }
        if(ktCities > 5){
            $(".cursor-background").css("display","block");
            $(".wrapOptionBox").css("height","175px");
        }
        if(ktCities < 5 && ktCities > 0){
            $(".wrapOptionBox").css("overflow-y","hidden");
            $(".cursor-background").css("display","none");
            $(".wrapOptionBox").css("height","auto");
        }
        $(".wrapOptionBox").getNiceScroll().resize();
    });
    $(".wrapOptionBox").niceScroll({
		cursorcolor:"#BCBCBC",
		cursorwidth:"4px",
		cursorborder:"0px",
		cursorborderradius:"10px",
		autohidemode: false,
		smoothscroll: true,
        grabcursorenabled: true,
        cursordragontouch: true
    });
    $(".tags .button").click(function(){
        if($(this).hasClass("active")){
            $(this).removeClass("active");
            $(this).find("a").css("background-color","transparent");
            $(this).find("a").css("border","1px solid #BCBCBC");
            $(this).find("a").css("padding-top","5.2px");
            $(this).find("a").css("padding-bottom","6px");
            $(this).find("a").css("padding-left","9px");
            $(this).find("a").css("padding-right","10px");
            $(this).find("span").css("color","#BCBCBC");
            $(this).find("img").css("display","none");
        }else{
            $(this).addClass("active");
            $(this).find("a").css("background-color","#1BB7C2");
            $(this).find("a").css("border","1px solid #1BB7C2");
            $(this).find("a").css("padding-top","3px");
            $(this).find("a").css("padding-bottom","2.5px");
            $(this).find("a").css("padding-left","9px");
            $(this).find("a").css("padding-right","10px");
            $(this).find("span").css("color","#fff");
            $(this).find("img").css("display","inline-block");
            $(".tags .all").removeClass("active");
            $(".tags .all").find("a").css("background-color","transparent");
            $(".tags .all").find("a").css("border","1px solid #BCBCBC");
            $(".tags .all").find("a").css("padding-top","3px");
            $(".tags .all").find("a").css("padding-bottom","3px");
            $(".tags .all").find("a").css("padding-left","10px");
            $(".tags .all").find("a").css("padding-right","11px");
            $(".tags .all").find("span").css("color","#BCBCBC");
            $(".tags .all").find("img").css("display","none");
        }
    });

    $(".tags .all").click(function(){
        $(".tags .button").removeClass("active");
        $(".tags .button").find("a").css("background-color","transparent");
        $(".tags .button").find("a").css("border","1px solid #BCBCBC");
        $(".tags .button").find("a").css("padding-top","5.8px");
        $(".tags .button").find("a").css("padding-bottom","6.4px");
        $(".tags .button").find("a").css("padding-left","10px");
        $(".tags .button").find("a").css("padding-right","10px");
        $(".tags .button").find("span").css("color","#BCBCBC");
        $(".tags .button").find("img").css("display","none");
        $(this).addClass("active");
        $(this).find("a").css("background-color","#1BB7C2");
        $(this).find("a").css("border","1px solid #1BB7C2");
        $(this).find("a").css("padding-top","2.2px");
        $(this).find("a").css("padding-bottom","2.6px");
        $(this).find("a").css("padding-left","6px");
        $(this).find("a").css("padding-right","9px");
        $(this).find("span").css("color","#fff");
        $(this).find("img").css("display","inline-block");
    });
    
    $(".tags .showMore").click(function(){
        $(".tags .hideBttn").css("display","inline-block");
        $(this).css("display","none");
        $(".tags .showLess").css("display","inline-block");
    });

    $(".tags .showLess").click(function(){
        $(".tags .hideBttn").css("display","none");
        $(this).css("display","none");
        $(".tags .showMore").css("display","inline-block");
    });


    $(".button-titleCategory a").click(function(){
        if($(".dropdownSortBy").hasClass("active")){
            $(".button-titleCategory a img").css("transform","rotate(0deg");
            $(".dropdownSortBy").removeClass("active");
        }else{
            $(".button-titleCategory a img").css("transform","rotate(180deg");
            $(".dropdownSortBy").addClass("active");
            $(document).mouseup(function(e) 
            {
                var dropdownSortBy = $(".dropdownSortBy");

                // if the target of the click isn't the container nor a descendant of the container
                if (!dropdownSortBy.is(e.target) && dropdownSortBy.has(e.target).length === 0) 
                {
                    dropdownSortBy.removeClass("active");
                }
            });
        }
    });

    $(".sales-panel-all .prio-buttonPopup").mouseenter(function() {
        $(this).addClass("prio-buttonPopupActive");
        $(".dropdownPartner").show();
        $(".wrapOptionBox").getNiceScroll().resize();
    }).mouseleave(function() {
        $(this).removeClass("prio-buttonPopupActive");
        $(".dropdownPartner").hide();
        $(".wrapOptionBox").getNiceScroll().resize();
    });

    $(".sales-panel-all .dropdownPartnerRelative").mouseenter(function() {
        $(".prio-buttonPopup").addClass("prio-buttonPopupActive");
        $(".dropdownPartner").show();
        $(".wrapOptionBox").getNiceScroll().resize();
    }).mouseleave(function() {
        $(".prio-buttonPopup").removeClass("prio-buttonPopupActive");
        $(".dropdownPartner").hide();
        $(".wrapOptionBox").getNiceScroll().resize();
    });
    


    $(function() {
        $(".dropdown-partner-toggle").click(function() {
            $(".dropdownPartner").toggle();
            $(".row-input").toggleClass("row-input-active");
            $(".wrapOptionBox").getNiceScroll().resize();
            $(document).mouseup(function(e) 
            {
                var container = $(".dropdownPartner");

                // if the target of the click isn't the container nor a descendant of the container
                if (!container.is(e.target) && container.has(e.target).length === 0) 
                {
                    $(".row-input").removeClass("row-input-active");
                    container.hide();
                }
            });
            return false;
        });
    });

    $(".option-box-item").click(function(){
        var partnerValuePage1 = $(this).children('p').html();
        $(".row-input").removeClass("row-input-active");
        $(".dropdown-partner-toggle-p").text(partnerValuePage1);
    });

    $(".large-button-left").click(function(){
        $(this).children("p").css("color","#fff");
        $(this).children(".large-button-active-left").show();
        $(".large-button-active-right").hide();
        $(".large-button-right").children("p").css("color","#1BB7C2");
    });
    $(".large-button-right").click(function(){
        $(this).children("p").css("color","#fff");
        $(this).children(".large-button-active-right").show();
        $(".large-button-active-left").hide();
        $(".large-button-left").children("p").css("color","#1BB7C2");
    });

    /* lightbox add partner */
    $(".close-lightbox1").click(function(){
        $(".lightbox-add-partner").css("display","none");
    });
    $(".lightbox-add-partner-overlay").click(function(){
        $(".lightbox-add-partner").css("display","none");
    });
    $(".add-new-partner").click(function(){
        $(".lightbox-add-partner").css("display","block");
    });

    $(".p-row-tags-1").children().click(function(){
        $(".p-row-tags-1").children().removeClass("p-row-tag-active");
        $(this).addClass("p-row-tag-active");
    });
    $(".p-row-tags-2").children().click(function(){
        $(".p-row-tags-2").children().removeClass("p-row-tag-active");
        $(this).addClass("p-row-tag-active");
    });
    $(".p-row-tags-3").children().click(function(){
        $(".p-row-tags-3").children().removeClass("p-row-tag-active");
        $(this).addClass("p-row-tag-active");
    });
    $(".p-row-tags-4").children().click(function(){
        $(".p-row-tags-4").children().removeClass("p-row-tag-active");
        $(this).addClass("p-row-tag-active");
    });
    $(".p-row-tags-5").children().click(function(){
        $(".p-row-tags-5").children().removeClass("p-row-tag-active");
        $(this).addClass("p-row-tag-active");
    });
    $(".p-row-tags-6").children().click(function(){
        $(".p-row-tags-6").children().removeClass("p-row-tag-active");
        $(this).addClass("p-row-tag-active");
    });

    $(".switch-entrance").children().children("input").change(function() {
        if($(this).is(":checked")) {
            $(".extra-entrance-table-div").css("display","block");
            $(".extra-entrance-popup-wrap").getNiceScroll().resize();
        }
        else {
            $(".extra-entrance-table-div").css("display","none");
            $(".extra-entrance-popup-wrap").getNiceScroll().resize();
        }
    });

    $(function() {
        $(".dropdown-partner-toggle2").click(function() {
            $(".extra-entrance-popup").toggle();
            $(".extra-entrance-popup-wrap").getNiceScroll().resize();
            $(this).toggleClass("dropdown-partner-toggle2-active");
            return false;
        });
    });
    $(document).click(function() {
        $(".extra-entrance-popup").hide();
        $(".dropdown-partner-toggle2").removeClass("dropdown-partner-toggle2-active");
    });
    $(".extra-entrance-popup-row").click(function(){
        var extraEntrance = $(this).children("p").html();
        $(".dropdown-partner-toggle2").children("p").text(extraEntrance);
        $(".extra-entrance-popup-row").removeClass("extra-entrance-popup-row-active");
        $(this).addClass("extra-entrance-popup-row-active");

    });
    $(".extra-entrance-popup-wrap").niceScroll({
		cursorcolor:"#BCBCBC",
		cursorwidth:"4px",
		cursorborder:"0px",
		cursorborderradius:"10px",
		autohidemode: false,
		smoothscroll: true,
        grabcursorenabled: true,
        cursordragontouch: true
    });
    // counter ticket 1
    var counterTicket1 = 0;
    $(".buttons-row-1 .button-left").click(function(){
        counterTicket1--;
        if(counterTicket1 < 0){
            counterTicket1 = 0;
        }
        $(".buttons-row-1").children(".counter1").val(counterTicket1);
    });
    $(".buttons-row-1 .button-right").click(function(){
        counterTicket1++;
        $(".buttons-row-1").children(".counter1").val(counterTicket1);
    });

    // counter ticket 2
    var counterTicket2 = 0;
    $(".buttons-row-2 .button-left").click(function(){
        counterTicket2--;
        if(counterTicket2 < 0){
            counterTicket2 = 0;
        }
        $(".buttons-row-2").children(".counter2").val(counterTicket2);
    });
    $(".buttons-row-2 .button-right").click(function(){
        counterTicket2++;
        $(".buttons-row-2").children(".counter2").val(counterTicket2);
    });

    // counter ticket 3
    var counterTicket3 = 0;
    $(".buttons-row-3 .button-left").click(function(){
        counterTicket3--;
        if(counterTicket3 < 0){
            counterTicket3 = 0;
        }
        $(".buttons-row-3").children(".counter3").val(counterTicket3);
    });
    $(".buttons-row-3 .button-right").click(function(){
        counterTicket3++;
        $(".buttons-row-3").children(".counter3").val(counterTicket3);
    });

    // counter ticket 4
    var counterTicket4 = 0;
    $(".buttons-row-4 .button-left").click(function(){
        counterTicket4--;
        if(counterTicket4 < 0){
            counterTicket4 = 0;
        }
        $(".buttons-row-4").children(".counter4").val(counterTicket4);
    });
    $(".buttons-row-4 .button-right").click(function(){
        counterTicket4++;
        $(".buttons-row-4").children(".counter4").val(counterTicket4);
    });

    // counter ticket 5
    var counterTicket5 = 0;
    $(".buttons-row-5 .button-left").click(function(){
        counterTicket5--;
        if(counterTicket5 < 0){
            counterTicket5 = 0;
        }
        $(".buttons-row-5").children(".counter5").val(counterTicket5);
    });
    $(".buttons-row-5 .button-right").click(function(){
        counterTicket5++;
        $(".buttons-row-5").children(".counter5").val(counterTicket5);
    });

    // counter ticket 6
    var counterTicket6 = 0;
    $(".buttons-row-6 .button-left").click(function(){
        counterTicket6--;
        if(counterTicket6 < 0){
            counterTicket6 = 0;
        }
        $(".buttons-row-6").children(".counter6").val(counterTicket6);
    });
    $(".buttons-row-6 .button-right").click(function(){
        counterTicket6++;
        $(".buttons-row-6").children(".counter6").val(counterTicket6);
    });



    $(".p-row-page4-item-available").click(function(){
        $(this).toggleClass("p-row-page4-item-active");
    });
    $(".p-row-page5-item-available").click(function(){
        $(this).toggleClass("p-row-page5-item-active");
    });
    $(".p-row-page6-item").click(function(){
        $(".p-row-page6-item").removeClass("p-row-page6-item-active");
        $(this).addClass("p-row-page6-item-active");
    });
    $(".p-row-page6-item-v2").click(function(){
        $(".p-row-page6-item-v2").removeClass("p-row-page6-item-v2-active");
        $(this).addClass("p-row-page6-item-v2-active");
    });
    $(".p-row-button-submit-div").click(function(){
        $(".lightbox-page6").css("display","flex");
    });
    $(".lightbox-page6").children().children(".close").click(function(){
        $(".lightbox-page6").hide();
    });
    $(".lightbox-page6-background").click(function(){
        $(".lightbox-page6").hide();
    });
});