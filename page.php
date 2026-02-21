<?php
/**
 * Default Page Template
 *
 * @package InfraTechton
 */

get_header();
?>

<main style="padding-top:100px;">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <!-- Page Header -->
        <div style="background:var(--dark-2);border-bottom:1px solid var(--border);padding:80px 0;">
            <div class="container">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>

        <div class="container section" style="max-width:900px;">
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
