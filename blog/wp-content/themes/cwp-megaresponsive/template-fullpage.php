<?php
/*
 * Template Name: Full page
*/
get_header();
?>
<div id="primary" class="content-area">
		<div id="content" role="main">
		
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
					while ( have_posts() ) : 
						the_post(); 
						get_template_part( 'content', 'page' );
						
						if ( comments_open() || '0' != get_comments_number() ):
							comments_template();
						endif;	
					endwhile;
				?>	
				</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php	
get_footer();
?>