<?php
/**
 * Milors functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Milors
 */

if ( ! function_exists( 'milors_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function milors_theme_setup() {

		// Required theme options
		require get_template_directory() . '/admin/admin-init.php';
		require get_template_directory() . '/cmb2/init.php';
		require get_template_directory() . '/CMB-functions.php';
		
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Milors, use a find and replace
		 * to change 'milors-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'milors-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'milors-theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'milors_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'milors_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function milors_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'milors_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'milors_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function milors_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'milors-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'milors-theme' ),
		'before_widget' => '<section id="%1$s" class="widgets %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'milors_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function milors_theme_scripts() {
	
	/* Stylesheet */
	wp_enqueue_style( 'milors-theme-style', get_stylesheet_uri() );

	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/_assets/bootstrap/css/bootstrap.min.css', 'style');

	wp_enqueue_style('superfish', get_template_directory_uri() . '/_assets/css/superfish.css', 'style');

	wp_enqueue_style('flexslider', get_template_directory_uri() . '/_assets/css/flexslider.css', 'style');

	wp_enqueue_style('themestyle', get_template_directory_uri() . '/_assets/css/themestyle.php', 'style');

	/* Jquery */

	wp_deregister_script('jquery' ); //
	wp_register_script('jquery', 'http://code.jquery.com/jquery-latest.min.js',null,false,true);
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'milors-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'milors-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/_assets/bootstrap/js/bootstrap.min.js', array(), '1', true);

	wp_enqueue_script('navbar', get_template_directory_uri() . '/js/navbar.min.js', array(), '1', true);

	wp_enqueue_script('superfish', get_template_directory_uri() . '/_assets/js/superfish.min.js', array(), '1', true);

	wp_enqueue_script('hoverIntent', get_template_directory_uri() . '/_assets/js/hoverIntent.js', array(), '1', true);

	wp_enqueue_script('flexSlider', get_template_directory_uri() . '/_assets/js/jquery.flexslider.js', array(), '1', true);

	wp_enqueue_script('easing', get_template_directory_uri() . '/_assets/js/jquery.easing.js', array(), '1', true);	

	wp_enqueue_script('theme', get_template_directory_uri() . '/js/theme.js', array(), '1', true);

	wp_enqueue_script('bootstrap-bundle-js', get_template_directory_uri() . '/_assets/bootstrap/js/bootstrap.bundle.js', array(), 'defer', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'milors_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/theme-customizer.php';


/**
 * Related Post Function
 *
 */
require get_template_directory() . '/inc/related-post.php';

/**
 * Author Bio Function
 *
 */
require get_template_directory() . '/inc/author-bio.php';

/**
 * Share Button Function
 *
 */
require get_template_directory() . '/inc/share-button.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Thumbnail sizes.
 */
if ( function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
		/*
			THUMBNAIL SIZES
			please note - you must delete and re-add the thumbnails on each post/page if you change 
			the sizes below or you will not see the change take effect.
		*/
	set_post_thumbnail_size(150, 150, true);


	add_image_size('small-square', 300, 300, true );
	add_image_size('medium-square', 550, 550, true, array( 'center', 'center' ) );
	add_image_size('large-square', 900, 900 );
	add_image_size('medium-width-fixed', 450, 9999);
	add_image_size('large-width-fixed', 900, 9999);
	add_image_size('small-height-fixed', 350, 235, true, array( 'center', 'center' ) );
	add_image_size('medium-height-fixed', 700, 650, true, array( 'center', 'center' ) );
	add_image_size('large-height-fixed', 1275, 700, true, array( 'center', 'center' ) );
	add_image_size('fullsize', 1024, 9999);
}

/**
 * Post excerp.
 */
//Custom Excerp

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
	 		array_pop($excerpt);
	    	$excerpt = implode(" ",$excerpt);
	  	} else {
	    	$excerpt = implode(" ",$excerpt);
	  	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
}

function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
        	array_pop($content);
        	$content = implode(" ",$content);
        } else {
        	$content = implode(" ",$content);
        } 

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}



function modify_read_more_link() {

	global $krocks_opt;
	$_postStyle = $krocks_opt['_postStyle'];

	if ($_postStyle == '1') {
	return '<div class="continue-reading"> <a class="more-link" href="' . get_permalink() . '"><span class="arrow">→</span></a></div>';
	}
}

add_filter( 'the_content_more_link', 'modify_read_more_link' );



add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
});




/* Call widgets */
/** WP_Widget_Pages class */
require get_template_directory() . '/inc/widgets/widget-position.php';
require get_template_directory() . '/inc/widgets/recent-posts.php';
require get_template_directory() . '/inc/widgets/popular-posts.php';
require get_template_directory() . '/inc/widgets/about.php';


function add_to_author_profile( $contact_author ) {
	
	$contact_author['google_profile'] = 'Google Profile URL';
	$contact_author['instagram_profile'] = 'Instagram URL';
	$contact_author['dribbble_profile'] = 'Dribbble URL';
	$contact_author['behance_profile'] = 'Behance URL';
	$contact_author['github_profile'] = 'Github URL';
	$contact_author['twitter_profile'] = 'Twitter URL';
	$contact_author['facebook_profile'] = 'Facebook URL';
	$contact_author['linkedin_profile'] = 'Linkedin URL';
	
	return $contact_author;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);


/*-----------------*/
/* Page Pagination */
/*-----------------*/
function krckts_pagination( $args = array(), $query = '' ) {
		global $wp_rewrite, $wp_query;

		do_action( 'kr_pagination_start' );

		if ( $query ) {
			$wp_query = $query;
		} 
		if ( 1 >= $wp_query->max_num_pages )
			return;

		$current = ( get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1 );
		$max_num_pages = intval( $wp_query->max_num_pages );
		$defaults = array(
			'base' => add_query_arg( 'paged', '%#%' ),
			'format' => '',
			'total' => $max_num_pages,
			'current' => $current,
			'prev_next' => true,
			'prev_text' => __( '&laquo; Previous', 'milors' ),
			'next_text' => __( 'Next &raquo;', 'milors' ), 
			'show_all' => false,
			'end_size' => 1,
			'mid_size' => 1,
			'add_fragment' => '',
			'type' => 'plain',
			'before' => '<div class="pagination justify-content-md-center row mt-5"><div class="col-md-auto">', 
			'after' => '</div></div>',
			'echo' => true, 
			'use_search_permastruct' => true
		);

		$defaults = apply_filters( 'kr_pagination_args_defaults', $defaults );		
		if( $wp_rewrite->using_permalinks() && ! is_search() )
			$defaults['base'] = user_trailingslashit( trailingslashit( get_pagenum_link() ) . 'page/%#%' );
		if ( is_search() )
			$defaults['use_search_permastruct'] = false;
		if ( is_search() ) {
		/* If we're in BuddyPress, or the user has selected to do so, use the default "unpretty" URL structure. */
			if ( class_exists( 'BP_Core_User' ) || $defaults['use_search_permastruct'] == false ) {
				$search_query = get_query_var( 's' );
				$paged = get_query_var( 'paged' );
				$base = user_trailingslashit( home_url() ) . '?s=' . urlencode( $search_query ) . '&paged=%#%';
				$defaults['base'] = $base;
			} else {
				$search_permastruct = $wp_rewrite->get_search_permastruct();
				if ( ! empty( $search_permastruct ) )
					$defaults['base'] = user_trailingslashit( trailingslashit( urldecode( get_search_link() ) ) . 'page/%#%' );
			}
		}

		$args = wp_parse_args( $args, $defaults );
		$args = apply_filters( 'kr_pagination_args', $args );
		if ( 'array' == $args['type'] )
			$args['type'] = 'plain';

		$pattern = '/\?(.*?)\//i';

		preg_match( $pattern, $args['base'], $raw_querystring );
		if( $wp_rewrite->using_permalinks() && $raw_querystring )
			$raw_querystring[0] = str_replace( '', '', $raw_querystring[0] );
			@$args['base'] = str_replace( $raw_querystring[0], '', $args['base'] );
			@$args['base'] .= substr( $raw_querystring[0], 0, -1 );
		
		$page_links = paginate_links( $args );
		$page_links = str_replace( array( '&#038;paged=1\'', '/page/1\'' ), '\'', $page_links );
		$page_links = $args['before'] . $page_links . $args['after'];
		$page_links = apply_filters( 'krckts_pagination', $page_links );
		do_action( 'kr_pagination_end' );
		if ( $args['echo'] )
			echo $page_links;
		else
			return $page_links;

	}

/*-----------------*/
/* Search Widget */
/*-----------------*/

function milors_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="search-form">
    <input type="text" value="' . get_search_query() . '" name="s" id="s" class="input-text" />
    <input type="submit" id="searchsubmit" class="search-submit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'milors_search_form' );