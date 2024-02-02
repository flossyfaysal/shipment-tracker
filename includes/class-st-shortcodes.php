<?php

/**
 * Shortcodes - Shipment Tracker
 * 
 * @package ShipmentTracker\Classes
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

class ST_Shortcodes
{
    public static function init()
    {
        $shortcodes = array(
            'st_shipment_tracker' => __CLASS__ . '::shipment_tracker'
        );

        foreach ($shortcodes as $shortcode => $function) {
            add_shortcode($shortcode, $function);
        }
    }

    public static function shortcode_wrapper($function, $atts = array(), $wrapper = array('class' => 'shipment-tracker', 'before' => null, 'after' => null))
    {
        ob_start();

        echo empty($wrapper['before']) ? '<div class="' . esc_attr($wrapper['class']) . '">' : $wrapper['before'];
        call_user_func($function, $atts);
        echo empty($wrapper['after']) ? '</div>' : $wrapper['after'];

        return ob_get_clean();
    }

    public static function shipment_tracker($atts)
    {
        return self::shortcode_wrapper(
            array(
                'ST_Shortcode_Shipment_Tracker',
                'output'
            ),
            $atts
        );
    }
}