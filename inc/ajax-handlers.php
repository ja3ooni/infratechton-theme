<?php
/**
 * AJAX Handlers — Contact Form & Lead Capture
 *
 * @package InfraTechton
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ============================================================
// CONTACT FORM SUBMISSION
// ============================================================

function infratechton_handle_contact() {
    check_ajax_referer( 'infratechton_ajax', 'nonce' );

    $name    = sanitize_text_field( $_POST['name']    ?? '' );
    $email   = sanitize_email(      $_POST['email']   ?? '' );
    $company = sanitize_text_field( $_POST['company'] ?? '' );
    $service = sanitize_text_field( $_POST['service'] ?? '' );
    $message = sanitize_textarea_field( $_POST['message'] ?? '' );
    $budget  = sanitize_text_field( $_POST['budget']  ?? '' );

    if ( empty( $name ) || empty( $email ) || ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => __( 'Please provide a valid name and email.', 'infratechton' ) ) );
    }

    if ( empty( $message ) ) {
        wp_send_json_error( array( 'message' => __( 'Please describe your project.', 'infratechton' ) ) );
    }

    // Save as CPT
    $inquiry_id = wp_insert_post( array(
        'post_type'   => 'it_inquiry',
        'post_status' => 'publish',
        'post_title'  => sprintf( '%s — %s', $name, current_time( 'd M Y H:i' ) ),
        'post_content'=> wp_kses_post( $message ),
    ) );

    if ( $inquiry_id ) {
        update_post_meta( $inquiry_id, '_inquiry_name',    $name );
        update_post_meta( $inquiry_id, '_inquiry_email',   $email );
        update_post_meta( $inquiry_id, '_inquiry_company', $company );
        update_post_meta( $inquiry_id, '_inquiry_service', $service );
        update_post_meta( $inquiry_id, '_inquiry_budget',  $budget );
    }

    // Send notification email to admin
    $admin_email = get_option( 'admin_email' );
    $subject = sprintf( '[InfraTechton] New Inquiry from %s (%s)', $name, $company ?: 'No company' );
    $body = sprintf(
        "New inquiry received:\n\nName: %s\nEmail: %s\nCompany: %s\nService: %s\nBudget: %s\n\nMessage:\n%s\n\n--\nInfraTechton Solutions CRM",
        $name, $email, $company, $service, $budget, $message
    );
    $headers = array( 'Content-Type: text/plain; charset=UTF-8', 'From: InfraTechton Website <noreply@infratechton.com>' );
    $headers[] = sprintf( 'Reply-To: %s <%s>', $name, $email );
    wp_mail( $admin_email, $subject, $body, $headers );

    // Send confirmation to prospect
    $confirm_subject = __( 'Thank you for contacting InfraTechton Solutions', 'infratechton' );
    $confirm_body = sprintf(
        "Hi %s,\n\nThank you for reaching out to InfraTechton Solutions!\n\nWe've received your inquiry about GPU infrastructure and will respond within 24 hours.\n\nYour reference: #%d\n\nBest regards,\nAbdullah\nCEO, InfraTechton Solutions\nhttps://infratechton.com",
        $name, $inquiry_id
    );
    wp_mail( $email, $confirm_subject, $confirm_body, array( 'Content-Type: text/plain; charset=UTF-8', 'From: Abdullah at InfraTechton <info@infratechton.com>' ) );

    wp_send_json_success( array(
        'message' => __( "Thank you! We'll be in touch within 24 hours.", 'infratechton' ),
        'ref'     => '#' . $inquiry_id,
    ) );
}
add_action( 'wp_ajax_infratechton_contact',        'infratechton_handle_contact' );
add_action( 'wp_ajax_nopriv_infratechton_contact', 'infratechton_handle_contact' );

// ============================================================
// ROI CALCULATOR LEAD CAPTURE
// ============================================================

function infratechton_capture_roi_lead() {
    check_ajax_referer( 'infratechton_ajax', 'nonce' );

    $email   = sanitize_email(      $_POST['email']   ?? '' );
    $gpus    = absint(              $_POST['gpus']    ?? 0 );
    $monthly = absint(              $_POST['monthly'] ?? 0 );

    if ( ! is_email( $email ) || $gpus < 1 ) {
        wp_send_json_error( array( 'message' => __( 'Invalid data provided.', 'infratechton' ) ) );
    }

    // Save lead
    $lead_id = wp_insert_post( array(
        'post_type'   => 'it_inquiry',
        'post_status' => 'publish',
        'post_title'  => sprintf( 'ROI Lead — %s — %d GPUs', $email, $gpus ),
        'post_content'=> sprintf( 'Email: %s | GPUs: %d | Monthly Spend: €%d', $email, $gpus, $monthly ),
    ) );

    if ( $lead_id ) {
        update_post_meta( $lead_id, '_lead_type',    'roi_calculator' );
        update_post_meta( $lead_id, '_lead_email',   $email );
        update_post_meta( $lead_id, '_lead_gpus',    $gpus );
        update_post_meta( $lead_id, '_lead_monthly', $monthly );
    }

    wp_send_json_success( array( 'message' => __( 'ROI report sent to your email!', 'infratechton' ) ) );
}
add_action( 'wp_ajax_infratechton_roi_lead',        'infratechton_capture_roi_lead' );
add_action( 'wp_ajax_nopriv_infratechton_roi_lead', 'infratechton_capture_roi_lead' );
