<?php
function larue_compress( $minify ) 
{
/* remove comments */
    $minify = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $minify );

    /* remove tabs, spaces, newlines, etc. */
    $minify = str_replace( array("\r\n", "\r", "\n", "\t", '; ', '  ', '    ', '    ',': ', ', ','{ ','}.'), array('','','','',';','','','',':',',','{','} .'), $minify );
        
    return $minify;
}
/**
 * Add color styling from theme
 */
function larue_styles_method() {
?>
<?php ob_start(); ?>
body {
    font-family: <?php echo esc_attr( get_theme_mod( 'asw_body_font_family', 'Lato' ) ); ?>;
    font-size: <?php echo esc_attr( get_theme_mod( 'asw_body_font_size', '14px' ) ); ?>;
    color: <?php echo esc_attr( get_theme_mod( 'asw_body_color', '#545555') ); ?>;
    background-image: url("<?php echo esc_url( get_theme_mod('asw_body_bg_image', '') ); ?>");
    background-size: <?php echo esc_attr( get_theme_mod('asw_body_bg_size', 'auto') ); ?>;
    background-repeat: <?php echo esc_attr( get_theme_mod('asw_body_bg_repeat', 'no-repeat') ); ?>;
    background-color: <?php echo esc_attr( get_theme_mod('asw_body_bg_color', '#ffffff') ); ?>;
}
a, .meta-categories a {
   color: <?php echo esc_attr( get_theme_mod('asw_links_color', '#c79b62') ); ?>; 
}
a:hover, .meta-categories a:hover {
   color: <?php echo esc_attr( get_theme_mod('asw_links_color_hover', '#a7a8aa') ); ?>; 
}
#header {
	<?php 
    echo "background-color: ".esc_attr( get_theme_mod('asw_header_bg_color', '#ffffff') ).";";
    echo "background-image: url(".esc_url( get_theme_mod('asw_header_image', '') ).");";
    echo "background-size: ".esc_attr( get_theme_mod('asw_header_bg_size', 'auto') ).";";
    echo "background-position: 50% 50%;";
    echo "border-color:".esc_attr( get_theme_mod('asw_header_border_color', '#ededed') ).";";
    ?>
}
#header .navigation_wrapper {
    <?php
    echo "border-color:".esc_attr( get_theme_mod('asw_header_border_color', '#ededed') ).";";
    ?>
}
#header.fixed_header .navigation_wrapper {
    <?php 
    echo "background-color: ".esc_attr( get_theme_mod('asw_header_bg_color', '#ffffff') ).";";
    ?>
}
#header .logo img {
    width: <?php echo esc_attr( get_theme_mod( 'asw_media_logo_width', '185' ) ); ?>px;
}
#navigation .menu li a { 
    font-size: <?php echo esc_attr( get_theme_mod( 'asw_menu_font_size', '13px' ) ); ?>;
    font-weight: <?php echo esc_attr( get_theme_mod( 'asw_menu_font_weight', '700' ) ); ?>;
    font-family: <?php echo esc_attr( get_theme_mod( 'asw_menu_font_family', 'Raleway' ) ); ?>;
    color: <?php echo esc_attr( get_theme_mod( 'asw_menu_item_color', '#151515') ); ?>;
    border-color: <?php echo esc_attr( get_theme_mod( 'asw_header_border_color', '#3d3d3d') ); ?>;
}
.header2 #navigation .menu li ul li a {
    font-size: <?php echo esc_attr( get_theme_mod( 'asw_menu_font_size', '13px' ) ); ?>;
}
ul#nav-mobile li > a:hover, ul#nav-mobile li.current-menu-item > a, ul#nav-mobile li.current_page_item > a, ul#nav-mobile li.current-menu-ancestor > a,
#navigation .menu li > a:hover, #navigation .menu li.current-menu-item > a, #navigation .menu li.current-menu-ancestor > a {
    color: <?php echo esc_attr( get_theme_mod( 'asw_menu_item_color_active', '#c79b62') ); ?> !important;
}
.navigation_wrapper, .search-area,
.header1 .navigation_wrapper.scroll-to-fixed-fixed { border-color: <?php echo esc_attr( get_theme_mod( 'asw_header_border_color', '#ededed') ); ?>; }
#footer { background-color: <?php echo esc_attr( get_theme_mod( 'asw_footer_bg_color', '#161616') ); ?>; }
#footer-copy-block { background-color: <?php echo esc_attr( get_theme_mod( 'asw_footer_copy_bg_color', '#1a1a1a') ); ?>; }
.title h2, .title h3 { 
    font-family: '<?php echo esc_attr( get_theme_mod( 'asw_posts_headings_font_family', 'Raleway' ) ); ?>';
    color: <?php echo esc_attr( get_theme_mod( 'asw_posts_headings_item_color', '#151515') ); ?>;
    font-weight: <?php echo esc_attr( get_theme_mod( 'asw_posts_headings_font_weight', '700' ) ); ?>;
    text-transform: <?php echo esc_attr( get_theme_mod('asw_posts_headings_font_transform', 'uppercase') ); ?>;
}
.custom_heading h2, .custom_heading h6 {
    font-family: <?php echo esc_attr( get_theme_mod( 'asw_posts_headings_font_family', 'Raleway' ) ); ?>;
    color: <?php echo esc_attr( get_theme_mod( 'asw_posts_headings_item_color', '#151515') ); ?>;
    font-weight: <?php echo esc_attr( get_theme_mod( 'asw_posts_headings_font_weight', '700' ) ); ?>;
}
.title h2 { 
    font-size: <?php echo esc_attr( get_theme_mod( 'asw_posts_headings_font_size', '21' ) ); ?>px;
}
.title h2 a:hover, .title h3 a:hover, .related-item-title a:hover, .latest-blog-item-description a.title:hover {
    color: <?php echo esc_attr( get_theme_mod( 'asw_posts_headings_item_color_active', '#a7a8aa') ); ?>;
}
.widget .latest-blog-list .title,
.post-slider-item .post-more h3 {
    font-family: '<?php echo esc_attr( get_theme_mod( 'asw_posts_headings_font_family', 'Raleway' ) ); ?>';
    text-transform: <?php echo esc_attr( get_theme_mod('asw_posts_headings_font_transform', 'uppercase') ); ?>;
    font-weight: <?php echo esc_attr( get_theme_mod( 'asw_posts_headings_font_weight', '700' ) ); ?>;
}
.wpb_widgetised_column .widget h3.title, .widget-title {
    font-size: <?php echo esc_attr( get_theme_mod( 'asw_widgets_headings_font_size', '11px' ) ); ?>; 
    font-weight: <?php echo esc_attr( get_theme_mod( 'asw_widgets_headings_font_weight', '600' ) ); ?>;
    font-family: <?php echo esc_attr( get_theme_mod( 'asw_widgets_headings_font_family', 'Lato' ) ); ?>;
    color: <?php echo esc_attr( get_theme_mod( 'asw_widgets_headings_item_color', '#000000') ); ?>;
}
.widget_nav_menu .menu li.current-menu-item > a,
blockquote:before,
.widget_nav_menu .menu li a:hover,
.widget .latest-blog-list .meta-categories a:hover, .post-meta .meta-tags a:hover,
.post .meta-categories, .author .comment-reply a:hover, .pie-top-button, #header .social-icons li a:hover,
.sharebox .social-icons li a:hover, #mobile-nav .social-icons li a:hover, .list-categories li.current-cat a, .list-categories li a:hover,
.button.viewpost:hover {
    color:<?php echo esc_attr( get_theme_mod( 'asw_accent_color', '#c79b62') ); ?> !important;
}
.instagram-item:hover img,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="tel"]:focus,
input[type="number"]:focus,
textarea:focus,
.single-post .post.featured .title .meta-date .meta-categories a {
    border-color:<?php echo esc_attr( get_theme_mod( 'asw_accent_color', '#c79b62') ); ?>;
}
#sidebar .widget.widget_socials .social-icons li a:before,
input[type="submit"]:before, .button:before,
input[type="submit"]:hover, .pie,
.sk-folding-cube .sk-cube:before,
.dl-menuwrapper li.dl-back > a,
.post.sticky.span12 .meta-categories a:before {
    background-color:<?php echo esc_attr( get_theme_mod( 'asw_accent_color', '#c79b62') ); ?>;
}
#footer div:not(.widget) .social-icons li a:hover,
#topbar .social-icons li a:hover {
    color:<?php echo esc_attr( get_theme_mod( 'asw_accent_color', '#c79b62') ); ?>;
}
.container{
    max-width: <?php echo esc_attr( get_theme_mod('asw_container_width','1110') ); ?>px;
}
.post-slider-center .post-slider-item {
    width: <?php echo ( esc_attr( get_theme_mod('asw_container_width','1110')) - 30 ); ?>px;
}
#main.boxed {
    max-width: <?php echo esc_attr( get_theme_mod('asw_container_width','1110') + 60 ); ?>px;
    background-color: <?php echo esc_attr( get_theme_mod('asw_main_bg_color','#ffffff') ); ?>;
}
<?php 
if (!get_theme_mod( 'asw_widgets_headings_separator', true ) ){
    echo '.meta:before, .wpb_widgetised_column .widget h3.title:before, .widget-title.separator:before, #sidebar .widget > h3.title:before {display:none !important;}';
    echo '.meta, .wpb_widgetised_column .widget h3.title, .widget-title.separator, #sidebar .widget > h3.title {padding-bottom:0;}';

}
?>
<?php $out=ob_get_contents(); $out = larue_compress($out); ob_end_clean();

    wp_add_inline_style('larue-stylesheet', $out);
}
add_action( 'wp_enqueue_scripts', 'larue_styles_method' );
?>