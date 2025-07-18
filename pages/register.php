<?php
require_once __DIR__ . '/../core/template.php';
require_once __DIR__ . '/../core/db.php';
require_once __DIR__ . '/../core/csrf.php';
require_once __DIR__ . '/../core/log.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    if (!preg_match('/^[a-zA-Z0-9_]{3,32}$/', $username)) $errors[] = 'Имя пользователя должно быть 3-32 символа, только буквы, цифры и _';
    if (strlen($password) < 8) $errors[] = 'Пароль слишком короткий';
    if (!$errors) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            db_query('INSERT INTO users (username, password, role) VALUES (?, ?, ?)', [$username, $hash, 'user']);
            log_event('register_success', ['username' => $username, 'ip' => $_SERVER['REMOTE_ADDR']]);
            header('Location: /');
            exit;
        } catch (PDOException $e) {
            $errors[] = 'Пользователь уже существует';
            log_event('register_fail', ['username' => $username, 'ip' => $_SERVER['REMOTE_ADDR'], 'error' => $e->getMessage()]);
        }
    } else {
        log_event('register_invalid', ['username' => $username, 'ip' => $_SERVER['REMOTE_ADDR'], 'errors' => $errors]);
    }
}
echo render(__DIR__ . '/../templates/register_form.php', ['errors' => $errors, 'csrf_token' => csrf_token()]); 