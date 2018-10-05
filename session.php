<?php
header('content-type:text/html;charset=utf-8');
session_name('mooc_');
session_start(); //开始session会话
$_SESSION['username'] = 'mooc';  //存储session数据
echo 'sessionID是:',session_id();
session_destroy();
?>