<section class="<?= ( $text === 'advantages_text') ? 'bg-f2 text-section' : 'text-section';?>" >
    <div class="container text-lightcolor">
        <?= apply_filters( 'the_content', wpautop(carbon_get_theme_option( $text_page.'_texts' )[0][$text] ) ); ?>
    </div>
</section>