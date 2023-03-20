var owl = $('.owl-carousel');
owl.owlCarousel({
    autoplayHoverPause: true,
    responsive: {
        0: {
          items: 1
        },
        500: {
          items: 3
        },
        1000: {
          items: 2
        },
        1400: {
            items: 4
        },
        1900: {
            items:5
        }
    }
});

$('.owl-carousel__next').click(() => owl.trigger('next.owl.carousel'))

$('.owl-carousel__prev').click(() => owl.trigger('prev.owl.carousel'))

$(".owl-carousel").on('initialized.owl.carousel changed.owl.carousel refreshed.owl.carousel', function (e) {
    if (!e.namespace) return;
    var carousel = e.relatedTarget,
        current = carousel.current();
    if (current > 0) {
        $('.owl-carousel__prev').addClass("showBtn");
    } else {
        $('.owl-carousel__prev').removeClass("showBtn");
    }
    if (current === carousel.maximum()) {
        $('.owl-carousel__next').addClass('hideBtn');
    } else {
        $('.owl-carousel__next').removeClass('hideBtn');
    }
});

// Action see more

$('.btn-see-more').click(() => {
    $('.content-see-more').addClass("showBtn")
    $('.btn-see-more').addClass("hideBtn")
    $('.btn-close-see-more').addClass("showBtn")
})

$('.btn-close-see-more')
$('.btn-close-see-more').click(() => {
    $('.content-see-more').removeClass("showBtn")
    $('.btn-close-see-more').removeClass("showBtn")
    $('.btn-see-more').removeClass("hideBtn")
})

$('.icon-menu-header-right').click(() => $('.modal-menu-header-right').toggle("showBtn"))
$('.main').click(() => $('.modal-menu-header-right').css("display", 'none'))

