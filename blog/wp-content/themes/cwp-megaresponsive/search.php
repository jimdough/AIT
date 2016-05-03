<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package megaresponsive-lite
 */

get_header(); ?>

	<section id="primary" class="content-area">
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

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'megaresponsive-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->

						<?php 
							while ( have_posts() ) : 
								the_post();
								get_template_part( 'content', 'search' );
							endwhile; 
							
							megaresponsive_lite_content_nav( 'nav-below' ); 
						
						else :
						
							get_template_part( 'no-results', 'search' ); 

						endif; ?>

				</div><!-- #main-content-inner -->
			</div><!-- #main-content -->

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>