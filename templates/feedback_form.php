<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Обратная связь</title>
<style>
body{background:#f4f4f4;font-family:sans-serif;margin:0;padding:0;}
.form-box{max-width:340px;margin:60px auto;padding:32px 24px;background:#fff;border-radius:8px;box-shadow:0 2px 12px #0001;}
h2{margin:0 0 18px 0;font-weight:600;letter-spacing:1px;}
label{display:block;margin:12px 0 6px 0;font-size:15px;}
textarea{width:100%;padding:8px 10px;margin-bottom:10px;border:1px solid #bbb;border-radius:4px;font-size:15px;resize:vertical;min-height:80px;}
button{width:100%;padding:10px 0;background:#222;color:#fff;border:none;border-radius:4px;font-size:16px;font-weight:600;cursor:pointer;transition:.2s;}
button:hover{background:#444;}
ul{margin:0 0 10px 0;padding:0;list-style:none;color:#c00;font-size:14px;}
p{color:green;font-size:15px;margin:10px 0;}
a{color:#222;text-decoration:none;font-size:14px;display:inline-block;margin-top:10px;}
a:hover{text-decoration:underline;}
</style>
</head>
<body>
<div class="form-box">
<h2>Обратная связь</h2>
<?php if (!empty($errors)): ?>
<ul><?php foreach ($errors as $e): ?><li><?=e($e)?></li><?php endforeach; ?></ul>
<?php endif; ?>
<?php if (!empty($success)): ?><p>Спасибо за сообщение!</p><?php endif; ?>
<form method="post">
<label>Сообщение:<textarea name="message" required minlength="10"></textarea></label>
<input type="hidden" name="csrf_token" value="<?=e($csrf_token)?>">
<button>Отправить</button>
</form>
<a href="/profile">Профиль</a>
</div>
</body>
</html> 