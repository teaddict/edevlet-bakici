<?php

header('Content-Type: text/html; charset=utf-8');

define('DB_HOST', 'localhost');
define('DB_NAME', 'edevlet');
define('DB_USER','root');
define('DB_PASSWORD','**');


$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
mysql_query("SET NAMES 'utf8'");
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

echo $_POST['element_15_1'];

function Update()
{
	$il_id = $_POST['element_10'];
	$il = mysql_query ("select ad from il where id='$il_id'");
	$row = mysql_fetch_assoc($il);
	$il_ad =$row['ad'];
	$ilce_id =  $_POST['element_11'];
	$ilce =  mysql_query ("select ad from ilce where il_id='$il_id' AND id='$ilce_id'");
	$row1= mysql_fetch_assoc($ilce);
	$ilce_ad =$row1['ad'];
	$mah_id = $_POST['element_12'];
	$mah=  mysql_query ("select ad from mahalle where il_id='$il_id' AND ilce_id='$ilce_id' AND id='$mah_id'");
	$row2= mysql_fetch_assoc($mah);
	$mah_ad =$row2['ad'];
	$sure_id = $_POST['element_13'];
	$ev_tel = "0".$_POST['element_7_1'].$_POST['element_7_2'].$_POST['element_7_3'];
	$cep_tel = "0".$_POST['element_8_1'].$_POST['element_8_2'].$_POST['element_8_3'];
	$email =  $_POST['element_9'];
	if(isset($_POST['element_14_1']))
	{
	$is_visible =0;
	}
	else
	{
	$is_visible = 1;
	}
	if(isset($_POST['element_15_1']))
	{
	$is_active =0;
	}
	else
	{
	$is_active =1;
	}
	$tc_no = $_POST['element_1'];
	$query = "CALL guncelle('$tc_no','$sure_id','$is_active','$il_ad','$ilce_ad','$mah_ad','$email','$cep_tel','$ev_tel','$is_visible',@result)";
	$data = mysql_query ($query)or die(mysql_error());
	$rs = mysql_query( 'SELECT @result as result' ) or die(mysql_error());
	$row5 = mysql_fetch_assoc($rs);
    echo $row5['result'];
	if($row5['result']==1)
	{
	echo '<script>';
	echo 'alert("Kaydınız Güncellendi! Anasayfaya Yönlendiriliyorsunuz!");';
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
	Update();
}
?>
