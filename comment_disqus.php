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