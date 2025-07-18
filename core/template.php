<?php
function e($str){return htmlspecialchars($str,ENT_QUOTES|ENT_HTML5,'UTF-8');}
function render($template,$vars=[]){extract($vars,EXTR_SKIP);ob_start();include $template;return ob_get_clean();} 