<?php
/**
 * @package Wordpress
 * @subpackage Broadcast Lite
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="cp-header">
    <div class="cp-header__inner l-inner">
       
        <?php get_template_part('includes/header/title'); ?>
        
        <?php get_template_part('includes/header/game-playing'); ?>
        
        <?php get_template_part('includes/header/nav-icon'); ?>
        
    </div>
       
        <?php get_template_part('includes/header/nav'); ?>
        
</header>
