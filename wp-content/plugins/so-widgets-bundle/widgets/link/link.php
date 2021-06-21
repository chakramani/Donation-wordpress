<?php

/*
Widget Name: Link
Description: A widget which allows list the pages or posts.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/
*/

class SiteOrigin_Widget_Link_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-link',
			__('SiteOrigin Link', 'so-widgets-bundle'),
			array(
				'description' => __('A widget which allows list the pages or posts.', 'so-widgets-bundle'),
				'help' => 'https://siteorigin.com/widgets-bundle/'
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form(){
		return array(
			'link' => array(
				'type' => 'section',
				'label'  => __( 'Headline', 'so-widgets-bundle' ),
				'hide'   => false,
				'fields' => array(
					'title' => array(
						'type' => 'text',
						'label' => __( 'Text', 'so-widgets-bundle' ),
					),
					'tag' => array(
						'type' => 'select',
						'label' => __( 'HTML Tag', 'so-widgets-bundle' ),
						'default' => 'h3',
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
					'title_color' => array(
						'type' => 'color',
						'label' => __('Title Color', 'so-widgets-bundle'),
					),
					'align' => array(
						'type' => 'select',
						'label' => __( 'Alignment', 'so-widgets-bundle' ),
						'default' => 'center',
						'options' => array(
							'center' => __( 'Center', 'so-widgets-bundle' ),
							'left' => __( 'Left', 'so-widgets-bundle' ),
							'right' => __( 'Right', 'so-widgets-bundle' ),
							'justify' => __( 'Justify', 'so-widgets-bundle' )
						)
					),
					'posts' => array(
						'type' => 'posts',
						'label' => __('Posts query', 'so-widgets-bundle'),
						'hide' => true,
						'fields' => array(
							'posts_per_page' => array(
								'label' => __( 'Posts per load', 'so-widgets-bundle' ),
								'description' => __( 'Set the number of posts preloaded in the background when clicking next. The default is 10.', 'so-widgets-bundle' ),
							),
						),
					),
				)
			),
		);
	}

	
	function get_less_variables( $instance ) {
		$less_vars = array();


		// All the headline attributes
		$less_vars['align'] = isset( $instance['link']['align'] ) ? $instance['link']['align'] : false;
		$less_vars['title_color'] = isset( $instance['link']['title_color'] ) ? $instance['link']['title_color'] : false;

		
		return $less_vars;
	}



	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();


		// var_dump($instance);
		$query = siteorigin_widget_post_selector_process_query( wp_parse_args(
			$instance['posts'],
			array(
				'paged' => empty( $instance['paged'] ) ? 1 : $instance['paged'],
			)
		) );
		$posts = new WP_Query( $query );

		// var_dump($posts);
		return array(
			'title' => $instance['link']['title'],
			'title_tag' => $instance['link']['tag'],
			'align' => $instance['link']['align'],
			'posts' => $posts
		);
		
	}
}

siteorigin_widget_register( 'sow-link', __FILE__, 'SiteOrigin_Widget_Link_Widget' );
