/**
 * InfraTechton — GPU ROI Calculator v1.1
 */
(function () {
  'use strict';

  var gpuSlider  = document.getElementById('roi-gpus');
  var spendSlider= document.getElementById('roi-cloud-spend');
  var utilSlider = document.getElementById('roi-utilization');
  if (!gpuSlider) return;

  var gpuLabel  = document.getElementById('roi-gpu-label');
  var spendLabel= document.getElementById('roi-spend-label');
  var utilLabel = document.getElementById('roi-util-label');
  var annualEl  = document.getElementById('roi-annual-savings');
  var paybackEl = document.getElementById('roi-payback');
  var threeYrEl = document.getElementById('roi-3yr');

  function fmt(n) {
    return '€' + Math.round(n).toLocaleString('de-DE');
  }

  function calculate() {
    var gpuCount   = parseInt(gpuSlider.value);
    var cloudSpend = parseInt(spendSlider.value);
    var utilRate   = parseInt(utilSlider.value) / 100;

    if (gpuLabel)   gpuLabel.textContent   = gpuCount + (gpuCount === 1 ? ' GPU' : ' GPUs');
    if (spendLabel) spendLabel.textContent  = '€' + cloudSpend.toLocaleString('de-DE') + '/mo';
    if (utilLabel)  utilLabel.textContent   = (utilRate * 100).toFixed(0) + '%';

    var hardwareCost   = gpuCount * 30000;
    var setupCost      = hardwareCost * 0.15;
    var coloMonthly    = gpuCount * 300;
    var effectiveCloud = cloudSpend * utilRate;
    var monthlySaving  = effectiveCloud - coloMonthly;
    var annualSaving   = monthlySaving * 12;
    var totalCapex     = hardwareCost + setupCost;
    var paybackMonths  = monthlySaving > 0 ? Math.ceil(totalCapex / monthlySaving) : 0;
    var threeYrNet     = annualSaving * 3 - totalCapex;

    if (annualEl)  annualEl.textContent  = annualSaving > 0  ? fmt(annualSaving)  : '—';
    if (paybackEl) paybackEl.textContent = paybackMonths > 0 ? paybackMonths + ' mo' : '—';
    if (threeYrEl) threeYrEl.textContent = threeYrNet > 0    ? fmt(threeYrNet)    : '—';
  }

  gpuSlider.addEventListener('input', calculate);
  spendSlider.addEventListener('input', calculate);
  utilSlider.addEventListener('input', calculate);
  calculate();

  // Lead capture
  var emailInput = document.getElementById('roi-email');
  var submitBtn  = document.getElementById('roi-submit');
  if (submitBtn) {
    submitBtn.addEventListener('click', function () {
      var email = emailInput ? emailInput.value.trim() : '';
      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        if (emailInput) { emailInput.style.borderColor = 'rgba(255,45,85,0.6)'; emailInput.focus(); }
        return;
      }
      if (emailInput) emailInput.style.borderColor = '';
      submitBtn.textContent = 'Sending…';
      submitBtn.disabled = true;

      var fd = new FormData();
      fd.append('action', 'infratechton_roi_lead');
      fd.append('email',   email);
      fd.append('gpus',    gpuSlider.value);
      fd.append('monthly', spendSlider.value);
      if (typeof infratechtonData !== 'undefined') fd.append('nonce', infratechtonData.nonce);

      var ajaxUrl = (typeof infratechtonData !== 'undefined') ? infratechtonData.ajaxurl : '/wp-admin/admin-ajax.php';
      fetch(ajaxUrl, { method: 'POST', body: fd })
        .then(function(r) { return r.json(); })
        .then(function(d) {
          if (d.success) {
            submitBtn.textContent = '✓ Sent!';
            submitBtn.style.background = 'var(--it-success)';
            if (emailInput) emailInput.value = '';
          } else {
            submitBtn.textContent = 'Try Again';
            submitBtn.disabled = false;
          }
        })
        .catch(function() {
          submitBtn.textContent = 'Error — Try Again';
          submitBtn.disabled = false;
        });
    });
  }
})();
