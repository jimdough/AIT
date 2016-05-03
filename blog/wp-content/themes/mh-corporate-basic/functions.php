<?php

/***** Fetch Options *****/

$options = get_option('mhc_options');

/***** Custom Hooks *****/

function mh_html_class() {
    do_action('mh_html_class');
}
function mh_before_header() {
    do_action('mh_before_header');
}
function mh_after_header() {
    do_action('mh_after_header');
}
function mh_content_class() {
    do_action('mh_content_class');
}
function mh_before_page_content() {
    do_action('mh_before_page_content');
}
function mh_before_post_content() {
    do_action('mh_before_post_content');
}
function mh_post_header() {
    do_action('mh_post_header');
}
function mh_post_content_top() {
    do_action('mh_post_content_top');
}
function mh_post_content_bottom() {
    do_action('mh_post_content_bottom');
}
function mh_loop_content() {
    do_action('mh_loop_content');
}
function mh_after_post_content() {
    do_action('mh_after_post_content');
}
function mh_sb_class() {
    do_action('mh_sb_class');
}

/***** Enable Shortcodes inside Widgets	*****/

add_filter('widget_text', 'do_shortcode');

/***** Theme Setup *****/

if (!function_exists('mh_themes_setup')) {
	function mh_themes_setup() {

		$header = array(
			'default-image'	=> get_template_directory_uri() . '/images/logo.png',
			'default-text-color' => '000',
			'width' => 300,
			'height' => 100,
			'flex-width' => true,
			'flex-height' => true
		);
		add_theme_support('custom-header', $header);
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('custom-background');
		add_theme_support('post-thumbnails');
		add_image_size('slider', 940, 400, true);
		add_image_size('content', 578, 246, true);
		add_image_size('cp_large', 258, 194, true);
		add_image_size('cp_small', 70, 53, true);
		add_filter('use_default_gallery_style', '__return_false');
		register_nav_menu('main_nav', __('Main Navigation', 'mh-corporate-basic'));
		load_theme_textdomain('mh-corporate-basic', get_template_directory() . '/languages');
	}
}
add_action('after_setup_theme', 'mh_themes_setup');

/***** Set Content Width *****/

if (!isset($content_width)) {
	$content_width = 578;
}

/***** Load CSS & JavaScript *****/

if (!function_exists('mh_scripts')) {
	function mh_scripts() {
		wp_enqueue_style('mh-google-fonts', "https://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700", array(), null);
		wp_enqueue_style('mh-style', get_stylesheet_uri(), false, '1.2.6');
		wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
		if (!is_admin()) {
			if (is_singular() && comments_open() && (get_option('thread_comments') == 1))
				wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'mh_scripts');

if (!function_exists('mh_admin_scripts')) {
	function mh_admin_scripts($hook) {
		if ('appearance_page_corporate' === $hook || 'widgets.php' === $hook) {
			wp_enqueue_style('mh-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'mh_admin_scripts');

/***** Register Widget Areas / Sidebars	*****/

if (!function_exists('mh_widgets_init')) {
	function mh_widgets_init() {
		register_sidebar(array('name' => __('Sidebar', 'mh-corporate-basic'), 'id' => 'sidebar', 'description' => __('Widget area (sidebar left/right) on single posts, pages and archives', 'mh-corporate-basic'), 'before_widget' => '<div id="%1$s" class="sb-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => sprintf(_x('Home %d', 'widget area name', 'mh-corporate-basic'), 1), 'id' => 'home-1', 'description' => __('Widget area on homepage', 'mh-corporate-basic'), 'before_widget' => '<div id="%1$s" class="sb-widget home-1 home-wide %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => sprintf(_x('Home %d', 'widget area name', 'mh-corporate-basic'), 2), 'id' => 'home-2', 'description' => __('Widget area on homepage', 'mh-corporate-basic'), 'before_widget' => '<div id="%1$s" class="sb-widget home-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => sprintf(_x('Home %d', 'widget area name', 'mh-corporate-basic'), 3), 'id' => 'home-3', 'description' => __('Widget area on homepage', 'mh-corporate-basic'), 'before_widget' => '<div id="%1$s" class="sb-widget home-3 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => sprintf(_x('Home %d', 'widget area name', 'mh-corporate-basic'), 4), 'id' => 'home-4', 'description' => __('Widget area on homepage', 'mh-corporate-basic'), 'before_widget' => '<div id="%1$s" class="sb-widget home-4 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
		register_sidebar(array('name' => sprintf(_x('Footer %d', 'widget area name', 'mh-corporate-basic'), 1), 'id' => 'footer-1', 'description' => __('Widget area in footer', 'mh-corporate-basic'), 'before_widget' => '<div id="%1$s" class="footer-widget footer-1 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="footer-widget-title">', 'after_title' => '</h6>'));
		register_sidebar(array('name' => sprintf(_x('Footer %d', 'widget area name', 'mh-corporate-basic'), 2), 'id' => 'footer-2', 'description' => __('Widget area in footer', 'mh-corporate-basic'), 'before_widget' => '<div id="%1$s" class="footer-widget footer-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="footer-widget-title">', 'after_title' => '</h6>'));
		register_sidebar(array('name' => sprintf(_x('Footer %d', 'widget area name', 'mh-corporate-basic'), 3), 'id' => 'footer-3', 'description' => __('Widget area in footer', 'mh-corporate-basic'), 'before_widget' => '<div id="%1$s" class="footer-widget footer-3 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="footer-widget-title">', 'after_title' => '</h6>'));
		register_sidebar(array('name' => sprintf(_x('Footer %d', 'widget area name', 'mh-corporate-basic'), 4), 'id' => 'footer-4', 'description' => __('Widget area in footer', 'mh-corporate-basic'), 'before_widget' => '<div id="%1$s" class="footer-widget footer-4 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="footer-widget-title">', 'after_title' => '</h6>'));
	}
}
add_action('widgets_init', 'mh_widgets_init');

/***** Register Widgets *****/

function mh_register_widgets() {
	register_widget('mh_custom_posts_widget');
	register_widget('mh_custom_pages_widget');
	register_widget('mh_custom_slider_widget');
	register_widget('mh_slider_hp_widget');
	register_widget('mh_affiliate_widget');
}
add_action('widgets_init', 'mh_register_widgets');

/***** Include Widgets *****/

require_once('includes/widgets/mh-custom-posts.php');
require_once('includes/widgets/mh-custom-pages.php');
require_once('includes/widgets/mh-custom-slider.php');
require_once('includes/widgets/mh-slider.php');
require_once('includes/widgets/mh-affiliate.php');

/***** Add CSS classes to HTML tag *****/

if (!function_exists('mh_html')) {
	function mh_html() {
		$options = mh_theme_options();
		$options['full_bg'] == 1 ? $fullbg = ' fullbg' : $fullbg = '';
		echo $fullbg;
	}
}
add_action('mh_html_class', 'mh_html');

/***** Page Title Output *****/

if (!function_exists('mh_page_title')) {
	function mh_page_title() {
		if (!is_front_page()) {
			echo '<h1 class="page-title">';
			if (is_archive()) {
				if (is_category() || is_tax()) {
					single_cat_title();
				} elseif (is_tag()) {
					single_tag_title();
				} elseif (is_author()) {
					global $author;
					$user_info = get_userdata($author);
					printf(_x('Articles by %s', 'post author', 'mh-corporate-basic'), esc_attr($user_info->display_name));
				} elseif (is_day()) {
					echo get_the_date();
				} elseif (is_month()) {
					echo get_the_date('F Y');
				} elseif (is_year()) {
					echo get_the_date('Y');
				} else {
					_e('Archives', 'mh-corporate-basic');
				}
			} else {
				if (is_home()) {
					echo get_the_title(get_option('page_for_posts', true));
				} elseif (is_404()) {
					_e('Page not found (404)', 'mh-corporate-basic');
				} elseif (is_search()) {
					printf(__('Search Results for %s', 'mh-corporate-basic'), esc_attr(get_search_query()));
				} else {
					the_title();
				}
			}
			echo '</h1>' . "\n";
		}
	}
}
add_action('mh_before_page_content', 'mh_page_title');

/***** Logo / Header Image Fallback *****/

if (!function_exists('mh_logo')) {
	function mh_logo() {
		$header_img = get_header_image();
		$header_title = get_bloginfo('name');
		$header_desc = get_bloginfo('description');
		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr($header_title) . '" rel="home">' . "\n";
		echo '<div class="logo-wrap" role="banner">' . "\n";
		if ($header_img) {
			echo '<img src="' . esc_url($header_img) . '" height="' . get_custom_header()->height . '" width="' . get_custom_header()->width . '" alt="' . esc_attr($header_title) . '" />' . "\n";
		}
		if (display_header_text()) {
			$header_img ? $logo_pos = 'logo-overlay' : $logo_pos = 'logo-text';
			$text_color = get_header_textcolor();
			if ($text_color != get_theme_support('custom-header', 'default-text-color')) {
				echo '<style type="text/css" id="mh-header-css">';
					echo '.logo-name, .logo-desc { color: #' . esc_attr($text_color) . '; }';
					echo '.logo-name { border-bottom: 3px solid #' . esc_attr($text_color) . '; }';
				echo '</style>' . "\n";
			}
			echo '<div class="logo ' . $logo_pos . '">' . "\n";
			if ($header_title) {
				echo '<h1 class="logo-name">' . esc_attr($header_title) . '</h1>' . "\n";
			}
			if ($header_desc) {
				echo '<h2 class="logo-desc">' . esc_attr($header_desc) . '</h2>' . "\n";
			}
			echo '</div>' . "\n";
		}
		echo '</div>' . "\n";
		echo '</a>' . "\n";
	}
}

/***** Custom Excerpts *****/

if (!function_exists('mh_trim_excerpt')) {
	function mh_trim_excerpt($text = '') {
		$raw_excerpt = $text;
		if ('' == $text) {
			$text = get_the_content('');
			$text = do_shortcode($text);
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]&gt;', $text);
			$excerpt_length = apply_filters('excerpt_length', '200');
			$excerpt_more = apply_filters('excerpt_more', ' [...]');
			$text = wp_trim_words($text, $excerpt_length, $excerpt_more);
		}
		return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
	}
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'mh_trim_excerpt');

if (!function_exists('mh_excerpt')) {
	function mh_excerpt($excerpt_length = '175') {
		global $post;
		$options = mh_theme_options();
		$permalink = get_permalink($post->ID);
		$excerpt = get_the_excerpt();
		if (!has_excerpt()) {
			$excerpt = substr($excerpt, 0, intval($excerpt_length));
			$excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
		}
		echo '<div class="mh-excerpt">' . wp_kses_post($excerpt) . ' <a href="' . $permalink . '" title="' . the_title_attribute('echo=0') . '">' . esc_attr($options['excerpt_more']) . '</a></div>' . "\n";
	}
}

/***** Post Meta *****/

if (!function_exists('mh_post_meta')) {
	function mh_post_meta() {
		echo '<p class="meta post-meta">';
			$date = sprintf(_x('on %s', 'post date', 'mh-corporate-basic'), '<span class="updated">' . get_the_date() . '</span> ');
			$byline = sprintf(_x('by %s', 'post author', 'mh-corporate-basic'), '<span class="vcard author"><a class="fn" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span> ');
			$category = sprintf(_x('in %s', 'post category', 'mh-corporate-basic'), get_the_category_list(', ', ''));
			printf(_x('Posted %1$s %2$s %3$s', 'post meta', 'mh-corporate-basic'), $date, $byline, $category);
			echo ' | ';
			mh_comment_count();
		echo '</p>' . "\n";
	}
}
add_action('mh_post_header', 'mh_post_meta');

/***** Featured Image on Posts *****/

if (!function_exists('mh_featured_image')) {
	function mh_featured_image() {
		global $page, $post;
		if (has_post_thumbnail() && $page == '1') {
			$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'content');
			$caption_text = get_post(get_post_thumbnail_id())->post_excerpt;
			echo "\n" . '<div class="post-thumbnail">' . "\n";
				echo '<img src="' . $thumbnail[0] . '" alt="' . get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) . '" title="' . get_post(get_post_thumbnail_id())->post_title . '" />' . "\n";
				if ($caption_text) {
					echo '<span class="wp-caption-text">' . $caption_text . '</span>' . "\n";
				}
			echo '</div>' . "\n";
		}
	}
}
add_action('mh_post_content_top', 'mh_featured_image');

/***** Pagination for paginated Posts *****/

if (!function_exists('mh_posts_pagination')) {
	function mh_posts_pagination($content) {
		if (is_singular() && is_main_query()) {
			$content .= wp_link_pages(array('before' => '<div class="pagination clearfix">', 'after' => '</div>', 'link_before' => '<span class="pagelink">', 'link_after' => '</span>', 'nextpagelink' => __('&raquo;', 'mh-corporate-basic'), 'previouspagelink' => __('&laquo;', 'mh-corporate-basic'), 'pagelink' => '%', 'echo' => 0));
		}
		return $content;
	}
}
add_filter('the_content', 'mh_posts_pagination', 1);

/***** Author Box *****/

if (!function_exists('mh_author_box')) {
	function mh_author_box($author_ID = '') {
		if (get_the_author_meta('description', $author_ID) && !is_attachment()) {
			$author_ID = get_the_author_meta('ID');
			$name = get_the_author_meta('display_name', $author_ID);
			echo '<section class="author-box clearfix">' . "\n";
				echo '<div class="author-box-avatar">' . get_avatar($author_ID, 115) . '</div>' . "\n";
				echo '<div class="author-box-desc">' . "\n";
					echo '<h5 class="author-box-name">' . sprintf(__('About %s', 'mh-corporate-basic'), esc_attr($name)) . '</h5>' . "\n";
					echo '<p>' . esc_attr(get_the_author_meta('description', $author_ID)) . '</p>' . "\n";
				echo '</div>' . "\n";
			echo '</section>' . "\n";
		}
	}
}
add_action('mh_after_post_content', 'mh_author_box');

/***** Post / Image Navigation *****/

if (!function_exists('mh_postnav')) {
	function mh_postnav() {
		global $post;
		$parent_post = get_post($post->post_parent);
		$attachment = is_attachment();
		$previous = ($attachment) ? $parent_post : get_adjacent_post(false, '', true);
		$next = get_adjacent_post(false, '', false);

		if (!$next && !$previous)
		return;

		if ($attachment) {
			$attachments = get_children(array('post_type' => 'attachment', 'post_mime_type' => 'image', 'post_parent' => $parent_post->ID));
			$count = count($attachments);
		}
		if ($attachment && $count == 1) {
			$permalink = get_permalink($parent_post);
			echo '<nav class="post-navigation clearfix" role="navigation">' . "\n";
			echo '<div class="post-nav left">' . "\n";
			echo '<a href="' . $permalink . '">' . __('&larr; Back to post', 'mh-corporate-basic') . '</a>';
			echo '</div>' . "\n";
			echo '</nav>' . "\n";
		} elseif (!$attachment || $attachment && $count > 1) {
			echo '<nav class="post-navigation clearfix" role="navigation">' . "\n";
			echo '<div class="post-nav left">' . "\n";
			if ($attachment) {
				previous_image_link('%link', __('&larr; Previous image', 'mh-corporate-basic'));
			} else {
				previous_post_link('%link', __('&larr; Previous post', 'mh-corporate-basic'));
			}
			echo '</div>' . "\n";
			echo '<div class="post-nav right">' . "\n";
			if ($attachment) {
				next_image_link('%link', __('Next image &rarr;', 'mh-corporate-basic'));
			} else {
				next_post_link('%link', __('Next post &rarr;', 'mh-corporate-basic'));
			}
			echo '</div>' . "\n";
			echo '</nav>' . "\n";
		}
	}
}
add_action('mh_after_post_content', 'mh_postnav');

/***** Custom Commentlist *****/

if (!function_exists('mh_comments')) {
	function mh_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="vcard meta">
					<?php echo get_avatar($comment->comment_author_email, 30); ?>
					<?php echo get_comment_author_link() ?> //
					<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)) ?>"><?php printf(__('%1$s at %2$s', 'mh-corporate-basic'), get_comment_date(),  get_comment_time()) ?></a> //
					<?php if (comments_open() && $args['max_depth']!=$depth) { ?>
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					<?php } ?>
					<?php edit_comment_link(__('(Edit)', 'mh-corporate-basic'),'  ','') ?>
				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="comment-info"><?php _e('Your comment is awaiting moderation.', 'mh-corporate-basic') ?></div>
				<?php endif; ?>
				<div class="comment-text">
					<?php comment_text() ?>
				</div>
			</div><?php
	}
}

/***** Custom Comment Fields *****/

if (!function_exists('mh_comment_fields')) {
	function mh_comment_fields($fields) {
		$commenter = wp_get_current_commenter();
		$req = get_option('require_name_email');
		$aria_req = ($req ? " aria-required='true'" : '');
		$fields =  array(
			'author'	=>	'<p class="comment-form-author"><label for="author">' . __('Name ', 'mh-corporate-basic') . '</label>' . ($req ? '<span class="required">*</span>' : '') . '<br/><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
			'email' 	=>	'<p class="comment-form-email"><label for="email">' . __('Email ', 'mh-corporate-basic') . '</label>' . ($req ? '<span class="required">*</span>' : '' ) . '<br/><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
			'url' 		=>	'<p class="comment-form-url"><label for="url">' . __('Website', 'mh-corporate-basic') . '</label><br/><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>'
		);
		return $fields;
	}
}
add_filter('comment_form_default_fields', 'mh_comment_fields');

/***** Comment Count Output *****/

if (!function_exists('mh_comment_count')) {
	function mh_comment_count() {
		printf(_nx('1 Comment', '%1$s Comments', get_comments_number(), 'comments number', 'mh-corporate-basic'), number_format_i18n(get_comments_number()));
	}
}

/***** Pagination *****/

if (!function_exists('mh_pagination')) {
	function mh_pagination() {
		global $wp_query;
	    $big = 9999;
		echo paginate_links(array('base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))), 'format' => '?paged=%#%', 'current' => max(1, get_query_var('paged')), 'prev_next' => true, 'prev_text' => __('&laquo;', 'mh-corporate-basic'), 'next_text' => __('&raquo;', 'mh-corporate-basic'), 'total' => $wp_query->max_num_pages));
	}
}

/***** Add CSS classes to content container *****/

if (!function_exists('mh_content_css')) {
	function mh_content_css() {
		$options = mh_theme_options();
		if ($options['sb_position'] == 'left') {
			$float = 'right';
		} else {
			$float = 'left';
		}
		echo $float;
	}
}
add_action('mh_content_class', 'mh_content_css');

/***** Add CSS classes to sidebar container *****/

if (!function_exists('mh_sb_css')) {
	function mh_sb_css($sb_pos = '', $float = '') {
		$options = mh_theme_options();
		if ($options['sb_position'] == 'left') {
			$sb_pos = 'sb-left';
		} else {
			$sb_pos = 'sb-right';
		}
		echo $sb_pos;
	}
}
add_action('mh_sb_class', 'mh_sb_css');

/***** Add Featured Image Size to Media Gallery Selection *****/

if (!function_exists('mh_custom_image_size_choose')) {
	function mh_custom_image_size_choose($sizes) {
		$custom_sizes = array('content' => 'Featured Image');
		return array_merge($sizes, $custom_sizes);
	}
}
add_filter('image_size_names_choose', 'mh_custom_image_size_choose');

/***** Add CSS3 Media Queries Support for older versions of IE *****/

function mh_corporate_basic_media_queries() {
	echo '<!--[if lt IE 9]>' . "\n";
	echo '<script src="' . get_template_directory_uri() . '/js/css3-mediaqueries.js"></script>' . "\n";
	echo '<![endif]-->' . "\n";
}
add_action('wp_head', 'mh_corporate_basic_media_queries');

/***** Include Several Functions *****/

if (is_admin()) {
	require_once('admin/admin.php');
}
require_once('includes/mh-options.php');

?>