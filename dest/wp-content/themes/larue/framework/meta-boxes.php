<?php

/* ----------------------------------------------------- 
 * Post Slides Metabox
 * ----------------------------------------------------- */
if(class_exists( 'RWMB_Loader' )){
	add_filter( 'rwmb_meta_boxes', 'asw_framework_register_meta_boxes' );
	function asw_framework_register_meta_boxes($meta_boxes) {
	    $prefix = 'asw_';
		/* ----------------------------------------------------- */
		// Post Slides Metabox
		/* ----------------------------------------------------- */
		$meta_boxes[] = array(
			'id'		=> 'post_slides',
			'title'		=> esc_html__('Post Gallery','larue'),
			'pages'		=> array( 'post' ),
			'context' => 'normal',
			'fields'	=> array(
				array(
					'name'	=> esc_html__('Post Gallery Images','larue'),
					'desc'	=> esc_html__('Upload up to 30 project images for a slideshow - or only one to display a single image. Notice: The Preview Image will be the Image set as Featured Image.','larue'),
					'id'	=> $prefix . 'gallery_images',
					'type'	=> 'image_advanced',
					'max_file_uploads' => 30
				)

			)
		);
       $meta_boxes[] = array(
            'id'        => 'post_thumb_alt',
            'title'     => esc_html__('Alternative post thumbnail','larue'),
            'pages'     => array( 'post' ),
            'context' => 'side',
            'priority' => 'low',
            'fields'    => array(
                array(
                    'name'  => "",
                    'desc'  => "",
                    'id'    => $prefix . 'alternative_post_thumbnail',
                    'type'  => 'image_advanced',
                    'max_file_uploads' => 1
                )

            )
        );
        /* ----------------------------------------------------- */
        // Post Url Metabox
        /* ----------------------------------------------------- */
        $meta_boxes[] = array(
            'id'        => 'post_url',
            'title'     => esc_html__('Post Link', 'larue'),
            'pages'     => array( 'post' ),
            'context' => 'normal',
            'fields'    => array(
                array(
                    'name'  => esc_html__('URL','larue'),
                    'id'    => $prefix . 'post_url',
                    'type'  => 'text',
                    'size'  => '50'
                )
            )
        );
        /* ----------------------------------------------------- */
        // Post Quote Metabox
        /* ----------------------------------------------------- */
        $meta_boxes[] = array(
            'id'        => 'post_quote',
            'title'     => esc_html__('Post Quote','larue'),
            'pages'     => array( 'post' ),
            'context' => 'normal',
            'fields'    => array(
                array(
                    'name'      => esc_html__('Quote text','larue'),
                    'id'        => $prefix . 'quote_text',
                    'type'      => 'textarea'
                ),
                array(
                    'name'  => esc_html__('Cite','larue'),
                    'id'    => $prefix . 'quote_cite',
                    'type'  => 'text'
                )
            )
        );
        /* ----------------------------------------------------- */
        // Post Quote Metabox
        /* ----------------------------------------------------- */
        $meta_boxes[] = array(
            'id'        => 'post_image',
            'title'     => esc_html__('Post Image','larue'),
            'pages'     => array( 'post' ),
            'context' => 'normal',
            'fields'    => array(
                array(
                    'name'      => esc_html__('Post image layout:', 'larue'),
                    'desc'      => esc_html__('Select layout for image post type.', 'larue'),
                    'id'        => "{$prefix}post_image_layout",
                    'type'      => 'radio',
                    'std'       => 'side_image',
                    'options'   => array(
                        'side_image'      => __('Side image', 'larue'),
                        'fullwidth_image'       => __('Full-width image', 'larue')
                    )
                )
            )
        );
		return $meta_boxes;
	}
}
function asw_framework_additional_user_fields( $user ) {?>
    <h3><?php esc_html_e( 'User profile', 'larue' ); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_meta_image"><?php esc_html_e( 'Image for user avatar', 'larue' ); ?></label></th>
            <td>
                <!-- Outputs the image after save -->
                <img id="additional-user-image" src="<?php echo esc_url( get_the_author_meta( 'user_meta_image', $user->ID ) ); ?>" style="width:150px;"><br />
                <!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
                <input type="text" name="user_meta_image" id="user_meta_image" value="<?php echo esc_url_raw( get_the_author_meta( 'user_meta_image', $user->ID ) ); ?>" class="regular-text" />
                <!-- Outputs the save button -->
                <input type='button' class="additional-user-image button-primary" value="<?php esc_html_e( 'Upload Image', 'larue' ); ?>" id="uploadimage"/><br />
                <span class="description"><?php esc_html_e( 'Upload an additional image for your user profile.', 'larue' ); ?></span>
            </td>
        </tr>
        <tr>
            <th><h4><?php esc_html_e( 'User socials icons', 'larue' ); ?></h4></th>
            <td>
                <p>
                    <label for="user_facebook_url"><?php esc_html_e( 'Facebook:', 'larue' ); ?></label><br>
                    <input type="text" name="user_facebook_url" id="user_facebook_url" value="<?php echo esc_url_raw( get_the_author_meta( 'user_facebook_url', $user->ID ) ); ?>" class="regular-text" />
                </p>
                <p>
                    <label for="user_twitter_url"><?php esc_html_e( 'Twitter:', 'larue' ); ?></label><br>
                    <input type="text" name="user_twitter_url" id="user_twitter_url" value="<?php echo esc_url_raw( get_the_author_meta( 'user_twitter_url', $user->ID ) ); ?>" class="regular-text" />
                </p>
                <p>
                    <label for="user_pinterest_url"><?php esc_html_e( 'Pinterest:', 'larue' ); ?></label><br>
                    <input type="text" name="user_pinterest_url" id="user_pinterest_url" value="<?php echo esc_url_raw( get_the_author_meta( 'user_pinterest_url', $user->ID ) ); ?>" class="regular-text" />
                </p>
                <p>
                    <label for="user_instagram_url"><?php esc_html_e( 'Instagram:', 'larue' ); ?></label><br>
                    <input type="text" name="user_instagram_url" id="user_instagram_url" value="<?php echo esc_url_raw( get_the_author_meta( 'user_instagram_url', $user->ID ) ); ?>" class="regular-text" />
                </p>
                <p>
                    <label for="user_tumblr_url"><?php esc_html_e( 'Tumblr:', 'larue' ); ?></label><br>
                    <input type="text" name="user_tumblr_url" id="user_tumblr_url" value="<?php echo esc_url_raw( get_the_author_meta( 'user_tumblr_url', $user->ID ) ); ?>" class="regular-text" />
                </p>
                <p>
                    <label for="user_rss_show"><input type="checkbox" name="user_rss_show" id="user_rss_show" value="false" <?php checked( get_the_author_meta( 'user_rss_show', $user->ID ), 'false' ); ?> /><?php esc_html_e('Disable rss icon','larue'); ?></label>
            </p><br>
                <span class="description"><?php esc_html_e( 'Enter your socials links to user profile. Leave blank to hide icon.', 'larue' ); ?></span>
            </td>
        </tr>
    </table><!-- end form-table -->
<?php } // additional_user_fields
add_action( 'show_user_profile', 'asw_framework_additional_user_fields' );
add_action( 'edit_user_profile', 'asw_framework_additional_user_fields' );

function asw_framework_save_additional_user_meta( $user_id ) {
 
    // only saves if the current user can edit user profiles
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
 
    update_user_meta( $user_id, 'user_meta_image', $_POST['user_meta_image'] );
    update_user_meta( $user_id, 'user_facebook_url', $_POST['user_facebook_url'] );
    update_user_meta( $user_id, 'user_twitter_url', $_POST['user_twitter_url'] );
    update_user_meta( $user_id, 'user_pinterest_url', $_POST['user_pinterest_url'] );
    update_user_meta( $user_id, 'user_instagram_url', $_POST['user_instagram_url'] );
    update_user_meta( $user_id, 'user_tumblr_url', $_POST['user_tumblr_url'] );
    update_user_meta( $user_id, 'user_rss_show', $_POST['user_rss_show'] );
}
 
add_action( 'personal_options_update', 'asw_framework_save_additional_user_meta' );
add_action( 'edit_user_profile_update', 'asw_framework_save_additional_user_meta' );
function asw_framework_user_photo_scripts($hook) {
	if($hook == 'profile.php' || $hook == 'user-edit.php'){
    	wp_enqueue_media(); 
    	wp_enqueue_script('AuthorPhoto', get_template_directory_uri() . '/js/author.photo.js', array('jquery'), '1.0.0');
    } else {
        return false;
    }
}
add_action('admin_enqueue_scripts', 'asw_framework_user_photo_scripts');
function asw_framework_get_attachment_image_by_url( $url ) {
 
    // Split the $url into two parts with the wp-content directory as the separator.
    $parse_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );
 
    // Get the host of the current site and the host of the $url, ignoring www.
    $this_host = str_ireplace( 'www.', '', parse_url( home_url('/'), PHP_URL_HOST ) );
    $file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );
 
    // Return nothing if there aren't any $url parts or if the current host and $url host do not match.
    if ( !isset( $parse_url[1] ) || empty( $parse_url[1] ) || ( $this_host != $file_host ) ) {
        return;
    }
 
    // Now we're going to quickly search the DB for any attachment GUID with a partial path match.
    // Example: /uploads/2013/05/test-image.jpg
    global $wpdb;
 
    $prefix     = $wpdb->prefix;
    $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM " . $prefix . "posts WHERE guid RLIKE %s;", $parse_url[1] ) );
 
    // Returns null if no attachment is found.
    return $attachment[0];
}
function asw_framework_get_additional_user_meta_thumb($user_id='', $size = 'thumbnail') {
 	global $post;
 	if($user_id == ''){
 		$user_id = $post->post_author;
 	}
    $attachment_url = esc_url( get_the_author_meta( 'user_meta_image', $user_id ) );
 
     // grabs the id from the URL using Frankie Jarretts function
    $attachment_id = asw_framework_get_attachment_image_by_url( $attachment_url );
 
    // retrieve the thumbnail size of our image
    $image_thumb = wp_get_attachment_image_src( $attachment_id, $size );
 
    // return the image thumbnail
    return $image_thumb[0];
 
}
if(!function_exists('larue_meta_header_compatible')){
	function larue_meta_header_compatible(){
		if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) {
			echo('<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">');
		}
	}
	add_action( 'wp_head', 'larue_meta_header_compatible', 12 );
}