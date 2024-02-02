<?php

/**
 * Handle frontend scripts
 * 
 * @package ShipmentTracker\Classes
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class ST_Frontend_Scripts
{
    private static $scripts = array();

    private static $styles = array();

    private static $wp_localize_scripts = array();

    public static function init()
    {
        add_action('wp_enqueue_scripts', array(__CLASS__, 'load_scripts'));
    }

    public static function get_styles()
    {
        $version = '1.0.0';

        $styles = array(
            'st-general' => array(
                'src' => self::get_asset_url('assets/css/st-general.css'),
                'deps' => '',
                'version' => $version,
                'media' => 'all',
            ),
            'st-tracker' => array(
                'src' => self::get_asset_url('assets/css/st-tracker.css'),
                'deps' => '',
                'version' => $version,
                'media' => 'all',
            ),
        );

        return is_array($styles) ? array_filter($styles) : array();
    }

    private static function enqueue_style($handle, $path = '', $deps = array(), $version = ST_VERSION, $media = 'all')
    {
        if (!in_array($handle, self::$styles, true) && $path) {
            self::register_style($handle, $path, $deps, $version, $media);
        }
        wp_enqueue_style($handle);
    }

    private static function register_style($handle, $path, $deps = array(), $version = ST_VERSION, $media = 'all')
    {
        self::$styles[] = $handle;
        wp_register_style($handle, $path, $deps, $version, $media);
    }

    public static function load_scripts()
    {
        $enqueue_styles = self::get_styles();
        if ($enqueue_styles) {
            foreach ($enqueue_styles as $handle => $args) {
                self::enqueue_style($handle, $args['src'], $args['deps'], $args['version'], $args['media']);
            }
        }
    }

    private static function get_asset_url($path)
    {
        return plugins_url($path, ST_PLUGIN_FILE);
    }
}

ST_Frontend_Scripts::init();