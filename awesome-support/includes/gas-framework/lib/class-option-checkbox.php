<?php

if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly
}
class GASFrameworkOptionCheckbox extends GASFrameworkOption {

	/*
	 * Display for options and meta
	 */
	public function display() {
		$this->echoOptionHeader();

		?>
		<label for="<?php echo esc_attr($this->getID()) ?>">
		<input name="<?php echo esc_attr($this->getID()) ?>" type="checkbox" id="<?php echo esc_attr($this->getID()) ?>" value="1" <?php checked( $this->getValue(), 1 ) ?>>
		<?php echo wp_kses_post($this->getDesc( '' )) ?>
		</label>
		<?php

		$this->echoOptionFooter( false );
	}

	public function cleanValueForSaving( $value ) {
		return $value != '1' ? '0' : '1';
	}

	public function cleanValueForGetting( $value ) {
		if ( is_bool( $value ) ) {
			return $value;
		}

		return $value == '1' ? true : false;
	}

	/*
	 * Display for theme customizer
	 */
	public function registerCustomizerControl( $wp_customize, $section, $priority = 1 ) {
		$wp_customize->add_control( new GASFrameworkCustomizeControl( $wp_customize, $this->getID(), array(
			'label' => $this->settings['name'],
			'section' => $section->settings['id'],
			'settings' => $this->getID(),
			'type' => 'checkbox',
			'description' => $this->settings['desc'],
			'priority' => $priority,
		) ) );
	}
}
