<article class="post">
	
	<h2 class="post-name"><?php the_title(); ?></h2>
			
	<?php get_template_part('post_meta' ); ?>

	<div class="each-content">
		<div class="cat-content">
			<?php the_content(); ?>
			<?php get_template_part('social_buttons' ); ?>
		</div>
	</div>

	

</article>