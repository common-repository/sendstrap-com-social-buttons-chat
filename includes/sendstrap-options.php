<?php


// Add Settings Sections and Fields in sendstrap Settings Page
function sendstrap_settings()
{
	
	// If Plugin Settings Don't Exist, Then Create Them
	sendstrap_first_install();
  
	// Find sendstrap Setting Section Hook and Add a Section There
	add_settings_section( 'sendstrap_settings_section', __( '', 'sendstrap' ), 'sendstrap_settings_description_callback', 'sendstrap' );
	
	// Add Enable Checkbox Field in sendstrap Setting Page
	add_settings_field( 'sendstrap_settings_enable', __( 'Enable Plugin', 'sendstrap'), 'sendstrap_settings_enable_callback', 'sendstrap', 'sendstrap_settings_section' );

	// Add Chat ID Field in sendstrap Setting Page
	add_settings_field( 'sendstrap_settings_id', __( 'SendStrap ID', 'sendstrap'), 'sendstrap_settings_id_callback', 'sendstrap', 'sendstrap_settings_section' );
	
	// Add Chat ID Field in sendstrap Setting Page
	add_settings_field( 'sendstrap_settings_key', __( 'SendStrap Key', 'sendstrap'), 'sendstrap_settings_key_callback', 'sendstrap', 'sendstrap_settings_section' );
	
	// Add Page ID Field in sendstrap Setting Page
	add_settings_field( 'sendstrap_settings_pageid', __( 'Pages to Exclude', 'sendstrap'), 'sendstrap_settings_pageid_callback', 'sendstrap', 'sendstrap_settings_section' );
	
	
	// Register Our Settings and Save Them
	register_setting( 'sendstrap_settings', 'sendstrap_settings' );
	
}
add_action( 'admin_init', 'sendstrap_settings' );


// Build Layout For Chat Enable Field
function sendstrap_settings_enable_callback()
{
	$options = get_option( 'sendstrap_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'enable' ] ) ) {
		$custom_text = $options['enable'];
	}
	
	if ($custom_text == 1)
	{
		echo '<input type="checkbox" id="sendstrap_custom_enable" name="sendstrap_settings[enable]" checked value="1" />';
	}
	else
	{
		echo '<input type="checkbox" id="sendstrap_custom_enable" name="sendstrap_settings[enable]" value="1" />';
	}
	
}

function sendstrap_settings_id_callback()
{
	$options = get_option( 'sendstrap_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'id' ] ) ) {
		$custom_text = esc_html( $options['id'] );
	}

	echo '<input type="text" id="sendstrap_custom_id" name="sendstrap_settings[id]" value="' . $custom_text . '" style="width:842px;" /><br><small><i>Login to your sendstrap.com account >> Click Integration >> Copy the Site ID and Paste it here Not Have account yet? <a href="https://app.sendstrap.com/register" target="_blank" style="color:#d30c5c">Create Free Account from here</a></small><i>';
}

// Build Layout For KEY Field
function sendstrap_settings_key_callback()
{
	$options = get_option( 'sendstrap_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'key' ] ) ) {
		$custom_text = esc_html( $options['key'] );
	}

	echo '<input type="text" id="sendstrap_custom_key" name="sendstrap_settings[key]" value="' . $custom_text . '" style="width:842px;" /><br><small><i>Login to your sendstrap.com account >> Click Integration >> Copy the Secret key and Paste it here Not Have account yet? <a href="https://app.sendstrap.com/register" target="_blank" style="color:#d30c5c">Create Free Account from here</a></small><i>';
}


// Build Layout For Page ID Field
function sendstrap_settings_pageid_callback()
{
	$options = get_option( 'sendstrap_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'pageid' ] ) ) {
		$custom_text = esc_html( $options['pageid'] );
	}

	echo '<input type="text" id="sendstrap_custom_pageid" name="sendstrap_settings[pageid]" value="' . $custom_text . '" style="width:842px;" /><br><small><i>Add Comma Seperated Page IDs where you want to hide the Chat Widget. Example: <b>536, 965, 5862</b></small><i>';
}