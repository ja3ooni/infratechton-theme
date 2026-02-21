<?php
/**
 * Main Front Page Template
 *
 * @package InfraTechton
 */

get_header();
?>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="hero" id="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>

    <div class="container">
        <div class="hero-content">
            <div class="hero-badge fade-in-up">
                <span class="dot"></span>
                <span class="mono">// GPU Infrastructure Consulting · Est. 2026</span>
            </div>

            <h1 class="fade-in-up delay-1">
                Build the Infrastructure<br>
                <span class="gradient-text">AI Runs On</span>
            </h1>

            <p class="hero-description fade-in-up delay-2">
                InfraTechton delivers expert GPU infrastructure consulting and deployment for AI companies, data centers, and digital hubs across Europe and MENA. Backed by 11+ years founding and operating hyperscale infrastructure at AWS.
            </p>

            <div class="hero-actions fade-in-up delay-3">
                <a href="#contact" class="btn btn-primary btn-lg">
                    <span>🚀</span> Book Discovery Call
                </a>
                <a href="#services" class="btn btn-secondary btn-lg">
                    View Services →
                </a>
            </div>

            <div class="hero-trust fade-in-up delay-4">
                <div class="hero-trust-item">
                    <span class="icon">✓</span>
                    <span>11+ Years AWS Infrastructure</span>
                </div>
                <div class="hero-trust-item">
                    <span class="icon">✓</span>
                    <span>$500M+ Portfolio Managed</span>
                </div>
                <div class="hero-trust-item">
                    <span class="icon">✓</span>
                    <span>40+ Datacenter Sites</span>
                </div>
            </div>
        </div>

        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">11+</span>
                <span class="stat-label">Years AWS Experience</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">$500M+</span>
                <span class="stat-label">Infrastructure Portfolio</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">40+</span>
                <span class="stat-label">Datacenter Sites</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">2</span>
                <span class="stat-label">Regions: EU & MENA</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     TECH STACK MARQUEE
     ============================================================ -->
<section class="section-sm" style="background:var(--dark-2);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
    <div class="container">
        <p class="text-center mono" style="font-size:0.8rem;color:var(--text-muted);letter-spacing:0.15em;text-transform:uppercase;margin-bottom:24px;">Technologies & Platforms We Work With</p>
        <div class="tech-row">
            <div class="tech-item">NVIDIA H100</div>
            <div class="tech-item">A100 / A10G</div>
            <div class="tech-item">AMD MI300X</div>
            <div class="tech-item">InfiniBand NDR</div>
            <div class="tech-item">RoCE v2</div>
            <div class="tech-item">CUDA</div>
            <div class="tech-item">PyTorch / JAX</div>
            <div class="tech-item">Kubernetes</div>
            <div class="tech-item">Slurm</div>
            <div class="tech-item">AWS</div>
            <div class="tech-item">OpenStack</div>
            <div class="tech-item">VMware vSAN</div>
        </div>
    </div>
</section>

<!-- ============================================================
     SERVICES SECTION
     ============================================================ -->
<section class="section services-section" id="services">
    <div class="container">
        <div class="section-header">
            <span class="overline">What We Do</span>
            <h2>GPU Infrastructure <span>Services</span></h2>
            <p>Three integrated service tiers designed to meet you wherever you are — from physical deployment to strategic roadmapping.</p>
        </div>

        <?php
        $services = infratechton_get_services();
        foreach ( $services as $service ) {
            infratechton_render_service_tier( $service );
        }
        ?>

        <div style="text-align:center;margin-top:48px;padding:32px;background:var(--dark-3);border-radius:var(--radius-lg);border:1px solid var(--border);">
            <p style="color:var(--text-muted);font-size:0.95rem;margin-bottom:16px;">
                🤝 Need a custom engagement? We work with you to design the right scope, timeline, and commercial model.
            </p>
            <a href="#contact" class="btn btn-accent">Discuss Custom Requirements →</a>
        </div>
    </div>
</section>

<!-- ============================================================
     EXPERTISE GRID
     ============================================================ -->
<section class="section expertise-section" id="expertise">
    <div class="container">
        <div class="section-header">
            <span class="overline">Deep Expertise</span>
            <h2>Built on Hyperscale <span>Experience</span></h2>
            <p>Our capabilities were forged building and operating some of the world's largest infrastructure at AWS. We bring that expertise to your GPU project.</p>
        </div>

        <div class="grid-4">
            <?php
            $expertise_items = infratechton_get_expertise();
            foreach ( $expertise_items as $item ) : ?>
                <div class="expertise-card">
                    <div class="expertise-icon"><?php echo esc_html( $item['icon'] ); ?></div>
                    <h4 class="expertise-title"><?php echo esc_html( $item['title'] ); ?></h4>
                    <p class="expertise-desc"><?php echo esc_html( $item['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     ROI CALCULATOR
     ============================================================ -->
<section class="section" style="background:var(--dark-2);" id="roi">
    <div class="container">
        <div class="grid-2" style="align-items:start;gap:64px;">
            <div>
                <span class="overline">Free Tool</span>
                <h2 style="margin:16px 0 20px;">Calculate Your <span class="text-gradient">GPU ROI</span></h2>
                <p style="color:var(--text-muted);font-size:1rem;line-height:1.8;margin-bottom:24px;">
                    Companies running AI workloads on cloud GPUs often spend 3–5× more than they would on owned or co-located infrastructure. Use our calculator to see your potential savings.
                </p>
                <div style="display:flex;flex-direction:column;gap:16px;">
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <span style="color:var(--primary);font-size:1.2rem;margin-top:2px;">💰</span>
                        <div>
                            <strong style="color:var(--white);">Typical savings: 40–70%</strong>
                            <p style="font-size:0.88rem;color:var(--text-muted);margin:0;">vs. equivalent cloud GPU spend over 3 years</p>
                        </div>
                    </div>
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <span style="color:var(--primary);font-size:1.2rem;margin-top:2px;">📈</span>
                        <div>
                            <strong style="color:var(--white);">Average payback: 12–18 months</strong>
                            <p style="font-size:0.88rem;color:var(--text-muted);margin:0;">for production-grade GPU deployments</p>
                        </div>
                    </div>
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <span style="color:var(--primary);font-size:1.2rem;margin-top:2px;">🔒</span>
                        <div>
                            <strong style="color:var(--white);">Data sovereignty & compliance</strong>
                            <p style="font-size:0.88rem;color:var(--text-muted);margin:0;">Keep sensitive AI workloads in your control</p>
                        </div>
                    </div>
                </div>
                <div style="margin-top:28px;padding:20px;border-radius:var(--radius);background:rgba(0,212,255,0.06);border:1px solid rgba(0,212,255,0.15);">
                    <p style="font-size:0.88rem;color:var(--text-muted);margin:0;">
                        📞 <strong style="color:var(--primary);">Not sure where to start?</strong> Book a free 30-min assessment call. We'll analyze your current infrastructure spend and identify the fastest path to savings.
                    </p>
                </div>
            </div>
            <div>
                <?php echo do_shortcode( '[it_roi_calculator]' ); ?>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     PROCESS / HOW WE WORK
     ============================================================ -->
<section class="section process-section" id="process">
    <div class="container">
        <div class="section-header">
            <span class="overline">How We Work</span>
            <h2>From First Call to <span>Running Infrastructure</span></h2>
            <p>A rigorous, AWS-grade delivery process designed to eliminate surprises and maximise time-to-value for your GPU infrastructure investment.</p>
        </div>

        <div class="process-timeline">
            <?php
            $steps = infratechton_get_process_steps();
            foreach ( $steps as $step ) : ?>
                <div class="process-step">
                    <div class="step-number mono"><?php echo esc_html( $step['number'] ); ?></div>
                    <div class="step-content">
                        <div class="step-tag mono"><?php echo esc_html( $step['tag'] ); ?></div>
                        <h3 class="step-title"><?php echo esc_html( $step['title'] ); ?></h3>
                        <p class="step-desc"><?php echo esc_html( $step['desc'] ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     ABOUT / FOUNDER
     ============================================================ -->
<section class="section about-section" id="about" style="background:var(--dark-2);">
    <div class="container">
        <div class="about-grid">
            <div class="about-content">
                <div class="about-badge">
                    <span>👤</span>
                    <span class="mono">// Founder & CEO</span>
                </div>
                <h2>11+ Years Building the <span class="text-gradient">World's Infrastructure</span></h2>
                <p>InfraTechton was founded by a senior infrastructure leader who spent over a decade at Amazon Web Services — starting by co-founding the Frankfurt (eu-central-1) AWS region, and progressing to lead the Global Infrastructure PMO, managing a portfolio of $500M+ across 40+ datacenter sites.</p>
                <p>Now launching in Varna, Bulgaria, InfraTechton brings hyperscale-grade thinking to GPU infrastructure projects of all sizes — from AI startups deploying their first cluster to digital hubs building GPUaaS offerings for entire regions.</p>

                <div class="credentials-list">
                    <div class="credential-item">
                        <div class="credential-icon">🏗️</div>
                        <div class="credential-text">
                            <h4>AWS Frankfurt Region Co-Founder</h4>
                            <p>Part of the founding team for eu-central-1, one of AWS's most strategic European regions</p>
                        </div>
                    </div>
                    <div class="credential-item">
                        <div class="credential-icon">📊</div>
                        <div class="credential-text">
                            <h4>Global Infrastructure PMO Lead</h4>
                            <p>$500M+ portfolio, 40+ datacenter sites, automation saving thousands of operational hours</p>
                        </div>
                    </div>
                    <div class="credential-item">
                        <div class="credential-icon">🤝</div>
                        <div class="credential-text">
                            <h4>AI Startups Germany & EU Community Leader</h4>
                            <p>Founder of the AI Startups Germany & EU Community — connecting builders across the European ecosystem</p>
                        </div>
                    </div>
                    <div class="credential-item">
                        <div class="credential-icon">🌍</div>
                        <div class="credential-text">
                            <h4>Strategic Consulting Across Europe & MENA</h4>
                            <p>Active consulting engagements including digital hub strategy for the Aqaba region, Jordan</p>
                        </div>
                    </div>
                </div>

                <a href="#contact" class="btn btn-primary">Work With Us →</a>
            </div>

            <div class="about-visual">
                <div class="about-visual-card">
                    <h4 style="margin-bottom:24px;color:var(--primary);">Our Reach</h4>
                    <div class="regions-row" style="justify-content:flex-start;margin-bottom:32px;">
                        <div class="region-badge">🇩🇪 Germany</div>
                        <div class="region-badge">🇧🇬 Bulgaria</div>
                        <div class="region-badge">🇯🇴 Jordan</div>
                        <div class="region-badge">🇦🇪 UAE</div>
                        <div class="region-badge">🇸🇦 KSA</div>
                        <div class="region-badge">🇪🇺 EU-Wide</div>
                    </div>

                    <div class="divider" style="margin:24px 0;"></div>

                    <h4 style="margin-bottom:16px;">Quick Stats</h4>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                        <div style="text-align:center;padding:20px;background:rgba(0,212,255,0.05);border-radius:var(--radius);border:1px solid var(--border);">
                            <div style="font-size:2rem;font-weight:800;color:var(--primary);font-family:var(--font-mono);">11+</div>
                            <div style="font-size:0.8rem;color:var(--text-muted);margin-top:4px;">Yrs AWS</div>
                        </div>
                        <div style="text-align:center;padding:20px;background:rgba(123,47,255,0.05);border-radius:var(--radius);border:1px solid var(--border);">
                            <div style="font-size:2rem;font-weight:800;color:#A570FF;font-family:var(--font-mono);">40+</div>
                            <div style="font-size:0.8rem;color:var(--text-muted);margin-top:4px;">DC Sites</div>
                        </div>
                        <div style="text-align:center;padding:20px;background:rgba(255,107,53,0.05);border-radius:var(--radius);border:1px solid var(--border);">
                            <div style="font-size:2rem;font-weight:800;color:#FF8B6A;font-family:var(--font-mono);">$500M</div>
                            <div style="font-size:0.8rem;color:var(--text-muted);margin-top:4px;">Portfolio</div>
                        </div>
                        <div style="text-align:center;padding:20px;background:rgba(0,230,118,0.05);border-radius:var(--radius);border:1px solid var(--border);">
                            <div style="font-size:2rem;font-weight:800;color:var(--success);font-family:var(--font-mono);">2</div>
                            <div style="font-size:0.8rem;color:var(--text-muted);margin-top:4px;">Regions</div>
                        </div>
                    </div>

                    <div class="divider" style="margin:24px 0;"></div>

                    <div style="padding:16px;background:rgba(0,212,255,0.04);border-radius:var(--radius);border:1px solid rgba(0,212,255,0.1);">
                        <p style="font-size:0.85rem;color:var(--text-muted);margin:0;font-style:italic;">
                            "We don't just consult — we build alongside you, with the discipline and accountability of hyperscale infrastructure leadership."
                        </p>
                        <p style="font-size:0.82rem;color:var(--primary);margin:8px 0 0;font-weight:600;">— Abdullah, CEO & Founder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     CONTACT / CTA SECTION
     ============================================================ -->
<section class="section cta-section" id="contact">
    <div class="cta-bg"></div>
    <div class="container" style="position:relative;">

        <div class="cta-card">
            <span class="tag tag-primary" style="margin-bottom:20px;">📅 Q2 2026 Launch — Early Access Available</span>
            <h2>Ready to Build Your <span class="text-gradient">GPU Infrastructure?</span></h2>
            <p>Whether you're deploying your first GPU cluster or building a regional GPU-as-a-Service platform, let's talk. The discovery call is free and obligation-free.</p>

            <div class="cta-actions">
                <a href="mailto:info@infratechton.com" class="btn btn-primary btn-lg">✉️ info@infratechton.com</a>
                <a href="https://calendly.com/infratechton" target="_blank" rel="noopener" class="btn btn-secondary btn-lg">📅 Book a Call</a>
            </div>

            <div class="cta-contact-info">
                <div class="contact-item">
                    <span>📍</span>
                    <span>Varna, Bulgaria</span>
                </div>
                <div class="contact-item">
                    <span>🕐</span>
                    <span>Response within 24 hours</span>
                </div>
                <div class="contact-item">
                    <span>🌍</span>
                    <span>Serving Europe & MENA</span>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div style="margin-top:64px;">
            <div class="section-header">
                <span class="overline">Get in Touch</span>
                <h2>Send Us a <span>Project Brief</span></h2>
                <p>Tell us about your GPU infrastructure needs and we'll respond with a tailored approach within 24 hours.</p>
            </div>

            <div class="contact-form" id="contact-form-wrapper">
                <form id="infratechton-contact-form" novalidate>
                    <?php wp_nonce_field( 'infratechton_ajax', 'nonce' ); ?>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="contact-name">Full Name *</label>
                            <input type="text" id="contact-name" name="name" placeholder="Your name" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-email">Email Address *</label>
                            <input type="email" id="contact-email" name="email" placeholder="you@company.com" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-company">Company / Organization</label>
                            <input type="text" id="contact-company" name="company" placeholder="Company name">
                        </div>
                        <div class="form-group">
                            <label for="contact-service">Service Interest</label>
                            <select id="contact-service" name="service">
                                <option value="">— Select a service —</option>
                                <option value="tier-1">Tier 1 — GPU Rack Assembly & Deployment</option>
                                <option value="tier-2">Tier 2 — Managed GPU Operations</option>
                                <option value="tier-3">Tier 3 — Strategic Advisory / GPUaaS</option>
                                <option value="multiple">Multiple / Not Sure Yet</option>
                            </select>
                        </div>
                        <div class="form-group full">
                            <label for="contact-budget">Budget Range</label>
                            <select id="contact-budget" name="budget">
                                <option value="">— Select budget range —</option>
                                <option value="under-10k">Under €10,000</option>
                                <option value="10k-50k">€10,000 – €50,000</option>
                                <option value="50k-150k">€50,000 – €150,000</option>
                                <option value="150k-500k">€150,000 – €500,000</option>
                                <option value="500k-plus">€500,000+</option>
                                <option value="tbd">TBD / Needs Discussion</option>
                            </select>
                        </div>
                        <div class="form-group full">
                            <label for="contact-message">Project Description *</label>
                            <textarea id="contact-message" name="message" placeholder="Describe your GPU infrastructure project, current challenges, timeline, and any specific requirements..." required></textarea>
                        </div>
                    </div>
                    <div id="form-messages" style="display:none;padding:16px;border-radius:var(--radius);margin-bottom:16px;"></div>
                    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;">
                        <p style="font-size:0.82rem;color:var(--text-muted);margin:0;">
                            🔒 Your information is confidential and never shared.
                        </p>
                        <button type="submit" class="btn btn-primary btn-lg" id="form-submit">
                            Send Project Brief →
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
