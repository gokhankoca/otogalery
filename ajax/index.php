<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
    function getCountry() {		
		
		var strURL="index.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('countrydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
    
	function getState(countryId) {		
		
		var strURL="findState.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getCity(countryId,stateId) {		
		var strURL="findCity.php?country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}

</script>
</head>
<body>
<form method="post" name="form1">
 <table border="0" cellpadding="0" cellspacing="0" width="60%"><tbody>
  <tr>
   <td width="150">Country</td>
   <td width="150"><select style="background-color: #ffffa0" name="country" onchange="getCountry(this.value)">
<?php
$sql="SELECT * FROM country";
$qry=mysql_query($sql);
while ($rows = mysql_fetch_array($qry)){
	print_r($rows);
?>
   <option value="<?php echo $rows['id']; ?>"><?php echo $rows['country']; ?></option>

<?php
}
echo "</select>";

?> 
</td>
  </tr>
 <tr>
  <td>State</td>
  <td>
<div id="statediv">
  <select style="background-color: #ffffa0" name="state"><option>Select Country First</option>       </select></div></td>
</tr>
<tr>
  <td>City</td>
  <td>
<div id="citydiv">
  <select style="background-color: #ffffa0" name="city"><option>Select State First</option>       </select></div></td>
</tr>
</tbody></table>
</form>
</body>
</html>