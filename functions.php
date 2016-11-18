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
	return 15;
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
$query->set( 'cat', array('-19','-20' ));// minus (-) sign with category ID
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


//Disable plugin update
remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');


//Human time difference
function themeblvd_time_ago() {
	
	global $post;
	
	$date = get_post_time('G', true, $post);
	
	/**
	 * Where you see 'themeblvd' below, you'd
	 * want to replace those with whatever term
	 * you're using in your theme to provide
	 * support for localization.
	 */ 
	
	// Array of time period chunks
	$chunks = array(
		array( 60 * 60 * 24 * 365 , __( 'year', 'themeblvd' ), __( 'years', 'themeblvd' ) ),
		array( 60 * 60 * 24 * 30 , __( 'month', 'themeblvd' ), __( 'months', 'themeblvd' ) ),
		array( 60 * 60 * 24 * 7, __( 'week', 'themeblvd' ), __( 'weeks', 'themeblvd' ) ),
		array( 60 * 60 * 24 , __( 'day', 'themeblvd' ), __( 'days', 'themeblvd' ) ),
		array( 60 * 60 , __( 'hour', 'themeblvd' ), __( 'hours', 'themeblvd' ) ),
		array( 60 , __( 'minute', 'themeblvd' ), __( 'minutes', 'themeblvd' ) ),
		array( 1, __( 'second', 'themeblvd' ), __( 'seconds', 'themeblvd' ) )
	);

	if ( !is_numeric( $date ) ) {
		$time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
		$date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
		$date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
	}
	
	$current_time = current_time( 'mysql', $gmt = 0 );
	$newer_date = strtotime( $current_time );

	// Difference in seconds
	$since = $newer_date - $date;

	// Something went wrong with date calculation and we ended up with a negative date.
	if ( 0 > $since )
		return __( 'sometime', 'themeblvd' );

	/**
	 * We only want to output one chunks of time here, eg:
	 * x years
	 * xx months
	 * so there's only one bit of calculation below:
	 */

	//Step one: the first chunk
	for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
		$seconds = $chunks[$i][0];

		// Finding the biggest chunk (if the chunk fits, break)
		if ( ( $count = floor($since / $seconds) ) != 0 )
			break;
	}

	// Set output var
	$output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
	

	if ( !(int)trim($output) ){
		$output = '0 ' . __( 'seconds', 'themeblvd' );
	}
	
	$output .= __(' ago', 'themeblvd');
	
	return $output;
}
// Filter our themeblvd_time_ago() function into WP's the_time() function
add_filter('the_time', 'themeblvd_time_ago');


//Pagination for posts in Archives
function pagination_hoolybib() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="pagination"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}
