<?php
if(session_status()!==PHP_SESSION_ACTIVE)session_start();
function csrf_token(){if(empty($_SESSION['csrf_token']))$_SESSION['csrf_token']=bin2hex(random_bytes(32));return $_SESSION['csrf_token'];}
function csrf_check(){if($_SERVER['REQUEST_METHOD']==='POST'){if(empty($_POST['csrf_token'])||$_POST['csrf_token']!==($_SESSION['csrf_token']??'')){http_response_code(403);exit('csrf');}}}
csrf_check(); 