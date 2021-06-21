<?php

/*
Widget Name: Connect
Description: A connect to connect all connect.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/headline-widget/
*/

use function PHPSTORM_META\type;

class SiteOrigin_Widget_Connect_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-connect',
			__( 'SiteOrigin connect', 'so-widgets-bundle' ),
			array(
				'description' => __( 'A progressbar to progressbar all progressbars.', 'so-widgets-bundle' )
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form(){
		return array(
			'connect' => array(
				'type' => 'section',
				'label'  => __( 'Connect', 'so-widgets-bundle' ),
				'hide'   => true,
				'fields' => array(
					'image' => array(
						'type' => 'media',
						'label' => __( 'Title', 'so-widgets-bundle' ),
					),
					'text' => array(
						'type' => 'tinymce',
						'label' => __( 'Title', 'so-widgets-bundle' ),
					),
				)
			),
			'other' => array(
				'type' => 'repeater',
				'label'  => __( 'Other', 'so-widgets-bundle' ),
				'hide'   => true,
				'fields' => array(
					'icon' => array(
						'type' => 'icon',
						'label' => __( 'Icon', 'so-widgets-bundle' ),
					),
					'text' => array(
						'type' => 'text',
						'label' => __( 'Title', 'so-widgets-bundle' ),
					),
				)
			),
				
		);
	}

    function get_less_variable($instance)
    {
        $less_vars = array();

        // progressbar
		$less_vars['progressbar_tag'] = isset( $instance['progressbar']['tag'] ) ? $instance['headline']['tag'] : false;
		$less_vars['progressbar_color'] = isset( $instance['progressbar']['color'] ) ? $instance['headline']['color'] : false;
    }

    function get_template_variable($instance,$args)
    {
        if( empty( $instance ) ) return array();
		var_dump($instance);
        return array(
			'progressbar_text' => $instance['progressbar']['text'],
			'text_percentage' => $instance['progressbar']['percentage'],
			'progressbar_tag' => $instance['progresbar']['tag']
        );
    }
}

siteorigin_widget_register('sow-connect', __FILE__, 'SiteOrigin_Widget_Connect_Widget');
