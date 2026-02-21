<?php
/**
 * Custom Post Types & Taxonomies
 *
 * @package InfraTechton
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ============================================================
// SERVICES CPT
// ============================================================

function infratechton_register_services() {
    register_post_type( 'it_service', array(
        'labels' => array(
            'name'          => __( 'Services', 'infratechton' ),
            'singular_name' => __( 'Service', 'infratechton' ),
            'add_new'       => __( 'Add Service', 'infratechton' ),
            'add_new_item'  => __( 'Add New Service', 'infratechton' ),
            'edit_item'     => __( 'Edit Service', 'infratechton' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-networking',
        'menu_position'=> 5,
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'rewrite'      => array( 'slug' => 'services' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'infratechton_register_services' );

// ============================================================
// CASE STUDIES CPT
// ============================================================

function infratechton_register_case_studies() {
    register_post_type( 'it_case_study', array(
        'labels' => array(
            'name'          => __( 'Case Studies', 'infratechton' ),
            'singular_name' => __( 'Case Study', 'infratechton' ),
            'add_new_item'  => __( 'Add New Case Study', 'infratechton' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-analytics',
        'menu_position'=> 6,
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'rewrite'      => array( 'slug' => 'case-studies' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'infratechton_register_case_studies' );

// ============================================================
// TESTIMONIALS CPT
// ============================================================

function infratechton_register_testimonials() {
    register_post_type( 'it_testimonial', array(
        'labels' => array(
            'name'          => __( 'Testimonials', 'infratechton' ),
            'singular_name' => __( 'Testimonial', 'infratechton' ),
            'add_new_item'  => __( 'Add New Testimonial', 'infratechton' ),
        ),
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-star-filled',
        'menu_position'=> 7,
        'supports'     => array( 'title', 'editor', 'custom-fields' ),
        'show_in_rest' => false,
    ) );
}
add_action( 'init', 'infratechton_register_testimonials' );

// ============================================================
// LEAD INQUIRIES CPT (internal)
// ============================================================

function infratechton_register_inquiries() {
    register_post_type( 'it_inquiry', array(
        'labels' => array(
            'name'          => __( 'Inquiries', 'infratechton' ),
            'singular_name' => __( 'Inquiry', 'infratechton' ),
        ),
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-email-alt',
        'menu_position'=> 8,
        'supports'     => array( 'title', 'editor' ),
        'show_in_rest' => false,
        'capabilities' => array(
            'create_posts' => 'do_not_allow',
        ),
        'map_meta_cap' => true,
    ) );
}
add_action( 'init', 'infratechton_register_inquiries' );

// ============================================================
// SERVICE TAXONOMY
// ============================================================

function infratechton_register_service_category() {
    register_taxonomy( 'service_tier', array( 'it_service' ), array(
        'labels' => array(
            'name'          => __( 'Service Tiers', 'infratechton' ),
            'singular_name' => __( 'Service Tier', 'infratechton' ),
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'service-tier' ),
    ) );
}
add_action( 'init', 'infratechton_register_service_category' );

// ============================================================
// META BOXES
// ============================================================

function infratechton_add_service_meta() {
    add_meta_box(
        'service_pricing',
        __( 'Service Pricing', 'infratechton' ),
        'infratechton_service_pricing_cb',
        'it_service',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'infratechton_add_service_meta' );

function infratechton_service_pricing_cb( $post ) {
    wp_nonce_field( 'infratechton_service_meta', 'infratechton_nonce' );
    $price_min  = get_post_meta( $post->ID, '_service_price_min', true );
    $price_max  = get_post_meta( $post->ID, '_service_price_max', true );
    $currency   = get_post_meta( $post->ID, '_service_currency', true ) ?: '€';
    $tier       = get_post_meta( $post->ID, '_service_tier', true );
    ?>
    <p>
        <label><?php esc_html_e( 'Currency', 'infratechton' ); ?></label><br>
        <select name="service_currency" style="width:100%;">
            <option value="€" <?php selected( $currency, '€' ); ?>>EUR (€)</option>
            <option value="$" <?php selected( $currency, '$' ); ?>>USD ($)</option>
        </select>
    </p>
    <p>
        <label><?php esc_html_e( 'Price Min', 'infratechton' ); ?></label><br>
        <input type="number" name="service_price_min" value="<?php echo esc_attr( $price_min ); ?>" style="width:100%;">
    </p>
    <p>
        <label><?php esc_html_e( 'Price Max', 'infratechton' ); ?></label><br>
        <input type="number" name="service_price_max" value="<?php echo esc_attr( $price_max ); ?>" style="width:100%;">
    </p>
    <p>
        <label><?php esc_html_e( 'Service Tier', 'infratechton' ); ?></label><br>
        <select name="service_tier" style="width:100%;">
            <option value="tier-1" <?php selected( $tier, 'tier-1' ); ?>>Tier 1 - Technical Delivery</option>
            <option value="tier-2" <?php selected( $tier, 'tier-2' ); ?>>Tier 2 - Operations & Managed</option>
            <option value="tier-3" <?php selected( $tier, 'tier-3' ); ?>>Tier 3 - Strategic Advisory</option>
        </select>
    </p>
    <?php
}

function infratechton_save_service_meta( $post_id ) {
    if ( ! isset( $_POST['infratechton_nonce'] ) || ! wp_verify_nonce( $_POST['infratechton_nonce'], 'infratechton_service_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['service_price_min'] ) ) {
        update_post_meta( $post_id, '_service_price_min', absint( $_POST['service_price_min'] ) );
    }
    if ( isset( $_POST['service_price_max'] ) ) {
        update_post_meta( $post_id, '_service_price_max', absint( $_POST['service_price_max'] ) );
    }
    if ( isset( $_POST['service_currency'] ) ) {
        update_post_meta( $post_id, '_service_currency', sanitize_text_field( $_POST['service_currency'] ) );
    }
    if ( isset( $_POST['service_tier'] ) ) {
        update_post_meta( $post_id, '_service_tier', sanitize_text_field( $_POST['service_tier'] ) );
    }
}
add_action( 'save_post_it_service', 'infratechton_save_service_meta' );
