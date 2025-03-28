<?php

if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly
}
class GASFrameworkOptionMulticheckPosts extends GASFrameworkOptionMulticheck {

	public $defaultSecondarySettings = array(
		'options' => array(),
		'post_type' => 'post',
		'num' => -1,
		'post_status' => 'any',
		'orderby' => 'post_date',
		'order' => 'DESC',
		'select_all' => false
	);

	/*
	 * Display for options and meta
	 */
	public function display() {
		$args = array(
			'post_type' => $this->settings['post_type'],
			'posts_per_page' => $this->settings['num'],
			'post_status' => $this->settings['post_status'],
			'orderby' => $this->settings['orderby'],
			'order' => $this->settings['order'],
		);

		$posts = get_posts( $args );

		$this->settings['options'] = array();
		foreach ( $posts as $post ) {
			$title = $post->post_title;
			if ( empty( $title ) ) {
				// translators: %s is the title.
				$x_content = __( 'Untitled %s', 'awesome-support' );
				$title = sprintf( $x_content, '(ID #' . $post->ID . ')' );
			}
			$this->settings['options'][ $post->ID ] = $title;
		}

		parent::display();
	}

	/*
	 * Display for theme customizer
	 */
	public function registerCustomizerControl( $wp_customize, $section, $priority = 1 ) {
		$args = array(
			'post_type' => $this->settings['post_type'],
			'posts_per_page' => $this->settings['num'],
			'post_status' => $this->settings['post_status'],
			'orderby' => $this->settings['orderby'],
			'order' => $this->settings['order'],
		);

		$posts = get_posts( $args );

		$this->settings['options'] = array();
		foreach ( $posts as $post ) {
			$title = $post->post_title;
			if ( empty( $title ) ) {
				// translators: %s is the title.
				$x_content = __( 'Untitled %s', 'awesome-support' );
				$title = sprintf( $x_content, '(ID #' . $post->ID . ')' );
			}
			$this->settings['options'][ $post->ID ] = $title;
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
