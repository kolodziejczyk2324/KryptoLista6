<?php
	if(isset($_SESSION['login'])){
		header("location: https://" . $_SERVER['HTTP_HOST'] ."/Krypto/UserMainPage.php");
		exit;
	}
	
	require_once("ModelPHP.php");
	
	echo getHeader();
?>

<h1>Logowanie</h1>
<a href="Register.php">zarejestruj sie</a>

<form id="logForm" action="CheckUserLogin.php" method="post">
  Login:<br>
  <input type="text" name="login">
  <br>
  Haslo:<br>
  <input type="password" name="password">
  <br><br>
  <input type="submit" value="Zaloguj">
</form>
<h3>Witaj na najbezpieczniejszej stronie do wykonywania przelewów na świecie!</h3>

<a href="MySmail/mySmail.php">Poczta studencka</a>

<?php
	echo getFooter();
?>