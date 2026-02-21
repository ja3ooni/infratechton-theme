<?php
/**
 * 404 Not Found Template
 *
 * @package InfraTechton
 */

get_header();
?>

<main style="padding-top:100px;min-height:80vh;display:flex;align-items:center;">
    <div class="container" style="text-align:center;padding:80px 0;">
        <div style="font-size:6rem;font-weight:900;background:var(--gradient-primary);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1;font-family:var(--font-mono);">
            404
        </div>
        <h2 style="margin:24px 0 16px;">Page Not Found</h2>
        <p style="color:var(--text-muted);font-size:1.1rem;max-width:440px;margin:0 auto 32px;">
            Looks like this rack is empty. The page you're looking for may have moved or doesn't exist.
        </p>
        <div style="display:flex;justify-content:center;gap:16px;flex-wrap:wrap;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">← Back to Home</a>
            <a href="<?php echo esc_url( home_url( '#contact' ) ); ?>" class="btn btn-secondary">Contact Us</a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
