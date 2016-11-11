<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>

	<?php 
		if(is_archive()){
			single_cat_title('hoolybib - ');
		}
		elseif(is_front_page()){
			bloginfo('name'); echo " - "; bloginfo('description');
		}
		elseif(is_search()){
			echo "hoolybib search: ".get_search_query();
		}
		else{
			single_post_title( 'hoolybib - ' );
		}
	?>
		
	</title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header class="site-header clearfix">
	
		<div class="site-name">
			<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
		</div>
		

		<nav class="header-nav">
			<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
		</nav>

		<span class="menu-trigger" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
		

		<div class="searchform">
					<?php get_search_form(); ?>
		</div>

		<div class="social-links clearfix">
			<?php get_template_part('sociallinks'); ?>
		</div>
		
	
	</header>

	<div id="menuID" class="menu-overlay">

		<div class="sitename-x-btn clearfix">
			<div class="site-name">
				<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
			</div>
			<span class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></span>
		</div>
		
		<div class="searchform-box clearfix">
			<div class="searchform-overlay"><?php get_template_part('searchform', 'mob' ); ?></div>
		</div>
		

		<nav class="header-nav-overlay">
			<?php 
				$args = array(
					'theme_location' => 'primary',
					'class' => 'nav-bar'
				);
			?>
			<?php wp_nav_menu($args); ?>
		</nav>

		<div class="social-links-overlay clearfix">
			<?php get_template_part('sociallinks'); ?>
		</div>
		
		<center><?php bloginfo('name');?>  &copy; <?php echo date('Y'); ?></center>
		
	</div>


	<div class="container clearfix">
	
		<div class="sidebar">
			<?php dynamic_sidebar('sidebar' ); ?>
		</div>
	<!-- <?php if(is_page()){ /*empty if statement for pages*/} else{ ?>
	<?php } ?> -->
