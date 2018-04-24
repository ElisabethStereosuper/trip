<?php get_header(); ?>

<?php 
if(get_theme_mod('asw_sidebar_pos', 'sidebar-right') != 'none' && (get_post_format() != 'image' || rwmb_meta( 'asw_post_image_layout' ) != 'side_image') ){
	$sidebar_pos = get_theme_mod('asw_sidebar_pos', 'sidebar-right').' span9';
} else {
	$sidebar_pos ='span12';
}
global $post;
$categories = get_the_category();
if ( ! empty( $categories ) ) {
    $category = '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
}
if(get_post_format() == 'image' && rwmb_meta( 'asw_post_image_layout' ) == 'fullwidth_image') {
	if( has_post_thumbnail() ) { ?>
		<div id="fullpage" class="fullwidth_image_block">
			<div class="section">
				<figure class="featured-post-img"><?php the_post_thumbnail('full'); ?></figure>
				<div class="post_header">
					<?php if ( ! empty( $categories ) ) {
							echo '<div class="meta-categories">'.$category.'</div>';
						} ?>
					<header class="title">
						<h2 itemprop="headline"><?php the_title(); ?></h2>
					</header>
					<div class="meta">
						<span class="meta-author"><?php esc_html_e('By ', 'larue'); the_author_meta( 'display_name' , $post->post_author ); ?></span>
						<span class="meta-date"><time datetime="<?php echo esc_attr(date(DATE_W3C)) ?>"><?php the_time(get_option('date_format')); ?></time></span>
						<span class="meta-comments"><?php comments_popup_link(esc_html__('No Comments', 'larue'), esc_html__('1 Comment', 'larue'), esc_html__('% Comments', 'larue'), 'comments-link', ''); ?></span>
					</div>
				</div>
			</div>
		</div>

	<?php }
}
?>
<div id="page-wrap" class="container">
	<div id="content" class="<?php echo esc_attr($sidebar_pos); ?> single">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article itemscope itemtype="http://schema.org/Article" <?php if(get_post_format() == 'image') { post_class(rwmb_meta( 'asw_post_image_layout' )); } else {post_class();}; ?>>
					<div class="post-content-container aligncenter">
						<?php
						if(rwmb_meta( 'asw_post_image_layout' ) != 'fullwidth_image') {
							if(get_post_format() == 'image' && rwmb_meta( 'asw_post_image_layout' ) == 'side_image') {
								if( has_post_thumbnail() ) {
									echo '<figure class="post-img">'.get_the_post_thumbnail($post->ID, 'larue-masonry').'</figure>';
								}
							}
							if ( ! empty( $categories ) ) {
								echo '<div class="meta-categories">'.$category.'</div>';
							}
						?>			
						<header class="title">
							<h2 itemprop="headline"><?php the_title(); ?></h2>
						</header>
						<div class="meta">
							<span class="meta-author"><?php esc_html_e('By ', 'larue'); the_author(); ?></span>
							<span class="meta-date"><time datetime="<?php echo esc_attr(date(DATE_W3C)) ?>"><?php the_time(get_option('date_format')); ?></time></span>
							<span class="meta-comments"><?php comments_popup_link(esc_html__('No Comments', 'larue'), esc_html__('1 Comment', 'larue'), esc_html__('% Comments', 'larue'), 'comments-link', ''); ?></span>
						</div>
						<?php } ?>
						<div class="post-content">
							<?php
							$format = get_post_format();
							if ( false === $format )
								$format = 'standard';
								switch ( $format ) {
									case 'gallery':
										echo larue_single_post_gallery($post->ID);
										break;
									case 'link':
										echo larue_single_post_link($post->ID);
										break;
									case 'quote':
										echo larue_single_post_quote($post->ID);
										break;
									case 'standard':
										echo '<figure class="post-img">'.get_the_post_thumbnail($post->ID).'</figure>';
										break;
									default:
										# code...
										break;
								} ?>
							<div class="post-excerpt">
								<?php the_content(); ?>
							</div>
							<?php wp_link_pages(array('before' =>'<div class="pagination_post">', 'after'  =>'</div>', 'pagelink' => '<span>%</span>')); ?>
						</div>
						<div class="post-meta"><?php get_template_part( 'framework/inc/meta-tags' ); ?></div>
					</div>
					</article>
					<?php get_template_part( 'framework/inc/sharebox' ); ?>
					<?php 
						if ( '' !== get_the_author_meta( 'description' ) ) {
							get_template_part( 'templates/posts/biography' );
						}
						get_template_part( 'templates/posts/related-posts' );
						if(comments_open()) {
							comments_template();
						} 
					?>
						<div id="post-navigation" class="wrapper ">
							<?php
								$prevPost = get_previous_post(true);
								$nextPost = get_next_post(true);	
							?>
							<?php if($prevPost) { $prevURL = get_permalink($prevPost->ID); ?>
							<div class="prev">
								<?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?>
								<a class="prev-post-label" href="<?php echo esc_url($prevURL); ?>" >
									<?php if(has_post_thumbnail($prevPost->ID) ) echo get_the_post_thumbnail($prevPost->ID, 'thumbnail'); ?>
									<div class="prev-post-title">
										<time datetime="<?php echo esc_attr(date(DATE_W3C)); ?>"><?php echo esc_attr(get_the_time('F j', $prevPost->ID)); ?></time>
										<h2><?php echo esc_attr(get_the_title($prevPost->ID)); ?></h2>
									</div>
								</a>
							</div>
							<?php } ?>
							<?php if($nextPost) { $nextURL = get_permalink($nextPost->ID); ?>
							<div class="next">
								<?php next_post_link('%link', '<i class="fa fa-angle-right"></i>'); ?>
								<a class="next-post-label" href="<?php echo esc_url($nextURL); ?>">
									<?php if(has_post_thumbnail($nextPost->ID) ) echo get_the_post_thumbnail($nextPost->ID, 'thumbnail'); ?>
									<div class="next-post-title">
										<time datetime="<?php echo esc_attr(date(DATE_W3C)); ?>"><?php echo esc_attr(get_the_time('F j', $nextPost->ID)); ?></time>
										<h2><?php echo esc_attr(get_the_title($nextPost->ID)); ?></h2>
									</div>
								</a>
							</div>
							<?php } ?>
						</div>
				
				
		<?php endwhile; endif; ?>
	</div>

<?php if( get_theme_mod('asw_sidebar_pos', 'sidebar-right') != 'none' && (get_post_format() != 'image' || rwmb_meta( 'asw_post_image_layout' ) != 'side_image') ){
		get_sidebar();
	} 
?>

</div>

<?php get_footer(); ?>
