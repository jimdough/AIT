<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package megaresponsive-lite
 */

get_header(); ?>

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

<?php get_sidebar(); ?>
<?php get_footer(); ?>