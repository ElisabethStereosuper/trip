<?php
global $post;
?>

<div class="author-info">
	<div class="author-avatar alignleft">
		<?php
			// retrieve our additional author meta info
			$user_meta_image = esc_attr( get_the_author_meta( 'user_meta_image', $post->post_author ) );
		    // make sure the field is set
		    if ( isset( $user_meta_image ) && $user_meta_image ) {
		        // only display if function exists
		        if ( function_exists( 'asw_framework_get_additional_user_meta_thumb' ) ) ?>
		            <img alt="<?php esc_html_e('author photo', 'larue'); ?>" src="<?php echo esc_url(asw_framework_get_additional_user_meta_thumb()); ?>" />
		<?php } else {
			echo get_avatar( get_the_author_meta('user_email'), '85', '' );
		} ?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<h2 class="author-title">
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo esc_attr(get_the_author_meta( 'nickname' )); ?></a>
		</h2>
		<div class="author-bio">
			<p><?php the_author_meta( 'description' ); ?></p>
			<?php echo larue_get_user_socials(); ?>
		</div><!-- .author-bio -->
	</div><!-- .author-description -->
</div><!-- .author-info -->
