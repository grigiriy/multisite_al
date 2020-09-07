<section id="bottom_form">
    <div class="row bg-lightgrey">
        <div class="container-fluid container-sm mx-auto mb-5">
            <div class="row bg-white shadow px-3 px-md-5 pt-5 pb-1 pb-sm-3 pb-lg-5">
                <div class="col-12 col-sm-5 pl-0 pl-xl-5">
                    <h2>Заявка на
                        получение займа</h2>
                    <hr class="d-block d-sm-none lil-hr lil-hr-main ml-0">
                </div>
                <div class="col-12 col-sm-7 pl-0 d-flex">
                    <p class="bd-callout bd-callout-main pl-sm-3 py-sm-2 my-sm-auto subtitle">
                        Отправьте заявку и
                        получите
                        одобрение займа
                        в течение 5 минут, деньги — через 30 минут</p>
                </div>
            </div>
            <div class="row bg-white pt-xl-4 overflow-hidden pb-3">
                <div class="col-12 col-sm-5 order-sm-1 order-2 pb-5 pb-sm-0">
                    <picture>
                        <source srcset="<?= get_with_path('img/car_bottom.webp'); ?>" type="image/webp">
                        <img class="mw-100" src="<?= get_with_path('img/car_bottom.png');?>" alt="">
                    </picture>
                </div>
                <div class="col-12 col-sm-7 order-sm-2 order-1">
                <?= do_shortcode('[contact-form-7 id="'.(get_current_blog_id() === 1 ? '40' : '15' ).'"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>