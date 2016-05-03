<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>
<div class="mh-wrapper hp clearfix">
	<?php dynamic_sidebar('home-1'); ?>
	<?php if (is_active_sidebar('home-2') || is_active_sidebar('home-3') || is_active_sidebar('home-4')) : ?>
	<div class="clearfix">
	    <?php if (is_active_sidebar('home-2')) { ?>
		<div class="hp-sidebar hp-sidebar-left">
			<?php dynamic_sidebar('home-2'); ?>
		</div>
		<?php } ?>
		<?php if (is_active_sidebar('home-3')) { ?>
		<div class="hp-sidebar sb-right hp-sidebar-right">
			<?php dynamic_sidebar('home-3'); ?>
		</div>
		<?php } ?>
		<?php if (is_active_sidebar('home-4')) { ?>
		<div class="hp-sidebar sb-right">
			<?php dynamic_sidebar('home-4'); ?>
		</div>
		<?php } ?>
	</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>