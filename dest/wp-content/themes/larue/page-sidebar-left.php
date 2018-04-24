<?php
/*
Template Name: Page: Left sidebar
*/
?>
<?php get_header(); ?>

<div id="page-wrap" class="container">

	<div id="content" class="sidebar-left span9">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="entry">
				<header class="title">
					<h2><?php echo esc_attr(get_the_title()); ?></h2>
				</header>				
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

		</article>
		
		<?php comments_template(); ?>

		<?php endwhile; endif; ?>
	</div> <!-- end content -->

	<?php get_sidebar(); ?>
	
</div> <!-- end page-wrap -->
	
<?php get_footer(); ?>