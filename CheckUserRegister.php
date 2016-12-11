<?php

require_once("basicmysql.php");
require_once("PasswordCreator.php");

session_start();

if (!(isset($_POST['login']) and isset($_POST['password']))){
	header("location: https://" . $_SERVER['HTTP_HOST'] . "/Krypto/Register.php");
	exit;
}
$login = (string)$_POST['login'];
$pass = (string)$_POST['password'];
if(isLoginInDB($login)){
	header("location: https://" . $_SERVER['HTTP_HOST'] . "/Krypto/Register.php");
	exit;
}
addUserToDB($login, createPassword($pass));
$_SESSION['login'] = $login;
header("location: https://" . $_SERVER['HTTP_HOST'] ."/Krypto/UserMainPage.php");

?>