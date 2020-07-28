<?php
/**
 * Template Name: First
 */
get_header(); 

while ( have_posts() ) :
the_post();

get_template_part('theme-helpers/template-parts/firstScreen');

get_template_part('theme-helpers/template-parts/types');

get_template_part('theme-helpers/template-parts/calc');

get_template_part('theme-helpers/template-parts/advantages');

get_template_part('theme-helpers/template-parts/big_form');

get_template_part('theme-helpers/template-parts/terms');

get_template_part('theme-helpers/template-parts/requirements');

get_template_part('theme-helpers/template-parts/steps');

get_template_part('theme-helpers/template-parts/faq');

get_template_part('theme-helpers/template-parts/bottom_cta');

get_template_part('theme-helpers/template-parts/bottom_form');

endwhile;
get_footer();
?>