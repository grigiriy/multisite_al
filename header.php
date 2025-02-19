<!DOCTYPE html>
<html>
  <head>
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(65958358, "init", {
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true,
          webvisor:true
    });
  </script>
  <noscript><div><img src="https://mc.yandex.ru/watch/65958358" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
<meta name="yandex-verification" content="635daf591851a6e6" />
    <meta charset="utf-8" />
    <meta http-equiv="Cache-Control" content="private">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" sizes="120x120" href="/favicon.png" type="image/png">

    <title><?= wp_kses(apply_filters( 'the_content', get_post_field('_genesis_title') ),'strip'); ?></title>
  	<?php wp_head(); ?>
  <link rel="stylesheet" href="<?= get_with_path('css/main.css');?>">

  </head>
  <?php $bodyClass = is_front_page( $post->ID ) ? 'main' : '';
  
  check_bot($post->ID);
    print_r($_SERVER['HTTP_USER_AGENT']);
  ?>



<body>
<div class="app container-fluid">
  <?php get_template_part('theme-helpers/template-parts/header'); ?>
