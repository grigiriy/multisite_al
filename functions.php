<?php

define('STATIC_FILES_BUILD_VERSION', '1.21');

//deregister unnessosary scripts
function my_dequeue_scripts() {
    wp_dequeue_script( 'jquery-ui-core' );
    wp_dequeue_script( 'jquery-ui-sortable' );
}


//remove smthng
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head','adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_shortlink_wp_head');


// remove hAtom micromarkup
function remove_hentry( $classes ) {
		$classes = array_diff($classes, array('hentry'));
		return $classes;
}
add_filter( 'post_class', 'remove_hentry' );


 // remove Emojii
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );
function disable_wp_emojis_in_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}


// start
// function theme_styles()
// {
//     wp_enqueue_style('master-style', get_template_directory_uri() . '/css/main.css',[], STATIC_FILES_BUILD_VERSION);
// }
// add_action('wp_print_styles', 'theme_styles');

// function theme_scripts()
// {
//     wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/plugins/bootstrap.js',['jquery'], STATIC_FILES_BUILD_VERSION, true);
//     wp_enqueue_script('maskedinput', get_template_directory_uri() . '/js/plugins/maskedinput.js',['bootstrap'], STATIC_FILES_BUILD_VERSION, true);
//     wp_enqueue_script('nouislider', get_template_directory_uri() . '/js/plugins/nouislider.js',['maskedinput'], STATIC_FILES_BUILD_VERSION, true);
//     wp_enqueue_script('calc', get_template_directory_uri() . '/js/donor/calc.js',['nouislider'], STATIC_FILES_BUILD_VERSION, true);
//     wp_enqueue_script('slick', get_template_directory_uri() . '/js/plugins/slick.min.js',['calc'], STATIC_FILES_BUILD_VERSION, true);
//     wp_enqueue_script('master', get_template_directory_uri() . '/js/main.js',['slick'], STATIC_FILES_BUILD_VERSION, true);
// }
// add_action('wp_print_styles', 'theme_scripts');


// menus
add_action(
  'after_setup_theme',
  function () {
    register_nav_menus(
      [
        'header_menu' => 'Header Menu',
        'footer_menu' => 'Footer Menu',
      ]
    );
  }
);

// add_action('wp_ajax_send_request', 'send_request'); 

// function send_request(){

//   $token = 'a7e7b5f96eaa537578e8445651d49d30';
//   $source_from = 'autolombard-pts-zaim.ru';
  
//   $city = $_POST['city'];
//   $dateto = $_POST['dateto'];
//   $every = $_POST['every'];
//   $pocent = $_POST['pocent'];
//   $total = $_POST['total'];
//   $slug = $_POST['slug'];
//   $num = $_POST['num'];
//   $phone = $_POST['phone'];
//   $name = $_POST['name'];
//   $model = $_POST['model'];
//   $year = $_POST['year'];
//   $sumcr = $_POST['sumcr'];
    

// $fields = [
//   'token' => $token,
//   'name' => $name,
//   'phone' => $phone,
//   'email'=>'',
//   'sumcr' => $sumcr,
//   'avto' => $avto,
//   'year' => $year,
//   'km' => $km,
//   'mark' => $mark,
//   'model' => $model,
//   'vin' => $vin,
//   'ip' => $ip,
//   'region' => $region,
//   'city' => $city,
//   'slug' => $slug,
//   'num' => $num,
//   'dateto' => $dateto,
//   'every' => $every,
//   'pocent' => $pocent,
//   'total' => $total,
//   'quiz' => '',
//   'source_from' => $source_from,
//   'param' => [],
//   'message' => ''
// ];

// $curl = curl_init(); 
// curl_setopt_array($curl,
// array(CURLOPT_SSL_VERIFYPEER => 0,
//     CURLOPT_RETURNTRANSFER => 1,
//     CURLOPT_URL => 'http://crm.avtolombard-credit.ru/api/send/lead',
//     CURLOPT_ENCODING => "utf-8",
//     CURLOPT_POST => true,
//     CURLOPT_CUSTOMREQUEST => "POST",
//     CURLOPT_POSTFIELDS => $fields));

// $result = curl_exec($curl);
// curl_close($curl);

// // $result = $fields;
// print_r($result);
// }


// add_action( 'carbon_fields_register_fields', 'crb_register_custom_fields' );
// function crb_register_custom_fields() {
//   include_once __DIR__ . '/theme-helpers/custom-fields/custom.php';
// }

// add_action( 'after_setup_theme', 'crb_load' );
// function crb_load() {
//   require_once( 'vendor/autoload.php' );
//   \Carbon_Fields\Carbon_Fields::boot();
// }



function kama_parse_csv_file( $file_path, $file_encodings = ['cp1251','UTF-8'], $col_delimiter = ';', $row_delimiter = "\r\n" ){
  if( !file_exists($file_path) )
    return 'false';

  $cont = trim( file_get_contents( $file_path) );
  $encoded_cont = mb_convert_encoding( $cont, 'UTF-8', mb_detect_encoding($cont, $file_encodings) );
  unset( $cont );
  if( !$row_delimiter ){
    $row_delimiter = "\r\n";
    if( false === strpos($encoded_cont, "\r\n") )
      $row_delimiter = "\n";
  }
  $lines = explode( $row_delimiter, trim($encoded_cont) );
  $lines = array_filter( $lines );
  $lines = array_map( 'trim', $lines );
  if( !$col_delimiter ){
    $lines10 = array_slice( $lines, 0, 30 );
    foreach( $lines10 as $line ){
      if( !strpos( $line, ',') ) $col_delimiter = ';';
      if( !strpos( $line, ';') ) $col_delimiter = ',';
      if( $col_delimiter ) break;
        }
    if( !$col_delimiter ){
            $delim_counts = [ ";" =>[], "," =>[] ];
      foreach( $lines10 as $line ){
        $delim_counts[','][] = substr_count( $line, ',' );
        $delim_counts[';'][] = substr_count( $line, ';' );
      }
      $delim_counts = array_map( 'array_filter', $delim_counts ); // уберем нули
      $delim_counts = array_map( 'array_count_values', $delim_counts );
      $delim_counts = array_map( 'max', $delim_counts ); // берем только макс. значения вхождений
      if( $delim_counts[';'] === $delim_counts[','] )
        return array('Не удалось определить разделитель колонок.');
      $col_delimiter = array_search( max($delim_counts), $delim_counts );
    }
  }
  $data = [];
  foreach( $lines as $key => $line ){
    $data[] = str_getcsv( $line, $col_delimiter ); // linedata
    unset( $lines[$key] );
  }
  return $data;

}

function new_taxonomies_for_pages() {
  register_taxonomy_for_object_type( 'category', 'page' );
  }
 add_action( 'init', 'new_taxonomies_for_pages' );









//// перенеси потом в плагин
function get_city_meta($post_id,$meta){
  if( get_post_meta($post_id)['_wp_page_template'][0] !== 'main.php'){
    $post_id = (get_post($post_id)->post_parent !== 0) ? get_post($post_id)->post_parent : get_option('page_on_front');
  }
  return carbon_get_post_meta($post_id,$meta);
}


function get_city_link($post_id){
  if( get_post_meta($post_id)['_wp_page_template'][0] !== 'main.php'){
    $post_id = get_post($post_id)->post_parent;
  }
  $city = strval($post_id) === '0' ? '/' : get_the_permalink($post_id);
  return $city;
}

function get_declension_city($atts){
	$params = shortcode_atts( array(
		'case' => 'Москва',
	), $atts );

  $word = get_city(get_the_ID());
  return set_nowrap(get_declension($word,$params['case']));
}
add_shortcode('declension_city', 'get_declension_city');

function get_brand(){
  return get_bloginfo();
}
add_shortcode('brand', 'get_brand');

/** Отключаем автоформатирование */
remove_filter( 'the_content', 'wpautop' );



function get_form_header($pos,$post_id){
  // нужно будет рефакторнуть, а то адок

  if(is_city($post_id) === false){
    $form_title = carbon_get_theme_option('forms')[0]['base_'.$pos.'_form_tit'];
    $form_subtitle = carbon_get_theme_option('forms')[0]['base_'.$pos.'_form_sub'];
  } else {
    $form_title = ( carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_tit_case'] ) ?
    carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_tit'].' '.get_declension(get_city($post_id),carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_tit_case']).' '.carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_tit_after'] :
      carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_tit'].' '.carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_tit_after'];

    $form_subtitle = ( carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_sub_case'] ) ?
    carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_sub'].' '.get_declension(get_city($post_id),carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_sub_case']).' '.carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_sub_after'] :
    carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_sub'].' '.carbon_get_theme_option('forms')[0]['city_'.$pos.'_form_sub_after'];
  }
  return [
    'title'=>$form_title,
    'subtitle'=>$form_subtitle
  ];
}

function is_city($post_id){
  if(
    get_post($post_id)->post_parent !== 0 ||
    (get_post($post_id)->post_parent === 0 && is_page_template('main.php') )
  ){
    return true;
  }
  return false;
}





// the seo framework settings
add_filter( 'the_seo_framework_custom_field_description', function( $description, $args ) {
	return wp_kses(do_shortcode( $description),'strip' );
}, 10, 2 );
add_filter( 'the_seo_framework_title_from_custom_field', function( $title, $args ) {
	return wp_kses(do_shortcode( $title),'strip' );
}, 10, 2 );












// FUNCTIONS!!!!

// LAYOUT
function set_nowrap($string){
	$string = str_replace ( '-' , '‑' , $string );
	$string = str_replace ( ' ' , '&nbsp;' , $string );
	return $string;
}

function get_with_path($path){
  $path = '/wp-content/themes/avtozalog/build/'.$path;
  return $path;
}
// LAYOUT

function get_page_type($slug){
  $is_main = (get_current_blog_id() === '1');
  $arr = [
  'main' => $is_main ? 'main_msk' : 'main_sub', 
  'avto-kredit-pod-zalog-pts-v-moskve' => 'cred_msk',
  'kredit-pod-pts' => 'cred_sub',
  'avto-zajm-pod-zalog-pts-v-moskve' => 'zajm_msk',
  'zajm-pod-pts' => 'zajm_sub',
  'pod-pts' => '24h',
  'gruzovyh-avtomobilej' => 'truck',
  'spectekhniki' => 'spec',
  'motociklov' => 'moto',
  'kredity-dlya-ip-i-yuridicheskih-lic-pod-zalog-pts' => 'yur',
  ];
  return $arr[$slug];
};

function get_city(){
  if(is_multisite()){
    $city = (get_current_blog_id() === 1) ? 'Москва' : get_blog_details( get_current_blog_id() )->blogname;
  } else {
    $city = 'Москва'; //что б не выдавало ошибку на локалхосте
  }
  return $city;
}

function get_declension($word,$case) {
  $dir_path = $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/avtozalog/';
  $file_path = $dir_path.'/db/sklon.csv';

  $data = kama_parse_csv_file($file_path);

  $formated_word = 'error...';

  foreach($data as $row){
    if ($row[0] === $word)
    $formated_word = $row[$case] ? $row[$case] : 'error...';
  }

  return $formated_word;
}



function get_main_image($slug){
  $is_main = (get_current_blog_id() === '1');
  $type = get_page_type($slug);

  switch ($type) {
    case 'truck':
        $img = 'img/truck.png';
        break;
    case 'moto':
        $img = 'img/moto.png';
        break;
    case 'spec':
      $img = 'img/spec.png';
        break;
    case 'yur':
        $img = 'img/business.png';
        break;
    default:
      $img = 'img/car.png';
  }
  return get_with_path($img);
}

function get_headlines($post_id,$slug,$section){

  $city = get_city();

  $type = get_page_type($slug);

  $headlines=[];

  switch ($type) {
    case 'main_msk':
      $headlines['firstScreen'] = 'Автоломбард под залог ПТС автомобилей в ' . set_nowrap(get_declension($city,1));
      break;
    case 'main_sub':
      $headlines['firstScreen'] = 'Автоломбард под залог ПТС автомобилей в ' . set_nowrap(get_declension($city,1));
    break;
    case 'cred_msk':
      $headlines['firstScreen'] = 'Кредиты под залог ПТС автомобилей в ' . set_nowrap(get_declension($city,1));
      break;
    case 'cred_sub':
      $headlines['firstScreen'] = 'Кредиты под залог ПТС автомобилей в ' . set_nowrap(get_declension($city,1));
      break;
    case 'zajm_msk':
      $headlines['firstScreen'] = 'Займы под залог ПТС автомобилей в ' . set_nowrap(get_declension($city,1));
      break;
    case 'zajm_sub':
      $headlines['firstScreen'] = 'Займы под залог ПТС автомобилей в ' . set_nowrap(get_declension($city,1));
      break;

    case 'truck':
      $headlines['firstScreen'] = 'Грузовой автоломбард';
      break;
    case 'moto':
      $headlines['firstScreen'] = 'Мотоломбард';
      break;
    case 'spec':
      $headlines['firstScreen'] = 'Автоломбард спецтехники';
      break;
    case '24h':
      $headlines['firstScreen'] = 'Круглосуточный '.get_blog_details( 1 )->blogname;
      break;
    case 'yur':
      $headlines['firstScreen'] = 'Кредиты для ИП под залог авто ПТС';
      break;
    default:
      $headlines['firstScreen'] = 'error...';
      $headlines['types'] = 'error...';
      $headlines['advantages'] = 'error...';
      $headlines['steps'] = 'error...';
      $headlines['terms'] = 'error...';
      $headlines['requirements'] = 'error...';
      $headlines['calc'] = 'error...';
      $headlines['faq'] = 'error...';
      $headlines['big_form'] = 'error...';
      $headlines['horisontal_form'] = 'error...';
      $headlines['bottom_form'] = 'error...';
      $headlines['bottom_cta'] = 'error...';
  }

  return $headlines[$section];
}