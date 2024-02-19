<?php

/**
 * Setup menu in WPAdmin
 * 
 * @package ShipmentTracker\Admin
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

if (class_exists('ST_Admin_Menus', false)) {
    return new ST_Admin_Menus();
}

class ST_Admin_Menus
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'admin_menu'), 9);
        add_action('admin_menu', array($this, 'settings_menu'), 50);
    }

    public function admin_menu()
    {
        $st_icon = "";
        add_menu_page(__('Shipment Tracker', 'shipment-tracker'), __('Shipment Tracker', 'shipment-tracker'), 'manage_woocommerce', 'shipment-tracker', null, $st_icon);
    }

    public function settings_menu()
    {
        $settings_page = add_submenu_page('shipment-tracker', __('ST Settings', 'shipment-tracker'), __('Settings', 'shipment-tracker'), 'manage_woocommerce', 'st-settings', array($this, 'settings_page'));

        add_action('load-' . $settings_page, array($this, 'settings_page_init'));
    }

    public function settings_page()
    {
        echo 'true';
    }

    public function settings_page_init()
    {

    }
}

return new ST_Admin_Menus();