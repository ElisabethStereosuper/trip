<?php get_header(); ?>

<?php 
// Get Blog Layout from Theme Options
if(get_theme_mod('asw_sidebar_pos', 'sidebar-right') != 'none'){
	$sidebar_pos = get_theme_mod('asw_sidebar_pos', 'sidebar-right').' span9';
} else {
	$sidebar_pos ='span12';
}

if( get_theme_mod('asw_home_slider', true) ) {
	if(empty($paged) or $paged < 2){
		wp_enqueue_script('owl.carousel');
		wp_enqueue_style( 'owl.carousel' );
		global $post;
		if ( is_front_page() ) {
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
		} else {
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		$post_ids = get_theme_mod('asw_home_slider_posts','');
		if(strlen($post_ids)){
			$post_ids = trim($post_ids);
			$post_ids = explode(',', $post_ids);
		} else {
			$post_ids = array();
		}
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 3,
			'post__in' => $post_ids,
			'paged' => $paged,
			'post_status'    => 'publish',
			'ignore_sticky_posts' => true,
			'meta_query' => array(
		        array(
		         'key' => '_thumbnail_id',
		         'compare' => 'EXISTS'
		        ),
		    )
		);
		$style = 'simple';
		if( $style == 'center' ){
			$center = 'true';
			$items = '2';
			$centerClass = 'post-slider-center';
		} else {
			$center = 'false';
			$items = '1';
			$centerClass = '';
		}
		static $slider_id = 0;
		$out = '';
		query_posts( $args );
		if( have_posts() ) {
			$custom_script = 'jQuery(document).ready(function($){
				"use strict";
				var owl = $("#post-slider-'.++$slider_id.'").owlCarousel(
			    {
			        items: '.$items.',
			        center: '.$center.',
			        margin: 10,
			        dots: false,
			        animateOut: "fadeOut",
			        animateIn: "fadeIn",
			        nav: true,
			        navText: [\'<i class="icon-arrows-left"></i>\',\'<i class="icon-arrows-right"></i>\'],
			        autoplay: true,
			        responsiveClass:true,
			        loop: '.$center.',
			        smartSpeed: 450,
			        autoHeight: true,
			        autoWidth:'.$center.',
			        themeClass: "owl-post-slider"
			    });
				owl.on(\'resized.owl.carousel\', function(event) {
				    var $this = $(this);
				    $this.find(\'.owl-height\').css(\'height\', $this.find(\'.owl-item.active\').height() );
				});
			});';
			wp_add_inline_script('owl.carousel', $custom_script); ?>

			<div id="<?php echo esc_attr('post-slider-'.$slider_id); ?>" class="<?php echo esc_attr('owl-carousel post-slider '.$centerClass.' fullwidth'); ?>">
			<?php while ( have_posts() ) {
				the_post(); ?>
				<div class="post-slider-item">
				<?php if( has_post_thumbnail() ) { ?>
						<figure class="post-img"><a href="<?php echo esc_url(get_the_permalink()); ?>" rel="bookmark"><?php the_post_thumbnail($post->ID, 'larue-fullwidth-slider'); ?></a></figure>
				<?php } ?>
					<div class="post-more">
						<div class="meta-categories"><?php echo get_the_category_list(', '); ?></div>
						<h3><?php the_title(); ?></h3>
						<a href="<?php the_permalink(); ?>" class="post-more-link" title="<?php echo esc_html__('Permalink to', 'larue').' '.esc_attr(the_title_attribute('echo=0')); ?>" rel="bookmark"><?php esc_html_e('Read more', 'larue'); ?></a>
					</div>
				</div>
			<?php } ?>
			</div>
		<?php } 
		wp_reset_query();
	}
} //end slider output if ?>

<div id='map'></div>

<div id="page-wrap" class="container">
	<div id="content" class="<?php echo esc_attr($sidebar_pos); ?>">
		<div class="row-fluid">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
				<?php 
					if( is_sticky() ){
						get_template_part('templates/posts/content', 'sticky' );
					} else {
						get_template_part('templates/posts/content', get_post_format() );
					} 
				?>

			<?php endwhile;
			
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
