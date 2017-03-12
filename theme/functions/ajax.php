<?php
	// AJAX url
	add_action('wp_head', function() {
		?><script type="text/javascript">var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';</script><?php
	});
	
	
	// Load posts
	function ajax_load_posts() {
		if (isset($_POST['action']) && $_POST['action'] == 'load_posts') {
			$posts_per_page = $_POST["postsPerPage"];
			$offset = $_POST["offset"];
			
			$articles = get_posts(array(
				'post_type' => 'post',
				'posts_per_page' => $posts_per_page,
				'offset' => $offset
			));
			
			$result = array();
			foreach ($articles as $article) {
				$result[] = array(
					'url' => get_permalink($article->ID),
					'title' => $article->post_title,
					'content' => $article->post_content,
				);
			}
			
			echo json_encode($result);
			die();
		}
	}
	add_action('wp_ajax_nopriv_load_posts', 'ajax_load_posts');
	add_action('wp_ajax_load_posts', 'ajax_load_posts');
