	
<div class="post-next-prev-wrap">
	<div class="next-prev-container prev">
	<?php $nextPost = get_next_post(true);/*bool true for same category and 2nd argument for excluding the category*/
	        if($nextPost) {
	            $args = array(
	                'posts_per_page' => 1,
	                'include' => $nextPost->ID
	            );
	            $nextPost = get_posts($args);
	            foreach ($nextPost as $post) {
	                setup_postdata($post);
	    ?>
    
        <span><a class="previous" href="<?php the_permalink(); ?>">&laquo; Go back in time</a></span>
        <div class="prev-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <span><?php the_date('F jS, Y  g:i a'); ?></span>
    
    <?php
                wp_reset_postdata();
            } //end foreach
        } // end if
		?>
		</div>
	
	<div class="next-prev-container next">
		<?php $prevPost = get_previous_post(true);/*bool true for same category and 2nd argument for excluding the category*/
	        if($prevPost) {
	            $args = array(
	                'posts_per_page' => 1,
	                'include' => $prevPost->ID
	            );
	            $prevPost = get_posts($args);
	            foreach ($prevPost as $post) {
	                setup_postdata($post);
    	?>
    
        <span><a class="next" href="<?php the_permalink(); ?>">See what&apos;s next &raquo;</a></span>
        <div class="next-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <span><?php the_date('F jS, Y  g:i a'); ?></span>
    
	<?php
                wp_reset_postdata();
            } //end foreach
        } // end if
    ?>
    </div>
</div>