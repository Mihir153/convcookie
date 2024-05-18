<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://conversios.io
 * @since             1.0.0
 * @package           Conversios_Cookie
 *
 * @wordpress-plugin
 * Plugin Name:       Conversios Cookie
 * Plugin URI:        https://conversios.io
 * Description:       a cookie plugin accordance to DPDP
 * Version:           1.0.0
 * Author:            conversios
 * Author URI:        https://conversios.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       conversios-cookie
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('CONVERSIOS_COOKIE_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-conversios-cookie-activator.php
 */
function activate_conversios_cookie()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-conversios-cookie-activator.php';
    Conversios_Cookie_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-conversios-cookie-deactivator.php
 */
function deactivate_conversios_cookie()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-conversios-cookie-deactivator.php';
    Conversios_Cookie_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_conversios_cookie');
register_deactivation_hook(__FILE__, 'deactivate_conversios_cookie');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-conversios-cookie.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_conversios_cookie()
{

    $plugin = new Conversios_Cookie();
    $plugin->run();
}
run_conversios_cookie();
function cookie_dashboard()
{
    // Add top-level menu page
    add_menu_page(
        'Conversios Cookie', // Page title
        'Conversios Cookie', // Menu title
        'manage_options', // Capability required
        'dashboard', // Menu slug
        'dashboard', // Callback function to output content
        esc_url_raw(plugin_dir_url(__FILE__).'admin/image/tatvic_logo.png'),
     // Position in the menu
    );
    // Add submenu pages
    add_submenu_page(
        'dashboard', // Parent menu slug
        '', // Empty menu title
        '', // Empty menu title
        'manage_options', // Capability required
        'cookie_banner', // Menu slug
        'cookie_banner' // Callback function to output content
    );
    add_submenu_page(
        'dashboard', // Parent menu slug
        '', // Empty menu title
        '', // Empty menu title
        'manage_options', // Capability required
        'cookie_manager', // Menu slug
        'cookie_manager' // Callback function to output content
    );
    // Hide submenu pages from the menu   
    remove_submenu_page('dashboard', 'cookie_banner');
    remove_submenu_page('dashboard', 'cookie_manager');
}
add_action('admin_menu', 'cookie_dashboard');
function cookie_banner()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    else{
    // Include the content from the separate PHP file
    include plugin_dir_path(__FILE__) . 'admin/partials/cookie_banner.php';
    }   
}
function cookie_manager()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    else{
    include plugin_dir_path(__FILE__) . 'admin/partials/cookie_manager.php';
    } 
}
function dashboard()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    if(isset($_GET['tab']) && $_GET['tab'] == 'cookie_manager') {
        cookie_manager();
    }
    elseif(isset($_GET['tab']) && $_GET['tab'] == 'cookie_banner') {
        cookie_banner();
    }
    else{
    include plugin_dir_path(__FILE__) . 'admin/partials/dashboard.php';
    }
}
add_action('wp_footer', 'cookie_function');
function cookie_function()
{
    include plugin_dir_path(__FILE__) . 'admin/partials/cookie_setup.php';
}
