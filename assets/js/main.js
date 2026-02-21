/**
 * InfraTechton Solutions — Main JS
 * v1.1.0 — Fixed header scroll, mobile nav, notice bar, smooth scroll
 */
(function () {
  'use strict';

  // ============================================================
  // NOTICE BAR dismiss
  // ============================================================
  var noticeBar   = document.getElementById('it-notice-bar');
  var noticeClose = document.getElementById('it-notice-close');
  if (noticeClose && noticeBar) {
    noticeClose.addEventListener('click', function () {
      noticeBar.classList.add('hidden');
      try { sessionStorage.setItem('it-notice-dismissed', '1'); } catch(e){}
    });
    try {
      if (sessionStorage.getItem('it-notice-dismissed') === '1') {
        noticeBar.classList.add('hidden');
      }
    } catch(e){}
  }

  // ============================================================
  // STICKY HEADER — add .scrolled class on scroll
  // ============================================================
  var header = document.getElementById('site-header');
  if (header) {
    function onScroll() {
      if (window.scrollY > 60) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  // ============================================================
  // MOBILE NAV
  // ============================================================
  var hamburger = document.getElementById('it-hamburger');
  var mobileNav = document.getElementById('it-mobile-nav');
  var mobileOverlay = document.getElementById('it-mobile-overlay');
  var mobileClose   = document.getElementById('it-mobile-nav-close');

  function openNav() {
    if (!mobileNav) return;
    mobileNav.classList.add('open');
    mobileNav.setAttribute('aria-hidden', 'false');
    if (mobileOverlay) mobileOverlay.classList.add('visible');
    if (hamburger) hamburger.setAttribute('aria-expanded', 'true');
    hamburger && hamburger.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeNav() {
    if (!mobileNav) return;
    mobileNav.classList.remove('open');
    mobileNav.setAttribute('aria-hidden', 'true');
    if (mobileOverlay) mobileOverlay.classList.remove('visible');
    if (hamburger) hamburger.setAttribute('aria-expanded', 'false');
    hamburger && hamburger.classList.remove('open');
    document.body.style.overflow = '';
  }

  if (hamburger)      hamburger.addEventListener('click', openNav);
  if (mobileClose)    mobileClose.addEventListener('click', closeNav);
  if (mobileOverlay)  mobileOverlay.addEventListener('click', closeNav);

  // Close mobile nav on any internal link click
  if (mobileNav) {
    mobileNav.querySelectorAll('a').forEach(function(link) {
      link.addEventListener('click', closeNav);
    });
  }

  // Close on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeNav();
  });

  // ============================================================
  // SMOOTH SCROLL for anchor links
  // ============================================================
  document.querySelectorAll('a[href*="#"]').forEach(function(anchor) {
    anchor.addEventListener('click', function(e) {
      var href = this.getAttribute('href');
      // Only handle same-page anchors
      var hash = href.indexOf('#') !== -1 ? href.split('#')[1] : null;
      if (!hash) return;
      var target = document.getElementById(hash);
      if (!target) return;
      e.preventDefault();
      var headerH = header ? header.offsetHeight : 72;
      var top = target.getBoundingClientRect().top + window.pageYOffset - headerH - 20;
      window.scrollTo({ top: top, behavior: 'smooth' });
    });
  });

  // ============================================================
  // SCROLL REVEAL
  // ============================================================
  if ('IntersectionObserver' in window) {
    var revealEls = document.querySelectorAll(
      '.it-card, .it-service-tier, .it-process__step, .it-credential, .it-stat, .it-mini-stat'
    );
    var revealObs = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry, i) {
        if (entry.isIntersecting) {
          setTimeout(function() {
            entry.target.style.opacity  = '1';
            entry.target.style.transform = 'translateY(0)';
          }, i * 55);
          revealObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -50px 0px' });

    revealEls.forEach(function(el) {
      el.style.opacity   = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition= 'opacity 0.55s ease, transform 0.55s ease';
      revealObs.observe(el);
    });
  }

  // ============================================================
  // CONTACT FORM — AJAX
  // ============================================================
  var contactForm = document.getElementById('infratechton-contact-form');
  var formMsg     = document.getElementById('it-form-msg');
  var formSubmit  = document.getElementById('form-submit');

  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      e.preventDefault();
      if (formSubmit) { formSubmit.textContent = 'Sending…'; formSubmit.disabled = true; }

      var fd = new FormData(contactForm);
      fd.append('action', 'infratechton_contact');
      if (typeof infratechtonData !== 'undefined') fd.set('nonce', infratechtonData.nonce);

      var ajaxUrl = (typeof infratechtonData !== 'undefined') ? infratechtonData.ajaxurl : '/wp-admin/admin-ajax.php';

      fetch(ajaxUrl, { method: 'POST', body: fd })
        .then(function(r) { return r.json(); })
        .then(function(data) {
          if (formMsg) {
            formMsg.style.display = 'block';
            if (data.success) {
              formMsg.style.background = 'rgba(0,230,118,0.08)';
              formMsg.style.border     = '1px solid rgba(0,230,118,0.3)';
              formMsg.style.color      = '#00E676';
              formMsg.innerHTML = '✓ ' + (data.data.message || 'Message sent!');
              contactForm.reset();
            } else {
              formMsg.style.background = 'rgba(255,45,85,0.08)';
              formMsg.style.border     = '1px solid rgba(255,45,85,0.3)';
              formMsg.style.color      = '#FF6B80';
              formMsg.innerHTML = '✗ ' + (data.data.message || 'Something went wrong. Please try again.');
            }
          }
        })
        .catch(function() {
          if (formMsg) {
            formMsg.style.display = 'block';
            formMsg.innerHTML = '✗ Network error. Please email <a href="mailto:info@infratechton.com">info@infratechton.com</a> directly.';
          }
        })
        .finally(function() {
          if (formSubmit) { formSubmit.textContent = 'Send Project Brief →'; formSubmit.disabled = false; }
        });
    });
  }

})();
