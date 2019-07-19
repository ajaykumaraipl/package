$(document).ready(function(){
    /* check if 'select all' is checked */
    $(".all-checkboxes").click(function(){
        var atLeastOneIsCheckedMain = $('input[name="chkMain[]"]:checked').length > 0;
        if(atLeastOneIsCheckedMain == true){
            $(".options-for-checked-checkboxes").css("display","inline-block");
            $(".checkbox-info").children("p").text("Unselect all");
            $(".selectall-sm-div").children("p").text("Unselect all");
            $(".dashboard-checkboxes-table").children().prop("checked", true);
        }else{
            $(".options-for-checked-checkboxes").css("display","none");
            $(".checkbox-info").children("p").text("Select all");
            $(".selectall-sm-div").children("p").text("Select all");
            $(".dashboard-checkboxes-table").children().prop("checked", false);
        }
    });
    
    /* check if any checkbox is checked and show/hide the unpublish/delete option */
    $(".dashboard-checkboxes-table").click(function(){
        var atLeastOneIsChecked = $('input[name="chk[]"]:checked').length > 0;
        if(atLeastOneIsChecked == true){
            $(".options-for-checked-checkboxes").css("display","inline-block");
            $(".checkbox-info").children("p").text("Unselect all");
            $(".selectall-sm-div").children("p").text("Unselect all");
        }else{
            $(".options-for-checked-checkboxes").css("display","none");
            $(".checkbox-info").children("p").text("Select all");
            $(".selectall-sm-div").children("p").text("Select all");
            $(".prio-checkbox-title").children().prop("checked", false);
        }
    });

    /* lightbox1 hide */
    $(".lightbox1-background").click(function(){
        $(".lightbox1").css("display","none");
    });

    /* lightbox1 show */
    $(".delete-lightbox1").click(function(){
        $(".lightbox1").css("display","inline-flex");
    });
});


