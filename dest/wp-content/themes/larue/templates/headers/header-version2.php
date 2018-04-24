<?php if( get_theme_mod( 'asw_header_topbar', false ) && ( has_nav_menu('topbar_navigation') || get_theme_mod('asw_header_socials', false) ) ) { ?>
	<div id="topbar">
		<div class="container">
			<div class="my-table">
				<div class="my-tr">
					<div class="my-td span6">
						<?php if( has_nav_menu('topbar_navigation') ) { ?>
							<ul id="topbar-nav" class="menu">
								<?php wp_nav_menu(array('theme_location' => 'topbar_navigation', 'container'=>false, 'items_wrap'=>'%3$s', 'menu_id' => 'topbar-nav', 'fallback_cb'=>false, 'depth'=> -1)); ?>
							</ul>
						<?php } ?>
					</div>
					<div class="my-td span6 textright">
						<?php if( get_theme_mod('asw_header_socials',true) ) get_template_part('socials'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<header id="header" class="header2 clearfix">
	<div class="<?php echo get_theme_mod('asw_header_grid','container'); ?>">
		<div class="my-table">
			<div class="my-tr">
				<div class="my-td span2">
					<div class="logo">
						<?php if(get_theme_mod('asw_media_logo','') != "") { ?>
							<a href="<?php echo esc_url(home_url('/')); ?>" class="logo_main"><img src="<?php echo esc_url(get_theme_mod('asw_media_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a>
						<?php } else { ?>
							<a href="<?php echo esc_url(home_url('/')); ?>" class="logo_standard"><h1 class="logo-text"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1></a>
						<?php } ?>
					</div>
				</div>
				<div class="my-td span8">
					<?php if( has_nav_menu( 'main_navigation' ) ) { ?>
					<nav id="navigation" class="<?php echo esc_attr('textcenter').' '.esc_attr(get_theme_mod('asw_header_dropdown_style','dark')); ?>">
						<ul id="nav" class="menu">
							<?php wp_nav_menu(array('theme_location' => 'main_navigation', 'container' => false, 'menu_id' => 'nav', 'items_wrap'=>'%3$s', 'fallback_cb' => false)); ?>
						</ul>
					</nav>
					<?php } ?>
				</div>
				<div class="my-td span2 textright">
					<?php if( get_theme_mod('asw_header_hidden_nav', true ) ) { ?>
					<div class="hidden-menu-button">
						<a href="javascript:void(0);" class="menu-button-open">
							<span class="line1"></span>
							<span class="line2"></span>
							<span class="line3"></span>
						</a>
						<div class="menu-hidden-container textleft">
							<nav id="hidden-nav">
								<a href="javascript:void(0);" class="menu-button-close"><i class="icon icon-arrows-remove"></i></a>
								<h2 class="logo-text"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h2>
								<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Hidden Menu Widgets') ); ?>
							</nav>
						</div>
					</div>
				<?php } ?>
					<?php if( get_theme_mod('asw_header_search_button',true) ) { ?>
						<div class="search-link">
							<a href="javascript:void(0);" class="search-button"><i class="fa fa-search"></i></a>
							<div class="search-area">
									<a href="javascript:void(0);" class="search-button-close"><i class="fa fa-times"></i></a>
									<form action="<?php echo esc_url(home_url('/')); ?>" id="header-searchform" method="get">
								        <input type="text" id="header-s" name="s" value="" autocomplete="off" />
								        <label><?php esc_html_e('Search','larue'); ?></label>
									</form>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</header>
<header id="mobile-nav">
	<div class="search-link">
		<a href="javascript:void(0);" class="search-button"><i class="fa fa-search"></i></a>
		<a class="close-button" href="#"><i class="icon icon-arrows-remove"></i></a>
		<div class="search-area">
			<form action="<?php echo esc_url(home_url('/')); ?>" id="header-searchform-mobile" method="get">
		        <input type="text" id="header-s-mobile" name="s" value="" autocomplete="off" />
		        <label><?php esc_html_e('Search','larue'); ?></label>
			</form>
		</div>
	</div>
	<div class="social-menu-button">
		<a href="javascript:void(0);" class="social-button"><i class="fa fa-share"></i></a>
		<a class="close-button" href="#"><i class="icon icon-arrows-remove"></i></a>
		<div class="social-area">
			<?php get_template_part( 'framework/inc/sharebox-mobile' ); ?>
		</div>
	</div>
	<div class="hidden-menu-button">
		<a href="javascript:void(0);" class="menu-button-open"><i class="icon icon-arrows-hamburger-2"></i></a>
		<a class="close-button" href="#"><i class="icon icon-arrows-remove"></i></a>
		<div class="menu-hidden-container">
			<div id="dl-menu" class="dl-menuwrapper">
				<ul id="nav-mobile" class="dl-menu dl-menuopen">
					<?php wp_nav_menu(array('theme_location' => 'main_navigation', 'container' => false, 'menu_id' => 'nav-mobile', 'items_wrap'=>'%3$s', 'fallback_cb' => false, 'walker' => new Larue_Mobile_Walker_Nav_Menu()));?>
				</ul>
			</div>
		</div> 
	</div>
</header>