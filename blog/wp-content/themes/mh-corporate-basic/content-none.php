<?php /* Template for displaying a "No posts found" message. */ ?>
<div class="entry box">
<?php if (is_search()) { ?>
	<p><?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'mh-corporate-basic'); ?></p>
	<p><?php get_search_form(); ?></p>
<?php } else { ?>
	<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mh-corporate-basic'); ?></p>
	<p><?php get_search_form(); ?></p>
<?php } ?>
</div>
<div class="not-found-widget"><?php
	$instance = array('title' => __('Tag Cloud', 'mh-corporate-basic'));
	$args = array('before_widget' => '<div class="sb-widget box">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>');
	the_widget('WP_Widget_Tag_Cloud', $instance , $args); ?>
</div>