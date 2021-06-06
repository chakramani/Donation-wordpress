<?php

/*
Widget Name: About Section
Description: A widget which allows editing of content using the TinyMCE editor.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/editor-widget/
*/

class SiteOrigin_Widget_About_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-about',
			__('About Section', 'so-widgets-bundle'),
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
					'url' => array(
						'type' => 'link',
						'label' => __( 'Link for Content', 'so-widgets-bundle' ),
					),
					'text1' => array(
						'type' => 'text',
						'label' => __( 'first page', 'so-widgets-bundle' ),
					),
					'url1' => array(
						'type' => 'link',
						'label' => __( 'Link for first page', 'so-widgets-bundle' ),
					),
					'text2' => array(
						'type' => 'text',
						'label' => __( 'second page', 'so-widgets-bundle' ),
					),
					'url2' => array(
						'type' => 'link',
						'label' => __( 'Link for second page', 'so-widgets-bundle' ),
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
		var_dump($instance);
        return array(
			'text_button' => $instance['textbutton']['text']
        );
    }
}

siteorigin_widget_register( 'sow-about', __FILE__, 'SiteOrigin_Widget_About_Widget' );
