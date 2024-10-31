<?php
/*
Plugin Name:Sendstrap.com Social Buttons Chat
Description: Get more chats and keep conversation going even if visitors leave your website.
Version: 3.0.0
Author: SendStrap
Author URI: https://www.sendstrap.com/
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: SendStrap.com
Domain Path:  SendStrap.com
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


// Define SENDSTRAP_URL as a PHP Constant
define( 'SENDSTRAP_URL', plugin_dir_url( __FILE__ ) );

// Define SENDSTRAP_BASENAME as a PHP Constant
define ( 'SENDSTRAP_BASENAME', plugin_basename( __FILE__ ) );



// Initiate Admin Settings
include( plugin_dir_path( __FILE__ ) . 'includes/sendstrap-setting.php');

// Design of Plugin Settings Page
include( plugin_dir_path( __FILE__ ) . 'includes/sendstrap-admin.php');

// Setting Sections and Fields
include( plugin_dir_path( __FILE__ ) . 'includes/sendstrap-options.php');

// Frontend Header Code
include( plugin_dir_path( __FILE__ ) . 'includes/sendstrap-widget.php');

?>