<?php


class widget_about_me extends WP_Widget { 
	
	// Widget Settings
	public function __construct() {
		$widget_ops = array('description' => esc_html__('Display informations about you', 'larue') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'aboutme' );
		parent::__construct( 'aboutme', esc_html__('asw-AboutMe', 'larue'), $widget_ops, $control_ops );
		add_action('admin_enqueue_scripts', array($this, 'admin_setup'));
	}
	/**
	 * Enqueue all the javascript.
	 */
	public function admin_setup() {
		global $pagenow;

        if($pagenow !== 'widgets.php' && $pagenow !== 'customize.php') return;

		wp_enqueue_media();
        wp_enqueue_script(
			'larue-about-me-widget',
			get_template_directory_uri().'/framework/widgets/js/about-me-widget.js',
			array(),
			1.0
		);

	}

	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		// ------
		echo $before_widget;
		if ( $title !='' ) echo $before_title . $title . $after_title;
		?>
			<div class="about-me">
				<?php if($instance['image']): ?>
				<p><img src="<?php echo esc_url($instance['image']); ?>" alt="about-me-image"></p>
				<?php endif; ?>
				<div class="content">
					<?php if($instance['content']): 
						echo apply_filters( 'widget_text', $instance['content'], $instance, $this );
					endif; ?>
				</div>
			</div>

		<?php
		echo $after_widget;
		// ------
	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance; 
		
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['image'] = $new_instance['image'];
		$instance['content'] = $new_instance['content'];
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => '', 'image' => '', 'content' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php esc_html_e('Image:','larue'); ?></label>
			<input type="text" class="widefat widget-image-input" id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>" value="<?php echo esc_attr($instance['image']); ?>" />
			<p></p>
			<a href="#" class="upload_image_button button button-primary"><?php esc_html_e('Upload image', 'larue'); ?></a>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:','larue'); ?></label>
			<textarea class="widefat" rows="10" cols="20" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>"><?php echo esc_textarea($instance['content']); ?></textarea>
		</p>
		
    <?php }
}

// Add Widget
function widget_about_init() {
	register_widget('widget_about_me');
}
add_action('widgets_init', 'widget_about_init');

?>