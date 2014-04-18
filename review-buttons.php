
<div id="reviewBtns">

<h2>
<?php 
$yesText = of_get_option('yes_text');
echo $yesText;
?>
</h2>

<!--get the value of the options array key-->


<?php 
	
	function get_the_value($key){

	$reviewbtn = of_get_option($key);


	$review_array = array(
		'none' => 'none',
		'review-cars.png' => 'cars.com',
		'review-dealerRater.png' => 'Dealer Rater',
		'review-edmunds.png' => 'Edmunds',
		'review-google.png' => 'google',
		'review-reseller-ratings.png' => 'Reseller Ratings',
		'review-yahoo.png' => 'Yahoo!',
		'review-yelp.png' => 'yelp',
	);

	echo $review_array[$reviewbtn];

} ?>

<?php if (of_get_option('reviewbtn1')!='none') : ?>
	<div class='reviewBtnContainer row'><a href="<?php echo of_get_option('reviewlink1'); ?>" target="_blank"  onClick="_gaq.push(['_trackEvent', 'Reviews', 'Clicks', '<?php get_the_value('reviewbtn1');?>']);">
	<img class="reviewBtn" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo of_get_option('reviewbtn1'); ?>" border="0" alt="Review <?php echo of_get_option('client_name'); ?> On <?php get_the_value('reviewbtn1');?>"></a></div>
<?php endif; ?>

<?php if (of_get_option('reviewbtn2')!='none') : ?>
	<div class='reviewBtnContainer row'><a href="<?php echo of_get_option('reviewlink2'); ?>" target="_blank" onClick="_gaq.push(['_trackEvent', 'Reviews', 'Clicks', '<?php get_the_value('reviewbtn2');?>']);">
	<img class="reviewBtn" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo of_get_option('reviewbtn2'); ?>" border="0" alt="Review <?php echo of_get_option('client_name'); ?> On <?php get_the_value('reviewbtn2');?>"></a></div>
<?php endif; ?>

<?php if (of_get_option('reviewbtn3')!='none') : ?>
	<div class='reviewBtnContainer'><a href="<?php echo of_get_option('reviewlink3'); ?>" target="_blank" onClick="_gaq.push(['_trackEvent', 'Reviews', 'Clicks', '<?php get_the_value('reviewbtn3');?>']);">
	<img class="reviewBtn" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo of_get_option('reviewbtn3'); ?>" border="0" alt="Review <?php echo of_get_option('client_name'); ?> On <?php get_the_value('reviewbtn3');?>"></a></div>
<?php endif; ?>

<?php if (of_get_option('reviewbtn4')!='none') : ?>
	<div class='reviewBtnContainer'><a href="<?php echo of_get_option('reviewlink4'); ?>" target="_blank" onClick="_gaq.push(['_trackEvent', 'Reviews', 'Clicks', '<?php get_the_value('reviewbtn4');?>']);">
	<img class="reviewBtn" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo of_get_option('reviewbtn4'); ?>" border="0" alt="Review <?php echo of_get_option('client_name'); ?> On <?php get_the_value('reviewbtn4');?>"></a></div>
<?php endif; ?>

<?php if (of_get_option('reviewbtn5')!='none') : ?>
	<div class='reviewBtnContainer'><a href="<?php echo of_get_option('reviewlink5'); ?>" target="_blank" onClick="_gaq.push(['_trackEvent', 'Reviews', 'Clicks', '<?php get_the_value('reviewbtn5');?>']);">
	<img class="reviewBtn" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo of_get_option('reviewbtn5'); ?>" border="0" alt="Review <?php echo of_get_option('client_name'); ?> On <?php get_the_value('reviewbtn5');?>"></a></div>
<?php endif; ?>

<?php if (of_get_option('reviewbtn6')!='none') : ?>
	<div class='reviewBtnContainer'><a href="<?php echo of_get_option('reviewlink6'); ?>" target="_blank" onClick="_gaq.push(['_trackEvent', 'Reviews', 'Clicks', '<?php get_the_value('reviewbtn6');?>']);">
	<img class="reviewBtn" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo of_get_option('reviewbtn6'); ?>" border="0" alt="Review <?php echo of_get_option('client_name'); ?> On <?php get_the_value('reviewbtn6');?>"></a></div>
<?php endif; ?>

<?php if (of_get_option('reviewbtn7')!='none') : ?>
	<div class='reviewBtnContainer'><a href="<?php echo of_get_option('reviewlink7'); ?>" target="_blank" onClick="_gaq.push(['_trackEvent', 'Reviews', 'Clicks', '<?php get_the_value('reviewbtn7');?>']);">
	<img class="reviewBtn" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo of_get_option('reviewbtn7'); ?>" border="0" alt="Review <?php echo of_get_option('client_name'); ?> On <?php get_the_value('reviewbtn7');?>"></a></div>
<?php endif; ?>
<div class="close-btn">
<a class="btn" href="javascript:$.pageslide.close()">Close</a>
</div>
</div>
