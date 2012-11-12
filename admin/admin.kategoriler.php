<?php

ob_start(); session_start();
include("functions.php");
adminsayfasi();	userbaglanti ();

include("html/admin.html");
echo "<div id='adminortamenu'>";
	echo "<div class='underlinemenu'>";
		echo "<ul>";
			echo "<li><a href='?ak=el'>Stock</a></li>";
			echo "<li><a href='?ak=tip'>Tip</a></li>";
			echo "<li><a href='?ak=marka'>Trademark</a></li>";
			
			echo "<li><a href='?ak=kasatipi'>Safe Type</a></li>";
			echo "<li><a href='?ak=renk'>Colour</a></li>";
			echo "<li><a href='?ak=vitestipi'>Gear</a></li>";
		echo "</ul>";
	echo "</div>";
echo "</div>";


if (isset($_GET['ak'])) {
	$a=$_GET['ak'];
	include("html/$a.html");
}


if(isset($_GET['ak']) && ($_GET['ak'] == 'markayaz')){
	$sorgu=mysql_query("INSERT INTO otomarka (otomarkaADI) values ('".mysql_real_escape_string($_POST[markakat])."')");
	header("location: ?ak=marka");
}





if(isset($_GET['ak']) && ($_GET['ak'] == 'elyaz')){
	$sorgu=mysql_query("INSERT INTO otoel (otoelADI) values ('".mysql_real_escape_string($_POST[elkat])."')");
	header("location: ?ak=el");
}

if(isset($_GET['ak']) && ($_GET['ak'] == 'kasatipyaz')){
	$sorgu=mysql_query("INSERT INTO otokasatip (otokasaustID, otokasatipADI) values ('".$_POST[turustkat]."', '".mysql_real_escape_string($_POST[kasatipkat])."')");
	header("location: ?ak=kasatipi");
}

if(isset($_GET['ak']) && ($_GET['ak'] == 'renkyaz')){
	$sorgu=mysql_query("INSERT INTO otorenk (otorenkADI) values ('".mysql_real_escape_string($_POST[renkkat])."')");
	header("location: ?ak=renk");
}

if(isset($_GET['ak']) && ($_GET['ak'] == 'vitestipyaz')){
	$sorgu=mysql_query("INSERT INTO otovitestipi (otovitestipADI) values ('".mysql_real_escape_string($_POST[vitestipkat])."')");
	header("location: ?ak=vitestipi");
}

if(isset($_GET['ak']) && ($_GET['ak'] == 'tipyaz')){
	$sorgu=mysql_query("INSERT INTO ototip (ototipADI) values ('".mysql_real_escape_string($_POST[tipkat])."')");
	header("location: ?ak=tip");
}



if(isset($_GET['ak']) && ($_GET['ak'] == 'elsil')){
	$sorgu=mysql_query("DELETE from otoel WHERE otoelID=$_GET[id]");
	header("location: ?ak=el");
}


if(isset($_GET['ak']) && ($_GET['ak'] == 'tipsil')){
	$sorgu=mysql_query("DELETE from ototip WHERE ototipID=$_GET[id]");
	header("location: ?ak=tip");
}

if(isset($_GET['ak']) && ($_GET['ak'] == 'markasil')){
	$sorgu=mysql_query("DELETE from otomarka WHERE otomarkaID=$_GET[id]");
	header("location: ?ak=marka");
}






if(isset($_GET['ak']) && ($_GET['ak'] == 'kasatipsil')){
	$sorgu=mysql_query("DELETE from otokasatip WHERE otokasatipID=$_GET[id]");
	header("location: ?ak=kasatipi");
}


if(isset($_GET['ak']) && ($_GET['ak'] == 'renksil')){
	$sorgu=mysql_query("DELETE from otorenk WHERE otorenkID=$_GET[id]");
	header("location: ?ak=renk");
}


if(isset($_GET['ak']) && ($_GET['ak'] == 'vitestipsil')){
	$sorgu=mysql_query("DELETE from otovitestipi WHERE otovitestipID=$_GET[id]");
	header("location: ?ak=vitestipi");
}


?>
