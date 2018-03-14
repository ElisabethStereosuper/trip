<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
		
		<div>

			<span><?php echo get_the_date(); ?></span>
			<h2><?php the_title(); ?></h2>
			<?php if( has_post_thumbnail() ){ the_post_thumbnail(); } ?>
			<?php the_excerpt(); ?>
			<a href='<?php the_permalink(); ?>'><?php _e('Read more'); ?></a>

		</div>

	<?php endwhile; ?>

	<?php else : ?>
			
	<p><?php _e('No posts yet'); ?></p>

	<?php endif; ?>

</div>

<div id='map' class='map'></div>

<?php get_footer(); ?>
