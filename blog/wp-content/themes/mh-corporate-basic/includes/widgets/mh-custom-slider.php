<?php

/***** Custom Slider Widget (Homepage) *****/

class mh_custom_slider_widget extends WP_Widget {
    function __construct() {
		parent::__construct(
			'mh_custom_slider', esc_html_x('MH Custom Slider (lite)', 'widget name', 'mh-corporate-basic'),
			array('classname' => 'mh_custom_slider', 'description' => esc_html__('Custom Slider Widget to display custom content for use on homepage template.', 'mh-corporate-basic'))
		);
	}
    function widget($args, $instance) {
        extract($args);
        $default_Image = get_template_directory_uri() . '/images/noimage_940x400.png';

		$title1 = empty($instance['title1']) ? '' : $instance['title1'];
		$url1 = empty($instance['url1']) ? '' : $instance['url1'];
		$image1 = empty($instance['image1']) ? $default_Image : $instance['image1'];
		$excerpt1 = empty($instance['excerpt1']) ? '' : $instance['excerpt1'];

		$title2 = empty($instance['title2']) ? '' : $instance['title2'];
		$url2 = empty($instance['url2']) ? '' : $instance['url2'];
		$image2 = empty($instance['image2']) ? $default_Image : $instance['image2'];
		$excerpt2 = empty($instance['excerpt2']) ? '' : $instance['excerpt2'];

		$title3 = empty($instance['title3']) ? '' : $instance['title3'];
		$url3 = empty($instance['url3']) ? '' : $instance['url3'];
		$image3 = empty($instance['image3']) ? $default_Image : $instance['image3'];
		$excerpt3 = empty($instance['excerpt3']) ? '' : $instance['excerpt3'];

		$slide1 = array('title' => $title1, 'url' => $url1, 'image' => $image1, 'excerpt' => $excerpt1);
		$slide2 = array('title' => $title2, 'url' => $url2, 'image' => $image2, 'excerpt' => $excerpt2);
		$slide3 = array('title' => $title3, 'url' => $url3, 'image' => $image3, 'excerpt' => $excerpt3);
		$slides = array($slide1, $slide2, $slide3);

        echo $before_widget; ?>
        <section id="slider-<?php echo rand(1, 9999); ?>" class="flexslider">
			<ul class="slides">
			<?php foreach($slides as $slide) { ?>
				<?php if ($slide['title'] || $slide['image'] != $default_Image || $slide['excerpt']) { ?>
				<li>
				<article class="slide-wrap">
					<a href="<?php echo esc_url($slide['url']); ?>" title="<?php echo esc_attr($slide['title']); ?>"><img src="<?php echo esc_url($slide['image']); ?>" alt="<?php echo esc_attr($slide['title']); ?>" /></a>
					<?php if ($slide['title'] || $slide['excerpt']) { ?>
					<div class="slide-caption">
						<div class="slide-data">
						<?php if ($slide['title']) { ?>
							<a href="<?php echo esc_url($slide['url']); ?>" title="<?php echo esc_attr($slide['title']); ?>"><h2 class="slide-title"><?php echo esc_attr($slide['title']); ?></h2></a>
						<?php } ?>
						<?php if ($slide['excerpt']) { ?>
							<div class="slide-excerpt mh-excerpt"><?php echo esc_attr($slide['excerpt']); ?> <a href="<?php echo esc_url($slide['url']); ?>" title="<?php echo esc_attr($slide['title']); ?>"></a></div>
						<?php } ?>
						</div>
					</div>
					<?php } ?>
				</article>
				</li>
				<?php } ?>
			<?php } ?>
			</ul>
		</section><?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;

		$instance['title1'] = sanitize_text_field($new_instance['title1']);
		$instance['url1'] = esc_url_raw($new_instance['url1']);
		$instance['image1'] = esc_url_raw($new_instance['image1']);
		$instance['excerpt1'] = strip_tags($new_instance['excerpt1']);

		$instance['title2'] = sanitize_text_field($new_instance['title2']);
		$instance['url2'] = esc_url_raw($new_instance['url2']);
		$instance['image2'] = esc_url_raw($new_instance['image2']);
		$instance['excerpt2'] = strip_tags($new_instance['excerpt2']);

		$instance['title3'] = sanitize_text_field($new_instance['title3']);
		$instance['url3'] = esc_url_raw($new_instance['url3']);
		$instance['image3'] = esc_url_raw($new_instance['image3']);
		$instance['excerpt3'] = strip_tags($new_instance['excerpt3']);

        return $instance;
    }
    function form($instance) {
        $defaults = array('title1' => '', 'url1' => '', 'image1' => '', 'excerpt1' => '', 'title2' => '', 'url2' => '', 'image2' => '', 'excerpt2' => '', 'title3' => '', 'url3' => '', 'image3' => '', 'excerpt3' => '');
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p class="widget-separator"><?php _e('Slide', 'mh-corporate-basic'); ?> 1</p>
        <p>
        	<label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title:', 'mh-corporate-basic'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title1']); ?>" name="<?php echo $this->get_field_name('title1'); ?>" id="<?php echo $this->get_field_id('title1'); ?>" />
	    </p>
	    <p>
        	<label for="<?php echo $this->get_field_id('url1'); ?>"><?php _e('Custom URL:', 'mh-corporate-basic'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_url($instance['url1']); ?>" name="<?php echo $this->get_field_name('url1'); ?>" id="<?php echo $this->get_field_id('url1'); ?>" />
	    </p>
	    <p>
        	<label for="<?php echo $this->get_field_id('image1'); ?>"><?php _e('Custom Image URL:', 'mh-corporate-basic'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_url($instance['image1']); ?>" name="<?php echo $this->get_field_name('image1'); ?>" id="<?php echo $this->get_field_id('image1'); ?>" />
	    </p>
	    <p>
	    	<label for="<?php echo $this->get_field_id('excerpt1'); ?>"><?php _e('Custom Excerpt:', 'mh-corporate-basic'); ?></label>
	    	<textarea cols="60" rows="3" style="width: 100%;" placeholder="Enter custom Excerpt" name="<?php echo $this->get_field_name('excerpt1'); ?>" id="<?php echo $this->get_field_id('excerpt1'); ?>"><?php echo esc_attr($instance['excerpt1']); ?></textarea>
	    </p>

	    <p class="widget-separator"><?php _e('Slide', 'mh-corporate-basic'); ?> 2</p>
        <p>
        	<label for="<?php echo $this->get_field_id('title2'); ?>"><?php _e('Title:', 'mh-corporate-basic'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title2']); ?>" name="<?php echo $this->get_field_name('title2'); ?>" id="<?php echo $this->get_field_id('title2'); ?>" />
	    </p>
	    <p>
        	<label for="<?php echo $this->get_field_id('url2'); ?>"><?php _e('Custom URL:', 'mh-corporate-basic'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_url($instance['url2']); ?>" name="<?php echo $this->get_field_name('url2'); ?>" id="<?php echo $this->get_field_id('url2'); ?>" />
	    </p>
	    <p>
        	<label for="<?php echo $this->get_field_id('image2'); ?>"><?php _e('Custom Image URL:', 'mh-corporate-basic'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_url($instance['image2']); ?>" name="<?php echo $this->get_field_name('image2'); ?>" id="<?php echo $this->get_field_id('image2'); ?>" />
	    </p>
	    <p>
	    	<label for="<?php echo $this->get_field_id('excerpt2'); ?>"><?php _e('Custom Excerpt:', 'mh-corporate-basic'); ?></label>
	    	<textarea cols="60" rows="3" style="width: 100%;" placeholder="Enter custom Excerpt" name="<?php echo $this->get_field_name('excerpt2'); ?>" id="<?php echo $this->get_field_id('excerpt2'); ?>"><?php echo esc_attr($instance['excerpt2']); ?></textarea>
	    </p>

	    <p class="widget-separator"><?php _e('Slide', 'mh-corporate-basic'); ?> 3</p>
        <p>
        	<label for="<?php echo $this->get_field_id('title3'); ?>"><?php _e('Title:', 'mh-corporate-basic'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title3']); ?>" name="<?php echo $this->get_field_name('title3'); ?>" id="<?php echo $this->get_field_id('title3'); ?>" />
	    </p>
	    <p>
        	<label for="<?php echo $this->get_field_id('url3'); ?>"><?php _e('Custom URL:', 'mh-corporate-basic'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_url($instance['url3']); ?>" name="<?php echo $this->get_field_name('url3'); ?>" id="<?php echo $this->get_field_id('url3'); ?>" />
	    </p>
	    <p>
        	<label for="<?php echo $this->get_field_id('image3'); ?>"><?php _e('Custom Image URL:', 'mh-corporate-basic'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_url($instance['image3']); ?>" name="<?php echo $this->get_field_name('image3'); ?>" id="<?php echo $this->get_field_id('image3'); ?>" />
	    </p>
	    <p>
	    	<label for="<?php echo $this->get_field_id('excerpt3'); ?>"><?php _e('Custom Excerpt:', 'mh-corporate-basic'); ?></label>
	    	<textarea cols="60" rows="3" style="width: 100%;" placeholder="Enter custom Excerpt" name="<?php echo $this->get_field_name('excerpt3'); ?>" id="<?php echo $this->get_field_id('excerpt3'); ?>"><?php echo esc_attr($instance['excerpt3']); ?></textarea>
	    </p>
	    <p>
    		<strong>Info:</strong> <?php _e('This is the lite version of this widget with basic features. If you need more professional features and options, you can upgrade to the premium version of this theme.', 'mh-corporate-basic'); ?>
    	</p><?php
    }
}

?>