<?php


// Add Links to plugins.php Page and Rearrange Settings Links
function sendstrap_setting_links( $actions, $plugin_file ) 
{
	static $plugin;

	if (!isset($plugin))
		$plugin = SENDSTRAP_BASENAME;
	
	if ($plugin == $plugin_file)
	{
		$settings = array('settings' => '<a href="options-general.php?page=sendstrap">' . __('Settings', 'General') . '</a>');
		$site_link = array('support' => '<b><a href="https://app.sendstrap.com/register" target="_blank" style="color:#d30c5c">Create Free Account</a></b>');
		
    	$actions = array_merge($settings, $actions);
		$actions = array_merge($site_link, $actions);
	}
		
	return $actions;
}
add_filter( 'plugin_action_links', 'sendstrap_setting_links', 10, 2 );

// Register Sendstrap Settings in WordPress General Settings Page
function sendstrap_register_options_page()
{
  add_options_page('', 'SendStrap', 'manage_options', 'sendstrap', 'sendstrap_options_page');
}
add_action('admin_menu', 'sendstrap_register_options_page');

// Add Settings If Plugin Has Been Activated For the First Time
function sendstrap_first_install()
{
	$options = [];
	$options['enable']	= 1;
	$options['id']	= "";
	$options['key']	= "";
  
	if( !get_option( 'sendstrap_settings' ) )
		update_option( 'sendstrap_settings', $options );
}