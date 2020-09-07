<section id="bottom_cta">
    <div class="row bg-lightgrey mt-0">
        <div class="container-fluid container-sm mx-auto">
            <div class="row bg-white">
                <div class="col-12 col-sm-6 offset-sm-6 pt-5">
                    <h2>Остались вопросы?</h2>
                    <hr class="lil-hr lil-hr-main mr-auto ml-0">
                    <p class="subtitle">Наши специалисты круглосуточно ответят на любые ваши вопросы</p>
                </div>
            </div>
            <div class="row bg-white shadow-top-0">
                <div class="col-6 col-md-5 d-flex px-0">
                <picture>
                    <source srcset="<?= get_with_path('img/hand_bottom.webp'); ?>" type="image/webp">
                    <img class="w-100" src="<?= get_with_path('img/hand_bottom.png');?>" alt="">
                </picture>
                </div>
                <div class="col-6 offset-md-1">
                    <p class="h2 semibold mb-0 mt-4"><a href="tel:<?= get_phone(true); ?>" class="text-main"><?= get_phone(); ?></a>
                    </p>
                    <p class="semibold text-muted mb-4">Звонок бесплатный</p>
                    <button class="btn btn-main mb-3">
                        Отправить заявку
                    </button>
                </div>
            </div>
        </div>
</section>