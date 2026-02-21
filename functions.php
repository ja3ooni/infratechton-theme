<?php
/**
 * InfraTechton Solutions — Theme Functions
 * @package InfraTechton
 * @version 1.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'INFRATECHTON_VERSION', '1.1.0' );
define( 'INFRATECHTON_PATH',    get_template_directory() );
define( 'INFRATECHTON_URI',     get_template_directory_uri() );

// ============================================================
// THEME SETUP
// ============================================================
function infratechton_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'custom-logo', array( 'height' => 60, 'width' => 200, 'flex-height' => true, 'flex-width' => true ) );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );

    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'infratechton' ),
        'footer'  => __( 'Footer Navigation', 'infratechton' ),
    ) );

    add_image_size( 'it-hero',  1920, 1080, true );
    add_image_size( 'it-card',  600,  400,  true );
    add_image_size( 'it-thumb', 300,  300,  true );

    load_theme_textdomain( 'infratechton', INFRATECHTON_PATH . '/languages' );
}
add_action( 'after_setup_theme', 'infratechton_setup' );

// ============================================================
// ENQUEUE ASSETS
// ============================================================
function infratechton_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'it-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;600;700&display=swap',
        array(), null
    );

    // Main CSS
    wp_enqueue_style(
        'infratechton-style',
        get_stylesheet_uri(),
        array( 'it-fonts' ),
        INFRATECHTON_VERSION
    );

    // Main JS
    wp_enqueue_script(
        'infratechton-main',
        INFRATECHTON_URI . '/assets/js/main.js',
        array(),
        INFRATECHTON_VERSION,
        true
    );

    wp_localize_script( 'infratechton-main', 'infratechtonData', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'infratechton_ajax' ),
        'homeUrl' => home_url(),
    ) );

    // ROI Calculator — load on front page and any page with the shortcode
    if ( is_front_page() || is_page() ) {
        wp_enqueue_script(
            'infratechton-roi',
            INFRATECHTON_URI . '/assets/js/roi-calculator.js',
            array( 'infratechton-main' ),
            INFRATECHTON_VERSION,
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'infratechton_enqueue_assets' );

// ============================================================
// EXCERPT
// ============================================================
function infratechton_excerpt_length() { return 24; }
add_filter( 'excerpt_length', 'infratechton_excerpt_length' );
function infratechton_excerpt_more() { return '&hellip;'; }
add_filter( 'excerpt_more', 'infratechton_excerpt_more' );

// ============================================================
// SECURITY
// ============================================================
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

function infratechton_remove_ver( $src ) {
    return $src && strpos( $src, 'ver=' ) ? remove_query_arg( 'ver', $src ) : $src;
}
add_filter( 'style_loader_src',  'infratechton_remove_ver', 9999 );
add_filter( 'script_loader_src', 'infratechton_remove_ver', 9999 );

// ============================================================
// SCHEMA.ORG
// ============================================================
function infratechton_schema() {
    if ( ! is_front_page() ) return;
    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'ProfessionalService',
        'name'        => 'InfraTechton Solutions',
        'description' => 'GPU Infrastructure Consulting & Deployment for AI/ML workloads across Europe and MENA',
        'url'         => home_url(),
        'address'     => array( '@type' => 'PostalAddress', 'addressLocality' => 'Varna', 'addressCountry' => 'BG' ),
        'founder'     => array( '@type' => 'Person', 'name' => 'Abdullah', 'jobTitle' => 'CEO & Founder' ),
        'areaServed'  => array( 'Europe', 'MENA', 'Middle East' ),
        'serviceType' => array( 'GPU Infrastructure Consulting', 'GPU Rack Assembly', 'AI/ML Workload Strategy' ),
    );
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'infratechton_schema' );

// ============================================================
// INCLUDE FILES
// ============================================================
$it_includes = array(
    '/inc/custom-post-types.php',
    '/inc/template-functions.php',
    '/inc/ajax-handlers.php',
    '/inc/shortcodes.php',
);
foreach ( $it_includes as $file ) {
    $path = INFRATECHTON_PATH . $file;
    if ( file_exists( $path ) ) require_once $path;
}

// ============================================================
// AJAX HANDLERS (inline fallback in case inc/ file missing)
// ============================================================
if ( ! function_exists( 'infratechton_handle_contact' ) ) {
    function infratechton_handle_contact() {
        check_ajax_referer( 'infratechton_ajax', 'nonce' );
        $name    = sanitize_text_field( $_POST['name']    ?? '' );
        $email   = sanitize_email(      $_POST['email']   ?? '' );
        $company = sanitize_text_field( $_POST['company'] ?? '' );
        $service = sanitize_text_field( $_POST['service'] ?? '' );
        $message = sanitize_textarea_field( $_POST['message'] ?? '' );
        $budget  = sanitize_text_field( $_POST['budget']  ?? '' );

        if ( empty( $name ) || ! is_email( $email ) ) {
            wp_send_json_error( array( 'message' => 'Please provide a valid name and email.' ) );
        }
        if ( empty( $message ) ) {
            wp_send_json_error( array( 'message' => 'Please describe your project.' ) );
        }

        $id = wp_insert_post( array(
            'post_type'    => 'it_inquiry',
            'post_status'  => 'publish',
            'post_title'   => sanitize_text_field( $name . ' — ' . current_time( 'd M Y H:i' ) ),
            'post_content' => wp_kses_post( $message ),
        ) );
        if ( $id ) {
            update_post_meta( $id, '_inquiry_name',    $name );
            update_post_meta( $id, '_inquiry_email',   $email );
            update_post_meta( $id, '_inquiry_company', $company );
            update_post_meta( $id, '_inquiry_service', $service );
            update_post_meta( $id, '_inquiry_budget',  $budget );
        }

        $headers = array( 'Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $name . ' <' . $email . '>' );
        wp_mail(
            get_option( 'admin_email' ),
            '[InfraTechton] New Inquiry — ' . $name,
            "Name: $name\nEmail: $email\nCompany: $company\nService: $service\nBudget: $budget\n\n$message",
            $headers
        );
        wp_mail(
            $email,
            'Thank you for contacting InfraTechton Solutions',
            "Hi $name,\n\nThank you! We've received your inquiry and will respond within 24 hours.\n\nRef: #$id\n\n— Abdullah, InfraTechton Solutions",
            array( 'Content-Type: text/plain; charset=UTF-8', 'From: Abdullah at InfraTechton <info@infratechton.com>' )
        );

        wp_send_json_success( array( 'message' => "Thank you! We'll be in touch within 24 hours.", 'ref' => '#' . $id ) );
    }
    add_action( 'wp_ajax_infratechton_contact',        'infratechton_handle_contact' );
    add_action( 'wp_ajax_nopriv_infratechton_contact', 'infratechton_handle_contact' );
}

if ( ! function_exists( 'infratechton_roi_lead' ) ) {
    function infratechton_roi_lead() {
        check_ajax_referer( 'infratechton_ajax', 'nonce' );
        $email = sanitize_email( $_POST['email'] ?? '' );
        $gpus  = absint( $_POST['gpus'] ?? 0 );
        if ( ! is_email( $email ) || $gpus < 1 ) {
            wp_send_json_error( array( 'message' => 'Invalid data.' ) );
        }
        wp_insert_post( array(
            'post_type'    => 'it_inquiry',
            'post_status'  => 'publish',
            'post_title'   => 'ROI Lead — ' . $email . ' — ' . $gpus . ' GPUs',
            'post_content' => 'Email: ' . $email . ' | GPUs: ' . $gpus,
        ) );
        wp_send_json_success( array( 'message' => 'ROI report sent!' ) );
    }
    add_action( 'wp_ajax_infratechton_roi_lead',        'infratechton_roi_lead' );
    add_action( 'wp_ajax_nopriv_infratechton_roi_lead', 'infratechton_roi_lead' );
}

// ============================================================
// CRITICAL HEADER CSS — injected inline at priority 999
// Fixes header stacking caused by plugin/theme conflicts
// ============================================================
function infratechton_critical_header_css() {
    ?>
<style id="it-critical-header">
/* InfraTechton Critical Header CSS v1.2 */
.it-notice-bar{display:flex!important;align-items:center!important;justify-content:center!important;width:100%!important;padding:8px 48px 8px 16px!important;background:linear-gradient(90deg,rgba(0,212,255,.07),rgba(123,47,255,.07))!important;border-bottom:1px solid rgba(0,212,255,.12)!important;position:relative!important;box-sizing:border-box!important;z-index:1001!important;min-height:40px!important}
.it-notice-bar.hidden{display:none!important}
.it-notice-bar p{margin:0!important;font-size:.83rem!important;color:#6B85A8!important;text-align:center!important}
.it-notice-bar strong{color:#00D4FF!important}
.it-notice-bar a{color:#00D4FF!important}
.it-notice-bar__close{position:absolute!important;right:12px!important;top:50%!important;transform:translateY(-50%)!important;background:none!important;border:none!important;color:#6B85A8!important;font-size:1.2rem!important;cursor:pointer!important;line-height:1!important;padding:4px!important}
#site-header,.it-header{position:sticky!important;top:0!important;left:0!important;right:0!important;width:100%!important;z-index:1000!important;background:rgba(8,14,26,.95)!important;backdrop-filter:blur(16px)!important;-webkit-backdrop-filter:blur(16px)!important;border-bottom:1px solid rgba(0,212,255,.15)!important;height:68px!important;display:flex!important;align-items:center!important;padding:0!important;margin:0!important;box-sizing:border-box!important}
.admin-bar #site-header,.admin-bar .it-header{top:32px!important}
@media screen and (max-width:782px){.admin-bar #site-header,.admin-bar .it-header{top:46px!important}}
.it-header__inner{display:flex!important;flex-direction:row!important;align-items:center!important;justify-content:space-between!important;flex-wrap:nowrap!important;width:100%!important;height:100%!important;gap:0!important;padding:0 28px!important;max-width:1280px!important;margin:0 auto!important;box-sizing:border-box!important}
.it-logo{display:flex!important;flex-direction:row!important;align-items:center!important;gap:10px!important;text-decoration:none!important;flex-shrink:0!important;flex-grow:0!important}
.it-logo__mark{display:flex!important;align-items:center!important;justify-content:center!important;width:38px!important;height:38px!important;min-width:38px!important;border-radius:9px!important;background:linear-gradient(135deg,#00D4FF 0%,#7B2FFF 100%)!important;font-weight:800!important;font-size:.95rem!important;color:#080E1A!important;flex-shrink:0!important}
.it-logo__text{display:flex!important;flex-direction:column!important;line-height:1!important}
.it-logo__name{color:#fff!important;font-size:.95rem!important;font-weight:700!important;white-space:nowrap!important;display:block!important}
.it-logo__sub{color:#00D4FF!important;font-size:.62rem!important;font-weight:600!important;letter-spacing:.07em!important;text-transform:uppercase!important;white-space:nowrap!important;margin-top:2px!important;display:block!important}
.it-nav{display:flex!important;flex-direction:row!important;align-items:center!important;gap:2px!important;flex-shrink:1!important;flex-grow:1!important;justify-content:center!important;list-style:none!important;margin:0 12px!important;padding:0!important}
.it-nav a{display:inline-flex!important;align-items:center!important;color:#C8D8F0!important;font-size:.87rem!important;font-weight:500!important;padding:7px 12px!important;border-radius:8px!important;white-space:nowrap!important;text-decoration:none!important;line-height:1!important}
.it-nav a:hover{color:#fff!important;background:rgba(255,255,255,.07)!important}
.it-header__cta{display:flex!important;flex-direction:row!important;align-items:center!important;gap:8px!important;flex-shrink:0!important;flex-grow:0!important}
.it-header__cta .btn,.it-header__cta a{display:inline-flex!important;align-items:center!important;justify-content:center!important;white-space:nowrap!important;padding:9px 16px!important;font-size:.84rem!important;font-weight:600!important;border-radius:9px!important;cursor:pointer!important;text-decoration:none!important;line-height:1!important;flex-shrink:0!important}
.it-header__cta .btn-secondary{background:transparent!important;color:#00D4FF!important;border:1.5px solid #00D4FF!important}
.it-header__cta .btn-primary{background:linear-gradient(135deg,#00D4FF 0%,#7B2FFF 100%)!important;color:#fff!important;border:none!important}
.it-hamburger{display:none!important}
@media (max-width:1024px){.it-nav,.it-header__cta{display:none!important}.it-hamburger{display:flex!important;flex-direction:column!important;justify-content:center!important;gap:5px!important;width:38px!important;height:38px!important;min-width:38px!important;background:none!important;border:1px solid rgba(0,212,255,.2)!important;border-radius:8px!important;cursor:pointer!important;padding:8px!important;flex-shrink:0!important}.it-hamburger span{display:block!important;height:2px!important;background:#C8D8F0!important;border-radius:2px!important;width:100%!important}}
.it-mobile-nav{position:fixed!important;top:0!important;right:0!important;bottom:0!important;width:min(300px,85vw)!important;background:#0D1626!important;border-left:1px solid rgba(0,212,255,.15)!important;z-index:9999!important;padding:72px 28px 40px!important;transform:translateX(100%)!important;transition:transform .35s cubic-bezier(.4,0,.2,1)!important;display:flex!important;flex-direction:column!important;box-sizing:border-box!important}
.it-mobile-nav.open{transform:translateX(0)!important}
.it-mobile-nav nav{display:flex!important;flex-direction:column!important}
.it-mobile-nav nav a{display:block!important;color:#C8D8F0!important;font-size:1rem!important;font-weight:600!important;padding:14px 0!important;border-bottom:1px solid rgba(0,212,255,.1)!important;text-decoration:none!important}
.it-mobile-nav__close{position:absolute!important;top:18px!important;right:18px!important;background:none!important;border:1px solid rgba(0,212,255,.2)!important;border-radius:8px!important;color:#C8D8F0!important;font-size:1.3rem!important;width:36px!important;height:36px!important;display:flex!important;align-items:center!important;justify-content:center!important;cursor:pointer!important}
.it-mobile-nav__overlay{position:fixed!important;inset:0!important;background:rgba(0,0,0,.6)!important;z-index:9998!important;opacity:0!important;pointer-events:none!important;transition:opacity .35s!important}
.it-mobile-nav__overlay.visible{opacity:1!important;pointer-events:all!important}
@media (min-width:1025px){.it-mobile-nav,.it-mobile-nav__overlay{display:none!important}}
</style>
    <?php
}
add_action( 'wp_head', 'infratechton_critical_header_css', 999 );

// Also enqueue the header-fix CSS file as last stylesheet
function infratechton_enqueue_header_fix() {
    wp_enqueue_style(
        'it-header-fix',
        INFRATECHTON_URI . '/assets/css/header-fix.css',
        array( 'infratechton-style' ),
        INFRATECHTON_VERSION
    );
}
add_action( 'wp_enqueue_scripts', 'infratechton_enqueue_header_fix', 9999 );
