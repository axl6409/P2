<?php
/**
 * The header for our theme.
 *
 * Displays all of the head section.
 *
 * @package Nisarg
 */
?>
<!DOCTYPE html>

<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<header id="masthead"  role="banner">
	<nav id="site-navigation" class="main-navigation navbar-fixed-top navbar-left" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="container" id="navigation_menu">
			<div class="navbar-header">
				<?php if ( has_nav_menu( 'primary' ) ) { ?>
					<button type="button" class="menu-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span> 
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<?php } ?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' )?></a>
				
				<?php if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array(
						'theme_location'    => 'primary',
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
						'menu_class'        => 'primary-menu',
					) ); } ?>
				
				<div id="search" class="header_search">
					<?php get_search_form(); ?>
				</div>
			</div><!-- .navbar-header -->
		</div><!--#container-->
	</nav>
	<div id="cc_spacer"></div><!-- used to clear fixed navigation by the themes js --> 

	<?php if ( is_home() ) : ?>

		<div class="cstm_site_header site-header">
			<div class="cstm_site_branding site-branding">
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<h2 class="cstm_site_description site-description"><?php bloginfo( 'description' ); ?></h2>
				</a>
			</div><!--.site-branding-->
		</div><!--.site-header-->

		<?php elseif ( is_single() ) : ?>

		<div class="cstm_site_header site-header">
			<div class="cstm_site_branding site-branding">
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<h2 class="cstm_site_description site-description"><?php bloginfo( 'description' ); ?></h2>
				</a>
			</div><!--.site-branding-->
		</div><!--.site-header-->

		<?php elseif ( is_front_page() ) : ?>

		<div class="cstm_site_header site-header">
			<div class="cstm_site_branding site-branding">
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<h2 class="cstm_site_description site-description"><?php bloginfo( 'description' ); ?></h2>
				</a>
			</div><!--.site-branding-->
		</div><!--.site-header-->

		<?php elseif ( is_archive() ) : ?>

		<div class="cstm_site_header site-header">
			<div class="cstm_site_branding site-branding">
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<h2 class="cstm_site_description site-description"><?php bloginfo( 'description' ); ?></h2>
				</a>
			</div><!--.site-branding-->
		</div><!--.site-header-->

		<?php elseif ( is_search() ) : ?>

		<div class="cstm_site_header site-header">
			<div class="cstm_site_branding site-branding">
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<h2 class="cstm_site_description site-description"><?php bloginfo( 'description' ); ?></h2>
				</a>
			</div><!--.site-branding-->
		</div><!--.site-header-->

		<?php else : ?>

		<?php 
			get_field( 'image' );
			$image = get_field( 'image' );
		?>

		<div class="cstm_site_header ">

			<img class="cstm_header_image" src="<?php echo $image; ?>" alt="<?php echo get_the_title(get_field('image_test')); ?> ">

			<div class="cstm_header_branding">
				<a class="home-link cstm_header_container" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( the_title( 'name', 'display' ) ); ?>" rel="home">



					<?php 
					if ( is_home() ):
					?>
						<h1 class="cstm_header_site_title site-title">Nos Actualités</h1>
						<h2 class="site-description">Retrouvez tous nos articles d'actualités</h2>
					<?php else: ?>
						<h1 class="cstm_header_site_title site-title"><?php the_title(); ?></h1>
					<?php endif; ?>
					
				</a>
			</div>
		</div><!--.hero_container-->

	<?php endif; ?>


</header>

<div id="content" class="site-content">
