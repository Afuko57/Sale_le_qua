var slickopts = {
  slidesToShow: 3,
  slidesToScroll: 3,
  rows: 2, // Removes the linear order. Would expect card 5 to be on next row, not stacked in groups.
  responsive: [
    { breakpoint: 800,
      settings: {
        slidesToShow: 2
      }
    },
    { breakpoint: 500,
      settings: {
        slidesToShow: 1,
        rows: 1 // This doesn't appear to work in responsive (Mac/Chrome)
      }
    }]
};

$('.carousel').slick(slickopts);

var spanElement = $(".row carousel").find(".card :first");
        $(spanElement ).addClass("active");
      
