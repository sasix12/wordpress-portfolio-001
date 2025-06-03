<?php
/*
 * Template Name: Boston Home Templates
 * Description: A Page Template with a Page Builder design.
 */
$boston_redux_demo = get_option('redux_demo');
get_header('home'); ?>
<main class="wrapper">
	<?php if (have_posts()){ ?>
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
			<?php endwhile; ?>
		<?php }else {
		echo esc_html__( 'Boston Home Templates', 'boston' );
	}?>
</main>
<?php get_footer(); ?>