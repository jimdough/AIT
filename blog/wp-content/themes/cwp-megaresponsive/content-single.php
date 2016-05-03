<?php
/**
 * @package megaresponsive-lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
	    	<div class="post-categories">
				<?php the_category(' / '); ?>
			</div>
            
            <?php megaresponsive_lite_content_nav_posts(); ?>
            
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php megaresponsive_lite_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>	
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">		
		<?php
		
			if ( has_post_thumbnail() ):
				the_post_thumbnail();
			endif;

			the_content(); 		
		
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'megaresponsive-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'megaresponsive-lite' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'megaresponsive-lite' ) );

			if ( ! megaresponsive_lite_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'megaresponsive-lite' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'megaresponsive-lite' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'megaresponsive-lite' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'megaresponsive-lite' );
				}

			} // end check for categories on this blog

			$meta_text = __( 'Tags: %1$s','megaresponsive-lite' );

			printf(
				$meta_text,
				$tag_list,
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'megaresponsive-lite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->