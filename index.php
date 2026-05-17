<?php require 'includes/form_handler.php'; ?>
<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panouri Solare Bistrița | Instalare Sisteme Fotovoltaice – Newpod</title>
  <meta name="description" content="SC Newpod SRL instalează panouri solare fotovoltaice și sisteme ACM în nordul României: Cluj, Bihor, Bistrița-Năsăud, Maramureș, Alba și alte județe. Ofertă gratuită, Casa Verde inclusă. Sună: 0744 638 212." />
  <link rel="canonical" href="https://newpod.ro/" />
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="ro_RO" />
  <meta property="og:site_name" content="Newpod" />
  <meta property="og:url" content="https://newpod.ro/" />
  <meta property="og:title" content="Panouri Solare Bistrița | Instalare Sisteme Fotovoltaice – Newpod" />
  <meta property="og:description" content="SC Newpod SRL instalează panouri solare fotovoltaice și sisteme ACM în Bistrița și împrejurimi. Ofertă gratuită, documentație Casa Verde inclusă." />
  <meta property="og:image" content="https://newpod.ro/assets/images/banner-newpod.webp" />
  <link rel="preload" href="assets/fonts/dm-sans.woff2" as="font" type="font/woff2" crossorigin />
  <link rel="preload" as="image" href="assets/images/banner-newpod.webp" imagesrcset="assets/images/banner-newpod-mobile.webp 750w, assets/images/banner-newpod.webp 1440w" imagesizes="100vw" fetchpriority="high" media="(min-width: 861px)" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "SC Newpod SRL",
      "description": "Instalare panouri solare fotovoltaice și sisteme ACM pentru apă caldă în Bistrița și județ. Documentație Casa Verde gratuită.",
      "url": "https://newpod.ro",
      "telephone": "+40744638212",
      "email": "office@newpod.ro",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Str. Ioan Sabău, Nr. 5",
        "addressLocality": "Bistrița",
        "addressRegion": "Bistrița-Năsăud",
        "postalCode": "420000",
        "addressCountry": "RO"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 47.1359,
        "longitude": 24.4960
      },
      "areaServed": [{
          "@type": "AdministrativeArea",
          "name": "Alba"
        },
        {
          "@type": "AdministrativeArea",
          "name": "Bihor"
        },
        {
          "@type": "AdministrativeArea",
          "name": "Bistrița-Năsăud"
        },
        {
          "@type": "AdministrativeArea",
          "name": "Botoșani"
        },
        {
          "@type": "AdministrativeArea",
          "name": "Cluj"
        },
        {
          "@type": "AdministrativeArea",
          "name": "Maramureș"
        },
        {
          "@type": "AdministrativeArea",
          "name": "Mureș"
        },
        {
          "@type": "AdministrativeArea",
          "name": "Satu Mare"
        },
        {
          "@type": "AdministrativeArea",
          "name": "Sălaj"
        },
        {
          "@type": "AdministrativeArea",
          "name": "Suceava"
        }
      ],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Servicii energie solară",
        "itemListElement": [{
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Instalare panouri solare fotovoltaice"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Sisteme solare pentru apă caldă menajeră (ACM)"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Documentație program Casa Verde AFM"
            }
          }
        ]
      }
    }
  </script>
  <link rel="icon" type="image/svg+xml" href="assets/images/favicon.svg" />
  <!-- Google Analytics: înlocuiți G-XXXXXXXXXX cu Measurement ID-ul din contul GA4 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-XXXXXXXXXX');
  </script>
</head>

<body>

  <!-- NAV -->
  <nav>
    <a class="logo" href="#acasa">
      <div class="logo-mark">☀️</div>
      <span class="logo-text">
        New<span>pod</span>
        <em class="logo-sub">Energie Solară</em>
      </span>
    </a>
    <ul class="nav-links">
      <li><a href="#oferta">Cere ofertă</a></li>
      <li><a href="#servicii">Servicii</a></li>
      <li><a href="#galerie">Galerie</a></li>
      <li><a href="#parteneri">Parteneri</a></li>
      <li><a href="#recenzii">Recenzii</a></li>
      <li><a href="#intrebari">Întrebări</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <a class="nav-cta" href="tel:0744638212">📞 0744 638 212</a>
    <button class="burger" id="burger" aria-label="Deschide meniu">
      <span></span><span></span><span></span>
    </button>
  </nav>

  <!-- MOBILE MENU -->
  <div class="mobile-menu" id="mobile-menu" aria-hidden="true" inert>
    <button class="mobile-menu-close" id="mobile-menu-close" aria-label="Închide meniu">✕</button>
    <ul class="mobile-nav-links" id="mobile-nav-links">
      <li><a href="#oferta">Cere ofertă<span class="arrow">→</span></a></li>
      <li><a href="#servicii">Servicii<span class="arrow">→</span></a></li>
      <li><a href="#galerie">Galerie<span class="arrow">→</span></a></li>
      <li><a href="#parteneri">Parteneri<span class="arrow">→</span></a></li>
      <li><a href="#recenzii">Recenzii<span class="arrow">→</span></a></li>
      <li><a href="#intrebari">Întrebări<span class="arrow">→</span></a></li>
      <li><a href="#contact">Contact<span class="arrow">→</span></a></li>
    </ul>
    <div class="mobile-menu-bottom">
      <a class="mobile-cta-phone" href="tel:0744638212">📞 0744 638 212</a>
      <a class="mobile-cta-email" href="mailto:office@newpod.ro">✉ office@newpod.ro</a>
      <p class="mobile-menu-tagline">SC Newpod SRL · Bistrița, România</p>
    </div>
  </div>

  <main id="content">

    <!-- HERO BANNER -->
    <section id="acasa">
      <img src="assets/images/banner-newpod.webp" srcset="assets/images/banner-newpod-mobile.webp 750w, assets/images/banner-newpod.webp 1440w" sizes="100vw" alt="Newpod – Instalare panouri solare fotovoltaice, Bistrița, România" fetchpriority="high" />
    </section>

    <!-- HERO + FORM -->
    <section id="oferta-section">
      <div class="hero-bg"></div>
      <div class="hero-text">
        <div class="hero-eyebrow">Soluții de energie solară</div>
        <h1>Instalare panouri solare<br />în <i>nordul României</i></h1>
        <h2 class="hero-counties">Alba · Bihor · Bistrița-Năsăud · Botoșani · Cluj · Maramureș · Mureș · Satu Mare · Sălaj · Suceava</h2>
        <p>Newpod oferă, pentru persoane fizice, întreprinderi și instituții, soluții destinate utilizării energiei solare — atât pentru apă caldă/încălzire, cât și pentru generare de curent electric.</p>
        <div class="hero-bullets">
          <div class="hero-bullet"><span class="hb-num">1</span>Încălzirea apei calde menajere gratuit</div>
          <div class="hero-bullet"><span class="hb-num">2</span>Panouri solare fotovoltaice pentru energie electrică</div>
          <div class="hero-bullet"><span class="hb-num">3</span>Documentație gratuită pentru programul „Casa Verde"</div>
        </div>
        <div class="hero-actions">
          <a class="btn-orange" href="#oferta">Cere ofertă acum →</a>
          <a class="btn-ghost" href="tel:0744638212">📞 0744 638 212</a>
        </div>
      </div>

      <div class="form-card" id="oferta">
        <div class="form-card-top">
          <h2>Cere ofertă<br />GRATUIT</h2>
          <div class="form-badges">
            <span class="fbadge fbadge-g">✔ Răspuns în 72 ore</span>
            <span class="fbadge fbadge-o">✔ Casa Verde — dosar gratuit</span>
          </div>
        </div>
        <p class="form-sub">Completați datele de mai jos și în termen de 3 zile veți fi contactat pentru a stabili soluția optimă corespunzătoare solicitărilor dvs.</p>
        <form method="POST" action="index.php">
          <input type="hidden" name="form_type" value="oferta" />
          <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off" />
          <?php if (!empty($errors) && isset($_POST['form_type']) && $_POST['form_type'] === 'oferta'): ?>
            <script>
              window.__formError = <?php echo json_encode('Câmpuri lipsă: ' . implode(', ', $errors)); ?>;
            </script>
          <?php endif; ?>
          <div class="fg">
            <div><label>Nume</label><input type="text" name="nume" placeholder="Numele dvs." required value="<?php echo isset($_POST['nume']) ? htmlspecialchars($_POST['nume']) : ''; ?>" /></div>
            <div><label>Telefon</label><input type="tel" name="telefon" placeholder="07xx xxx xxx" required value="<?php echo isset($_POST['telefon']) ? htmlspecialchars($_POST['telefon']) : ''; ?>" /></div>
            <div><label>Email</label><input type="email" name="email" placeholder="email@exemplu.ro" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" /></div>
            <div><label>Fax (opțional)</label><input type="tel" name="fax" placeholder="Fax" /></div>
            <div class="fg-full"><label for="destinatia_sistemului">Destinația sistemului</label>
              <select name="destinatia_sistemului" id="destinatia_sistemului">
                <option>Apă caldă și încălzire</option>
                <option>Apă caldă menajeră</option>
                <option>Energie electrică (fotovoltaice)</option>
                <option>Combinat – toate cele de mai sus</option>
              </select>
            </div>
            <div><label for="destinatia_imobilului">Destinația imobilului</label>
              <select name="destinatia_imobilului" id="destinatia_imobilului">
                <option>Casă / Apartament</option>
                <option>Spațiu comercial</option>
                <option>Instituție / Firmă</option>
                <option>Cabană / Locuință de vacanță</option>
              </select>
            </div>
            <div><label for="piscina">Aveți piscină?</label><select name="piscina" id="piscina">
                <option>Nu</option>
                <option>Da</option>
              </select></div>
            <div><label>Nr. persoane</label><input type="number" name="nr_persoane" placeholder="ex. 4" min="1" /></div>
            <div><label>Suprafața de încălzire (m²)</label><input type="number" name="suprafata" placeholder="ex. 120" min="1" /></div>
            <div><label for="orientare_acoperis">Orientare acoperiș</label>
              <select name="orientare_acoperis" id="orientare_acoperis">
                <option>Sud</option>
                <option>Sud-Est</option>
                <option>Sud-Vest</option>
                <option>Est / Vest</option>
                <option>Nord</option>
              </select>
            </div>
            <div><label for="tip_acoperis">Tip acoperiș</label>
              <select name="tip_acoperis" id="tip_acoperis">
                <option>45 grade (înclinat)</option>
                <option>Plat (0–10 grade)</option>
                <option>Terasă plată</option>
              </select>
            </div>
            <div><label>Material acoperiș</label><input type="text" name="material_acoperis" placeholder="ex. țiglă, tablă, lemn..." /></div>
            <div class="fg-full"><label>Distanța estimativă colectori ↔ boiler</label><input type="text" name="distanta" placeholder="ex. 10 metri" /></div>
            <div><label for="sistem_backup">Sistem de backup?</label><select name="sistem_backup" id="sistem_backup">
                <option>Da</option>
                <option>Nu</option>
              </select></div>
            <div><label>Județ / Localitate</label><input type="text" name="judet" placeholder="ex. Bistrița" /></div>
            <div class="fg-full"><label>Adresă completă</label><input type="text" name="adresa" placeholder="Strada, nr., localitate, județ" /></div>
            <div class="fg-full"><label>Informații suplimentare</label><textarea name="info_suplimentare" placeholder="Descrieți situația actuală, cerințe speciale, întrebări..."></textarea></div>
          </div>
          <button type="submit" class="submit-btn">Trimite cererea de ofertă →</button>
          <p class="form-note">Sau sunați direct: <a href="tel:0744638212">0744 638 212</a></p>
        </form>
      </div>
    </section>

    <!-- SERVICII -->
    <section id="servicii">
      <div class="eyebrow">Ce oferim</div>
      <h2 class="sec-title">Serviciile noastre</h2>
      <p class="sec-desc">Soluții complete de energie regenerabilă, instalate profesionist pentru orice tip de imobil.</p>
      <div class="svc-grid">
        <div class="svc-card">
          <div class="svc-icon">🔥</div>
          <h3>Energie termică</h3>
          <p>Sistemele solare de apă caldă folosesc radiația solară pentru încălzirea apei. La latitudini geografice joase (sub 40°) pot furniza 60–70% din apa caldă menajeră necesară, cu temperaturi până la 60°C. Circuit închis presurizat, funcționează iarnă–vară.</p>
          <span class="svc-pill">ACM · Încălzire · Iarnă-Vară</span>
        </div>
        <div class="svc-card">
          <div class="svc-icon">☀️</div>
          <h3>Energie solară</h3>
          <p>Energia solară — lumina și căldura radiantă a soarelui — o sursă gratuită și ecologică. Instalăm panouri fotovoltaice pentru producerea energiei electrice proprii, cu invertoare, regulatoare și acumulatori AGM 12V/170Ah.</p>
          <span class="svc-pill">Fotovoltaice · Invertoare · Stocare</span>
        </div>
        <div class="svc-card">
          <div class="svc-icon">🏡</div>
          <h3>Alte produse<br />„Casa Verde"</h3>
          <p>Statul subvenționează înlocuirea sistemelor tradiționale prin programul „Casa Verde". Noi întocmim toată documentația pentru programul AFM complet gratuit — de la dosar până la decontare.</p>
          <span class="svc-pill">AFM · Dosar gratuit · Nerambursabil</span>
        </div>
      </div>
    </section>

    <!-- GALERIE -->
    <section id="galerie">
      <div class="eyebrow">Lucrările noastre</div>
      <h2 class="sec-title">Galerie foto</h2>
      <div class="gallery-row">
        <div class="gallery-item"><img src="assets/images/gallery/1.webp" alt="Instalare panouri solare pe acoperiș – lucrare Newpod, Bistrița" loading="lazy" /></div>
        <div class="gallery-item"><img src="assets/images/gallery/2.webp" alt="Sistem solar fotovoltaic montat – Bistrița-Năsăud" loading="lazy" /></div>
        <div class="gallery-item"><img src="assets/images/gallery/3.webp" alt="Colectori solari pentru apă caldă menajeră – Newpod" loading="lazy" /></div>
        <div class="gallery-item"><img src="assets/images/gallery/4.webp" alt="Montaj panouri fotovoltaice pe acoperiș – SC Newpod SRL" loading="lazy" /></div>
        <div class="gallery-item"><img src="assets/images/gallery/5.webp" alt="Instalație solară cu boiler 500L – Bistrița" loading="lazy" /></div>
        <div class="gallery-item"><img src="assets/images/gallery/6.webp" alt="Panouri solare instalate profesionist – Newpod Bistrița" loading="lazy" /></div>
        <div class="gallery-item"><img src="assets/images/gallery/7.webp" alt="Sistem ACM solar iarnă-vară – Bistrița-Năsăud" loading="lazy" /></div>
        <div class="gallery-item"><img src="assets/images/gallery/8.webp" alt="Instalare sistem solar Casa Verde – Bistrița" loading="lazy" /></div>
      </div>
    </section>

    <!-- PARTENERI -->
    <section id="parteneri" ">
    <div class=" eyebrow">Cu cine lucrăm</div>
      <h2 class="sec-title">Parteneri &amp; furnizori</h2>
      <p class="sec-desc">Lucrăm exclusiv cu branduri certificate și testate — echipamente europene și asiatice de top, cu garanție și suport tehnic.</p>

      <div class="pt-grid">

        <!-- Column 1: European partners -->
        <div class="pt-col">
          <div class="pt-col-header">
            <span class="pt-col-icon">🌍</span>
            <div>
              <div class="pt-col-title">Parteneri europeni</div>
              <div class="pt-col-sub">Austria &amp; Olanda</div>
            </div>
          </div>
          <div class="pt-logos">
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-fronius.png" alt="Fronius" />
              <span>Fronius</span>
            </div>
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-mypv.png" alt="my-PV" />
              <span>my-PV</span>
            </div>
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-victron.png" alt="Victron Energy" />
              <span>Victron Energy</span>
            </div>
          </div>
        </div>

        <!-- Column 2: Baterii litiu China -->
        <div class="pt-col pt-col-mid">
          <div class="pt-col-header">
            <span class="pt-col-icon">🔋</span>
            <div>
              <div class="pt-col-title">Baterii Litiu</div>
              <div class="pt-col-sub">China</div>
            </div>
          </div>
          <div class="pt-logos">
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-dyness.png" alt="Dyness" />
              <span>Dyness</span>
            </div>
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-deye.png" alt="Deye" />
              <span>Deye</span>
            </div>
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-pylontech.png" alt="Pylontech" />
              <span>Pylontech</span>
            </div>
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-byd.png" alt="BYD Battery" />
              <span>BYD Battery</span>
            </div>
          </div>
        </div>

        <!-- Column 3: Invertoare China -->
        <div class="pt-col">
          <div class="pt-col-header">
            <span class="pt-col-icon">⚡</span>
            <div>
              <div class="pt-col-title">Invertoare</div>
              <div class="pt-col-sub">China</div>
            </div>
          </div>
          <div class="pt-logos">
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-solis.png" alt="Solis" />
              <span>Solis</span>
            </div>
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-growatt.png" alt="Growatt" />
              <span>Growatt</span>
            </div>
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-solax.png" alt="Solax Power" />
              <span>Solax Power</span>
            </div>
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-huawei.png" alt="Huawei Solar" />
              <span>Huawei Solar</span>
            </div>
            <div class="pt-logo-card">
              <img src="assets/images/partners/logo-deye.png" alt="Deye" />
              <span>Deye</span>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- RECENZII -->
    <section id="recenzii">
      <div class="eyebrow">Ce spun clienții</div>
      <h2 class="sec-title">Recenzii</h2>
      <p class="sec-desc">Proiecte realizate în toată țara. Iată câteva dintre experiențele clienților noștri.</p>
      <div class="review-hero">
        <div class="rh-stars">★★★★★</div>
        <blockquote class="rh-quote">„Beneficiez de o instalație ACM (iarnă–vară) cu 2 panouri solare, boiler 500L, automatizare, realizată de SC Newpod SRL prin programul „Casa Verde". Raport calitate/preț foarte bun, seriozitate."</blockquote>
        <div class="rh-meta">
          <div class="rh-avatar">👤</div>
          <div>
            <div class="rh-name">Client verificat — Sistem solar ACM</div>
            <div class="rh-info">Contact: 0363 402 115</div>
          </div>
        </div>
      </div>
      <div class="rev-grid">
        <div class="rev-card">
          <div class="rev-top">
            <p class="rev-name">Locuință de vară</p><span class="rev-date">01.03.2014</span>
          </div>
          <div class="rev-loc">📍 Munții Țibleș</div>
          <div class="rev-stars">★★★★★</div>
          <p>Cabană montană — realizat iluminat și alimentare mici consumatori (TV, receiver satelit, frigider), stocare energie electrică în acumulatori. Preț bun, fiabilitate sporită. <em style="font-size:.78rem;color:var(--green)">— 0753 432 703</em></p>
        </div>
        <div class="rev-card">
          <div class="rev-top">
            <p class="rev-name">Sistem solar ACM</p><span class="rev-date">28.03.2011</span>
          </div>
          <div class="rev-loc">📍 Bistrița</div>
          <div class="rev-stars">★★★★★</div>
          <p>Sistem realizat cu panouri solare plane, boiler de 500 litri. Complet automatizat, funcționează indiferent de anotimp. Circuitul de încălzire este încărcat cu antigel.</p>
        </div>
        <div class="rev-card">
          <div class="rev-top">
            <p class="rev-name">Sistem solar iarnă-vară</p><span class="rev-date">20.09.2011</span>
          </div>
          <div class="rev-loc">📍 Dumitrita</div>
          <div class="rev-stars">★★★★★</div>
          <p>Sistem cu panouri Bosch, boiler de 300 litri, complet automatizat. Realizat și cu PV-Heater — energia electrică solară transformată în termică. Control wireless de pe calculator.</p>
        </div>
      </div>
    </section>

    <!-- ÎNTREBĂRI -->
    <section id="intrebari">
      <div class="eyebrow">Întrebări frecvente</div>
      <h2 class="sec-title">Răspunsuri clare</h2>
      <div class="iq-layout">
        <div class="faq-list">
          <div class="faq-item">
            <div class="faq-q"><span class="faq-n">1</span>Se poate folosi un colector solar împreună cu sistemul existent de apă caldă?</div>
            <div class="faq-a">Da. Pentru apă caldă menajeră tot anul, recomandăm ca panourile solare să funcționeze în tandem cu sistemul existent (centrală pe gaz / combustibil solid). Panourile acoperă necesarul în perioadele cu radiație bună, sistemul clasic asigură diferența.</div>
          </div>
          <div class="faq-item">
            <div class="faq-q"><span class="faq-n">2</span>Panourile solare funcționează și iarna?</div>
            <div class="faq-a">Sistemele de panouri solare cu circuit închis presurizat, umplute cu glycol, produc apă caldă și iarna — la un randament mai scăzut (ziua este mai scurtă, radiația solară mai slabă). Panourile nepresurizate (fără antigel-glycol) trebuie golite pe perioada iernii la temperaturi apropiate de 0°C.</div>
          </div>
          <div class="faq-item">
            <div class="faq-q"><span class="faq-n">3</span>Cât se poate economisi cu panouri solare?</div>
            <div class="faq-a">Economia la producerea apei calde menajere diferă în funcție de zona geografică, anotimp și componentele sistemului. În perioada aprilie–octombrie se poate ajunge la o economie de 100%. Anual, media este de 60–70%.</div>
          </div>
          <div class="faq-item">
            <div class="faq-q"><span class="faq-n">4</span>Cum se întrețin panourile solare?</div>
            <div class="faq-a">Panourile solare nu necesită întreținere specială. Este recomandată verificarea și curățarea panourilor și a sistemului o dată pe an. Panourile nepresurizate (fără antigel-glycol) trebuie golite pe perioada iernii la temperaturi apropiate de 0°C.</div>
          </div>
          <div class="faq-item">
            <div class="faq-q"><span class="faq-n">5</span>Ce este programul „Casa Verde" și cine poate beneficia?</div>
            <div class="faq-a">Statul subvenționează cu sume fixe înlocuirea sau completarea sistemelor tradiționale de încălzire prin programul „Casa Verde" administrat de AFM. Poate beneficia orice persoană fizică proprietară de imobil care nu a mai accesat anterior același program. Noi întocmim dosarul complet gratuit.</div>
          </div>
          <div class="faq-item">
            <div class="faq-q"><span class="faq-n">6</span>Cât durează instalarea unui sistem solar?</div>
            <div class="faq-a">Un sistem rezidențial standard se instalează în 1–2 zile lucrătoare. Dosarul pentru programul „Casa Verde" poate necesita 2–6 săptămâni suplimentare, în funcție de procesarea AFM.</div>
          </div>
        </div>
        <div class="cv-panel">
          <div class="cv-eyebrow">🌿 Program AFM</div>
          <h3>Programul<br />„Casa Verde"</h3>
          <p>Statul subvenționează cu <strong>sume fixe nerambursabile</strong> înlocuirea și completarea sistemelor tradiționale de încălzire, prin programul administrat de <strong>Administrația Fondului pentru Mediu (AFM).</strong></p>
          <p>Noi ne ocupăm de întreaga documentație — <strong>complet gratuit</strong> pentru dvs.</p>
          <div class="cv-points">
            <div class="cv-pt"><span class="cv-check">✓</span>Finanțare nerambursabilă — nu se returnează</div>
            <div class="cv-pt"><span class="cv-check">✓</span>Eligibil persoane fizice proprietare de imobil</div>
            <div class="cv-pt"><span class="cv-check">✓</span>Documentație gratuită — noi o întocmim complet</div>
            <div class="cv-pt"><span class="cv-check">✓</span>Instalare realizată de firme autorizate AFM</div>
            <div class="cv-pt"><span class="cv-check">✓</span>Aplicabil pentru panouri solare și pompe de căldură</div>
          </div>
          <div class="cv-box">
            <span class="cv-box-num">Dosar gratuit</span>
            <span class="cv-box-lbl">Oferim întocmirea documentației „Casa Verde" complet gratuit pentru toți clienții noștri</span>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTACT -->
    <section id="contact">
      <div class="eyebrow">Suntem aproape</div>
      <h2 class="sec-title">Contact</h2>
      <p class="sec-desc">Fie că ai o întrebare sau ești gata să pornești proiectul, suntem la dispoziția ta.</p>
      <div class="ct-layout">
        <div class="ct-info">
          <div class="ct-info-left">
            <h3>Date de contact</h3>
            <div class="ct-items">
              <div class="ct-item">
                <div class="ct-ic">📍</div>
                <div>
                  <div class="ct-lbl">Adresă</div>
                  <div class="ct-val">Str. Ioan Sabău, Nr. 5<br />Bistrița, România</div>
                </div>
              </div>
              <div class="ct-item">
                <div class="ct-ic">📞</div>
                <div>
                  <div class="ct-lbl">Telefon</div>
                  <div class="ct-val"><a href="tel:0744638212">+40 (744) 638 212</a></div>
                </div>
              </div>
              <div class="ct-item">
                <div class="ct-ic">✉️</div>
                <div>
                  <div class="ct-lbl">Email</div>
                  <div class="ct-val"><a href="mailto:office@newpod.ro">office@newpod.ro</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="ct-map">
            <iframe
              src="https://www.google.com/maps?q=Strada+Ioan+Sab%C4%83u+5%2C+Bistri%C8%9Ba%2C+Rom%C3%A2nia&output=embed"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              title="Newpod – Str. Ioan Sabău, Nr. 5, Bistrița">
            </iframe>
          </div>
        </div>
        <div class="ct-form-wrap">
          <h3>Trimite un mesaj</h3>
          <form method="POST" action="index.php">
            <input type="hidden" name="form_type" value="contact" />
            <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off" />
            <?php if (!empty($errors) && isset($_POST['form_type']) && $_POST['form_type'] === 'contact'): ?>
              <script>
                window.__formError = <?php echo json_encode('Câmpuri lipsă: ' . implode(', ', $errors)); ?>;
              </script>
            <?php endif; ?>
            <div class="fstack">
              <div><label>Nume</label><input type="text" name="contact_nume" placeholder="Numele dvs." required /></div>
              <div><label>Email</label><input type="email" name="contact_email" placeholder="email@exemplu.ro" required /></div>
              <div><label>Telefon</label><input type="tel" name="contact_telefon" placeholder="07xx xxx xxx" /></div>
              <div><label>Mesaj</label><textarea name="contact_mesaj" rows="4" placeholder="Cu ce vă putem ajuta?" required></textarea></div>
              <button type="submit" class="submit-btn">Trimite mesajul</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- TRIMITE O ÎNTREBARE -->
    <section id="trimite">
      <div class="ti-inner">
        <div class="eyebrow" style="color:var(--lime)">Ai o curiozitate?</div>
        <h2 class="sec-title">Trimite o întrebare</h2>
        <p class="sec-desc">Răspundem în maxim 24 ore printr-un specialist în energie solară.</p>
        <form method="POST" action="index.php">
          <input type="hidden" name="form_type" value="intrebare" />
          <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off" />
          <?php if (!empty($errors) && isset($_POST['form_type']) && $_POST['form_type'] === 'intrebare'): ?>
            <script>
              window.__formError = <?php echo json_encode('Câmpuri lipsă: ' . implode(', ', $errors)); ?>;
            </script>
          <?php endif; ?>
          <div class="fstack">
            <div><label>Nume</label><input type="text" name="intrebare_nume" placeholder="Numele dvs." required /></div>
            <div><label>Email</label><input type="email" name="intrebare_email" placeholder="email@exemplu.ro" required /></div>
            <div><label>Mesaj</label><textarea name="intrebare_mesaj" rows="4" placeholder="Scrie întrebarea ta..." required></textarea></div>
            <button type="submit" class="btn-lime">Trimite întrebarea →</button>
          </div>
        </form>
      </div>
    </section>

    <!-- MESSAGE POPUP -->
  </main>

  <div id="msg-popup" class="msg-popup" aria-hidden="true" role="dialog" aria-modal="true" inert>
    <div class="msg-popup-box">
      <button class="msg-popup-close" id="msg-popup-close" aria-label="Închide">✕</button>
      <div class="msg-popup-icon" id="msg-popup-icon"></div>
      <div class="msg-popup-title" id="msg-popup-title"></div>
      <p class="msg-popup-text" id="msg-popup-text"></p>
      <button class="msg-popup-btn" id="msg-popup-btn">OK</button>
    </div>
  </div>

  <!-- LIGHTBOX -->
  <div id="lightbox" aria-hidden="true" inert>
    <button class="lb-close" id="lb-close" aria-label="Închide">✕</button>
    <button class="lb-prev" id="lb-prev" aria-label="Anterior">&#8249;</button>
    <button class="lb-next" id="lb-next" aria-label="Următor">&#8250;</button>
    <div class="lb-img-wrap">
      <img id="lb-img" src="" alt="" />
    </div>
    <div class="lb-counter" id="lb-counter"></div>
  </div>

  <!-- FOOTER -->
  <footer>
    <p>© 2025 SC Newpod SRL · Str. Ioan Sabău, Nr. 5, Bistrița, România · <a href="tel:0744638212">+40 (744) 638 212</a> · <a href="mailto:office@newpod.ro">office@newpod.ro</a></p>
  </footer>

  <script>
    // ── Burger menu ──
    const burger = document.getElementById('burger');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = document.querySelectorAll('#mobile-nav-links a');
    const closeBtn = document.getElementById('mobile-menu-close');

    function closeMenu() {
      burger.classList.remove('open');
      mobileMenu.classList.remove('open');
      mobileMenu.setAttribute('aria-hidden', 'true');
      mobileMenu.setAttribute('inert', '');
      document.body.style.overflow = '';
    }

    burger.addEventListener('click', () => {
      const isOpen = burger.classList.toggle('open');
      mobileMenu.classList.toggle('open', isOpen);
      mobileMenu.setAttribute('aria-hidden', !isOpen);
      if (isOpen) mobileMenu.removeAttribute('inert');
      else mobileMenu.setAttribute('inert', '');
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    closeBtn.addEventListener('click', closeMenu);
    mobileLinks.forEach(a => a.addEventListener('click', closeMenu));

    // ── Active nav on scroll ──
    const navLinks = document.querySelectorAll('.nav-links a[href^="#"]');
    const sections = Array.from(navLinks).map(a => document.querySelector(a.getAttribute('href'))).filter(Boolean);

    let sectionTops = [];

    function cacheSectionTops() {
      sectionTops = sections.map(s => s ? s.offsetTop : 0);
    }
    cacheSectionTops();
    window.addEventListener('resize', cacheSectionTops);

    function setActive() {
      const scrollY = window.scrollY + 90;
      let current = 0;
      sectionTops.forEach((top, i) => {
        if (scrollY >= top) current = i;
      });
      const id = '#' + sections[current].id;
      navLinks.forEach(a => a.classList.toggle('active', a.getAttribute('href') === id));
      mobileLinks.forEach(a => a.classList.toggle('active', a.getAttribute('href') === id));
    }
    window.addEventListener('scroll', setActive, {
      passive: true
    });
    setActive();

    // ── Message Popup ──
    const msgPopup = document.getElementById('msg-popup');
    const msgIcon = document.getElementById('msg-popup-icon');
    const msgTitle = document.getElementById('msg-popup-title');
    const msgText = document.getElementById('msg-popup-text');
    const msgClose = document.getElementById('msg-popup-close');
    const msgBtn = document.getElementById('msg-popup-btn');

    function showMsgPopup(type, icon, title, text) {
      msgIcon.textContent = icon;
      msgTitle.textContent = title;
      msgText.textContent = text;
      msgPopup.classList.add('open', 'msg-' + type);
      msgPopup.setAttribute('aria-hidden', 'false');
      msgPopup.removeAttribute('inert');
      document.body.style.overflow = 'hidden';
    }

    function closeMsgPopup() {
      msgPopup.classList.remove('open', 'msg-success', 'msg-error');
      msgPopup.setAttribute('aria-hidden', 'true');
      msgPopup.setAttribute('inert', '');
      document.body.style.overflow = '';
      if (window.history.replaceState) window.history.replaceState(null, '', window.location.pathname);
    }

    msgClose.addEventListener('click', closeMsgPopup);
    msgBtn.addEventListener('click', closeMsgPopup);
    msgPopup.addEventListener('click', e => {
      if (e.target === msgPopup) closeMsgPopup();
    });
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape' && msgPopup.classList.contains('open')) closeMsgPopup();
    });

    const sentParam = new URLSearchParams(window.location.search).get('sent');
    const sentMsgs = {
      oferta: {
        icon: '✓',
        title: 'Cerere trimisă!',
        text: 'Cererea dvs. a fost trimisă! Veți fi contactat în maxim 72 ore.'
      },
      contact: {
        icon: '✓',
        title: 'Mesaj trimis!',
        text: 'Mesajul a fost trimis! Vă vom contacta în curând.'
      },
      intrebare: {
        icon: '✓',
        title: 'Întrebare trimisă!',
        text: 'Răspundem în maxim 24 ore printr-un specialist în energie solară.'
      }
    };
    if (sentParam && sentMsgs[sentParam]) {
      const m = sentMsgs[sentParam];
      showMsgPopup('success', m.icon, m.title, m.text);
    }
    if (typeof window.__formError !== 'undefined') {
      showMsgPopup('error', '!', 'Câmpuri obligatorii lipsă', window.__formError);
    }

    // ── Lightbox ──
    const lightbox = document.getElementById('lightbox');
    const lbImg = document.getElementById('lb-img');
    const lbCounter = document.getElementById('lb-counter');
    const galleryImgs = Array.from(document.querySelectorAll('.gallery-item img'));
    let lbIndex = 0;

    function lbOpen(i) {
      lbIndex = i;
      lbImg.src = galleryImgs[i].src;
      lbImg.alt = galleryImgs[i].alt;
      lightbox.classList.add('open');
      lightbox.setAttribute('aria-hidden', 'false');
      lightbox.removeAttribute('inert');
      document.body.style.overflow = 'hidden';
      lbCounter.textContent = (i + 1) + ' / ' + galleryImgs.length;
    }

    function lbClose() {
      lightbox.classList.remove('open');
      lightbox.setAttribute('aria-hidden', 'true');
      lightbox.setAttribute('inert', '');
      document.body.style.overflow = '';
    }

    function lbNav(dir) {
      lbOpen((lbIndex + dir + galleryImgs.length) % galleryImgs.length);
    }

    galleryImgs.forEach((img, i) => img.parentElement.addEventListener('click', () => lbOpen(i)));
    document.getElementById('lb-close').addEventListener('click', lbClose);
    document.getElementById('lb-prev').addEventListener('click', () => lbNav(-1));
    document.getElementById('lb-next').addEventListener('click', () => lbNav(1));
    lightbox.addEventListener('click', e => {
      if (e.target === lightbox) lbClose();
    });
    document.addEventListener('keydown', e => {
      if (!lightbox.classList.contains('open')) return;
      if (e.key === 'Escape') lbClose();
      if (e.key === 'ArrowLeft') lbNav(-1);
      if (e.key === 'ArrowRight') lbNav(1);
    });

    // ── Smooth scroll ──
    document.querySelectorAll('a[href^="#"]').forEach(a => {
      a.addEventListener('click', e => {
        const t = document.querySelector(a.getAttribute('href'));
        if (t) {
          e.preventDefault();
          t.scrollIntoView({
            behavior: 'smooth'
          });
        }
      });
    });
  </script>
</body>

</html>