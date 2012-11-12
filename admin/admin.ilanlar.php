<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
ob_start(); session_start();

include("functions.php");
adminsayfasi();

include("html/admin.html");

echo "<div id='adminortamenu'><a href='?op=ilanekle' title='Add New Announcement'><img src='images/yeni.jpg' style='border:0px;' /></a></div>";

$id=isset($_GET['id'])?$_GET['id']:'';

if (isset($_GET['op'])) {
	$a=$_GET['op'];
	include("html/$a.html");
}


if(isset($_GET['ak']) && ($_GET['ak'] == 'ilanyaz')){
	
	$a=$_POST['ilanbaslik'];
	$b=$_POST['el'];
	$c=$_POST['tip'];
	$d=$_POST['marka'];
	
	$f=$_POST['model'];
	$g=$_POST['yakit'];
	$h=$_POST['kasatipi'];
	$j=$_POST['renk'];
	$k=$_POST['hacim'];
	$kk=$_POST['beygir'];
	$kkk=$_POST['dumen'];
	$l=$_POST['km'];
	$m=$_POST['vitesadeti'];
	$n=$_POST['vitestipi'];
	$nn=$_POST['kapi'];
	$o=$_POST['otofiyat'];
	$p=$_POST['parabirimi'];
	$pp=$_POST['not'];
	$r1=$_FILES["resim1"]["tmp_name"];
	$r2=$_FILES["resim1"]["name"];
	$r3=$_FILES["resim2"]["tmp_name"];
	$r4=$_FILES["resim2"]["name"];
	$r5=$_FILES["resim3"]["tmp_name"];
	$r6=$_FILES["resim3"]["name"];
	$r7=$_FILES["resim4"]["tmp_name"];
	$r8=$_FILES["resim4"]["name"];
	$r9=$_FILES["resim5"]["tmp_name"];
	$r10=$_FILES["resim5"]["name"];
	$hedef= "uploads/otofoto";
	$tarih=date("Y-m-d H:i:s");
	$sql="INSERT INTO ilan (ilanBASLIK, ilanEL, ilanTIP, ilanMARKA,  ilanMODEL, ilanYAKIT, ilanKASA, ilanRENK, ilanHACIM, ilanGUC, ilanDUMEN, ilanKM, ilanVITES, ilanVITESTIP, ilanKAPI, ilanFIYAT, ilanFIYATTIP, ilanNOT, resim1, resim2, resim3, resim4, resim5, ilanONAY, ilanTARIH) values ('".mysql_real_escape_string($a)."', '$b', '$c', '$d',  '$f', '$g', '$h', '$j', '$k', '$kk', '$kkk', '$l', '$m', '$n', '$nn', '$o', '$p', '$pp', '$r2', '$r4', '$r6', '$r8', '$r10', '1', '$tarih')";
	echo $sql;
	$sorgu=mysql_query($sql);
	$dyukle = move_uploaded_file($r1, '../'. $hedef .'/' . $r2);
	$dyukle2 = move_uploaded_file($r3, '../'. $hedef .'/' . $r4);
    $dyukle3 = move_uploaded_file($r5, '../'. $hedef .'/' . $r6);
	$dyukle4 = move_uploaded_file($r7, '../'. $hedef .'/' . $r8);
	$dyukle5 = move_uploaded_file($r9, '../'. $hedef .'/' . $r10);
	
	
	header("location: admin.ilanlar.php");
}

if(isset($_GET['ak']) && ($_GET['ak'] == 'ilanduzelt')){
	
	$a=$_POST['ilanbaslik'];
	$b=$_POST['el'];
	$c=$_POST['tip'];
	$d=$_POST['marka'];
	
	$f=$_POST['model'];
	$g=$_POST['yakit'];
	$h=$_POST['kasatipi'];
	$j=$_POST['renk'];
	$k=$_POST['hacim'];
	$kk=$_POST['beygir'];
	$kkk=$_POST['dumen'];
	$l=$_POST['km'];
	$m=$_POST['vitesadeti'];
	$n=$_POST['vitestipi'];
	$nn=$_POST['kapi'];
	$o=$_POST['otofiyat'];
	$p=$_POST['parabirimi'];
 	$pp=$_POST['not'];
	$r1=$_FILES["resim1"]["tmp_name"];
	$r2=$_FILES["resim1"]["name"];
	$r3=$_FILES["resim2"]["tmp_name"];
	$r4=$_FILES["resim2"]["name"];
	$r5=$_FILES["resim3"]["tmp_name"];
	$r6=$_FILES["resim3"]["name"];
	$r7=$_FILES["resim4"]["tmp_name"];
	$r8=$_FILES["resim4"]["name"];
	$r9=$_FILES["resim5"]["tmp_name"];
	$r10=$_FILES["resim5"]["name"];
	$hedef= "uploads/otofoto";

	$sorgu=mysql_query("UPDATE ilan SET 
	ilanBASLIK='".mysql_real_escape_string($a)."',
	ilanEL='$b',
	ilanTIP='$c',
	ilanMARKA='$d',
	
	ilanMODEL='$f',
	ilanYAKIT='$g',
	ilanKASA='$h',
	ilanRENK='$j',
	ilanHACIM='$k',
	ilanGUC='$kk',
	ilanDUMEN='$kkk',
	ilanKM='$l',
	ilanVITES='$m',
	ilanVITESTIP='$n',
	ilanKAPI='$nn',
	ilanFIYAT='$o',
	ilanFIYATTIP='$p',
	ilanNOT='$pp'
	WHERE ilanID='$id'");
	
	if($_FILES['resim1']['error']==0){
		$sorgu1=mysql_query("UPDATE ilan SET resim1='$r2' WHERE ilanID='$id'");
		$dyukle = move_uploaded_file($r1, '../'. $hedef .'/' . $r2);
	}
	if($_FILES['resim2']['error']==0){
		$sorgu1=mysql_query("UPDATE ilan SET resim2='$r4' WHERE ilanID='$id'");
		$dyukle2 = move_uploaded_file($r3, '../'. $hedef .'/' . $r4);
	}
	if($_FILES['resim3']['error']==0){
		$sorgu1=mysql_query("UPDATE ilan SET resim3='$r6' WHERE ilanID='$id'");
	    $dyukle3 = move_uploaded_file($r5, '../'. $hedef .'/' . $r6);
	}
	if($_FILES['resim4']['error']==0){
		$sorgu1=mysql_query("UPDATE ilan SET resim4='$r8' WHERE ilanID='$id'");
		$dyukle4 = move_uploaded_file($r7, '../'. $hedef .'/' . $r8);
	}
	if($_FILES['resim5']['error']==0){
		$sorgu1=mysql_query("UPDATE ilan SET resim5='$r10' WHERE ilanID='$id'");
		$dyukle5 = move_uploaded_file($r9, '../'. $hedef .'/' . $r10);
	}
	
	
	

	header("location:admin.ilanlar.php");

}

if(isset($_GET['ak']) && ($_GET['ak'] == 'ilanonay')){
	$id=$_GET[id];
	$sorgu=mysql_query("SELECT ilanONAY from ilan WHERE ilanID=$id");
		$row=mysql_fetch_array($sorgu);
		if ($row['ilanONAY']==1) {
			$sorgu2=mysql_query("UPDATE ilan SET ilanonay='0' WHERE ilanID=$id");
			header("location:admin.ilanlar.php");
		}else {
			$sorgu2=mysql_query("UPDATE ilan SET ilanonay='1' WHERE ilanID=$id");
			header("location:admin.ilanlar.php");
		}
}



if(isset($_GET['ak']) && ($_GET['ak'] == 'ilansil')){
	$sorgu=mysql_query("DELETE from ilan WHERE ilanID=$id");
	$sorgu=mysql_query("DELETE from ilanozellik WHERE ilanustID=$id");
	header("location: admin.ilanlar.php");
}


if(!isset($_GET['op']) or $_GET['op'] == '') {

echo "<div id='anaiceriktablo'>";

echo "<h2>Oto Announcements</h2>";


	echo "<table border=0 width='980'>
		<tr id='anaiceriktablobaslik'>
			<td width=15>ID</td>
			<td>Announcement Name</td>
			<td>Trademark</td>
			
			<td>Model</td>
			<td>Engine Power</td>
			<td>KM</td>
			<td>Price</td>
			<td></td>
		</tr>"; 
	$sql="SELECT * FROM ilan I LEFT JOIN otomarka M ON I.ilanMARKA=M.otomarkaID ORDER BY ilanID DESC";
	$ilanlar=$db->get_results($sql);
	echo "<pre>";
//var_dump($ilanlar);
	echo "</pre>";
	foreach ($ilanlar as $ilan){
		echo "<tr>";
		echo "<td>".$ilan->ilanID."</td>
			<td>".$ilan->ilanBASLIK."</td>
			<td>".$ilan->otomarkaADI."</td>
			
			<td>".$ilan->ilanMODEL."</td>
			<td width=40>".$ilan->ilanGUC."</td>
			<td>".$ilan->ilanKM."</td>
			<td>".$ilan->ilanFIYAT." ".$ilan->ilanFIYATTIP."</td>
			<td width=80><a href='?ak=ilanonay&id=".$ilan->ilanID."' title='Censorship/Publish'><img src='images/".$ilan->ilanONAY.".jpg' /></a><a href='?op=ilanduzenle&id=".$ilan->ilanID."' title='Edit'><img src='images/duzenle.jpg' /></a><a href='?ak=ilansil&id=".$ilan->ilanID."' title='Delete'><img src='images/sil.jpg' /></a></td>
		</tr>";
	}
	echo "</table>";
	echo "</div>";
}

?>
