<?php

/**
 * Shipment Tracker Table List
 * 
 * @package ShipmentTracker\Admin
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * ShipmentTracker List Tracker Class
 */

class ST_Admin_Table_List extends WP_List_Table
{
    public function __construct()
    {
        parent::__construct(
            array(
                'singular' => 'tracking',
                'plural' => 'trackingitems',
                'ajax' => false
            )
        );
    }

    public function no_items()
    {
        esc_html_e('No keys found', 'shipment-tracker');
    }

    public function get_columns()
    {
        return array(
            'cb' => '<input type="checkbox" />',
            'tracking_id' => __('Tracking ID', 'shipment-tracker'),
            'order_id' => __('Order ID', 'shipment-tracker'),
            'customer_name' => __('Customer Name', 'shipment-tracker'),
            'status' => __('Status', 'shipment-tracker'),
            'tracking_url' => __('Tracking URL', 'shipment-tracker'),
        );
    }

    public function column_cb($item)
    {
        return sprintf('<input type="checkbox" name="tracking[]" value="%1$s" />', $item['tracking_id']);
    }

    public function column_title($item)
    {
        $url = admin_url('admin.php?page=wc-settings&tab=advanced&section=keys&edit-key');
    }






}

return new ST_Admin_Table_List();