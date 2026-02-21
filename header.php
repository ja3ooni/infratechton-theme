<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GPU Infrastructure Consulting &amp; Deployment for AI/ML workloads. 11+ years AWS hyperscale experience. Serving Europe &amp; MENA.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- NOTICE BAR -->
<div class="it-notice-bar" id="it-notice-bar">
    <div class="it-notice-bar__inner">
        <p>🚀 <strong>InfraTechton is launching Q2 2026.</strong> Early-access consulting engagements available — <a href="#contact">secure your slot →</a></p>
    </div>
    <button class="it-notice-bar__close" id="it-notice-close" aria-label="Dismiss notice">×</button>
</div>

<!-- SITE HEADER -->
<header id="site-header" class="it-header">
    <div class="container">
        <div class="it-header__inner">

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="it-logo" aria-label="InfraTechton Home">
                <div class="it-logo__mark">IT</div>
                <div class="it-logo__text">
                    <span class="it-logo__name">InfraTechton</span>
                    <span class="it-logo__sub">GPU Infrastructure</span>
                </div>
            </a>

            <nav class="it-nav" aria-label="Primary Navigation">
                <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Services</a>
                <a href="<?php echo esc_url( home_url( '/#expertise' ) ); ?>">Expertise</a>
                <a href="<?php echo esc_url( home_url( '/#process' ) ); ?>">Process</a>
                <a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">About</a>
                <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Insights</a>
            </nav>

            <div class="it-header__cta">
                <a href="<?php echo esc_url( home_url( '/#roi' ) ); ?>" class="btn btn-secondary btn-sm">ROI Calculator</a>
                <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn btn-primary btn-sm">Book Discovery Call</a>
            </div>

            <button class="it-hamburger" id="it-hamburger" aria-label="Open menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>

        </div>
    </div>
</header>

<!-- MOBILE NAV DRAWER -->
<div class="it-mobile-nav" id="it-mobile-nav" aria-hidden="true">
    <button class="it-mobile-nav__close" id="it-mobile-nav-close" aria-label="Close menu">×</button>
    <nav>
        <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Services</a>
        <a href="<?php echo esc_url( home_url( '/#expertise' ) ); ?>">Expertise</a>
        <a href="<?php echo esc_url( home_url( '/#process' ) ); ?>">Process</a>
        <a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">About</a>
        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Insights</a>
    </nav>
    <div style="margin-top:32px;display:flex;flex-direction:column;gap:12px;padding:0 32px;">
        <a href="<?php echo esc_url( home_url( '/#roi' ) ); ?>" class="btn btn-secondary btn-lg" style="justify-content:center;">ROI Calculator</a>
        <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn btn-primary btn-lg" style="justify-content:center;">Book Discovery Call</a>
    </div>
</div>
<div class="it-mobile-nav__overlay" id="it-mobile-overlay"></div>

<div id="page-wrapper">
