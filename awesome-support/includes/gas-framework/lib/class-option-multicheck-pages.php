<?php

if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly
}
class GASFrameworkOptionMulticheckPages extends GASFrameworkOptionMulticheck {

	public $defaultSecondarySettings = array(
		'options' => array(),
		'select_all' => false
	);

	private static $allPages;

	/*
	 * Display for options and meta
	 */
	public function display() {

		// Remember the pages so as not to perform any more lookups
		if ( ! isset( self::$allPages ) ) {
			self::$allPages = get_pages();
		}

		$this->settings['options'] = array();
		foreach ( self::$allPages as $page ) {
			$title = $page->post_title;
			if ( empty( $title ) ) {
				// translators: %s is the title.
				$x_content = __( 'Untitled %s', 'awesome-support' );
				$title = sprintf( $x_content, '(ID #' . $page->ID . ')' );
			}
			$this->settings['options'][ $page->ID ] = $title;
		}

		parent::display();
	}

	/*
	 * Display for theme customizer
	 */
	public function registerCustomizerControl( $wp_customize, $section, $priority = 1 ) {
		// Remember the pages so as not to perform any more lookups
		if ( ! isset( self::$allPages ) ) {
			self::$allPages = get_pages();
		}

		$this->settings['options'] = array();
		foreach ( self::$allPages as $page ) {
			$title = $page->post_title;
			if ( empty( $title ) ) {
				// translators: %s is the title.
				$x_content = __( 'Untitled %s', 'awesome-support' );
				$title = sprintf( $x_content, '(ID #' . $page->ID . ')' );
			}
			$this->settings['options'][ $page->ID ] = $title;
		}

		$wp_customize->add_control( new GASFrameworkOptionMulticheckControl( $wp_customize, $this->getID(), array(
			'label' => $this->settings['name'],
			'section' => $section->settings['id'],
			'settings' => $this->getID(),
			'description' => $this->settings['desc'],
			'options' => $this->settings['options'],
			'select_all' => $this->settings['select_all'],
			'priority' => $priority,
		) ) );
	}
}
