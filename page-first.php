<?php
/**
 * Template Name: First
 */
get_header(); 

while ( have_posts() ) :
the_post();

switch (get_the_title()) {
    case 'Кредит под залог ПТС':
        $page_type = 'credit_pts';
        break;
    case 'Кредит под залог авто':
        $page_type = 'credit_auto';
        break;
    case 'Займ под залог ПТС':
        $page_type = 'zaim_pts';
        break;
    case 'Займ под залог авто':
        $page_type = 'zaim_auto';
        break;
    case 'Кредит для ИП под залог авто ПТС':
        $page_type = 'business';
        break;
    case 'Круглосуточный автоломбард':
        $page_type = '24h';
        break;
    default:
        $page_type = 'main';
}

set_query_var( 'text_page', $page_type );

set_query_var('image', (isset(carbon_get_theme_option($page_type)[0]['img']) && !empty(carbon_get_theme_option($page_type)[0]['img'])) ? carbon_get_theme_option($page_type)[0]['img'] : get_template_directory_uri().'/css/images/car-blue.png');
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