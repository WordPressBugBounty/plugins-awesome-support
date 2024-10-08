<?php
/**
 * Iframe option
 *
 * @package GAS Framework
 */

if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly.
}

/**
 * Iframe option class
 *
 * @since 1.0
 */
class GASFrameworkOptionIframe extends GASFrameworkOption {

	/**
	 * Default settings specific to this option
	 * @var array
	 */
	public $defaultSecondarySettings = array(
		'url' => '',
		'height' => '400', // In pixels.
	);

	/**
	 * Display for options and meta
	 */
	public function display() {

		$this->echoOptionHeader();

		printf( '<iframe frameborder="0" src="%s" style="height: %spx; width:100%%;"></iframe>',
			esc_url($this->settings['url']),
			esc_attr($this->settings['height'])
		);
		$this->echoOptionFooter();

	}

	/**
	 * Display for theme customizer
	 *
	 * @param WP_Customize             $wp_customize The customizer object.
	 * @param GASFrameworkCustomizer $section      The customizer section.
	 * @param int                      $priority     The display priority of the control.
	 */
	public function registerCustomizerControl( $wp_customize, $section, $priority = 1 ) {
		$wp_customize->add_control( new GASFrameworkOptionIframeControl( $wp_customize, $this->getID(), array(
			'label' => $this->settings['name'],
			'section' => $section->settings['id'],
			'type' => 'select',
			'settings' => $this->getID(),
			'priority' => $priority,
			'optionSettings' => $this->settings,
		) ) );
	}
}


// We create a new control for the theme customizer.
add_action( 'customize_register', 'register_gas_framework_option_iframe_control', 1 );

/**
 * Register the customizer control
 */
function register_gas_framework_option_iframe_control() {

	/**
	 * Iframe option class
	 *
	 * @since 1.0
	 */
	class GASFrameworkOptionIframeControl extends WP_Customize_Control {

		/**
		 * The iframe content control
		 *
		 * @var bool
		 */
		public $optionSettings;

		/**
		 * Renders the control
		 */
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php
				printf( '<iframe frameborder="0" src="%s" style="height: %spx; width:100%%;"></iframe>',
					esc_url($this->optionSettings['url']),
					esc_attr($this->optionSettings['height'])
				);

				if ( ! empty( $this->optionSettings['desc'] ) ) {
					echo "<p class='description'>" . wp_kses_post($this->optionSettings['desc']) . "</p>";
				}
				?>
			</label>
			<?php
		}
	}
}
