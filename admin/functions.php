<?php

function userbaglanti() {
	$baglanti=mysql_connect("localhost", "root", "qwer1234");
	mysql_select_db("proje",$baglanti);
}

function adminsayfasi (){
	
	$user2=$_SESSION["user"];

	if ($user2==""){
	echo ("kaynagi goruntulemek icin kaynagin basina git");
	header("Location: login.php");
	}
}

function siteinfocek() {
	$query=mysql_query("SELECT * FROM siteinfo");
	$row=mysql_fetch_array($query);
	return $row;
}

function replace_tr($text) {

$text = trim($text);

$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');

$replace = array('C','c','G','g','i','I','O','o','S','s','U','u','-');

$new_text = str_replace($search,$replace,$text);

return $new_text;

} 

function kategorial($id,$s){
        
	    $al=mysql_query("select * from kategori where katID='$id' order by kID asc");
        while($ver=mysql_fetch_array($al))
        {
        
        if($s=='0'){$kaydir2="�"; $css="class='alt'";}
        else{    for($a=0;$a<2*$s;$a++){$kaydir.="&nbsp;";}$kaydir2="$kaydir �";}
        
        echo "<option $css value='".$ver["kID"]."'>$kaydir2".$ver["kADI"]."</option>";
        
         unset($kaydir);
        
        $altkategorivarmi=mysql_num_rows(mysql_query("select kID from kategori where katID='".$ver["kID"]."'"));
        if($altkategorivarmi>0){global $i; $i++; kategorial("".$ver["kID"]."","$i"); $i=$i-1;}
  
    }
} 

function kategoridikey($id,$s){
        
	    $al=mysql_query("select * from kategori where katID='$id' order by kID asc");
        while($ver=mysql_fetch_array($al))
        {
        
        if($s=='0'){$kaydir2="�"; $css="class='alt'";}
        else{    for($a=0;$a<2*$s;$a++){$kaydir.="&nbsp;";}$kaydir2="$kaydir �";}
        
        echo "<a href='kategori_goster.php?kat=$ver[kID]'>$kaydir2$ver[kADI]</a><br />";
        
         unset($kaydir);
        
        $altkategorivarmi=mysql_num_rows(mysql_query("select kID from kategori where katID='".$ver["kID"]."'"));
        if($altkategorivarmi>0){global $i; $i++; kategoridikey("".$ver["kID"]."","$i"); $i=$i-1;}
  
    }
} 

function sayfala(){
	
	$sayfa=$_GET['sayfa']; //get ile gelen sayfayı alıyoruz

	if (!is_numeric($sayfa) || $sayfa=="") { $sayfa=1; } // sayfa rakam değilse ve boş ise sayfayı 1 yapıyoruz

	$kacar=20; //buraya 1 sayfada kaç kayıt göstermek istediğinizi giriniz.

	$kayit_sayisi=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM sabit"));

	$sayfa_sayisi=$kayit_sayisi['0']/$kacar; //kayit sayısını sayfada gösterilecek kayıt sayısına bölerek sayfa sayısını buluyoruz

	if ($sayfa_sayisi%$kacar!=0) { $sayfa_sayisi++; } //sayfa sayısının kacar a göre modunu aldık 0 dan farklı ise sayfa sayısını 1 arttırdık.yani 7 kayit varsa 2 sayfa yapmak için bu gerekli.

	$nerden=($sayfa*$kacar)-$kacar;  //sorguda nerden kısmı örn 2. sayfada bu değer 5 olacaktır
	
	return $sayfa;
	return $kacar;
	return $kayit_sayisi;
	return $sayfa_sayisi;
	return $nerden;
}

?>
