
	
	</div><!--Container END-->

	
		<div class="footer-widgets clearfix">
		
			<?php if(is_active_sidebar('footer1' )): ?>			
				<div class="footer-widget-area">
					<?php dynamic_sidebar('footer1'); ?>
				</div>
			<?php endif; ?>	
		
			<?php if(is_active_sidebar('footer2' )): ?>			
				<div class="footer-widget-area">
					<?php dynamic_sidebar('footer2'); ?>
				</div>
			<?php endif; ?>	
		
			<?php if(is_active_sidebar('footer3' )): ?>			
				<div class="footer-widget-area">
					<?php dynamic_sidebar('footer3'); ?>
				</div>
			<?php endif; ?>	
		
			<?php if(is_active_sidebar('footer4' )): ?>			
				<div class="footer-widget-area">
					<?php dynamic_sidebar('footer4'); ?>
				</div>
			<?php endif; ?>	
		
		</div>
	<!-- <?php if(is_page()){ /*empty if statement for pages*/} else{ ?>	
	<?php } ?> -->	


	<footer class="site-footer">
	
		<nav class="footer-nav clearfix">
			<?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
		</nav>
			
		<div class="social-links-footer clearfix">
			<span class="find-us">Find us on:</span>
			<?php get_template_part('sociallinks'); ?>
		</div>

		<div class="copyright">
			<?php bloginfo('name');?>  &copy; <?php echo date('Y'); ?>
		</div>

	</footer>

	<!-- Disqus comment count script START -->	
		<?php if( post_type_supports( get_post_type(), 'comments' ) ) {
				if (comments_open()){?>
					<script id="dsq-count-scr" src="//hoolybib.disqus.com/count.js" async></script>
		<?php } } ?>
	<!-- Disqus comment count script END -->

<?php wp_footer(); ?>
</body>
</html>
