<?php
/*
Widget Name: Team Work
Description: Displays a block of team-work with icons.
Author: SiteOrigin
Author URI: https://siteorigin.com
Documentation: https://siteorigin.com/widgets-bundle/team-work-widget-documentation/
*/

class SiteOrigin_Widget_team_Widget extends SiteOrigin_Widget {
	private $networks;

	
	function __construct() {
		parent::__construct(
			'sow-team-work',
			__( 'SiteOrigin Team Work', 'so-widgets-bundle' ),
			array(
				'description' => __( 'Displays a block of team-work with icons.', 'so-widgets-bundle' ),
				'help'        => 'https://siteorigin.com/widgets-bundle/image-combo-widget-documentation/'
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}
	

	function get_widget_form(){

		return array(
			'features' => array(
				'type' => 'repeater',
				'label' => __( 'Features', 'so-widgets-bundle' ),
				'item_name' => __( 'Feature', 'so-widgets-bundle' ),
				'item_label' => array(
					'selector'     => "[id*='features-title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(


					'icon_image' => array(
						'type' => 'media',
						'library' => 'image',
						'label' => __( 'Icon image', 'so-widgets-bundle' ),
						'description' => __( 'Use your own icon image.', 'so-widgets-bundle' ),
						'fallback' => true,
					),

					// The text under the icon

					'title' => array(
						'type' => 'text',
						'label' => __( 'Title text', 'so-widgets-bundle' ),
					),
					'subtitle' => array(
						'type' => 'text',
						'label' => __( 'subtitle text', 'so-widgets-bundle' ),
					),
					// 'facebook_icon' => array(
					// 	'type' => 'icon',
					// 	'label' => __( 'Facebook Icon', 'so-widgets-bundle' ),
					// ),
					// 'youtube_icon' => array(
					// 	'type' => 'icon',
					// 	'label' => __( 'Youtube Icon', 'so-widgets-bundle' ),
					// ),
					// 'instragram_icon' => array(
					// 	'type' => 'icon',
					// 	'label' => __( 'Instragram Icon', 'so-widgets-bundle' ),
					// ),
					// 'twitter_icon' => array(
					// 	'type' => 'icon',
					// 	'label' => __( 'Twitter Icon', 'so-widgets-bundle' ),
					// ),

					

					
					'vision' => array(
						'type' => 'text',
						'label' => __( 'vision text', 'so-widgets-bundle' ),
					),

					'more_text' => array(
						'type' => 'text',
						'label' => __( 'More link text', 'so-widgets-bundle' ),
					),

					'more_url' => array(
						'type' => 'link',
						'label' => __( 'More link URL', 'so-widgets-bundle' ),
					),
				),
			),

			// 'container_size' => array(
			// 	'type' => 'measurement',
			// 	'label' => __( 'Icon container size', 'so-widgets-bundle' ),
			// 	'default' => '84px',
			// ),

			// 'icon_size' => array(
			// 	'type' => 'measurement',
			// 	'label' => __( 'Icon size', 'so-widgets-bundle' ),
			// 	'default' => '24px',
			// ),

			// 'icon_size_custom' => array(
			// 	'type' => 'checkbox',
			// 	'label' => __( 'Use icon size for custom icon', 'so-widgets-bundle' ),
			// 	'default' => false,
			// ),

			// 'title_tag' => array(
			// 	'type' => 'select',
			// 	'label' => __( 'Title text HTML tag', 'so-widgets-bundle' ),
			// 	'default' => 'h1',
			// 	'options' => array(
			// 		'h1' => __( 'H1', 'so-widgets-bundle' ),
			// 		'h2' => __( 'H2', 'so-widgets-bundle' ),
			// 		'h3' => __( 'H3', 'so-widgets-bundle' ),
			// 		'h4' => __( 'H4', 'so-widgets-bundle' ),
			// 		'h5' => __( 'H5', 'so-widgets-bundle' ),
			// 		'h6' => __( 'H6', 'so-widgets-bundle' ),
			// 	)
			// ),

			
			// 'subtitle_tag' => array(
			// 	'type' => 'select',
			// 	'label' => __( 'Subtitle text HTML tag', 'so-widgets-bundle' ),
			// 	'default' => 'p',
			// 	'options' => array(
			// 		'h1' => __( 'H1', 'so-widgets-bundle' ),
			// 		'h2' => __( 'H2', 'so-widgets-bundle' ),
			// 		'h3' => __( 'H3', 'so-widgets-bundle' ),
			// 		'h4' => __( 'H4', 'so-widgets-bundle' ),
			// 		'h5' => __( 'H5', 'so-widgets-bundle' ),
			// 		'h6' => __( 'H6', 'so-widgets-bundle' ),
			// 		'P' => __( 'P', 'so-widgets-bundle' ),
			// 	)
			// ),

			// 'vision_tag' => array(
			// 	'type' => 'select',
			// 	'label' => __( 'vision text HTML tag', 'so-widgets-bundle' ),
			// 	'default' => 'p',
			// 	'options' => array(
			// 		'h1' => __( 'H1', 'so-widgets-bundle' ),
			// 		'h2' => __( 'H2', 'so-widgets-bundle' ),
			// 		'h3' => __( 'H3', 'so-widgets-bundle' ),
			// 		'h4' => __( 'H4', 'so-widgets-bundle' ),
			// 		'h5' => __( 'H5', 'so-widgets-bundle' ),
			// 		'h6' => __( 'H6', 'so-widgets-bundle' ),
			// 		'P' => __( 'P', 'so-widgets-bundle' ),
			// 	)
			// ),

			'per_row' => array(
				'type' => 'number',
				'label' => __( 'Features per row', 'so-widgets-bundle' ),
				'default' => 3,
			),
			// 'facebook_url' => array(
			// 	'type' => 'link',
			// 	'label' => __('Facebook URL', 'so-widgets-bundle'),
			// 	'default' => 'https://www.facebook.com/'
			// ),
			// 'youtube_url' => array(
			// 	'type' => 'link',
			// 	'label' => __('Youtube URL', 'so-widgets-bundle'),
			// 	'default' => 'https://www.youtube.com/'
			// ),
			// 'instragram_url' => array(
			// 	'type' => 'link',
			// 	'label' => __('Instagram URL', 'so-widgets-bundle'),
			// 	'default' => 'https://www.instagram.com/'
			// ),
			// 'twitter_url' => array(
			// 	'type' => 'link',
			// 	'label' => __('Twitter URL', 'so-widgets-bundle'),
			// 	'default' => 'https://www.twitter.com/'
			// ),
		);
	}


	// function get_less_variables( $instance ) {

		// if ( empty( $instance ) ) {
		// 	return array();
		// }
		// $less_vars = array();
		// if ( empty( $instance ) ) {
		// 	return $less_vars;
		// }

		// $styleable_text_fields = array( 'title', 'text', 'more_text','subtitle','vision' );

		// foreach ( $styleable_text_fields as $field_name ) {

		// 	if ( ! empty( $fonts[$field_name.'_options'] ) ) {
		// 		$styles = $fonts[$field_name.'_options'];
		// 		if ( ! empty( $styles['size'] ) ) {
		// 			$less_vars[$field_name.'_size'] = $styles['size'];
		// 		}
		// 		if ( ! empty( $styles['color'] ) ) {
		// 			$less_vars[$field_name.'_color'] = $styles['color'];
		// 		}
		// 		if ( ! empty( $styles['font'] ) ) {
		// 			$font = siteorigin_widget_get_font( $styles['font'] );
		// 			$less_vars[$field_name.'_font'] = $font['family'];
		// 			if ( ! empty( $font['weight'] ) ) {
		// 				$less_vars[$field_name.'_font_weight'] = $font['weight'];
		// 			}
		// 		}
		// 	}
		// }

		// $less_vars['title_tag'] = $instance['title_tag'];
		// $less_vars['per_row'] = $instance['per_row'];
		// $less_vars['subtitle_tag'] = $instance['subtitle_tag'];
		// $less_vars['vision_tag'] = $instance['vision_tag'];

		// return $less_vars;
	// }

	/**
	 * Get the template variables for the headline
	 *
	 * @param $instance
	 * @param $args
	 *
	 * @return array
	 */
	function get_template_variables( $instance, $args ) {
		if( empty( $instance ) ) return array();

		// return array(
		// 	'facebook_url' => $instance['facebook_url'],
		// 	'youtube_url' => $instance['youtube_url'],
		// 	'instragram_url' => $instance['instragram_url'],
		// 	'twitter_url' => $instance['twitter_url'],
		// );


	}

	function get_settings_form() {
		return array(
			'responsive_breakpoint' => array(
				'type'        => 'measurement',
				'label'       => __( 'Responsive Breakpoint', 'so-widgets-bundle' ),
				'default'     => '520px',
				'description' => __( 'This setting controls when the features widget will collapse for mobile devices. The default value is 520px', 'so-widgets-bundle' )
			)
		);
	}
	
}

siteorigin_widget_register('sow-team-work', __FILE__, 'SiteOrigin_Widget_team_Widget');
