$('.schedule-container1').slick({
  infinite: false,
  speed: 600,
  slidesToShow: 3,
  slidesToScroll: 4,
  prevArrow: '<button type="button" class="prev1"></button>',
  nextArrow: '<button type="button" class="next1"></button>',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 3
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

$('#slider').slick('setPosition');


