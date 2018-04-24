		<?php if( is_active_sidebar('before-footer-widgets') ) { ?>
		<div id="before-footer">
			<?php if ( !function_exists( 'dynamic_sidebar' ) || dynamic_sidebar('Before footer area') ); ?>
		</div>
		<?php }
		 if( is_active_sidebar('footer-widgets') ) { ?>
			<footer id="footer">
				<div class="container">
					<?php if ( !function_exists( 'dynamic_sidebar' ) || dynamic_sidebar('Footer Widgets') ); ?>
				</div>
			</footer>
		<?php } ?>
			<?php if( get_theme_mod('asw_footer_copyright', '') != '' ||  has_nav_menu('footer_navigation') ) { ?>
			<div id="footer-copy-block" role="contentinfo">
				<div class="container">
					<?php if( get_theme_mod('asw_footer_copyright', '') != '' ) { ?>
					<div class="span6">
						<div class="copyright-text"><?php echo esc_html(get_theme_mod('asw_footer_copyright', '')); ?></div>
					</div>
					<?php } else {
						echo '<div class="span6">&nbsp;</div>';
					} ?>
					<?php if( has_nav_menu('footer_navigation') ) { ?>
					<div id="footer-nav-block" role="contentinfo" class="span6 textright">
						<ul id="footer-nav" class="menu">
							<?php wp_nav_menu(array('theme_location' => 'footer_navigation', 'container'=>false, 'items_wrap'=>'%3$s', 'menu_id' => 'footer-nav', 'fallback_cb'=>false, 'depth'=> -1)); ?>
						</ul>
					</div><!-- end footer-nav-block -->
					<?php } ?>
				</div>
			</div><!-- end footer-nav-block -->
			<?php } ?>
			<div class="clear"></div>
		</div> <!-- end boxed -->
	
	<?php wp_footer(); ?>
	</body>
</html>
