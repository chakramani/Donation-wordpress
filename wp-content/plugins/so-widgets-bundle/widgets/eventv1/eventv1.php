<?php

/*
Widget Name: EventV1
Description: A widget which allows editing of event.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/editor-widget/
*/

class SiteOrigin_Widget_EventV1_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-eventv1',
			__('SiteOrigin EventV1', 'so-widgets-bundle'),
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
					'time' => array(
						'type' => 'text',
						'label' => __('time', 'so-widgets-bundle')
					),
				),
			),
			'event1' => array(
				'type' => 'repeater',
				'label' => __( 'event', 'so-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'image1' => array(
						'type' => 'media',
						'library' => 'image',
						'label' => __( 'Icon image', 'so-widgets-bundle' ),
						'description' => __( 'Use your own icon image.', 'so-widgets-bundle' ),
						'fallback' => true,
					),
					'title1' => array(
						'type' => 'text',
						'label' => __('heading', 'so-widgets-bundle')
					),
					'content1' => array(
						'type' => 'tinymce',
						'label' => __( 'Content', 'so-widgets-bundle' ),
					),
					'location1' => array(
						'type' => 'text',
						'label' => __('location', 'so-widgets-bundle')
					),
					'date1' => array(
						'type' => 'text',
						'label' => __('date', 'so-widgets-bundle')
					),
					'time1' => array(
						'type' => 'text',
						'label' => __('time', 'so-widgets-bundle')
					),
				),
			),

		);
	}
	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();

		// var_dump($instance['per_row']);

		return array(
			'image' => $instance['event']['image'],
			'title' => $instance['title'],
			'content' => $instance['content'],
			'location' => $instance['location'],
			'date' => $instance['date'],
			'time' => $instance['time'],
			'image1' => $instance['event']['image1'],
			'title1' => $instance['title1'],
			'content1' => $instance['content1'],
			'location1' => $instance['location1'],
			'date1' => $instance['date1'],
			'time1' => $instance['time11']
		);
	}
}

siteorigin_widget_register( 'sow-eventv1', __FILE__, 'SiteOrigin_Widget_EventV1_Widget' );
