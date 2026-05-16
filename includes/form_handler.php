<?php
$to     = "office@newpod.ro";
$sent   = isset($_GET['sent']) ? $_GET['sent'] : '';
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type'])) {

    $form_type = $_POST['form_type'];

    function clean($val) {
        return htmlspecialchars(trim(strip_tags($val)), ENT_QUOTES, 'UTF-8');
    }
    function safeStr($s) {
        return preg_replace('((?:\n|\r|\t|%0A|%0D|%08|%09)+)i', '', $s);
    }
    function validEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function writeLog($type, $form, $data = []) {
        $logFile = dirname(__DIR__) . '/logs/form_errors.log';
        $line    = '[' . date('Y-m-d H:i:s') . '] [' . $type . '] Form:' . $form
                 . ' | IP:' . ($_SERVER['REMOTE_ADDR'] ?? 'N/A');
        foreach ($data as $k => $v) $line .= ' | ' . $k . ': ' . $v;
        file_put_contents($logFile, $line . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    if (!empty($_POST['website'])) { header("Location: index.php"); exit; }

    $subject = "Contact site newpod.ro";
    $message = "";
    $header  = "From: noreply@newpod.ro\r\nReply-To: $to\r\nContent-Type: text/plain; charset=UTF-8\r\n";

    // ── FORM 1: Cerere ofertă ──
    if ($form_type === 'oferta') {
        $subject  = "Cerere ofertă – newpod.ro";
        $required = ['nume', 'telefon', 'email'];
        foreach ($required as $f) {
            if (empty($_POST[$f])) $errors[] = ucfirst($f);
        }
        if (!empty($_POST['email']) && !validEmail($_POST['email'])) {
            $errors[] = 'Email invalid';
        }
        if (!empty($errors)) {
            writeLog('VALIDARE', 'oferta', ['Erori' => implode(', ', $errors)]);
        }
        if (empty($errors)) {
            $fields = [
                'Nume'                         => 'nume',
                'Telefon'                      => 'telefon',
                'Email'                        => 'email',
                'Fax'                          => 'fax',
                'Destinația sistemului'        => 'destinatia_sistemului',
                'Destinația imobilului'        => 'destinatia_imobilului',
                'Piscină'                      => 'piscina',
                'Nr. persoane'                 => 'nr_persoane',
                'Suprafața încălzire (m²)'     => 'suprafata',
                'Orientare acoperiș'           => 'orientare_acoperis',
                'Tip acoperiș'                 => 'tip_acoperis',
                'Material acoperiș'            => 'material_acoperis',
                'Distanța colectori ↔ boiler'  => 'distanta',
                'Sistem de backup'             => 'sistem_backup',
                'Județ / Localitate'           => 'judet',
                'Adresă completă'              => 'adresa',
                'Informații suplimentare'      => 'info_suplimentare',
            ];
            foreach ($fields as $label => $key) {
                if (!empty($_POST[$key])) {
                    $message .= $label . ": " . clean($_POST[$key]) . "\n";
                }
            }
            if (!mail($to, safeStr($subject), $message, $header)) {
                writeLog('MAIL_FAIL', 'oferta', [
                    'Nume'  => clean($_POST['nume']    ?? ''),
                    'Email' => clean($_POST['email']   ?? ''),
                    'Tel'   => clean($_POST['telefon'] ?? ''),
                    'Motiv' => error_get_last()['message'] ?? 'mail() a returnat false',
                ]);
            }
            header("Location: index.php?sent=oferta#oferta"); exit;
        }
    }

    // ── FORM 2: Contact mesaj ──
    if ($form_type === 'contact') {
        $subject  = "Mesaj contact – newpod.ro";
        $required = ['contact_nume', 'contact_email', 'contact_mesaj'];
        foreach ($required as $f) {
            if (empty($_POST[$f])) $errors[] = ucfirst(str_replace('contact_', '', $f));
        }
        if (!empty($_POST['contact_email']) && !validEmail($_POST['contact_email'])) {
            $errors[] = 'Email invalid';
        }
        if (!empty($errors)) {
            writeLog('VALIDARE', 'contact', ['Erori' => implode(', ', $errors)]);
        }
        if (empty($errors)) {
            $message  = "Nume: "    . clean($_POST['contact_nume'])    . "\n";
            $message .= "Email: "   . clean($_POST['contact_email'])   . "\n";
            $message .= "Telefon: " . clean($_POST['contact_telefon']) . "\n";
            $message .= "Mesaj: "   . clean($_POST['contact_mesaj'])   . "\n";
            if (!mail($to, safeStr($subject), $message, $header)) {
                writeLog('MAIL_FAIL', 'contact', [
                    'Nume'  => clean($_POST['contact_nume']   ?? ''),
                    'Email' => clean($_POST['contact_email']  ?? ''),
                    'Tel'   => clean($_POST['contact_telefon'] ?? ''),
                    'Motiv' => error_get_last()['message'] ?? 'mail() a returnat false',
                ]);
            }
            header("Location: index.php?sent=contact#contact"); exit;
        }
    }

    // ── FORM 3: Trimite întrebare ──
    if ($form_type === 'intrebare') {
        $subject  = "Întrebare – newpod.ro";
        $required = ['intrebare_nume', 'intrebare_email', 'intrebare_mesaj'];
        foreach ($required as $f) {
            if (empty($_POST[$f])) $errors[] = ucfirst(str_replace('intrebare_', '', $f));
        }
        if (!empty($_POST['intrebare_email']) && !validEmail($_POST['intrebare_email'])) {
            $errors[] = 'Email invalid';
        }
        if (!empty($errors)) {
            writeLog('VALIDARE', 'intrebare', ['Erori' => implode(', ', $errors)]);
        }
        if (empty($errors)) {
            $message  = "Nume: "  . clean($_POST['intrebare_nume'])  . "\n";
            $message .= "Email: " . clean($_POST['intrebare_email']) . "\n";
            $message .= "Mesaj: " . clean($_POST['intrebare_mesaj']) . "\n";
            if (!mail($to, safeStr($subject), $message, $header)) {
                writeLog('MAIL_FAIL', 'intrebare', [
                    'Nume'  => clean($_POST['intrebare_nume']   ?? ''),
                    'Email' => clean($_POST['intrebare_email']  ?? ''),
                    'Motiv' => error_get_last()['message'] ?? 'mail() a returnat false',
                ]);
            }
            header("Location: index.php?sent=intrebare#trimite"); exit;
        }
    }
}
