<?php if(!is_page()){ ?> <!-- Post meta data START-->
		
		
		<p class="author-name">Posted by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> - </p>
		<p class="date-posted"> <!-- <i class="fa fa-clock-o" aria-hidden="true"></i> --> <?php the_time('F jS, Y  g:i a'); ?> in </p>
		<!-- Category <p> START -->
		<p class="category-name"> 
		<?php
			$categories = get_the_category();
			$separator = ", ";
			$output = '';

			if ($categories) {

				foreach ($categories as $category) {

					$output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;

					} echo trim($output, $separator);

				}
			?>
		</p> <!-- Category <p> END -->

		
		<!-- Comment Count START-->
		<?php if(is_single()){ ?>
			<span class="comment-count">&nbsp;|&nbsp;<i class="fa fa-commenting-o" aria-hidden="true"> </i>&nbsp;<a href="<?php the_permalink(); ?>#disqus_thread"></a></span>
		<!-- Comment count END -->
		<?php } ?>

<?php } ?><!-- Post meta data END-->