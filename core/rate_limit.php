<?php
function rate_limit($limit=60,$window=60){
    $ip=$_SERVER['REMOTE_ADDR']??'';
    $file=sys_get_temp_dir().'/ratelimit_'.md5($ip);
    $now=time();
    $data=@json_decode(@file_get_contents($file),1)?:['start'=>$now,'count'=>0];
    if($now-$data['start']>$window)$data=['start'=>$now,'count'=>1];
    else $data['count']++;
    file_put_contents($file,json_encode($data));
    if($data['count']>$limit){http_response_code(429);exit('rate');}
}
rate_limit(); 