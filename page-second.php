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


set_query_var( 'subtitle_arr', [
    carbon_get_theme_option($page_type)[0]['calc_sub'],
    carbon_get_theme_option($page_type)[0]['calc_case'],
    carbon_get_theme_option($page_type)[0]['calc_sub_after']
]);
get_template_part('theme-helpers/template-parts/calc');
set_query_var( 'text', 'calc_text' );
get_template_part('theme-helpers/template-parts/textBlock');


set_query_var( 'subtitle_arr', [
    carbon_get_theme_option($page_type)[0]['types_sub'],
    carbon_get_theme_option($page_type)[0]['types_case'],
    carbon_get_theme_option($page_type)[0]['types_sub_after']
]);
get_template_part('theme-helpers/template-parts/types');
set_query_var( 'text', 'types_text' );
get_template_part('theme-helpers/template-parts/textBlock');


get_template_part('theme-helpers/template-parts/form','quiz');


set_query_var( 'subtitle_arr', [
    carbon_get_theme_option($page_type)[0]['terms_sub'],
    carbon_get_theme_option($page_type)[0]['terms_case'],
    carbon_get_theme_option($page_type)[0]['terms_sub_after']
]);
get_template_part('theme-helpers/template-parts/terms');


set_query_var( 'subtitle_arr', [
    carbon_get_theme_option($page_type)[0]['requirements_sub'],
    carbon_get_theme_option($page_type)[0]['requirements_case'],
    carbon_get_theme_option($page_type)[0]['requirements_sub_after']
]);
get_template_part('theme-helpers/template-parts/requirements');
set_query_var( 'text', 'requirements_text' );
get_template_part('theme-helpers/template-parts/textBlock');


set_query_var( 'subtitle_arr', [
    carbon_get_theme_option($page_type)[0]['order_sub'],
    carbon_get_theme_option($page_type)[0]['order_case'],
    carbon_get_theme_option($page_type)[0]['order_sub_after']
]);
get_template_part('theme-helpers/template-parts/order');

set_query_var( 'subtitle_arr', [
    carbon_get_theme_option($page_type)[0]['faq_sub'],
    carbon_get_theme_option($page_type)[0]['faq_case'],
    carbon_get_theme_option($page_type)[0]['faq_sub_after']
]);
set_query_var( 'faq_type', $page_type );
get_template_part('theme-helpers/template-parts/faq');

endwhile;
get_footer();
?>