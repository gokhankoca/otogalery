<?

     header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
     header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
     header ("Cache-Control: no-cache, must-revalidate");
     header ("Pragma: no-cache");
     
     header("content-type: application/x-javascript; charset=tis-620");
     
     $data=$_GET['data'];
     $val=$_GET['val'];
     
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "qwer1234";
$dbname    = "proje";
mysql_pconnect($dbhost,$dbuser,$dbpass) or die ("Unable to connect to MySQL server");  
     
     if ($data=='province') { 
          echo "<select name='province' onChange=\"dochange('amper', this.value)\">\n";
          echo "<option value='0'>==== SEC ====</option>\n";
          $result=mysql_db_query($dbname,"select loc_code,loc_abbr from location where loc_name = location_name and loc_code != '000000' and flag_disaster is null order by loc_abbr");
          while(list($id, $name)=mysql_fetch_array($result)){
               echo "<option value=\"$id\" >$name</option> \n" ;
          }
     } else if ($data=='amper') {
          echo "<select name='amper' onChange=\"dochange('tumbon', this.value)\">\n";
          echo "<option value='0'>======== SEC ========</option>\n";
          $val2=$val;
          $val = substr($val,0,2);                                 
          $result=mysql_db_query($dbname,"SELECT loc_code, loc_abbr FROM location WHERE loc_code != '000000' and loc_code != '$val2' AND loc_code LIKE '$val%'  AND flag_disaster IS NULL ORDER BY loc_code, loc_abbr ");
          while(list($id, $name)=mysql_fetch_array($result)){       
               echo "<option value=\"$id\" >$name</option> \n" ;
          }
     } else if ($data=='tumbon') {
          echo "<select  name='tumbon' >\n";
          echo "<option value='0'>======== SEC ========</option>\n";
          $val2=$val;
          $val = substr($val,0,4);
          $result=mysql_db_query($dbname,"SELECT loc_code, loc_abbr, loc_name, location_name FROM location WHERE loc_code != '000000' and loc_code != '$val2' AND loc_code LIKE '$val%' AND flag_disaster IS NULL ORDER BY loc_code, loc_abbr");
          while(list($id, $name)=mysql_fetch_array($result)){
               echo "<option value=\"$id\" >$name</option> \n" ;
          }
     }
     echo "</select>\n";  
?>
