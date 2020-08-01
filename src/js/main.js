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

var wpcf7Elm = document.querySelectorAll('.wpcf7');

for (var i = 0; i < wpcf7Elm.length; i++) {
  wpcf7Elm[i].addEventListener(
    'wpcf7mailsent',
    function (event) {
      ym(65958358, 'reachGoal', 'zayavka');
      api_push(this);
    },
    false
  );
}

function api_push(e) {
  console.log('api push init');
  let slug = window.location.href;

  let num = $(e).find('div.form_source_id').text();
  let city = $('footer').data('city');

  let phone = $(e).find('input[name="your_tel"]').val();
  let name = $(e).find('input[name="your_name"]').val();
  let model = $(e).find('input[name="your_model"]').val();
  let year = $(e).find('input[name="your_sum"]').val();

  // calc
  // let dateto = $(e).find('input[name="calc_term"]').val();
  // let every = $(e).find('input[name="calc_payment"]').val();
  // let pocent = $(e).find('input[name="calc_rate_range"]').val();
  // let total = $(e).find('#calc_payments_sum').text();
  // let sumcr = $(e).find('input[name="calc_sum"]').val();

  console.log('sumcr', sumcr);
  console.log('dateto', dateto);
  console.log('every', every);
  console.log('pocent', pocent);
  console.log('total', total);
  console.log('slug', slug);
  console.log('num', num);
  console.log('city', city);

  $.post({
    url: '/wp-admin/admin-ajax.php',
    data: {
      action: 'send_request',

      city: city,
      dateto: dateto,
      every: every,
      pocent: pocent,
      total: total,
      sumcr: sumcr,
      slug: slug,
      num: num,
      phone: phone,
      name: name,
      model: model,
      year: year,
    },
    success: function (data) {
      console.log(data);
    },
    error: function (errorThrown) {
      console.log(errorThrown);
    },
  });
  return false;
}