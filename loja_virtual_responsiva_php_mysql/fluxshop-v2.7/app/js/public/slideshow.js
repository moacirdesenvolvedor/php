$(function () {
    var slide_responsive = [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ];


    $('#slide-depoimento').slick({
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });
    if ($('#slide-depoimento .item').length <= 0) {
        $('#elm-depoimento').remove();
    }

    $('#banner-meio').slick({
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });
    $('#slide-top').slick({
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('#produto-oferta').slick({
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
        dots: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: slide_responsive
    });
    if ($('#produto-oferta .box-produto').length <= 0) {
        $('#elm-produto-oferta').remove();
    }

    if ($('#produto-sugerido .box-produto').length <= 0) {
        $('#elm-produto-sugerido').remove();
    }
    $('#produto-destaque').slick({
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        infinite: true,
        //speed: 7000,
        slidesToShow: 4,
        slidesToScroll: 2,
        //centerMode: true,
        //centerPadding: '90px',
        responsive: slide_responsive
    });

    if ($('#produto-destaque .box-produto').length <= 0) {
        $('#elm-produto-destaque').remove();
    }
});