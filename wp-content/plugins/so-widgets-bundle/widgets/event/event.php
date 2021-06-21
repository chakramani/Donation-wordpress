<?php

/*
Widget Name: Event
Description: A widget which allows editing of event.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/editor-widget/
*/

class SiteOrigin_Widget_Event_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-event',
			__('SiteOrigin Event', 'so-widgets-bundle'),
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
			'event' => array(
				'type' => 'repeater',
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
					'location' => array(
						'type' => 'text',
						'label' => __('location', 'so-widgets-bundle')
					),
					'date' => array(
						'type' => 'text',
						'label' => __('date', 'so-widgets-bundle')
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
			'per_row' => $instance['per_row'],
			'title' => $instance['title'],
			'content' => $instance['content'],
			'location' => $instance['location'],
			'date' => $instance['date']
		);
	}
}

siteorigin_widget_register( 'sow-event', __FILE__, 'SiteOrigin_Widget_Event_Widget' );
