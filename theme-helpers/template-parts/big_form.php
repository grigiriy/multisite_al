<section id="big_form" class="row bg-lightgrey py-lg-5">
    <div class="container-fluid container-md mx-auto px-3 px-lg-auto my-3 my-5">
        <div class="p-3 p-lg-5 bg-white rounded-xl">
            <div class="row mb-lg-5">
                <div class="col-12 col-lg-6">
                    <h2><?= get_headlines($post->ID,$post->post_name,'big_form'); ?></h2>
                    <hr class="d-block d-lg-none lil-hr lil-hr-main ml-0">
                </div>
                <div class="col-12 col-lg-6 d-flex">
                    <p class="bd-callout bd-callout-main pl-lg-3 py-lg-2 pr-5 my-lg-auto subtitle">Получите займ под
                        залог ПТС на
                        выгодных условиях, даже с плохой кредитной историей, по 3
                        документам</p>
                </div>
            </div>
            <form class="row mb-3">
                <div class="col-12 col-lg-8">
                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col mb-3">
                            <input type="text" class="form-control" placeholder="Ваше имя">
                        </div>
                        <div class="col mb-3 __phone">
                            <input type="text" class="form-control" placeholder="+7 (___) ___-__-__" name="phone">
                        </div>
                        <div class="col mb-3 mb-lg-0">
                            <input type="text" class="form-control" placeholder="Модель авто">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Сумма займа">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 pl-lg-5 mt-3 mt-lg-0">
                    <button class="w-100 btn btn-main mb-3" type="submit">Получить
                        одобрение</button>
                        <p class="smaller text-center">Нажимая на кнопку, вы даете согласие на <a href="/privacy_policy.pdf" class="text-main" download target="_blank">обработку ваших персональных данных</a></p>
                </div>
            </form>
        </div>
        <?php get_template_part('theme-helpers/template-parts/textBlock'); ?>
    </div>
</section>