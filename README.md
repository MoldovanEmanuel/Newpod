# Newpod — Solar Energy Website Redesign

> Complete ground-up redesign and rebuild of the SC Newpod SRL website — a solar energy installer based in Bistrița, Romania, covering 10 counties in the northern part of the country.

**Live site:** [newpod.ro](https://newpod.ro)

---

## Before & After

| Old | New |
|-----|-----|
| ![Old design](assets/images/readme-old.png) | ![New design](assets/images/readme-new.png) |

The original site was built on an outdated green-themed layout with no mobile support, no SEO structure, and no performance optimization. The redesign replaced it entirely with a modern, accessible, and fast single-page experience.

---

## Tech Stack

- **PHP** — form handling, server-side validation, email dispatch via `mail()`
- **Vanilla CSS** — custom design system, CSS variables, grid & flexbox layout
- **Vanilla JavaScript** — lightbox, mobile menu, FAQ accordion, popup feedback
- **Apache `.htaccess`** — HTTPS redirect, security headers, gzip, browser caching
- **Self-hosted fonts** — DM Sans (woff2), no Google Fonts dependency

No frameworks. No libraries. No build tools.

---

## Features

### Forms & Backend
- 3 independent contact forms: quote request, contact message, question
- Server-side validation with inline error feedback
- Honeypot spam protection
- Email headers hardened against header injection
- Error logging system — failed sends and validation errors written to a protected log file

### SEO
- Semantic HTML5 structure (`<main>`, `<nav>`, `<footer>`, heading hierarchy)
- `<title>`, meta description, canonical URL
- Open Graph tags for social sharing
- JSON-LD `LocalBusiness` schema with `areaServed` for all 10 counties
- `sitemap.xml`, custom `404.php`

### Performance
- LCP image preloaded with `fetchpriority="high"` and `imagesrcset` for responsive delivery
- Mobile-optimized banner served via `srcset` (750w vs 1440w)
- Self-hosted DM Sans font — eliminates 3rd-party network dependency
- Scroll handler uses cached `offsetTop` values — no forced reflow on scroll
- Apache gzip compression and long-term browser caching headers
- Zero external image dependencies (Unsplash backgrounds removed)

### Accessibility
- WCAG AA contrast ratio on all text (`--muted` passes 6:1 on white)
- `<main>` landmark, sequential heading order
- All `<select>` elements have associated `<label for>` attributes
- `aria-hidden` elements use the `inert` attribute to block focus trapping
- `aria-label` on all icon-only buttons

### Security
- `Options -Indexes` — directory listing disabled
- `X-Content-Type-Options`, `X-Frame-Options`, `X-XSS-Protection`, `Referrer-Policy` headers
- PHP errors suppressed in production via `.htaccess`
- Log directory blocked from web access via `logs/.htaccess`

---

## PageSpeed Scores (live, post-optimization)

| | Mobile | Desktop |
|---|---|---|
| Performance | 75* | **96** |
| Accessibility | 92 | 90 |
| Best Practices | 100 | 100 |
| SEO | 100 | 100 |

| Metric | Mobile | Desktop |
|---|---|---|
| First Contentful Paint | 1.2s | 0.3s |
| Largest Contentful Paint | 6.8s | 1.2s |
| Total Blocking Time | 70ms | 70ms |
| Cumulative Layout Shift | 0 | 0 |
| Speed Index | 3.8s | 1.2s |

*Mobile performance is constrained by the full-width hero banner image — a business requirement from the site owner.

---

## Project Structure

```
Newpod/
├── index.php                  # Main page
├── 404.php                    # Custom error page
├── .htaccess                  # Apache config
├── sitemap.xml
├── includes/
│   └── form_handler.php       # Form validation, mail(), logging
├── assets/
│   ├── css/style.css
│   ├── fonts/                 # Self-hosted DM Sans (woff2)
│   └── images/
│       ├── banner-newpod.webp
│       ├── banner-newpod-mobile.webp
│       ├── gallery/
│       └── partners/
└── logs/
    ├── .htaccess              # Deny from all
    └── form_errors.log        # Append-only error log
```

---

## Local Development

The `.htaccess` contains HTTPS and www redirects intended for the live server. To test locally with XAMPP, rename it to `_htaccess` temporarily.

```bash
# Rename for local testing
mv .htaccess _htaccess

# Rename back before deploying
mv _htaccess .htaccess
```

---

*Built for SC Newpod SRL, Bistrița, România.*
