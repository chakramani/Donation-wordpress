<?php

/*
Widget Name: Our Cause
Description: A widget which allows editing of our Cause.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/editor-widget/
*/

class SiteOrigin_Widget_OurCause_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-our-cause',
			__('SiteOrigin Our Cause', 'so-widgets-bundle'),
			array(
				'description' => __('Description: A widget which allows editing of Our Cause.', 'so-widgets-bundle')
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form() {
		return array(
			'ourcause' => array(
				'type' => 'repeater',
				'label' => __( 'Our Cause', 'so-widgets-bundle' ),
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
					'raised' => array(
						'type' => 'text',
						'label' => __('Raised amount', 'so-widgets-bundle')
					),
					'goal' => array(
						'type' => 'text',
						'label' => __('Goal amount', 'so-widgets-bundle')
					),
					'button' => array(
						'type' => 'text',
						'label' => __('Button Text', 'so-widgets-bundle')
					),
					'link' => array(
						'type' => 'link',
						'label' => __('Button link', 'so-widgets-bundle')
					),
				),
			),
			'per_row' => array(
				'type' => 'number',
				'label' => __( 'Features per row', 'so-widgets-bundle' ),
				'default' => 3,
			),

		);
	}
	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();

		return array(
			'image' => $instance['event']['image'],
			'per_row' => $instance['event']['per_row'],
			'title' => $instance['event']['title'],
			'content' => $instance['event']['content'],
			'raised' => $instance['event']['location'],
			'goal' => $instance['event']['date'],
			'button' => $instance['event']['button'],
			'link' => $instance['event']['link']
		);
	}
}

siteorigin_widget_register( 'sow-our-cause', __FILE__, 'SiteOrigin_Widget_OurCause_Widget' );
