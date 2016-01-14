<?php
include('../login/session.php');
header('Content-Type: text/html; charset=utf-8');

define('DB_HOST', 'localhost');
define('DB_NAME', 'edevlet');
define('DB_USER','root');
define('DB_PASSWORD','**');


$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
mysql_query("SET NAMES 'utf8'");
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function Kaydet()
{
	
	$cep_tel = "0".$_POST['element_4_1'].$_POST['element_4_2'].$_POST['element_4_3'];
	$b_tc=$_POST['element_1_1'];
	$i_tc=$_POST['element_2'];
	
	$query = "CALL istek('$b_tc','$i_tc','$cep_tel',@result)";
	$data = mysql_query ($query)or die(mysql_error());
	$rs = mysql_query( 'SELECT @result as result' ) or die(mysql_error());
	$row5 = mysql_fetch_assoc($rs);
    echo $row5['result'];
	if($row5['result']==1)
	{
	echo '<script>';
	echo 'alert("İstek Kaydınız Tamamlandı! Anasayfaya Yönlendiriliyorsunuz!");';
	echo 'location.href="../login/profile.php"';
	echo '</script>';
	}
	else
	{
			echo "Hata oluştu...";

	}
}

if(isset($_POST['submit']))
{
	Kaydet();
}
?>
