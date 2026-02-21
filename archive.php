<?php
/**
 * Archive / Blog Template
 *
 * @package InfraTechton
 */

get_header();
?>

<main style="padding-top:100px;">
    <!-- Archive Header -->
    <div style="background:var(--dark-2);border-bottom:1px solid var(--border);padding:80px 0;">
        <div class="container">
            <span class="overline">Insights & Resources</span>
            <h1 style="margin-top:16px;">GPU Infrastructure <span class="text-gradient">Insights</span></h1>
            <p style="color:var(--text-muted);font-size:1.1rem;max-width:580px;margin-top:16px;">
                Practical guides, strategic frameworks, and industry perspectives on AI/ML infrastructure — written by practitioners who've done it at hyperscale.
            </p>
        </div>
    </div>

    <div class="container section">
        <?php if ( have_posts() ) : ?>
            <div class="grid-3">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="card" id="post-<?php the_ID(); ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" style="display:block;margin:-36px -36px 24px;border-radius:var(--radius-lg) var(--radius-lg) 0 0;overflow:hidden;">
                                <?php the_post_thumbnail( 'card-thumb', array( 'style' => 'width:100%;height:200px;object-fit:cover;' ) ); ?>
                            </a>
                        <?php endif; ?>

                        <!-- Category -->
                        <?php
                        $cats = get_the_category();
                        if ( $cats ) : ?>
                            <span class="tag tag-primary" style="margin-bottom:16px;"><?php echo esc_html( $cats[0]->name ); ?></span>
                        <?php endif; ?>

                        <h3 class="card-title" style="font-size:1.15rem;margin-bottom:12px;">
                            <a href="<?php the_permalink(); ?>" style="color:var(--white);text-decoration:none;"><?php the_title(); ?></a>
                        </h3>
                        <p class="card-text" style="margin-bottom:20px;"><?php the_excerpt(); ?></p>

                        <div style="display:flex;justify-content:space-between;align-items:center;">
                            <span style="color:var(--text-muted);font-size:0.82rem;"><?php echo get_the_date(); ?></span>
                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary btn-sm">Read →</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div style="margin-top:48px;text-align:center;">
                <?php
                the_posts_pagination( array(
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                ) );
                ?>
            </div>

        <?php else : ?>
            <div style="text-align:center;padding:80px 0;">
                <p style="font-size:1.2rem;color:var(--text-muted);">No posts yet — check back soon for GPU infrastructure insights.</p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary" style="margin-top:24px;">← Back to Home</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
