<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsTestimonialSection extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Bdevs Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bdevs-testimonial-section';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Bdevs Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Testimonial Section', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'bdevs-elementor' ];
	}

	public function get_keywords() {
		return [ 'testimonialsection', 'carousel' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
		$position_options = [
			''              => esc_html__('Default', 'bdevs-elementor'),
			'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
			'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
			'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
			'center'        => esc_html__('Center', 'bdevs-elementor') ,
			'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
			'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
			'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
			'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') , 
			'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
		];

		return $position_options;
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_testimonial_section',
			[
				'label' => esc_html__( 'Testimonial Section', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Section Testimonials Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Slide #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'image_item',
						'label'       => esc_html__( 'Image Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'content_item',
						'label'       => esc_html__( 'Content Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'name_item',
						'label'       => esc_html__( 'Author Name Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'job_item',
						'label'       => esc_html__( 'Author Job Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);



		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		extract($settings);
		?> 

<div class="owl-carousel lightbox-gallery" data-items="3" data-nav-dots="true" data-lg-items="2" data-md-items="2" data-sm-items="1" data-xs-items="1" data-space="30" data-autoplay="true">
	<?php
	foreach ( $settings['tabs'] as $item ) : 
	?>
		<div class="feature-box-03">
			<?php if ('' != $item['image_item']['url']): ?>
				<div class="feature-img">
					<img src="<?php echo wp_kses_post($item['image_item']['url']); ?>">
				</div>
			<?php endif ?>
			<div class="feature-content">
				<div class="icons">
					<i class="fas fa-quote-left"></i>
				</div>
				<?php if ('' != $item['content_item']): ?>
					<p><?php echo wp_kses_post($item['content_item']); ?></p>
				<?php endif ?>
				<?php if ('' != $item['name_item']): ?>
					<h6><?php echo wp_kses_post($item['name_item']); ?></h6>
				<?php endif ?>
				<?php if ('' != $item['job_item']): ?>
					<span><?php echo wp_kses_post($item['job_item']); ?></span>
				<?php endif ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<?php
if (is_admin()) { ?>
	<script type="text/javascript">
		var owlslider = $("div.owl-carousel");
		owlslider.each(function () {
			var $this = $(this),
				$items = ($this.data('items')) ? $this.data('items') : 1,
				$loop = ($this.attr('data-loop')) ? $this.data('loop') : true,
				$navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : false,
				$navarrow = ($this.data('nav-arrow')) ? $this.data('nav-arrow') : false,
				$autoplay = ($this.attr('data-autoplay')) ? $this.data('autoplay') : true,
				$autospeed = ($this.attr('data-autospeed')) ? $this.data('autospeed') : 5000,
				$smartspeed = ($this.attr('data-smartspeed')) ? $this.data('smartspeed') : 1000,
				$autohgt = ($this.data('autoheight')) ? $this.data('autoheight') : false,
				$CenterSlider = ($this.data('center')) ? $this.data('center') : false,
				$space = ($this.attr('data-space')) ? $this.data('space') : 30;    
	 
				$(this).owlCarousel({
					loop: $loop,
					items: $items,
					responsive: {
						0:{items: $this.data('xs-items') ? $this.data('xs-items') : 1},
						480:{items: $this.data('sm-items') ? $this.data('sm-items') : 1},
						768:{items: $this.data('md-items') ? $this.data('md-items') : 1},
						980:{items: $this.data('lg-items') ? $this.data('lg-items') : 1},
						1200:{items: $items}
					},
					dots: $navdots,
					autoplayTimeout:$autospeed,
					smartSpeed: $smartspeed,
					autoHeight:$autohgt,
					center:$CenterSlider,
					margin:$space,
					nav: $navarrow,
					navText:["<i class='ti-arrow-left'></i>","<i class='ti-arrow-right'></i>"],
					autoplay: $autoplay,
					autoplayHoverPause: true   
				}); 
		}); 
	</script>
<?php } ?>

<?php
}

}