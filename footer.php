<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage L2TMedia_Repman
 * @since L2T Media Repman 1.0
 */
?>
	<!-- Start Footer -->
	<div class="row">

		<div class="footer">
		<div class="large-7 medium-6 column">
			<div class="footer-info">
				<p style="color:<?php echo of_get_option('textcolorpicker'); ?>;"><?php echo of_get_option('footer_text'); ?></p>
			</div>
		</div>

		
		<div class="large-5 medium-5 column">

			    <div id="footer-links">          
				<span class="social-link">
					<a href="<?php echo of_get_option('facebook_link'); ?>" target="_blank" onClick="_gaq.push(['_trackEvent', 'Social', 'Clicks', 'Facebook']);">
						<img src="<?php echo get_template_directory_uri() ?>/img/facebook.png" border="0" class="icons">
					</a>
				</span>
				<span class="social-link">
					<a href="<?php echo of_get_option('twitter_link'); ?>" target="_blank" onClick="_gaq.push(['_trackEvent', 'Social', 'Clicks', 'Twitter']);">
						<img src="<?php echo get_template_directory_uri() ?>/img/twitter.png" border="0" class="icons">
					</a>
				</span>
				<span class="social-link">
					<a href="<?php echo of_get_option('youtube_link'); ?>" target="_blank" onClick="_gaq.push(['_trackEvent', 'Social', 'Clicks', 'Youtube']);">
						<img src="<?php echo get_template_directory_uri() ?>/img/youtube.png" border="0" class="icons">
					</a>
				</span>
				<span class="social-link">
					<a href="<?php echo of_get_option('blog_link'); ?>" target="_blank" onClick="_gaq.push(['_trackEvent', 'Social', 'Clicks', 'Blog']);">
						<img src="<?php echo get_template_directory_uri() ?>/img/blog.png" border="0" class="icons">
					</a>
				</span>
				<span class="social-link GooglePlusOff">
					<g:plusone annotation="none"></g:plusone>
				</span> 
			
				<a href="http://www.l2tmedia.com" target="_blank" onClick="_gaq.push(['_trackEvent', 'PoweredBy', 'Clicks', 'L2TMedia']);">
					<img src="<?php echo get_template_directory_uri() ?>/img/poweredBy.png" border="0" class="L2Ticon">
				</a>
			
				</div>
		</div>
	</div>

		
	</div> <!-- footer -->

	<div class="pageslide" style="display:none;">
    	<div id="modal">
		<?php include 'review-buttons.php'; ?>
		</div>
	</div>

	<div class="pageslide" style="display:none;">
    	<div id="modal2">
		<?php include 'review-form.php'; ?>
		</div>
	</div>



	<script src="<?php echo get_template_directory_uri() ?>/inc/jquery-1.11.0.min.js"></script>
	<script src="<?php echo get_template_directory_uri() ?>/inc/jquery.pageslide.min.js"></script>

	<script type="text/javascript">
			(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			})();
	</script>

	<script>
		$("a.reviewyesbtn").pageslide({ direction: "left", modal: true });
		$("a.reviewnobtn").pageslide({ direction: "left", modal: true });
	</script>

	<script>
	
	
	$(function(){
    	$('#submissionForm').submit(function( event ){
    
    	var dataString = $( this ).serialize();

		$.ajax({  
        	type: "POST",  
	        url: "<?php echo get_template_directory_uri() ?>/processForm.php",  
	        data: dataString, 
        	success: function(returnval) {

        	$('.return_message').html(returnval);
        	
        	if ($('.thank-you').html() == "Thank you for your feedback!"){
	        	$(".the-form").hide();

	    	}
        
        	}
        });  

        event.preventDefault();
        return false;

  		}); 
	}); 
	</script>

	<?php wp_footer(); ?>
</body>
</html>