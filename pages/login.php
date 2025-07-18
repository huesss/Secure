<?php
require_once __DIR__ . '/../core/template.php';
require_once __DIR__ . '/../core/db.php';
require_once __DIR__ . '/../core/csrf.php';
require_once __DIR__ . '/../core/log.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $stmt = db_query('SELECT id, password, role FROM users WHERE username = ?', [$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        log_event('login_success', ['username' => $username, 'ip' => $_SERVER['REMOTE_ADDR']]);
        header('Location: /profile');
        exit;
    } else {
        $errors[] = 'Неверный логин или пароль';
        log_event('login_fail', ['username' => $username, 'ip' => $_SERVER['REMOTE_ADDR']]);
    }
}
echo render(__DIR__ . '/../templates/login_form.php', ['errors' => $errors, 'csrf_token' => csrf_token()]); 