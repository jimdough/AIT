<?php
/*
* 
* The Sidebar containing the main widget areas. 
* 
* @package megaresponsive-lite
*/
?>
<div id="secondary" class="widget-area" role="complementary">
<?php 
	if ( is_active_sidebar( 'sidebar-1' ) ) :
		
		dynamic_sidebar( 'sidebar-1' );

	else: ?>
			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>
			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', 'megaresponsive-lite' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>
			<aside id="meta" class="widget">
				<h1 class="widget-title"><?php _e( 'Meta', 'megaresponsive-lite' ); ?></h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>
<?php endif; ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
    	
		<?php 
			wp_nav_menu( array( 
								'container'       => 'div',
								'container_class' => 'footer-menu',
								'theme_location' => 'footer', 
								'fallback_cb' => false,
								'depth' => 1
								)); 
		?>
                                    
    
        <div class="copyright">
            <?php _e( 'Copyright &copy; ', 'megaresponsive-lite' ); ?>
			<?php echo date( 'Y' ); ?>
            <strong> <a href="<?php get_site_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a> </strong>
            <?php _e( '| All rights reserved.','megaresponsive-lite' ); ?>          
        </div><!-- .copyright -->
		<div class="copyright">
			<a href="https://themeisle.com/themes/megaresponsive-lite/" title="MegaResponsive Lite" rel="nofollow" target="_blank">
			MegaResponsive Lite</a>
			<?php _e(" powered by ",'megaresponsive-lite');?> <a href="http://wordpress.org/" title="WordPress" target="_blank">
			WordPress</a>
		</div>
        
	</footer><!-- #colophon -->
    
</div><!-- #secondary -->