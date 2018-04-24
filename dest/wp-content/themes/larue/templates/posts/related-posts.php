<?php
//for use in the loop, list 3 post titles related to first tag on current post
$tags = wp_get_post_categories($post->ID);
if ($tags) {
?>				  
	<?php  
	$args=array(
		'category__in' => $tags,
		'post__not_in' => array($post->ID),
		'showposts'=>3,
		'meta_query' => array(
	        array(
	         'key' => '_thumbnail_id',
	         'compare' => 'EXISTS'
	        ),
	    )
	);
	$my_query = new WP_Query($args);
	$out = '';
	if( $my_query->have_posts() ) {
		echo'<div id="related-posts" class="aligncenter">';
		echo '<h2><span>'.esc_html__('Related Posts', 'larue').'</span></h2>';
		echo '<div class="row-fluid">';
		while ($my_query->have_posts()) : $my_query->the_post(); 
        echo '<div class="related-posts-item span4">';
        if( has_post_thumbnail() ) {
			echo '<figure class="post-img">'.get_the_post_thumbnail($post->ID, 'medium').'</figure>';
		}
        echo '<h3 class="related-item-title"><a href="'.esc_url(get_permalink()).'" title="' . esc_attr(the_title_attribute('echo=0')) . '">'.esc_attr(get_the_title()).'</a></h3>';
        echo '<div class="meta-date"><time datetime="'.esc_attr(date(DATE_W3C)).'">'.esc_attr(get_the_time('F j, Y')).'</time></div>';
        echo '</div>';
		endwhile;
		echo '<div class="clearfix"></div>';
  		echo '</div>';
  		echo '</div>';

		wp_reset_postdata();
		}
	}	
?>