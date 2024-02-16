<?php
/**
 * Plugin Name: Shipment Tracker
 * Plugin URI: https://demo.com/shipment-tracker
 * Description: A very simple shipment tracker for woocommerce
 * Version: 1.0.0
 * Author: demo
 * Author URI: https://demo.com/
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Requires at least: 6.0
 * Tested up to: 6.1.1
 * WC requires at least: 6.0
 * WC tested up to: 7.3.0
 *
 * Text Domain: shipment-tracker
 * Domain Path: /languages
 *
 * @package ShipmentTracker
 * @author Demo
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('ST_PLUGIN_FILE')) {
    define('ST_PLUGIN_FILE', __FILE__);
}

if (!class_exists('ShipmentTracker')) {
    include_once dirname(ST_PLUGIN_FILE) . '/includes/class-shipment-tracker.php';
}

function ST()
{
    return ShipmentTracker::instance();
}

$GLOBALS['shipmenttracker'] = ST();



