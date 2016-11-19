<?php if( post_type_supports( get_post_type(), 'comments' ) ) {
		if (comments_open()){?>
		
		<div class="facebook-comments">
			
			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" width="auto"></div>

		</div>

<?php } } ?>	