<?php

include("../admin/functions.php");

userbaglanti();
$data=array();
$i=0;
$sql=mysql_query("SELECT * FROM otokasatip WHERE otokasaustID=$_POST[tip] ORDER BY otokasatipADI ASC");
while ($row=mysql_fetch_array($sql)) {
	$data[]=$row;
	$i++;
}
echo json_encode(array("count"=>$i,"data"=>$data));
?>