<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package megaresponsive-lite
 */


/**
 * Display navigation to next/previous pages when applicable
 */
function megaresponsive_lite_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'megaresponsive-lite' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'megaresponsive-lite' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'megaresponsive-lite' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'megaresponsive-lite' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'megaresponsive-lite' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}


/**
 * Custom Comments list.
 */
function megaresponsive_lite_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

     <div id="comment-<?php comment_ID(); ?>" class="comment_body">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default=get_template_directory_uri().'/images/avatar.png' ); ?>

         <?php printf(__('<cite class="fn">%s</cite> / ','megaresponsive-lite'), get_comment_author_link()) ?>
     	 <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s','megaresponsive-lite'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)','megaresponsive-lite'),'  ','') ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.','megaresponsive-lite'); ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
}

/**
 * Posted on function.
 */
function megaresponsive_lite_posted_on(){

	_e('By','megaresponsive-lite');
	echo ' ';
	the_author_posts_link();
	echo ' / ';
	the_time('F jS, Y');
	echo ' / ';
	comments_number();
}

/**
 * Nav post in single page.
 */
function megaresponsive_lite_content_nav_posts(){
?>  

	<div class="navigation-single">
		<div class="alignright">
			<?php next_post_link('%link', __( 'Next post','megaresponsive-lite' ), TRUE); ?>  
		</div>
		<div class="alignright">
			<?php previous_post_link('%link', __( 'Previous post','megaresponsive-lite' ), TRUE); ?> 
		</div>
	</div> <!-- end navigation -->   

<?php 
}

/**
 * Returns true if a blog has more than 1 category
 */
function megaresponsive_lite_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so megaresponsive_lite_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so megaresponsive_lite_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in megaresponsive_lite_categorized_blog
 */
function megaresponsive_lite_category_transient_flusher() {
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'megaresponsive_lite_category_transient_flusher' );
add_action( 'save_post',     'megaresponsive_lite_category_transient_flusher' );