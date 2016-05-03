<?php get_header(); ?>	
<?php if ( get_option( 'show_on_front' ) != 'page' ): ?>
	<div id="primary" class="content-area">		
		<div id="content" class="site-content" role="main">
			
			<?php 
				if( has_nav_menu('sidebar_menu') ):	
					echo '<div id="side-content">';
						get_template_part('/inc/left-menu');
					echo '</div>';
				endif; 
			?>

				<div id="main-content">
					<div id="main-content-inner" class="list-posts">
						<?php 
						$has_header = get_header_image(); 
						if( $has_header ) :
						?>
							<img src="<?php header_image(); ?>" alt="" class="megaresponsive-lite-header-image" />
						<?php endif; ?>
					</div>
				</div>

		</div><!-- #content -->	
	</div><!-- #primary -->	

	<input type="hidden" id="load_posts" value="<?php echo get_template_directory_uri(); ?>" /> 
<?php else: ?>
	<div id="primary" class="content-area">		
		<div id="content" class="site-content" role="main">
			
			<?php 
				if( has_nav_menu('sidebar_menu') ):	
					echo '<div id="side-content">';
						get_template_part('/inc/left-menu');
					echo '</div>';
				endif; 
			?>

				<div id="main-content">
					<div id="main-content-inner">
						<?php 
						$has_header = get_header_image(); 
						if( $has_header ) :
						?>
							<img src="<?php header_image(); ?>" alt="" class="megaresponsive-lite-header-image" />
						<?php endif; ?>
						
						
						<?php 
						if ( have_posts() ):
							while ( have_posts() ):
								the_post(); 
								?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

									<header class="entry-header">

										<?php

											if ( has_post_thumbnail() ):
											
												echo '<div class="entry-thumbnail"> ';

													echo '<a href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">';

													the_post_thumbnail(array(250,250), array('class' => 'alignleft'));

													echo '</a>';
												
												echo '</div>';

											endif;

										?>

										<div class="entry-meta meta-top">

											<div class="post-categories">

												<?php the_category(' / '); ?>

											</div>

											<?php if ( 'post' == get_post_type() ) : ?>

											<div class="entry-meta">

												<?php megaresponsive_lite_posted_on(); ?>

											</div><!-- .entry-meta -->

											<?php endif; ?>	

										</div>

										<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

									</header><!-- .entry-header -->



									

									<div class="entry-content">

										<?php the_content(); 

											wp_link_pages( array(

												'before' => '<div class="page-links">' . __( 'Pages:', 'megaresponsive-lite' ),

												'after'  => '</div>',

											) );

										?>

									</div><!-- .entry-content -->

									

									

								</article><!-- #post-## -->
								<?php
							endwhile;
						endif;
						?>
					</div>
				</div>

		</div><!-- #content -->	
	</div><!-- #primary -->	
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>