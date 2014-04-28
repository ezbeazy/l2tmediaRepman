<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'none' => __('none', 'options_check'),
		'review-cars.png' => __('cars.com', 'options_check'),
		'review-dealerRater.png' => __('Dealer Rater', 'options_check'),
		'review-edmunds.png' => __('Edmunds', 'options_check'),
		'review-google.png' => __('google', 'options_check'),
		'review-reseller-ratings.png' => __('Reseller Ratings', 'options_check'),
		'review-yahoo.png' => __('Yahoo!', 'options_check'),
		'review-yelp.png' => __('yelp', 'options_check'),	
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Site Copy', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Site Title', 'options_check'),
		'desc' => __('Title for website', 'options_check'),
		'id' => 'site_title',
		'std' => 'Site Title',
		'type' => 'text');

	$options[] = array(
		'name' => __('Client Name', 'options_check'),
		'desc' => __('Client name for SEO purposes', 'options_check'),
		'id' => 'client_name',
		'std' => 'Dealer Name',
		'type' => 'text');

	$options[] = array(
		'name' => __('Header Text', 'options_check'),
		'desc' => __('Text for the main header of the site', 'options_check'),
		'id' => 'header_text',
		'std' => 'We Value Your Opinion',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Body Text', 'options_check'),
		'desc' => __('Text for the body copy of the site', 'options_check'),
		'id' => 'body_text',
		'std' => 'Please take a moment to write about your experiences at [DEALER NAME]. Feedback makes us better. Thanks for taking the time.',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Footer Text', 'options_check'),
		'desc' => __('Text for the footer copy of the site', 'options_check'),
		'id' => 'footer_text',
		'std' => 'Bob Smith BMW / 24500 Calabasas Rd. Calabasas, CA 91302 / Call Us Now: (888) 695-6060',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Links', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Client Site Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the clients website', 'options_check'),
		'id' => 'site_link',
		'std' => '#',
		'type' => 'text');

	$options[] = array(
		'name' => __('Facebook Footer Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the clients Facebook Page', 'options_check'),
		'id' => 'facebook_link',
		'std' => '#',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter Footer Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the clients Twitter Page', 'options_check'),
		'id' => 'twitter_link',
		'std' => '#',
		'type' => 'text');

	$options[] = array(
		'name' => __('Youtube Footer Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the clients Youtube options_pages', 'options_check'),
		'id' => 'youtube_link',
		'std' => '#',
		'type' => 'text');

	$options[] = array(
		'name' => __('Blog Footer Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the clients Blog', 'options_check'),
		'id' => 'blog_link',
		'std' => '#',
		'type' => 'text');

	$options[] = array(
		'name' => __('Site Images', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Client Site Button', 'options_check'),
		'desc' => __('Upload an image of a new site button or choose a button previously uploaded from the media browser', 'options_check'),
		'id' => 'button_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Main Site Image', 'options_check'),
		'desc' => __('Upload an image of a new main site image or choose a button previously uploaded from the media browser', 'options_check'),
		'id' => 'main_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Text Color', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Choose Main Text Color', 'options_check'),
		'desc' => __('Default #222', 'options_check'),
		'id' => 'maintextcolorpicker',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Choose Footer Text Color', 'options_check'),
		'desc' => __('Default #222', 'options_check'),
		'id' => 'footertextcolorpicker',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Review Text', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Yes Text', 'options_check'),
		'desc' => __('Text for the yes review button', 'options_check'),
		'id' => 'yes_text',
		'std' => 'REVIEW US ON',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('No Text', 'options_check'),
		'desc' => __('Text for the no review button', 'options_check'),
		'id' => 'no_text',
		'std' => 'Please let us know how we could have improved your experience with us.',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Review Buttons', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('First Review Button', 'options_check'),
		'desc' => __('Select first review button', 'options_check'),
		'id' => 'reviewbtn1',
		'std' => 'none',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('First Review Button Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the reviewsite', 'options_check'),
		'id' => 'reviewlink1',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Second Review Button', 'options_check'),
		'desc' => __('Select second review button', 'options_check'),
		'id' => 'reviewbtn2',
		'std' => 'none',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Second Review Button Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the reviewsite', 'options_check'),
		'id' => 'reviewlink2',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Third Review Button', 'options_check'),
		'desc' => __('Select third review button', 'options_check'),
		'id' => 'reviewbtn3',
		'std' => 'none',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Third Review Button Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the reviewsite', 'options_check'),
		'id' => 'reviewlink3',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Fourth Review Button', 'options_check'),
		'desc' => __('Select fourth review button', 'options_check'),
		'id' => 'reviewbtn4',
		'std' => 'none',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Fourth Review Button Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the reviewsite', 'options_check'),
		'id' => 'reviewlink4',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Fifth Review Button', 'options_check'),
		'desc' => __('Select fifth review button', 'options_check'),
		'id' => 'reviewbtn5',
		'std' => 'none',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Fifth Review Button Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the reviewsite', 'options_check'),
		'id' => 'reviewlink5',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Sixth Review Button', 'options_check'),
		'desc' => __('Select sixth review button', 'options_check'),
		'id' => 'reviewbtn6',
		'std' => 'none',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Sixth Review Button Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the reviewsite', 'options_check'),
		'id' => 'reviewlink6',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Seventh Review Button', 'options_check'),
		'desc' => __('Select seventh review button', 'options_check'),
		'id' => 'reviewbtn7',
		'std' => 'none',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Seventh Review Button Link', 'options_check'),
		'desc' => __('Copy and Paste the link to the reviewsite', 'options_check'),
		'id' => 'reviewlink7',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Form', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Form Emails', 'options_check'),
		'desc' => __('Enter the emails that the form sends too. Seperate emails by commas ( , )', 'options_check'),
		'id' => 'form_emails',
		'std' => 'sendformto@dealer.com',
		'type' => 'text');

	$options[] = array(
		'name' => __('Thank you from', 'options_check'),
		'desc' => __('Enter the of the name of the person giving the thank you message', 'options_check'),
		'id' => 'form_name',
		'std' => 'GM John Doe',
		'type' => 'text');

	$options[] = array(
		'name' => __('Phone number', 'options_check'),
		'desc' => __('Enter the of the phone number of the person giving the thank you message', 'options_check'),
		'id' => 'form_phone',
		'std' => '(555) 555-555',
		'type' => 'text');

	$options[] = array(
		'name' => __('Email', 'options_check'),
		'desc' => __('Enter the of the email of the person giving the thank you message', 'options_check'),
		'id' => 'form_email',
		'std' => 'gmjohndoe@dealername.com',
		'type' => 'text');

	$options[] = array(
		'name' => __('Analytics', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Google Analytics Code', 'options_check'),
		'desc' => __('Enter the GA code ex. UA-XXXXX-X', 'options_check'),
		'id' => 'google_analytics',
		'std' => 'UA-XXXXX-X',
		'type' => 'text');
	

	return $options;
}