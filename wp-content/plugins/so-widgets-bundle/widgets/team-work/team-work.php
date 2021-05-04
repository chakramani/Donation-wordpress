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
			// 'headline' => array(
			// 	'type' => 'section',
			// 	'label'  => __( 'Headline', 'so-widgets-bundle' ),
			// 	'hide'   => true,
			// 	'fields' => array(
			// 		'text' => array(
			// 			'type' => 'text',
			// 			'label' => __( 'Text', 'so-widgets-bundle' ),
			// 		),
			// 		'destination_url' => array(
			// 			'type' => 'link',
			// 			'label' => __( 'Destination URL', 'so-widgets-bundle' ),
			// 		),
			// 		'new_window' => array(
			// 			'type' => 'checkbox',
			// 			'default' => false,
			// 			'label' => __( 'Open in a new window', 'so-widgets-bundle' ),
			// 		),
			// 		'tag' => array(
			// 			'type' => 'select',
			// 			'label' => __( 'HTML Tag', 'so-widgets-bundle' ),
			// 			'default' => 'h1',
			// 			'options' => array(
			// 				'h1' => __( 'H1', 'so-widgets-bundle' ),
			// 				'h2' => __( 'H2', 'so-widgets-bundle' ),
			// 				'h3' => __( 'H3', 'so-widgets-bundle' ),
			// 				'h4' => __( 'H4', 'so-widgets-bundle' ),
			// 				'h5' => __( 'H5', 'so-widgets-bundle' ),
			// 				'h6' => __( 'H6', 'so-widgets-bundle' ),
			// 				'p' => __( 'Paragraph', 'so-widgets-bundle' ),
			// 			)
			// 		),
			// 		'color' => array(
			// 			'type' => 'color',
			// 			'label' => __('Color', 'so-widgets-bundle'),
			// 		),
			// 		'hover_color' => array(
			// 			'type' => 'color',
			// 			'label' => __('Hover Color', 'so-widgets-bundle'),
			// 		),
			// 		'font' => array(
			// 			'type' => 'font',
			// 			'label' => __( 'Font', 'so-widgets-bundle' ),
			// 			'default' => 'default'
			// 		),
			// 		'font_size' => array(
			// 			'type' => 'measurement',
			// 			'label' => __('Font Size', 'so-widgets-bundle')
			// 		),
			// 		'align' => array(
			// 			'type' => 'select',
			// 			'label' => __( 'Alignment', 'so-widgets-bundle' ),
			// 			'default' => 'center',
			// 			'options' => array(
			// 				'center' => __( 'Center', 'so-widgets-bundle' ),
			// 				'left' => __( 'Left', 'so-widgets-bundle' ),
			// 				'right' => __( 'Right', 'so-widgets-bundle' ),
			// 				'justify' => __( 'Justify', 'so-widgets-bundle' )
			// 			)
			// 		),
			// 		'line_height' => array(
			// 			'type' => 'measurement',
			// 			'label' => __('Line Height', 'so-widgets-bundle')
			// 		),
			// 		'margin' => array(
			// 			'type' => 'measurement',
			// 			'label' => __('Top and Bottom Margin', 'so-widgets-bundle'),
			// 			'default' => '',
			// 		),
			// 	)
			// ),
			// 'sub_headline' => array(
			// 	'type' => 'section',
			// 	'label'  => __( 'Sub headline', 'so-widgets-bundle' ),
			// 	'hide'   => true,
			// 	'fields' => array(
			// 		'text' => array(
			// 			'type' => 'text',
			// 			'label' => __('Text', 'so-widgets-bundle')
			// 		),
			// 		'destination_url' => array(
			// 			'type' => 'link',
			// 			'label' => __( 'Destination URL', 'so-widgets-bundle' ),
			// 		),
			// 		'new_window' => array(
			// 			'type' => 'checkbox',
			// 			'default' => false,
			// 			'label' => __( 'Open in a new window', 'so-widgets-bundle' ),
			// 		),
			// 		'tag' => array(
			// 			'type' => 'select',
			// 			'label' => __( 'HTML Tag', 'so-widgets-bundle' ),
			// 			'default' => 'h3',
			// 			'options' => array(
			// 				'h1' => __( 'H1', 'so-widgets-bundle' ),
			// 				'h2' => __( 'H2', 'so-widgets-bundle' ),
			// 				'h3' => __( 'H3', 'so-widgets-bundle' ),
			// 				'h4' => __( 'H4', 'so-widgets-bundle' ),
			// 				'h5' => __( 'H5', 'so-widgets-bundle' ),
			// 				'h6' => __( 'H6', 'so-widgets-bundle' ),
			// 				'p' => __( 'Paragraph', 'so-widgets-bundle' ),
			// 			)
			// 		),
			// 		'color' => array(
			// 			'type' => 'color',
			// 			'label' => __('Color', 'so-widgets-bundle'),
			// 		),
			// 		'hover_color' => array(
			// 			'type' => 'color',
			// 			'label' => __('Hover Color', 'so-widgets-bundle'),
			// 		),
			// 		'font' => array(
			// 			'type' => 'font',
			// 			'label' => __( 'Font', 'so-widgets-bundle' ),
			// 			'default' => 'default'
			// 		),
			// 		'font_size' => array(
			// 			'type' => 'measurement',
			// 			'label' => __('Font Size', 'so-widgets-bundle')
			// 		),
			// 		'align' => array(
			// 			'type' => 'select',
			// 			'label' => __( 'Alignment', 'so-widgets-bundle' ),
			// 			'default' => 'center',
			// 			'options' => array(
			// 				'center' => __( 'Center', 'so-widgets-bundle' ),
			// 				'left' => __( 'Left', 'so-widgets-bundle' ),
			// 				'right' => __( 'Right', 'so-widgets-bundle' ),
			// 				'justify' => __( 'Justify', 'so-widgets-bundle' )
			// 			)
			// 		),
			// 		'line_height' => array(
			// 			'type' => 'measurement',
			// 			'label' => __('Line Height', 'so-widgets-bundle')
			// 		),
			// 		'margin' => array(
			// 			'type' => 'measurement',
			// 			'label' => __('Top and Bottom Margin', 'so-widgets-bundle'),
			// 			'default' => '',
			// 		),
			// 	)
			// ),
			// 'divider' => array(
			// 	'type' => 'section',
			// 	'label' => __( 'Divider', 'so-widgets-bundle' ),
			// 	'hide' => true,
			// 	'fields' => array(
			// 		'style' => array(
			// 			'type' => 'select',
			// 			'label' => __( 'Style', 'so-widgets-bundle' ),
			// 			'default' => 'solid',
			// 			'options' => array(
			// 				'none' => __('None', 'so-widgets-bundle'),
			// 				'solid' => __('Solid', 'so-widgets-bundle'),
			// 				'dotted' => __('Dotted', 'so-widgets-bundle'),
			// 				'dashed' => __('Dashed', 'so-widgets-bundle'),
			// 				'double' => __('Double', 'so-widgets-bundle'),
			// 				'groove' => __('Groove', 'so-widgets-bundle'),
			// 				'ridge' => __('Ridge', 'so-widgets-bundle'),
			// 				'inset' => __('Inset', 'so-widgets-bundle'),
			// 				'outset' => __('Outset', 'so-widgets-bundle'),
			// 			)
			// 		),
			// 		'color' => array(
			// 			'type' => 'color',
			// 			'label' => __('Color', 'so-widgets-bundle'),
			// 			'default' => '#EEEEEE'
			// 		),
			// 		'thickness' => array(
			// 			'type' => 'slider',
			// 			'label' => __( 'Thickness', 'so-widgets-bundle' ),
			// 			'min' => 0,
			// 			'max' => 20,
			// 			'default' => 1
			// 		),
			// 		'align' => array(
			// 			'type' => 'select',
			// 			'label' => __('Alignment', 'so-widgets-bundle'),
			// 			'default' => 'center',
			// 			'options' => array(
			// 				'center' => __( 'Center', 'so-widgets-bundle' ),
			// 				'left' => __( 'Left', 'so-widgets-bundle' ),
			// 				'right' => __( 'Right', 'so-widgets-bundle' ),
			// 			),
			// 		),
			// 		'width' => array(
			// 			'type' => 'measurement',
			// 			'label' => __('Divider Width', 'so-widgets-bundle'),
			// 			'default' => '80%',
			// 		),
			// 		'margin' => array(
			// 			'type' => 'measurement',
			// 			'label' => __('Top and Bottom Margin', 'so-widgets-bundle'),
			// 			'default' => '',
			// 		),
			// 	)
			// ),
			// 'order' => array(
			// 	'type' => 'order',
			// 	'label' => __( 'Element Order', 'so-widgets-bundle' ),
			// 	'options' => array(
			// 		'headline' => __( 'Headline', 'so-widgets-bundle' ),
			// 		'divider' => __( 'Divider', 'so-widgets-bundle' ),
			// 		'sub_headline' => __( 'Sub Headline', 'so-widgets-bundle' ),
			// 	),
			// 	'default' => array( 'headline', 'divider', 'sub_headline' ),
			// ),
			// 'fittext' => array(
			// 	'type' => 'checkbox',
			// 	'label' => __( 'Use FitText', 'so-widgets-bundle' ),
			// 	'description' => __( 'Dynamically adjust your heading font size based on screen size.', 'so-widgets-bundle' ),
			// 	'default' => false,
			// 	'state_emitter' => array(
			// 		'callback' => 'conditional',
			// 		'args'     => array(
			// 			'use_fittext[show]: val',
			// 			'use_fittext[hide]: ! val'
			// 		),
			// 	)
			// ),

			// 'fittext_compressor' => array(
			// 	'type' => 'number',
			// 	'label' => __( 'FitText Compressor Strength', 'so-widgets-bundle' ),
			// 	'description' => __( 'The higher the value, the more your headings will be scaled down. Values above 1 are allowed.', 'so-widgets-bundle' ),
			// 	'default' => 0.85,
			// 	'step' => 0.01,
			// 	'state_handler' => array(
			// 		'use_fittext[show]' => array( 'show' ),
			// 		'use_fittext[hide]' => array( 'hide' ),
			// 	)
			// ),

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
					'facebook_icon' => array(
						'type' => 'icon',
						'label' => __( 'Facebook Icon', 'so-widgets-bundle' ),
					),
					'youtube_icon' => array(
						'type' => 'icon',
						'label' => __( 'Youtube Icon', 'so-widgets-bundle' ),
					),
					'instragram_icon' => array(
						'type' => 'icon',
						'label' => __( 'Instragram Icon', 'so-widgets-bundle' ),
					),
					'twitter_icon' => array(
						'type' => 'icon',
						'label' => __( 'Twitter Icon', 'so-widgets-bundle' ),
					),

					

					
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

			'container_size' => array(
				'type' => 'measurement',
				'label' => __( 'Icon container size', 'so-widgets-bundle' ),
				'default' => '84px',
			),

			'icon_size' => array(
				'type' => 'measurement',
				'label' => __( 'Icon size', 'so-widgets-bundle' ),
				'default' => '24px',
			),

			'icon_size_custom' => array(
				'type' => 'checkbox',
				'label' => __( 'Use icon size for custom icon', 'so-widgets-bundle' ),
				'default' => false,
			),

			'title_tag' => array(
				'type' => 'select',
				'label' => __( 'Title text HTML tag', 'so-widgets-bundle' ),
				'default' => 'h1',
				'options' => array(
					'h1' => __( 'H1', 'so-widgets-bundle' ),
					'h2' => __( 'H2', 'so-widgets-bundle' ),
					'h3' => __( 'H3', 'so-widgets-bundle' ),
					'h4' => __( 'H4', 'so-widgets-bundle' ),
					'h5' => __( 'H5', 'so-widgets-bundle' ),
					'h6' => __( 'H6', 'so-widgets-bundle' ),
				)
			),

			
			'subtitle_tag' => array(
				'type' => 'select',
				'label' => __( 'Subtitle text HTML tag', 'so-widgets-bundle' ),
				'default' => 'p',
				'options' => array(
					'h1' => __( 'H1', 'so-widgets-bundle' ),
					'h2' => __( 'H2', 'so-widgets-bundle' ),
					'h3' => __( 'H3', 'so-widgets-bundle' ),
					'h4' => __( 'H4', 'so-widgets-bundle' ),
					'h5' => __( 'H5', 'so-widgets-bundle' ),
					'h6' => __( 'H6', 'so-widgets-bundle' ),
					'P' => __( 'P', 'so-widgets-bundle' ),
				)
			),

			'vision_tag' => array(
				'type' => 'select',
				'label' => __( 'vision text HTML tag', 'so-widgets-bundle' ),
				'default' => 'p',
				'options' => array(
					'h1' => __( 'H1', 'so-widgets-bundle' ),
					'h2' => __( 'H2', 'so-widgets-bundle' ),
					'h3' => __( 'H3', 'so-widgets-bundle' ),
					'h4' => __( 'H4', 'so-widgets-bundle' ),
					'h5' => __( 'H5', 'so-widgets-bundle' ),
					'h6' => __( 'H6', 'so-widgets-bundle' ),
					'P' => __( 'P', 'so-widgets-bundle' ),
				)
			),

			'per_row' => array(
				'type' => 'number',
				'label' => __( 'Features per row', 'so-widgets-bundle' ),
				'default' => 3,
			),
			'facebook_url' => array(
				'type' => 'link',
				'label' => __('Facebook URL', 'so-widgets-bundle'),
				'default' => 'https://www.facebook.com/'
			),
			'youtube_url' => array(
				'type' => 'link',
				'label' => __('Youtube URL', 'so-widgets-bundle'),
				'default' => 'https://www.youtube.com/'
			),
			'instragram_url' => array(
				'type' => 'link',
				'label' => __('Instagram URL', 'so-widgets-bundle'),
				'default' => 'https://www.instagram.com/'
			),
			'twitter_url' => array(
				'type' => 'link',
				'label' => __('Twitter URL', 'so-widgets-bundle'),
				'default' => 'https://www.twitter.com/'
			),
		);
	}


	function get_less_variables( $instance ) {



		if ( empty( $instance ) ) {
			return array();
		}
		$less_vars = array();
		if ( empty( $instance ) ) {
			return $less_vars;
		}

		$styleable_text_fields = array( 'title', 'text', 'more_text','subtitle','vision' );

		foreach ( $styleable_text_fields as $field_name ) {

			if ( ! empty( $fonts[$field_name.'_options'] ) ) {
				$styles = $fonts[$field_name.'_options'];
				if ( ! empty( $styles['size'] ) ) {
					$less_vars[$field_name.'_size'] = $styles['size'];
				}
				if ( ! empty( $styles['color'] ) ) {
					$less_vars[$field_name.'_color'] = $styles['color'];
				}
				if ( ! empty( $styles['font'] ) ) {
					$font = siteorigin_widget_get_font( $styles['font'] );
					$less_vars[$field_name.'_font'] = $font['family'];
					if ( ! empty( $font['weight'] ) ) {
						$less_vars[$field_name.'_font_weight'] = $font['weight'];
					}
				}
			}
		}




		$less_vars['title_tag'] = $instance['title_tag'];
		$less_vars['per_row'] = $instance['per_row'];
		$less_vars['subtitle_tag'] = $instance['subtitle_tag'];
		$less_vars['vision_tag'] = $instance['vision_tag'];





		// All the headline attributes
		// $less_vars['headline_tag'] = isset( $instance['headline']['tag'] ) ? $instance['headline']['tag'] : false;
		// $less_vars['headline_hover_color'] = isset( $instance['headline']['hover_color'] ) ? $instance['headline']['hover_color'] : false;
		// $less_vars['headline_align'] = isset( $instance['headline']['align'] ) ? $instance['headline']['align'] : false;
		// $less_vars['headline_color'] = isset( $instance['headline']['color'] ) ? $instance['headline']['color'] : false;
		// $less_vars['headline_font_size'] = isset( $instance['headline']['font_size'] ) ? $instance['headline']['font_size'] : false;
		// $less_vars['headline_line_height'] = isset( $instance['headline']['line_height'] ) ? $instance['headline']['line_height'] : false;
		// $less_vars['headline_margin'] = isset( $instance['headline']['margin'] ) ? $instance['headline']['margin'] : false;

		// // Headline font family and weight
		// if ( ! empty( $instance['headline']['font'] ) ) {
		// 	$font = siteorigin_widget_get_font( $instance['headline']['font'] );
		// 	$less_vars['headline_font'] = $font['family'];
		// 	if ( ! empty( $font['weight'] ) ) {
		// 		$less_vars['headline_font_weight'] = $font['weight'];
		// 	}
		// }

		// // Set the sub headline attributes
		// $less_vars['sub_headline_align'] = isset( $instance['sub_headline']['align'] ) ? $instance['sub_headline']['align'] : false;
		// $less_vars['sub_headline_hover_color'] = isset( $instance['sub_headline']['hover_color'] ) ? $instance['sub_headline']['hover_color'] : false;
		// $less_vars['sub_headline_tag'] = isset( $instance['sub_headline']['tag'] ) ? $instance['sub_headline']['tag'] : false;
		// $less_vars['sub_headline_color'] = isset( $instance['sub_headline']['color'] ) ? $instance['sub_headline']['color'] : false;
		// $less_vars['sub_headline_font_size'] = isset( $instance['sub_headline']['font_size'] ) ? $instance['sub_headline']['font_size'] : false;
		// $less_vars['sub_headline_line_height'] = isset( $instance['sub_headline']['line_height'] ) ? $instance['sub_headline']['line_height'] : false;
		// $less_vars['sub_headline_margin'] = isset( $instance['sub_headline']['margin'] ) ? $instance['sub_headline']['margin'] : false;

		// // Sub headline font family and weight
		// if ( ! empty( $instance['sub_headline']['font'] ) ) {
		// 	$font = siteorigin_widget_get_font( $instance['sub_headline']['font'] );
		// 	$less_vars['sub_headline_font'] = $font['family'];
		// 	if ( ! empty( $font['weight'] ) ) {
		// 		$less_vars['sub_headline_font_weight'] = $font['weight'];
		// 	}
		// }

		// $less_vars['divider_style'] = isset( $instance['divider']['style'] ) ? $instance['divider']['style'] : false;
		// $less_vars['divider_width'] = isset( $instance['divider']['width'] ) ? $instance['divider']['width'] : false;
		// $less_vars['divider_thickness'] = isset( $instance['divider']['thickness'] ) ? intval( $instance['divider']['thickness'] ) . 'px' : false;
		// $less_vars['divider_align'] = isset( $instance['divider']['align'] ) ? $instance['divider']['align'] : false;
		// $less_vars['divider_color'] = isset( $instance['divider']['color'] ) ? $instance['divider']['color'] : false;
		// $less_vars['divider_margin'] = isset( $instance['divider']['margin'] ) ? $instance['divider']['margin'] : false;

		return $less_vars;
	}


	// function get_style_hash($instance) {
	// 	return substr( md5( serialize( $this->get_less_variables( $instance ) ) ), 0, 12 );
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
		// echo sow_esc_url($instance['facebook_url']);

		return array(
			// 'headline' => $instance['headline']['text'],
			// 'headline_destination_url' => $instance['headline']['destination_url'],
			// 'headline_new_window' => $instance['headline']['new_window'],
			// 'headline_tag' => $instance['headline']['tag'],
			// 'sub_headline' => $instance['sub_headline']['text'],
			// 'sub_headline_destination_url' => $instance['sub_headline']['destination_url'],
			// 'sub_headline_new_window' => $instance['sub_headline']['new_window'],
			// 'sub_headline_tag' => $instance['sub_headline']['tag'],
			// 'order' => $instance['order'],
			// 'has_divider' => ! empty( $instance['divider'] ) && $instance['divider']['style'] != 'none',
			'facebook_url' => $instance['facebook_url'],
			'youtube_url' => $instance['youtube_url'],
			'instragram_url' => $instance['instragram_url'],
			'twitter_url' => $instance['twitter_url'],
		);


	}

	// function wrapper_class_filter( $classes, $instance ){
	// 	if( ! empty( $instance[ 'fittext' ] ) ) {
	// 		$classes[] = 'so-widget-fittext-wrapper';
	// 	}
	// 	return $classes;
	// }

	// function wrapper_data_filter( $data, $instance ) {
	// 	if( ! empty( $instance['fittext'] ) ) {
	// 		$data['fit-text-compressor'] = $instance['fittext_compressor'];
	// 	}
	// 	return $data;
	// }
	
	// function enqueue_widget_scripts( $instance ) {
	// 	if( ! empty( $instance['fittext'] ) || $this->is_preview( $instance ) ) {
	// 		wp_enqueue_script( 'sowb-fittext' );
	// 	}
	// }

	// function modify_instance( $instance ) {
	// 	// Change the old divider weight into a divider thickness
	// 	if( isset( $instance['divider']['weight'] ) && ! isset( $instance['divider']['thickness'] ) ) {
	// 		switch( $instance['divider']['weight'] ) {
	// 			case 'medium':
	// 				$instance['divider']['thickness'] = 3;
	// 				break;
	// 			case 'thick':
	// 				$instance['divider']['thickness'] = 5;
	// 				break;
	// 			case 'thin' :
	// 			default :
	// 				$instance['divider']['thickness'] = 1;
	// 				break;
	// 		}
	// 		unset( $instance['divider']['weight'] );
	// 	}

	// 	// Change the old divider side margin into overall width
	// 	if( isset( $instance['divider']['side_margin'] ) && ! isset( $instance['divider']['width'] ) ) {
	// 		global $content_width;
	// 		$value = floatval( $instance['divider']['side_margin'] );

	// 		switch( $instance['divider']['side_margin_unit'] ) {
	// 			case 'px' :
	// 				$instance['divider']['width'] = ( ( !empty( $content_width ) ? $content_width : 960 ) - ( 2 * $value ) ) . 'px';
	// 				$instance['divider']['width_unit'] = 'px';
	// 				break;

	// 			case '%' :
	// 				$instance['divider']['width'] = ( 100 - (2 * $value) ) . '%';
	// 				$instance['divider']['width_unit'] = '%';
	// 				break;

	// 			default :
	// 				$instance['divider']['width'] = '80%';
	// 				$instance['divider']['width_unit'] = '%';
	// 				break;
	// 		}

	// 		unset( $instance['divider']['side_margin'] );
	// 		unset( $instance['divider']['side_margin_unit'] );
	// 	}

	// 	// Copy top margin over to bottom margin
	// 	if( isset( $instance['divider']['top_margin'] ) && ! isset( $instance['divider']['bottom_margin'] ) ) {
	// 		$instance['divider']['bottom_margin'] = $instance['divider']['top_margin'];
	// 		$instance['divider']['bottom_margin_unit'] = $instance['divider']['top_margin_unit'];
	// 	}

	// 	return $instance;
	// }
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
