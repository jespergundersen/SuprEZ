<aside>
	<?php previous_post_link('%link', '&larr; Forrige'); ?>
	<?php next_post_link('%link', 'Næste &rarr;'); ?>
	
	<h2>Indlæg</h2>
	<ul>
		<?php
			$articles = get_posts();
			foreach ($articles as $article) {
				$active = ($article->ID == $post->ID) ? 'active' : '';
				echo '<li class="'.$active.'"><a href="'.get_permalink($article->ID).'">'.$article->post_title.'</a></li>';
			}
		?>
	</ul>
</aside>
