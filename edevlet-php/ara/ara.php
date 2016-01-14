
<?php
include('../login/session.php');

$username="root";$password="**";$database="edevlet";
mysql_connect(localhost,$username,$password);
mysql_query("SET NAMES 'utf8'");
@mysql_select_db($database) or die( "Unable to select database");

$il_id = $_POST['element_2'];
$il = mysql_query ("select ad from il where id='$il_id'");
$row = mysql_fetch_assoc($il);
$il_ad =$row['ad'];
$ilce_id =  $_POST['element_3'];
$ilce =  mysql_query ("select ad from ilce where il_id='$il_id' AND id='$ilce_id'");
$row1= mysql_fetch_assoc($ilce);
$ilce_ad =$row1['ad'];
$mah_id = $_POST['element_4'];
$mah=  mysql_query ("select ad from mahalle where il_id='$il_id' AND ilce_id='$ilce_id' AND id='$mah_id'");
$row2= mysql_fetch_assoc($mah);
$mah_ad =$row2['ad'];

$sure=$_POST['element_9'];
//$yas=$_POST['element_5'];
$cinsiyet=$_POST['element_6'];
$tecrube=$_POST['element_7'];
$cocuk=$_POST['element_10'];
switch ($_POST['element_1']) {

case 1:
    $duzey="Farketmez";
    break;
case 2:
    $duzey="Üniversite";
    break;
case 3:
    $duzey="Lise";
    break;
case 4:
    $duzey="İlkokul";
    break;
}
switch ($_POST['element_8']) {
case 1:
    $din="Farketmez";
    break;
case 2:
    $din="İslam";
    break;
case 3:
    $din="Hristiyan";
    break;
case 4:
    $din="Yahudi";
    break;
case 5:
    $din="Ateist";
    break;
}

$yas1=$_POST['element_5'];
$yas2=$_POST['element_5_2'];


$sorgu = mysql_query("call ara('$il_ad','$ilce_ad','$mah_ad','$duzey','$yas1','$yas2','$cinsiyet','$tecrube','$din','$sure','$cocuk')"); // Tablo ismi adli tablodan id_vs sutununa gore siralayarak veriyi alalim 
$sonuc = mysql_num_rows($sorgu); // Aldigimiz veri setinde kac tane satir oldugunu ogrenelim 
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Arama Formu</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
<div class="form_description">
			<h2>Arama Sonuçları</h2>
			<p>Burdan gereksinim duyduğunuz bakıcıya ulaşabilirsiniz.</p>
		</div>				
<table border="1"> 
<tr><td><b>Ad</b></td><td><b>Soyad<b></td><td><b>Cinsiyet<b></td><td><b>Medeni Hali<b></td><td><b>Eğitim Durumu<b></td><td><b>Dini<b></td><td><b>Tecrübe<b></td><td><b>Çocuğu<b></td><td><b>Yaşadığı Yer<b></td><td><b>Çalışmak istediği bölge<b></td><td><b>İletişim Bilgileri<b></td></tr> 
<? 
if ($sonuc>0) { // Eger en azindan 1 satir varsa HTML kodlari ile tablomuzu yapalim. 

while ($islem = mysql_fetch_array($sorgu)) { // while ile her bir satir icin islem yapmaya baslayalim 

//CINSIYET KONTROL
if($cinsiyet==1)
{
$last = substr($islem['seri_no'], -1); //SON NUMARA TEKSE ERKEK
$int_last = (int)$last;
if ( $int_last & 1 ) {
  //odd
  $cinsiyet="Erkek";
} else {
  //even
  $cinsiyet="Kadın";
}
}//farketmez
else if($cinsiyet==2)
{
$last = substr($islem['seri_no'], -1); //SON NUMARA TEKSE ERKEK
$int_last = (int)$last;
if ( $int_last & 1 ) {
  //odd
  continue;
} else {
  //even
  $cinsiyet="Kadın";
}
}//KADIN
else
{
$last = substr($islem['seri_no'], -1); //SON NUMARA TEKSE ERKEK
$int_last = (int)$last;
if ( $int_last & 1 ) {
  //odd
  $cinsiyet="Erkek";
} else {
  //even
  continue;
}
}//ERKEK

//COCUK KONTROL
if($cocuk==1)
{
if ($islem['cocuk']) {
  $cocuk_str="VAR";
} else {
  $cocuk_str="YOK";
}
}//farketmez
else
{
  if ($islem['cocuk']!=0) {
  $cocuk_str="VAR";

} else {
    continue;
}
}

//TECRUBE KONTROL
if($tecrube==1)
{
if ($islem['tecrube']) {
  $tecrube_str="VAR";
} else {
  $tecrube_str="YOK";
}
}//farketmez
else
{
  if ($islem['tecrube']!=0) {
  $tecrube_str="VAR";

} else {
  $tecrube_str="YOK";
    continue;
}
}

if($islem['email']!=NULL)
{
	$iletisim=$islem['email'] . "--" . $islem['cep_tel_no']. "--" . $islem['ev_tel_no'];
}
else
{
	$ad=$islem['ad'];
	$soyad=$islem['soyad'];
	$tc=$islem['tc_no'];
	//$title="İletişim Bilgilerini İste";
	$iletisim="<a href='istek.php?ad=$ad&soyad=$soyad&tc=$tc'>(Gizlenmiş)-İstek Yap</a>";
}
$yasadigi_yer=$islem['y_il'] . "--" . $islem['y_ilce'];
$calismak_yer=$islem['c_il'] . "--" . $islem['c_ilce'];

echo "<tr><td>{$islem['ad']}</td><td>{$islem['soyad']}</td><td>{$cinsiyet}</td><td>{$islem['medeni_hali']}</td><td>{$islem['duzey']}</td><td>{$islem['din']}</td><td>{$tecrube_str}</td><td>{$cocuk_str}</td><td>{$yasadigi_yer}</td><td>{$calismak_yer}</td><td>$iletisim</td></tr>";  
// Aldigimiz her bir satir veri icin HTML nin TABLE nin TR komutu ile satir olusturalim, satir icerisindeki sutunlari TD ile olusturarak aldigimiz verideki ($islem[]) degerleri sutunlara yerlestirelim. 
// Bu islem while dongusu ile, alinan butun veriler (satirlar) icin ayni islemlerin uygulanmasi ile devam eder, son satir veri de islendikten sonra dongu biter 
} // while dongusunun kapatilmasi  
}// If sonuc>0 kiyasinin kapatilmasi 
else
{
	{
	echo '<script>';
	echo 'alert("Kayıt Bulunamadı! Arama Formuna Yönlendiriliyorsunuz");';
	echo 'location.href="javascript:history.go(-1)"';
	echo '</script>';
	}
}
?>

	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
