<?php 
$boston_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php if(isset($boston_redux_demo['search_bg']['url']) && $boston_redux_demo['search_bg']['url'] != ''){?>
<section class="section bg-gray pt-200 bg-img" style="background-image: url('<?php echo esc_url($boston_redux_demo['search_bg']['url']); ?>');">
<?php }else{?>
<section class="section bg-gray pt-200 bg-img">
<?php }?>
	<div class="container">
		<div class="row section-heading">
			<div class="col-lg-12">
				<h3 class="text-center">
					<?php if(isset($boston_redux_demo['search_title']) && $boston_redux_demo['search_title']!=''){?>
						<span><?php echo esc_attr($boston_redux_demo['search_title']);?></span>
					<?php }else{?>
						<span><?php echo esc_html__( 'Search results for:', 'boston' ); ?></span>
					<?php } ?>
					<span class="cap"><?php printf( esc_html__( ' %s', 'boston' ), get_search_query() );?></span>
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
			<?php if ( have_posts() ) :  ?>
				<?php
				while($wp_query->have_posts()): $wp_query->the_post(); 
					$blog_content = get_post_meta(get_the_ID(),'_cmb_content_excerpt_1', true);
				?>
					<article class="post_article mb-70">
						<?php if (has_post_thumbnail()) { ?>
							<div class="media mb-20">
								<img class="lazy" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>;" />
							</div>
						<?php } ?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
						<?php if ( '' !== wp_specialchars_decode($blog_content)): ?>
							<?php print wp_specialchars_decode($blog_content); ?>
						<?php else:?>
							<?php if(isset($boston_redux_demo['blog_excerpt'])){?>
							<?php echo esc_attr(boston_excerpt_1($boston_redux_demo['blog_excerpt'])); ?>
							<?php }else{?>
							<?php echo esc_attr(boston_excerpt_1(40)); 
							}?>
						<?php endif ?>
						<br>
						<a href="<?php the_permalink(); ?>" class="col-md-12">
							<button class="button-1 mt-20 px-btn px-btn-theme2">
								<span>
									<?php if(isset($boston_redux_demo['blog_btn_text'])){?>
										<?php echo esc_attr($boston_redux_demo['blog_btn_text']);?>
									<?php }else{?>
										<?php echo esc_html__( 'Read more', 'boston' );?>
									<?php } ?>
								</span>
							</button>
						</a>
					</article>
				<?php endwhile; ?>
			<?php else: ?>
				<div class="search_custom">
					<h4>
						<?php if(isset($boston_redux_demo['search_no_match']) && $boston_redux_demo['search_no_match']!=''){?>
						<?php echo wp_specialchars_decode(esc_attr($boston_redux_demo['search_no_match']));?>
						<?php }else{?>
						<?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'boston' );
						}?>
					</h4>
					<?php get_search_form(); ?>
				</div>
			<?php endif;?>
			<div class="col-md-12">
				<?php boston_pagination(); ?>
			</div>
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