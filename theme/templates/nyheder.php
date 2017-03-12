<?php
/*
	Template Name: Nyheder
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div class="center">
		<main>
			<?php the_content(); ?>
			
			<?php
				$ppp = 1;
				$articles = get_posts(array(
					'posts_per_page' => $ppp
				));
			?>
			<ul class="list">
				<?php foreach ($articles as $article) : ?>
					<li>
						<a href="<?php echo get_permalink($article->ID); ?>">
							<h3><?php echo $article->post_title; ?></h3>
							<p><?php echo $article->post_content; ?></p>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			
			<?php $remaining = (wp_count_posts()->publish - $ppp > 0) ?: '0'; ?>
			<div class="remaining">
				<span><?php echo $remaining; ?></span> tilbage
			</div>
			
			<button id="load_posts" class="button" <?php disabled($remaining == 0); ?>>Indlæs flere</button>
		</main>
	</div>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>

<b>nyheder.php</b>
