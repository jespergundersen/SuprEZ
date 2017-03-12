<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="center">
		<?php get_sidebar(); ?>
		
		<main>
			<?php if(has_post_thumbnail()) : ?>
				<img src="<?php echo get_the_post_thumbnail_url(); ?>">
			<?php endif; ?>
			
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</main>
	</div>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>

<b>page.php</b>
