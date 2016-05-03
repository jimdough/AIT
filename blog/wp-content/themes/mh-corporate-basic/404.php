<?php get_header(); ?>
<div class="mh-wrapper clearfix">
	<section class="mh-content <?php mh_content_class(); ?>">
		<?php mh_before_page_content(); ?>
		<div class="entry box">
			<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mh-corporate-basic'); ?></p>
			<p><?php get_search_form(); ?></p>
		</div>
		<div class="not-found-widget"><?php
			$instance = array('title' => __('Tag Cloud', 'mh-corporate-basic'));
			$args = array('before_widget' => '<div class="sb-widget box">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>');
			the_widget('WP_Widget_Tag_Cloud', $instance , $args); ?>
		</div>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>