<section id="first-screen" class="row overflow-hidden bg-lightgrey">
  <div class="container mx-auto">
    <div class="row">
      <div class="col-12 col-md-6 pr-0 pt-5">
        <h1><?= get_headlines($post->ID, $post->post_name, 'firstScreen') ?></h1>
        <?php if ($post->post_name === 'contacts') { ?>
          <div class="row mt-5 mb-lg-5 row-cols-1 row-cols-lg-2">
            <div class="col">
              <div class="py-2 my-auto">
                <p class="semibold mb-0">Адрес:</p>
                <p><a href="#" class="smaller text-main text-dashed"><?= get_city() . ', ' . city_address(get_current_blog_id()); ?></a></p>
              </div>
            </div>
            <div class="col">
              <div class="py-2 my-auto">
                <p class="semibold mb-0">Телефон:</p>
                <p>
                  <a href="tel:<?= get_phone(true); ?>" class="smaller semibold"><?= get_phone(); ?></a>
                </p>
              </div>
            </div>
            <div class="col">
              <div class="py-2 my-auto">
                <p class="semibold mb-0">Электронная почта:</p>
                <p>
                  <a href="mailto:info@autolombard-autozalog.ru" class="smaller text-main text-dashed">info@autolombard-autozalog.ru</a>
                </p>
              </div>
            </div>
            <div class="col">
              <div class="py-2 my-auto">
                <p class="semibold mb-0">Часы работы:</p>
                <p class="smaller text-nowrap mt-1">Ежедневно с 8:00 до 20:00. Прием заявок 24/7</p>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <div class="row mt-5 mb-lg-5 px-3 px-md-0">
            <p class="with-logo">
              <picture>
                <source srcset="<?= get_with_path('img/logo.webp'); ?>" type="image/webp">
                <img src="<?= get_with_path('img/logo.png'); ?>" alt="">
              </picture> выдает займы под залог ПТС и авто в <?= set_nowrap(get_declension(get_city(), 1)) ?> до 10 000 000 рублей на срок до 3 лет, со ставкой от 2% в месяц! Мы выдаем деньги под залог любых транспортных средств, кредитная история заемщика не имеет для нас никакого значения, важно лишь то, чтобы автомобиль был на ходу и не находился в залоге или под арестом. Мы поможем получить деньги в течение часа, без справок, поручителей и скрытых комиссий!
            </p>
          </div>
        <?php } ?>
      </div>
      <div class="d-none col-md-6 d-md-flex d-lg-block">
        <picture>
          <source srcset="<?= get_main_image($post->post_name); ?>.webp" type="image/webp">
          <img class="mb-md-auto mt-lg-0 mb-5 mt-auto" src="<?= get_main_image($post->post_name); ?>.png" alt="">
        </picture>
      </div>
    </div>
  </div>
</section>