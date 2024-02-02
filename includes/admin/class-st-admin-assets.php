<?php

/**
 * Load assets
 * 
 * @package ShipmentTracker\Admin\Assets
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class ST_Admin_Assets
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'admin_styles'));
        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
    }

    public function admin_styles()
    {
    }
}

return new ST_Admin_Assets();