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

    // ── FORM 4: Recenzie ──
    if ($form_type === 'recenzie') {
        require_once __DIR__ . '/reviews.php';

        $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

        if (isRateLimited($ip)) {
            header("Location: index.php?sent=recenzie#recenzii"); exit;
        }

        if (empty($_POST['rev_name']))     $errors[] = 'Nume';
        if (empty($_POST['rev_location'])) $errors[] = 'Localitate';
        if (empty($_POST['rev_text']))     $errors[] = 'Recenzie';
        if (!empty($_POST['rev_text']) && mb_strlen(trim($_POST['rev_text']), 'UTF-8') < 30) {
            $errors[] = 'Recenzia trebuie să aibă minim 30 de caractere';
        }

        $rating = intval($_POST['rev_rating'] ?? 5);
        if ($rating < 1 || $rating > 5) $rating = 5;

        if (empty($errors)) {
            $name     = clean($_POST['rev_name']);
            $location = clean($_POST['rev_location'] ?? '');
            $text     = clean($_POST['rev_text']);
            $email    = clean($_POST['rev_email']    ?? '');
            $phone    = clean($_POST['rev_phone']    ?? '');

            $review = [
                'id'             => generateReviewId(),
                'name'           => $name,
                'display_name'   => makeDisplayName($name),
                'label'          => $name,
                'location'       => $location,
                'email'          => $email,
                'phone'          => $phone,
                'rating'         => $rating,
                'text'           => $text,
                'owner_reply'    => '',
                'status'         => 'pending',
                'featured'       => false,
                'date_submitted' => date('c'),
                'date_approved'  => null,
            ];

            $reviews   = loadReviews();
            $reviews[] = $review;
            saveReviews($reviews);
            setRateLimit($ip);

            $notifMsg  = "Ai un review care asteapta sa fie publicat.\n\n";
            $notifMsg .= "Nume: $name\n";
            $notifMsg .= "Localitate: $location\n";
            if ($email) $notifMsg .= "Email: $email\n";
            if ($phone) $notifMsg .= "Telefon: $phone\n";
            $notifMsg .= "Rating: $rating stele\n";
            $notifMsg .= "Recenzie: $text\n\n";
            $notifMsg .= "Gestioneaza recenziile la: https://newpod.ro/admin.php";

            mail($to, safeStr("Review nou – newpod.ro"), $notifMsg, $header);

            header("Location: index.php?sent=recenzie#recenzii"); exit;
        }
    }
}
