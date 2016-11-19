<?php get_header(); ?>

<div class="content-area">

	<?php if(have_posts()) : while(have_posts()) : the_post();?>
		
	<?php get_template_part('content');	?>

	<?php get_template_part('next_prev' ); ?>

	<?php //get_template_part('comment_disqus' ); ?>

	<?php get_template_part('comment_facebook' ); ?>
		
	<?php endwhile; else: echo "<p>No Post Found."; endif; ?>

</div>

<?php get_footer(); ?>
