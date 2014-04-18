<?php
/**
 * @package WordPress
 * @subpackage L2TMedia_Repman
 * @since L2T Media Repman 1.0
 */

get_header(); ?>

		<div class="row">
			<div id="main-header-text" class="large-7 large-offset-1 medium-8 medium-offset-1 columns">
				<h1 style="color:<?php echo of_get_option('textcolorpicker'); ?>;"><?php echo of_get_option('header_text'); ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="large-7 large-offset-1 medium-8 medium-offset-1 columns">
				<p style="color:<?php echo of_get_option('textcolorpicker'); ?>;"><?php echo of_get_option('body_text'); ?></p>
			</div>
		</div>

		<div class="main-content-question row">

			<div class="large-4 large-offset-1 medium-4 medium-offset-1 columns">
				<p style="color:<?php echo of_get_option('textcolorpicker'); ?>;">Would you recommend us to your family and friends?</p>
			</div>
				
			<div class="large-6 medium-6 small-12 columns" id="review-buttons">
				<div class="large-5 large-offset-2 small-6 columns">
				<a href="#modal" class="reviewyesbtn" onClick="_gaq.push(['_trackEvent', 'Reviews', 'Type', 'Good Review']);" class="first">
					<img src="<?php echo get_template_directory_uri() ?>/img/button-yes.png" border="0" alt="Yes" />
				</a>
				</div>
				<div class="large-5 small-6 columns">
				<a href="#modal2" class="reviewnobtn" onClick="_gaq.push(['_trackEvent', 'Reviews', 'Type', 'Bad Review']);" class="first">
					<img src="<?php echo get_template_directory_uri() ?>/img/button-no.png" border="0" alt="No" />
				</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="main-image">
            	<?php if ( of_get_option('main_uploader') ) { ?>
            	<img src="<?php echo of_get_option('main_uploader'); ?>" />
            	<?php } ?>
        	</div>
		</div>

<?php get_footer(); ?>