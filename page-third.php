<?php
/**
 * Template Name: Third
 */
get_header(); 

while ( have_posts() ) :
the_post();

switch (get_the_title()) {
    case 'Займ под ПТС мотоцикла':
        $page_type = 'moto';
        break;
    case 'Грузовой автоломбард под залог ПТС':
        $page_type = 'truck';
        break;
    case 'Возьмите деньги под залог ПТС спецтехники':
        $page_type = 'spec';
        break;
    default:
        $page_type = 'main';
}

set_query_var( 'text_page', $page_type );

set_query_var('image', (isset(carbon_get_theme_option($page_type)[0]['img']) && !empty(carbon_get_theme_option($page_type)[0]['img'])) ? carbon_get_theme_option($page_type)[0]['img'] : get_template_directory_uri().'/css/images/car-blue.png');
get_template_part('theme-helpers/template-parts/firstScreen');

get_template_part('theme-helpers/template-parts/advantages');

get_template_part('theme-helpers/template-parts/horisontal_form');

get_template_part('theme-helpers/template-parts/types');

get_template_part('theme-helpers/template-parts/calc');

get_template_part('theme-helpers/template-parts/requirements');

get_template_part('theme-helpers/template-parts/big_form');

get_template_part('theme-helpers/template-parts/faq');

get_template_part('theme-helpers/template-parts/bottom_cta');

get_template_part('theme-helpers/template-parts/bottom_form');

endwhile;
get_footer();
?>