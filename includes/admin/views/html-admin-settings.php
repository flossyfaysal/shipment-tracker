<?php

/**
 * Admin View: Settings
 * 
 * @package ShipmentTracker
 */

if (!defined('ABSPATH')) {
    exit;
}

$tabs_exists = isset($tabs[$current_tab]) || has_action('st_sections_' . $current_tab) || has_action('
st_settings_' . $current_tab) || has_action('st_settings_tab_' . $current_tab);
$current_tab_label = isset($tabs[$current_tab]) ? $tabs[$current_tab] : '';

// if (!$tab_exists) {
//     wp_safe_redirect(admin_url('admin.php?page=st-settings'));
//     exit;
// }
?>

<div class="wrap shiptment-tracker">
    <?php do_action('st_before_settings_' . $current_tab); ?>
    <form method="<?php echo esc_attr(apply_filters('st_settings_form_method_tab_' . $current_tab, 'post')); ?>"
        id="mainform" action="" enctype="multipart/form-data">
        <nav class="nav-tab-wrapper st-nav-tab-wrapper">
            <?php
            foreach ($tabs as $slug => $label) {
                echo '<a href="' . esc_html(admin_url('admin.php?page=st-settings&tab=' . esc_attr($slug))) . '" class="nav-tab' . ($current_tab === $slug ? 'nav-tab-active' : '') . '">' . esc_html($label) . '</a>';
            }

            do_action('st_settings_tab');
            ?>
        </nav>
        <h1 class="screen-reader-text">
            <?php echo esc_html($current_tab_label); ?>
        </h1>
        <?php
        do_action('st_sections_' . $current_tab);

        self::show_messages();

        do_action('st_settings_' . $current_tab);
        do_action('st_settings_tabs_' . $current_tab);
        ?>
        <p class="submit">
            <?php
            if (empty($GLOBALS['hide_save_button'])) {
                ?>
                <button name="save" class="button-primary st-save-button" type="submit"
                    value="<?php esc_attr_e('Save Changes', 'shipment-tracker'); ?>">
                    <?php esc_html_e('Save Changes', 'shipment-tracker'); ?>
                </button>
                <?php
            }
            wp_nonce_field('st-settings');
            ?>
        </p>
    </form>
    <?php do_action('st_after_settings_' . $current_tab); ?>
</div>