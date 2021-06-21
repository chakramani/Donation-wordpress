<?php

/*
Widget Name: Banner
Description: A widget which allows editing of Banner.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/editor-widget/
*/

class SiteOrigin_Widget_Banner_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-banner',
			__('SiteOrigin Banner', 'so-widgets-bundle'),
			array(
				'description' => __('Description: A widget which allows editing of Bannner.', 'so-widgets-bundle')
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form() {
		return array(
			'banner' => array(
				'type' => 'section',
				'label' => __( 'banner', 'so-widgets-bundle' ),
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
						'label' => __('Card Title', 'so-widgets-bundle')
					),
					'title1' => array(
						'type' => 'text',
						'label' => __( 'Card Content', 'so-widgets-bundle' ),
					),
					'goal' => array(
						'type' => 'text',
						'label' => __('goal amount', 'so-widgets-bundle')
					),
					'raised' => array(
						'type' => 'text',
						'label' => __('Raised amount', 'so-widgets-bundle')
					),
					'button' => array(
						'type' => 'text',
						'label' => __('Button text', 'so-widgets-bundle')
					),
					'link' => array(
						'type' => 'link',
						'label' => __('Button link', 'so-widgets-bundle')
					),
				),
			),
			'bannerimage' => array(
				'type' => 'repeater',
				'label' => __( 'bannerimage', 'so-widgets-bundle' ),
				'hide' => true,
				'fields' => array(
					'image1' => array(
						'type' => 'media',
						'library' => 'image',
						'label' => __( 'Icon image', 'so-widgets-bundle' ),
						'description' => __( 'Use your own icon image.', 'so-widgets-bundle' ),
						'fallback' => true,
					),
				),
			),

		);
	}
	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();
		// var_dump($instance['bannerimage']);

		return array(
			'image' => $instance['banner']['image'],
			'title' => $instance['banner']['title'],
			'title1' => $instance['banner']['title1'],
			'goal' => $instance['banner']['goal'],
			'raised' => $instance['banner']['raised'],
			'button' => $instance['banner']['button'],
			'link' => $instance['banner']['link']

		);
	}
}

siteorigin_widget_register( 'sow-banner', __FILE__, 'SiteOrigin_Widget_Banner_Widget' );
