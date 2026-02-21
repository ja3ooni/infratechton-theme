<?php
/**
 * Shortcodes
 *
 * @package InfraTechton
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * [it_roi_calculator] — Embeds the GPU ROI calculator widget.
 */
function infratechton_shortcode_roi( $atts ) {
    ob_start();
    ?>
    <div class="roi-calculator" id="roi-calculator">
        <div class="section-header text-center" style="margin-bottom:36px;">
            <span class="overline">Free Tool</span>
            <h3>GPU Infrastructure <span>ROI Calculator</span></h3>
            <p style="font-size:0.95rem;color:var(--text-muted);">Estimate your savings and payback period in under 60 seconds.</p>
        </div>

        <div class="roi-slider-group">
            <div class="roi-slider-label">
                <span>Number of GPUs</span>
                <span id="gpu-count-label">8 GPUs</span>
            </div>
            <input type="range" id="roi-gpus" min="1" max="512" value="8" step="1">
        </div>

        <div class="roi-slider-group">
            <div class="roi-slider-label">
                <span>Current Monthly Cloud GPU Spend</span>
                <span id="cloud-spend-label">€5,000/mo</span>
            </div>
            <input type="range" id="roi-cloud-spend" min="500" max="500000" value="5000" step="500">
        </div>

        <div class="roi-slider-group">
            <div class="roi-slider-label">
                <span>GPU Utilization Rate</span>
                <span id="utilization-label">70%</span>
            </div>
            <input type="range" id="roi-utilization" min="20" max="100" value="70" step="5">
        </div>

        <div class="roi-result" id="roi-result">
            <div class="roi-metric">
                <div class="roi-metric-value" id="roi-annual-savings">€0</div>
                <div class="roi-metric-label">Annual Savings vs. Cloud</div>
            </div>
            <div class="roi-metric">
                <div class="roi-metric-value" id="roi-payback">0 mo</div>
                <div class="roi-metric-label">Estimated Payback Period</div>
            </div>
            <div class="roi-metric">
                <div class="roi-metric-value" id="roi-3yr">€0</div>
                <div class="roi-metric-label">3-Year TCO Savings</div>
            </div>
        </div>

        <div style="margin-top:28px;display:flex;align-items:center;gap:16px;flex-wrap:wrap;">
            <input type="email" id="roi-email" placeholder="your@email.com" style="flex:1;min-width:200px;">
            <button class="btn btn-primary" id="roi-submit">Get Full ROI Report →</button>
        </div>
        <p style="font-size:0.78rem;color:var(--text-muted);margin-top:10px;">
            * Estimates based on industry benchmarks. Actual savings vary based on hardware, workloads, and location. Book a call for a detailed analysis.
        </p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'it_roi_calculator', 'infratechton_shortcode_roi' );

/**
 * [it_services_grid] — Renders all service tiers.
 */
function infratechton_shortcode_services_grid( $atts ) {
    $services = infratechton_get_services();
    ob_start();
    foreach ( $services as $service ) {
        infratechton_render_service_tier( $service );
    }
    return ob_get_clean();
}
add_shortcode( 'it_services_grid', 'infratechton_shortcode_services_grid' );

/**
 * [it_stat label="..." value="..."] — Renders a single stat.
 */
function infratechton_shortcode_stat( $atts ) {
    $a = shortcode_atts( array(
        'value' => '0',
        'label' => '',
    ), $atts );
    return '<div class="stat-item"><span class="stat-number">' . esc_html( $a['value'] ) . '</span><span class="stat-label">' . esc_html( $a['label'] ) . '</span></div>';
}
add_shortcode( 'it_stat', 'infratechton_shortcode_stat' );

/**
 * [it_cta_button label="..." url="..." style="primary|secondary|accent"]
 */
function infratechton_shortcode_cta_button( $atts ) {
    $a = shortcode_atts( array(
        'label' => 'Get Started',
        'url'   => '#contact',
        'style' => 'primary',
        'size'  => '',
    ), $atts );
    $size_class = $a['size'] ? ' btn-' . esc_attr( $a['size'] ) : '';
    return '<a href="' . esc_url( $a['url'] ) . '" class="btn btn-' . esc_attr( $a['style'] ) . $size_class . '">' . esc_html( $a['label'] ) . '</a>';
}
add_shortcode( 'it_cta_button', 'infratechton_shortcode_cta_button' );
