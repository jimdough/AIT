<?php

/**
 * megaresponsive-lite functions and definitions
 *
 * @package megaresponsive-lite
 */

/**

 * Set the content width based on the theme's design and stylesheet.

 */

if ( ! isset( $content_width ) )

	$content_width = 640; /* pixels */

/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which runs

 * before the init hook. The init hook is too late for some features, such as indicating

 * support post thumbnails.

 */

function megaresponsive_lite_setup() {



	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on megaresponsive-lite, use a find and replace
	 * to change 'megaresponsive-lite' to the name of your theme in all the template files
	 */

	load_theme_textdomain( 'megaresponsive-lite', get_template_directory() . '/languages' );



	/**

	 * Add default posts and comments RSS feed links to head

	 */

	add_theme_support( 'automatic-feed-links' );



	/**

	 * Enable support for Post Thumbnails on posts and pages

	 *

	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails

	 */

	add_theme_support( 'post-thumbnails' );



	/**

	 * This theme uses wp_nav_menu() in one location.

	 */

	register_nav_menus( array(

		'primary' => __( 'Primary Menu', 'megaresponsive-lite' ),

		'footer' => __( 'Footer Menu', 'megaresponsive-lite' ),

		'sidebar_menu' => __( 'Sidebar menu', 'megaresponsive-lite' ),

	) );



	/**

	 * Enable support for Post Formats

	 */

	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );



	/**

	 * Setup the WordPress core custom background feature.

	 */

	add_theme_support( 'custom-background', apply_filters( 'cwp_megar_custom_background_args', array(

		'default-color' => 'fefefe',

		'default-image' => '',

	) ) );



	

    /**

     * Implement the Custom Header feature.

     */

	$args = array(

		'width'         => 1700,

		'height'        => 90,

		'default-image' => '',

		'uploads'       => true,

	);

	add_theme_support( 'custom-header', $args );

    

    /**

     * Custom template tags for this theme.

     */

    require get_template_directory() . '/inc/template-tags.php';

    

    /**

     * Custom functions that act independently of the theme templates.

     */

    require get_template_directory() . '/inc/extras.php';

    

    /**

     * Customizer additions.

     */

    require get_template_directory() . '/inc/customizer.php';

    

    /**

     * Load Jetpack compatibility file.

     */

    require get_template_directory() . '/inc/jetpack.php';

    

    /**

     * Enabling Support for Post Thumbnails.

     */

    add_theme_support( 'post-thumbnails' ); 

        

    /**

     * Banner widget.

     */

    $widget_banner = locate_template( 'widgets/banner-widget/banner-widget.php', TRUE, TRUE );

    

    /**

     * Facebook like box widget.

     */

    $widget_facebook_box = locate_template( 'widgets/facebook-like-box/fb-like-box.php', TRUE, TRUE );

            

}

add_action( 'after_setup_theme', 'megaresponsive_lite_setup' );



/**

 * Register widgetized area and update sidebar with default widgets

 */

function megaresponsive_lite_widgets_init() {

	register_sidebar( array(

		'name'          => __( 'Sidebar', 'megaresponsive-lite' ),

		'id'            => 'sidebar-1',

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<h1 class="widget-title">',

		'after_title'   => '</h1>',

	) );

}

add_action( 'widgets_init', 'megaresponsive_lite_widgets_init' );



/**

 * Enqueue scripts and styles

 */

function megaresponsive_lite_scripts() {

	wp_enqueue_style( 'megaresponsive_lite-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css', array(), '20130801', 'all' );
	
	wp_enqueue_style( 'megaresponsive_lite-custom-style', get_template_directory_uri() . '/css/bootstrap-responsive.css', array(), '20130801', 'all' );

	wp_enqueue_style( 'megaresponsive_lite-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'megaresponsive_lite-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20130801', true );

    wp_enqueue_script( 'megaresponsive_lite-tinyscrollbar', get_template_directory_uri() . '/js/jquery.tinyscrollbar.min.js', array(), '', true ); 

    wp_enqueue_script( 'megaresponsive_lite-tinynav', get_template_directory_uri() . '/js/tinynav.js', array(), '20130801', true );

	wp_enqueue_script( 'megaresponsive_lite-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20130801', true );

	wp_enqueue_script( 'megaresponsive_lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true ); 

    wp_enqueue_script( 'megaresponsive_lite-ajaxLoop', get_template_directory_uri() . '/js/ajaxLoop.js', array('jquery'), '1.0.0', true );

	wp_enqueue_script( 'megaresponsive_lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );		

	wp_register_style( 'megaresponsive_lite_open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Roboto+Slab');    

	wp_enqueue_style( 'megaresponsive_lite_open-sans' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

	if ( is_singular() && wp_attachment_is_image() ) {

		wp_enqueue_script( 'megaresponsive_lite-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );

	}

}

add_action( 'wp_enqueue_scripts', 'megaresponsive_lite_scripts' );


require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'megaresponsive_lite_required_plugins' );

function megaresponsive_lite_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository
		array(
			'name' 		=> 'WP Product Review',
			'slug' 		=> 'wp-product-review',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Tweet old post',
			'slug' 		=> 'tweet-old-post',
			'required' 	=> false,
		)
	

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'megaresponsive-lite';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'megaresponsive-lite',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'megaresponsive-lite' ),
			'menu_title'                       			=> __( 'Install Plugins', 'megaresponsive-lite' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'megaresponsive-lite' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'megaresponsive-lite' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','megaresponsive-lite' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','megaresponsive-lite' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','megaresponsive-lite' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','megaresponsive-lite' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','megaresponsive-lite' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','megaresponsive-lite' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','megaresponsive-lite' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','megaresponsive-lite' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins','megaresponsive-lite' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins','megaresponsive-lite' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'megaresponsive-lite' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'megaresponsive-lite' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'megaresponsive-lite' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}


/*

 * No title

 */

add_filter( 'the_title', 'megaresponsive_lite_no_title');

function megaresponsive_lite_no_title ($title) { 

	if( $title == "" ){ 

		$title = "(No title)"; 

	} 

	return $title; 

}



function megaresponsive_lite_add_editor_styles() {

    add_editor_style( '/css/custom-editor-style.css' );

}

add_action( 'init', 'megaresponsive_lite_add_editor_styles' );



/*
 *  Load more posts
 */

add_action('wp_ajax_megaresponsive_lite_loop', 'megaresponsive_lite_loop_callback');

add_action('wp_ajax_nopriv_megaresponsive_lite_loop', 'megaresponsive_lite_loop_callback');



function megaresponsive_lite_loop_callback() {

	global $post;

	$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 0;

	$page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;

	$catt = (isset($_GET['catNumber'])) ? $_GET['catNumber'] : -1;

	$yearr = (isset($_GET['yearPar'])) ? $_GET['yearPar'] : -1;

	$monthh = (isset($_GET['monthPar'])) ? $_GET['monthPar'] : -1;

	$authorr = (isset($_GET['authorPar'])) ? $_GET['authorPar'] : -1;

	$tagg = (isset($_GET['tagPar'])) ? $_GET['tagPar'] : -1;

	if( $catt != -1 ):

		query_posts(array(

		   'posts_per_page' => $numPosts,

		   'paged' => $page,

		   'cat' =>  $catt,

		   'post_status' => 'publish',

		   'post__not_in' => get_option( 'sticky_posts' )

		));

	elseif( ($yearr != -1) && ($monthh != -1) ):

		query_posts(array(

		   'posts_per_page' => $numPosts,

		   'paged' => $page,

		   'year' =>  $yearr,

		   'monthnum' => $monthh,

		   'post_status' => 'publish',

		   'post__not_in' => get_option( 'sticky_posts' )

		));

	elseif( $yearr != -1 ):

		query_posts(array(

		   'posts_per_page' => $numPosts,

		   'paged' => $page,

		   'year' =>  $yearr,

		   'post_status' => 'publish',

		   'post__not_in' => get_option( 'sticky_posts' )

		));

	elseif( $authorr != -1 ):
	
		query_posts(array(

		   'posts_per_page' => $numPosts,

		   'paged' => $page,

		   'author' =>  $authorr,

		   'post_status' => 'publish',

		   'post__not_in' => get_option( 'sticky_posts' )

		));

	elseif($tagg != -1):

		query_posts(array(

		   'posts_per_page' => $numPosts,

		   'paged'  => $page,

		   'tag' =>  $tagg,

		   'post_status' => 'publish',

		   'post__not_in' => get_option( 'sticky_posts' )

		));

	else:

		query_posts(array(

		   'posts_per_page' => $numPosts,

		   'paged'          => $page,

		   'post_status' => 'publish',

		   'post__not_in' => get_option( 'sticky_posts' )

		));

	endif;

	while ( have_posts() ) : the_post(); ?>

       
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">

				<?php

					if ( has_post_thumbnail() ):
					
						echo '<div class="entry-thumbnail"> ';

							echo '<a href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">';

							the_post_thumbnail(array(250,250), array('class' => 'alignleft'));

							echo '</a>';
						
						echo '</div>';

					endif;

				?>

				<div class="entry-meta meta-top">

					<div class="post-categories">

						<?php the_category(' / '); ?>

					</div>

					<?php if ( 'post' == get_post_type() ) : ?>

					<div class="entry-meta">

						<?php megaresponsive_lite_posted_on(); ?>

					</div><!-- .entry-meta -->

					<?php endif; ?>	

				</div>

				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			</header><!-- .entry-header -->



			<?php if ( is_search() ) : // Only display Excerpts for Search ?>

			<div class="entry-summary">

				<?php the_excerpt(); ?>

			</div><!-- .entry-summary -->

			<?php else : ?>

			<div class="entry-content">

				<?php the_excerpt(); 

					wp_link_pages( array(

						'before' => '<div class="page-links">' . __( 'Pages:', 'megaresponsive-lite' ),

						'after'  => '</div>',

					) );

				?>

			</div><!-- .entry-content -->

			<?php endif; ?>

			

		</article><!-- #post-## -->


      <?php endwhile;


	die(); // this is required to return a proper result

}