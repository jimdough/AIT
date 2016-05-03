<?php /* Default template for displaying post content. */ ?>
<article <?php post_class(); ?>>
	<header class="post-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php mh_post_header(); ?>
	</header>
	<div class="entry clearfix">
		<?php mh_post_content_top(); ?>
		<?php the_content(); ?>
		<?php mh_post_content_bottom(); ?>
	</div>
	<?php if (has_tag()) : ?>
		<div class="post-tags clearfix">
        	<?php the_tags('<ul><li class="round-corners">','</li><li class="round-corners">','</li></ul>'); ?>
        </div>
	<?php endif; ?>
</article>