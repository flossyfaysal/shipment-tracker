<?php
/**
 * Shipment Tracker
 *
 * @package ShipmentTracker
 * @since   1.1.0
 */

final class ShipmentTracker
{
    protected $version = '1.0.0';
    protected static $instance = null;

    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->define_constants();
        $this->includes();
        $this->init_hooks();
    }

    private function init_hooks()
    {
        add_action('init', array('ST_Shortcodes', 'init'));
    }

    private function includes()
    {
        include_once ST_ABSPATH . 'includes/class-st-shortcodes.php';
        include_once ST_ABSPATH . 'includes/shortcodes/class-st-shortcodes-shipment-tracker.php';

        if ($this->is_request('admin')) {
            include_once ST_ABSPATH . 'includes/admin/class-st-admin.php';
        }

        if ($this->is_request('frontend')) {
            include_once ST_ABSPATH . 'includes/class-st-front-scripts.php';
        }

    }

    private function define_constants()
    {
        $this->define('ST_ABSPATH', dirname(ST_PLUGIN_FILE) . '/');
        $this->define('ST_PLUGIN_BASENAME', plugin_basename(ST_PLUGIN_FILE));
        $this->define('ST_VERSION', $this->version);
    }

    private function define($path, $value)
    {
        if (!defined($path)) {
            return define($path, $value);
        }
    }

    private function is_request($type)
    {
        switch ($type) {
            case 'admin':
                return is_admin();
            case 'ajax':
                return defined('DOING_AJAX');
            case 'cron':
                return defined('DOING_CRON');
            case 'frontend':
                return (!is_admin() || defined('DOING_AJAX')) && !defined('DOING_CRON');
        }
    }

}