<?php /* Cookie consent banner + preferences modal */ ?>

<div id="ck-banner" class="ck-banner" style="display:none" role="dialog" aria-label="Consimțământ cookie-uri">
  <div class="ck-banner-inner">
    <div class="ck-banner-text">
      <strong>Folosim cookie-uri</strong>
      <p>Utilizăm cookie-uri de analiză (Google Analytics) pentru a înțelege cum este folosit site-ul. Cookie-urile necesare sunt întotdeauna active. <a href="/politica-de-confidentialitate">Politică de confidențialitate</a></p>
    </div>
    <div class="ck-banner-btns">
      <button class="ck-btn ck-btn-outline" id="ck-reject">Respinge</button>
      <button class="ck-btn ck-btn-outline" id="ck-manage">Preferințe</button>
      <button class="ck-btn ck-btn-primary" id="ck-accept">Acceptă tot</button>
    </div>
  </div>
</div>

<div id="ck-modal" class="ck-modal-overlay" style="display:none" role="dialog" aria-modal="true" aria-label="Gestionează preferințele cookie">
  <div class="ck-modal-box">
    <button class="ck-modal-close" id="ck-modal-close" aria-label="Închide">✕</button>
    <h3>Preferințe cookie-uri</h3>
    <p class="ck-modal-sub">Alege ce tipuri de cookie-uri accepți. Cookie-urile necesare nu pot fi dezactivate.</p>

    <div class="ck-category">
      <div class="ck-cat-row">
        <div>
          <strong>Cookie-uri necesare</strong>
          <p>Esențiale pentru funcționarea site-ului. Nu colectează date personale identificabile.</p>
        </div>
        <span class="ck-always-on">Întotdeauna active</span>
      </div>
    </div>

    <div class="ck-category">
      <div class="ck-cat-row">
        <div>
          <strong>Cookie-uri de analiză</strong>
          <p>Google Analytics — ne ajută să înțelegem cum este folosit site-ul (vizitatori, pagini accesate). Datele sunt anonimizate.</p>
        </div>
        <label class="ck-toggle" aria-label="Cookie-uri de analiză">
          <input type="checkbox" id="ck-analytics-toggle" checked>
          <span class="ck-toggle-slider"></span>
        </label>
      </div>
    </div>

    <div class="ck-modal-actions">
      <button class="ck-btn ck-btn-outline" id="ck-reject-modal">Respinge toate</button>
      <button class="ck-btn ck-btn-outline" id="ck-save-modal">Salvează preferințele</button>
      <button class="ck-btn ck-btn-primary" id="ck-accept-modal">Acceptă toate</button>
    </div>
  </div>
</div>

<script>
(function () {
  var KEY    = 'newpod_cookie_consent';
  var banner = document.getElementById('ck-banner');
  var modal  = document.getElementById('ck-modal');
  var toggle = document.getElementById('ck-analytics-toggle');

  function loadGA4() {
    if (window.__ga4Loaded) return;
    window.__ga4Loaded = true;
    var s = document.createElement('script');
    s.async = true;
    s.src = 'https://www.googletagmanager.com/gtag/js?id=G-0K239B6FVN';
    document.head.appendChild(s);
    window.dataLayer = window.dataLayer || [];
    window.gtag = function () { dataLayer.push(arguments); };
    gtag('js', new Date());
    gtag('config', 'G-0K239B6FVN');
  }

  function save(analytics) {
    localStorage.setItem(KEY, JSON.stringify({
      necessary: true,
      analytics: analytics,
      ts: new Date().toISOString()
    }));
    if (analytics) loadGA4();
    banner.style.display = 'none';
    modal.style.display  = 'none';
  }

  // Check stored consent
  try {
    var stored = JSON.parse(localStorage.getItem(KEY));
    if (stored) {
      if (stored.analytics) loadGA4();
    } else {
      setTimeout(function () { banner.style.display = 'flex'; }, 700);
    }
  } catch (e) {
    setTimeout(function () { banner.style.display = 'flex'; }, 700);
  }

  // Banner
  document.getElementById('ck-accept').addEventListener('click', function () { save(true); });
  document.getElementById('ck-reject').addEventListener('click', function () { save(false); });
  document.getElementById('ck-manage').addEventListener('click', function () {
    modal.style.display = 'flex';
  });

  // Modal
  document.getElementById('ck-accept-modal').addEventListener('click', function () {
    toggle.checked = true; save(true);
  });
  document.getElementById('ck-reject-modal').addEventListener('click', function () {
    toggle.checked = false; save(false);
  });
  document.getElementById('ck-save-modal').addEventListener('click', function () {
    save(toggle.checked);
  });
  document.getElementById('ck-modal-close').addEventListener('click', function () {
    modal.style.display = 'none';
  });
  modal.addEventListener('click', function (e) {
    if (e.target === modal) modal.style.display = 'none';
  });
})();
</script>
