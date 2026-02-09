<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bus_Rent_Dhaka
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> style="scroll-behavior: smooth;">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- TOP HEADER -->
<div id="brd-topbar">
  <div class="container brd-topbar-inner">
    <div>Trusted Corporate & Tourist Bus Rental in Dhaka</div>
    <div class="brd-topbar-right">
      <span><i class="fa fa-phone"></i> +880 17XX-XXXXXX</span>
      <span>24/7 Service</span>
    </div>
  </div>
</div>

<!-- MAIN HEADER -->
<header id="brd-header">
  <div class="container brd-header-inner">
    <div class="brd-logo">BRD Bus Rental</div>
    <nav class="brd-nav">
      <a href="#">Home</a>
      <a href="#">Services</a>
      <a href="#">Fleet</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
    </nav>
  </div>
</header>