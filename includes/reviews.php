<?php
function reviewsPath() {
    return dirname(__DIR__) . '/data/reviews.json';
}

function rateLimitPath() {
    return dirname(__DIR__) . '/data/rate_limit.json';
}

function loadReviews() {
    $path = reviewsPath();
    if (!file_exists($path)) return [];
    $data = json_decode(file_get_contents($path), true);
    return is_array($data) ? $data : [];
}

function saveReviews(array $reviews) {
    file_put_contents(reviewsPath(), json_encode($reviews, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
}

function getApprovedReviews() {
    $reviews = loadReviews();
    $approved = [];
    foreach ($reviews as $r) {
        if (($r['status'] ?? '') === 'approved' && !($r['featured'] ?? false)) {
            $approved[] = $r;
        }
    }
    usort($approved, function($a, $b) {
        return strcmp($b['date_submitted'], $a['date_submitted']);
    });
    return $approved;
}

function getFeaturedReview() {
    $reviews = loadReviews();
    foreach ($reviews as $r) {
        if (($r['status'] ?? '') === 'approved' && ($r['featured'] ?? false)) return $r;
    }
    return null;
}

function getReviewStats() {
    $reviews = loadReviews();
    $approved = [];
    foreach ($reviews as $r) {
        if (($r['status'] ?? '') === 'approved') $approved[] = $r;
    }
    $count = count($approved);
    if ($count === 0) return ['count' => 0, 'avg' => 0];
    $sum = 0;
    foreach ($approved as $r) $sum += (int)($r['rating'] ?? 5);
    return ['count' => $count, 'avg' => round($sum / $count, 1)];
}

function renderStars(int $rating, string $cssClass = '') {
    $html = '<span class="' . ($cssClass ?: 'rev-stars') . '">';
    for ($i = 1; $i <= 5; $i++) {
        $html .= $i <= $rating ? '★' : '☆';
    }
    $html .= '</span>';
    return $html;
}

function isRateLimited(string $ip) {
    $path = rateLimitPath();
    if (!file_exists($path)) return false;
    $data = json_decode(file_get_contents($path), true);
    if (!is_array($data)) return false;
    return isset($data[$ip]) && (time() - $data[$ip]) < 86400;
}

function setRateLimit(string $ip) {
    $path = rateLimitPath();
    $data = file_exists($path) ? (json_decode(file_get_contents($path), true) ?? []) : [];
    if (!is_array($data)) $data = [];
    foreach ($data as $k => $t) {
        if ((time() - $t) >= 172800) unset($data[$k]);
    }
    $data[$ip] = time();
    file_put_contents($path, json_encode($data), LOCK_EX);
}

function makeDisplayName(string $name) {
    $name = trim($name);
    $parts = preg_split('/\s+/', $name);
    if (count($parts) <= 1) return $parts[0];
    $last = $parts[count($parts) - 1];
    return $parts[0] . ' ' . mb_strtoupper(mb_substr($last, 0, 1, 'UTF-8'), 'UTF-8') . '.';
}

function generateReviewId() {
    return uniqid('r', true);
}
