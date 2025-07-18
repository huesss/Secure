<?php
require_once __DIR__ . '/../core/template.php';
require_once __DIR__ . '/../core/auth.php';
require_once __DIR__ . '/../core/db.php';
require_once __DIR__ . '/../core/log.php';
require_login();
$user_id = $_SESSION['user_id'];
$stmt = db_query('SELECT username, role FROM users WHERE id = ?', [$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
log_event('profile_view', ['user_id' => $user_id, 'ip' => $_SERVER['REMOTE_ADDR']]);
echo render(__DIR__ . '/../templates/profile.php', ['user' => $user]); 