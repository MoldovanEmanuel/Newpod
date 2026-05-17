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

- **PHP** — form handling, server-side validation, email dispatch via `mail()`, review system
- **Vanilla CSS** — custom design system, CSS variables, grid & flexbox layout
- **Vanilla JavaScript** — lightbox, mobile menu, FAQ accordion, popup feedback, star picker
- **Apache `.htaccess`** — HTTPS redirect, security headers, gzip, browser caching
- **Self-hosted fonts** — DM Sans (woff2), no Google Fonts dependency
- **JSON flat-file storage** — review database with no MySQL dependency

No frameworks. No libraries. No build tools.

---

## Features

### Forms & Backend
- 3 independent contact forms: quote request, contact message, question
- Server-side validation with inline error feedback
- Honeypot spam protection on all forms
- Email headers hardened against header injection
- Error logging system — failed sends and validation errors written to a protected log file

### Review System
- Visitors can submit reviews without an account
- Reviews stored in `data/reviews.json` (flat-file, no database required)
- **Admin panel** (`admin.php`) — session-based login with hashed password (`password_hash`)
- First-run setup page — admin creates username and password on initial visit
- Pending queue — admin can edit name, location, text, rating, owner reply, featured flag, then approve or delete
- Only one featured review at a time — featured card displayed as a large hero above the review grid
- Average rating and review count calculated dynamically from approved reviews
- IP rate limiting — one review per IP per 24 hours (`data/rate_limit.json`)
- 30-character minimum on review text
- Name anonymisation — "Ion Popescu" displayed as "Ion P."
- Optional email and phone fields on submission (stored privately, shown only in admin panel)
- Owner reply field — admin can write a response that appears publicly under the review
- Email notification sent to site owner on each new pending review
- Review submission form with two-column layout (form + trust panel) on desktop, stacked on mobile

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
- `data/` directory blocked from web access via `data/.htaccess`
- Sensitive files excluded from git: `data/admin_config.json`, `data/reviews.json`, `data/rate_limit.json`

### Privacy & GDPR
- Privacy policy page (`politica-de-confidentialitate.php`) in Romanian covering all data collected
- No tracking cookies for regular visitors
- IP addresses retained maximum 48 hours
- Reviewer personal data (email, phone) never displayed publicly

---

## PageSpeed Scores (live, post-optimization)

| | Mobile | Desktop |
|---|---|---|
| Performance | **90** | **100** |
| Accessibility | 93 | 93 |
| Best Practices | 100 | 100 |
| SEO | 100 | 100 |

| Metric | Mobile | Desktop |
|---|---|---|
| First Contentful Paint | 1.5s | 0.4s |
| Largest Contentful Paint | 3.4s | 0.7s |
| Total Blocking Time | 0ms | 0ms |
| Cumulative Layout Shift | 0 | 0 |
| Speed Index | 3.5s | 0.9s |
| Speed Index | 4.0s | 0.6s |

*Mobile performance is constrained by the full-width hero banner image — a business requirement from the site owner.

---

## Project Structure

```
Newpod/
├── index.php                  # Main page
├── admin.php          # Admin panel (login-protected)
├── politica-de-confidentialitate.php                # Privacy policy (GDPR)
├── 404.php                    # Custom error page
├── .htaccess                  # Apache config
├── sitemap.xml
├── includes/
│   ├── form_handler.php       # Form validation, mail(), logging, review submission
│   └── reviews.php            # Review helper functions (load, save, rate limit, stats)
├── assets/
│   ├── css/
│   │   ├── style.css          # Main stylesheet
│   │   └── admin.css          # Admin panel stylesheet
│   ├── fonts/                 # Self-hosted DM Sans (woff2)
│   └── images/
│       ├── banner-newpod.webp
│       ├── banner-newpod-mobile.webp
│       ├── gallery/
│       └── partners/
├── data/
│   ├── .htaccess              # Deny from all (blocks browser access to JSON files)
│   ├── reviews.json           # Review database — gitignored
│   ├── admin_config.json      # Hashed admin credentials — gitignored
│   └── rate_limit.json        # IP rate limit timestamps — gitignored
└── logs/
    ├── .htaccess              # Deny from all
    └── form_errors.log        # Append-only error log — gitignored
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

### First-time setup on a new server
1. Upload all files to the server
2. Ensure `data/` and `logs/` directories are writable by PHP (`chmod 755` or `775`)
3. Create `data/reviews.json` with an empty array `[]` if starting fresh
4. Visit `yourdomain.com/admin.php` to set the admin username and password

---

*Built for SC Newpod SRL, Bistrița, România.*
