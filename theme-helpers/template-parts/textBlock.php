<section class="<?= ( $text === 'advantages_text') ? 'bg-f2 text-section' : 'text-section';?>" >
    <div class="container text-lightcolor">
        <?= apply_filters( 'the_content', wpautop( $text  ) ); ?>
    </div>
</section>