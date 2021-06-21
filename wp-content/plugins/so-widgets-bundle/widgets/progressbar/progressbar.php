<?php

/*
Widget Name: Progressbar
Description: A progressbar to progressbar all progressbars.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/headline-widget/
*/

class SiteOrigin_Widget_Progress_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-progressbar',
			__( 'SiteOrigin Progressbar', 'so-widgets-bundle' ),
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
			'progressbar' => array(
				'type' => 'repeater',
				'label'  => __( 'progressbar', 'so-widgets-bundle' ),
				'hide'   => false,
				'fields' => array(
					'text' => array(
						'type' => 'text',
						'label' => __( 'Title', 'so-widgets-bundle' ),
					),
                    'percentage' => array(
						'type' => 'text',
						'label' => __( 'Percentage', 'so-widgets-bundle' ),
					),
                    'tag' => array(
						'type' => 'select',
						'label' => __( 'HTML Tag', 'so-widgets-bundle' ),
						'default' => 'h1',
						'options' => array(
							'h1' => __( 'H1', 'so-widgets-bundle' ),
							'h2' => __( 'H2', 'so-widgets-bundle' ),
							'h3' => __( 'H3', 'so-widgets-bundle' ),
							'h4' => __( 'H4', 'so-widgets-bundle' ),
							'h5' => __( 'H5', 'so-widgets-bundle' ),
							'h6' => __( 'H6', 'so-widgets-bundle' ),
							'p' => __( 'Paragraph', 'so-widgets-bundle' ),
						)
					),
                    'color' => array(
						'type' => 'color',
						'label' => __('Color', 'so-widgets-bundle'),
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

siteorigin_widget_register('sow-progressbar', __FILE__, 'SiteOrigin_Widget_Progress_Widget');
