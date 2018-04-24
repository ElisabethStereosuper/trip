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
				<?php
					echo'<div class="post-count"><h4>'.$wp_query->found_posts.' '.esc_html__('search results for', 'larue').'</h4><h2>'.esc_attr( get_search_query() ).'</h2></div>';
				?>
			</div>
			<?php while (have_posts()) : the_post(); 
				
				get_template_part('templates/posts/content', get_post_format());
				
			endwhile;
			
			echo '<div class="clearfix"></div>';
			
			get_template_part( 'framework/inc/nav' ); 
			?>
				
			<?php else : ?>
				
				<h2><?php esc_html_e('Not Found', 'larue') ?></h2>
				
			<?php endif; ?>
		</div>
	</div>

<?php if(get_theme_mod('asw_sidebar_pos', 'sidebar-right') != 'none'){
		get_sidebar();
	} 
?>
</div>

<?php get_footer(); ?>
