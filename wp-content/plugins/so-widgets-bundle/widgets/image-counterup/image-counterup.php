<?php

/*
Widget Name: Image Counterup
Description: A widget which allows editing of event.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/editor-widget/
*/

class SiteOrigin_Widget_ImageCounerUp_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-image-counterup',
			__('SiteOrigin Image CounterUp', 'so-widgets-bundle'),
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
			'imagecounter' => array(
				'type' => 'repeater',
				'label' => __( 'event', 'so-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'image' => array(
						'type' => 'media',
						'label' => __('Image file', 'so-widgets-bundle'),
						'library' => 'image',
						'fallback' => true,
					),
					'count' => array(
						'type' => 'text',
						'label' => __('Count Number', 'so-widgets-bundle')
					),
					'topic' => array(
						'type' => 'text',
						'label' => __( 'Topic', 'so-widgets-bundle' ),
					),
					'icon' => array(
						'type' => 'icon',
						'label' => __('icon', 'so-widgets-bundle')
					),
				),
			),

		);
	}

	function get_less_variables( $instance ) {
		$less_vars = array();
		// All the headline attributes
		$less_vars['image'] = isset( $instance['imagecounter']['image'] ) ? $instance['imagecounterup']['image'] : false;
		
		return $less_vars;
	}


	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();
		// var_dump($instance['imagecounter']);
		return array(
			'imagecounter' => $instance['imagecounter']
		);
	}
}

siteorigin_widget_register( 'sow-image-counterup', __FILE__, 'SiteOrigin_Widget_ImageCounerUp_Widget' );
