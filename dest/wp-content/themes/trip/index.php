<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<ul>

		<?php while ( have_posts() ) : the_post(); ?>
				
			<li><a href='<?php the_permalink(); ?>'>

				<h2><?php the_title(); ?></h2>
				<time><?php echo get_the_date(); ?></time>
				<?php the_excerpt(); ?>

			</a></li>

		<?php endwhile; ?>

	</ul>

<?php else : ?>
			
	<p><?php _e('No posts yet'); ?></p>

<?php endif; ?>

<?php get_footer(); ?>
