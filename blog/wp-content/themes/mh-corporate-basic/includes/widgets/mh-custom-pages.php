<?php

/***** Custom Pages Widget *****/

class mh_custom_pages_widget extends WP_Widget {
    function __construct() {
		parent::__construct(
			'mh_custom_pages', esc_html_x('MH Custom Pages (lite)', 'widget name', 'mh-corporate-basic'),
			array('classname' => 'mh_custom_pages', 'description' => esc_html__('Custom Pages Widget to display pages based on page IDs.', 'mh-corporate-basic'))
		);
	}
    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $pages = empty($instance['pages']) ? '' : $instance['pages'];

        echo $before_widget;
        if (!empty( $title)) { echo $before_title . $title . $after_title;} ?>
        <ul class="cp-widget clearfix"> <?php
        $include_ids = explode(',', $pages);
		$args = array('post_type' => 'page', 'post__in' => $include_ids, 'orderby' => 'post__in');
		$widget_loop = new WP_Query($args);
		while ($widget_loop->have_posts()) : $widget_loop->the_post(); ?>
			<li class="cp-wrap clearfix">
				<div class="cp-thumb-xl"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php if (has_post_thumbnail()) { the_post_thumbnail('cp_large'); } else { echo '<img src="' . get_template_directory_uri() . '/images/noimage_cp_large.png' . '" alt="No Picture" />'; } ?></a></div>
				<div class="cp-data">
					<h3 class="cp-xl-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				</div>
				<?php mh_excerpt(); ?>
			</li><?php
		endwhile;
		wp_reset_postdata(); ?>
        </ul><?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['pages'] = sanitize_text_field($new_instance['pages']);

        return $instance;
    }
    function form($instance) {
        $defaults = array('title' => '', 'pages' => '');
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
        	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):', 'mh-corporate-basic'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
		<p>
        	<label for="<?php echo $this->get_field_id('pages'); ?>"><?php _e('Page ID:', 'mh-corporate-basic'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['pages']); ?>" name="<?php echo $this->get_field_name('pages'); ?>" id="<?php echo $this->get_field_id('pages'); ?>" />
	    </p>
        <p>
    		<strong>Info:</strong> <?php _e('This is the lite version of this widget with basic features. If you need more professional features and options, you can upgrade to the premium version of this theme.', 'mh-corporate-basic'); ?>
    	</p><?php
    }
}

?>