<?php
/**
 * Template Name: Text
 */
get_header(); 

while ( have_posts() ) :
the_post();

set_query_var( 'text', '' );

get_template_part('theme-helpers/template-parts/text_firstScreen');

set_query_var( 'text', carbon_get_post_meta($post->ID,'big_form_text') );
get_template_part('theme-helpers/template-parts/big_form');

endwhile;
get_footer();
?>