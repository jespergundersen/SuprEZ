<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="title" content="<?php wp_title('-', true, 'right'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php wp_title('-', true, 'right'); ?></title>
	<?php wp_head(); ?>
</head>

<?php flush(); // http://developer.yahoo.com/performance/rules.html#flush ?>

<body <?php body_class(); ?>>

<header>
	<a class="logo" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
	
	<?php get_search_form(); ?>
	
	<?php wp_nav_menu(array(
		'theme_location' => 'primary',
		'menu_id' => 'nav-primary',
		'container' => false
	)); ?>
</header>
