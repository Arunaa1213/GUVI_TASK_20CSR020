<?php
ini_set('session.save_handler',redis);
ini_set('session.save_path', "tcp://localhost:6379?auth=root");
session_start();

$lastlog = $_SESSION['lastlog'];
$logout = $_SESSION['logout'];
$res = isset($_SESSION['lastlog'])?1:$_SESSION['logout'];
$lastlog = $res;
?>