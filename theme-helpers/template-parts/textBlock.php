<?php if($text != ''): ?>
<section class="text-section pt-5">
    <div class="container text-lightcolor">
        <?= apply_filters( 'the_content', wpautop( $text ) ); ?>
    </div>
</section>
<?php endif;
set_query_var( 'text', '' );
?>