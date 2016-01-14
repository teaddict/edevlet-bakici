<?php

header('Content-Type: text/html; charset=utf-8');

define('DB_HOST', 'localhost');
define('DB_NAME', 'edevlet');
define('DB_USER','root');
define('DB_PASSWORD','**');


$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
mysql_query("SET NAMES 'utf8'");
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());



function NewUser()
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
	if(empty($_POST['element_14_1']))
	{
	$is_visible =1;
	}
	$tc_no = $_POST['element_1'];
	$query = "CALL basvur('$tc_no','$sure_id','$il_ad','$ilce_ad','$mah_ad','$email','$cep_tel','$ev_tel','$is_visible',@result)";
	$data = mysql_query ($query)or die(mysql_error());
	$rs = mysql_query( 'SELECT @result as result' ) or die(mysql_error());
	$row5 = mysql_fetch_assoc($rs);
    echo $row5['result'];
	if($row5['result']==1)
	{
	echo '<script>';
	echo 'alert(" Kaydınız Başarılı! Anasayfaya Yönlendiriliyorsunuz!");';
	echo 'location.href="../login/profile.php"';
	echo '</script>';
	}
	else if($row5['result']==2) //sabıka
	{
	echo " Sabıka kaydınız bulunduğu için kaydınız tamamlanamamıştır....";
	header( "refresh:3;url=../login/profile.php" );
	}
	else if($row5['result']==3) //sabıka
	{
	echo " Güncel raporunuz olmadığı için kaydınız tamamlanamamıştır....";
	header( "refresh:3;url=../login/profile.php" );
	}
	else if($row5['result']==4) //sabıka
	{
	echo " Sabıka kaydınız bulunduğu ve güncel raporunuz olmadığı için kaydınız tamamlanamamıştır....";
	header( "refresh:3;url=../login/profile.php" );
	}
	else
	{
			echo " Sistem Hatası oluştu...";
			header( "refresh:3;url=../login/profile.php" );

	}
}

function SignUp()
{
if(!empty($_POST['element_1']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM bakici WHERE tc_no = '$_POST[element_1]'");

	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		NewUser();
	}
	else
	{
		echo "zaten kayıtlısınız...";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>
