<?php
	require_once('functions/bloat.php');
	require_once('functions/ajax.php');
	
	
	// Setup
	function suprez_setup() {
		// Menus
		register_nav_menus(array(
			'primary' => 'Primær',
			'secondary' => 'Sekundær'
		));
		
		// Theme support
		add_theme_support('post-thumbnails');
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		));
		
		// Image sizes
		add_image_size('hero', 1400, 800, array('center', 'center'));
	}
	add_action('after_setup_theme', 'suprez_setup');
	
	
	// CSS and JS
	function suprez_styles_scripts() {
		wp_enqueue_style('stylesheet', get_template_directory_uri().'/library/css/main.css');
		wp_enqueue_script('javascript', get_template_directory_uri().'/library/js/main.js', array('jquery'));
	}
	add_action('wp_enqueue_scripts', 'suprez_styles_scripts');
	
	
	// Editor CSS
	function suprez_editor_style() {
		add_editor_style('/library/css/editor-style.css');
	}
	add_action('admin_init', 'suprez_editor_style');
	
	
	// Format <title>
	function suprez_title($title, $sep) {
		// Add the site name
		$title .= get_bloginfo('name');
		
		// Add the site description for the home/front page
		$description = get_bloginfo('description', 'display');
		if ($description && (is_home() || is_front_page()))
			$title = "$title $sep $description";
		return $title;
	}
	add_filter('wp_title','suprez_title', 10, 2);
	
	
	// Remove comments
	/*
	// Admin menu
	add_action('admin_menu', function() {
		remove_menu_page('edit-comments.php');
	});
	
	// Admin bar
	add_action('wp_before_admin_bar_render', function() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('comments');
	});
	
	// Posts and pages
	add_action('init', function() {
		remove_post_type_support('post', 'comments');
		remove_post_type_support('page', 'comments');
	}, 100);
	*/
