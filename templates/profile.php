<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Профиль</title>
<style>
body{background:#f4f4f4;font-family:sans-serif;margin:0;padding:0;}
.profile-box{max-width:340px;margin:60px auto;padding:32px 24px;background:#fff;border-radius:8px;box-shadow:0 2px 12px #0001;}
h2{margin:0 0 18px 0;font-weight:600;letter-spacing:1px;}
p{margin:10px 0;font-size:15px;}
a{color:#222;text-decoration:none;font-size:14px;display:inline-block;margin-top:10px;}
a:hover{text-decoration:underline;}
.links{margin-top:18px;}
</style>
</head>
<body>
<div class="profile-box">
<h2>Профиль</h2>
<p>Логин: <?=e($user['username'])?></p>
<p>Роль: <?=e($user['role'])?></p>
<div class="links">
<a href="/feedback">Обратная связь</a> | <a href="/">Выйти</a>
</div>
</div>
</body>
</html> 