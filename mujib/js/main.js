$(document).ready(function () {

    //Toggler Menu Button
    $(".navbar-toggler").on("click", function () {
        $(this).toggleClass('close-toggler');
        $(".navbar-collapse").toggleClass('show-navbar');
    });

    //Fixed Navbar
    $(window).scroll(function() {
        var scroll = $(this).scrollTop();   
        if (scroll >= 100 ) {
            $(".navbar").addClass("navbar_fixed");
            $(".toTop").css("bottom", "25px");
        } else {
            $(".navbar").removeClass("navbar_fixed");
            $(".toTop").css("bottom", "-100%");
        }
    });

    //Toggle Active Class for Navigation bar
    $(".navbar-nav .nav-item").on("click", function (e) {
        // e.preventDefault();
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });



    // Request a Demo Form =====================
    $(".demo-form .form-control").on({
        "focus": function (e) {
            $(this).next('span').addClass('fullHeightBg');
        },
        "blur": function () {
            if(!$(this).val().trim()) {
                $(this).next('span').removeClass('fullHeightBg');
        }}
    });

   
    

    //Print Current Year Inside Copyright ===========
    $("#fullYear").html(new Date().getFullYear());

});
