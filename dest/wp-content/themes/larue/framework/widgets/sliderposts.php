<?php


class widget_sliderposts extends WP_Widget { 
	
	// Widget Settings
	function widget_sliderposts() {
		$widget_ops = array('description' => esc_html__('Display your posts as slider', 'larue') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'sliderposts' );
		$this->__construct( 'sliderposts', esc_html__('asw-Slider Posts', 'larue'), $widget_ops, $control_ops );
		add_action('wp_enqueue_scripts', array($this, 'scripts_setup'));
	}

	public function scripts_setup() {
        wp_enqueue_script('owl.carousel');
        wp_enqueue_style('owl.carousel');
	}
	// Widget Output
	function widget($args, $instance) {
		$title = $number = $posts_ids = '';
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$number = $instance['number'];
		$posts_ids = $instance['posts_ids'];
		
		$rand_id = rand(1,999);
		echo $before_widget;

		if($title != '') {
			echo $before_title . $title . $after_title;
		}
		
		$custom_script = 'jQuery(document).ready(function($){
				"use strict";
				var owl = $("#sliderposts'.esc_attr($rand_id).'").owlCarousel(
			    {
			        items: 1,
			        margin: 0,
			        dots: true,
			        animateOut: "fadeOut",
			        animateIn: "fadeIn",
			        nav: false,
			        autoplay: true,
			        responsiveClass:true,
			        loop: false,
			        smartSpeed: 450,
			        autoHeight: true,
			        themeClass: "owl-post-slider",
			        responsive:{
			            0:{
			                items:1,
			            },
			            1199:{
			                items:1
			            }
			        }
			    });
				owl.on(\'resized.owl.carousel\', function(event) {
				    var $this = $(this);
				    $this.find(\'.owl-height\').css(\'height\', $this.find(\'.owl-item.active\').height() );
				});
			});';
		wp_add_inline_script('owl.carousel', $custom_script);
		?>
		<div id="sliderposts<?php echo esc_attr($rand_id); ?>" class="sliderposts owl-carousel post-slider">
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => $number,
				'order' => 'DESC',
				'orderby' => 'date',
				'ignore_sticky_posts' => true,
				'meta_query' => array(
			        array(
			         'key' => '_thumbnail_id',
			         'compare' => 'EXISTS'
			        ),
			    )
			);
			$latestposts = new WP_Query($args);
			if($latestposts->have_posts()):
				while ( $latestposts->have_posts()): $latestposts->the_post();
				$out = '';
				global $post;
				$categories = get_the_category();
		        echo '<div class="post-slider-item">';
					if( has_post_thumbnail() ) {
						echo '<figure class="post-img"><a href="'.esc_url(get_the_permalink()).'" rel="bookmark">'.get_the_post_thumbnail($post->ID, 'larue-masonry').'</a></figure>';
					}
					echo '<div class="post-more">';
						if ( ! empty( $categories ) ) {
						    $category = '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
							echo '<div class="meta-categories">'.$category.'</div>';
						}
						echo '<h3><a href="'.esc_url(get_the_permalink()).'">'.esc_attr(get_the_title()).'</a></h3>';
					echo '</div>';
				echo '</div>';
		        endwhile;		
			?>
			<?php endif; wp_reset_postdata();?>
			
		</div>
		<?php echo $after_widget;
	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['posts_ids'] = $new_instance['posts_ids'];
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => '', 'number' => 3, 'posts_ids'=> '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e("Title",'larue'); ?>:</label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e("Number of items to show",'larue'); ?>:</label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('posts_ids')); ?>"><?php esc_html_e("Posts IDs",'larue'); ?>:</label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('posts_ids')); ?>" name="<?php echo esc_attr($this->get_field_name('posts_ids')); ?>" value="<?php echo esc_attr($instance['posts_ids']); ?>" />
			<span class="description"><?php esc_html_e("Enter posts IDs to display only those records (Note: separate values by commas (,)).",'larue'); ?></span>
		</p>
	<?php
	}
}

// Add Widget
function widget_sliderposts_init() {
	register_widget('widget_sliderposts');
}
add_action('widgets_init', 'widget_sliderposts_init');

?>