<?php

/**
 * Shipment Tracker Form
 * 
 * @package ShipmentTracker\Templates
 */

defined('ABSPATH') || exit;

global $post;
?>

<form action="<?php echo esc_url(get_permalink($post->ID)); ?>" method="post" class="shipment-tracker-form track_order">
    <h3>
        <?php esc_html_e('Shipment Tracker', 'shipment-tracker') ?>
    </h3>
    <p>
        <?php esc_html_e('Track your parcel', 'shipment-tracker'); ?>
    </p>

    <p>
        <label>
            <?php esc_html_e('Tracker ID', 'shipment-tracker'); ?>
        </label>

        <input type="text" name="trackerid" id="trackerid"
            value="<?php echo isset($_REQUEST['trackerid']) ? esc_attr(wp_unslash($_REQUEST['trackerid'])) : ''; ?>"
            placeholder="<?php esc_html_e('Tracker ID: XXXXX'); ?>" />
        <span class="dashicons dashicons-marker"></span>
        <button type="submit" class="button" name="track" value="<?php esc_html_e('Track Parcel'); ?>">
            <?php esc_html_e('Track Parcel'); ?>
        </button>
    </p>

    <?php wp_nonce_field('shipment_tracker', 'shipment-tracker-nonce'); ?>

</form>