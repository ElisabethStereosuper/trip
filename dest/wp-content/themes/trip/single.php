<?php get_header(); ?>

<ul></ul>

<article class='post'>

	<?php if ( have_posts() ) : the_post(); ?>

		<h2><?php the_title(); ?></h2>
		<time><?php echo get_the_date(); ?></time>

		<?php the_content(); ?>

	<?php else : ?>
					
		<h1>404</h1>

	<?php endif; ?>

</article>

<?php get_footer(); ?>
