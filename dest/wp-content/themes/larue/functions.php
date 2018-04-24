<?php 
/* ------------------------------------------------------------------------ */
/* Translation
/* Translations can be filed in the framework/languages/ directory */

load_theme_textdomain( 'larue', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable($locale_file) ){

	require_once( trailingslashit( $locale_file ) );
}

require_once( trailingslashit( get_template_directory() ). 'framework/customizer/customizer.php' ); // Enqueue JavaScripts & CSS
require_once( trailingslashit( get_template_directory() ). 'framework/inc/customcss.php' ); // Dinmic styles load
require_once( trailingslashit( get_template_directory() ). 'framework/inc/sidebars.php' ); // register widgets area
require_once( trailingslashit( get_template_directory() ). 'framework/inc/sidebar-generator.php' ); // add custom sidebars
/*-widgets include -*/
require_once( trailingslashit( get_template_directory() ). 'framework/widgets/socials.php' ); // add socials widget
require_once( trailingslashit( get_template_directory() ). 'framework/widgets/aboutme.php' ); // add aboutMe widget
require_once( trailingslashit( get_template_directory() ). 'framework/widgets/latestposts.php' ); // add latest posts widget
require_once( trailingslashit( get_template_directory() ). 'framework/widgets/instagram.php' ); // add instagram widget
require_once( trailingslashit( get_template_directory() ). 'framework/widgets/map.php' ); // add map widget
require_once( trailingslashit( get_template_directory() ). 'framework/widgets/sliderposts.php' ); // add map widget

/* Include Meta Boxes */
require_once( trailingslashit( get_template_directory() ). 'framework/meta-boxes.php' );

function larue_scripts_basic() {  
    wp_register_script('owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.0.0', TRUE);
	if( is_single() || is_home() ) {
		wp_enqueue_script('owl.carousel');
	}
	wp_enqueue_script('imageLightbox', get_template_directory_uri() . '/js/imageLightbox.min.js', array('jquery'), '1.0', TRUE);
	wp_enqueue_script('dlmenu', get_template_directory_uri() . '/js/jquery.dlmenu.js', array('jquery'), '1.0.1', true);
	wp_enqueue_script('jquery-isotope', get_template_directory_uri() . '/js/isotope.min.js', array('jquery'), '3.0.0', true);
	wp_enqueue_script('larue-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '1.0', TRUE);
}
add_action( 'wp_enqueue_scripts', 'larue_scripts_basic', 11 );

function larue_styles_basic()  
{  
	/* ------------------------------------------------------------------------ */
	/* Register Stylesheets */
	/* ------------------------------------------------------------------------ */
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/framework/fonts/font-awesome/css/font-awesome.min.css', array(), '4.6.3', 'all' );
	wp_enqueue_style( 'linea-icons', get_template_directory_uri() . '/framework/fonts/linea/styles.css', array(), '1.0', 'all' );
	wp_register_style( 'owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '2.0.0', 'all' );
	if( is_single() || is_home() ) {
		wp_enqueue_style( 'owl.carousel' );
	}
	wp_enqueue_style( 'dlmenu', get_template_directory_uri() . '/css/dlmenu.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'larue-basic', get_template_directory_uri() . '/css/basic.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'larue-skeleton', get_template_directory_uri() . '/css/grid.css', array(), '1', 'all' );
	wp_enqueue_style( 'imageLightbox', get_template_directory_uri() . '/css/imageLightbox.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'larue-stylesheet', get_template_directory_uri() .'/style.css', array(), '1.0', 'all' );
	if( get_theme_mod('asw_responsiveness', true) ) {
		wp_enqueue_style( 'larue-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0', 'all' );
	}
}  
add_action( 'wp_enqueue_scripts', 'larue_styles_basic', 1 );

function larue_admin_enqueue($hook_suffix) {
   if( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) {
     wp_enqueue_script( 'larue-post-edit', get_template_directory_uri() . '/js/postEdit.js', array( 'jquery' ));
  }
}
add_action( 'admin_enqueue_scripts', 'larue_admin_enqueue' );

if(!function_exists('larue_enqueue_comments_reply')){
	function larue_enqueue_comments_reply(){
		wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'comment_form_before', 'larue_enqueue_comments_reply' );
}
/* Add Custom Primary Navigation */
if(!function_exists('larue_register_custom_menu')){
	add_action('init', 'larue_register_custom_menu');
	function larue_register_custom_menu() {
		register_nav_menu('main_navigation', esc_html__('Main Navigation','larue'));
		register_nav_menu('topbar_navigation', esc_html__('Top Bar Navigation','larue'));
		register_nav_menu('footer_navigation', esc_html__('Footer Navigation','larue'));
	}
}
if(!function_exists('larue_string_limit_words')){
	function larue_string_limit_words($string, $word_limit)
	{
	  $string = strip_tags($string, '<p>');
	  $words = explode(' ', $string, ($word_limit + 1));
	  if(count($words) > $word_limit)
	    array_pop($words);
	  return implode(' ', $words);
	}
}
if(!function_exists('larue_theme_setup')){
	function larue_theme_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support('post-formats', array('image', 'gallery', 'video', 'audio', 'quote', 'link'));
		set_post_thumbnail_size( '800', '500', true );
		add_image_size('larue-masonry', 800, 9999, false);
		add_image_size('larue-fullwidth-slider', 1200, 362, true);
		add_image_size('larue-470x500', 470, 500, true);

		update_option( 'thumbnail_size_w', 160 );
		update_option( 'thumbnail_size_h', 160 );
		update_option( 'thumbnail_crop', 1 );

		update_option( 'medium_size_w', 470 );
		update_option( 'medium_size_h', 410 );
		update_option( 'medium_crop', 1 );

		update_option( 'large_size_w', 1170 );
		update_option( 'large_size_h', 730 );
		update_option( 'large_crop', 1 );
	}
	add_action( 'after_setup_theme', 'larue_theme_setup' );
}
if(!function_exists('larue_custom_excerpt_length')){
	function larue_custom_excerpt_length( $length ) {
	    return 30;
	}
	add_filter( 'excerpt_length', 'larue_custom_excerpt_length', 999 );
}
if(!function_exists('larue_post_gallery')){
	function larue_post_gallery($postID){
		$images = rwmb_meta('asw_gallery_images', 'type=image&size=larue-masonry', $postID );
		$out = '';
		if ( !empty($images) ){
			$count = count($images) > 4 ? '4' : count($images);	
			$out .= '<div class="post-gallery gallery-count-'.$count.'">';
			$size = 1;
			foreach( $images as $image ) :
				if($count < 2) {
					$img_url = wp_get_attachment_image_src($image['ID'], 'post-thumbnail');
					$image_url = $img_url[0];
				} else {
					$image_url = $image['url'];
				}
				$out .='<div class="item-size size'.$size++.'"><a href="'.esc_url($image['full_url']).'" data-rel="lightbox-gallery" data-caption="'.esc_attr($image['caption']).'"><img src="'.esc_url($image_url).'" alt="'.esc_attr($image['alt']).'" /></a></div>';
			endforeach;
			$out .= '</div>';
		} else {
			if( has_post_thumbnail() ) {
				$out .='<figure class="post-img"><a href="'.esc_url(get_the_permalink()).'" rel="bookmark">'.get_the_post_thumbnail( $postID, 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ).'</a></figure>';
			}
		}
		return $out;
	}
}
if( !function_exists('larue_single_post_gallery') ){
	function larue_single_post_gallery( $postID ) {
		$images = rwmb_meta( 'asw_gallery_images', 'type=image&size=post-thumbnail', $postID);
		$out = '';
		if ( !empty($images) ){
			$out .= '<div class="single-post-gallery">';
			foreach( $images as $image ) :
				$out .= '<div><a href="'.esc_url($image['full_url']).'" data-rel="lightbox-gallery" data-caption="'.esc_attr($image['caption']).'"><img src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" /></a></div>';
			endforeach;
			$out .= '</div>';	
		} else {
			if( has_post_thumbnail() ) {
				$out .= '<figure class="post-img">'.get_the_post_thumbnail($postID).'</figure>';
			} 
		}
		return $out;
	}
}

if( !function_exists('larue_single_post_quote') ){
	function larue_single_post_quote( $postID ) {
		$quote_text = rwmb_meta( 'asw_quote_text', $postID);
		$quote_cite = rwmb_meta( 'asw_quote_cite', $postID);
		$out = '';
		if ( isset($quote_text) && $quote_text != '' ){
			$out .= '<blockquote class="single-post-quote">';
			$out .= esc_html($quote_text);
			if(isset($quote_cite) && $quote_cite != '') $out .= '<span class="cite">- '.esc_html($quote_cite).'</span>';
			$out .= '</blockquote>';	
		}
		
		return $out;
	}
}
if( !function_exists('larue_single_post_link') ){
	function larue_single_post_link( $postID ) {
		$text_url = rwmb_meta( 'asw_post_url', $postID);
		$out = '';
		if ( isset($text_url) && $text_url != '' ){
			$out .= '<div class="single-post-link">';
			$out .= '<a href="'.esc_url($text_url).'" class="post-link-item">'.esc_url($text_url).'</a>';
			if( has_post_thumbnail() ) {
				$out .= '<figure class="post-img">'.get_the_post_thumbnail($postID).'</figure>';
			}
			$out .= '</div>';	
		}
		
		return $out;
	}
}

if( !function_exists('larue_get_user_socials') ){
	function larue_get_user_socials($user_id='') {
	 	global $post;
	 	if($user_id == ''){
	 		$user_id = $post->post_author;
	 	}
	    $facebook = get_the_author_meta( 'user_facebook_url', $user_id );
	    $twitter = get_the_author_meta( 'user_twitter_url', $user_id );
	    $pinterest = get_the_author_meta( 'user_pinterest_url', $user_id );
	    $instagram = get_the_author_meta( 'user_instagram_url', $user_id );
	    $tumblr = get_the_author_meta( 'user_tumblr_url', $user_id );
	    $rss_feed = get_author_feed_link($user_id, '');
	    $user_rss_show = get_the_author_meta( 'user_rss_show', $user_id );
	    if($facebook != "" || $twitter != "" || $pinterest != "" || $instagram != '' || $tumblr != "") $output = '<div class="social-icons"><ul class="unstyled">';
		if($facebook != "") { 
			$output .= '<li class="social-facebook"><a href="'.esc_url($facebook).'" target="_blank" title="'.esc_html__( 'Facebook', 'larue').'"><i class="fa fa-facebook"></i></a></li>';
		}
		if($twitter != "") { 
			$output .= '<li class="social-twitter"><a href="'.esc_url($twitter).'" target="_blank" title="'.esc_html__( 'Twitter', 'larue').'"><i class="fa fa-twitter"></i></a></li>';
		}
		if($pinterest != "") { 
			$output .= '<li class="social-pinterest"><a href="'.esc_url($pinterest).'" target="_blank" title="'.esc_html__( 'Pinterest', 'larue').'"><i class="fa fa-pinterest-p"></i></a></li>';
		}
		if($instagram != '') { 
			$output .= '<li class="social-instagram"><a href="'.esc_url($instagram).'" target="_blank" title="'.esc_html__( 'Instagram', 'larue').'"><i class="fa fa-instagram"></i></a></li>';
		}
		if($tumblr != "") { 
			$output .= '<li class="social-tumblr"><a href="'.esc_url($tumblr).'" target="_blank" title="'.esc_html__( 'Tumblr', 'larue').'"><i class="fa fa-tumblr"></i></a></li>';
		}
		if($user_rss_show != 'false') { 
			$output .= '<li class="social-rss"><a href="'.esc_url($rss_feed).'" target="_blank" title="'.esc_html__( 'RSS', 'larue').'"><i class="fa fa-rss"></i></a></li>';
		} 
	    if($facebook != "" || $twitter != "" || $pinterest != "" || $instagram != '' || $tumblr != "") $output .= '</ul></div>';
	    
		return $output;
	}
}
if(!function_exists('larue_modify_excerpt')){
	add_filter('excerpt_more', 'larue_modify_excerpt');
	function larue_modify_excerpt() {
		return '...';
	}
}
if(!function_exists('larue_modify_read_more_link')){
	add_filter( 'the_content_more_link', 'larue_modify_read_more_link' );
	function larue_modify_read_more_link() {
		if( is_sticky() ){
			return '...';
		} else {
			return '<a href="'.esc_attr(get_the_permalink()).'" class="readmore" rel="bookmark">'.esc_html__('Continue reading', 'larue').'</a>';
		}
	}
}
/* Pagination */
if(!function_exists('larue_next_posts_link_attributes')){
	add_filter('next_posts_link_attributes', 'larue_next_posts_link_attributes');
	function larue_next_posts_link_attributes() {
	    return 'class="next"';
	}
}
if(!function_exists('larue_prev_posts_link_attributes')){
	add_filter('previous_posts_link_attributes', 'larue_prev_posts_link_attributes');
	function larue_prev_posts_link_attributes() {
	    return 'class="previous"';

	}
}
if(!function_exists('rwmb_meta')){
	function rwmb_meta($key) {
		return get_post_meta(get_the_ID(), $key);
	}
}
if(!function_exists('larue_custom_pagination')){
  function larue_custom_pagination($pages = '', $range = 4) {
    $showitems = ($range * 2)+1;
    $out ='';
    global $paged;
    if(empty($paged)) $paged = 1;
    
    if($pages == '') {
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if(!$pages) {
        $pages = 1;
      }
    }
    
    if(1 != $pages) {
      if($paged > 1) {
      	$out .= get_previous_posts_link(esc_html__('Newer posts', 'larue'));
      } else {
      	$out .= '<span class="previous nonactive">'.esc_html__('Newer posts', 'larue').'</span>';
      }
      if ($paged < $pages) {
      	$out .= get_next_posts_link(esc_html__('Older posts', 'larue'));
      } else {
      	$out .= '<span class="next nonactive">'.esc_html__('Older posts', 'larue').'</span>';
      }
    }
    return $out;
  }
}
/* ------------------------------------------------------------------------ */
/* Comments
/* ------------------------------------------------------------------------ */
if(!function_exists('larue_move_comment_field_to_bottom')){
	function larue_move_comment_field_to_bottom( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
	}
	add_filter( 'comment_form_fields', 'larue_move_comment_field_to_bottom' );
}
if(!function_exists('larue_comment')){
	function larue_comment( $comment, $args, $depth ) {
	   $GLOBALS['comment'] = $comment; ?>
	   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	   <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix"> 
	   		<div class="author-avatar">
	   			<?php
					// retrieve our additional author meta info
					$user_meta_image = esc_attr( get_the_author_meta( 'user_meta_image', get_comment()->user_id ) );
				    // make sure the field is set
				    if ( isset( $user_meta_image ) && $user_meta_image && get_comment()->user_id != '0' ) {
				        // only display if function exists
				        if ( function_exists( 'asw_framework_get_additional_user_meta_thumb' ) ) ?>
				            <img alt="<?php esc_html_e('author photo', 'larue'); ?>" src="<?php echo asw_framework_get_additional_user_meta_thumb(get_comment()->user_id); ?>" />
				<?php } else {
					echo get_avatar( $comment, '65', '' );
				} ?>
	   		</div>
	        <div class="comment-text">
				<div class="author">
				 	<h2 class="author-title"><?php printf( esc_html__( '%s', 'larue'), get_comment_author_link() ) ?></h2>
				 	<div class="date-comment"><?php printf(esc_html__('%1$s', 'larue'), get_comment_date('F j. Y')) ?><?php edit_comment_link( esc_html__( '(Edit)', 'larue'),' ','' ) ?></div>  
					<div class="comment-reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
				</div>
				<div class="text clearfix">
				<?php comment_text() ?>
				<?php if ( $comment->comment_approved == '0' ) : ?>
			        <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'larue') ?></em>
			        <br />
		      	<?php endif; ?>
		      </div>
	      	</div>
	   </div>
	<?php
	}
}
// Define Content Width 
if(! isset( $content_width)){
	$content_width = 850;
	function larue_adjust_content_width() {
		if( is_page_template( 'page-nosidebar.php' )){
			$content_width = 1200;
		}
	}   
	add_action( 'template_redirect', 'larue_adjust_content_width' );
}
add_theme_support( "title-tag" );
if(!function_exists('larue_wp_title')) {
	function larue_wp_title($title, $sep) {
		$id = get_the_ID();
		$title_prefix = esc_attr(get_bloginfo('name'));
		$title_suffix = '';
		$unchanged_title = $title;
		$title = is_front_page() ? $title_prefix.' - '.esc_attr(get_bloginfo('description')) : $title.$title_prefix.' - '.esc_attr(get_bloginfo('description'));
		return $title;
	}
	add_filter('wp_title', 'larue_wp_title', 10, 2);
}
// Echo theme's meta data if enabled
if(!function_exists('larue_header_meta')) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function larue_header_meta() {
		if( !get_theme_mod('asw_seo_settings', false) ) {
			$meta_description = esc_html(get_post_meta(get_the_ID(), "asw_page_meta_description", true));
			$meta_keywords = esc_html(get_post_meta(get_the_ID(), "asw_page_meta_keywords", true));
			if($meta_description) { 
				echo '<meta name="description" content="'.$meta_description.'">'."\r\n";
			} else if( get_theme_mod('asw_meta_description', false) ){
				echo '<meta name="description" content="'.get_theme_mod('asw_meta_description').'">'."\r\n";
			}
			if($meta_keywords) {
				echo '<meta name="keywords" content="'.$meta_keywords.'">'."\r\n";
			} else if( get_theme_mod('asw_meta_keywords', false) ){
				echo '<meta name="keywords" content="'.get_theme_mod('asw_meta_keywords').'">'."\r\n";
			}
		}
	}
	add_action('larue_header_meta', 'larue_header_meta');
}

/* ------------------------------------------------------------------------ */
/* Automatic Plugin Activation */
require_once( trailingslashit( get_template_directory() ). 'framework/inc/plugin-activation.php' );
/* ------------------------------------------------------------------------ */
// Recommended plugins activation
add_action('tgmpa_register', 'larue_register_required_plugins');
function larue_register_required_plugins() {
	$plugins = array(

		array(
        	'name'      => esc_html__('Contact Form 7', 'larue'),
        	'slug'      => 'contact-form-7',
			'required' 	=> false, 
        ),
        array(
        	'name'      => esc_html__('Visual Composer', 'larue'),
        	'slug'      => 'js_composer',
			'source'   	=> esc_url('http://artstudioworks.net/recommended-plugins/js_composer.zip'),
			'required' 	=> false, 
			'force_activation' 	=> false,
        ),
        array(
        	'name'      => esc_html__('Meta Box', 'larue'),
        	'slug'      => 'meta-box',
			'required' 	=> true, 
        ),
        array(
        	'name'      => esc_html__('MailChimp for Wordpress','larue'),
        	'slug'      => 'mailchimp-for-wp',
			'required' 	=> false,
        ),
        array(
        	'name'      		=> esc_html__('Larue Elements','larue'),
        	'slug'      		=> 'larue-elements',
        	'source'   			=> esc_url('http://artstudioworks.net/recommended-plugins/larue-elements.zip'),
			'required' 			=> true, 
			'force_activation' 	=> false,
        ),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'larue',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> esc_html__( 'Install Required Plugins', 'larue' ),
			'menu_title'                       			=> esc_html__( 'Install Plugins', 'larue' ),
			'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'larue' ), // %1$s = plugin name
			'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'larue' ),
			'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'larue' ),
			'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'larue' ),
			'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'larue' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);
	tgmpa($plugins, $config);
}

class Larue_Mobile_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dl-submenu\">\n";
  }
}
class Larue_Custom_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$ex_li = '';
			$ex_li = "<li class=\"back-to-menu\">".esc_html__('back', 'larue')."</li>";
		$indent = str_repeat( "\t", $depth );
		$output .= "\n{$indent}<ul class=\"sub-menu\">\n".$ex_li;
	}   
}
function larue_widget_custom_walker( $args ) {
    return array_merge( $args, array(
        'walker' => new Larue_Custom_Menu_Walker(),
        // another setting go here ... 
    ) );
}
add_filter( 'widget_nav_menu_args', 'larue_widget_custom_walker' );
function larue_search_filter($query) {
	if ($query->is_search) {
	$query->set('post_type', 'post');
	}
	return $query;
}
add_filter('pre_get_posts','larue_search_filter');

if(!function_exists('LarueCommentsNumber')){
	function LarueCommentsNumber($postID, $echo = false){
		$num_comments = get_comments_number($postID);
		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				$comments = esc_html__('No Comments', 'larue');
			} elseif ( $num_comments > 1 ) {
				$comments = $num_comments .' '. esc_html__('Comments', 'larue');
			} else {
				$comments = esc_html__('1 Comment', 'larue');
			}
			$write_comments = '<a href="' . get_comments_link($postID) .'">'. $comments.'</a>';
		} else {
			$write_comments =  esc_html__('Comments disabled.', 'larue');
		}

		return $write_comments;
	}
}
if(!function_exists('LarueExcerpt')){
	function LarueExcerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		} 
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}
}

?>