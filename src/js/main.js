$('#types')
  .find('.slick')
  .slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    mobileFirst: true,
    slidesToScroll: 1,
    arrows: false,
    centerMode: true,
    responsive: [
      {
        breakpoint: 991,
        settings: 'unslick',
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          centerMode: false,
        },
      },
      {
        breakpoint: 400,
        settings: {
          slidesToShow: 2,
          initialSlide: 1,
        },
      },
    ],
  });

$('#advantages')
  .find('.slick')
  .slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    mobileFirst: true,
    slidesToScroll: 1,
    arrows: false,
    responsive: [
      {
        breakpoint: 991,
        settings: 'unslick',
      },
      {
        breakpoint: 540,
        settings: {
          slidesToShow: 2,
          initialSlide: 1,
        },
      },
    ],
  });

$('#steps')
  .find('.slick')
  .slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    mobileFirst: true,
    slidesToScroll: 1,
    arrows: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: 'unslick',
      },
      {
        breakpoint: 540,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });
