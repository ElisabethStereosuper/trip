<?php
/*
Template Name: Page: No sidebar
*/
?>

<?php get_header(); ?>

	<div id="page-wrap">
		<div class="container">
			<div id="content" <?php post_class('span12'); ?>>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

					<?php comments_template(); ?>
					
				<?php endwhile; endif; ?>
			</div> <!-- end content -->
		</div>
	</div> <!-- end page-wrap -->
<?php get_footer(); ?>
