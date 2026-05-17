<?php
session_start();
require_once __DIR__ . '/includes/reviews.php';

define('ADMIN_CONFIG', __DIR__ . '/data/admin_config.json');

function getAdminConfig() {
    if (!file_exists(ADMIN_CONFIG)) return null;
    return json_decode(file_get_contents(ADMIN_CONFIG), true);
}

function isLoggedIn() {
    return isset($_SESSION['adm_ok']) && $_SESSION['adm_ok'] === true;
}

function cleanAdm($val) {
    return htmlspecialchars(trim(strip_tags($val ?? '')), ENT_QUOTES, 'UTF-8');
}

$setupError = '';
$loginError = '';
$config = getAdminConfig();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // ── First-time setup ──
    if ($action === 'setup' && !$config) {
        $user  = trim($_POST['user'] ?? '');
        $pass  = $_POST['pass'] ?? '';
        $pass2 = $_POST['pass2'] ?? '';

        if (strlen($user) < 3)    $setupError = 'Username prea scurt (minim 3 caractere).';
        elseif (strlen($pass) < 8) $setupError = 'Parola prea scurtă (minim 8 caractere).';
        elseif ($pass !== $pass2)  $setupError = 'Parolele nu coincid.';

        if (!$setupError) {
            $cfg = ['user' => $user, 'hash' => password_hash($pass, PASSWORD_DEFAULT)];
            file_put_contents(ADMIN_CONFIG, json_encode($cfg), LOCK_EX);
            header('Location: admin.php?setup=done'); exit;
        }
    }

    // ── Login ──
    if ($action === 'login') {
        $config = getAdminConfig();
        if ($config
            && isset($_POST['user'], $_POST['pass'])
            && $_POST['user'] === $config['user']
            && password_verify($_POST['pass'], $config['hash'])
        ) {
            session_regenerate_id(true);
            $_SESSION['adm_ok'] = true;
            header('Location: admin.php'); exit;
        }
        $loginError = 'Username sau parolă incorectă.';
    }

    // ── Actions that require login ──
    if (isLoggedIn()) {
        $reviews = loadReviews();
        $id      = $_POST['id'] ?? '';

        if ($action === 'logout') {
            session_destroy();
            header('Location: admin.php'); exit;
        }

        if ($action === 'approve' && $id) {
            foreach ($reviews as &$r) {
                if ($r['id'] === $id) {
                    $r['status']        = 'approved';
                    $r['date_approved'] = date('c');
                    break;
                }
            }
            unset($r);
            saveReviews($reviews);
            header('Location: admin.php#pending'); exit;
        }

        if ($action === 'delete' && $id) {
            $reviews = array_values(array_filter($reviews, function($r) use ($id) {
                return $r['id'] !== $id;
            }));
            saveReviews($reviews);
            header('Location: admin.php'); exit;
        }

        if ($action === 'save' && $id) {
            $isFeatured = isset($_POST['featured']);
            foreach ($reviews as &$r) {
                if ($r['id'] === $id) {
                    $r['display_name'] = cleanAdm($_POST['display_name'] ?? $r['display_name']);
                    $r['label']        = cleanAdm($_POST['label']        ?? $r['label']);
                    $r['location']     = cleanAdm($_POST['location']     ?? '');
                    $rating            = intval($_POST['rating'] ?? $r['rating']);
                    $r['rating']       = max(1, min(5, $rating));
                    $r['text']         = cleanAdm($_POST['text']         ?? '');
                    $r['owner_reply']  = cleanAdm($_POST['owner_reply']  ?? '');
                    $r['featured']     = $isFeatured;
                    if (isset($_POST['approve'])) {
                        $r['status']        = 'approved';
                        $r['date_approved'] = date('c');
                    }
                } else {
                    if ($isFeatured) $r['featured'] = false;
                }
            }
            unset($r);
            saveReviews($reviews);
            header('Location: admin.php'); exit;
        }
    }
}

$config   = getAdminConfig();
$loggedIn = isLoggedIn();
$pending  = [];
$approved = [];

if ($loggedIn) {
    $allReviews = loadReviews();
    $pending    = [];
    $approved   = [];
    foreach ($allReviews as $r) {
        if (($r['status'] ?? '') === 'pending')  $pending[]  = $r;
        if (($r['status'] ?? '') === 'approved') $approved[] = $r;
    }
    usort($approved, function($a, $b) {
        return strcmp($b['date_submitted'] ?? '', $a['date_submitted'] ?? '');
    });
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Recenzii – Newpod</title>
  <meta name="robots" content="noindex, nofollow">
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<?php if (!$config): ?>

  <!-- ── SETUP (first run) ── -->
  <div class="adm-center">
    <div class="adm-card">
      <div class="adm-logo">☀️ Newpod Admin</div>
      <h2>Configurare parolă admin</h2>
      <p class="adm-sub">Prima utilizare — setează username și parola pentru panoul de administrare recenzii.</p>
      <?php if ($setupError): ?>
        <div class="adm-alert adm-alert-err"><?php echo htmlspecialchars($setupError); ?></div>
      <?php endif; ?>
      <form method="POST">
        <input type="hidden" name="action" value="setup">
        <div class="adm-field">
          <label>Username</label>
          <input type="text" name="user" required autocomplete="username" minlength="3">
        </div>
        <div class="adm-field">
          <label>Parolă <span>(minim 8 caractere)</span></label>
          <input type="password" name="pass" required autocomplete="new-password" minlength="8">
        </div>
        <div class="adm-field">
          <label>Confirmă parola</label>
          <input type="password" name="pass2" required autocomplete="new-password">
        </div>
        <button type="submit" class="adm-btn adm-btn-primary">Creează cont admin →</button>
      </form>
    </div>
  </div>

<?php elseif (!$loggedIn): ?>

  <!-- ── LOGIN ── -->
  <div class="adm-center">
    <div class="adm-card">
      <div class="adm-logo">☀️ Newpod Admin</div>
      <h2>Autentificare</h2>
      <?php if ($loginError): ?>
        <div class="adm-alert adm-alert-err"><?php echo htmlspecialchars($loginError); ?></div>
      <?php endif; ?>
      <?php if (isset($_GET['setup']) && $_GET['setup'] === 'done'): ?>
        <div class="adm-alert adm-alert-ok">Cont creat cu succes. Autentifică-te acum.</div>
      <?php endif; ?>
      <form method="POST">
        <input type="hidden" name="action" value="login">
        <div class="adm-field">
          <label>Username</label>
          <input type="text" name="user" required autocomplete="username">
        </div>
        <div class="adm-field">
          <label>Parolă</label>
          <input type="password" name="pass" required autocomplete="current-password">
        </div>
        <button type="submit" class="adm-btn adm-btn-primary">Intră în panou →</button>
      </form>
      <a href="index.php" class="adm-back">← Înapoi la site</a>
    </div>
  </div>

<?php else: ?>

  <!-- ── ADMIN PANEL ── -->
  <div class="adm-layout">

    <header class="adm-header">
      <div class="adm-header-left">
        <span class="adm-header-logo">☀️</span>
        <span class="adm-header-title">Newpod — Recenzii</span>
      </div>
      <div class="adm-header-right">
        <a href="index.php" target="_blank" class="adm-link-btn">Vezi site →</a>
        <a href="https://analytics.google.com/analytics/web/#/p538132369/reports/intelligenthome" target="_blank" class="adm-link-btn">📊 Analytics →</a>
        <form method="POST" style="display:inline">
          <input type="hidden" name="action" value="logout">
          <button type="submit" class="adm-link-btn adm-logout-btn">Ieșire</button>
        </form>
      </div>
    </header>

    <main class="adm-main">

      <!-- PENDING -->
      <section class="adm-section" id="pending">
        <h2 class="adm-section-title">
          Recenzii în așteptare
          <?php if (!empty($pending)): ?>
            <span class="adm-badge adm-badge-warn"><?php echo count($pending); ?></span>
          <?php else: ?>
            <span class="adm-badge">0</span>
          <?php endif; ?>
        </h2>

        <?php if (empty($pending)): ?>
          <p class="adm-empty">Nicio recenzie în așteptare.</p>
        <?php else: ?>
          <?php foreach ($pending as $r): ?>
          <div class="adm-rev-card adm-pending">
            <form method="POST" class="adm-rev-form">
              <input type="hidden" name="action" value="save">
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($r['id']); ?>">

              <div class="adm-rev-meta">
                <span class="adm-meta-name"><?php echo htmlspecialchars($r['name']); ?></span>
                <span class="adm-meta-date"><?php echo date('d.m.Y H:i', strtotime($r['date_submitted'])); ?></span>
                <?php if (!empty($r['location'])): ?>
                  <span class="adm-meta-loc">📍 <?php echo htmlspecialchars($r['location']); ?></span>
                <?php endif; ?>
                <?php if (!empty($r['email'])): ?>
                  <span class="adm-meta-contact">✉ <?php echo htmlspecialchars($r['email']); ?></span>
                <?php endif; ?>
                <?php if (!empty($r['phone'])): ?>
                  <span class="adm-meta-contact">📞 <?php echo htmlspecialchars($r['phone']); ?></span>
                <?php endif; ?>
                <span class="adm-badge adm-badge-warn">în așteptare</span>
              </div>

              <div class="adm-form-grid">
                <div class="adm-field">
                  <label>Nume afișat public</label>
                  <input type="text" name="display_name" value="<?php echo htmlspecialchars($r['display_name']); ?>" required>
                </div>
                <div class="adm-field">
                  <label>Etichetă card <span>(titlu afișat)</span></label>
                  <input type="text" name="label" value="<?php echo htmlspecialchars($r['label']); ?>">
                </div>
                <div class="adm-field">
                  <label>Localitate</label>
                  <input type="text" name="location" value="<?php echo htmlspecialchars($r['location']); ?>">
                </div>
                <div class="adm-field">
                  <label>Rating</label>
                  <div class="adm-star-select">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <label class="adm-star-opt">
                      <input type="radio" name="rating" value="<?php echo $i; ?>" <?php echo (int)$r['rating'] === $i ? 'checked' : ''; ?>>
                      <?php echo $i; ?> ★
                    </label>
                    <?php endfor; ?>
                  </div>
                </div>
                <div class="adm-field adm-field-full">
                  <label>Textul recenziei</label>
                  <textarea name="text" rows="4" required><?php echo htmlspecialchars($r['text']); ?></textarea>
                </div>
                <div class="adm-field adm-field-full">
                  <label>Răspuns Newpod <span>(opțional — apare public sub recenzie)</span></label>
                  <textarea name="owner_reply" rows="2" placeholder="Mulțumim pentru recenzie..."><?php echo htmlspecialchars($r['owner_reply']); ?></textarea>
                </div>
                <div class="adm-field adm-field-full">
                  <label class="adm-check-label">
                    <input type="checkbox" name="featured" <?php echo ($r['featured'] ?? false) ? 'checked' : ''; ?>>
                    Afișează ca recenzie principală (hero card mare)
                  </label>
                </div>
              </div>

              <div class="adm-actions">
                <button type="submit" name="approve" value="1" class="adm-btn adm-btn-primary">✓ Aprobă și publică</button>
                <button type="submit" class="adm-btn adm-btn-secondary">Salvează fără aprobare</button>
                <button type="button" class="adm-btn adm-btn-danger adm-del-trigger"
                  data-id="<?php echo htmlspecialchars($r['id']); ?>"
                  data-name="<?php echo htmlspecialchars($r['display_name']); ?>">Șterge</button>
              </div>
            </form>
          </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </section>

      <!-- APPROVED -->
      <section class="adm-section" id="approved">
        <h2 class="adm-section-title">
          Recenzii publicate
          <span class="adm-badge adm-badge-ok"><?php echo count($approved); ?></span>
        </h2>

        <?php if (empty($approved)): ?>
          <p class="adm-empty">Nicio recenzie publicată.</p>
        <?php else: ?>
          <?php foreach ($approved as $r): ?>
          <div class="adm-rev-card <?php echo ($r['featured'] ?? false) ? 'adm-featured' : ''; ?>">
            <?php if ($r['featured'] ?? false): ?>
              <div class="adm-featured-badge">⭐ Recenzie principală (hero card)</div>
            <?php endif; ?>
            <form method="POST" class="adm-rev-form">
              <input type="hidden" name="action" value="save">
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($r['id']); ?>">

              <div class="adm-rev-meta">
                <span class="adm-meta-name"><?php echo htmlspecialchars($r['name']); ?></span>
                <span class="adm-meta-date"><?php echo date('d.m.Y', strtotime($r['date_submitted'])); ?></span>
                <?php if (!empty($r['location'])): ?>
                  <span class="adm-meta-loc">📍 <?php echo htmlspecialchars($r['location']); ?></span>
                <?php endif; ?>
                <?php if (!empty($r['email'])): ?>
                  <span class="adm-meta-contact">✉ <?php echo htmlspecialchars($r['email']); ?></span>
                <?php endif; ?>
                <?php if (!empty($r['phone'])): ?>
                  <span class="adm-meta-contact">📞 <?php echo htmlspecialchars($r['phone']); ?></span>
                <?php endif; ?>
                <span class="adm-badge adm-badge-ok">publicat</span>
              </div>

              <div class="adm-form-grid">
                <div class="adm-field">
                  <label>Nume afișat public</label>
                  <input type="text" name="display_name" value="<?php echo htmlspecialchars($r['display_name']); ?>" required>
                </div>
                <div class="adm-field">
                  <label>Etichetă card <span>(titlu afișat)</span></label>
                  <input type="text" name="label" value="<?php echo htmlspecialchars($r['label']); ?>">
                </div>
                <div class="adm-field">
                  <label>Localitate</label>
                  <input type="text" name="location" value="<?php echo htmlspecialchars($r['location']); ?>">
                </div>
                <div class="adm-field">
                  <label>Rating</label>
                  <div class="adm-star-select">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <label class="adm-star-opt">
                      <input type="radio" name="rating" value="<?php echo $i; ?>" <?php echo (int)$r['rating'] === $i ? 'checked' : ''; ?>>
                      <?php echo $i; ?> ★
                    </label>
                    <?php endfor; ?>
                  </div>
                </div>
                <div class="adm-field adm-field-full">
                  <label>Textul recenziei</label>
                  <textarea name="text" rows="4" required><?php echo htmlspecialchars($r['text']); ?></textarea>
                </div>
                <div class="adm-field adm-field-full">
                  <label>Răspuns Newpod <span>(opțional — apare public sub recenzie)</span></label>
                  <textarea name="owner_reply" rows="2" placeholder="Mulțumim pentru recenzie..."><?php echo htmlspecialchars($r['owner_reply']); ?></textarea>
                </div>
                <div class="adm-field adm-field-full">
                  <label class="adm-check-label">
                    <input type="checkbox" name="featured" <?php echo ($r['featured'] ?? false) ? 'checked' : ''; ?>>
                    Afișează ca recenzie principală (hero card mare)
                  </label>
                </div>
              </div>

              <div class="adm-actions">
                <button type="submit" class="adm-btn adm-btn-primary">Salvează modificările</button>
                <button type="button" class="adm-btn adm-btn-danger adm-del-trigger"
                  data-id="<?php echo htmlspecialchars($r['id']); ?>"
                  data-name="<?php echo htmlspecialchars($r['display_name']); ?>">Șterge</button>
              </div>
            </form>
          </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </section>

    </main>
  </div>

  <!-- Delete confirmation modal -->
  <div id="del-modal" class="adm-modal-overlay" style="display:none" aria-modal="true">
    <div class="adm-modal">
      <h3>Confirmare ștergere</h3>
      <p id="del-modal-text">Ești sigur că vrei să ștergi această recenzie?</p>
      <div class="adm-modal-actions">
        <form method="POST" id="del-form">
          <input type="hidden" name="action" value="delete">
          <input type="hidden" name="id" id="del-modal-id">
          <button type="submit" class="adm-btn adm-btn-danger">Da, șterge definitiv</button>
        </form>
        <button type="button" class="adm-btn adm-btn-secondary" id="del-cancel">Anulează</button>
      </div>
    </div>
  </div>

  <script>
    document.querySelectorAll('.adm-del-trigger').forEach(function(btn) {
      btn.addEventListener('click', function() {
        document.getElementById('del-modal-id').value = btn.dataset.id;
        document.getElementById('del-modal-text').textContent =
          'Ștergi recenzia lui "' + btn.dataset.name + '"? Acțiunea este ireversibilă.';
        document.getElementById('del-modal').style.display = 'flex';
      });
    });
    document.getElementById('del-cancel').addEventListener('click', function() {
      document.getElementById('del-modal').style.display = 'none';
    });
    document.getElementById('del-modal').addEventListener('click', function(e) {
      if (e.target === this) this.style.display = 'none';
    });
  </script>

<?php endif; ?>
</body>
</html>
