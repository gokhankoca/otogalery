<?php

$baglanti=mysql_connect("localhost", "root", "qwer1234");
mysql_select_db("proje",$baglanti);

		
if (isset($_GET['id'])){
	$id=isset($_GET['id'])?$_GET['id']:'';

	$sql="SELECT * FROM ilan I 
		INNER JOIN otoel E ON I.ilanEL=E.otoelID 
		INNER JOIN otomarka M ON I.ilanMARKA=M.otomarkaID 
		INNER JOIN ototip TP ON TP.ototipID=I.ilanTIP 
		INNER JOIN otoyakit Y ON Y.otoyakitID=I.ilanYAKIT 
		INNER JOIN otovitestipi VT ON VT.otovitestipID=I.ilanVITESTIP
		INNER JOIN otokasatip KT ON KT.otokasatipID=I.ilanKASA
		INNER JOIN otorenk R ON R.otorenkID=I.ilanRENK
		WHERE ilanID=$id ORDER BY ilanID DESC";
		$ilanlar=$db->get_row($sql);
	
	echo $ilanlar->ototipADI." - ".$ilanlar->ilanBASLIK." ".$ilanlar->ilanMODEL." Model - ".$ilanlar->ilanKM." Km";
}
elseif (isset($_GET['hid'])){
	$id=isset($_GET['hid'])?$_GET['hid']:'';
	$sql="SELECT * FROM haber WHERE id=$id";
	$ilanlar=$db->get_row($sql);
	echo "Bizden Haberler - ".$ilanlar->baslik."";
}
elseif (isset($_GET['sid'])){
	$id=isset($_GET['sid'])?$_GET['sid']:'';
	$sql="SELECT * FROM sabit S INNER JOIN siteinfo SI WHERE id=$id";
	$ilanlar=$db->get_row($sql);
	echo $ilanlar->siteadi." ".$ilanlar->Sbaslik;
}
else {
		$sql="SELECT * FROM siteinfo ";
		$ilanlar=$db->get_row($sql);
	echo "..:: ".$ilanlar->siteadi." ::..";
}


?>
