<?php $boston_redux_demo = get_option('redux_demo'); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<!-- metas -->
	<meta charset="utf-8">
	<meta name="author" content="themepaa">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="Boston - Portfolio Template">
	<meta name="description" content="Boston - Portfolio Template">
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {?>
	<link rel="icon" href="<?php if(isset($boston_redux_demo['favicon']['url'])){?><?php echo esc_url($boston_redux_demo['favicon']['url']); ?><?php }?>">
	<?php }?> 
	<?php wp_head(); ?>
</head>
<body>
	<div id="loading">
		<div class="load-circle"><span class="one"></span></div>
	</div>
	<header class="main-header">
		<nav class="navbar header-nav navbar-expand-lg one-page-nav">
			<div class="container">
				<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
					<?php if (isset($boston_redux_demo['logo']['url']) && $boston_redux_demo['logo']['url'] != '') {?>
						<img src="<?php echo esc_url($boston_redux_demo['logo']['url']); ?>" title="<?php bloginfo( 'name' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					<?php } else{ ?>
						<img class="logo-dark" title="<?php bloginfo( 'name' ); ?>" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri();?>/assets/img/logo.png">
					<?php } ?>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse-toggle" aria-controls="navbar-collapse-toggle" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbar-collapse-toggle">
					<?php 
						wp_nav_menu( 
						array( 
							'theme_location'  => 'primary',
							'container'       => '',
							'menu_class'      => '',
							'menu_id'         => '',
							'menu'            => '',
							'container_class' => '',
							'container_id'    => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
							'walker'          => new boston_wp_bootstrap_navwalker(),
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul  class="navbar-nav mx-auto main-menu %2$s">%3$s</ul>',
							'depth'           => 0,        
						)
					); ?>
				</div>
				<?php 
				if(isset($boston_redux_demo['enabled_btn']) && $boston_redux_demo['enabled_btn'] == true){ ?>
					<?php if (('' != $boston_redux_demo['link_btn']) && ('' != $boston_redux_demo['text_btn'])): ?>
						<div class="ms-auto d-none d-lg-block">
							<a class="px-btn px-btn-theme2" href="<?php echo esc_url(home_url('/')); ?><?php echo $boston_redux_demo['link_btn']; ?>">
								<?php echo $boston_redux_demo['text_btn']; ?>
							</a>
						</div>
					<?php endif ?>
				<?php } ?>
			</div>
		</nav>
	</header>