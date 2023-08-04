$(document).ready(function () {
    $('.slider').slick({
        dots: true,
        fade: true,
        cssEase: 'ease-in-out',
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        touchMove: true,
        swipe: true,
        swipeToSlide: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 10000,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        ]
    });
});

$(document).ready(function () {

    var contentSlider = $('#content-slider');
    contentSlider.slick({
        arrows: false,
        swipe: true,
    });

    $('.prev-btn').on('click', function () {
        contentSlider.slick('slickPrev');
    });

    $('.next-btn').on('click', function () {
        contentSlider.slick('slickNext');
    });


});

$(document).ready(function() {

    var contentSlider = $('#content-slider-about');
    contentSlider.slick({
        arrows: false,
        swipe: true,
    });

    $('.prev-btn').on('click', function() {
        contentSlider.slick('slickPrev');
    });

    $('.next-btn').on('click', function() {
        contentSlider.slick('slickNext');
    });


});

document.addEventListener('livewire:load', function () {
    Livewire.on('showToast', function () {
        console.log('toast');
        setTimeout(function () {
            Livewire.emit('hideToast', false);
        }, 1000);
    });
});
