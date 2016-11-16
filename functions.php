<?php 

function hoolybib_resources(){

	wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0', 'all');
	wp_enqueue_style('font-awesome',  get_template_directory_uri().'/css/font-awesome-4.6.3/css/font-awesome.css', array(), '', '');
	wp_enqueue_style('google-font-site-name', 'https://fonts.googleapis.com/css?family=Sacramento', array(), '', '');	
	// wp_enqueue_style('bootstrap', 'href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '', '');
	
	
	wp_enqueue_script('jQuery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', array(), '', true );
	wp_enqueue_script('script', get_template_directory_uri().'/script/script.js', array(), '1.0', true);
	// wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '', true );

}

add_action('wp_enqueue_scripts', 'hoolybib_resources');


/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);


/*Cutomize Navigation Colors*/
function hoolybib_nav_color( $wp_customize ){

	//WordPress Settings
	$wp_customize->add_setting('nav_color', array(
		'default' => '#333333',
		'transport' => 'refresh'
	));

	$wp_customize->add_setting('nav_list_item_color', array(
		'default' => '#999',
		'transport' => 'refresh'
	));

	$wp_customize->add_setting('nav_site_name_color', array(
		'default' => '#ddd',
		'transport' => 'refresh'
	));

	$wp_customize->add_setting('nav_social_link_color', array(
		'default' => '#ddd',
		'transport' => 'refresh'
	));

	$wp_customize->add_setting('nav_hover_color', array(
		'default' => '#fff',
		'transport' => 'refresh'
	));

	//WordPress Section
	$wp_customize->add_section('nav_standard_color', array(
		'title' => __('Standard Color', 'Hoolybib Theme'),
		'priority' => 10,
	));

	//WordPress Controls
	$wp_customize-> add_control(new WP_Customize_Color_Control($wp_customize, 'nav_color_control', array(
		'label' => __('Navigation Color'),
		'section' => 'nav_standard_color',
		'settings' => 'nav_color'
	)));

	$wp_customize-> add_control(new WP_Customize_Color_Control($wp_customize, 'nav_list_item_control', array(
		'label' => __('List Item Color'),
		'section' => 'nav_standard_color',
		'settings' => 'nav_list_item_color'
	)));

	$wp_customize-> add_control(new WP_Customize_Color_Control($wp_customize, 'nav_site_name_control', array(
		'label' => __('Site Name Color'),
		'section' => 'nav_standard_color',
		'settings' => 'nav_site_name_color'
	)));

	$wp_customize-> add_control(new WP_Customize_Color_Control($wp_customize, 'nav_social_link_control', array(
		'label' => __('Social Links Color'),
		'section' => 'nav_standard_color',
		'settings' => 'nav_social_link_color'
	)));

	$wp_customize-> add_control(new WP_Customize_Color_Control($wp_customize, 'nav_hover_control', array(
		'label' => __('Hover Navigation Link Color'),
		'section' => 'nav_standard_color',
		'settings' => 'nav_hover_color'
	)));

}

add_action('customize_register' ,'hoolybib_nav_color');

//Output Navigation colors

function hoolybib_nav_color_output(){ ?>

		<style type="text/css">
			.site-header, .menu-overlay, .site-footer{
				background-color: <?php echo get_theme_mod('nav_color' ); ?>
			}

			.header-nav ul li a, .footer-nav ul li a{
				color: <?php echo get_theme_mod('nav_list_item_color' ); ?>
			}

			.site-name a, .site-footer{
				color: <?php echo get_theme_mod('nav_site_name_color' ); ?>	
			}

			.social-links a, .social-links-footer a{
				color: <?php echo get_theme_mod('nav_social_link_color' ); ?>	
			}

			.header-nav ul li a:hover, .site-name a:hover, .footer-nav ul li a:hover{
				color: <?php echo get_theme_mod('nav_hover_color' ); ?>
			}
		</style>

	<?php }

add_action('wp_head', 'hoolybib_nav_color_output');

//Custom Excerpt Length

function custom_excerpt_length(){
	return 25;
}
add_filter('excerpt_length', 'custom_excerpt_length');

//Custom excerpt end [...]
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


//Theme Setup
function hoolybib_setup(){

	//Navigation Menus
	register_nav_menus(array(
		'primary' => __('Header Menu Lists'),
		'secondary' => __('Footer Menu Lists')
	));

	//Add featured image support
	add_theme_support('post-thumbnails');
	add_image_size('index-thumbnail', 180, 120, true );
	add_image_size('medium-thumbnail', 300, 300, true );
	//add_image_size('banner-image', 920, 210, array('left', 'top'));

}

add_action('after_setup_theme', 'hoolybib_setup');


//Remove width and height from WP image uploader within the post
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
 
function remove_width_attribute( $html ) {

    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
    
}


//Add widgets location
function custom_widgets(){

	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar'
	));

	register_sidebar(array(
		'name' => 'Footer 1',
		'id' => 'footer1'
	));

	register_sidebar(array(
		'name' => 'Footer 2',
		'id' => 'footer2'
	));

	register_sidebar(array(
		'name' => 'Footer 3',
		'id' => 'footer3'
	));

	register_sidebar(array(
		'name' => 'Footer 4',
		'id' => 'footer4'
	));

}

add_action('widgets_init', 'custom_widgets');


// Change default WordPress email address
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');

function new_mail_from($old) {
return 'admin@hoolybib.com';
}
function new_mail_from_name($old) {
return 'Hoolybib';
}



//Set Featured image from first image in post
function auto_featured_image() {
    global $post;
 
    if (!has_post_thumbnail($post->ID)) {
        $attached_image = get_children( "post_parent=$post->ID&amp;post_type=attachment&amp;post_mime_type=image&amp;numberposts=1" );
         
      if ($attached_image) {
              foreach ($attached_image as $attachment_id => $attachment) {
                   set_post_thumbnail($post->ID, $attachment_id);
              }
         }
    }
}

//Use it temporary to generate all featured images
//add_action('the_post', 'auto_featured_image');

//Used for new posts
add_action('save_post', 'auto_featured_image');
add_action('draft_to_publish', 'auto_featured_image');
add_action('new_to_publish', 'auto_featured_image');
add_action('pending_to_publish', 'auto_featured_image');
add_action('future_to_publish', 'auto_featured_image');



//Removing specific category from showing on Front page
function exclude_category( $query ) {
if ( $query->is_home() && $query->is_main_query() ) {
$query->set( 'cat', array('-19','-14' ));// minus (-) sign with category ID
}
}
add_action( 'pre_get_posts', 'exclude_category' );


//Custom template for specific category
add_filter( 'single_template', 'my_single_template' );
function my_single_template($single_template)
{
    if (in_category(array('haha', 'gifs'))) {
        $file = get_template_directory().'/single_page_for_category.php';
        if ( file_exists($file) ) {
            return $file;
        }
    }
    return $single_template;
}