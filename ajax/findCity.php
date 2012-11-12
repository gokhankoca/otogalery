<?php $countryId=intval($_GET['country']);
$stateId=intval($_GET['state']);
$link = mysql_connect('localhost', 'root', ''); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('osmanlizadesql');

?>

<select name="city">
<?php
$sql="SELECT * FROM city WHERE countryid='$countryId' AND stateid='$stateId'";
$qry=mysql_query($sql);
while ($rows = mysql_fetch_array($qry)){
	print_r($rows);
?>
   <option value="<?php echo $rows['id']; ?>"><?php echo $rows['city']; ?></option>

<?php
}
echo "</select>";

?> 