<?php 

get_header();
?>
<div class="content-area">

<?php
if(have_posts()) :
	while(have_posts()) : the_post();
	
		get_template_part('content');


		?>

		<div class="post-next-prev-wrap">
					    <?php $prevPost = get_previous_post(false);
					        if($prevPost) {
					            $args = array(
					                'posts_per_page' => 1,
					                'include' => $prevPost->ID
					            );
					            $prevPost = get_posts($args);
					            foreach ($prevPost as $post) {
					                setup_postdata($post);
					    ?>
			        <div class="next-prev-container prev">
			            <span><a class="previous" href="<?php the_permalink(); ?>">&laquo; Go back in time</a></span>
			            <div class="prev-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
			            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			            <span><?php the_date('F jS, Y  g:i a'); ?></span>
			        </div>
				    <?php
				                wp_reset_postdata();
				            } //end foreach
				        } // end if
         
				        $nextPost = get_next_post(false);
				        if($nextPost) {
				            $args = array(
				                'posts_per_page' => 1,
				                'include' => $nextPost->ID
				            );
				            $nextPost = get_posts($args);
				            foreach ($nextPost as $post) {
				                setup_postdata($post);
				    ?>
			        <div class="next-prev-container next">
			            <span><a class="next" href="<?php the_permalink(); ?>">See what&apos;s next &raquo;</a></span>
			            <div class="next-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
			            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			            <span><?php the_date('F jS, Y  g:i a'); ?></span>
			        </div>

			        

			    <?php
		                wp_reset_postdata();
		            } //end foreach
		        } // end if
		    ?>
		</div>


	<!-- Disqus comment for post that have comments enable START-->
		<?php if( post_type_supports( get_post_type(), 'comments' ) ) {
		if (comments_open()){?>
		<div class="disqus-comments">
				<div id="disqus_thread"></div>
				<script>

				/**
				 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
				 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
				/*
				var disqus_config = function () {
				    this.page.url = <?php the_permalink(); ?>;  // Replace PAGE_URL with your page's canonical URL variable
				    this.page.identifier = <?php echo get_the_id(); ?>; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
				};
				*/
				(function() { // DON'T EDIT BELOW THIS LINE
				    var d = document, s = d.createElement('script');
				    s.src = '//hoolybib.disqus.com/embed.js';
				    s.setAttribute('data-timestamp', +new Date());
				    (d.head || d.body).appendChild(s);
				})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript> 
				<script id="dsq-count-scr" src="//hoolybib.disqus.com/count.js" async></script>                                    
		</div>
		<?php } } ?>
	<!-- Disqus comment for post that have comments enable END-->

		<?php
	
	endwhile;

	else:
		echo "<p>No Post Found.";
	endif;
?>
</div>

<?php
get_footer();

?>
