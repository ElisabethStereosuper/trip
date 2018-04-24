<?php global $post; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<!-- Mobile Specific Metas & Favicons -->
	<?php if( get_theme_mod('asw_responsiveness', true) ) { ?>
	<meta name="viewport" content="initial-scale=1.0">
	<?php } ?>
	<?php do_action('larue_header_meta'); ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<?php
$main_classes = '';

if( get_theme_mod('asw_progress_indicator', true) ){
	$main_classes = 'show-progress-indicator';
}
if(get_theme_mod('asw_boxed_style',false)){
	$main_classes .= ' boxed';
} 
if( get_theme_mod('asw_fixed_header', true) ) {
	$fixed_header = 'fixed_header'; 
} else {
	$fixed_header = '';
}
?>
<body <?php body_class(); ?>>
<?php if(get_theme_mod('asw_page_loading', false) == true ){ ?>
	<div class="page-loading">
		<div class="sk-folding-cube">
		  <div class="sk-cube1 sk-cube"></div>
		  <div class="sk-cube2 sk-cube"></div>
		  <div class="sk-cube4 sk-cube"></div>
		  <div class="sk-cube3 sk-cube"></div>
		</div>
	</div>
<?php } ?>
<div id="main" class="<?php echo esc_attr($main_classes); ?>">
	<div class="pie-wrapper" id="pieWrapper">
		<div class="pie-top-button"><i class="fa fa-angle-up"></i></div>
		<div class="pie" id="pieLeft" style="transform: rotate(64.0228deg);"></div>
		<div class="pie hide" id="pieRight"></div>
		<div class="pie pie--right hide" id="pieMask"></div>
		<div class="mask mask--left" id="maskLeft"></div>
    </div>
	<div id="header-main" class="<?php echo esc_attr($fixed_header); ?>">
	<?php get_template_part('templates/headers/header-'.get_theme_mod('asw_header_variant', 'version1')); ?>
	</div>
			