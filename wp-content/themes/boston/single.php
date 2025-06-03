<?php 
$boston_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php 
while (have_posts()): the_post();
?>
<section class="section bg-gray pt-200">
	<div class="container">
		<div class="row section-heading">
			<div class="col-lg-12">
				<h3 class="text-center">
					<span>
						<?php the_title(); ?>
					</span>
				</h3>
			</div>
		</div>
	</div>
</section>
<main class="post section container">
	<div class="row">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ){?>
		<div class="col-lg-8">
	<?php }else{?>
		<div class="col-lg-12">
	<?php } ?>
			<article class="post_article">
				<?php if (has_post_thumbnail()) { ?>
					<div class="media mb-20">
						<img class="lazy" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>;" />
					</div>
				<?php } ?>
				<ul class="metadata d-flex flex-wrap">
					<li class="metadata_item">
						<?php echo get_the_author_posts_link(); ?>
					</li>
					<li class="metadata_item">
						<?php the_time(get_option( 'date_format' ));?>
					</li>
					<li class="metadata_item">
						<?php comments_number( esc_html__('0 Comments', 'boston'), esc_html__('1 Comment', 'boston'), esc_html__('% Comments', 'boston') ); ?>
					</li>
				</ul>
				<?php the_content(); ?>
			</article>
			<?php endwhile; ?>
			<section class="post_comments section">
				<div class="post_comments-wrapper">
					<?php comments_template();?>
				</div>
			</section>
		</div>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ){?>
		<div class="col-lg-4">
			<aside class="sidebar hv-sidebar">
				<?php get_sidebar(); ?>
			</aside>
		</div>
	<?php } ?>
	</div>
</main>
<?php get_footer(); ?>