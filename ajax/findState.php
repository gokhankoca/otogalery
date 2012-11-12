<?php $country=intval($_GET['country']);
$link = mysql_connect('localhost', 'root', ''); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('osmanlizadesql');


?>

<select name="state" onchange="getCity(<?php echo $country; ?>,this.value)">
<?php
$sql="SELECT * FROM state WHERE countryid='$country'";
$qry=mysql_query($sql);
while ($rows = mysql_fetch_array($qry)){
	print_r($rows);
?>
   <option value="<?php echo $rows['id']; ?>"><?php echo $rows['statename']; ?></option>

<?php
}
echo "</select>";

?> 
