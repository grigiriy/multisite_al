<!DOCTYPE html>
<html>
  <head>
<meta name="yandex-verification" content="635daf591851a6e6" />
    <meta charset="utf-8" />
    <meta http-equiv="Cache-Control" content="private">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= wp_kses(apply_filters( 'the_content', get_post_field('_genesis_title') ),'strip'); ?></title>
  	<?php wp_head(); ?>
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
  </head>
  <?php $bodyClass = is_front_page( $post->ID ) ? 'main' : '';
  
  check_bot();
  ?>


<!-- theme styles -->
<link rel="stylesheet" href="<?= get_with_path('css/main.css');?>">

<body>
<div class="app container-fluid">
  <?php get_template_part('theme-helpers/template-parts/header'); ?>
