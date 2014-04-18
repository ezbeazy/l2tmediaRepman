<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage L2TMedia_Repman
 * @since L2T Media Repman 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title>
	<?php 
		//wp_title( '|', true, 'right' ); bloginfo( 'name' ); 
		echo of_get_option('site_title');
	?>
	</title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<script type="text/javascript">

  	var _gaq = _gaq || [];
  	_gaq.push(['_setAccount', '<?php echo of_get_option('google_analytics'); ?>']);
  	_gaq.push(['_trackPageview']);

  	(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  	})();

	</script>

</head>

<body <?php body_class($class); ?>>

	<div class="row">
		<?php if ( get_header_image() ) : ?>
		<div id="site-header" class="large-8 medium-7 small-12 columns">
			<!--<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">-->
				<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
			<!--</a>-->
		</div>
		<?php  else :?>
		<div class="large-8 medium-7 small-12 columns" >
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>
		<?php endif; ?>
		<div id="client-site-button" class="large-3 medium-3 small-12 columns">
			<?php if ( of_get_option('button_uploader') ) { ?>
			<a href="<?php echo of_get_option('site_link'); ?>" target="_blank">
            	<img src="<?php echo of_get_option('button_uploader'); ?>" />
            </a>
            <?php } ?>
		</div>
	</div><!-- row -->