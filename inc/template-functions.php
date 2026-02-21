<?php
/**
 * Template Functions
 *
 * @package InfraTechton
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Return formatted price range string for a service.
 */
function infratechton_get_price_range( $post_id ) {
    $min      = get_post_meta( $post_id, '_service_price_min', true );
    $max      = get_post_meta( $post_id, '_service_price_max', true );
    $currency = get_post_meta( $post_id, '_service_currency', true ) ?: '€';

    if ( $min && $max ) {
        return esc_html( $currency . number_format( $min ) . ' – ' . $currency . number_format( $max ) );
    } elseif ( $min ) {
        return esc_html( 'From ' . $currency . number_format( $min ) );
    }
    return __( 'Custom quote', 'infratechton' );
}

/**
 * Render the site logo or fallback text mark.
 */
function infratechton_logo() {
    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        the_custom_logo();
        return;
    }
    ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
        <div class="logo-mark">IT</div>
        <div class="logo-text">
            <span class="logo-name">InfraTechton</span>
            <span class="logo-tagline">GPU Infrastructure</span>
        </div>
    </a>
    <?php
}

/**
 * Return a tag/badge HTML element.
 */
function infratechton_tag( $text, $type = 'primary', $icon = '' ) {
    $icon_html = $icon ? '<span class="tag-icon">' . esc_html( $icon ) . '</span>' : '';
    return '<span class="tag tag-' . esc_attr( $type ) . '">' . $icon_html . esc_html( $text ) . '</span>';
}

/**
 * Render services from a static definition array.
 * Falls back to static data when no CPT entries exist.
 */
function infratechton_get_services() {
    return array(
        array(
            'tier'        => 'tier-1',
            'tier_num'    => '01',
            'tier_label'  => 'Tier 1 — Technical Delivery',
            'title'       => 'GPU Rack Assembly & Deployment',
            'description' => 'End-to-end physical GPU infrastructure delivery. From structured cabling and rack integration to network commissioning and burn-in testing. Ideal for data centers, co-location providers, and enterprise AI labs across Europe and MENA.',
            'features'    => array(
                'GPU rack design, configuration & assembly',
                'Structured cabling (copper & fiber optic)',
                'Network commissioning & validation',
                'Power & cooling coordination',
                'Burn-in testing & acceptance sign-off',
                'Cross-border logistics & customs coordination',
            ),
            'price_from'  => '€2,500',
            'price_to'    => '€15,000+',
            'price_note'  => 'Per rack / per project',
            'cta_label'   => 'Get Deployment Quote',
            'cta_url'     => '#contact',
        ),
        array(
            'tier'        => 'tier-2',
            'tier_num'    => '02',
            'tier_label'  => 'Tier 2 — Operations & Managed Services',
            'title'       => 'GPU Operations & Managed Infrastructure',
            'description' => 'Ongoing operational excellence for your GPU fleet. Remote monitoring, incident response, SLA-backed uptime, and lifecycle management. Let us operate your infrastructure so your team focuses on AI workloads.',
            'features'    => array(
                'Remote GPU fleet monitoring & alerting',
                'SLA-backed incident response (4h–24h)',
                'Driver, firmware & OS update management',
                'Capacity planning & utilization reporting',
                'Vendor liaison & warranty management',
                'Monthly operational reporting',
            ),
            'price_from'  => '€500',
            'price_to'    => '€5,000',
            'price_note'  => 'Per month retainer',
            'cta_label'   => 'Discuss Managed Services',
            'cta_url'     => '#contact',
        ),
        array(
            'tier'        => 'tier-3',
            'tier_num'    => '03',
            'tier_label'  => 'Tier 3 — Strategic Advisory',
            'title'       => 'GPU-as-a-Service Strategy & Infrastructure Consulting',
            'description' => 'High-level strategic consulting for organizations building or scaling GPU infrastructure. Market entry, GPUaaS business models, procurement strategy, and digital hub planning. Backed by 11+ years of hyperscale infrastructure leadership at AWS.',
            'features'    => array(
                'GPU-as-a-Service (GPUaaS) business model design',
                'Infrastructure roadmap & architecture review',
                'Market entry strategy (Europe, MENA, Jordan)',
                'Vendor selection & procurement advisory',
                'ROI analysis & business case development',
                'Board-level presentation & stakeholder engagement',
            ),
            'price_from'  => '€5,000',
            'price_to'    => '€50,000+',
            'price_note'  => 'Per engagement',
            'cta_label'   => 'Schedule Strategy Session',
            'cta_url'     => '#contact',
        ),
    );
}

/**
 * Get process steps.
 */
function infratechton_get_process_steps() {
    return array(
        array(
            'number' => '01',
            'tag'    => 'Discovery',
            'title'  => 'Initial Consultation & Needs Assessment',
            'desc'   => 'We start with a structured 60-minute call to understand your GPU infrastructure goals, current state, budget constraints, and timeline. No generic pitches — just honest technical dialogue.',
        ),
        array(
            'number' => '02',
            'tag'    => 'Architecture',
            'title'  => 'Solution Design & Proposal',
            'desc'   => 'Our team produces a tailored technical proposal within 5 business days, including architecture diagrams, BOM (bill of materials), implementation timeline, and a detailed ROI model.',
        ),
        array(
            'number' => '03',
            'tag'    => 'Execution',
            'title'  => 'Deployment & Implementation',
            'desc'   => 'Hands-on delivery of your GPU infrastructure — physical or strategic. We coordinate logistics, on-site assembly teams, vendor relationships, and quality assurance every step of the way.',
        ),
        array(
            'number' => '04',
            'tag'    => 'Handover',
            'title'  => 'Validation, Documentation & Transition',
            'desc'   => 'Rigorous acceptance testing, full as-built documentation, and knowledge transfer to your operations team. Your infrastructure is ready to run on day one.',
        ),
        array(
            'number' => '05',
            'tag'    => 'Ongoing',
            'title'  => 'Post-Delivery Support & Managed Services',
            'desc'   => 'Optional ongoing engagement via retainer — remote monitoring, incident response, capacity planning, and lifecycle management. We stay involved as your infrastructure evolves.',
        ),
    );
}

/**
 * Get expertise areas.
 */
function infratechton_get_expertise() {
    return array(
        array( 'icon' => '🖥️', 'title' => 'GPU Server Architecture',       'desc' => 'NVIDIA H100, A100, L40S and AMD MI300X cluster design for training and inference workloads.' ),
        array( 'icon' => '🔌', 'title' => 'Data Center Infrastructure',    'desc' => '11+ years founding and scaling AWS data centers across Europe, managing 40+ sites globally.' ),
        array( 'icon' => '🌐', 'title' => 'Network Engineering',            'desc' => 'InfiniBand, RoCE, high-speed Ethernet fabrics for GPU-to-GPU interconnects and storage networks.' ),
        array( 'icon' => '⚡', 'title' => 'Power & Cooling Systems',       'desc' => 'Dense GPU compute power planning, redundancy design, and next-gen cooling (air & liquid).' ),
        array( 'icon' => '🤖', 'title' => 'AI/ML Workload Optimization',   'desc' => 'Infrastructure tuning for LLM training, fine-tuning, RAG pipelines, and high-throughput inference.' ),
        array( 'icon' => '🌍', 'title' => 'Europe & MENA Market Entry',    'desc' => 'Deep regional expertise for GPU infrastructure projects in EU, Jordan, UAE, Saudi Arabia, and Egypt.' ),
        array( 'icon' => '📋', 'title' => 'Technical Program Management',  'desc' => 'AWS-grade PMO rigor: $500M+ portfolio managed, 40+ datacenter sites, automation that saved 1000s of hours.' ),
        array( 'icon' => '🔒', 'title' => 'Compliance & Security',         'desc' => 'GDPR-compliant infrastructure planning, security hardening, and regulatory advisory for EU/MENA.' ),
    );
}

/**
 * Render a service tier section.
 */
function infratechton_render_service_tier( $service ) {
    $tier_colors = array(
        'tier-1' => 'primary',
        'tier-2' => 'secondary',
        'tier-3' => 'accent',
    );
    $tag_type = $tier_colors[ $service['tier'] ] ?? 'primary';
    ?>
    <div class="service-tier <?php echo esc_attr( $service['tier'] ); ?>">
        <div class="tier-glow"></div>
        <div class="service-tier-info">
            <div class="tier-number mono"><?php echo esc_html( $service['tier_num'] ); ?> / TIER</div>
            <div class="tag-wrapper" style="margin-bottom:16px;"><?php echo infratechton_tag( $service['tier_label'], $tag_type ); ?></div>
            <h3 class="service-tier-title"><?php echo esc_html( $service['title'] ); ?></h3>
            <p class="service-tier-desc"><?php echo esc_html( $service['description'] ); ?></p>
            <ul class="service-tier-list">
                <?php foreach ( $service['features'] as $feature ) : ?>
                    <li><?php echo esc_html( $feature ); ?></li>
                <?php endforeach; ?>
            </ul>
            <a href="<?php echo esc_url( $service['cta_url'] ); ?>" class="btn btn-secondary btn-sm">
                <?php echo esc_html( $service['cta_label'] ); ?> →
            </a>
        </div>
        <div class="service-tier-pricing">
            <div class="tier-price-label mono">Investment Range</div>
            <div class="tier-price-range">
                <span><?php echo esc_html( $service['price_from'] ); ?></span>
                <?php if ( $service['price_to'] ) : ?>
                    – <?php echo esc_html( $service['price_to'] ); ?>
                <?php endif; ?>
            </div>
            <div class="tier-price-note"><?php echo esc_html( $service['price_note'] ); ?></div>
            <a href="<?php echo esc_url( $service['cta_url'] ); ?>" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:20px;">
                <?php echo esc_html( $service['cta_label'] ); ?>
            </a>
            <div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--border);">
                <p style="font-size:0.8rem;color:var(--text-muted);margin:0;">
                    💬 Free 30-min discovery call included with any enquiry
                </p>
            </div>
        </div>
    </div>
    <?php
}
