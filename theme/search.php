<?php get_header(); ?>

<div class="center">
	<main>
		<h1>Søgeresultater for "<?php echo $s; ?>"</h1>
		<p>Din søgning gav <b><?php echo $wp_query->found_posts; ?></b> resultater</p>
		
		<?php get_search_form(); ?>
		
		<ul>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<li>
					<a href="<?php echo get_permalink(); ?>">
						<?php the_title(); ?>
						<?php the_excerpt(); ?>
					</a>
				</li>
				
			<?php endwhile; endif; ?>
		</ul>
	</main>
</div>

<?php get_footer(); ?>

<b>search.php</b>
