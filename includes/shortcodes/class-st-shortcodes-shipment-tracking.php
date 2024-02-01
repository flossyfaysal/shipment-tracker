<?php
/**
 * Shipment Tracker Shortcode
 *
 * Lets a user see the status of an order by entering their order details.
 *
 * @package ShipmentTracker\Shortcodes\Order_Tracking
 * @version 3.0.0
 */

defined('ABSPATH') || exit;

/**
 * Shortcode order tracking class.
 */
class ST_Shortcode_Shipment_Tracking
{
    public static function get($atts)
    {
        return ST_Shortcodes::shortcode_wrapper(array(__CLASS__, 'output'), $atts);
    }

    public static function output($atts)
    {


        include_once ST_ABSPATH . 'templates/order/form-tracking.php';
    }
}
