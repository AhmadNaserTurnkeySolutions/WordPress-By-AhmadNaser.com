<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset');?>">
<title>
<?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
	?>
</title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="outerWrapper">
    <header>
    <?php 
	if (is_page_template('working_future.php')) { ?>
    	<a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_working.png" width="410" height="181" alt="TPA: Trans Planet Airlines" /><br>
  <img src="<?php echo get_template_directory_uri(); ?>/images/working_name.gif" width="373" height="37" alt="Working the Future"></a>
    <?php } else { ?>
    	<a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="410" height="181" alt="TPA: Trans Planet Airlines" /><br>
  <img src="<?php echo get_template_directory_uri(); ?>/images/tpa_name.gif" width="373" height="37" alt="Trans Planet Airlines"></a>
	<?php } ?>
        <nav class="mainMenu">
            <?php wp_nav_menu('Main'); ?>
        </nav>
    </header>
