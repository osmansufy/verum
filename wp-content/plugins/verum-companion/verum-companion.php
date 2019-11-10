<?php
/**
 * Plugin Name:Verum Widget
 * Plugin URI:
 * Descruption:Verum Theme Companion Plugin
 * Version:1.0
 * Author:osman
 * Author URI:
 *Plugin Type:Piklist
 */

require_once plugin_dir_path(__FILE__) . "/widgets/verum-flickr-widgets.php";
require_once plugin_dir_path(__FILE__) . "/widgets/verum_about_widget.php";
require_once plugin_dir_path(__FILE__) . "/widgets/verum_latest_post_widget.php";
require_once plugin_dir_path(__FILE__) . "/widgets/verum_adv_widget.php";
require_once plugin_dir_path(__FILE__) . "/widgets/verum_nl_widget.php";
require_once plugin_dir_path(__FILE__) . "/parts/widgets/social.php";

function verum_load_textdomain()
{
    load_plugin_textdomain('verum-companion', false, dirname(__FILE__) . "/language");
}

add_action('plugin_loaded', 'verum_load_textdomain');
function verum_plugin_init()
{

    add_image_size('verum_latestpost_thum', 90, 75, true);
}

add_action('init', 'verum_plugin_init');