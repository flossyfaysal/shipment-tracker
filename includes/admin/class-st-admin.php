<?php

/**
 * Shipment Tracker
 * 
 * @class ST_Admin
 * @package ShipmentTracker\Admin
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class ST_Admin
{
    public function __construct()
    {
        add_action('init', array($this, 'includes'));
    }

    public function includes()
    {
        include_once __DIR__ . '/class-st-admin-assets.php';
        include_once __DIR__ . '/class-st-table-list.php';
        include_once __DIR__ . '/class-st-admin-menu.php';
    }
}

new ST_Admin();