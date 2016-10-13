$(document).ready(function () {
    $('.scrollspy').scrollSpy();
    $(".button-collapse").sideNav();
    $('.owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        navText: ["<", ">"],
        autoplay: true,
        autoplayTimeout: 5000
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