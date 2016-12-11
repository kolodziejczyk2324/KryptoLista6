<?php

require_once("basicmysql.php");
require_once("PasswordCreator.php");

session_start();

//sprawdzamy czy dostalismy postem login i haslo
//jezeli nie to moze to swiadczyc o probie niepoprawnego wejscia na strone
if (!(isset($_POST['login']) and isset($_POST['password']))){
	header("location: https://" . $_SERVER['HTTP_HOST'] . "/Krypto/index.php");
	exit;
}
$login = (string)$_POST['login'];
$pass = (string)$_POST['password'];
//sprawdzamy czy taki uzytkownik istnieje w bazie danych
//jesli nie istnieje to wracamy do strony logowania

$result = checkPassword($login, $pass);
if($result==0){
	//header("location: https://" . $_SERVER['HTTP_HOST'] . "/Krypto/index.php");
	exit;
}
else if($result==1){ //jezeli zalogowalismy sie jako uzytkownik
	$_SESSION['login'] = $login; //wlacz zmienna sesyjna abysmy wiedzieli ze ktos jest zalogowany
	header("location: https://" . $_SERVER['HTTP_HOST'] ."/Krypto/UserMainPage.php"); //przejdz do strony glownej uzytkownika
}
else{ //jezeli zalogowalismi sie jako administrator
	$_SESSION['login'] = $login; //wlacz zmienna sesyjna abysmy wiedzieli ze ktos jest zalogowany
	header("location: https://" . $_SERVER['HTTP_HOST'] ."/Krypto/AdminPage.php"); //przejdz do strony glownej uzytkownika
}
?>