<?php
$boston_redux_demo = get_option('redux_demo');
get_header(); ?>
<section class="notfound section-padding text-center">
	<div class="v-middle">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<h1>
						<?php if(isset($boston_redux_demo['404_heading']) && $boston_redux_demo['404_heading']!=''){?>
						<?php echo htmlspecialchars_decode(esc_attr($boston_redux_demo['404_heading']));?>
						<?php }else{?>
						<?php echo esc_html__( '404', 'boston' );
						}?>
					</h1>
					<h2>
						<?php if(isset($boston_redux_demo['404_title']) && $boston_redux_demo['404_title']!=''){?>
						<?php echo htmlspecialchars_decode(esc_attr($boston_redux_demo['404_title']));?>
						<?php }else{?>
						<?php echo esc_html__( 'Not Found!', 'boston' );
						}?>
					</h2>
					<a href="<?php echo esc_url(home_url('/')); ?>" class="col-md-12">
						<button class="button-1 mt-20 px-btn px-btn-theme2">
							<span>
								<?php if(isset($boston_redux_demo['404_text_btn'])){?>
									<?php echo esc_attr($boston_redux_demo['404_text_btn']);?>
								<?php }else{?>
									<?php echo esc_html__( 'Back to home', 'boston' );?>
								<?php } ?>
							</span>
						</button>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
	.notfound {
	    background-image: url("<?php echo esc_url($boston_redux_demo['404_bg']['url']); ?>");
	}
</style>
<?php get_footer(404); ?>