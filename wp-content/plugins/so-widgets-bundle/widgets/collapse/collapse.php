<?php

/*
Widget Name: Collapse
Description: A headline to headline all headlines.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/headline-widget/
*/

class SiteOrigin_Widget_Collapse_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-collapse',
			__( 'SiteOrigin Collapse', 'so-widgets-bundle' ),
			array(
				'description' => __( 'A headline to headline all headlines.', 'so-widgets-bundle' )
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form(){

		return array(
			'collapse' => array(
				'type' => 'repeater',
				'label'  => __( 'collapse', 'so-widgets-bundle' ),
				'hide'   => false,
				'fields' => array(
					'text' => array(
						'type' => 'text',
						'label' => __( 'Text', 'so-widgets-bundle' ),
					),
                    'content' => array(
						'type' => 'text',
						'label' => __( 'Content', 'so-widgets-bundle' ),
					),
				)
			),
		);
	}


	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();
		return array(
			'head' => $instance['collapse']
		);
	}
}

siteorigin_widget_register('sow-collapse', __FILE__, 'SiteOrigin_Widget_Collapse_Widget');
