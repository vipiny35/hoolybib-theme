<?php get_header(); ?>
	<div class="content-area row-parent">

		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			
			<div class="row-wrap">
			
				<!-- Link START-->
				<a class="link-wrap" href="<?php the_permalink(); ?>">
				
					<?php 
					if(has_post_thumbnail('medium-thumbnail' )){the_post_thumbnail('medium-thumbnail' );} 
					else{ the_post_thumbnail('thumbnail' );} 
					?>
					<p class="title-cat"><?php the_title(); ?></p>

				</a><!-- Link END-->
			</div>

		<?php endwhile; else: echo "<p>No GIFs found.</p>"; endif; ?>
	<?php pagination_hoolybib(); ?>
	</div>
<?php get_footer(); ?>

