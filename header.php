<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package themefisher
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Webmaster Tool -->
<meta name="google-site-verification" content="B4QFWpUw8F6hGAc84cqdtbLwMoxtbOAiJ5FDtFj-Sag" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />


<?php wp_head(); ?>

</head>

<body>


<header>
  <nav class="navigation  navbar " id="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo cs_get_option('site_logo')  ?>" alt="">
        </a>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','menu_class'=>'nav navbar-nav menu main-menu navbar-right' ) ); ?>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>
</header>





<section class="wrapper">