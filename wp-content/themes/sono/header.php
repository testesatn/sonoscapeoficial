<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
	<script src="https://kit.fontawesome.com/80845dd375.js" crossorigin="anonymous"></script>
	<script>
	jQuery(document).ready(function($) {
	$('.dropdown-toggle').dropdown();
	});
	</script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<div class="container-fluid nopad inverse half-row">
	<div class="container ltop glassw">
				
				<div class="col-md-5 col-sm-4 col-xs-12 hidden-xs text-center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo" src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="<?php bloginfo( 'name' ); ?>"></a>
				</div>

				<div class="col-md-3  col-sm-4 col-xs-12 hidden-xs">
					<div class="half-row2 text-center topfx white">
						<p>FALE CONOSCO</p>
						<a href="https://api.whatsapp.com/send/?phone=%2B5562996107777&text&type=phone_number&app_absent=0" class="btn btn-lg btn-success twhite round"><i class="fab fa-whatsapp"></i> (62) 99610-7777</a>
					</div>					
				</div>

				<div class="col-md-4 col-md-4 col-sm-4 col-xs-12 hidden-xs">
					<div class="half-row2 topi white text-right">
						<p class="twhite"><i class="fas fa-phone-square-alt"></i> Fixo : (62) 3110 5757</p>						
						<p class="twhite"><i class="fas fa-phone-square-alt"></i> Nacional: 0800 717 7772 </p>
						<p class="twhite"><i class="fab fa-whatsapp"></i> (62) 99610 7777</p>
						<p class="twhite"><i class="fab fa-whatsapp"></i> (11) 97533 5757</p>
					</div>	
				</div>

 				<!-- Mobile -->
				
				<div class="col-xs-9 visible-xs">
					<img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="<?php bloginfo( 'name' ); ?>">
				</div>	
				<div class="col-xs-3 visible-xs">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="visible-xs" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">	
						</a>
					</div>
				</div>			
	</div>
</div>

	<header id="header">		
			<div id="main-navigation" class="navbar navbar-default">
				<div class="container bgcor1">				
					<nav class="collapse navbar-collapse navbar-main-navigation" role="navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'main-menu',
									'depth'          => 2,
									'container'      => false,
									'menu_class'     => 'nav navbar-nav',
									'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
									'walker'         => new Odin_Bootstrap_Nav_Walker()
								)
							);
						?>
					</nav><!-- .navbar-collapse -->
				</div>
			</div><!-- #main-navigation-->		
	</header><!-- #header -->
	


