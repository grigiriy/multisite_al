<section id="faq" class="pb-lg-5">
    <div class="row">
        <div class="container-fluid container-md mx-auto mb-lg-5">
            <div class="row my-lg-5 pt-5">
                <div class="col-12 col-lg-7 pr-0">
                    <h2><?= get_headlines($post->ID,$post->post_name,'faq'); ?></h2>
                    <hr class="d-block d-lg-none lil-hr lil-hr-main ml-0">
                </div>
                <div class="col-12 col-lg-5 d-flex">
                    <p class="bd-callout bd-callout-main pl-lg-3 py-lg-2 my-lg-auto subtitle">
                        Ответы на популярные вопросы про работу автоломбарда</p>
                </div>
            </div>
            <div class="row">

                <?php foreach( carbon_get_post_meta($post->ID,'faq_text') as $key=>$item) { ?>

                <div class="col-12 accordion" id="faq_accordion">
                    <div class="mb-3">
                        <div class="rounded-xl bg-lightblue" id="heading_<?=$key; ?>">
                            <div class="collapsed d-flex" data-toggle="collapse" data-target="#collapse_<?=$key; ?>"
                                aria-expanded="false" aria-controls="#collapse_<?=$key; ?>">
                                <div class="rounded-circle h-100 bg-white shadow p-2 p-lg-3">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="20" y="9" width="2" height="20" rx="1" transform="rotate(90 20 9)"
                                            fill="#00B4E3" />
                                        <rect x="11" y="20" width="2" height="20" rx="1" transform="rotate(-180 11 20)"
                                            fill="#00B4E3" />
                                    </svg>
                                </div>
                                <span class="pl-3 text-left">
                                <?= apply_filters( 'the_content', wpautop( $item['subtitle']  ) ); ?>
                                </span>
                            </div>

                        </div>

                        <div id="collapse_<?=$key; ?>" class="collapse" aria-labelledby="heading_<?=$key; ?>"
                            data-parent="#faq_accordion">
                            <p class="bg-lightblue rounded-xl py-4 px-5">
                            <?= apply_filters( 'the_content', wpautop( $item['text']  ) ); ?>
                            </p>
                        </div>
                    </div>
                    
                </div>
                
                <?php } ?>
                    
            </div>
        </div>
    </div>
</section>