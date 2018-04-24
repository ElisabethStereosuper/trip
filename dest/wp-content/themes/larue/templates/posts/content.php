<article itemscope itemtype="http://schema.org/Article" <?php post_class('post standard span12'); ?>>
	<?php 
	$tmpContent = get_the_content();
	if(strpos( $tmpContent, 'larueinstapost' ) !== false) { 
		the_content();
	} else { ?>
	<div class="post-content-container aligncenter">
		<?php
			$categories = get_the_category();
			if ( ! empty( $categories ) ) {
			    $category = '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
				echo '<div class="meta-categories">'.$category.'</div>';
			}
		?>			
		<header class="title">
			<h2 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'larue'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</header>
		<div class="meta">
			<span class="meta-author"><?php esc_html_e('By ', 'larue'); the_author(); ?></span>
			<span class="meta-date"><time datetime="<?php echo esc_attr(date(DATE_W3C)) ?>"><?php the_time(get_option('date_format')); ?></time></span>
			<span class="meta-comments"><?php comments_popup_link(esc_html__('No Comments', 'larue'), esc_html__('1 Comment', 'larue'), esc_html__('% Comments', 'larue'), 'comments-link', esc_html__('Comments Off','larue')); ?></span>
		</div>
		<div class="post-content">
			<?php if( has_post_thumbnail() ) {?>
				<figure class="post-img"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?></a></figure>
			<?php } ?>
			<div class="post-excerpt">
				<?php if(is_sticky() || strpos( $post->post_content, '<!--more-->' ) ){
					the_content();
				} else {
					the_excerpt();
					if(!get_the_title()){ ?>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to post', 'larue') ); ?>" rel="bookmark"><?php esc_html_e('Continue reading', 'larue'); ?></a>
					<?php }
				} 
				?>
			</div>
			<?php wp_link_pages(array('before' =>'<div class="pagination_post">', 'after'  =>'</div>', 'pagelink' => '<span>%</span>')); ?>
		</div>
		<?php get_template_part( 'framework/inc/sharebox' ); ?>
	</div>
	<?php } ?>
</article>