<?php get_header(); ?>
<div class="mh-wrapper clearfix">
	<section class="mh-content <?php mh_content_class(); ?>">
		<?php mh_before_page_content(); ?>
		<?php if (have_posts()) { ?>
			<?php mh_author_box(); ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', 'loop'); ?>
			<?php endwhile; ?>
			<?php mh_pagination(); ?>
		<?php } else {  ?>
			<?php get_template_part('content', 'none'); ?>
		<?php } ?>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>