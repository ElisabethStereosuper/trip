<div class="social-icons">
	<ul class="unstyled">
	<?php 

	if(get_theme_mod('asw_social_facebook', '') != "") { 
		echo '<li class="social-facebook"><a href="'.esc_url(get_theme_mod('asw_social_facebook', '')).'" target="_blank" title="'.esc_html__( 'Facebook', 'larue').'"><i class="fa fa-facebook"></i></a></li>';
	}
	if(get_theme_mod('asw_social_twitter', '') != "") { 
		echo '<li class="social-twitter"><a href="'.esc_url(get_theme_mod('asw_social_twitter', '')).'" target="_blank" title="'.esc_html__( 'Twitter', 'larue').'"><i class="fa fa-twitter"></i></a></li>';
	} 	 
	if(get_theme_mod('asw_social_instagram', '') != '') { 
		echo '<li class="social-instagram"><a href="'.esc_url(get_theme_mod('asw_social_instagram', '')).'" target="_blank" title="'.esc_html__( 'Instagram', 'larue').'"><i class="fa fa-instagram"></i></a></li>';
	}
	if(get_theme_mod('asw_social_pinterest', '') != "") { 
		echo '<li class="social-pinterest"><a href="'.esc_url(get_theme_mod('asw_social_pinterest', '')).'" target="_blank" title="'.esc_html__( 'Pinterest', 'larue').'"><i class="fa fa-pinterest-p"></i></a></li>';
	}
	if(get_theme_mod('asw_social_google_plus', '') != "") { 
		echo '<li class="social-googleplus"><a href="'.esc_url(get_theme_mod('asw_social_google_plus', '')).'" target="_blank" title="'.esc_html__( 'Google plus', 'larue').'"><i class="fa fa-google-plus"></i></a></li>';
	}
	if(get_theme_mod('asw_social_forrst', '') != "") { 
		echo '<li class="social-forrst"><a href="'.esc_url(get_theme_mod('asw_social_forrst', '')).'" target="_blank" title="'.esc_html__( 'Forrst', 'larue').'"><i class="fa icon-forrst"></i></a></li>';
	}
	if(get_theme_mod('asw_social_dribbble', '') != "") { 
		echo '<li class="social-dribbble"><a href="'.esc_url(get_theme_mod('asw_social_dribbble', '')).'" target="_blank" title="'.esc_html__( 'Dribbble', 'larue').'"><i class="fa fa-dribbble"></i></a></li>';
	}
	if(get_theme_mod('asw_social_flickr', '') != "") { 
		echo '<li class="social-flickr"><a href="'.esc_url(get_theme_mod('asw_social_flickr', '')).'" target="_blank" title="'.esc_html__( 'Flickr', 'larue').'"><i class="fa fa-flickr"></i></a></li>';
	}
	if(get_theme_mod('asw_social_linkedin', '') != "") { 
		echo '<li class="social-linkedin"><a href="'.esc_url(get_theme_mod('asw_social_linkedin', '')).'" target="_blank" title="'.esc_html__( 'LinkedIn', 'larue').'"><i class="fa fa-linkedin"></i></a></li>';
	}
	if(get_theme_mod('asw_social_skype', '') != "") { 
		echo '<li class="social-skype"><a href="skype:'.esc_attr(get_theme_mod('asw_social_skype', '')).'" title="'.esc_html__( 'Skype', 'larue').'"><i class="fa fa-skype"></i></a></li>';
	}
	if(get_theme_mod('asw_social_digg', '') != "") { 
		echo '<li class="social-digg"><a href="'.esc_url(get_theme_mod('asw_social_digg', '')).'" target="_blank" title="'.esc_html__( 'Digg', 'larue').'"><i class="fa fa-digg"></i></a></li>';
	}
	if(get_theme_mod('asw_social_vimeo', '') != "") { 
		echo '<li class="social-vimeo"><a href="'.esc_url(get_theme_mod('asw_social_vimeo', '')).'" target="_blank" title="'.esc_html__( 'Vimeo', 'larue').'"><i class="fa fa-vimeo-square"></i></a></li>';
	}
	if(get_theme_mod('asw_social_yahoo', '') != "") { 
		echo '<li class="social-yahoo"><a href="'.esc_url(get_theme_mod('asw_social_yahoo', '')).'" target="_blank" title="'.esc_html__( 'Yahoo', 'larue').'"><i class="fa fa-yahoo"></i></a></li>';
	}
	if(get_theme_mod('asw_social_tumblr', '') != "") { 
		echo '<li class="social-tumblr"><a href="'.esc_url(get_theme_mod('asw_social_tumblr', '')).'" target="_blank" title="'.esc_html__( 'Tumblr', 'larue').'"><i class="fa fa-tumblr"></i></a></li>';
	}
	if(get_theme_mod('asw_social_youtube', '') != "") { 
		echo '<li class="social-youtube"><a href="'.esc_url(get_theme_mod('asw_social_youtube', '')).'" target="_blank" title="'.esc_html__( 'YouTube', 'larue').'"><i class="fa fa-youtube"></i></a></li>';
	}
	if(get_theme_mod('asw_social_deviantart', '') != "") { 
		echo '<li class="social-deviantart"><a href="'.esc_url(get_theme_mod('asw_social_deviantart', '')).'" target="_blank" title="'.esc_html__( 'DeviantArt', 'larue').'"><i class="fa fa-deviantart"></i></a></li>';
	}
	if(get_theme_mod('asw_social_behance', '') != "") { 
		echo '<li class="social-behance"><a href="'.esc_url(get_theme_mod('asw_social_behance', '')).'" target="_blank" title="'.esc_html__( 'Behance', 'larue').'"><i class="fa fa-behance"></i></a></li>';
	}
	if(get_theme_mod('asw_social_paypal', '') != "") { 
		echo '<li class="social-paypal"><a href="'.esc_url(get_theme_mod('asw_social_paypal', '')).'" target="_blank" title="'.esc_html__( 'PayPal', 'larue').'"><i class="fa fa-paypal"></i></a></li>';
	}
	if(get_theme_mod('asw_social_delicious', '') != "") { 
		echo '<li class="social-delicious"><a href="'.esc_url(get_theme_mod('asw_social_delicious', '')).'" target="_blank" title="'.esc_html__( 'Delicious', 'larue').'"><i class="fa fa-delicious"></i></a></li>';
	}
	if(get_theme_mod('asw_social_rss', false)) { 
		echo '<li class="social-rss"><a href="'.esc_url(get_bloginfo('rss2_url')).'" target="_blank" title="'.esc_html__( 'RSS', 'larue').'"><i class="fa fa-rss"></i></a></li>';
	} 

	?>
	</ul>
</div>