<?php $boston_redux_demo = get_option('redux_demo');?> 
	<footer class="footer">
		<?php
		$wp_query = new \WP_Query(array('post_type' => 'footer'));
		while($wp_query->have_posts()): $wp_query->the_post();
		?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</footer>
</body>
</html>
<?php wp_footer(); ?>