<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Вход</title>
<link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
<style>
body{background:#f6f7fb;font-family:'Inter',sans-serif;margin:0;padding:0;}
.form-box{max-width:360px;margin:64px auto;padding:36px 28px 28px 28px;background:#fff;border-radius:14px;box-shadow:0 4px 32px #0002;display:flex;flex-direction:column;align-items:center;}
h2{margin:0 0 26px 0;font-weight:600;letter-spacing:1px;font-size:1.6rem;}
label{width:100%;margin:12px 0 4px 0;font-size:15px;}
input[type=text],input[type=password]{width:100%;padding:12px 14px;margin-bottom:16px;border:1.5px solid #d1d5db;border-radius:6px;font-size:15px;box-sizing:border-box;transition:.2s;border-bottom:2px solid #e5e7eb;}
input[type=text]:focus,input[type=password]:focus{outline:none;border-color:#222;}
button{width:100%;padding:13px 0;background:#181818;color:#fff;border:none;border-radius:6px;font-size:16px;font-weight:600;cursor:pointer;transition:.2s;letter-spacing:1px;box-shadow:0 2px 8px #0001;}
button:hover{background:#333;}
ul{margin:0 0 14px 0;padding:0;list-style:none;color:#c00;font-size:14px;width:100%;}
a{color:#181818;text-decoration:none;font-size:14px;display:inline-block;margin-top:12px;}
a:hover{text-decoration:underline;}
</style>
</head>
<body>
<div class="form-box">
<h2>Вход</h2>
<?php if (!empty($errors)): ?>
<ul><?php foreach ($errors as $e): ?><li><?=e($e)?></li><?php endforeach; ?></ul>
<?php endif; ?>
<form method="post" style="width:100%;">
<label>Логин:<input name="username" type="text" required autocomplete="username"></label>
<label>Пароль:<input name="password" type="password" required autocomplete="current-password"></label>
<input type="hidden" name="csrf_token" value="<?=e($csrf_token)?>">
<button>Войти</button>
</form>
<a href="/register">Регистрация</a>
</div>
</body>
</html> 