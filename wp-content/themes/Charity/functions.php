<?php
    add_theme_support('post-thumnails');
    function mytheme_widgets_init() {
        $heading = get_theme_mod( 'ocean_sidebar_widget_heading_tag', 'h6' );
		$heading = apply_filters( 'ocean_sidebar_widget_heading_tag', $heading );

		$foo_heading = get_theme_mod( 'ocean_footer_widget_heading_tag', 'h6' );
		$foo_heading = apply_filters( 'ocean_footer_widget_heading_tag', $foo_heading );

        register_sidebar( array(
            'name'          => __( 'Single Post Widgets', 'textdomain' ),
            'id'            => 'mytheme-single-post-widgets',
            'description'   => __( 'Widgets in this area will be shown under your single posts, before comments.', 'textdomain' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ) );
        

		// Default Sidebar.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Default Sidebar', 'oceanwp' ),
				'id'            => 'sidebar',
				'description'   => esc_html__( 'Widgets in this area will be displayed in the left or right sidebar area if you choose the Left or Right Sidebar layout.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="sidebar-box %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $heading . ' class="widget-title">',
				'after_title'   => '</' . $heading . '>',
			)
		);

		// Left Sidebar.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Left Sidebar', 'oceanwp' ),
				'id'            => 'sidebar-2',
				'description'   => esc_html__( 'Widgets in this area are used in the left sidebar region if you use the Both Sidebars layout.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="sidebar-box %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $heading . ' class="widget-title">',
				'after_title'   => '</' . $heading . '>',
			)
		);

		// Search Results Sidebar.
		if ( get_theme_mod( 'ocean_search_custom_sidebar', true ) ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Search Results Sidebar', 'oceanwp' ),
					'id'            => 'search_sidebar',
					'description'   => esc_html__( 'Widgets in this area are used in the search result page.', 'oceanwp' ),
					'before_widget' => '<div id="%1$s" class="sidebar-box %2$s clr">',
					'after_widget'  => '</div>',
					'before_title'  => '<' . $heading . ' class="widget-title">',
					'after_title'   => '</' . $heading . '>',
				)
			);
		}

		// Footer 1.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 1', 'oceanwp' ),
				'id'            => 'footer-one',
				'description'   => esc_html__( 'Widgets in this area are used in the first footer region.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $foo_heading . ' class="widget-title">',
				'after_title'   => '</' . $foo_heading . '>',
			)
		);

		// Footer 2.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 2', 'oceanwp' ),
				'id'            => 'footer-two',
				'description'   => esc_html__( 'Widgets in this area are used in the second footer region.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $foo_heading . ' class="widget-title">',
				'after_title'   => '</' . $foo_heading . '>',
			)
		);

		// Footer 3.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 3', 'oceanwp' ),
				'id'            => 'footer-three',
				'description'   => esc_html__( 'Widgets in this area are used in the third footer region.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $foo_heading . ' class="widget-title">',
				'after_title'   => '</' . $foo_heading . '>',
			)
		);

		// Footer 4.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 4', 'oceanwp' ),
				'id'            => 'footer-four',
				'description'   => esc_html__( 'Widgets in this area are used in the fourth footer region.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $foo_heading . ' class="widget-title">',
				'after_title'   => '</' . $foo_heading . '>',
			)
		);
    }
    add_action( 'widgets_init', 'mytheme_widgets_init' );


	function charity_theme_support()
	{
		// Adding dynamic tittle tag support 
		add_theme_support('title-tag');
		add_theme_support('custom-logo');
		add_theme_support('post-thumbnails');
	}
	add_action('after_setup_theme', 'charity_theme_support');

	function donation_register_styles()
	{
		$version = wp_get_theme()->get('Version');
	
		wp_enqueue_style('donation-style', get_template_directory_uri() . "/style.css", array(), $version, 'all');
		// wp_enqueue_style('donation-custom', get_template_directory_uri() . "/custom.css", array(), $version, 'all');
		wp_enqueue_style('donation-maxcdn-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css", array(), '4.5.2', 'all');
		wp_enqueue_style('donation-maxcdn-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css", array(), '4.5.2', 'all');
		wp_enqueue_style('donation-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css", array(), '4.3.1', 'all');
		wp_enqueue_style('donation-fontawesome', "https://pro.fontawesome.com/releases/v5.10.0/css/all.css", array(), '5.10.0', 'all');
		wp_enqueue_style('donation-font', "https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600;700;800;900&display=swap", array(), '5.10.0', 'all');
		wp_enqueue_style('donation-owl-carousel', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.min.css", array(), '5.10.0', 'all');
		wp_enqueue_style('donation-animate', "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css", array(), '4.1.1', 'all');
		wp_enqueue_style('donation-owl-carousel', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css", array(), '5.10.0', 'all');
		
	}
	add_action('wp_enqueue_scripts', 'donation_register_styles');
	
	
	
	function donation_register_scripts()
	{
		$version = wp_get_theme()->get('Version');
	
		wp_enqueue_script('donation-bootstrap-jquery', "https://code.jquery.com/jquery-3.4.1.js", array(), '3.4.1', 'all', true);
		wp_enqueue_script('donation-counter-up', "https://cdn.jsdelivr.net/jquery.counterup/1.0/jquery.counterup.min.js", array(), '3.5.1', 'all', true);
		// wp_enqueue_script('donation-jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js", array(), '3.5.1', 'all', true);
		wp_enqueue_script('donation-ajax', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js", array(), '1.16.0', 'all', true);
		wp_enqueue_script('donation-bootstrap-js', "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js", array(), '4.5.2', 'all', true);
		wp_enqueue_script('donation-owl-carousel-js', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js", array(), '3.4.1', 'all', true);
		wp_enqueue_script('donation-cloudflare-jquery', "https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js", array(), '4.0.1', 'all', true);
		wp_enqueue_script('donation-js', get_template_directory_uri() . "/assets/js/main.js", array(), $version, 'all', true);
	
		
	}
	add_action('wp_enqueue_scripts', 'donation_register_scripts');

	function charity_menus()
	{
		$location = array(
			'primary' => "Desktop top Navigation Menu",
			'footer' => "Footer Menu",
		);
		register_nav_menus($location);
	}
	add_action('init', 'charity_menus');

	require get_template_directory().'/inc/walker.php';

	add_filter( 'use_block_editor_for_post', '__return_false' );

	add_action('after_setup_theme', 'remove_admin_bar');

	function remove_admin_bar() {
		if (!current_user_can('administrator') && !is_admin()) {
			show_admin_bar(false);
		}
	}

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);


	/*
    ========================
        SINGLE POST CUSTOM FUNCTIONS
    ========================
	*/
	function sunset_post_navigation()
	{
		$nav = '<div class="row">';

		$prev = get_previous_post_link('<div class="post-link-nav"><span class="sunset-icon sunset-chevron-left" aria-hidden="true"></span> %link</div>', '%title');
		$nav .= '<div class="col-xs-12 col-sm-6">'.$prev.'</div>';

		$next = get_next_post_link('<div class="post-link-nav">%link <span class="sunset-icon sunset-chevron-right" aria-hidden="true"></span></div>', '%title');
		$nav .= '<div class="col-xs-12 col-sm-6 text-right">'.$next.'</div>';

		$nav .= '</div>';

		return $nav;
	}


add_action('wp_enqueue_scripts', 'my_register_javascript', 100);

function my_register_javascript() {
  wp_register_script('mediaelement', plugins_url('wp-mediaelement.min.js', __FILE__), array('jquery'), '4.8.2', true);
  wp_enqueue_script('mediaelement');
}



