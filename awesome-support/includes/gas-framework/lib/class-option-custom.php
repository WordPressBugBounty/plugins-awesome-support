<?php
/**
 * Custom option
 *
 * @package GAS Framework
 */

if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly.
}

/**
 * Custom option class
 *
 * @since 1.0
 */
class GASFrameworkOptionCustom extends GASFrameworkOption {

	/**
	 * Default settings specific to this option
	 * @var array
	 */
	public $defaultSecondarySettings = array(
		'custom' => '', // Custom HTML
	);

	/**
	 * Display for options and meta
	 */
	public function display() {
		if ( ! empty( $this->settings['name'] ) ) {

			$this->echoOptionHeader();
			echo wp_kses($this->settings['custom'], wpas_get_allowed_html_tags());
			$this->echoOptionFooter( false );

		} else {

			$this->echoOptionHeaderBare();
			echo wp_kses($this->settings['custom'], wpas_get_allowed_html_tags());
			$this->echoOptionFooterBare( false );

		}
	}

	/**
	 * Display for theme customizer
	 *
	 * @param WP_Customize             $wp_customize The customizer object.
	 * @param GASFrameworkCustomizer $section      The customizer section.
	 * @param int                      $priority     The display priority of the control.
	 */
	public function registerCustomizerControl( $wp_customize, $section, $priority = 1 ) {
		$wp_customize->add_control( new GASFrameworkOptionCustomControl( $wp_customize, $this->getID(), array(
			'label' => $this->settings['name'],
			'section' => $section->settings['id'],
			'type' => 'select',
			'settings' => $this->getID(),
			'priority' => $priority,
			'custom' => $this->settings['custom'],
		) ) );
	}
}


// We create a new control for the theme customizer.
add_action( 'customize_register', 'register_gas_framework_option_custom_control', 1 );

/**
 * Register the customizer control
 */
function register_gas_framework_option_custom_control() {

	/**
	 * Custom option class
	 *
	 * @since 1.0
	 */
	class GASFrameworkOptionCustomControl extends WP_Customize_Control {

		/**
		 * The custom content control
		 *
		 * @var bool
		 */
		public $custom;

		/**
		 * Renders the control
		 */
		public function render_content() {
			echo wp_kses($this->custom, wpas_get_allowed_html_tags());
		}
	}
}
