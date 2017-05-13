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

    <!--fonts-->

  



<?php wp_head(); ?>
</head>

<body>


<header>
  <nav class="navbar navbar-fixed-top" id="navigation">
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
          <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.svg" alt=""> 
        </a>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','menu_class'=>'nav navbar-nav menu main-menu' ) ); ?>
        <ul class="nav navbar-nav navbar-right menu ">
          <li>
            <!-- Cart Icon -->
            <div class="header-cart-icon">
              <a  href="<?php echo edd_get_checkout_uri(); ?>">
                <span class="tf-ion-bag cart-icon"></span>
                <span class="counter">
                <?php echo edd_get_cart_quantity(); ?>
                </span>
              </a>
            </div>
          </li>
          <?php if(!is_user_logged_in()): ?>
            <li>
              <a class="btn-login" href="<?php echo esc_url( home_url( '/' ) ); ?>account">
                Login
              </a>
            </li>
          <?php  endif; ?>
          <?php if(is_user_logged_in()): ?>
          <li class="dropdown loggedin-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                  $user = get_user_by('ID', get_current_user_id());
                   echo get_avatar($user->user_email, 25);
                   echo $user->display_name;
                  ?> <span class="caret"></span></a>
              <div class="dropdown-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu','menu_class'=>'nav navbar-nav user menu' ) ); ?>
                <a class="logout-button" href="<?php echo wp_logout_url(); ?>">Logout</a>
            </div>
          </li>
          <?php  endif; ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>
</header>





  <section class="wrapper">