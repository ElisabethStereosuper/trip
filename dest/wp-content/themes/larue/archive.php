<?php get_header(); ?>

<?php 
// Get Blog Layout from Theme Options
if(get_theme_mod('asw_sidebar_pos', 'sidebar-right') != 'none'){
	$sidebar_pos = get_theme_mod('asw_sidebar_pos', 'sidebar-right').' span9';
} else {
	$sidebar_pos ='span12';
}
?>
<div id="page-wrap" class="container">
	<div id="content" class="<?php echo esc_attr($sidebar_pos); ?>">
		<div class="row-fluid">
			<?php if (have_posts()) : ?>
			<div class="archive-header span12">
				<?php if ( is_category() ) {
					$archive_title = single_cat_title('', false);
					$categories = get_category( get_query_var( 'cat' ) );
					$catID = $categories->cat_ID;
					$args = array(
						'current_category' => $catID,
						'echo' => 0,
						'title_li' => ""
					);
					echo '<div class="post-count"><h2>'.$wp_query->found_posts.' '.esc_html__('posts', 'larue').' '.esc_html__('in', 'larue').' '.$archive_title.'</h2></div><ul class="list-categories">'.wp_list_categories($args).'</ul>';
				} elseif( is_tag() ){
					$archive_title = single_tag_title('', false);
					echo '<div class="post-count"><h4>'.$wp_query->found_posts.' '.esc_html__('posts', 'larue').' '.esc_html__('for tag', 'larue').'</h4><h2>'.$archive_title.'</h2></div>';
				}
				?>
			</div> 
			<?php while (have_posts()) : the_post(); 
				
				get_template_part('templates/posts/content',get_post_format());

			endwhile;
			
			echo '<div class="clearfix"></div>';
			?>
				
			<?php else : ?>
				
				<h2><?php esc_html_e('Not Found', 'larue') ?></h2>
				
			<?php endif; ?>
		</div>
		<?php get_template_part( 'framework/inc/nav' ); ?>
	</div>

<?php if(get_theme_mod('asw_sidebar_pos', 'sidebar-right') != 'none'){
		get_sidebar();
	} 
?>
</div>

<?php get_footer(); ?>
