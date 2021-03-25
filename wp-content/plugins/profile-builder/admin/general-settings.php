<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Function that returns an array with the settings tabs(pages) and secondary tabs( can be sub-pages (we load a registered page as a secondary tab) or actual sub-tabs )
 * @return array with the tabs
 */
function wppb_get_settings_pages(){
    $wppb_module_settings = get_option('wppb_module_settings');

	$settings_pages['pages'] = array(
		'profile-builder-general-settings' => __( 'General Settings', 'profile-builder' ),
		'profile-builder-admin-bar-settings' => __( 'Admin Bar', 'profile-builder' ),
		'profile-builder-content_restriction' => __( 'Content Restriction', 'profile-builder' ),
		'profile-builder-private-website' => __( 'Private Website', 'profile-builder' ),
		'profile-builder-toolbox-settings' => __( 'Advanced Settings', 'profile-builder' ),
	);

    //add tabs here for Advanced Settings
    $settings_pages['sub-tabs']['profile-builder-toolbox-settings']['forms'] = __( 'Forms', 'profile-builder' );
    $settings_pages['sub-tabs']['profile-builder-toolbox-settings']['fields'] = __( 'Fields', 'profile-builder' );
    if ( file_exists( WPPB_PLUGIN_DIR . '/add-ons/add-ons.php' ) && isset( $wppb_module_settings['wppb_userListing'] ) &&  $wppb_module_settings['wppb_userListing'] === 'show' )
        $settings_pages['sub-tabs']['profile-builder-toolbox-settings']['userlisting'] = __( 'Userlisting', 'profile-builder' );
    $settings_pages['sub-tabs']['profile-builder-toolbox-settings']['shortcodes'] = __( 'Shortcodes', 'profile-builder' );
    $settings_pages['sub-tabs']['profile-builder-toolbox-settings']['admin'] = __( 'Admin', 'profile-builder' );

    //add sub-pages here for email customizer
	if (file_exists(WPPB_PLUGIN_DIR . '/add-ons/add-ons.php')) {
		if( ( isset($wppb_module_settings['wppb_emailCustomizerAdmin']) && $wppb_module_settings['wppb_emailCustomizerAdmin'] == 'show' ) || ( isset($wppb_module_settings['wppb_emailCustomizer']) && $wppb_module_settings['wppb_emailCustomizer'] == 'show') ){
			$settings_pages['pages']['user-email-customizer'] = __( 'Email Customizer', 'profile-builder' );
			$settings_pages['sub-pages']['user-email-customizer']['user-email-customizer'] = __( 'User Emails', 'profile-builder' );
			$settings_pages['sub-pages']['user-email-customizer']['admin-email-customizer'] = __( 'Administrator Emails', 'profile-builder' );
		}
	}

	return $settings_pages;
}

/**
 * Function that generates the html for the tabs and subtabs on the settings page
 */
function wppb_generate_settings_tabs(){
	?>
	<nav class="nav-tab-wrapper">
	<?php
		$pages = wppb_get_settings_pages();

		$active_tab = sanitize_text_field($_GET['page']);
		//if we are on a subpage we need to change the active tab to the parent
		if( !empty( $pages['sub-pages'] ) ) {
			foreach ($pages['sub-pages'] as $parent_slug => $subpages) {
				if (array_key_exists($active_tab, $subpages)) {
					$active_tab = $parent_slug;
				}
			}
		}

		foreach( $pages['pages'] as $page_slug => $tab_name ){
			echo '<a href="' . admin_url( add_query_arg( array( 'page' => $page_slug ), 'admin.php' ) ) . '"  class="nav-tab ' . ( $active_tab == $page_slug ? 'nav-tab-active' : '' ) . '">'. $tab_name .'</a>';
		}
	?>
	</nav>
	<?php

    $active_subpage = sanitize_text_field($_GET['page']);

	if( !empty( $pages['sub-pages'] ) ) {
		foreach ($pages['sub-pages'] as $parent_slug => $subpages) {
			if (array_key_exists( sanitize_text_field( $_GET['page'] ), $subpages)) {
                echo '<ul class="wppb-subtabs subsubsub">';
				foreach ($subpages as $subpage_slug => $subpage_name) {
					echo '<li><a href="' . admin_url(add_query_arg(array('page' => $subpage_slug), 'admin.php')) . '"  class="nav-sub-tab ' . ($active_subpage == $subpage_slug ? 'current' : '') . '">' . $subpage_name . '</a></li>';
				}
                echo '</ul>';
			}
		}
	}

    if( !empty( $pages['sub-tabs'] ) ) {
        foreach ($pages['sub-tabs'] as $parent_slug => $tabs) {
            if ( $active_subpage == $parent_slug) {
                echo '<ul class="wppb-subtabs subsubsub">';
                //determine the active tab, if no tab present then default to the first one
                if( isset($_GET['tab']) )
                    $active_tab = sanitize_text_field( $_GET['tab'] );
                else {
                    $keys = array_keys($tabs);
                    $active_tab = array_shift( $keys );
                }
                foreach ($tabs as $tab_slug => $tab_name) {
                    echo '<li><a href="' . esc_url( add_query_arg( array('tab' => $tab_slug) ) ) . '"  class="nav-sub-tab ' . ( $active_tab == $tab_slug ? 'current' : '') . '">' . $tab_name . '</a></li>';
                }
                echo '</ul>';
            }
        }
    }
}

/**
 * Function that creates the "General Settings" submenu page
 *
 * @since v.2.0
 *
 * @return void
 */
function wppb_register_general_settings_submenu_page() {
	add_submenu_page( 'profile-builder', __( 'Settings', 'profile-builder' ), __( 'Settings', 'profile-builder' ), 'manage_options', 'profile-builder-general-settings', 'wppb_general_settings_content' );
}
add_action( 'admin_menu', 'wppb_register_general_settings_submenu_page', 3 );


function wppb_generate_default_settings_defaults(){
	add_option( 'wppb_general_settings', array( 'extraFieldsLayout' => 'default', 'automaticallyLogIn' => 'No', 'emailConfirmation' => 'no', 'activationLandingPage' => '', 'adminApproval' => 'no', 'loginWith' => 'usernameemail', 'rolesEditor' => 'no', 'conditional_fields_ajax' => 'no' ) );
}


/**
 * Function that adds content to the "General Settings" submenu page
 *
 * @since v.2.0
 *
 * @return string
 */
function wppb_general_settings_content() {
	wppb_generate_default_settings_defaults();
?>	
	<div class="wrap wppb-wrap">
		<h2><?php _e( 'Profile Builder Settings', 'profile-builder' ); ?></h2>

        <?php settings_errors(); ?>

		<?php wppb_generate_settings_tabs() ?>

		<form method="post" action="options.php#general-settings">
		<?php $wppb_generalSettings = get_option( 'wppb_general_settings' ); ?>
		<?php settings_fields( 'wppb_general_settings' ); ?>

		<table class="form-table">
			<tr>
				<th scope="row">
					<?php _e( "Load Profile Builder's own CSS file in the front-end:", "profile-builder" ); ?>
				</th>
				<td>
					<label><input type="checkbox" name="wppb_general_settings[extraFieldsLayout]"<?php echo ( ( isset( $wppb_generalSettings['extraFieldsLayout'] ) && ( $wppb_generalSettings['extraFieldsLayout'] == 'default' ) ) ? ' checked' : '' ); ?> value="default" class="wppb-select"><?php _e( 'Yes', 'profile-builder' ); ?></label>
					<ul>
						<li class="description"><?php printf( __( 'You can find the default file here: %1$s', 'profile-builder' ), '<a href="'.dirname( plugin_dir_url( __FILE__ ) ).'/assets/css/style-front-end.css" target="_blank">'.dirname( dirname( plugin_basename( __FILE__ ) ) ).'\assets\css\style-front-end.css</a>' ); ?></li>
					</ul>
				</td>
			</tr>

            <tr>
                <th scope="row">
                    <?php _e( 'Automatically Log In:', 'profile-builder' );?>
                </th>
                <td>
                    <select name="wppb_general_settings[automaticallyLogIn]" class="wppb-select" id="wppb_settings_automatically_log_in" onchange="wppb_display_page_select(this.value)">
                        <option value="Yes" <?php if ( !empty( $wppb_generalSettings['automaticallyLogIn'] ) && $wppb_generalSettings['automaticallyLogIn'] === 'Yes' ) echo 'selected'; ?>><?php _e( 'Yes', 'profile-builder' ); ?></option>
                        <option value="No" <?php if ( empty( $wppb_generalSettings['automaticallyLogIn'] ) || ( !empty( $wppb_generalSettings['automaticallyLogIn'] ) && $wppb_generalSettings['automaticallyLogIn'] === 'No' ) ) echo 'selected'; ?>><?php _e( 'No', 'profile-builder' ); ?></option>
                    </select>
                    <ul>
                        <li class="description"><?php _e( 'Select "Yes" to automatically log in new users after successful registration.', 'profile-builder' ); ?></li>
                    </ul>
                </td>
            </tr>

			<tr>
				<th scope="row">
					<?php _e( '"Email Confirmation" Activated:', 'profile-builder' );?>
				</th>
				<td>
					<select name="wppb_general_settings[emailConfirmation]" class="wppb-select" id="wppb_settings_email_confirmation" onchange="wppb_display_page_select(this.value)">
						<option value="yes" <?php if ( !empty( $wppb_generalSettings['emailConfirmation'] ) && $wppb_generalSettings['emailConfirmation'] === 'yes' ) echo 'selected'; ?>><?php _e( 'Yes', 'profile-builder' ); ?></option>
						<option value="no" <?php if ( empty( $wppb_generalSettings['emailConfirmation'] ) || ( !empty( $wppb_generalSettings['emailConfirmation'] ) && $wppb_generalSettings['emailConfirmation'] === 'no' ) ) echo 'selected'; ?>><?php _e( 'No', 'profile-builder' ); ?></option>
					</select>
					<ul>
						<li class="description"><?php _e( 'This works with front-end forms only. Recommended to redirect WP default registration to a Profile Builder one using "Custom Redirects" module.', 'profile-builder' ); ?></li>
						<?php if ( $wppb_generalSettings['emailConfirmation'] == 'yes' ) { ?>
							<li class="description dynamic1"><?php printf( __( 'You can find a list of unconfirmed email addresses %1$sUsers > All Users > Email Confirmation%2$s.', 'profile-builder' ), '<a href="'.get_bloginfo( 'url' ).'/wp-admin/users.php?page=unconfirmed_emails">', '</a>' )?></li>
						<?php } ?>
					</ul>
				</td>
			</tr>

			<tr id="wppb-settings-activation-page">
				<th scope="row">
					<?php _e( '"Email Confirmation" Landing Page:', 'profile-builder' ); ?>
				</th>
				<td>
					<select name="wppb_general_settings[activationLandingPage]" class="wppb-select">
						<option value="" <?php if ( empty( $wppb_generalSettings['emailConfirmation'] ) ) echo 'selected'; ?>></option>
						<optgroup label="<?php _e( 'Existing Pages', 'profile-builder' ); ?>">
						<?php
							$pages = get_pages( apply_filters( 'wppb_page_args_filter', array( 'sort_order' => 'ASC', 'sort_column' => 'post_title', 'post_type' => 'page', 'post_status' => array( 'publish' ) ) ) );

							foreach ( $pages as $key => $value ){
								echo '<option value="'.$value->ID.'"';
								if ( $wppb_generalSettings['activationLandingPage'] == $value->ID )
									echo ' selected';

								echo '>' . $value->post_title . '</option>';
							}
						?>
						</optgroup>
					</select>
					<p class="description">
						<?php _e( 'Specify the page where the users will be directed when confirming the email account. This page can differ from the register page(s) and can be changed at any time. If none selected, a simple confirmation page will be displayed for the user.', 'profile-builder' ); ?>
					</p>
				</td>
			</tr>


		<?php
		if ( file_exists( WPPB_PLUGIN_DIR.'/features/admin-approval/admin-approval.php' ) ){
		?>
			<tr>
				<th scope="row">
					<?php _e( '"Admin Approval" Activated:', 'profile-builder' ); ?>
				</th>
				<td>
					<select id="adminApprovalSelect" name="wppb_general_settings[adminApproval]" class="wppb-select" onchange="wppb_display_page_select_aa(this.value)">
						<option value="yes" <?php if( !empty( $wppb_generalSettings['adminApproval'] ) && $wppb_generalSettings['adminApproval'] == 'yes' ) echo 'selected'; ?>><?php _e( 'Yes', 'profile-builder' ); ?></option>
                        <option value="no" <?php if( empty( $wppb_generalSettings['adminApproval'] ) || ( !empty( $wppb_generalSettings['adminApproval'] ) && $wppb_generalSettings['adminApproval'] == 'no' ) ) echo 'selected'; ?>><?php _e( 'No', 'profile-builder' ); ?></option>
					</select>
					<ul>
						<li class="description dynamic2"><?php printf( __( 'You can find a list of users at %1$sUsers > All Users > Admin Approval%2$s.', 'profile-builder' ), '<a href="'.get_bloginfo( 'url' ).'/wp-admin/users.php?page=admin_approval&orderby=registered&order=desc">', '</a>' )?></li>
					<ul>
				</td>
			</tr>

			<tr class="dynamic2">
				<th scope="row">
					<?php _e( '"Admin Approval" on User Role:', 'profile-builder' ); ?>
				</th>
				<td>
					<div id="wrap">
						<?php
						$wppb_userRoles = wppb_adminApproval_onUserRole();

						if( ! empty( $wppb_userRoles ) ) {
							foreach( $wppb_userRoles as $role => $role_name ) {
								echo '<label><input type="checkbox" id="adminApprovalOnUserRoleCheckbox" name="wppb_general_settings[adminApprovalOnUserRole][]" class="wppb-checkboxes" value="' . esc_attr( $role ) . '"';
								if( ! empty( $wppb_generalSettings['adminApprovalOnUserRole'] ) && in_array( $role, $wppb_generalSettings['adminApprovalOnUserRole'] ) )	echo ' checked';
								if( empty( $wppb_generalSettings['adminApprovalOnUserRole'] ) )		echo ' checked';
								echo '>';
								echo $role_name . '</label><br>';
							}
						}
						?>
					</div>
					<ul>
						<li class="description"><?php printf( __( 'Select on what user roles to activate Admin Approval.', 'profile-builder' ) ) ?></li>
						<ul>
				</td>
			</tr>

		<?php } ?>

		<?php
			if( file_exists( WPPB_PLUGIN_DIR.'/features/roles-editor/roles-editor.php' ) ) {
				?>
				<tr>
					<th scope="row">
						<?php _e( '"Roles Editor" Activated:', 'profile-builder' ); ?>
					</th>
					<td>
						<select id="rolesEditorSelect" name="wppb_general_settings[rolesEditor]" class="wppb-select" onchange="wppb_display_page_select_re(this.value)">
							<option value="no" <?php if( !empty( $wppb_generalSettings['rolesEditor'] ) && $wppb_generalSettings['rolesEditor'] == 'no' ) echo 'selected'; ?>><?php _e( 'No', 'profile-builder' ); ?></option>
							<option value="yes" <?php if( !empty( $wppb_generalSettings['rolesEditor'] ) && $wppb_generalSettings['rolesEditor'] == 'yes' ) echo 'selected'; ?>><?php _e( 'Yes', 'profile-builder' ); ?></option>
						</select>
						<ul>
							<li class="description dynamic3"><?php printf( __( 'You can add / edit user roles at %1$sUsers > Roles Editor%2$s.', 'profile-builder' ), '<a href="'.get_bloginfo( 'url' ).'/wp-admin/edit.php?post_type=wppb-roles-editor">', '</a>' )?></li>
						<ul>
					</td>
				</tr>
		<?php } ?>

		<?php
		if ( PROFILE_BUILDER == 'Profile Builder Free' ) {
		?>
			<tr>
				<th scope="row">
					<?php _e( '"Admin Approval" Feature:', 'profile-builder' ); ?>
				</th>
				<td>
					<p><em>	<?php printf( __( 'You decide who is a user on your website. Get notified via email or approve multiple users at once from the WordPress UI. Enable Admin Approval by upgrading to %1$sHobbyist or PRO versions%2$s.', 'profile-builder' ),'<a href="https://www.cozmoslabs.com/wordpress-profile-builder/?utm_source=wpbackend&utm_medium=clientsite&utm_content=general-settings-link&utm_campaign=PBFree">', '</a>' )?></em></p>
				</td>
			</tr>
		<?php } ?>

			<tr>
				<th scope="row">
					<?php _e( 'Allow Users to Log in With:', 'profile-builder' ); ?>
				</th>
				<td>
					<select name="wppb_general_settings[loginWith]" class="wppb-select">
						<option value="usernameemail" <?php if ( $wppb_generalSettings['loginWith'] == 'usernameemail' ) echo 'selected'; ?>><?php _e( 'Username and Email', 'profile-builder' ); ?></option>
						<option value="username" <?php if ( $wppb_generalSettings['loginWith'] == 'username' ) echo 'selected'; ?>><?php _e( 'Username', 'profile-builder' ); ?></option>
						<option value="email" <?php if ( $wppb_generalSettings['loginWith'] == 'email' ) echo 'selected'; ?>><?php _e( 'Email', 'profile-builder' ); ?></option>
					</select>
					<ul>
						<li class="description"><?php _e( '"Username and Email" - users can Log In with both Username and Email.', 'profile-builder' ); ?></li>
						<li class="description"><?php _e( '"Username" - users can Log In only with Username.', 'profile-builder' ); ?></li>
						<li class="description"><?php _e( '"Email" - users can Log In only with Email.', 'profile-builder' ); ?></li>
					</ul>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<?php _e( 'Minimum Password Length:', 'profile-builder' ); ?>
				</th>
				<td>
					<input type="text" name="wppb_general_settings[minimum_password_length]" class="wppb-text" value="<?php if( !empty( $wppb_generalSettings['minimum_password_length'] ) ) echo esc_attr( $wppb_generalSettings['minimum_password_length'] ); ?>"/>
					<ul>
						<li class="description"><?php _e( 'Enter the minimum characters the password should have. Leave empty for no minimum limit', 'profile-builder' ); ?> </li>
					</ul>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<?php _e( 'Minimum Password Strength:', 'profile-builder' ); ?>
				</th>
				<td>
					<select name="wppb_general_settings[minimum_password_strength]" class="wppb-select">
						<option value=""><?php _e( 'Disabled', 'profile-builder' ); ?></option>
						<option value="short" <?php if ( !empty($wppb_generalSettings['minimum_password_strength']) && $wppb_generalSettings['minimum_password_strength'] == 'short' ) echo 'selected'; ?>><?php _e( 'Very weak', 'profile-builder' ); ?></option>
						<option value="bad" <?php if ( !empty($wppb_generalSettings['minimum_password_strength']) && $wppb_generalSettings['minimum_password_strength'] == 'bad' ) echo 'selected'; ?>><?php _e( 'Weak', 'profile-builder' ); ?></option>
						<option value="good" <?php if ( !empty($wppb_generalSettings['minimum_password_strength']) && $wppb_generalSettings['minimum_password_strength'] == 'good' ) echo 'selected'; ?>><?php _e( 'Medium', 'profile-builder' ); ?></option>
						<option value="strong" <?php if ( !empty($wppb_generalSettings['minimum_password_strength']) && $wppb_generalSettings['minimum_password_strength'] == 'strong' ) echo 'selected'; ?>><?php _e( 'Strong', 'profile-builder' ); ?></option>
					</select>
				</td>
			</tr>
			<?php if( wppb_conditional_fields_exists() && apply_filters( 'wppb_allow_conditional_fields_ajax', false ) ): ?>
			<tr>
				<th scope="row">
					<?php _e( 'Use ajax on conditional fields:', 'profile-builder' );?>
				</th>
				<td>
					<select name="wppb_general_settings[conditional_fields_ajax]" class="wppb-select" id="wppb_settings_conditional_fields_ajax" onchange="wppb_display_page_select(this.value)">
                        <option value="no" <?php if ( $wppb_generalSettings['conditional_fields_ajax'] === 'no' ) echo 'selected'; ?>><?php _e( 'No', 'profile-builder' ); ?></option>
                        <option value="yes" <?php if ( $wppb_generalSettings['conditional_fields_ajax'] === 'yes' ) echo 'selected'; ?>><?php _e( 'Yes', 'profile-builder' ); ?></option>
					</select>
                    <ul>
                        <li class="description"><?php _e( 'For large conditional forms select "Yes" for an improved page performance', 'profile-builder' ); ?> </li>
                    </ul>
				</td>
			</tr>
            <?php endif; ?>

			<?php do_action( 'wppb_extra_general_settings', $wppb_generalSettings ); ?>
		</table>



		<input type="hidden" name="action" value="update" />
		<p class="submit"><input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
	</form>
</div>
	
<?php
}


/*
 * Function that sanitizes the general settings
 *
 * @param array $wppb_generalSettings
 *
 * @since v.2.0.7
 */
function wppb_general_settings_sanitize( $wppb_generalSettings ) {
    $wppb_generalSettings = apply_filters( 'wppb_general_settings_sanitize_extra', $wppb_generalSettings );

	if( !empty( $wppb_generalSettings ) ){
		foreach( $wppb_generalSettings as $settings_name => $settings_value ){
			if( $settings_name == "minimum_password_length" || $settings_name == "activationLandingPage" )
				$wppb_generalSettings[$settings_name] = filter_var( $settings_value, FILTER_SANITIZE_NUMBER_INT );
			elseif( $settings_name == "extraFieldsLayout" || $settings_name == "emailConfirmation" || $settings_name == "adminApproval" || $settings_name == "loginWith" || $settings_name == "minimum_password_strength" )
				$wppb_generalSettings[$settings_name] = filter_var( $settings_value, FILTER_SANITIZE_STRING );
			elseif( $settings_name == "adminApprovalOnUserRole" ){
				if( is_array( $settings_value ) && !empty( $settings_value ) ){
					foreach( $settings_value as $key => $value ){
						$wppb_generalSettings[$settings_name][$key] = filter_var( $value, FILTER_SANITIZE_STRING );
					}
				}
			}
		}
	}

    return $wppb_generalSettings;
}


/*
 * Function that pushes settings errors to the user
 *
 * @since v.2.0.7
 */
function wppb_general_settings_admin_notices() {
    settings_errors( 'wppb_general_settings' );
}
add_action( 'admin_notices', 'wppb_general_settings_admin_notices' );


/*
 * Function that return user roles
 *
 * @since v.2.2.0
 *
 * @return array
 */
function wppb_adminApproval_onUserRole() {
	global $wp_roles;

	$wp_roles = new WP_Roles();

	$roles = $wp_roles->get_names();

	unset( $roles['administrator'] );

	return $roles;
}
