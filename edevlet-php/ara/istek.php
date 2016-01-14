<?php
include('../login/session.php');
header('Content-Type: text/html; charset=utf-8');
$ad = $_GET['ad'];
$soyad = $_GET['soyad']; 
$tc = $_GET['tc'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>İletişim Bilgileri</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>İletişim Bilgileri</a></h1>
		<form id="form_946210" class="appnitro"  method="post" action="kaydet.php">
					<div class="form_description">
			<h2>İletişim Bilgileri</h2>
			<p>Görüşmek istediğiniz kişinin iletişim bilgilerine bu bölümden ulaşabilirsiniz.</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Bakıcının Adı Soyadı </label>
		<div>
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value="<?php echo $ad . " " . $soyad ?>" readonly/> 
			<input id="element_1_1" name="element_1_1" type="hidden" value="<?php echo $tc?>" readonly/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">İstekte Bulunan Kişinin TC NO </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value="<?php echo $login_session ?>" readonly/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Tarih </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value="<?php echo date("Y-m-d H:i") ?>" readonly/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Cep Telefon Numaranız </label>
		<div>
			<span>
			<input id="element_8_1" name="element_4_1" class="element text" size="3" maxlength="3" value="" type="text"> -
			<label for="element_8_1">0(###)</label>
		</span>
		<span>
			<input id="element_8_2" name="element_4_2" class="element text" size="3" maxlength="3" value="" type="text"> -
			<label for="element_8_2">###</label>
		</span>
		<span>
	 		<input id="element_8_3" name="element_4_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_8_3">####</label>
		</span>
		</div><p class="guidelines" id="guide_4"><small>Buraya kendi telefon numaranızı girmeniz gerekiyor. Bu şekilde ulaşmak istediğiniz kişinin iletişim bilgileri size mesaj olarak gönderilecek. Tüm işlemler kayıt altına alınacaktır.</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="946210" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>
