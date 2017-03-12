jQuery(document).ready(function($) {
	
	// Load posts with AJAX
	var postsPerPage = 2;
	var offset = $('.list li').length;
	
	$('#load_posts').click(function(e) {
		e.preventDefault();
		
		$.ajax({
			method: 'POST',
			url: ajaxurl,
			dataType: 'JSON',
			data: {
				action: 'load_posts',
				postsPerPage: postsPerPage,
				offset: offset
			},
			beforeSend: function() {
				$('#load_posts').attr('disabled', true);
				$('#load_posts').addClass('loading');
			},
			success: function(posts) {
				if (posts.length) {
					$.each(posts, function(i) {
						var post = $('.list li:first').clone();
						post.attr('href', posts[i]['url']);
						post.find('h3').text(posts[i]['title']);
						post.find('p').text(posts[i]['content']);
						post.appendTo('.list');
					});
					offset += postsPerPage;
					
					var remaining = $('.remaining span').text() - postsPerPage;
					
					if (remaining <= 0) {
						$('.remaining span').text(0);
						//$("#load_posts").hide();
					}
					else {
						$('.remaining span').text(remaining);
						$('#load_posts').attr('disabled', false);
					}
				}
			},
			complete: function() {
				$('#load_posts').removeClass('loading');
			}
		});
	});
});
