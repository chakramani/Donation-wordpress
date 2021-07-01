<?php

/*
Widget Name: Popular post
Description: A widget which allows editing of event.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/editor-widget/
*/

class SiteOrigin_Widget_Popular_Post_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-popular-post',
			__('SiteOrigin popular-post', 'so-widgets-bundle'),
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
			'title' => array(
				'type' => 'text',
				'label' => __('Title', 'so-widgets-bundle')
			),
		);
	}
	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();
		return array(
			'title' => $instance['title']
		);
	}
}

siteorigin_widget_register( 'sow-popular-post', __FILE__, 'SiteOrigin_Widget_Popular_Post_Widget' );
