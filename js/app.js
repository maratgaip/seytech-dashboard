(function ($) {

    'use strict';

	// Add scroll class
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 50) {
            $(".sticky").addClass("nav-sticky");
        } else {
            $(".sticky").removeClass("nav-sticky");
        }
    });

	//Scrollspy
    $(".navbar-nav").scrollspy({
        offset: 20
    });

	//owlCarousel
    $("#owl-demo").owlCarousel({
        autoPlay: 15000, //Set AutoPlay to 3 seconds
        items: 2,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [979, 2]
    });

    // Show video after loaded
    setTimeout( () => $(".video-overlay").addClass("hide"), 3000)

})(jQuery)