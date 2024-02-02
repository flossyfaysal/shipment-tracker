<?php
/**
 * Shipment Tracker Shortcode
 *
 * Lets a user see the status of an order by entering their order details.
 *
 * @package ShipmentTracker\Shortcodes\Order_Tracker
 * @version 3.0.0
 */

defined('ABSPATH') || exit;

/**
 * Shortcode order tracker class.
 */
class ST_Shortcode_Shipment_Tracker
{
    public static function get($atts)
    {
        return ST_Shortcodes::shortcode_wrapper(array(__CLASS__, 'output'), $atts);
    }

    public static function output($atts)
    {

        if (is_null(WC()->cart)) {
            return;
        }

        $atts = shortcode_atts(array(), $atts, 'st_shipment_tracker');
        $nonce_value = wc_get_var($_REQUEST['shipment-tracker-nonce'], wc_get_var($_REQUEST['_wpnonce']));

        if (isset($_REQUEST['trackerid']) && wp_verify_nonce($nonce_value, 'shipment_tracker')) {
            $tracker_id = empty($_REQUEST['trackerid']) ? 0 : ltrim(wc_clean(wp_unslash($_REQUEST['trackerid'])), '#');

            if (!$tracker_id) {
                wc_print_notice(__('Please enter a valid tracking ID', 'shipment-tracker'), 'error');
            } else {
                $order = wc_get_order($tracker_id);

                if ($order && $order->get_id() && is_a($order, 'WC_Order')) {
                    include_once ST_ABSPATH . 'templates/order/tracker.php';
                } else {
                    wc_print_notice(__('Sorry, the shipment could not be found. Please contact us if you are having difficulty finding your order details.', 'shipment-tracker'), 'error');
                }
            }

        }

        include_once ST_ABSPATH . 'templates/order/form-tracker.php';
    }
}
