<?php
if(is_front_page()){
	$permalink = esc_url(home_url('/'));
	$title = esc_attr(get_bloginfo('name'));
	$description = esc_attr(get_bloginfo('description'));
} else {
	$permalink = esc_url(get_permalink());
	$title = esc_attr(get_the_title());
	$description = esc_attr(get_the_title());
}
?>
<div class="sharebox">
	<div class="social-icons">
		<ul class="unstyled">
			<?php if( get_theme_mod('asw_sharing_facebook',true) ){ ?>
			<li class="social-facebook">
				<a href="//www.facebook.com/sharer.php?u=<?php echo esc_url($permalink);?>&amp;t=<?php echo str_replace(' ', '+', $title); ?>" title="<?php esc_html_e( 'Share To Facebook', 'larue') ?>" target="_blank"><i class="fa fa-facebook"></i></a>
			</li>
			<?php } if( get_theme_mod('asw_sharing_twitter',true) ){ ?>	
			<li class="social-twitter">
				<a href="//twitter.com/home?status=<?php echo str_replace(' ', '+', $title); ?>+<?php echo esc_url($permalink); ?>" title="<?php esc_html_e( 'Share To Twitter', 'larue') ?>" target="_blank"><i class="fa fa-twitter"></i></a>
			</li>
			<?php } if( get_theme_mod('asw_sharing_pinterest',true) ){ ?>	
			<li class="social-pinterest">
				<a href="//pinterest.com/pin/create/link/?url=<?php echo esc_url($permalink);?>&amp;media=<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>&amp;description=<?php echo str_replace(" ", "+", $description); ?>" title="<?php _e( 'Share To Pinterest', 'larue') ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
			</li>
			<?php } ?>
			<?php if( get_theme_mod('asw_sharing_linkedin',false) ) { ?>	
			<li class="social-linkedin">
				<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($permalink);?>&amp;title=<?php echo str_replace(' ', '+', $title); ?>" title="<?php _e( 'Share To LinkedIn', 'larue') ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
			</li>
			<?php } ?>
			<?php if( get_theme_mod('asw_sharing_googleplus',false) ) { ?>	
			<li class="social-googleplus">
				<a href="http://plus.google.com/share?url=<?php echo esc_url($permalink);?>&amp;title=<?php echo str_replace(' ', '+', $title); ?>" title="<?php _e( 'Share To Google+', 'larue') ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</li>
			<?php } ?>
			<?php if( get_theme_mod('asw_sharing_email',false) ) { ?>	
			<li class="social-email">
				<a href="mailto:?subject=<?php echo str_replace(' ', '+', $title); ?>&amp;body=<?php echo esc_url($permalink);?>" title="<?php _e( 'Share with E-Mail', 'larue') ?>" target="_blank"><i class="fa fa-envelope"></i></a>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>