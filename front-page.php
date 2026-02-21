<?php
/**
 * Front Page Template
 * WordPress loads this for the homepage (static front page).
 * This bypasses page.php and the_title() calls that were printing "Home".
 *
 * @package InfraTechton
 */

get_header();
?>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="it-hero" id="hero">
    <div class="it-hero__bg">
        <div class="it-hero__radial it-hero__radial--1"></div>
        <div class="it-hero__radial it-hero__radial--2"></div>
        <div class="it-hero__grid"></div>
    </div>
    <div class="container">
        <div class="it-hero__content">

            <div class="it-hero__badge">
                <span class="it-hero__badge-dot"></span>
                <span>// GPU Infrastructure Consulting · Est. 2026</span>
            </div>

            <h1 class="it-hero__headline">
                Build the Infrastructure<br>
                <span class="it-gradient-text">AI Runs On</span>
            </h1>

            <p class="it-hero__desc">
                InfraTechton delivers expert GPU infrastructure consulting and deployment for AI companies, data centers, and digital hubs across Europe and MENA. Backed by 11+ years founding and operating hyperscale infrastructure at AWS.
            </p>

            <div class="it-hero__actions">
                <a href="#contact" class="btn btn-primary btn-lg">🚀 Book Discovery Call</a>
                <a href="#services" class="btn btn-secondary btn-lg">View Services →</a>
            </div>

            <div class="it-hero__trust">
                <span><span class="it-trust-check">✓</span> 11+ Years AWS Infrastructure</span>
                <span><span class="it-trust-check">✓</span> $500M+ Portfolio Managed</span>
                <span><span class="it-trust-check">✓</span> 40+ Datacenter Sites</span>
            </div>
        </div>

        <div class="it-hero__stats">
            <div class="it-stat">
                <span class="it-stat__num" data-count="11">11+</span>
                <span class="it-stat__label">Years AWS Experience</span>
            </div>
            <div class="it-stat">
                <span class="it-stat__num">$500M+</span>
                <span class="it-stat__label">Infrastructure Portfolio</span>
            </div>
            <div class="it-stat">
                <span class="it-stat__num" data-count="40">40+</span>
                <span class="it-stat__label">Datacenter Sites</span>
            </div>
            <div class="it-stat">
                <span class="it-stat__num">EU + MENA</span>
                <span class="it-stat__label">Regions Served</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     TECH STACK STRIP
     ============================================================ -->
<div class="it-tech-strip">
    <div class="container">
        <p class="it-tech-strip__label">Technologies &amp; Platforms We Work With</p>
        <div class="it-tech-strip__items">
            <span>NVIDIA H100</span><span>A100 / A10G</span><span>AMD MI300X</span>
            <span>InfiniBand NDR</span><span>RoCE v2</span><span>CUDA</span>
            <span>PyTorch / JAX</span><span>Kubernetes</span><span>Slurm</span>
            <span>AWS</span><span>OpenStack</span><span>VMware vSAN</span>
        </div>
    </div>
</div>

<!-- ============================================================
     SERVICES
     ============================================================ -->
<section class="it-section it-section--alt" id="services">
    <div class="container">
        <div class="it-section-header">
            <span class="it-overline">What We Do</span>
            <h2>GPU Infrastructure <span class="it-gradient-text">Services</span></h2>
            <p>Three integrated service tiers designed to meet you wherever you are — from physical deployment to strategic roadmapping.</p>
        </div>

        <!-- Tier 1 -->
        <div class="it-service-tier it-service-tier--1">
            <div class="it-service-tier__glow"></div>
            <div class="it-service-tier__info">
                <div class="it-tier-num">01 / TIER</div>
                <span class="it-tag it-tag--primary">Tier 1 — Technical Delivery</span>
                <h3>GPU Rack Assembly &amp; Deployment</h3>
                <p>End-to-end physical GPU infrastructure delivery. From structured cabling and rack integration to network commissioning and burn-in testing. Ideal for data centers, co-location providers, and enterprise AI labs across Europe and MENA.</p>
                <ul class="it-feature-list">
                    <li>GPU rack design, configuration &amp; assembly</li>
                    <li>Structured cabling (copper &amp; fiber optic)</li>
                    <li>Network commissioning &amp; validation</li>
                    <li>Power &amp; cooling coordination</li>
                    <li>Burn-in testing &amp; acceptance sign-off</li>
                    <li>Cross-border logistics &amp; customs coordination</li>
                </ul>
                <a href="#contact" class="btn btn-secondary btn-sm">Get Deployment Quote →</a>
            </div>
            <div class="it-service-tier__pricing">
                <div class="it-pricing-label">Investment Range</div>
                <div class="it-pricing-range"><span>€2,500 – €15,000+</span></div>
                <div class="it-pricing-note">Per rack / per project</div>
                <a href="#contact" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:20px;">Get Deployment Quote</a>
                <p style="font-size:0.8rem;color:var(--it-text-muted);margin-top:12px;text-align:center;">💬 Free 30-min discovery call included</p>
            </div>
        </div>

        <!-- Tier 2 -->
        <div class="it-service-tier it-service-tier--2">
            <div class="it-service-tier__glow"></div>
            <div class="it-service-tier__info">
                <div class="it-tier-num">02 / TIER</div>
                <span class="it-tag it-tag--secondary">Tier 2 — Managed Services</span>
                <h3>GPU Operations &amp; Managed Infrastructure</h3>
                <p>Ongoing operational excellence for your GPU fleet. Remote monitoring, incident response, SLA-backed uptime, and lifecycle management. Let us operate your infrastructure so your team focuses on AI workloads.</p>
                <ul class="it-feature-list">
                    <li>Remote GPU fleet monitoring &amp; alerting</li>
                    <li>SLA-backed incident response (4h–24h)</li>
                    <li>Driver, firmware &amp; OS update management</li>
                    <li>Capacity planning &amp; utilization reporting</li>
                    <li>Vendor liaison &amp; warranty management</li>
                    <li>Monthly operational reporting</li>
                </ul>
                <a href="#contact" class="btn btn-secondary btn-sm">Discuss Managed Services →</a>
            </div>
            <div class="it-service-tier__pricing">
                <div class="it-pricing-label">Investment Range</div>
                <div class="it-pricing-range"><span>€500 – €5,000</span></div>
                <div class="it-pricing-note">Per month retainer</div>
                <a href="#contact" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:20px;">Discuss Managed Services</a>
                <p style="font-size:0.8rem;color:var(--it-text-muted);margin-top:12px;text-align:center;">💬 Free 30-min discovery call included</p>
            </div>
        </div>

        <!-- Tier 3 -->
        <div class="it-service-tier it-service-tier--3">
            <div class="it-service-tier__glow"></div>
            <div class="it-service-tier__info">
                <div class="it-tier-num">03 / TIER</div>
                <span class="it-tag it-tag--accent">Tier 3 — Strategic Advisory</span>
                <h3>GPU-as-a-Service Strategy &amp; Infrastructure Consulting</h3>
                <p>High-level strategic consulting for organizations building or scaling GPU infrastructure. Market entry, GPUaaS business models, procurement strategy, and digital hub planning. Backed by 11+ years of hyperscale infrastructure leadership at AWS.</p>
                <ul class="it-feature-list">
                    <li>GPU-as-a-Service (GPUaaS) business model design</li>
                    <li>Infrastructure roadmap &amp; architecture review</li>
                    <li>Market entry strategy (Europe, MENA, Jordan)</li>
                    <li>Vendor selection &amp; procurement advisory</li>
                    <li>ROI analysis &amp; business case development</li>
                    <li>Board-level presentation &amp; stakeholder engagement</li>
                </ul>
                <a href="#contact" class="btn btn-secondary btn-sm">Schedule Strategy Session →</a>
            </div>
            <div class="it-service-tier__pricing">
                <div class="it-pricing-label">Investment Range</div>
                <div class="it-pricing-range"><span>€5,000 – €50,000+</span></div>
                <div class="it-pricing-note">Per engagement</div>
                <a href="#contact" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:20px;">Schedule Strategy Session</a>
                <p style="font-size:0.8rem;color:var(--it-text-muted);margin-top:12px;text-align:center;">💬 Free 30-min discovery call included</p>
            </div>
        </div>

        <div class="it-services-note">
            <p>🤝 Need a custom engagement? We work with you to design the right scope, timeline, and commercial model.</p>
            <a href="#contact" class="btn btn-accent">Discuss Custom Requirements →</a>
        </div>
    </div>
</section>

<!-- ============================================================
     EXPERTISE
     ============================================================ -->
<section class="it-section" id="expertise">
    <div class="container">
        <div class="it-section-header">
            <span class="it-overline">Deep Expertise</span>
            <h2>Built on Hyperscale <span class="it-gradient-text">Experience</span></h2>
            <p>Our capabilities were forged building and operating some of the world's largest infrastructure at AWS. We bring that expertise to your GPU project.</p>
        </div>
        <div class="it-grid it-grid--4">
            <div class="it-card">
                <div class="it-card__icon">🖥️</div>
                <h4>GPU Server Architecture</h4>
                <p>NVIDIA H100, A100, L40S and AMD MI300X cluster design for training and inference workloads.</p>
            </div>
            <div class="it-card">
                <div class="it-card__icon">🔌</div>
                <h4>Data Center Infrastructure</h4>
                <p>11+ years founding and scaling AWS data centers across Europe, managing 40+ sites globally.</p>
            </div>
            <div class="it-card">
                <div class="it-card__icon">🌐</div>
                <h4>Network Engineering</h4>
                <p>InfiniBand, RoCE, high-speed Ethernet fabrics for GPU-to-GPU interconnects and storage networks.</p>
            </div>
            <div class="it-card">
                <div class="it-card__icon">⚡</div>
                <h4>Power &amp; Cooling Systems</h4>
                <p>Dense GPU compute power planning, redundancy design, and next-gen cooling (air &amp; liquid).</p>
            </div>
            <div class="it-card">
                <div class="it-card__icon">🤖</div>
                <h4>AI/ML Workload Optimization</h4>
                <p>Infrastructure tuning for LLM training, fine-tuning, RAG pipelines, and high-throughput inference.</p>
            </div>
            <div class="it-card">
                <div class="it-card__icon">🌍</div>
                <h4>Europe &amp; MENA Market Entry</h4>
                <p>Deep regional expertise for GPU infrastructure projects in EU, Jordan, UAE, Saudi Arabia, and Egypt.</p>
            </div>
            <div class="it-card">
                <div class="it-card__icon">📋</div>
                <h4>Technical Program Management</h4>
                <p>AWS-grade PMO rigor: $500M+ portfolio managed, 40+ datacenter sites, automation saving 1000s of hours.</p>
            </div>
            <div class="it-card">
                <div class="it-card__icon">🔒</div>
                <h4>Compliance &amp; Security</h4>
                <p>GDPR-compliant infrastructure planning, security hardening, and regulatory advisory for EU/MENA.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     ROI CALCULATOR
     ============================================================ -->
<section class="it-section it-section--alt" id="roi">
    <div class="container">
        <div class="it-roi-layout">
            <div class="it-roi-copy">
                <span class="it-overline">Free Tool</span>
                <h2>Calculate Your <span class="it-gradient-text">GPU ROI</span></h2>
                <p>Companies running AI workloads on cloud GPUs often spend 3–5× more than they would on owned or co-located infrastructure. Use our calculator to see your potential savings.</p>
                <div class="it-roi-bullets">
                    <div class="it-roi-bullet">
                        <span>💰</span>
                        <div>
                            <strong>Typical savings: 40–70%</strong>
                            <p>vs. equivalent cloud GPU spend over 3 years</p>
                        </div>
                    </div>
                    <div class="it-roi-bullet">
                        <span>📈</span>
                        <div>
                            <strong>Average payback: 12–18 months</strong>
                            <p>for production-grade GPU deployments</p>
                        </div>
                    </div>
                    <div class="it-roi-bullet">
                        <span>🔒</span>
                        <div>
                            <strong>Data sovereignty &amp; compliance</strong>
                            <p>Keep sensitive AI workloads in your control</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="it-roi-widget" id="roi-calculator">
                <h4 style="margin-bottom:28px;color:var(--it-primary);">GPU Infrastructure ROI Calculator</h4>

                <div class="it-slider-group">
                    <div class="it-slider-label">
                        <span>Number of GPUs</span>
                        <span id="roi-gpu-label" class="it-slider-value">8 GPUs</span>
                    </div>
                    <input type="range" id="roi-gpus" min="1" max="512" value="8" step="1">
                </div>

                <div class="it-slider-group">
                    <div class="it-slider-label">
                        <span>Current Monthly Cloud GPU Spend</span>
                        <span id="roi-spend-label" class="it-slider-value">€5,000/mo</span>
                    </div>
                    <input type="range" id="roi-cloud-spend" min="500" max="500000" value="5000" step="500">
                </div>

                <div class="it-slider-group">
                    <div class="it-slider-label">
                        <span>GPU Utilization Rate</span>
                        <span id="roi-util-label" class="it-slider-value">70%</span>
                    </div>
                    <input type="range" id="roi-utilization" min="20" max="100" value="70" step="5">
                </div>

                <div class="it-roi-results" id="roi-result">
                    <div class="it-roi-metric">
                        <div class="it-roi-metric__val" id="roi-annual-savings">€0</div>
                        <div class="it-roi-metric__lbl">Annual Savings</div>
                    </div>
                    <div class="it-roi-metric">
                        <div class="it-roi-metric__val" id="roi-payback">0 mo</div>
                        <div class="it-roi-metric__lbl">Payback Period</div>
                    </div>
                    <div class="it-roi-metric">
                        <div class="it-roi-metric__val" id="roi-3yr">€0</div>
                        <div class="it-roi-metric__lbl">3-Year TCO Savings</div>
                    </div>
                </div>

                <div class="it-roi-cta">
                    <input type="email" id="roi-email" placeholder="your@email.com" style="flex:1;min-width:0;">
                    <button class="btn btn-primary" id="roi-submit">Get Full Report</button>
                </div>
                <p style="font-size:0.75rem;color:var(--it-text-muted);margin-top:10px;">
                    * Estimates based on industry benchmarks. Book a call for a detailed analysis.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     PROCESS
     ============================================================ -->
<section class="it-section" id="process">
    <div class="container">
        <div class="it-section-header">
            <span class="it-overline">How We Work</span>
            <h2>From First Call to <span class="it-gradient-text">Running Infrastructure</span></h2>
            <p>A rigorous, AWS-grade delivery process designed to eliminate surprises and maximise time-to-value for your GPU investment.</p>
        </div>
        <div class="it-process">
            <div class="it-process__step">
                <div class="it-process__num">01</div>
                <div class="it-process__body">
                    <div class="it-process__tag">Discovery</div>
                    <h3>Initial Consultation &amp; Needs Assessment</h3>
                    <p>We start with a structured 60-minute call to understand your GPU infrastructure goals, current state, budget constraints, and timeline. No generic pitches — just honest technical dialogue.</p>
                </div>
            </div>
            <div class="it-process__step">
                <div class="it-process__num">02</div>
                <div class="it-process__body">
                    <div class="it-process__tag">Architecture</div>
                    <h3>Solution Design &amp; Proposal</h3>
                    <p>Our team produces a tailored technical proposal within 5 business days, including architecture diagrams, BOM, implementation timeline, and a detailed ROI model.</p>
                </div>
            </div>
            <div class="it-process__step">
                <div class="it-process__num">03</div>
                <div class="it-process__body">
                    <div class="it-process__tag">Execution</div>
                    <h3>Deployment &amp; Implementation</h3>
                    <p>Hands-on delivery of your GPU infrastructure — physical or strategic. We coordinate logistics, on-site assembly teams, vendor relationships, and quality assurance every step of the way.</p>
                </div>
            </div>
            <div class="it-process__step">
                <div class="it-process__num">04</div>
                <div class="it-process__body">
                    <div class="it-process__tag">Handover</div>
                    <h3>Validation, Documentation &amp; Transition</h3>
                    <p>Rigorous acceptance testing, full as-built documentation, and knowledge transfer to your operations team. Your infrastructure is ready to run on day one.</p>
                </div>
            </div>
            <div class="it-process__step">
                <div class="it-process__num">05</div>
                <div class="it-process__body">
                    <div class="it-process__tag">Ongoing</div>
                    <h3>Post-Delivery Support &amp; Managed Services</h3>
                    <p>Optional ongoing engagement via retainer — remote monitoring, incident response, capacity planning, and lifecycle management. We stay involved as your infrastructure evolves.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     ABOUT / FOUNDER
     ============================================================ -->
<section class="it-section it-section--alt" id="about">
    <div class="container">
        <div class="it-about">
            <div class="it-about__content">
                <span class="it-tag it-tag--primary" style="margin-bottom:20px;">👤 Founder &amp; CEO</span>
                <h2>11+ Years Building the <span class="it-gradient-text">World's Infrastructure</span></h2>
                <p>InfraTechton was founded by a senior infrastructure leader who spent over a decade at Amazon Web Services — starting by co-founding the Frankfurt (eu-central-1) AWS region, and progressing to lead the Global Infrastructure PMO, managing a portfolio of $500M+ across 40+ datacenter sites.</p>
                <p>Now launching in Varna, Bulgaria, InfraTechton brings hyperscale-grade thinking to GPU infrastructure projects of all sizes — from AI startups deploying their first cluster to digital hubs building GPUaaS offerings for entire regions.</p>

                <div class="it-credentials">
                    <div class="it-credential">
                        <div class="it-credential__icon">🏗️</div>
                        <div>
                            <h4>AWS Frankfurt Region Co-Founder</h4>
                            <p>Part of the founding team for eu-central-1, one of AWS's most strategic European regions</p>
                        </div>
                    </div>
                    <div class="it-credential">
                        <div class="it-credential__icon">📊</div>
                        <div>
                            <h4>Global Infrastructure PMO Lead</h4>
                            <p>$500M+ portfolio, 40+ datacenter sites, automation saving thousands of operational hours</p>
                        </div>
                    </div>
                    <div class="it-credential">
                        <div class="it-credential__icon">🤝</div>
                        <div>
                            <h4>AI Startups Germany &amp; EU Community Leader</h4>
                            <p>Founder of the AI Startups Germany &amp; EU Community — connecting builders across the European ecosystem</p>
                        </div>
                    </div>
                    <div class="it-credential">
                        <div class="it-credential__icon">🌍</div>
                        <div>
                            <h4>Strategic Consulting Across Europe &amp; MENA</h4>
                            <p>Active consulting engagements including digital hub strategy for the Aqaba region, Jordan</p>
                        </div>
                    </div>
                </div>
                <a href="#contact" class="btn btn-primary">Work With Us →</a>
            </div>

            <div class="it-about__visual">
                <div class="it-about__card">
                    <h5 style="color:var(--it-primary);margin-bottom:20px;">Our Reach</h5>
                    <div class="it-regions">
                        <span>🇩🇪 Germany</span>
                        <span>🇧🇬 Bulgaria</span>
                        <span>🇯🇴 Jordan</span>
                        <span>🇦🇪 UAE</span>
                        <span>🇸🇦 KSA</span>
                        <span>🇪🇺 EU-Wide</span>
                    </div>
                    <hr style="border-color:var(--it-border);margin:24px 0;">
                    <div class="it-mini-stats">
                        <div class="it-mini-stat">
                            <span class="it-mini-stat__val" style="color:var(--it-primary);">11+</span>
                            <span class="it-mini-stat__lbl">Yrs AWS</span>
                        </div>
                        <div class="it-mini-stat">
                            <span class="it-mini-stat__val" style="color:#A570FF;">40+</span>
                            <span class="it-mini-stat__lbl">DC Sites</span>
                        </div>
                        <div class="it-mini-stat">
                            <span class="it-mini-stat__val" style="color:#FF8B6A;">$500M</span>
                            <span class="it-mini-stat__lbl">Portfolio</span>
                        </div>
                        <div class="it-mini-stat">
                            <span class="it-mini-stat__val" style="color:#00E676;">2</span>
                            <span class="it-mini-stat__lbl">Regions</span>
                        </div>
                    </div>
                    <hr style="border-color:var(--it-border);margin:24px 0;">
                    <blockquote class="it-quote">
                        "We don't just consult — we build alongside you, with the discipline and accountability of hyperscale infrastructure leadership."
                        <cite>— Abdullah, CEO &amp; Founder</cite>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     CONTACT
     ============================================================ -->
<section class="it-section" id="contact">
    <div class="container">

        <div class="it-cta-card">
            <div class="it-cta-card__top-bar"></div>
            <span class="it-tag it-tag--primary" style="margin-bottom:20px;">📅 Q2 2026 Launch — Early Access Available</span>
            <h2>Ready to Build Your <span class="it-gradient-text">GPU Infrastructure?</span></h2>
            <p>Whether you're deploying your first GPU cluster or building a regional GPU-as-a-Service platform, let's talk. The discovery call is free and obligation-free.</p>
            <div class="it-cta-card__actions">
                <a href="mailto:info@infratechton.com" class="btn btn-primary btn-lg">✉️ info@infratechton.com</a>
                <a href="https://calendly.com/infratechton" target="_blank" rel="noopener" class="btn btn-secondary btn-lg">📅 Book a Call</a>
            </div>
            <div class="it-cta-card__meta">
                <span>📍 Varna, Bulgaria</span>
                <span>🕐 Response within 24 hours</span>
                <span>🌍 Serving Europe &amp; MENA</span>
            </div>
        </div>

        <!-- Contact Form -->
        <div style="margin-top:72px;">
            <div class="it-section-header">
                <span class="it-overline">Get in Touch</span>
                <h2>Send Us a <span class="it-gradient-text">Project Brief</span></h2>
                <p>Tell us about your GPU infrastructure needs and we'll respond within 24 hours.</p>
            </div>

            <div class="it-contact-form">
                <form id="infratechton-contact-form" novalidate>
                    <?php wp_nonce_field( 'infratechton_ajax', 'nonce' ); ?>
                    <div class="it-form-grid">
                        <div class="it-form-group">
                            <label for="c-name">Full Name *</label>
                            <input type="text" id="c-name" name="name" placeholder="Your name" required>
                        </div>
                        <div class="it-form-group">
                            <label for="c-email">Email Address *</label>
                            <input type="email" id="c-email" name="email" placeholder="you@company.com" required>
                        </div>
                        <div class="it-form-group">
                            <label for="c-company">Company / Organization</label>
                            <input type="text" id="c-company" name="company" placeholder="Company name">
                        </div>
                        <div class="it-form-group">
                            <label for="c-service">Service Interest</label>
                            <select id="c-service" name="service">
                                <option value="">— Select a service —</option>
                                <option value="tier-1">Tier 1 — GPU Rack Assembly &amp; Deployment</option>
                                <option value="tier-2">Tier 2 — Managed GPU Operations</option>
                                <option value="tier-3">Tier 3 — Strategic Advisory / GPUaaS</option>
                                <option value="multiple">Multiple / Not Sure Yet</option>
                            </select>
                        </div>
                        <div class="it-form-group it-form-group--full">
                            <label for="c-budget">Budget Range</label>
                            <select id="c-budget" name="budget">
                                <option value="">— Select budget range —</option>
                                <option value="under-10k">Under €10,000</option>
                                <option value="10k-50k">€10,000 – €50,000</option>
                                <option value="50k-150k">€50,000 – €150,000</option>
                                <option value="150k-500k">€150,000 – €500,000</option>
                                <option value="500k-plus">€500,000+</option>
                                <option value="tbd">TBD / Needs Discussion</option>
                            </select>
                        </div>
                        <div class="it-form-group it-form-group--full">
                            <label for="c-message">Project Description *</label>
                            <textarea id="c-message" name="message" placeholder="Describe your GPU infrastructure project, current challenges, timeline, and any specific requirements..." required></textarea>
                        </div>
                    </div>
                    <div id="it-form-msg" style="display:none;padding:14px 18px;border-radius:8px;margin-bottom:16px;"></div>
                    <div class="it-form-footer">
                        <p>🔒 Your information is confidential and never shared.</p>
                        <button type="submit" class="btn btn-primary btn-lg" id="form-submit">Send Project Brief →</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
