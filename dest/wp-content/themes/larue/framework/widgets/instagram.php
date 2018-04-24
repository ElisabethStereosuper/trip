<?php

class widget_instagram extends WP_Widget { 
	
	// Widget Settings
	function widget_instagram() {
		$widget_ops = array('description' => esc_html__('Display your latest Instagram Photos', 'larue') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'instagram' );
		$this->__construct( 'instagram', esc_html__('asw-Instagram', 'larue'), $widget_ops, $control_ops );
	}
	/** @see WP_Widget::widget */
	function widget($args, $instance) {		
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$accessToken = apply_filters('access_token', $instance['access_token']);
		$pics = apply_filters('pics', $instance['pics']);
		$pics_per_row = apply_filters('pics_per_row', $instance['pics_per_row']);
		$suf = rand(1,999);
		$row_class='';	
		echo $before_widget; 
		if ( $title !='' )	echo $before_title . $title . $after_title;
	    // get remote data
	    $result = wp_remote_get( "https://api.instagram.com/v1/users/self/media/recent/?access_token={$accessToken}&count={$pics}" );
	    $result = json_decode( $result['body'] );

	    if ( is_wp_error( $result ) ) {
	        // error handling
	        $error_message = $result->get_error_message();
	        echo "Something went wrong: ".$error_message;

	    } elseif( isset($result->meta->error_message) ) {
	    	echo "Something went wrong: ".$result->meta->error_message;

	    } else {
	        // processing further
	        $main_data = array();
	        //print_r($result);
	        $username = '';
	        $n         = 0;
	        switch ($pics_per_row) {
	        	case '1':
	        		$row_class='span12';
	        		break;
	        	case '2':
	        		$row_class='span6';
	        		break;
	        	case '4':
	        		$row_class='span3';
	        		break;
	        	case '6':
	        		$row_class='span2';
	        		break;
	        	case '7':
	        		$row_class='one_seventh';
	        		break;
	        	default:
	        		$row_class='span4';
	        		break;
	        }
	        // get username and actual thumbnail
	        foreach ( $result->data as $d ) {
	        	$username = $d->user->username;
	            $main_data[ $n ]['user']      = $d->user->username;
	            $main_data[ $n ]['thumbnail'] = $d->images->low_resolution->url;
	            $main_data[ $n ]['full'] = $d->images->standard_resolution->url;
	            $main_data[ $n ]['caption'] = isset($d->caption->text) ? $d->caption->text : '';
	            $n++;
	        }

	        // create main string, pictures embedded in links
	        echo '<div class="instagram-items">';
	        foreach ( $main_data as $data ) {
	            echo '<div class="'.$row_class.' instagram-item"><a href="'.esc_url($data['full']).'" data-rel="lightbox-insta" data-caption="'.esc_attr($data['caption']).'"><img src="'.esc_url($data['thumbnail']).'" alt="'.esc_attr($data['user']).' pictures"></a></div>';
	        }
	        echo "</div>";
	    }
		echo $after_widget; 
	}
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance; 
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['access_token'] = strip_tags( $new_instance['access_token'] );
		$instance['pics'] = strip_tags( $new_instance['pics'] );
		$instance['pics_per_row'] = strip_tags( $new_instance['pics_per_row'] );
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array( 'title' => 'Instagram Widget', 'pics' => '6', 'access_token' => '', 'pics_per_row' => '3' ); // Default Values
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">Widget Title:</label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'access_token' )); ?>">Access Token:</label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'access_token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'access_token' )); ?>" value="<?php echo esc_attr($instance['access_token']); ?>" /><br /><?php esc_html_e('How to get your Access Token read this','larue'); ?> <a target="_blank" href="http://jelled.com/instagram/access-token">http://jelled.com/instagram/access-token</a>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'pics' )); ?>">Number of Items:</label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pics' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pics' )); ?>" value="<?php echo esc_attr($instance['pics']); ?>" />
		</p>
		<p>
		<?php 
			$selected2 = '';
			$selected3 = '';
			$selected4 = '';
			$selected5 = '';
			$selected6 = '';
			$selected7 = '';
			if(isset($instance['pics_per_row'])){
				switch ($instance['pics_per_row']) {
					case '1':
						$selected6 = 'selected="selected"';
						break;
					case '2':
						$selected2 = 'selected="selected"';
						break;
					case '3':
						$selected3 = 'selected="selected"';
						break;
					case '4':
						$selected4 = 'selected="selected"';
						break;
					case '6':
						$selected5 = 'selected="selected"';
						break;
					case '7':
						$selected7 = 'selected="selected"';
						break;
				}
			} ?>
			<label for="<?php echo esc_attr($this->get_field_id( 'pics_per_row' )); ?>">Number of Items:</label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pics_per_row' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pics_per_row' )); ?>">
				<option value="1" <?php echo esc_attr($selected6); ?>>One item per row</option>
				<option value="2" <?php echo esc_attr($selected2); ?>>Two items per row</option>
				<option value="3" <?php echo esc_attr($selected3); ?>>Three items per row</option>
				<option value="4" <?php echo esc_attr($selected4); ?>>Four items per row</option>
				<option value="6" <?php echo esc_attr($selected5); ?>>Six items per row</option>
				<option value="7" <?php echo esc_attr($selected7); ?>>Seven items per row</option>
			</select>
		</p>
    <?php }
}

// Add Widget
function widget_instagram_init() {
	register_widget('widget_instagram');
}
add_action('widgets_init', 'widget_instagram_init');

?>