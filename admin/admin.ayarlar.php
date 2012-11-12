<?php
ob_start(); session_start();

include("functions.php");
adminsayfasi();

include("html/admin.html");

if(isset($_GET['ak']) && $_GET['ak'] == 'update'){
	
	$a=$_POST['sitead'];
	$b=$_POST['slogan'];
	$c=$_POST['key'];
	$d=$_POST['desc'];
	$e=$_POST['dil'];
	$f=$_POST['tema'];
	$g=$_POST['menu'];
	$h=$_POST['sitetel'];
	$j=$_POST['sitefax'];
	$k=$_POST['siteadres'];
	
	$sorgu=mysql_query("UPDATE siteinfo SET siteadi='".mysql_real_escape_string($a)."', siteslogan='".mysql_real_escape_string($b)."', metakey='".mysql_real_escape_string($c)."', metadesc='".mysql_real_escape_string($d)."', sitedil='$e', sitetema='$f', sitemenu='$g', sitetel='$h', sitefax='$j', siteadres='$k' WHERE id='1'");

    if ($sorgu){
            header("Location: admin.ayarlar.php");
        
    }
            else {
            echo "apdeyt yemedi";
        
    }
}

if (isset($_GET['op']) && $_GET['op'] == 'ayar') {
	
	include("html/ayar.duzenle.html");
}

?>


