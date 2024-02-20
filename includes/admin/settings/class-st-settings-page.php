<?php

/**
 * ShipmentTracker Settings Page/Tab 
 * 
 * @package ShipmentTracker\Admin
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('ST_Settings_Page', false)) {
    abstract class ST_Settings_Page
    {
        protected $id = '';
        protected $label = '';

        public function __construct()
        {
            add_filter('st_settings_tab_array', array($this, 'add_settings_page'), 20);
            add_action('st_sections_' . $this->id, array($this, 'output_sections'));
            add_action('st_settings_' . $this->id, array($this, 'output'));
            add_action('st_settings_save_' . $this->id, array($this, 'save'));
        }

        public function get_id()
        {
            return $this->id;
        }

        public function get_label()
        {
            return $this->label;
        }

        public function add_settings_page($pages)
        {
            $pages[$this->id] = $this->label;

            return $pages;
        }

        public function get_settings()
        {
            $section_id = 0 === func_num_args() ? '' : func_get_arg(0);

            return $this->get_settings_for_section($section_id);
        }

        final public function get_settings_for_section($section_id)
        {
            if ('' === $section_id) {
                $method_name = 'get_settings_for_default_section';
            } else {
                $method_name = "get_settings_for_{$section_id}_section";
            }

            if (method_exists($this, $method_name)) {
                $settings = $this->$method_name;
            } else {
                $settings = $this->get_settings_for_section_core($section_id);
            }

            return apply_filters('st_get_settings_' . $this->id, $settings, $section_id);
        }

        protected function get_settings_for_section_core($section_id)
        {
            return array();
        }

        public function get_sections()
        {
            $sections = $this->get_own_sections();
            return apply_filters('st_get_sections_' . $this->id, $sections);
        }

        protected function get_own_sections()
        {
            return array('' => __('General', 'shipment-tracker'));
        }

        public function output_sections()
        {
            global $current_section;

            $sections = $this->get_sections();

            if (empty($sections) || 1 === count($sections)) {
                return;
            }

            echo '<ul class="subsubsub">';

            $array_keys = array_keys($sections);

            foreach ($sections as $id => $label) {
                $url = admin_url('admin.php?page=st-settings&tab=' . $this->id . '&section=' . sanitize_title($id));
                $class = ($current_section === $id ? 'current' : '');
                $separator = (end($array_keys) === $id ? '' : '|');
                $text = esc_html($label);

                echo "<li><a href='$url' class='$class'>$text</a>$seperator</li>";
            }

            echo '</ul><br class="clear" />';
        }

        public function output()
        {
            global $current_section;

            $settings = $this->get_settings_for_section($current_section);

            ST_Admin_Settings::output_fields($settings);
        }

        public function save()
        {
            $this->save_settings_for_current_section();
            $this->do_update_options_action();
        }

        protected function save_settings_for_current_section()
        {
            global $current_section;

            $settings = $this->get_settings_for_section($current_section);
            ST_Admin_Settings::save_fields($settings);
        }

        protected function do_update_options_action($section_id = null)
        {
            global $current_section;

            if (is_null($section_id)) {
                $section_id = $current_section;
            }

            if ($section_id) {
                do_action('st_update_options_' . $this->id . '_' . $section_id);
            }
        }
    }
}