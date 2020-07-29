<!DOCTYPE html>
<meta name="yandex-verification" content="635daf591851a6e6" />
<meta name="google-site-verification" content="o6Vo1e2a89wiG2lfEOh8Q41t9hyYYtqjxJd9TFYM40M" />
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="Cache-Control" content="private">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= wp_kses(apply_filters( 'the_content', get_post_field('_genesis_title') ),'strip'); ?></title>
  	<?php wp_head(); ?>
  </head>
  <?php $bodyClass = is_front_page( $post->ID ) ? 'main' : '' ?>


<!-- theme styles -->
<link rel="stylesheet" href="<?= get_with_path('css/main.css');?>">

<body>
<div class="app container-fluid">
  <?php get_template_part('theme-helpers/template-parts/header'); ?>
