<?php 

get_header();
?>
<div class="content-area">

<?php
if(have_posts()) :

	?>

				<!-- <h2 class="archives"><?php

					if ( is_category() ) {
					echo 'Category: ';	single_cat_title();
					} elseif ( is_tag() ) {
						single_tag_title();
					} elseif ( is_author() ) {
						the_post();
						echo 'Author : ' . get_the_author();
						rewind_posts();
					} elseif ( is_day() ) {
						echo 'Daily Archives: ' . get_the_date();
					} elseif ( is_month() ) {
						echo 'Monthly Archives: ' . get_the_date('F Y');
					} elseif ( is_year() ) {
						echo 'Yearly Archives: ' . get_the_date('Y');
					} else {
						echo 'Archives:';
					}

				?></h2> -->

				<?php
	while(have_posts()) : the_post();

		get_template_part('content');

	 endwhile;

	else:
		echo "<p>Archieve is empty.</p>";
	endif;
?>
</div>

<?php
get_footer();

?>

