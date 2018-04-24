<?php


class widget_larue_map extends WP_Widget { 
	
	// Widget Settings
	public function __construct() {
		$widget_ops = array('description' => esc_html__('Display your location', 'larue') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'map' );
		parent::__construct( 'map', esc_html__('asw-Map', 'larue'), $widget_ops, $control_ops );
		add_action('wp_enqueue_scripts', array($this, 'admin_setup'), 20);
	}
	/**
	 * Enqueue all the javascript.
	 */
	public function admin_setup() {
		wp_enqueue_script('gmaps.api', 'https://maps.google.com/maps/api/js?v=3.exp&amp;key=AIzaSyB6eNiHeZzBF7xL_lprgdJNABXsZZoUvmA&amp;language='.substr(get_locale(), 0, 2), array(), false, false);
		wp_enqueue_script('larue-gmap', get_template_directory_uri().'/framework/widgets/js/gmap.min.js',array(), '1.0' ,false);
	}

	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$address = isset($instance['address']) ? $instance['address'] : 'NY';
		$zoom = isset($instance['zoom']) ? $instance['zoom'] : '3';
		$map_id = substr( md5(rand()), 0, 7);
		$marker = "{
	      address: '".$address."',
	      draggable: true,
	      icon:'".get_template_directory_uri()."/images/mapmarker.png'
	    },";
		// ------
		echo $before_widget;
		if ( $title !='' ) echo $before_title . $title . $after_title;
		
		$output_script = "jQuery(document).ready(function($) {
			$('#".$map_id."').goMap({
				address: '".$address."',
				mapTypeControl: false,
				zoom: ".$zoom.",
				scrollwheel: false,
				scaleControl: false,
				navigationControl: false,
				maptype: 'roadmap',
				markers: [".$marker."]
			});
		});";
		wp_add_inline_script('larue-functions', $output_script);
		echo '<div class="map" id="'.esc_attr($map_id).'" style="height:165px;"></div><div class="located-at">'.esc_html__('Located at:','larue').'<span> '.esc_html($address).'</span></div>';
		echo $after_widget;
		// ------
	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance; 
		
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['zoom'] = $new_instance['zoom'];
		$instance['address'] = sanitize_text_field($new_instance['address']);
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => '', 'zoom' => '3', 'address' => 'NY');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" value="<?php echo esc_attr($instance['address']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('zoom')); ?>"><?php esc_html_e('Zoom:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('zoom')); ?>" name="<?php echo esc_attr($this->get_field_name('zoom')); ?>" value="<?php echo esc_attr($instance['zoom']); ?>" />
		</p>
		
    <?php }
}

// Add Widget
function widget_larue_map_init() {
	register_widget('widget_larue_map');
}
add_action('widgets_init', 'widget_larue_map_init');

?>