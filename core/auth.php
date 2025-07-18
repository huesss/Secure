<?php
if(session_status()!==PHP_SESSION_ACTIVE)session_start();
function is_logged_in(){return!empty($_SESSION['user_id']);}
function require_login(){if(!is_logged_in()){header('Location: /');exit;}}
function user_role(){return $_SESSION['user_role']??'guest';}
function require_role($role){if(user_role()!==$role){http_response_code(403);exit('denied');}} 