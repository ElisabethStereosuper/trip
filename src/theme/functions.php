<?php

define( 'TRIP_VERSION', 1.0 );


/*-----------------------------------------------------------------------------------*/
/* General
/*-----------------------------------------------------------------------------------*/
// Plugins updates
add_filter( 'auto_update_plugin', '__return_true' );

// Theme support
add_theme_support( 'html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption',
    'widgets'
) );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

// Admin bar
show_admin_bar(false);

// Disable Tags
function trip_unregister_tags(){
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action( 'init', 'trip_unregister_tags' );


/*-----------------------------------------------------------------------------------*/
/* Clean WordPress head and remove some stuff for security
/*-----------------------------------------------------------------------------------*/
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
add_filter( 'emoji_svg_url', '__return_false' );

// remove api rest links
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

// remove comment author class
function trip_remove_comment_author_class( $classes ){
	foreach( $classes as $key => $class ){
		if(strstr($class, 'comment-author-')) unset( $classes[$key] );
	}
	return $classes;
}
add_filter( 'comment_class' , 'trip_remove_comment_author_class' );

// remove login errors
function trip_login_errors(){
    return 'Something is wrong!';
}
add_filter( 'login_errors', 'trip_login_errors' );


/*-----------------------------------------------------------------------------------*/
/* Admin
/*-----------------------------------------------------------------------------------*/
// Remove some useless admin stuff
function trip_remove_submenus() {
  $page = remove_submenu_page( 'themes.php', 'themes.php' );
  remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'trip_remove_submenus', 999 );
function trip_remove_top_menus( $wp_admin_bar ){
    $wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'trip_remove_top_menus', 999 );

// Enlever le lien par défaut autour des images
function trip_imagelink_setup(){
	if(get_option( 'image_default_link_type' ) !== 'none') update_option('image_default_link_type', 'none');
}
add_action( 'admin_init', 'trip_imagelink_setup' );

// Add wrapper around iframe
function trip_iframe_add_wrapper( $return, $data, $url ){
    return "<div class='wrapper-video'>{$return}</div>";
}
add_filter( 'oembed_dataparse', 'trip_iframe_add_wrapper', 10, 3 );

// Enlever les <p> autour des images
function trip_remove_p_around_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter( 'the_content', 'trip_remove_p_around_images' );

// Allow svg in media library
function trip_mime_types($mimes){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'trip_mime_types' );

// Custom posts in the dashboard
function trip_right_now_custom_post() {
    $post_types = get_post_types(array( '_builtin' => false ) , 'objects' , 'and');
    foreach($post_types as $post_type){
        $cpt_name = $post_type->name;
        if($cpt_name !== 'acf-field-group' && $cpt_name !== 'acf-field'){
            $num_posts = wp_count_posts($post_type->name);
            $num = number_format_i18n($num_posts->publish);
            $text = _n($post_type->labels->name, $post_type->labels->name , intval($num_posts->publish));
            echo '<li class="'. $cpt_name .'-count"><tr><a class="'.$cpt_name.'" href="edit.php?post_type='.$cpt_name.'"><td></td>' . $num . ' <td>' . $text . '</td></a></tr></li>';
        }
    }
}
add_action( 'dashboard_glance_items', 'trip_right_now_custom_post' );

// Add new styles to wysiwyg
function trip_button( $buttons ){
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
add_filter( 'mce_buttons_2', 'trip_button' );
function trip_init_editor_styles(){
    add_editor_style();
}
add_action( 'after_setup_theme', 'trip_init_editor_styles' );

// Customize a bit the wysiwyg editor
function trip_mce_before_init( $styles ){
    $style_formats = array(
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'btn'
        )
    );
    $styles['style_formats'] = json_encode( $style_formats );
    // Remove h1 and code
    $styles['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6';
    // Let only the colors you want
    $styles['textcolor_map'] = '[' . "'000000', 'Noir', '565656', 'Texte'" . ']';
    return $styles;
}
add_filter( 'tiny_mce_before_init', 'trip_mce_before_init' );

// Option page
function trip_menu_order( $menu_ord ){  
    if( !$menu_ord ) return true;  
    
    $menu = 'acf-options';
    $menu_ord = array_diff($menu_ord, array( $menu ));
    array_splice( $menu_ord, 1, 0, array( $menu ) );
    return $menu_ord;
}  
add_filter( 'custom_menu_order', 'trip_menu_order' );
add_filter( 'menu_order', 'trip_menu_order' );


/*-----------------------------------------------------------------------------------*/
/* Menus
/*-----------------------------------------------------------------------------------*/
register_nav_menus( array('primary' => 'Primary Menu') );

// Cleanup WP Menu html
function trip_css_attributes_filter($var){
    return is_array($var) ? array_intersect($var, array('current-menu-item', 'current_page_parent')) : '';
}
add_filter( 'nav_menu_css_class', 'trip_css_attributes_filter' );


/*-----------------------------------------------------------------------------------*/
/* Sidebar & Widgets
/*-----------------------------------------------------------------------------------*/
function trip_register_sidebars(){
	register_sidebar( array(
		'id' => 'sidebar',
		'name' => 'Sidebar',
		'description' => 'Take it on the side...',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
		'empty_title'=> ''
	) );
}
add_action( 'widgets_init', 'trip_register_sidebars' );

// Deregister default widgets
function trip_unregister_default_widgets(){
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
}
add_action( 'widgets_init', 'trip_unregister_default_widgets' );


/*-----------------------------------------------------------------------------------*/
/* Post types
/*-----------------------------------------------------------------------------------*/
// function trip_post_type(){
//     register_post_type( 'resource', array(
//         'label' => 'Resources',
//         'singular_label' => 'Resource',
//         'public' => true,
//         'menu_icon' => 'dashicons-portfolio',
//         'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
//     ));
// }
// add_action( 'init', 'trip_post_type' );

// function trip_taxonomies(){
//     register_taxonomy( 'resource_cat', array('resource'), array(
//         'label' => 'Categories',
//         'singular_label' => 'Category',
//         'hierarchical' => true,
//         'show_admin_column' => true
//     ) );
// }
// add_action( 'init', 'trip_taxonomies' );


/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/
function trip_scripts(){
    // header
	wp_enqueue_style( 'trip-style', get_template_directory_uri() . '/css/main.css', array(), TRIP_VERSION );

	// footer
	wp_deregister_script('jquery');
	//wp_enqueue_script( 'trip-scripts', get_template_directory_uri() . '/js/main.js', array(), TRIP_VERSION, true );

    wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_enqueue_scripts', 'trip_scripts' );


/*-----------------------------------------------------------------------------------*/
/* TGMPA
/*-----------------------------------------------------------------------------------*/
// function trip_register_required_plugins(){
// 	$plugins = array(
//         array(
//             'name'        => 'Advanced Custom Fields PRO',
//             'slug'        => 'advanced-custom-fields-pro',
//             'source'     => get_template_directory_uri() . '/plugins/advanced-custom-fields-pro.zip',
//             'required'    => true,
//             'force_activation' => false
//         ),
//         array(
//             'name'        => 'SecuPress Free — Sécurité WordPress 1.3.3',
//             'slug'        => 'secupress',
//             'required'    => false,
//             'force_activation' => false
//         ),
//         array(
//             'name'        => 'EWWW Image Optimizer',
//             'slug'        => 'ewww-image-optimizer',
//             'required'    => false,
//             'force_activation' => false
//         ),
//         array(
//             'name'        => 'Clean Image Filenames',
//             'slug'        => 'clean-image-filenames',
//             'required'    => false,
//             'force_activation' => false
//         ),
//     );
    
// 	$config = array(
// 		'id'           => 'trip',
// 		'default_path' => '', 
// 		'menu'         => 'tgmpa-install-plugins',
// 		'parent_slug'  => 'themes.php',
// 		'capability'   => 'edit_theme_options', 
// 		'has_notices'  => true,
// 		'dismissable'  => true,
// 		'dismiss_msg'  => '',
// 		'is_automatic' => false,
// 		'message'      => ''
//     );
    
// 	tgmpa( $plugins, $config );
// }
// add_action( 'tgmpa_register', 'trip_register_required_plugins' );

?>
