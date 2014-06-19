<?php
include 'config.php';

header('Content-type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');

echo Dispatcher::dispatch($_SERVER['REQUEST_URI']);
?>