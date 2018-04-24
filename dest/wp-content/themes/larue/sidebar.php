<div id="sidebar" class="span3">
	<?php 
	if(is_page()){
		generated_dynamic_sidebar();
	} else {
		/* Blog Sidebar */
		if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Blog Widgets') );
	}
	?>
</div>