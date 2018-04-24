<?php
/* ------------------------------------------------------------------------ */
/* Define Sidebars */
/* ------------------------------------------------------------------------ */
if (function_exists('register_sidebar')) {
	if (get_theme_mod( 'asw_widgets_headings_separator', true ) ) 
		$separator = ' separator';
	else {
		$separator = '';
	}
	/* ------------------------------------------------------------------------ */
	/* Blog Widgets */
	register_sidebar(array(
		'name' => esc_html__('Blog Widgets','larue'),
		'id'   => 'blog-widgets',
		'description'   => esc_html__( 'These are widgets for the Blog sidebar.','larue' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title'.esc_attr($separator).'"><span>',
		'after_title'   => '</span></h3>'
	));
	/* ------------------------------------------------------------------------ */
	/* Hidden Area Widgets */
	register_sidebar(array(
		'name' => esc_html__('Hidden Menu Widgets','larue'),
		'id'   => 'hidden-widgets',
		'description'   => esc_html__( 'These are widgets for hidden menu block.','larue' ),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title'.esc_attr($separator).'"><span>',
		'after_title'   => '</span></h3>'
	));
	/* Footer Widgets */
	register_sidebar(array(
		'name' => esc_html__('Footer Widgets','larue'),
		'id'   => 'footer-widgets',
		'description'   => esc_html__( 'These are widgets for the Footer.','larue' ),
		'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>'
	));
	/* Before Footer Area Widgets */
	register_sidebar(array(
		'name' => esc_html__('Before footer area','larue'),
		'id'   => 'before-footer-widgets',
		'description'   => esc_html__( 'These are widgets for before footer area.','larue' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	));
}
    
?>