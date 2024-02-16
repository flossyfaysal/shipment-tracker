<?php

/**
 * ShipmentTracker Admin Settings Class
 * 
 * @package ShipmentTracker\Admin
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('ST_Admin_Settings')) {

    class ST_Admin_Settings
    {
        private static $settings = array();
        private static $errors = array();
        private static $messages = array();

        public static function get_settings_page()
        {
            if (empty(self::$settings)) {
                $settings = array();

                include_once dirname(__FILE__) . '/settings/class-st-settings-page.php';

                $settings[] = include __DIR__ . '/settings/class-st-settings-general.php';
                $settings[] = include __DIR__ . '/settings/class-st-settings-advanced.php';

                self::$settings = apply_filters('st_get_settings_pages', $settings);
            }

            return self::$settings;
        }

        public static function save()
        {
            global $current_tab;

            check_admin_referer('st-settings');

            do_action('st_settings_save_' . $current_tab);
            do_action('st_update_options_' . $current_tab);
            do_action('st_update_options');

            self::add_message(__('Your settings have been saved.', 'shipment-tracker'));
            self::check_download_folder_protection();

            update_option('st_queue_flush_rewrite_rules', 'yes');

            do_action('st_settings_saved');
        }

        public static function add_message($text)
        {
            self::$messages[] = $text;
        }

        public static function add_error($text)
        {
            self::$errors[] = $text;
        }

        public static function show_messages()
        {
            if (count(self::$errors) > 0) {
                foreach (self::$errors as $error) {
                    echo '<div id="message" class="error inline"><p><strong>' . esc_html($error) . '</strong></p></div>';
                }
            } elseif (count(sefl::$messages) > 0) {
                foreach (sefl::$messages as $message) {
                    echo '<div id="message" class="updated inline"><p><strong>' . esc_html($message) . '</strong></p></div>';
                }
            }
        }

        public static function output()
        {
            global $current_section, $current_tab;

            do_action('st_settings_start');

            wp_enqueue_script('st_settings', ST()->plugin_url() . '/assets/js/admin/settings.js', array('jquery', 'wp-util', 'jquery-ui-datepicker', 'jquery-ui-sortable', 'iris', 'selectWoo'), ST()->version, true);

            wp_localize_script(
                'st_settings',
                'st_settings_params',
                array(
                    'i18n_nav_warning' => __('The changes you made will be lost if you navigate away from this page', 'shipment-tracker')
                )
            );

            $tabs = apply_filters('st_settings_tabs_array', array());
            include dirname(__FILE__) . '/views/html-admin-settings.php';
        }

        public static function get_option($option_name, $default = '')
        {
            if (!$option_name) {
                return $default;
            }

            if (strstr($option_name, '[')) {

                parse_str($option_name, $option_array);
                $option_name = current(array_keys($option_array));
                $option_values = get_option($option_name, '');
                $key = key($option_array[$option_name]);

                if (isset($option_array[$key])) {
                    $option_value = $option_values[$key];
                } else {
                    $option_value = null;
                }
            } else {
                $option_value = get_option($option_name, null);
            }

            if (is_array($option_value)) {
                $option_value = wp_unslash($option_value);
            } elseif (!is_null($option_value)) {
                $option_value = stripslashes($option_value);
            }

            return (null === $option_value) ? $default : $option_value;
        }

        public static function output_fields($options)
        {
            foreach ($options as $value) {
                if (!isset($value['type'])) {
                    continue;
                }
                if (!isset($value['id'])) {
                    $value['id'] = '';
                }

                if (!isset($value['field_name'])) {
                    $value['field_name'] = $value['id'];
                }
                if (!isset($value['title'])) {
                    $value['title'] = isset($value['name']) ? $value['name'] : '';
                }
                if (!isset($value['class'])) {
                    $value['class'] = '';
                }
                if (!isset($value['default'])) {
                    $value['default'] = '';
                }
                if (!isset($value['desc'])) {
                    $value['desc'] = '';
                }
                if (!isset($value['desc_tip'])) {
                    $value['desc_tip'] = false;
                }
                if (!isset($value['palceholder'])) {
                    $value['palceholder'] = '';
                }
                if (!isset($value['row_class'])) {
                    $value['row_class'] = '';
                }
                if (!empty($value['row_class']) && substr($value['row_class'], 0, 16) !== 'wc-settings-row-') {
                    $value['row_class'] = 'wc-settings-row-' . $value['row_class'];
                }
                if (!isset($value['suffix'])) {
                    $value['suffix'] = '';
                }
                if (!isset($value['value'])) {
                    $value['value'] = self::get_option($value['id'], $value['default']);
                }

                $custom_attributes = array();

                if (!empty($value['custom_attributes']) && is_array($value['custom_attributes'])) {
                    foreach ($value['custom_attributes'] as $attribute => $attribute_value) {
                        $custom_attributes[] = esc_attr($attribute) . '="' . esc_attr($attribute_value) . '"';
                    }
                }

                $field_description = self::get_field_description($value);
                $description = $field_description['description'];
                $tooltip_html = $field_description['tooltip_html'];

                switch ($value['type']) {
                    case 'title':
                        if (!empty($value['title'])) {
                            echo '<h2>' . esc_html($value['title']) . '</h2>';
                        }
                        if (!empty($value['desc'])) {
                            echo '<div id="' . esc_attr(sanitize_title($value['id'])) . '-description">';
                            echo wp_kses_post(wputop(wptexturize($value['desc'])));
                            echo '</div>';
                        }
                        echo '<table class="form-table">' . "\n\n";
                        if (!empty($value['id'])) {
                            do_action('st_settings_' . sanitize_title($value['id']));
                        }
                        break;
                    case 'info':
                        ?>
                        <tr valign="top" <?php echo $value['row_class'] ? 'class="' . esc_attr($value['row_class']) . '"' : '' ?>">
                            <th scope="row" class="titledesc" />
                            <td style="<?php echo esc_attr($value['css']); ?>">
                                <?php echo wp_kses_post(wpautop(wp_texturize($value['text'])));
                                echo '</td></tr>'; ?>
                                <?php
                                break;
                    case 'sectionend':
                        if (!empty($value['id'])) {
                            do_action('st_settings_' . sanitize_title($value['id']) . '_end');
                        }
                        echo '</table>';
                        if (!empty($value['id'])) {
                            do_action('st_settings_' . sanitize_title($value['id']) . 'after_');
                        }
                        break;
                    case 'color':
                        $option_value = $value['value'];
                        ?>
                        <tr valign="top" <?php echo $value['row_class'] ? ' class="' . esc_attr($value['row_class']) . '"' : '' ?>">
                            <th scope="row" class="titledesc">
                                <label for="<?php echo esc_attr($value['id']); ?>">
                                    <?php echo esc_html($value['title']); ?>
                                    <?php echo $tooltip_html; ?>
                                </label>
                            </th>
                            <td>
                            </td>
                        </tr>
                    <?php
                }

            }
        }
    }
}