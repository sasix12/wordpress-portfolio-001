<?php
/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class boston_widget_newss extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_news', 'description' => esc_html__( "The most recent posts on your site", 'boston') );
		parent::__construct('recent-posts', esc_html__(' Recent Posts', 'boston'), $widget_ops);
		$this->alt_option_name = 'widget_news';
	}
	function widget($args, $instance) {
		$cache = wp_cache_get('boston_widget_newss', 'widget');
		if ( !is_array($cache) )
			$cache = array();
		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo wp_specialchars_decode(esc_attr($cache[ $args['widget_id'] ]));
			return;
		}
		ob_start();
		extract($args);
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'boston' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
		if ( ! $number )
			$number = 10;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if ($r->have_posts()) :
?>
		<?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
		<?php if ( $title ) echo wp_specialchars_decode(esc_attr($before_title),ENT_QUOTES) . esc_attr($title) . wp_specialchars_decode(esc_attr($after_title),ENT_QUOTES); ?>
		   
			<ul class="recent">
				<?php
				while ( $r->have_posts() ) : $r->the_post();
				?>
				<li>
					<?php if (!empty(get_the_post_thumbnail())) { ?>
						<div class="thum"> <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php the_title(); ?> "> </div> 
					<?php } ?>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
				</li>
				<?php endwhile; ?>
			</ul>
		<?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('boston_widget_newss', $cache, 'widget');
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = (bool) $new_instance['show_date'];
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_news']) )
			delete_option('widget_news');
		return $instance;
	}
	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'boston' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'boston' ); ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>
		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
		<label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?', 'boston' ); ?></label></p>
<?php
	}
}

class boston_widget_search extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_search', 'description' => esc_html__( "Search on your site", 'boston') );
		parent::__construct('search', esc_html__('Search', 'boston'), $widget_ops);
		$this->alt_option_name = 'widget_search';
	}
	function widget($args, $instance) {
		$cache = wp_cache_get('boston_widget_search', 'widget');
		if ( !is_array($cache) )
			$cache = array();
		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo wp_specialchars_decode(esc_attr($cache[ $args['widget_id'] ]));
			return;
		}
		ob_start(); 
		extract($args);
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Search', 'boston' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		?>
		<?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
		<div class="widget search">
			<form>
				<input type="text" name="s" placeholder="Type here ..." >
				<button type="submit"><i class="fas fa-search"></i></button>
			</form>
		</div>
		<?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('boston_widget_search', $cache, 'widget');
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_search']) )
			delete_option('widget_search');
		return $instance;
	}
	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'boston' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
	}
}

function boston_register_custom_widgets() {
	register_widget( 'boston_widget_search' );
	register_widget( 'boston_widget_newss' );
}
add_action( 'widgets_init', 'boston_register_custom_widgets' );