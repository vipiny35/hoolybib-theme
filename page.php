<?php get_header(); ?>

<div class="content-area">

<?php if(have_posts()) :
	
	while(have_posts()) : the_post();

		get_template_part('content');

	endwhile;

	else:
		echo "<p>No Content Found.</p>";

	endif; ?>
	
</div>
<?php get_footer(); ?>

