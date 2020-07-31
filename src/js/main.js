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

function set_calc(e) {
  let val = $(e).prev().val().replace(/[^\d]/g, '');
  $('#calc_sum').val(val);
  document.getElementById('calc_sum_range').noUiSlider.set(val);
  calcResult();
  $('html,body').animate({ scrollTop: $('#calc').offset().top }, 'slow');

  return false;
}

$('a[href*="#"]')
  .not('a[href="#"]') // Exception #1: dummy hrefs
  .not('a[href="#formModal"]') // Exception #1: dummy hrefs
  .on('click', function (e) {
    var linktHref = this.href.split('#');

    if (linktHref[1] === '') {
      return;
    }
    var currentUrlRoot = window.location.href.split('#')[0],
      scrollToAnchor = $('#' + linktHref[1]);
    currentUrlRoot = currentUrlRoot.replace(/\/$/, '');
    linktHref[0] = linktHref[0].replace(/\/$/, ''); // Do not animate for targets on another page

    if (linktHref[0] !== currentUrlRoot || !scrollToAnchor.length) {
      return;
    }

    $('html, body').animate(
      {
        scrollTop: scrollToAnchor.offset().top - 60,
      },
      parseInt(500, 10)
    );
    e.preventDefault();
    return false;
  });

function show_all_cities(e) {
  $('#cityModal').find('.cities').fadeToggle();
  $('#cityModal')
    .find('.cities+button')
    .addClass('d-none')
    .removeClass('d-block');
}

$("input[type='tel']").mask('+7(999) 999-9999');
