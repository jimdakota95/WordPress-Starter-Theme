<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 lte8 lte7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js ie7 lte8 lte7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js ie8 lte8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE)]><html class="no-js" <?php language_attributes(); ?>><![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
<?php /* Print the <title> tag based on what is being viewed. */
	global $page, $paged;
	wp_title( '|', true, 'right' );
	// Add the blog name.
	bloginfo( 'name' );
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) 
		echo ' | ' . sprintf( 'Page %s', max( $paged, $page ) ); ?>
</title>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<script src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
	<script type="text/javascript" src="<?php bloginfo( 'template_url'); ?>/js/selectivizr.js"></script>
	<![endif]--><!--Select-ivizr JS library for CSS3 selectors, DD-PNG fix for IE6-8-->

<?php 
if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if(!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"), true, '1.6.1');
	wp_enqueue_script('jquery');
	}
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
	<div id="container">
	<header id="branding" role="banner">
	<h1>
		<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	</h1>
	<p><?php bloginfo( 'description' ); ?></p>

	<nav id="access" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav>
	</header>
