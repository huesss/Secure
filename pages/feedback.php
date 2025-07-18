<?php
require_once __DIR__ . '/../core/template.php';
require_once __DIR__ . '/../core/db.php';
require_once __DIR__ . '/../core/csrf.php';
require_once __DIR__ . '/../core/auth.php';
require_once __DIR__ . '/../core/log.php';
require_login();
$errors = [];
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = trim($_POST['message'] ?? '');
    if (mb_strlen($msg) < 10) $errors[] = 'Сообщение слишком короткое';
    if (!$errors) {
        db_query('INSERT INTO feedback (user_id, message, created_at) VALUES (?, ?, ?)', [$_SESSION['user_id'], $msg, date('Y-m-d H:i:s')]);
        log_event('feedback_sent', ['user_id' => $_SESSION['user_id'], 'ip' => $_SERVER['REMOTE_ADDR']]);
        $success = true;
    } else {
        log_event('feedback_fail', ['user_id' => $_SESSION['user_id'], 'ip' => $_SERVER['REMOTE_ADDR'], 'errors' => $errors]);
    }
}
echo render(__DIR__ . '/../templates/feedback_form.php', ['errors' => $errors, 'success' => $success, 'csrf_token' => csrf_token()]); 