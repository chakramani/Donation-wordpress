<?php

/*
Widget Name: who-we-are
Description: A widget which allows editing of event.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/editor-widget/
*/

class SiteOrigin_Widget_Who_We_Are_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-who-we-are',
			__('SiteOrigin who-we-are', 'so-widgets-bundle'),
			array(
				'description' => __('Description: A widget which allows editing of event.', 'so-widgets-bundle')
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form() {
		return array(
			'whoweare' => array(
				'type' => 'section',
				'label' => __( 'event', 'so-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'image' => array(
						'type' => 'media',
						'library' => 'image',
						'label' => __( 'Icon image', 'so-widgets-bundle' ),
						'description' => __( 'Use your own icon image.', 'so-widgets-bundle' ),
						'fallback' => true,
					),
					'title' => array(
						'type' => 'text',
						'label' => __('heading', 'so-widgets-bundle')
					),
					'content' => array(
						'type' => 'tinymce',
						'label' => __( 'Content', 'so-widgets-bundle' ),
					),
					'button' => array(
						'type' => 'text',
						'label' => __('Button Text', 'so-widgets-bundle')
					),
					'link' => array(
						'type' => 'link',
						'label' => __('button link', 'so-widgets-bundle')
					),
				),
			),

		);
	}
	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();

		// var_dump($instance['whoweare']['image']);
		return array(
			'image' => $instance['whoweare']['image'],
			'title' => $instance['whoweare']['title'],
			'content' => $instance['whoweare']['content'],
			'button' => $instance['whoweare']['button'],
			'link' => $instance['whoweare']['link']
		);
	}
}

siteorigin_widget_register( 'sow-who-we-are', __FILE__, 'SiteOrigin_Widget_Who_We_Are_Widget' );
