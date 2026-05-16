<?php header("HTTP/1.1 404 Not Found"); ?>
<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>404 – Pagina nu există | Newpod</title>
<meta name="robots" content="noindex"/>
<link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg"/>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300..700;1,9..40,300..700&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="/assets/css/style.css"/>
<style>
.e404{min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:2rem;gap:1rem}
.e404-num{font-family:'Fraunces',serif;font-size:clamp(5rem,15vw,9rem);font-weight:700;line-height:1;background:linear-gradient(135deg,var(--green),var(--lime));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.e404-title{font-family:'Fraunces',serif;font-size:clamp(1.4rem,3vw,2rem);font-weight:600;color:var(--ink)}
.e404-desc{color:var(--muted);max-width:380px;font-size:.95rem}
.e404-btn{margin-top:.5rem;display:inline-block;padding:.8rem 2rem;border-radius:50px;background:var(--orange);color:#fff;font-weight:700;text-decoration:none;font-family:'DM Sans',sans-serif;transition:background .2s}
.e404-btn:hover{background:#d9621f}
</style>
</head>
<body>
<div class="e404">
  <div class="e404-num">404</div>
  <div class="e404-title">Pagina nu a fost găsită</div>
  <p class="e404-desc">Pagina pe care o cauți nu există sau a fost mutată.</p>
  <a href="/" class="e404-btn">← Înapoi acasă</a>
</div>
</body>
</html>
