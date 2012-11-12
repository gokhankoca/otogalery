<?php

ob_start(); session_start();
include("functions.php");

if (isset($_SESSION["user"]))
header("Location: admin.php");

userbaglanti();

$query=mysql_query("SELECT * FROM siteinfo");
$row=mysql_fetch_array($query);

if (isset($_POST['sifre'])){
	
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$login=$_GET['login'];

	userbaglanti();	
	$qry=mysql_query("SELECT count(uID) from users WHERE uKADI=\"$user\" and uSIFRE=\"".md5($_POST['pass'])."\"");
	$result=mysql_result($qry,0);
	
	if ($result!=1) {
		echo ("Login Failed..!");
		}
		else{
			echo ("<b>Login Confirmed..!</b>");
			
		$_SESSION["user"]=$user;
		header("Location: admin.php");
		}
}

include('html/login.html');

ob_flush();


?>
