<?php
/**
 * Single Post Template
 *
 * @package InfraTechton
 */

get_header();
?>

<main style="padding-top:100px;">
    <div class="container" style="max-width:860px;">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="padding:80px 0;">

                <!-- Post Meta -->
                <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;margin-bottom:24px;">
                    <?php
                    $cats = get_the_category();
                    if ( $cats ) :
                        foreach ( $cats as $cat ) :
                    ?>
                        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="tag tag-primary">
                            <?php echo esc_html( $cat->name ); ?>
                        </a>
                    <?php endforeach; endif; ?>
                    <span style="color:var(--text-muted);font-size:0.88rem;"><?php echo get_the_date(); ?></span>
                    <span style="color:var(--text-muted);font-size:0.88rem;"><?php echo esc_html( get_the_author() ); ?></span>
                </div>

                <h1 style="margin-bottom:32px;"><?php the_title(); ?></h1>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div style="margin-bottom:40px;border-radius:var(--radius-lg);overflow:hidden;border:1px solid var(--border);">
                        <?php the_post_thumbnail( 'hero-large' ); ?>
                    </div>
                <?php endif; ?>

                <!-- Content -->
                <div class="post-content" style="
                    color: var(--text);
                    font-size: 1.05rem;
                    line-height: 1.9;
                ">
                    <?php the_content(); ?>
                </div>

                <!-- Tags -->
                <div style="margin-top:48px;padding-top:32px;border-top:1px solid var(--border);">
                    <?php the_tags( '<div style="display:flex;flex-wrap:wrap;gap:8px;">', '', '</div>' ); ?>
                </div>

                <!-- Author Bio -->
                <div style="margin-top:48px;background:var(--dark-2);border:1px solid var(--border);border-radius:var(--radius-lg);padding:32px;display:flex;gap:20px;align-items:flex-start;">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 64, '', '', array( 'style' => 'border-radius:50%;border:2px solid var(--border)' ) ); ?>
                    <div>
                        <strong style="color:var(--white);"><?php the_author(); ?></strong>
                        <p style="color:var(--text-muted);font-size:0.9rem;margin-top:6px;">CEO & Founder, InfraTechton Solutions. 11+ years building hyperscale GPU and cloud infrastructure at AWS.</p>
                    </div>
                </div>
            </article>

            <!-- Navigation -->
            <div style="display:flex;justify-content:space-between;padding:32px 0;border-top:1px solid var(--border);">
                <?php previous_post_link( '<div class="btn btn-secondary btn-sm">← %link</div>' ); ?>
                <?php next_post_link( '<div class="btn btn-secondary btn-sm">%link →</div>' ); ?>
            </div>

        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>
