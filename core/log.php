<?php
function log_event($event,$data=[]){$line=date('c')."\t".$event."\t".json_encode($data,JSON_UNESCAPED_UNICODE)."\n";file_put_contents(__DIR__.'/../security.log',$line,FILE_APPEND|LOCK_EX);} 