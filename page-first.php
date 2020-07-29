<?php
/**
 * Template Name: First
 */
get_header(); 

while ( have_posts() ) :
the_post();
set_query_var( 'text', '' );

get_template_part('theme-helpers/template-parts/firstScreen');

set_query_var( 'text', carbon_get_post_meta($post->ID,'types_text') );
get_template_part('theme-helpers/template-parts/types');

get_template_part('theme-helpers/template-parts/calc');

set_query_var( 'text', carbon_get_post_meta($post->ID,'adv_text') );
get_template_part('theme-helpers/template-parts/advantages');

get_template_part('theme-helpers/template-parts/big_form');

set_query_var( 'text', carbon_get_post_meta($post->ID,'terms_text') );
get_template_part('theme-helpers/template-parts/terms');

get_template_part('theme-helpers/template-parts/requirements');

set_query_var( 'text', carbon_get_post_meta($post->ID,'steps_text') );
get_template_part('theme-helpers/template-parts/steps');

get_template_part('theme-helpers/template-parts/faq');

get_template_part('theme-helpers/template-parts/bottom_cta');

get_template_part('theme-helpers/template-parts/bottom_form');

endwhile;
get_footer();
?>