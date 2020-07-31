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

add_action('wp_ajax_send_request', 'send_request');
add_action('wp_ajax_nopriv_send_request', 'send_request');

function send_request(){

  $token = 'c9a9103fe7948e86c5402986f0678690';
  $source_from = 'autolombard-autozalog.ru';
  $userAgent = 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0';
  
  $city = $_POST['city'];
  $dateto = $_POST['dateto'];
  $every = $_POST['every'];
  $pocent = $_POST['pocent'];
  $total = $_POST['total'];
  $slug = $_POST['slug'];
  $num = $_POST['num'];
  $phone = $_POST['phone'];
  $name = $_POST['name'];
  $model = $_POST['model'];
  $year = $_POST['year'];
  $sumcr = $_POST['sumcr'];
    

$fields = [
  'token' => $token,
  'name' => $name,
  'phone' => $phone,
  'email'=>'',
  'sumcr' => $sumcr,
  'avto' => $avto,
  'year' => $year,
  'km' => $km,
  'mark' => $mark,
  'model' => $model,
  'vin' => $vin,
  'ip' => $ip,
  'region' => $region,
  'city' => $city,
  'slug' => $slug,
  'num' => $num,
  'dateto' => $dateto,
  'every' => $every,
  'pocent' => $pocent,
  'total' => $total,
  'quiz' => '',
  'source_from' => $source_from,
  'param' => [],
  'message' => ''
];

$curl = curl_init(); 
curl_setopt_array($curl,
array(CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_USERAGENT => $userAgent,
    CURLOPT_REFERER => $_SERVER['REQUEST_URI'],
    CURLOPT_URL => 'http://crm.avtolombard-credit.ru/api/send/lead',
    CURLOPT_ENCODING => "utf-8",
    CURLOPT_POST => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $fields));

$result = curl_exec($curl);
curl_close($curl);

print_r($result);
}


add_action( 'carbon_fields_register_fields', 'crb_register_custom_fields' );
function crb_register_custom_fields() {
  include_once __DIR__ . '/theme-helpers/custom-fields/custom.php';
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
  require_once( 'vendor/autoload.php' );
  \Carbon_Fields\Carbon_Fields::boot();
}



function kama_parse_csv_file( $file_path, $file_encodings = ['cp1251','UTF-8'], $col_delimiter = ';', $row_delimiter = "\n" ){
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


/** Отключаем автоформатирование */
remove_filter( 'the_content', 'wpautop' );






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

// SHORTCODES
function get_declension_city($atts){
	$params = shortcode_atts( array(
		'case' => 'Москва',
	), $atts );

  $word = get_city();
  return set_nowrap(get_declension($word,$params['case']));
}
add_shortcode('declension_city', 'get_declension_city');

function get_brand(){
  $brand = is_multisite() ? get_blog_details(1)->blogname :  get_bloginfo();
  return $brand;
}
add_shortcode('brand', 'get_brand');
// SHORTCODES


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
  if( is_multisite() ){
    $city = (get_current_blog_id() === 1) ? 'Москва' : get_blog_details( get_current_blog_id() )->blogname;
  } else {
    $city = 'Москва'; //что б не выдавало ошибку на локалхосте
  }
  return $city;
}

function get_declension($word,$case) {
  $dir_path = $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/avtozalog/';
  $file_path = $dir_path.'db/sklon.csv';

  $data = kama_parse_csv_file($file_path);

  $formated_word = 'error...';

  foreach($data as $row){
    if ($row[0] === $word) {
      $formated_word = $row[$case] ? $row[$case] : 'error...';
    }
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
      $headlines['types'] = 'Автоломбард под залог любого автомобиля в ' . set_nowrap(get_declension($city,1));
      $headlines['calc'] = 'Калькулятор автоломбарда '.do_shortcode('[brand]');
      $headlines['advantages'] = 'Преимущества автоломбарда под ПТС '.do_shortcode('[brand]');
      $headlines['big_form'] = 'Заявка на займ в '.set_nowrap(get_declension($city,8)).' филиал';
      $headlines['terms'] = 'Выдаем деньги под залог ПТС авто в городе '.set_nowrap(get_declension($city,0)).' на Новых Условиях';
      $headlines['requirements'] = 'Требования автоломбарда под залог ПТС в Москве '.set_nowrap(get_declension($city,1));
      $headlines['steps'] = 'Процесс оформления и получения кредита в ломбарде '.do_shortcode('[brand]');
      $headlines['faq'] = 'Ответы на вопросы';
      break;
    case 'main_sub':
      $headlines['firstScreen'] = 'Автоломбард под залог ПТС автомобилей в ' . set_nowrap(get_declension($city,1));
      $headlines['advantages'] = 'Преимущества автоломбарда под ПТС авто в '.do_shortcode('[brand]');
      $headlines['horisontal_form'] = 'Какую сумму займа вы бы хотели получить';
      $headlines['steps'] = 'Получите деньги в '.set_nowrap(get_declension($city,1)).' за 35 минут';
      $headlines['calc'] = 'Онлайн расчет максимальной суммы и процентов';
      $headlines['requirements'] = 'Забирайте деньги из автоломбарда и пользуйтесь авто';
      $headlines['types'] = 'Получите кредит заложив ПТС любого автомобиля';
      $headlines['big_form'] = 'Заявка в автоломбард '.do_shortcode('[brand]').' в '.set_nowrap(get_declension($city,1));
      $headlines['terms'] = 'Условия автоломбарда в '.set_nowrap(get_declension($city,1));
      $headlines['faq'] = 'Ответы на вопросы по услугам автоломбарда в городе '.set_nowrap(get_declension($city,0));
    break;

    case 'zajm_msk':
      $headlines['firstScreen'] = 'Займы под залог ПТС автомобилей в ' . set_nowrap(get_declension($city,1));
      $headlines['types'] = 'Кредитные займы под ПТС машин с правом пользования';
      $headlines['calc'] = 'Расчет процентов по сумме займа под ПТС и срокам кредитования';
      $headlines['advantages'] = 'Преимущества получения денег в '.set_nowrap(get_declension($city,1)).' в '.do_shortcode('[brand]');
      $headlines['big_form'] = 'Заявка на оформление займа под залог ПТС в '.set_nowrap(get_declension($city,1));
      $headlines['terms'] = 'Выдаем займы на выгодных условиях';
      $headlines['requirements'] = 'Требования к кредитополучателю';
      $headlines['steps'] = 'Как получить деньги по Экспресс займу под залог ПТС';
      $headlines['faq'] = 'Вопросы по условиям займа в '.set_nowrap(get_declension($city,9)).' офисе';
      break;
    case 'zajm_sub':
      $headlines['firstScreen'] = 'Займы под залог ПТС автомобилей в ' . set_nowrap(get_declension($city,1));
      $headlines['advantages'] = 'Преимущества получения займа в '.do_shortcode('[brand]');
      $headlines['horisontal_form'] = 'Какую сумму денег под залог авто ПТС вы хотите?';
      $headlines['steps'] = 'Оформляйте займы под залог авто ПТС в '.set_nowrap(get_declension($city,1)).' круглосуточно';
      $headlines['calc'] = 'Калькулятор займов под залог ПТС';
      $headlines['requirements'] = 'Получите займ заложив ПТС в городе '.set_nowrap(get_declension($city,0));
      $headlines['big_form'] = 'Заявка в автоломбард '.do_shortcode('[brand]').' в '.set_nowrap(get_declension($city,1));
      $headlines['terms'] = 'Условия займа под залог ПТС в '.set_nowrap(get_declension($city,1));
      $headlines['faq'] = 'Ответы на вопросы по услугам';
      break;

    case 'cred_msk':
        $headlines['firstScreen'] = 'Кредиты под залог ПТС автомобилей в ' . set_nowrap(get_declension($city,1));
        $headlines['types'] = 'Выдаем деньги на любые цели под залог авто с правом вождения';
        $headlines['calc'] = 'Калькулятор экспресс кредита под ПТС';
        $headlines['advantages'] = 'Преимущества кредита под ПТС авто в '.do_shortcode('[brand]').' в '.set_nowrap(get_declension($city,1));
        $headlines['big_form'] = 'Заявка на кредит под залог авто ПТС';
        $headlines['terms'] = 'Выгодно взять кредит под залог авто очень просто';
        $headlines['requirements'] = 'Требования к кредитополучателю';
        $headlines['steps'] = 'Процесс получения денег под залог ПТС в '. set_nowrap(get_declension($city,1));
        $headlines['faq'] = 'Вопросы по условиям кредитования в '.set_nowrap(get_declension($city,9)).' филиале';
      break;
      case 'cred_sub':
        $headlines['firstScreen'] = 'Кредиты под залог ПТС автомобилей в ' . set_nowrap(get_declension($city,1));
        $headlines['advantages'] = 'Выгоды кредитования под залог ПТС авто';
        $headlines['horisontal_form'] = 'Какую сумму денег под залог авто ПТС вы хотите?';
        $headlines['steps'] = 'Оформляйте кредиты под залог авто ПТС в '.set_nowrap(get_declension($city,1)).' круглосуточно';
        $headlines['calc'] = 'Калькулятор кредитования под залог ПТС';
        $headlines['requirements'] = 'Получите деньги заложив ПТС любого автомобиля в городе '.set_nowrap(get_declension($city,0));
        $headlines['big_form'] = 'Заявка на кредит в автоломбард '.do_shortcode('[brand]').' в '.set_nowrap(get_declension($city,1));
        $headlines['terms'] = 'Условия кредитовария под залог ПТС в '.set_nowrap(get_declension($city,1));
        $headlines['faq'] = 'Ответы на вопросы по услугам';
      break;

    case 'yur':
      $headlines['firstScreen'] = 'Кредиты для ИП под залог авто ПТС';
      $headlines['types'] = 'Выдача кредитов для бизнеса под залог коммерческого авто';
      $headlines['calc'] = 'Калькулятор для Юридических лиц и ИП';
      $headlines['advantages'] = 'Преимущества автоломбарда для юридических лиц «'.do_shortcode('[brand]').'»';
      $headlines['big_form'] = 'Заявка на займ';
      $headlines['terms'] = 'Условия кредитования для ИП и Юридических лиц';
      $headlines['requirements'] = 'Требования автоломбарда к юридическим лицам';
      $headlines['steps'] = 'Как получить займ под залог ПТС юридическим лицам';
      $headlines['faq'] = 'Ответы на вопросы';
    break;
    case 'truck':
      $headlines['firstScreen'] = 'Грузовой автоломбард';
      $headlines['advantages'] = 'Выгода получения займа под залог грузовика';
      $headlines['horisontal_form'] = 'Укажите желаемую сумму под залог ПТС грузовика';
      $headlines['calc'] = 'Расчет условий кредитования в автоломбарде';
      $headlines['requirements'] = 'Чтобы получить займ под залог ПТС грузовой автомобиль';
      $headlines['big_form'] = 'Заявка в грузовой автоломбард '.do_shortcode('[brand]');
      $headlines['steps'] = 'Алгоритм получения денег под ПТС грузовика';
      $headlines['faq'] = 'Вопросы по кредитам под залог ПТС грузового автомобиля';
      break;
    case 'spec':
      $headlines['firstScreen'] = 'Автоломбард спецтехники';
      $headlines['advantages'] = 'Выгода кредитования под залог спецтехники';
      $headlines['horisontal_form'] = 'Укажите желаемую сумму под залог ПТС спецтехники';
      $headlines['calc'] = 'Расчет условий получения кредита в автоломбарде';
      $headlines['requirements'] = 'Требования автоломбарда';
      $headlines['big_form'] = 'Заявка на займ под ПТС спецтехники';
      $headlines['steps'] = 'Как получить займ под залог ПТС спецтехники';
      $headlines['faq'] = 'Вопросы по кредитованию в автоломбарде '.do_shortcode('[brand]');
      break;
    case 'moto':
      $headlines['firstScreen'] = 'Мотоломбард';
      $headlines['advantages'] = 'Выгода кредитования под залог мототехники';
      $headlines['horisontal_form'] = 'Укажите желаемую сумму займа под ПТС мотоцикла';
      $headlines['calc'] = 'Расчет займа под залог ПТС мотоцикла';
      $headlines['requirements'] = 'Требования мотоломбарда';
      $headlines['big_form'] = 'Заявка на займ под ПТС мотоцикла';
      $headlines['steps'] = 'Как получить займ под залог ПТС мотоцикла';
      $headlines['faq'] = 'Вопросы по кредитованию в автоломбарде '.do_shortcode('[brand]');
      break;
    case '24h':
      $headlines['firstScreen'] = 'Круглосуточный '.do_shortcode('[brand]');
      $headlines['advantages'] = 'Выгода кредитования в автоломбарде';
      $headlines['horisontal_form'] = 'Укажите желаемую сумму кредитования';
      $headlines['steps'] = 'Как получаются займы под залог ПТС авто';
      $headlines['calc'] = 'Калькулятор автозалога под ПТС';
      $headlines['requirements'] = 'Автозалог любых автомобилей с ПТС';
      $headlines['big_form'] = 'Заявка на автозалоговый займ под ПТС';
      $headlines['terms'] = 'Условия автозалога';
      $headlines['faq'] = 'Ответы на вопросы';
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
      // $headlines['bottom_form'] = 'error...';
      // $headlines['bottom_cta'] = 'error...';
  }

  return $headlines[$section];
}


function vichele($word,$slug){
 
  $type = get_page_type($slug);

  $vichele = [];

  $vichele['Автомобиль'] = ['Автомобиль','Мотоцикл','Спецтехника','Грузовик'];
  $vichele['Авто'] = ['Авто','Мотоцикл','Спецтехника','Грузовик'];
  $vichele['автомобиль'] = ['автомобиль','мотоцикл','спецтехника','грузовик'];
  $vichele['авто'] = ['авто','мотоцикл','спецтехника','грузовик'];
  $vichele['авто_2'] = ['авто','мотоциклом','спецтехникой','грузовиком'];
  $vichele['автомобиля'] = ['автомобиля','мотоцикла','спецтехники','грузовика'];
  $vichele['автомобилю'] = ['автомобилю','мотоциклу','спецтехнике','грузовику'];

  switch ($type){
    case 'spec':
      $key = 2;
      break; 
    case 'moto':
      $key = 1;
      break; 
    case 'truck':
      $key = 3;
      break;
    default:
      $key = 0;
  }

  return $vichele[$word][$key];
}

$cities = [
  9=>['Кубинская улица, 80Б','abakan','Абакан',''],
  12=>['Инзенская улица, 7','azov','Азов',''],
  13=>['улица Шолохова, 9','aksaj','Аксай',''],
  14=>['улица Перфильева, 2','aleksandrov','Александров',''],
  15=>['Республиканская улица, 78','alekseevka','Алексеевка',''],
  16=>['улица Заслонова, 16','almetevsk','Альметьевск',''],
  17=>['улица Самбурова, 82А','anapa','Анапа',''],
  18=>['улица Чайковского, 1А','angarsk','Ангарск',''],
  19=>['Горняцкая улица, 4','anzhero-sudzhensk','Анжеро-Судженск',''],
  20=>['Августовская улица, 14','aprelevka','Апрелевка',''],
  21=>['улица Кирова, 54','arzamas','Арзамас',''],
  22=>['улица Карла Либкнехта, 59','armavir','Армавир',''],
  23=>['улица Кирова, 191','artem','Артем',''],
  24=>['Троицкий проспект, 65','arhangelsk','Архангельск','1'],
  25=>['Адмиралтейская улица, 46с1','astrahan','Астрахань','1'],
  26=>['улица Черно-Иванова, 13','ahtubinsk','Ахтубинск',''],
  27=>['улица Кравченко, 3А','achinsk','Ачинск',''],
  28=>['Минская улица, 63А','balakovo','Балаково',''],
  29=>['Советская площадь, 19','balahna','Балахна',''],
  30=>['проспект Ленина, 23/5','balashiha','Балашиха',''],
  31=>['улица 30 лет Победы, 156','balashov','Балашов',''],
  32=>['Привокзальная улица, 11','barnaul','Барнаул','1'],
  33=>['улица Кирова, 9А','batajsk','Батайск',''],
  34=>['Студенческая улица, 21А','belgorod','Белгород','1'],
  35=>['Красная улица, 132/2','belebej','Белебей',''],
  36=>['Цинкзаводской переулок, 19','belovo','Белово',''],
  37=>['улица Кирова, 62','belogorsk','Белогорск',''],
  38=>['улица К. Маркса, 33/1','beloreck','Белорецк',''],
  39=>['улица Победы, 475','belorechensk','Белореченск',''],
  40=>['улица Ленина, 47','berdsk','Бердск',''],
  41=>['улица Веры Бирюковой, 7','berezniki','Березники',''],
  42=>['Социалистическая улица, 96','bijsk','Бийск',''],
  43=>['улица Ленина, 77','blagoveshchensk','Благовещенск',''],
  44=>['Матросовская улица, 66А','borisoglebsk','Борисоглебск',''],
  45=>['улица Наймушина, 32','bratsk','Братск',''],
  46=>['улица Ульянова, 4','bryansk','Брянск',''],
  47=>['улица Дуки, 63','bugulma','Бугульма',''],
  48=>['Революционная улица, 54','buguruslan','Бугуруслан',''],
  49=>['улица Рожкова, 39','buzuluk','Бузулук',''],
  50=>['Коммунистическая улица, 87','valujki','Валуйки',''],
  51=>['набережная реки Гзень, 5','velikij-novgorod','Великий Новгород',''],
  52=>['улица Огнеупорщиков, 14','verhnyaya-pyshma','Верхняя Пышма',''],
  53=>['улица Сабурова, 5А','verhnyaya-salda','Верхняя Салда',''],
  54=>['Ольховая улица, 2','vidnoe','Видное',''],
  55=>['проспект Красного Знамени, 3','vladivostok','Владивосток',''],
  56=>['улица Льва Толстого, 40А','vladikavkaz','Владикавказ','1'],
  57=>['Северная улица, 112','vladimir','Владимир','1'],
  58=>['Университетский проспект, 64','volgograd','Волгоград','1'],
  59=>['Солнечная улица, 2','volgodonsk','Волгодонск',''],
  60=>['улица Комарова, 24','volzhsk','Волжск',''],
  61=>['улица имени Ф.Г. Логинова, 23В','volzhskij','Волжский',''],
  62=>['улица Ветошкина, 15','vologda','Вологда',''],
  63=>['улица Ломоносова, 5','vorkuta','Воркута',''],
  64=>['Ленинский проспект, 174И','voronezh','Воронеж','1'],
  65=>['площадь Ленина, 1','voskresensk','Воскресенск',''],
  66=>['улица Гагарина, 8','votkinsk','Воткинск',''],
  67=>['Всеволожский проспект, 61','vsevolozhsk','Всеволожск',''],
  68=>['Железнодорожная улица, 2','vyborg','Выборг',''],
  69=>['улица Ленина, 15Б','vyksa','Выкса',''],
  70=>['улица Ленина, 27А','gaj','Гай',''],
  71=>['улица Карла Маркса, 27В','gatchina','Гатчина',''],
  72=>['улица Луначарского, 125','gelendzhik','Геленджик',''],
  73=>['улица Карла Маркса, 15','glazov','Глазов',''],
  74=>['Коммунистический проспект, 11','gorno-altajsk','Горно-Алтайск',''],
  75=>['улица Воровского, 4','gryazi','Грязи',''],
  76=>['Севастопольская улица, 101А','gubkin','Губкин',''],
  77=>['улица Ковалёва, 78А','gukovo','Гуково',''],
  78=>['улица Карла Маркса, 43','dankov','Данков',''],
  79=>['Железнодорожная улица, 14','dedovsk','Дедовск',''],
  80=>['проспект Агасиева, 27','derbent','Дербент',''],
  81=>['Красноармейская улица','dzhankoj','Джанкой',''],
  82=>['проспект Чкалова, 23','dzerzhinsk','Дзержинск',''],
  83=>['Лесная улица, 18','dzerzhinskij','Дзержинский',''],
  84=>['улица Прониной, 4','dimitrovgrad','Димитровград',''],
  85=>['Советская улица, 5','dmitrov','Дмитров',''],
  86=>['Лихачёвский проспект, 74','dolgoprudnyj','Долгопрудный',''],
  87=>['Каширское шоссе, 3А','domodedovo','Домодедово',''],
  88=>['Октябрьская улица, 44','donskoj','Донской',''],
  89=>['проспект Боголюбова, 18','dubna','Дубна',''],
  90=>['Интернациональная улица, 128','evpatoriya','Евпатория',''],
  91=>['Касимовское шоссе, 1В','egorevsk','Егорьевск',''],
  92=>['Красная улица, 45/2','ejsk','Ейск',''],
  93=>['улица Малышева, 51','ekaterinburg','Екатеринбург','1'],
  94=>['проспект Мира, 35','elabuga','Елабуга',''],
  95=>['Радиотехническая улица, 5','elec','Елец',''],
  96=>['улица Ермолова, 2','essentuki','Ессентуки',''],
  97=>['Ленинградский проспект, 63','zheleznogorsk','Железногорск',''],
  98=>['улица Димитрова, 18','zheleznogorsk-kursk','Железногорск (Курск)',''],
  99=>['Самарская улица, 3А','zhigulevsk','Жигулевск',''],
  100=>['улица Маяковского, 19','zhukovskij','Жуковский',''],
  101=>['улица Баумана, 17','zavolzhe','Заволжье',''],
  102=>['улица Ленина, 9Б','zainsk','Заинск',''],
  103=>['улица Василия Фабричнова, 5','zvenigorod','Звенигород',''],
  104=>['Крюковская площадь, 1','zelenograd','Зеленоград',''],
  105=>['улица Чайковского, 53','zelenodolsk','Зеленодольск',''],
  106=>['Таганайская улица, 204','zlatoust','Златоуст',''],
  107=>['Лежневская улица, 155А','ivanovo','Иваново',''],
  108=>['Пионерская улица, 4к2','ivanteevka','Ивантеевка',''],
  109=>['улица 10 лет Октября, 44Б','izhevsk','Ижевск','1'],
  110=>['улица Лермонтова, 257','irkutsk','Иркутск','1'],
  111=>['Комсомольская улица, 21','iskitim','Искитим',''],
  112=>['улица Рябкина, 1','istra','Истра',''],
  113=>['Стахановская улица, 92','ishimbaj','Ишимбай',''],
  114=>['улица Соловьёва, 22Ак1','joshkar-ola','Йошкар-Ола',''],
  115=>['Петербургская улица, 52','kazan','Казань','1'],
  116=>['Московский проспект, 40','kaliningrad','Калининград',''],
  117=>['улица Ленина, 102А','kaluga','Калуга','1'],
  118=>['улица Ленина, 16А','kamensk-uralskij','Каменск-Уральский',''],
  119=>['переулок Башкевича, 95','kamensk-shahtinskij','Каменск-Шахтинский',''],
  120=>['Пролетарская улица, 16А','kamyshin','Камышин',''],
  121=>['Советская улица, 32','kanash','Канаш',''],
  122=>['улица Амет-Хан Султана, 6-я линия, 9','kaspijsk','Каспийск',''],
  123=>['Садовая улица, 32','kashira','Кашира',''],
  124=>['улица Шестакова, 6','kemerovo','Кемерово','1'],
  125=>['улица Ленина, 3А','kerch','Керчь',''],
  126=>['улица имени Максима Горького, 2','kineshma','Кинешма',''],
  127=>['улица Карла Маркса, 21','kirov','Киров','1'],
  128=>['улица Алексея Некрасова, 29к2','kirovo-chepeck','Кирово-Чепецк',''],
  129=>['Томская улица, 20','kiselyovsk','Киселёвск',''],
  130=>['Пятигорская улица, 139','kislovodsk','Кисловодск',''],
  131=>['улица Менделеева, 2','klin','Клин',''],
  132=>['улица Шмидта, 14с4','kovrov','Ковров',''],
  133=>['улица Дружбы Народов, 60','kogalym','Когалым',''],
  134=>['Ветеринарная улица, 4','kolomna','Коломна',''],
  135=>['улица Севастьянова, 20А','kolpino','Колпино',''],
  136=>['улица Победы, 6','kolchugino','Кольчугино',''],
  137=>['улица Кирова, 76/2','komsomolsk-na-amure','Комсомольск-на-Амуре',''],
  138=>['проспект Славы, 8','kopejsk','Копейск',''],
  139=>['улица Богомолова, 3А','korolev','Королев',''],
  140=>['Комсомольская улица, 65Б','kostroma','Кострома','1'],
  141=>['улица Генерала Кузнецова, 32/65','kotelniki','Котельники',''],
  142=>['улица Ленина, 54','krasnoarmejsk','Красноармейск',''],
  143=>['Успенская улица, 4А','krasnogorsk','Красногорск',''],
  144=>['Рашпилевская улица, 179/1','krasnodar','Краснодар','1'],
  145=>['улица Культуры, 4Б','krasnokamsk','Краснокамск',''],
  146=>['Взлётная улица, 57','krasnoyarsk','Красноярск','1'],
  147=>['Красная улица, 41/1','kropotkin','Кропоткин',''],
  148=>['площадь Ленина, 5','kstovo','Кстово',''],
  149=>['Можайское шоссе, 198','kubinka','Кубинка',''],
  150=>['Гражданская улица, 85Б','kuzneck','Кузнецк',''],
  151=>['Брикетная улица, 2А','kumertau','Кумертау',''],
  152=>['улица Газеты Искра, 19','kungur','Кунгур',''],
  153=>['улица Бурова-Петрова, 112','kurgan','Курган',''],
  154=>['Садовая улица, 12','kursk','Курск','1'],
  155=>['улица Кочетова, 1','kyzyl','Кызыл',''],
  156=>['улица Мира, 46А','langepas','Лангепас',''],
  157=>['Строительная улица, 28','leninogorsk','Лениногорск',''],
  158=>['проспект Кирова, 79','leninsk-kuzneckij','Ленинск-Кузнецкий',''],
  159=>['улица Горького, 84А','lesosibirsk','Лесосибирск',''],
  160=>['улица Максима Горького, 3','livny','Ливны',''],
  161=>['15-й микрорайон, 9А','lipeck','Липецк',''],
  162=>['Фестивальная улица, 4М','liski','Лиски',''],
  163=>['Краснополянский проезд, 2','lobnya','Лобня',''],
  164=>['Центральная улица, 18','lomonosov','Ломоносов',''],
  165=>['Московская улица, 25','luga','Луга',''],
  166=>['улица Куйбышева, 106','luhovicy','Луховицы',''],
  167=>['улица Луначарского, 17','lysva','Лысьва',''],
  168=>['Ленинская улица, 14/2-76','lytkarino','Лыткарино',''],
  169=>['Волгоградский проспект, 43к3','lyubercy','Люберцы',''],
  170=>['улица Билибина, 2А','magadan','Магадан',''],
  171=>['проспект Ленина, 80','magnitogorsk','Магнитогорск','1'],
  172=>['улица Чкалова, 71','majkop','Майкоп',''],
  173=>['Юбилейная улица, 28Б','mariinsk','Мариинск',''],
  174=>['улица Максима Горького, 43','mahachkala','Махачкала',''],
  175=>['Заречная улица, 15к4','megion','Мегион',''],
  176=>['проспект Строителей, 46/1','mezhdurechensk','Междуреченск',''],
  177=>['Смоленская улица, 38','meleuz','Мелеуз',''],
  178=>['улица 8 Июля, 12','miass','Миасс',''],
  179=>['улица Коммуны, 105','mihajlovka','Михайловка',''],
  180=>['Липецкое шоссе, 15','michurinsk','Мичуринск',''],
  181=>['Полевая улица, 29','mozhajsk','Можайск',''],
  1=>['Успенская улица, 3','','Москва','1'],
  183=>['проспект Ленина, 82','murmansk','Мурманск','1'],
  184=>['улица Дзержинского, 49А','murom','Муром',''],
  185=>['Олимпийский проспект, 29с2','mytishchi','Мытищи',''],
  186=>['проспект Раиса Беляева, 2Б','naberezhnye-chelny','Набережные Челны',''],
  187=>['Фабричная улица, 26','nazran','Назрань',''],
  188=>['улица Пушкина, 35','nalchik','Нальчик',''],
  189=>['улица Войкова, 3','naro-fominsk','Наро-Фоминск',''],
  190=>['Находкинский проспект, 59','nahodka','Находка',''],
  191=>['улица Куличенко, 86','nevinnomyssk','Невинномысск',''],
  192=>['Юбилейный проспект, 17А','neftekamsk','Нефтекамск',''],
  193=>['Парковая улица, 5/1','nefteyugansk','Нефтеюганск',''],
  194=>['улица Дзержинского, 9к1','nizhnevartovsk','Нижневартовск',''],
  195=>['проспект Строителей, 20','nizhnekamsk','Нижнекамск',''],
  196=>['улица Вторчермета, 1','nizhnij-novgorod','Нижний Новгород','1'],
  197=>['Выйская улица, 70','nizhnij-tagil','Нижний Тагил','1'],
  198=>['улица Космонавтов, 16А','novoaltajsk','Новоалтайск',''],
  199=>['проспект Строителей, 91','novokuzneck','Новокузнецк','1'],
  200=>['улица Карбышева, 2','novokujbyshevsk','Новокуйбышевск',''],
  201=>['улица Калинина, 24Б','novomoskovsk','Новомосковск',''],
  202=>['проспект Дзержинского, 156Ак1','novorossijsk','Новороссийск',''],
  203=>['улица Кирова, 29','novosibirsk','Новосибирск','1'],
  204=>['Комсомольская улица, 18','novouralsk','Новоуральск',''],
  205=>['Ярославская улица, 27','novocheboksarsk','Новочебоксарск',''],
  206=>['улица Маяковского, 66','novocherkassk','Новочеркасск',''],
  207=>['Садовая улица, 26','novoshahtinsk','Новошахтинск',''],
  208=>['улица Геологоразведчиков, 4','novyj-urengoj','Новый Уренгой',''],
  209=>['улица 3-го Интернационала, 169','noginsk','Ногинск',''],
  210=>['Ленинский проспект, 40А','norilsk','Норильск',''],
  211=>['улица Городилова, 2','noyabrsk','Ноябрьск',''],
  212=>['проспект Маркса, 70','obninsk','Обнинск',''],
  213=>['Можайское шоссе, 20','odincovo','Одинцово',''],
  214=>['проспект Ленина, 14','oktyabrskij','Октябрьский',''],
  215=>['улица Декабристов, 45','omsk','Омск','1'],
  216=>['Мало-Луговая улица, 3/1','orel','Орел','1'],
  217=>['Шарлыкское шоссе, 1/2','orenburg','Оренбург','1'],
  218=>['улица Якова Флиера, 4','orekhovo-zuevo','Орехово-Зуево',''],
  219=>['улица Васнецова, 16','orsk','Орск',''],
  220=>['Советская улица, 95А','otradnyj','Отрадный',''],
  221=>['Коммунистическая улица, 10','pavlovo','Павлово',''],
  222=>['улица Плеханова, 14','penza','Пенза','1'],
  223=>['проспект Ильича, 13А','pervouralsk','Первоуральск',''],
  224=>['улица Кардовского, 58','pereslavl-zalesskij','Переславль-Залесский',''],
  225=>['Комсомольский проспект, 1','perm','Пермь','1'],
  226=>['проспект Ленина, 14','petrozavodsk','Петрозаводск','1'],
  227=>['проспект Победы, 67','petropavlovsk-kamchatskij','Петропавловск-Камчатский',''],
  228=>['Западная улица, 11','podolsk','Подольск',''],
  229=>['микрорайон Зелёный Бор-1, 4А','polevskoj','Полевской',''],
  230=>['Северопарковая улица, 1','priozersk','Приозерск',''],
  231=>['улица Гайдара, 50Ак9','prokopevsk','Прокопьевск',''],
  232=>['Коммунальная улица, 68','pskov','Псков',''],
  233=>['Ленинградская улица, 35','pushkin','Пушкин',''],
  234=>['микрорайон Серебрянка, 19А','pushkino','Пушкино',''],
  235=>['микрорайон В, 16А','pushchino','Пущино',''],
  236=>['улица Николая Самардакова, 4','pyt-yah','Пыть-Ях',''],
  237=>['проспект Кирова, 65','pyatigorsk','Пятигорск',''],
  238=>['Бронницкая улица, 6','ramenskoe','Раменское',''],
  239=>['улица Мичурина, 11','revda','Ревда',''],
  240=>['Парковая улица, 4','reutov','Реутов',''],
  241=>['Пойменная улица, 1','rostov-na-donu','Ростов-на-Дону','1'],
  242=>['Тракторная улица, 17','rubcovsk','Рубцовск',''],
  243=>['Федеративная улица, 40','ruza','Руза',''],
  244=>['улица Расплетина, 39','rybinsk','Рыбинск',''],
  245=>['улица Гагарина, 164','ryazan','Рязань','1'],
  246=>['Уфимская улица, 30','salavat','Салават',''],
  247=>['улица Чапаева, 9','salekhard','Салехард',''],
  248=>['проспект Кирова, 147','samara','Самара','1'],
  8=>['улица Щетинкина, 20','sankt-peterburg','Санкт-Петербург','1'],
  249=>['Советская улица, 75','saransk','Саранск','1'],
  250=>['улица Степана Разина, 37','sarapul','Сарапул',''],
  251=>['улица Слонова, 1','saratov','Саратов','1'],
  252=>['улица Ленина, 3А','sayanogorsk','Саяногорск',''],
  253=>['улица Ленина, 70С1','svobodnyj','Свободный',''],
  254=>['улица Вакуленчука, 29/10','sevastopol','Севастополь',''],
  255=>['Морской проспект, 70','severodvinsk','Северодвинск',''],
  256=>['Солнечная улица, 2с4','seversk','Северск',''],
  257=>['Сергиевская улица, 16','sergiev-posad','Сергиев Посад',''],
  258=>['улица Ленина, 215','serov','Серов',''],
  259=>['улица Ворошилова, 56','serpuhov','Серпухов',''],
  260=>['улица Ленина, 9','sibaj','Сибай',''],
  261=>['улица Желябова, 12','simferopol','Симферополь',''],
  262=>['улица Ковтюха, 109','slavyansk-na-kubani','Славянск-на-Кубани',''],
  263=>['улица Октябрьской Революции, 9к2','smolensk','Смоленск',''],
  264=>['улица 20-летия Победы, 210','solikamsk','Соликамск',''],
  265=>['Красная улица, 22А','solnechnogorsk','Солнечногорск',''],
  266=>['проспект Героев, 54','sosnovyj-bor','Сосновый Бор',''],
  267=>['Курортный проспект, 103','sochi','Сочи','1'],
  268=>['улица Мира, 278Д','stavropol','Ставрополь','1'],
  269=>['Молодёжный проспект, 10','staryj-oskol','Старый Оскол',''],
  270=>['улица Худайбердина, 120','sterlitamak','Стерлитамак',''],
  271=>['Пристанционная улица, 19','stupino','Ступино',''],
  272=>['улица 30 лет Победы, 44Б','surgut','Сургут',''],
  273=>['Интернациональная улица, 151А','syzran','Сызрань',''],
  274=>['Коммунистическая улица, 50','syktyvkar','Сыктывкар',''],
  275=>['улица Чучева, 38','taganrog','Таганрог',''],
  276=>['Октябрьская улица, 16А','tambov','Тамбов','1'],
  277=>['улица Дмитрия Донского, 37с1','tver','Тверь','1'],
  278=>['улица Ляпидевского, 32','tihoreck','Тихорецк',''],
  279=>['8-й микрорайон, 38','tobolsk','Тобольск',''],
  280=>['улица Ворошилова, 17','tolyatti','Тольятти','1'],
  281=>['улица Алексея Беленца, 9/1','tomsk','Томск','1'],
  282=>['улица Боярова, 2А','tosno','Тосно',''],
  283=>['Академическая площадь, 5','troick','Троицк',''],
  284=>['улица Октябрьской Революции, 2','tuapse','Туапсе',''],
  285=>['улица Островского, 2','tujmazy','Туймазы',''],
  286=>['проспект Ленина, 77','tula','Тула','1'],
  287=>['улица Герцена, 64','tyumen','Тюмень','1'],
  288=>['Ярославская улица, 12Б','uglich','Углич',''],
  289=>['улица Беклемищева, 44А','uzlovaya','Узловая',''],
  290=>['улица Кирова, 28А','ulan-udeh','Улан-Удэ','1'],
  291=>['улица Островского, 1','ulyanovsk','Ульяновск','1'],
  292=>['Комсомольский проспект, 52А','usole-sibirskoe','Усолье-Сибирское',''],
  293=>['Комсомольская улица, 28А','ussurijsk','Уссурийск',''],
  294=>['Революционная улица, 221','ufa','Уфа','1'],
  295=>['улица 30 лет Октября, 9','uhta','Ухта',''],
  296=>['улица Ленина, 31А','uchaly','Учалы',''],
  297=>['Земская улица, 18','feodosiya','Феодосия',''],
  298=>['Советская улица, 1В','fryazino','Фрязино',''],
  299=>['улица Карла Маркса, 96А','habarovsk','Хабаровск','1'],
  300=>['улица Энгельса, 1','hanty-mansijsk','Ханты-Мансийск',''],
  301=>['улица Тотурбиева, 131','hasavyurt','Хасавюрт',''],
  302=>['улица Дружбы, 1А','himki','Химки',''],
  303=>['улица Калинина, 2Б','hotkovo','Хотьково',''],
  304=>['Промышленная улица, 11к1/1','chajkovskij','Чайковский',''],
  305=>['Железнодорожная улица, 33А','chapaevsk','Чапаевск',''],
  306=>['проспект Максима Горького, 18Б','cheboksary','Чебоксары','1'],
  307=>['улица Энтузиастов, 30','chelyabinsk','Челябинск','1'],
  308=>['Московский проспект, 49','cherepovec','Череповец',''],
  309=>['площадь Ленина','cherkessk','Черкесск',''],
  310=>['улица Гагарина, 16','chekhov','Чехов',''],
  311=>['улица Анохина, 91','chita','Чита',''],
  312=>['Советская улица, 75Б','shadrinsk','Шадринск',''],
  313=>['Советская улица, 21','shatura','Шатура',''],
  314=>['переулок Шишкина, 162','shahty','Шахты',''],
  315=>['улица Победы, 16Г','shchekino','Щекино',''],
  316=>['Пролетарский проспект, 10','shchelkovo','Щелково',''],
  317=>['Чечёрский проезд, 51','shcherbinka','Щербинка',''],
  318=>['улица Горького, 3','ehlektrogorsk','Электрогорск',''],
  319=>['проспект Ленина, 010','ehlektrostal','Электросталь',''],
  320=>['улица Номто Очирова, 7А','ehlista','Элиста',''],
  321=>['Студенческая улица, 62','ehngels','Энгельс',''],
  322=>['проспект Мира, 57','yuzhno-sahalinsk','Южно-Сахалинск',''],
  323=>['улица Машиностроителей, 32','yurga','Юрга',''],
  324=>['улица Кальвица, 14/5','yakutsk','Якутск',''],
  325=>['набережная имени В.И. Ленина, 5А','yalta','Ялта',''],
  326=>['Красноармейская улица, 90','yalutorovsk','Ялуторовск',''],
  327=>['улица Некрасова, 41','yaroslavl','Ярославль','1']
];


function city_address($site_id){
  global $cities;
	return $cities[$site_id][0];
}

function get_phone($link = false){
  return ($link === false) ? '8 800 500 61 65' : '88005006165';
}

?>