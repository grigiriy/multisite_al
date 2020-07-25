<!DOCTYPE html>
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
<div class="app">
  <?php get_template_part('theme-helpers/template-parts/header'); ?>
