$(document).ready(function () {
    $('.scrollspy').scrollSpy();
    $(".button-collapse").sideNav();
    $(".pgwSlideshow").pgwSlideshow({
        transitionEffect: "fading",
        //autoSlide: true,
	//intervalDuration: 3000
    });
    $('.dropdown-button-menu').dropdown({
        inDuration: 500,
        outDuration: 500,
        constrain_width: false,
        hover: true,
        gutter: 0,
        belowOrigin: true,
        alignment: 'right'
    });
    $('.dropdown-button-submenu').dropdown({
        inDuration: 500,
        outDuration: 500,
        constrain_width: true,
        hover: true,
        gutter: 0,
        belowOrigin: false,
        alignment: 'right'
    });
});
