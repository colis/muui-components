<?php
/**
 * Plugin Name: MUUI Components
 * Plugin URI:  https://pragmatic.agency
 * Description: Pragmatic UI Components centralised container.
 * Version:     0.1.0
 * Author:      Pragmatic
 * Author URI:  https://pragmatic.agency
 * Text Domain: muui-components
 * Domain Path: /languages
 *
 * @package MuuiComponents
 */

// Useful global constants.
define( 'MUUI_COMPONENTS_VERSION', '0.1.0' );
define( 'MUUI_COMPONENTS_URL', plugin_dir_url( __FILE__ ) );
define( 'MUUI_COMPONENTS_PATH', plugin_dir_path( __FILE__ ) );
define( 'MUUI_COMPONENTS_INC', MUUI_COMPONENTS_PATH . 'includes/' );

// Include files.
require_once MUUI_COMPONENTS_INC . 'functions/core.php';

// Activation/Deactivation.
register_activation_hook( __FILE__, '\MuuiComponents\Core\activate' );
register_deactivation_hook( __FILE__, '\MuuiComponents\Core\deactivate' );

// Bootstrap.
MuuiComponents\Core\setup();

// Require Composer autoloader if it exists.
if ( file_exists( MUUI_COMPONENTS_PATH . '/vendor/autoload.php' ) ) {
	require_once MUUI_COMPONENTS_PATH . 'vendor/autoload.php';
}
