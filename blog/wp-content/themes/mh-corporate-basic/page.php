<?php get_header(); ?>
<div class="mh-wrapper clearfix">
    <div class="mh-content <?php mh_content_class(); ?>"><?php
	    if (have_posts()) :
	    	while (have_posts()) : the_post();
				mh_before_page_content();
				get_template_part('content', 'page');
				comments_template();
			endwhile;
		endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>