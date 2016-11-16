<article class="post <?php if(is_sticky() && is_front_page()){ ?>sticky-post<?php } ?>">

			<!-- Thumbnail for index and archieve  -->
			<?php if(is_search() or is_single() or is_page()){?>
	
				<?php }  else{ ?>
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('index-thumbnail'); ?></a>
					</div>
				<?php } ?>

			
			<h2 class="post-name"><?php if(!is_single() AND !is_page()){ ?><a href="<?php the_permalink(); ?>"><?php } ?><?php the_title(); ?><?php if(!is_single() AND !is_page()){ ?></a><?php } ?></h2>
			
			<?php get_template_part('post_meta' ); ?>

			<!-- Full content for page and post -->
			<?php if(is_single() OR is_page()){ ?>
				<div class="each-content"><?php the_content(); ?></div>
				<?php if(is_single()){get_template_part('social_buttons' );} ?>
			<?php } //if closes for Full content for page and post

			else { ?>
				<div class="each-content"><?php echo get_the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>">Show more</a>
				</div>
			<?php } ?> <!-- else closes for Full content for page and post -->
			

</article>


