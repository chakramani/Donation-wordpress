<?php

/*
Widget Name: Text Button
Description: A widget which allows editing of content using the TinyMCE editor.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/editor-widget/
*/

class SiteOrigin_Widget_Text_Button_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-textbutton',
			__('Text Button', 'so-widgets-bundle'),
			array(
				'description' => __('A widget which allows editing of content using the TinyMCE editor.', 'so-widgets-bundle'),
				'help' => 'https://siteorigin.com/widgets-bundle/editor-widget/'
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);

		add_filter( 'siteorigin_widgets_sanitize_instance_sow-editor', array( $this, 'add_noreferrer_to_link_targets' ) );
	}

	function get_widget_form(){
		return array(
			'textbutton' => array(
				'type' => 'section',
				'label'  => __( 'textbutton', 'so-widgets-bundle' ),
				'hide'   => false,
				'fields' => array(
					'text' => array(
						'type' => 'text',
						'label' => __( 'Content', 'so-widgets-bundle' ),
					),
					'bt_text' => array(
						'type' => 'link',
						'label' => __( 'Button text', 'so-widgets-bundle' ),
					),
				)
			),
		);
	}

	/**
	 * Get the variables for the  widget.
	 *
	 * @param $instance
	 * @param $args
	 *
	 * @return array
	 */
	function get_template_variable($instance,$args)
    {
        if( empty( $instance ) ) return array();
        return array(
			'text_button' => $instance['textbutton']['text']
        );
    }
}

siteorigin_widget_register( 'sow-textbutton', __FILE__, 'SiteOrigin_Widget_Text_Button_Widget' );
