<?php


class widget_socials extends WP_Widget { 
	
	// Widget Settings
	function widget_socials() {
		$widget_ops = array('description' => esc_html__('Display your Socials icons', 'larue') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'socials' );
		$this->__construct( 'socials', esc_html__('asw-Socials', 'larue'), $widget_ops, $control_ops );
	}
	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		// ------
		echo $before_widget;
		if ( $title != '' ) echo $before_title . $title . $after_title;
		?>
		<div class="social-icons">
			<ul class="unstyled">
			<?php 
			$output='';
			if($instance['facebook'] != "") { 
				echo '<li class="social-facebook"><a href="'.esc_url($instance['facebook']).'" target="_blank" title="'.esc_html__( 'Facebook', 'larue').'"><i class="fa fa-facebook"></i></a></li>';
			}
			if($instance['twitter'] != "") { 
				echo '<li class="social-twitter"><a href="'.esc_url($instance['twitter']).'" target="_blank" title="'.esc_html__( 'Twitter', 'larue').'"><i class="fa fa-twitter"></i></a></li>';
			} 	 
			if($instance['instagram'] != '') { 
				echo '<li class="social-instagram"><a href="'.esc_url($instance['instagram']).'" target="_blank" title="'.esc_html__( 'Instagram', 'larue').'"><i class="fa fa-instagram"></i></a></li>';
			}
			if($instance['pinterest'] != "") { 
				echo '<li class="social-pinterest"><a href="'.esc_url($instance['pinterest']).'" target="_blank" title="'.esc_html__( 'Pinterest', 'larue').'"><i class="fa fa-pinterest-p"></i></a></li>';
			}
			if($instance['googleplus'] != "") { 
				echo '<li class="social-googleplus"><a href="'.esc_url($instance['googleplus']).'" target="_blank" title="'.esc_html__( 'Google plus', 'larue').'"><i class="fa fa-google-plus"></i></a></li>';
			}
			if($instance['forrst'] != "") { 
				echo '<li class="social-forrst"><a href="'.esc_url($instance['forrst']).'" target="_blank" title="'.esc_html__( 'Forrst', 'larue').'"><i class="fa icon-forrst"></i></a></li>';
			}
			if($instance['dribbble'] != "") { 
				echo '<li class="social-dribbble"><a href="'.esc_url($instance['dribbble']).'" target="_blank" title="'.esc_html__( 'Dribbble', 'larue').'"><i class="fa fa-dribbble"></i></a></li>';
			}
			if($instance['flickr'] != "") { 
				echo '<li class="social-flickr"><a href="'.esc_url($instance['flickr']).'" target="_blank" title="'.esc_html__( 'Flickr', 'larue').'"><i class="fa fa-flickr"></i></a></li>';
			}
			if($instance['linkedin'] != "") { 
				echo '<li class="social-linkedin"><a href="'.esc_url($instance['linkedin']).'" target="_blank" title="'.esc_html__( 'LinkedIn', 'larue').'"><i class="fa fa-linkedin"></i></a></li>';
			}
			if($instance['skype'] != "") { 
				echo '<li class="social-skype"><a href="skype:'.esc_attr($instance['skype']).'" title="'.esc_html__( 'Skype', 'larue').'"><i class="fa fa-skype"></i></a></li>';
			}
			if($instance['digg'] != "") { 
				echo '<li class="social-digg"><a href="'.esc_url($instance['digg']).'" target="_blank" title="'.esc_html__( 'Digg', 'larue').'"><i class="fa fa-digg"></i></a></li>';
			}
			if($instance['vimeo'] != "") { 
				echo '<li class="social-vimeo"><a href="'.esc_url($instance['vimeo']).'" target="_blank" title="'.esc_html__( 'Vimeo', 'larue').'"><i class="fa fa-vimeo-square"></i></a></li>';
			}
			if($instance['yahoo'] != "") { 
				echo '<li class="social-yahoo"><a href="'.esc_url($instance['yahoo']).'" target="_blank" title="'.esc_html__( 'Yahoo', 'larue').'"><i class="fa fa-yahoo"></i></a></li>';
			}
			if($instance['tumblr'] != "") { 
				echo '<li class="social-tumblr"><a href="'.esc_url($instance['tumblr']).'" target="_blank" title="'.esc_html__( 'Tumblr', 'larue').'"><i class="fa fa-tumblr"></i></a></li>';
			}
			if($instance['youtube'] != "") { 
				echo '<li class="social-youtube"><a href="'.esc_url($instance['youtube']).'" target="_blank" title="'.esc_html__( 'YouTube', 'larue').'"><i class="fa fa-youtube"></i></a></li>';
			}
			if($instance['deviantart'] != "") { 
				echo '<li class="social-deviantart"><a href="'.esc_url($instance['deviantart']).'" target="_blank" title="'.esc_html__( 'DeviantArt', 'larue').'"><i class="fa fa-deviantart"></i></a></li>';
			}
			if($instance['behance'] != "") { 
				echo '<li class="social-behance"><a href="'.esc_url($instance['behance']).'" target="_blank" title="'.esc_html__( 'Behance', 'larue').'"><i class="fa fa-behance"></i></a></li>';
			}
			if($instance['delicious'] != "") { 
				echo '<li class="social-delicious"><a href="'.esc_url($instance['delicious']).'" target="_blank" title="'.esc_html__( 'Delicious', 'larue').'"><i class="fa fa-delicious"></i></a></li>';
			} 
			?>
			</ul>
		</div>
		<?php
		echo $after_widget;
		// ------
	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance; 
		
		$instance['title'] = $new_instance['title'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['instagram'] = $new_instance['instagram'];
		$instance['googleplus'] = $new_instance['googleplus'];
		$instance['forrst'] = $new_instance['forrst'];
		$instance['dribbble'] = $new_instance['dribbble'];
		$instance['flickr'] = $new_instance['flickr'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['skype'] = $new_instance['skype'];
		$instance['digg'] = $new_instance['digg'];
		$instance['vimeo'] = $new_instance['vimeo'];
		$instance['yahoo'] = $new_instance['yahoo'];
		$instance['tumblr'] = $new_instance['tumblr'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['deviantart'] = $new_instance['deviantart'];
		$instance['behance'] = $new_instance['behance'];
		$instance['vk'] = $new_instance['vk'];
		$instance['delicious'] = $new_instance['delicious'];

		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array(
			'title' => '', 
			'facebook'=> '#', 
			'twitter'=>'#', 
			'pinterest'=>'#', 
			'instagram'=>'#', 
			'googleplus'=>'', 
			'forrst'=>'', 
			'dribbble'=>'', 
			'flickr'=>'', 
			'linkedin'=>'', 
			'skype'=>'', 
			'digg'=>'', 
			'vimeo'=>'', 
			'yahoo'=>'', 
			'tumblr'=>'#', 
			'youtube'=>'', 
			'deviantart'=>'',
			'behance'=>'',
			'vk'=>'',
			'delicious'=>''
		);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" value="<?php echo esc_attr($instance['facebook']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Twitter url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" value="<?php echo esc_attr($instance['twitter']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e('Pinterest url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" value="<?php echo esc_attr($instance['pinterest']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e('Instagram url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" value="<?php echo esc_attr($instance['instagram']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('googleplus')); ?>"><?php esc_html_e('Google plus url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('googleplus')); ?>" name="<?php echo esc_attr($this->get_field_name('googleplus')); ?>" value="<?php echo esc_attr($instance['googleplus']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('forrst')); ?>"><?php esc_html_e('Forrst url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('forrst')); ?>" name="<?php echo esc_attr($this->get_field_name('forrst')); ?>" value="<?php echo esc_attr($instance['forrst']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('dribbble')); ?>"><?php esc_html_e('Dribbble url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('dribbble')); ?>" name="<?php echo esc_attr($this->get_field_name('dribbble')); ?>" value="<?php echo esc_attr($instance['dribbble']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>"><?php esc_html_e('Flickr url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" value="<?php echo esc_attr($instance['flickr']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e('Linkedin url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" value="<?php echo esc_attr($instance['linkedin']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('skype')); ?>"><?php esc_html_e('Skype account:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('skype')); ?>" name="<?php echo esc_attr($this->get_field_name('skype')); ?>" value="<?php echo esc_attr($instance['skype']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('digg')); ?>"><?php esc_html_e('Digg url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('digg')); ?>" name="<?php echo esc_attr($this->get_field_name('digg')); ?>" value="<?php echo esc_attr($instance['digg']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>"><?php esc_html_e('Vimeo url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" value="<?php echo esc_attr($instance['vimeo']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('yahoo')); ?>"><?php esc_html_e('Yahoo url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('yahoo')); ?>" name="<?php echo esc_attr($this->get_field_name('yahoo')); ?>" value="<?php echo esc_attr($instance['yahoo']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php esc_html_e('Tumblr url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" value="<?php echo esc_attr($instance['tumblr']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e('Youtube url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" value="<?php echo esc_attr($instance['youtube']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('deviantart')); ?>"><?php esc_html_e('Deviantart url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('deviantart')); ?>" name="<?php echo esc_attr($this->get_field_name('deviantart')); ?>" value="<?php echo esc_attr($instance['deviantart']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('behance')); ?>"><?php esc_html_e('Behance url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('behance')); ?>" name="<?php echo esc_attr($this->get_field_name('behance')); ?>" value="<?php echo esc_attr($instance['behance']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('vk')); ?>"><?php esc_html_e('VKontakte url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('vk')); ?>" name="<?php echo esc_attr($this->get_field_name('vk')); ?>" value="<?php echo esc_attr($instance['vk']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('delicious')); ?>"><?php esc_html_e('Delicious url:','larue'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('delicious')); ?>" name="<?php echo esc_attr($this->get_field_name('delicious')); ?>" value="<?php echo esc_attr($instance['delicious']); ?>" />
		</p>
    <?php }
}

// Add Widget
function widget_socials_init() {
	register_widget('widget_socials');
}
add_action('widgets_init', 'widget_socials_init');

?>