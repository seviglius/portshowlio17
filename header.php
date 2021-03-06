<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portshowlio17
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="<?php bloginfo('template_url');?>/js/jquery-3.2.1.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/isotope.pkgd.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/cells-by-row.js"></script>
<script src="<?php bloginfo('template_url');?>/js/imagesloaded.pkgd.min.js"></script>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/icomoon/style.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
