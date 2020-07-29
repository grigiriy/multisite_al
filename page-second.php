<?php
/**
 * Template Name: Second
 */
get_header(); 

while ( have_posts() ) :
the_post();

// Artem Maleev, [25 Jul 2020, 18:26:49]:
// знаешь там какой вопрос, у нас тут обычно чередуются блоки с голубым задником и белым, а по этой структуре иногда два голубых идет подряд

// 4.  Главные-Поддомены (Страница 2-го типа)

// давай тогда этот блок с шагами перенесем, чтобы он был между большой формой и условиями

// сейчас он в структуре между калькулятором и квизом

// это для страниц 2 и 3 типа


get_template_part('theme-helpers/template-parts/firstScreen');

get_template_part('theme-helpers/template-parts/advantages');

get_template_part('theme-helpers/template-parts/horisontal_form');

get_template_part('theme-helpers/template-parts/steps');

set_query_var( 'text', carbon_get_post_meta($post->ID,'steps_text') );
get_template_part('theme-helpers/template-parts/textBlock');

get_template_part('theme-helpers/template-parts/calc');

get_template_part('theme-helpers/template-parts/requirements');

set_query_var( 'text', carbon_get_post_meta($post->ID,'requirements_text') );
get_template_part('theme-helpers/template-parts/textBlock');

get_template_part('theme-helpers/template-parts/types');

set_query_var( 'text', carbon_get_post_meta($post->ID,'types_text') );
get_template_part('theme-helpers/template-parts/textBlock');

get_template_part('theme-helpers/template-parts/big_form');

set_query_var( 'text', carbon_get_post_meta($post->ID,'big_form__text') );
get_template_part('theme-helpers/template-parts/textBlock');

get_template_part('theme-helpers/template-parts/terms');

get_template_part('theme-helpers/template-parts/faq');

get_template_part('theme-helpers/template-parts/bottom_cta');

get_template_part('theme-helpers/template-parts/bottom_form');

endwhile;
get_footer();
?>