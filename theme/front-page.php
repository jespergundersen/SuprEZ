<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php get_template_part('parts/hero'); ?>
	
	<div class="center">
		<main>
			<?php the_content(); ?>
		</main>
	</div>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>

<b>front-page.php</b>
