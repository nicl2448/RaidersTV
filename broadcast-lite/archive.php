<?php
/**
 * @package Wordpress
 * @subpackage Broadcast Lite
 */
 get_header(); ?>
 
<!-- Template in use: archive.php -->
<div class="main">

    <?php get_template_part('includes/masthead/masthead'); ?>

    <?php get_template_part('includes/blog/blog', 'archive'); ?>

    <?php get_template_part('includes/ads/ads'); ?>

</div>

<?php get_template_part('includes/footer/footer'); ?>

<?php get_footer(); ?>
