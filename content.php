		<article class="post">

			<!-- Thumbnail for index and archieve  -->
			<?php if(is_search() or is_single() or is_page()){?>
	
				<?php } 
					else{?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
						</div>
					<?php }
				?>

			
			<h2 class="post-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
	<?php if(!is_page()){ ?> <!-- Post meta data -->
			<p class="author-name">By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> |</p>
			<p class="date-posted"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time('F jS, Y  g:i a'); ?> |</p>
			
			<!-- Category <p> START -->
			<p class="category-name">Category: 
				<?php

				$categories = get_the_category();
				$separator = ", ";
				$output = '';

				if ($categories) {

					foreach ($categories as $category) {

						$output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;

					}

					echo trim($output, $separator);

				}

				?>

			 </p> <!-- Category <p> END -->

			
			<!-- Comment Count START-->
			<?php if(is_single()){ ?>
				<span class="comment-count">&nbsp;|&nbsp;<i class="fa fa-commenting-o" aria-hidden="true"> </i>&nbsp;<a href="<?php the_permalink(); ?>#disqus_thread"></a></span>
			<!-- Comment count END -->
			<?php } ?>

	<?php } ?><!-- Post meta data -->

			<!-- Full content for page and post -->
			<?php if(is_single() OR is_page()){ ?>

				<p class="each-content"><?php the_content(); ?></p>
			
			<?php } //if closes for content

			else { ?>

				<p class="each-content"><?php echo get_the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>">Show more</a>
				</p>

			<?php } ?> <!-- else closes for content -->

		</article>


