<?php 
/**
 * Template Name: Page: Blog list
 */
 ?>
<?php get_header(); ?>

<?php 
// Get Blog Layout from Theme Options
if(get_theme_mod('asw_sidebar_pos', 'sidebar-right') != 'none'){
	$sidebar_pos = get_theme_mod('asw_sidebar_pos', 'sidebar-right').' span9';
} else {
	$sidebar_pos ='span12';
}

if(get_theme_mod('asw_home_slider', true)) {?>
	<div class="wrapper">
		<?php if (have_posts()) : while (have_posts()) : the_post();
			if(empty($paged) or $paged < 2){
				the_content();
			}
		endwhile; endif;?>
	</div>
<?php } //end slider output if ?>
<div id="page-wrap" class="container">
	<div id="content" class="<?php echo esc_attr($sidebar_pos); ?>">
		<?php 
			global $post;
			if ( is_front_page() ) {
				$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			} else {
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			}

			$args = array(
				'post_type' => 'post',
				'posts_per_page' => get_option( 'posts_per_page' ),
				'paged' => $paged,
				'post_status'    => 'publish'
			);
			
			if($paged != 1) {
				$offset = get_option( 'posts_per_page' ) + (($paged - 2) * 4);
	            $args = array(
	            	'posts_per_page' => 4,
	            	'offset' => $offset,
	            	'ignore_sticky_posts' => true
	            );
			}
			static $post_section_id = 0;
			$out = '';
			++$post_section_id;
			query_posts( $args );
			if( have_posts() ) {
				echo '<div id="list-posts-'.$post_section_id.'" class="row-fluid list-posts">';
				while ( have_posts() ) {
					the_post();
					$categories = get_the_category();
					 
					$classes = join(' ', get_post_class($post->ID));
					echo '<article itemscope itemtype="http://schema.org/Article" class="span12 post">';
						echo '<div class="post-content-container">';
							if( has_post_thumbnail() ) {
								echo '<figure class="post-img"><a href="'.esc_url(get_the_permalink()).'" rel="bookmark">'.get_the_post_thumbnail($post->ID, 'medium').'</a></figure>';
							} else {
								echo '<figure class="post-img"><a href="'.esc_url(get_the_permalink()).'" rel="bookmark"><img src="https://placeholdit.imgix.net/~text?txtsize=42&txt=Your+image+here&w=470&h=410" alt="placeholder image"></a></figure>';
							}
							echo '<div class="extra-wrap">';
							if ( ! empty( $categories ) ) {
							    $category = '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
								echo '<div class="meta-categories">'.$category.'</div>';
							}
							echo '<header class="title"><h2 itemprop="headline"><a href="'.esc_url(get_the_permalink()).'" title="'.esc_html__('Permalink to', 'larue').' '.esc_attr(the_title_attribute('echo=0')).'" rel="bookmark">'.esc_attr(the_title_attribute('echo=0')).'</a></h2></header>';
							echo '<div class="meta">';
							echo '<span class="meta-date"><time datetime="'.esc_attr(date(DATE_W3C)).'">'.esc_attr(get_the_time(get_option('date_format'))).'</time></span>';
							echo '<span class="meta-comments">'.LarueCommentsNumber($post->ID).'</span>';
							echo '</div>';
							echo '<div class="post-content">';
							echo '<div class="post-excerpt">'.LarueExcerpt(29).'</div>';
							wp_link_pages(array('before' =>'<div class="pagination_post">', 'after'  =>'</div>', 'pagelink' => '<span>%</span>', 'echo' => true));
							echo '<a href="'.esc_url(get_the_permalink()).'" class="button post-more-button">'.esc_html__('View post','larue').'</a>';
							echo '</div></div>';
						echo '</div>';
					echo '</article>';
				}
				echo '</div>';
			}
			echo '<div id="pagination-list"><div id="pagination" class="hide">'.get_next_posts_link().'</div>';
			echo '<a href="#" class="loadmore">'.esc_html__('Load More','larue').'</a></div>';
			wp_reset_query();
		?>
	</div>

<?php if(get_theme_mod('asw_sidebar_pos', 'sidebar-right') != 'none'){
		get_sidebar();
	} 
?>
</div>

<?php get_footer(); ?>
