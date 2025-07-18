<?php
file_put_contents('waf.log','WAF START: '.date('H:i:s')."\n",FILE_APPEND);
function w($s){
file_put_contents('waf.log',"CHECK: $s\n",FILE_APPEND);
$x=['union','select','script','img','svg','alert','eval','sleep','delete','drop','alter','update','insert','information_schema','or','and','--','0x','${','{{',"'",'"','<','>','(',')'];
foreach($x as$t)if(stripos($s,$t)!==false){
file_put_contents('waf.log',"BLOCKED: $s (found: $t)\n",FILE_APPEND);
header('HTTP/1.1 403 Forbidden');
header('Content-Type: text/plain');
ob_end_clean();
echo'waf';
exit;}}
$data=$_GET+$_POST+$_COOKIE;
file_put_contents('waf.log','INPUT: '.print_r($data,1)."\n",FILE_APPEND);
foreach($data as$k=>$v){
if($k==='csrf_token')continue;
if(is_array($v))array_walk_recursive($v,'w');else w($v);} 