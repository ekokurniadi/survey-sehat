jQuery(document).ready(function($) {
    $(document).on("click","a.sp_nav-btn",function(){
        $(".main-nav").stop(true,false).slideToggle();
        return false;
    })

});