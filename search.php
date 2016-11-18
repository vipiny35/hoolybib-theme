<?php 

get_header();
?>
<div class="content-area">

<?php
if(have_posts()) :?>
	
	<div class="search-header">
		<h2 class="archives">Search results for: <?php echo get_search_query(); ?></h2>
	</div>

	<?php while(have_posts()) : the_post();
		get_template_part('content');
	
	endwhile;

	else:?>
		<h2 class="archives">No results found: <?php echo get_search_query(); ?> </h2>
	<?php endif;
?>
<?php pagination_hoolybib(); ?>
</div>

<?php
get_footer();

?>