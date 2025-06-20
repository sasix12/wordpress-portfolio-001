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
class BdevsHomeSection extends \Elementor\Widget_Base {

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
		return 'bdevs-home-section';
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
		return __( 'Home Section', 'bdevs-elementor' );
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
		return 'eicon-info-circle';
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
		return [ 'homesection', 'carousel' ];
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
			'section_content_home_section',
			[
				'label' => esc_html__( 'Home Section', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'img_effect_1',
			[
				'label'       => esc_html__( 'Effect Image Top Left', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload effect image top left', 'bdevs-elementor' ),
			]	
		);
		$this->add_control(
			'img_effect_2',
			[
				'label'       => esc_html__( 'Effect Image Bottom Right', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload effect image bottom right', 'bdevs-elementor' ),
			]	
		);
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Text Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( 'Hello.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Text Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( 'We Have Design Experience', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'content',
			[
				'label'       => __( 'Text Content', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text content', 'bdevs-elementor' ),
				'default'     => __( 'I design and develop services...', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'link_btn',
			[
				'label'       => __( 'Link Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text link button', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text_btn',
			[
				'label'       => __( 'Text Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text text button', 'bdevs-elementor' ),
				'default'     => __( "Let's Talk", 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'img_banner',
			[
				'label'       => esc_html__( 'Banner Image', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload banner image', 'bdevs-elementor' ),
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

<section class="home-section">
	<?php if ('' != $settings['img_effect_1']['url']): ?>
		<div class="effect-1">
			<img src="<?php echo wp_kses_post($settings['img_effect_1']['url']); ?>">
		</div>
	<?php endif ?>
	<?php if ('' != $settings['img_effect_2']['url']): ?>
		<div class="effect-2">
			<img src="<?php echo wp_kses_post($settings['img_effect_2']['url']); ?>">
		</div>
	<?php endif ?>
	<div class="container">
		<div class="row min-vh-100 align-items-center">
			<?php if ('' != $settings['img_banner']['url']) { ?>
				<div class="col-lg-6 pe-xl-5 py-5">
			<?php } else { ?>
				<div class="col-lg-12 pe-xl-5 py-5">
			<?php } ?>
					<div class="home-intro one-page-nav">
						<?php if ('' != $settings['heading']): ?>
							<h6><span><?php echo wp_kses_post($settings['heading']); ?></span></h6>
						<?php endif ?>
						<?php if ('' != $settings['title']): ?>
							<h1><?php echo wp_kses_post($settings['title']); ?></h1>
						<?php endif ?>
						<?php if ('' != $settings['content']): ?>
							<p><?php echo wp_kses_post($settings['content']); ?></p>
						<?php endif ?>
						<?php if (('' != $settings['link_btn']) && ('' != $settings['text_btn'])): ?>
							<div class="btn-bar">
								<a class="px-btn px-btn-theme" href="<?php echo wp_kses_post($settings['link_btn']); ?>">
									<?php echo wp_kses_post($settings['text_btn']); ?>
								</a>
							</div>
						<?php endif ?>
					</div>
				</div>
			<?php if ('' != $settings['img_banner']['url']): ?>
				<div class="col-lg-6">
					<div class="home-image">
						<img src="<?php echo wp_kses_post($settings['img_banner']['url']); ?>">
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>
</section>

<?php
}

}