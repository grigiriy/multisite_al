<section id="types">
    <div class="row">
        <div class="container-fluid container-md mx-auto mb-5">
            <div class="row mt-5 mb-0 mb-lg-4 pt-lg-5">
                <div class="col-12 col-lg-7 pr-0">
                    <h2><?= get_headlines($post->ID,$post->post_name,'types'); ?></h2>
                    <hr class="d-block d-lg-none lil-hr lil-hr-main ml-0">
                </div>
                <div class="col-12 col-lg-5 d-flex">
                    <p class="bd-callout bd-callout-main pl-lg-3 py-lg-2 my-lg-auto subtitle">Мы выдаем займы под залог
                        любых авто, мотоциклов, спецтехники или грузовиков.</p>
                </div>
            </div>
            <div class="row row-cols-lg-5 row-cols-1 slick">
                <div class="col">
                    <div class="rounded-xl py-3 my-3 my-lg-0 shadow">
                        <a href="<?= network_home_url();?>pod-pts/" class="d-flex flex-column">
                            <picture>
                                <source srcset="<?= get_with_path('img/card_car.webp'); ?>" type="image/webp">
                                <img class="mw-100 mb-3" src="<?= get_with_path('img/card_car.png');?>" alt="">
                            </picture>
                            <div class="d-flex text-main subtitle semibold pl-3">
                                <p class="mt-auto mb-0">
                                    Легковые автомобили
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="rounded-xl py-3 my-3 my-lg-0 shadow">
                        <a href="<?= network_home_url();?>gruzovyh-avtomobilej/" class="d-flex flex-column">
                            <picture>
                                <source srcset="<?= get_with_path('img/card_truck.webp'); ?>" type="image/webp">
                                <img class="mw-100 mb-3" src="<?= get_with_path('img/card_truck.png');?>" alt="">
                            </picture>
                            <div class="d-flex text-main subtitle semibold pl-3">
                                <p class="mt-auto mb-0">
                                    Грузовые автомобили
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="rounded-xl py-3 my-3 my-lg-0 shadow">
                        <a href="<?= network_home_url();?>motociklov/" class="d-flex flex-column">
                            <picture>
                                <source srcset="<?= get_with_path('img/card_moto.webp'); ?>" type="image/webp">
                                <img class="mw-100 mb-3" src="<?= get_with_path('img/card_moto.png');?>" alt="">
                            </picture>
                            <div class="d-flex text-main subtitle semibold pl-3">
                                <p class="mt-auto mb-0">
                                    Мотоциклы
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="rounded-xl py-3 my-3 my-lg-0 shadow">
                        <a href="<?= network_home_url();?>spectekhniki/" class="d-flex flex-column">
                            <picture>
                                <source srcset="<?= get_with_path('img/card_spec.webp'); ?>" type="image/webp">
                                <img class="mw-100 mb-3" src="<?= get_with_path('img/card_spec.png');?>" alt="">
                            </picture>
                            <div class="d-flex text-main subtitle semibold pl-3">
                                <p class="mt-auto mb-0">
                                    Спецтехника
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="rounded-xl py-3 my-3 my-lg-0 shadow">
                        <a href="<?= network_home_url();?>kredity-dlya-ip-i-yuridicheskih-lic-pod-zalog-pts/" class="d-flex flex-column">
                            <picture>
                                <source srcset="<?= get_with_path('img/card_business.webp'); ?>" type="image/webp">
                                <img class="mw-100 mb-3" src="<?= get_with_path('img/card_business.png');?>" alt="">
                            </picture>
                            <div class="d-flex text-main subtitle semibold pl-3">
                                <p class="mt-auto mb-0">
                                    Коммерческий транспорт
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php get_template_part('theme-helpers/template-parts/textBlock'); ?>
        </div>
    </div>
</section>