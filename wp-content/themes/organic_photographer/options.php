<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {

	// Radio button array for columns
	$columns_array = array("one" => __("One Column Layout", 'organicthemes'),"two" => __("Two Column Layout", 'organicthemes'),"three" => __("Three Column Layout", 'organicthemes'));
	
	// Test data
	$test_array = array("one" => __("One", 'organicthemes'),"two" => __("Two", 'organicthemes'),"three" => __("Three", 'organicthemes'),"four" => __("Four", 'organicthemes'),"five" => __("Five", 'organicthemes'));

	// Multicheck Array
	$multicheck_array = array("one" => __("French Toast", 'organicthemes'), "two" => __("Pancake", 'organicthemes'), "three" => __("Omelette", 'organicthemes'), "four" => __("Crepe", 'organicthemes'), "five" => __("Waffle", 'organicthemes'));

	// Multicheck Defaults
	$multicheck_defaults = array("one" => "true","five" => "true");

	// Background Defaults
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	// Slider Transition Array
	$transition_array = array("1000" => __("1 Second", 'organicthemes'), "2000" => __("2 Seconds", 'organicthemes'), "4000" => __("4 Seconds", 'organicthemes'), "6000" => __("6 Seconds", 'organicthemes'), "8000" => __("8 Seconds", 'organicthemes'), "10000" => __("10 Seconds", 'organicthemes'), "12000" => __("12 Seconds", 'organicthemes'), "14000" => __("14 Seconds", 'organicthemes'), "16000" => __("16 Seconds", 'organicthemes'), "18000" => __("18 Seconds", 'organicthemes'), "20000" => __("20 Seconds", 'organicthemes'), "30000" => __("30 Seconds", 'organicthemes'), "60000" => __("1 Minute", 'organicthemes'), "999999999" => __("Hold Frame", 'organicthemes'));
	
	// Yes or No Array
	$yesno_array = array("true" => __("Yes", 'organicthemes'), "false" => __("No", 'organicthemes'));
	
	// Pull product categories into an array
	$args = array( 'hide_empty' => '0' );
	$options_product = array();
	$options_product_obj = get_terms('product_cat', $args);
	if( $options_product_obj ) {
	    foreach( $options_product_obj as $_product ) {
	        $options_product[$_product->slug] = $_product->name;
	    }
	}
	array_unshift( $options_product, 'All Categories' );

	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Add all categories option
    $options_categories[0] = __("All Categories", 'organicthemes');

	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages['false'] = __("Select a page:", 'organicthemes');
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';

	$options = array();

	$options[] = array( "name" => __("Homepage", 'organicthemes'),
						"type" => "heading");

		$options[] = array( "name" => __("Featured Slideshow Category", 'organicthemes'),
							"desc" => __("Choose the category you wish to display in the homepage slideshow.", 'organicthemes'),
							"id" => "category_slideshow_home",
							"std" => __("Select a category:", 'organicthemes'),
							"type" => "select",
							"options" => $options_categories);
							
		$options[] = array( "name" => __("Featured Slideshow Posts To Display", 'organicthemes'),
							"desc" => __("Enter the number of posts you would like to display on the homepage slideshow.", 'organicthemes'),
							"id" => "postnumber_slideshow_home",
							"std" => "20",
							"type" => "text");
							
		$options[] = array( "name" => __("Slideshow Transition Interval", 'organicthemes'),
							"desc" => __("Choose the transition time for the slideshow. This is the time the frame is held before transitioning to the next slide.", 'organicthemes'),
							"id" => "transition_interval",
							"std" => "10000",
							"type" => "select",
							"options" => $transition_array);
							
		$options[] = array( "name" => __("Select Featured Page", 'organicthemes'),
							"desc" => __("Choose the page you wish to display in the featured featured section beneath the slider.", 'organicthemes'),
							"id" => "select_page",
							"std" => __("Select a page:", 'organicthemes'),
							"type" => "select",
							"options" => $options_pages);
							
		$options[] = array( "name" => __("Home Button Text", 'organicthemes'),
							"desc" => __("Enter the text you wish to display for the home shop button.", 'organicthemes'),
							"id" => "home_btn_text",
							"std" => __("View Collection", 'organicthemes'),
							"type" => "text");
							
		$options[] = array( "name" => __("Home Button Link", 'organicthemes'),
							"desc" => __("Enter the link you wish to use for the home shop button.", 'organicthemes'),
							"id" => "home_btn_link",
							"std" => __("#blank", 'organicthemes'),
							"type" => "text");
							
	$options[] = array( "name" => __("Layout", 'organicthemes'),
						"type" => "heading");
						
		$options[] = array( "name" => __("Display Homepage Content?", 'organicthemes'),
							"desc" => __("Selecting this option will display the featured page and sidebar beneath the slider on the homepage.", 'organicthemes'),
							"id" => "display_home_content",
							"std" => "0",
							"type" => "checkbox");
						
		$options[] = array( "name" => __("Display Blog Sidebar?", 'organicthemes'),
							"desc" => __("Selecting this option will display the sidebar on the blog page template.", 'organicthemes'),
							"id" => "display_blog_sidebar",
							"std" => "0",
							"type" => "checkbox");
						
		$options[] = array( "name" => __("Display Page Featured Image?", 'organicthemes'),
							"desc" => __("Selecting this option will display the featured image in the default page template.", 'organicthemes'),
							"id" => "display_feature_page",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Display Post Featured Image or Video?", 'organicthemes'),
							"desc" => __("Selecting this option will display the featured image or video in an individual post.", 'organicthemes'),
							"id" => "display_feature_post",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Display Blog Featured Image or Video?", 'organicthemes'),
							"desc" => __("Selecting this option will display the featured image or video on the blog page template.", 'organicthemes'),
							"id" => "display_feature_blog",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Display Slideshow Page Content?", 'organicthemes'),
							"desc" => __("Selecting this option will display the page title and body content on the slideshow page template.", 'organicthemes'),
							"id" => "display_slideshow_info",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Display Drop Shadows?", 'organicthemes'),
							"desc" => __("Selecting this option will display drop shadows around content boxes.", 'organicthemes'),
							"id" => "drop_shadows",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Enable CSS3 Full Width Background Image?", 'organicthemes'),
							"desc" => __("Enables an applied background image to stretch to the full width of the browser. Do not use with a tiled background.", 'organicthemes'),
							"id" => "background_stretch",
							"std" => "0",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Enable Responsive Layout?", 'organicthemes'),
							"desc" => __("Enables the responsive site layout for the iPhone, iPad and mobile devices.", 'organicthemes'),
							"id" => "enable_responsive",
							"std" => "1",
							"type" => "checkbox");
						
	$options[] = array( "name" => __("Page Templates", 'organicthemes'),
						"type" => "heading");
						
		$options[] = array( "name" => __("Blog Category", 'organicthemes'),
							"desc" => __("Choose the category you wish to display on the blog page template.", 'organicthemes'),
							"id" => "category_blog",
							"std" => __("Select a category:", 'organicthemes'),
							"type" => "select",
							"options" => $options_categories);
									
		$options[] = array( "name" => __("Blog Posts To Display", 'organicthemes'),
							"desc" => __("Enter the number of posts you would like to display on the blog page template.", 'organicthemes'),
							"id" => "postnumber_blog",
							"std" => "5",
							"type" => "text");
							
		$options[] = array( "name" => __("Full Width Shop Template Category", 'organicthemes'),
							"desc" => __("Choose the product category you wish to display in the full width shop page template. This option requires the WooCommerce plugin installed and activated.", 'organicthemes'),
							"id" => "category_products",
							"std" => __("Select a category:", 'organicthemes'),
							"type" => "select",
							"options" => $options_product);
							
		$options[] = array( "name" => __("Full Width Shop Template Products Displayed", 'organicthemes'),
							"desc" => __("Enter the number of products you would like displayed in the full width shop page template. This option requires the WooCommerce plugin installed and activated.", 'organicthemes'),
							"id" => "postnumber_products",
							"std" => "24",
							"type" => "text");
						
	$options[] = array( "name" => __("Portfolios", 'organicthemes'),
						"type" => "heading");
						
		$options[] = array( "name" => __("Display Portfolio Info on Page Templates?", 'organicthemes'),
							"desc" => __("Select whether or not you would like to display the post title and excerpt on portfolio page templates.", 'organicthemes'),
							"id" => "display_portfolio_info_page",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Three Column Portfolio Template Category", 'organicthemes'),
							"desc" => __("Choose the category you wish to display on the three column portfolio page template.", 'organicthemes'),
							"id" => "category_portfolio_three",
							"std" => __("Select a category:", 'organicthemes'),
							"type" => "select",
							"options" => $options_categories);
							
		$options[] = array( "name" => __("Three Column Portfolio Posts Displayed", 'organicthemes'),
							"desc" => __("Enter the number of posts you would like to display on the three column portfolio page template.", 'organicthemes'),
							"id" => "postnumber_portfolio_three",
							"std" => "12",
							"type" => "text");





							
		$options[] = array( "name" => __("Two Column Portfolio Template Category", 'organicthemes'),
							"desc" => __("Choose the category you wish to display on the two column portfolio page template.", 'organicthemes'),
							"id" => "category_portfolio_two",
							"std" => __("Select a category:", 'organicthemes'),
							"type" => "select",
							"options" => $options_categories);
							
		$options[] = array( "name" => __("Two Column Portfolio Posts Displayed", 'organicthemes'),
							"desc" => __("Enter the number of posts you would like to display on the two column portfolio page template.", 'organicthemes'),
							"id" => "postnumber_portfolio_two",
							"std" => "12",
							"type" => "text");
							
							
		$options[] = array( "name" => __("Two Column Portfolio Template Category", 'organicthemes'),
							"desc" => __("Choose the category you wish to display on the two column portfolio page template.", 'organicthemes'),
							"id" => "category_portfolio_two_new",
							"std" => __("Select a category:", 'organicthemes'),
							"type" => "select",
							"options" => $options_categories);
							
		$options[] = array( "name" => __("Two Column Portfolio Posts Displayed", 'organicthemes'),
							"desc" => __("Enter the number of posts you would like to display on the two column portfolio page template.", 'organicthemes'),
							"id" => "postnumber_portfolio_two_new",
							"std" => "12",
							"type" => "text");
							
							$options[] = array( "name" => __("Two Column Portfolio Template Category new", 'organicthemes'),
							"desc" => __("Choose the category you wish to display on the two column portfolio page template.", 'organicthemes'),
							"id" => "category_portfolio_two_new2",
							"std" => __("Select a category:", 'organicthemes'),
							"type" => "select",
							"options" => $options_categories);
							
		$options[] = array( "name" => __("Two Column Portfolio Posts Displayed", 'organicthemes'),
							"desc" => __("Enter the number of posts you would like to display on the two column portfolio page template.", 'organicthemes'),
							"id" => "postnumber_portfolio_two_new2",
							"std" => "12",
							"type" => "text");























							
		$options[] = array( "name" => __("One Column Portfolio Template Category", 'organicthemes'),
							"desc" => __("Choose the category you wish to display on the one column portfolio page template.", 'organicthemes'),
							"id" => "category_portfolio_one",
							"std" => __("Select a category:", 'organicthemes'),
							"type" => "select",
							"options" => $options_categories);
							
		$options[] = array( "name" => __("One Column Portfolio Posts To Display", 'organicthemes'),
							"desc" => __("Enter the number of posts you would like to display on the one column portfolio page template.", 'organicthemes'),
							"id" => "postnumber_portfolio_one",
							"std" => "6",
							"type" => "text");
						
		$options[] = array( "name" => __("Display Portfolio Info on Categories?", 'organicthemes'),
							"desc" => __("Select whether or not you would like to display the post title and excerpt on portfolio category pages.", 'organicthemes'),
							"id" => "display_portfolio_info_cat",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Choose Portfolio Category Columns", 'organicthemes'),
							"id" => "portfolio_columns",
							"std" => "one",
							"type" => "radio",
							"options" => $columns_array);
						
	$options[] = array( "name" => __("Social", 'organicthemes'),
						"type" => "heading");
							
		$options[] = array( "name" => __("Blog Social Links", 'organicthemes'),
							"desc" => __("Select whether or not you would like to display the social links on the blog page template. Disabling this feature will increase the blog load time drastically.", 'organicthemes'),
							"id" => "display_social_blog",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Post Social Links", 'organicthemes'),
							"desc" => __("Select whether or not you would like to display the social links on the individual posts.", 'organicthemes'),
							"id" => "display_social_post",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Facebook Icon?", 'organicthemes'),
							"desc" => __("This option displays the Facebook icon in the footer.", 'organicthemes'),
							"id" => "display_facebook",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Twitter Icon?", 'organicthemes'),
							"desc" => __("This option displays the Twitter icon in the footer.", 'organicthemes'),
							"id" => "display_twitter",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Google Plus Icon?", 'organicthemes'),
							"desc" => __("This option displays the Google Plus icon in the footer.", 'organicthemes'),
							"id" => "display_plus",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Pinterest Icon?", 'organicthemes'),
							"desc" => __("This option displays the Pinterest icon in the footer.", 'organicthemes'),
							"id" => "display_pinterest",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("RSS Icon?", 'organicthemes'),
							"desc" => __("This option displays the RSS icon and link in the footer.", 'organicthemes'),
							"id" => "display_rss",
							"std" => "1",
							"type" => "checkbox");
							
		$options[] = array( "name" => __("Twitter Name", 'organicthemes'),
							"desc" => __("Please enter your Twitter username.", 'organicthemes'),
							"id" => "twitter_user",
							"std" => __("organicthemes", 'organicthemes'),
							"type" => "text");
							
		$options[] = array( "name" => __("Facebook Page Link", 'organicthemes'),
							"desc" => __("Enter a link to your Facebook page or profile.", 'organicthemes'),
							"id" => "facebook_link",
							"std" => __("http://facebook.com", 'organicthemes'),
							"type" => "text");
							
		$options[] = array( "name" => __("Twitter Account Link", 'organicthemes'),
							"desc" => __("Enter a link to your Twitter account.", 'organicthemes'),
							"id" => "twitter_link",
							"std" => __("http://twitter.com", 'organicthemes'),
							"type" => "text");
							
		$options[] = array( "name" => __("Google Plus Profile Link", 'organicthemes'),
							"desc" => __("Enter a link to your Google Plus page.", 'organicthemes'),
							"id" => "plus_link",
							"std" => __("https://plus.google.com/", 'organicthemes'),
							"type" => "text");
							
		$options[] = array( "name" => __("Pinterest Profile Link", 'organicthemes'),
							"desc" => __("Enter a link to your Pinterest page.", 'organicthemes'),
							"id" => "pinterest_link",
							"std" => __("http://pinterest.com", 'organicthemes'),
							"type" => "text");
							
		$options[] = array( "name" => __("Enable PressTrends?", 'organicthemes'),
							"desc" => __("This option enables the PressTrends code in the theme functions.", 'organicthemes'),
							"id" => "enable_presstrends",
							"std" => "1",
							"type" => "checkbox");
							
	$options[] = array( "name" => __("Colors", 'organicthemes'),
						"type" => "heading");
												
		$options[] = array( "name" => __("Link Color", 'organicthemes'),
							"desc" => __("Select the color you wish to use for the link colors.", 'organicthemes'),
							"id" => "link_color",
							"std" => "#000000",
							"type" => "color");
							
		$options[] = array( "name" => __("Link Hover Color", 'organicthemes'),
							"desc" => __("Select the color you wish to use for the text link hover colors.", 'organicthemes'),
							"id" => "link_hover_color",
							"std" => "#66CCCC",
							"type" => "color");
							
		$options[] = array( "name" => __("Heading Link Color", 'organicthemes'),
							"desc" => __("Select the color you wish to use for the heading link colors.", 'organicthemes'),
							"id" => "heading_link_color",
							"std" => "#333333",
							"type" => "color");
							
		$options[] = array( "name" => __("Heading Link Hover Color", 'organicthemes'),
							"desc" => __("Select the color you wish to use for the heading link hover colors.", 'organicthemes'),
							"id" => "heading_link_hover_color",
							"std" => "#66CCCC",
							"type" => "color");
							
		$options[] = array( "name" => __("Highlight Color", 'organicthemes'),
							"desc" => __("Select the color you wish to use for the highlight color. This refers primarily to button colors.", 'organicthemes'),
							"id" => "highlight_color",
							"std" => "#66CCCC",
							"type" => "color");

	return $options;
}

// Custom options styling

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/options-framework.css">

<?php
}