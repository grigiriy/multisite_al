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
            <div class="mb-3">
                <?= do_shortcode('[contact-form-7 id="'.(get_current_blog_id() === 1 ? '41' : '14' ).'" html_class="row"]'); ?>
            </div>
        </div>
        <?php get_template_part('theme-helpers/template-parts/textBlock'); ?>
    </div>
</section>