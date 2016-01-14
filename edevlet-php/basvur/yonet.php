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

/*$query = "CALL yonet('$tc_no',@sure_id,@il_ad,@ilce_ad,@mah_ad,@email,@cep_tel_no,@ev_tel_no,@is_visible)";
$data = mysql_query ($query)or die(mysql_error());
$rs = mysql_query( 'SELECT @sure_id,@il_ad,@ilce_ad,@mah_ad,@email,@cep_tel_no,@ev_tel_no,@is_visible' ) or die(mysql_error());
*/

$query = "CALL yonettest('$login_session',@sure_id,@is_active,@il_ad,@ilce_ad,@mah_ad,@email,@cep_tel_no,@ev_tel_no,@is_visible)";
$data = mysql_query ($query)or die(mysql_error());
$rs = mysql_query( 'SELECT @sure_id,@is_active,@il_ad,@ilce_ad,@mah_ad,@email,@cep_tel_no,@ev_tel_no,@is_visible') or die(mysql_error());
$total = mysql_fetch_assoc($rs);
$il_ad= $total['@il_ad'];
$il = mysql_query ("select id from il where ad='$il_ad'");
$row = mysql_fetch_assoc($il);
$il_id =  $row['id'];
$ilce_ad =$total['@ilce_ad'];
$ilce =  mysql_query ("select id from ilce where il_id='$il_id' AND ad='$ilce_ad'");
$row = mysql_fetch_assoc($ilce);
$ilce_id =  $row['id'];
$mah_ad =$total['@mah_ad'];
$mah=  mysql_query ("select id from mahalle where il_id='$il_id' AND ilce_id='$ilce_id' AND ad='$mah_ad'");
$row = mysql_fetch_assoc($mah);
$mah_id =  $row['id'];
$sure_id = $total['@sure_id'];
$ev_tel = $total['@ev_tel_no'];
$cep_tel = $total['@cep_tel_no'];
$email =  $total['@email'];
$is_visible =$total['@is_visible'];
$is_active =$total['@is_active'];
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>BAKICI BAŞVURU KAYIT- </title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>BAKICI BAŞVURU KAYIT</a></h1>
<form method="POST" action="kaydet.php">
					<div class="form_description">
			<h2>BAKICI BAŞVURU KAYIT</h2>
			<p>Bakıcılık yapmak için başvurularınızı burdan yapabilirsiniz.</p>
		</div>						
			<ul >
			<h3>Kişisel Bilgileriniz</h3>
					<li id="li_1" >
		<label class="description" for="element_1">TC </label>
		<div>
			
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value="<?php echo $login_session ?>" readonly/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Ad </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value="<?php echo $login_session_name ?>" readonly/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Soyad </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value="<?php echo $login_session_lastname ?>" readonly/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">İL </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value="<?php echo $basvur_session_bakici_il ?>" readonly/> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">İLÇE </label>
		<div>
			<input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value="<?php echo $basvur_session_bakici_ilce ?>" readonly/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">MAHALLE </label>
		<div>
			<input id="element_6" name="element_6" class="element text medium" type="text" maxlength="255" value="<?php echo $basvur_session_bakici_mah?>" readonly/> 
		</div> 
		</li>
									<h3>Çalışmak İstediğiniz Bölge</h3>

				<li id="li_10" >

		<label class="description" for="element_10">İL </label>
		<div>
		<select class="element select medium" id="element_10" name="element_10"> 
			<option value="" selected="selected"></option>
<option value="1" <?=$il_id == '1' ? ' selected="selected"' : '';?>>ESKİŞEHİR</option>
<option value="2" <?=$il_id == '2' ? ' selected="selected"' : '';?>>ANKARA</option>
<option value="3" <?=$il_id == '3' ? ' selected="selected"' : '';?>>İSTANBUL</option>

		</select>
		</div><p class="guidelines" id="guide_10"><small>Çalışılmak istenen il</small></p> 
		</li>		<li id="li_11" >
		<label class="description" for="element_11">İLÇE </label>
		<div>
		<select class="element select medium" id="element_11" name="element_11"> 
			<option value="" selected="selected"></option>
<option value="1" <?=$ilce_id == '1' ? ' selected="selected"' : '';?>>Tepebaşı</option>
<option value="2" <?=$ilce_id == '2' ? ' selected="selected"' : '';?>>Odunpazarı</option>
<option value="3" <?=$ilce_id == '3' ? ' selected="selected"' : '';?>>Sivrihisar</option>

		</select>
		</div><p class="guidelines" id="guide_11"><small>Çalışılmak istenen ilçe.</small></p> 
		</li>		<li id="li_12" >
		<label class="description" for="element_12">MAHALLE </label>
		<div>
		<select class="element select medium" id="element_12" name="element_12"> 
			<option value="" selected="selected"></option>
<option value="2" <?=$mah_id == '2' ? ' selected="selected"' : '';?>>Şirintepe</option>
<option value="1" <?=$mah_id == '1' ? ' selected="selected"' : '';?>>Büyükdere</option>
<option value="3" <?=$mah_id == '3' ? ' selected="selected"' : '';?>>Batıkent </option>

		</select>
		</div><p class="guidelines" id="guide_12"><small>Çalışılmak istenen mahalle.</small></p> 
		</li>		<li id="li_13" >
		<label class="description" for="element_13">Çalışma Süresi </label>
		<div>
		<select class="element select medium" id="element_13" name="element_13"> 
			<option value="" selected="selected"></option>
<option value="1" <?=$sure_id == '1' ? ' selected="selected"' : '';?>>Gündüz</option>
<option value="2" <?=$sure_id == '2' ? ' selected="selected"' : '';?>>Gece</option>
<option value="3" <?=$sure_id == '3' ? ' selected="selected"' : '';?>>Yatılı</option>

		</select>
		</div> 
		</li>
		<h3>İletişim Bilgileriniz</h3>

				<li id="li_7" >
		<label class="description" for="element_7">Ev-Tel </label>
		<span>
			<input id="element_7_1" name="element_7_1" class="element text" size="3" maxlength="3" value="<?php echo $ev_tel[1].$ev_tel[2].$ev_tel[3]?>" type="number" required> -
			<label for="element_7_1">0(###)</label>
		</span>
		<span>
			<input id="element_7_2" name="element_7_2" class="element text" size="3" maxlength="3" value="<?php echo $ev_tel[4].$ev_tel[5].$ev_tel[6]?>" type="number" required> -
			<label for="element_7_2">###</label>
		</span>
		<span>
	 		<input id="element_7_3" name="element_7_3" class="element text" size="4" maxlength="4" value="<?php echo $ev_tel[7].$ev_tel[8].$ev_tel[9].$cep_tel[10]?>" type="number" required>
			<label for="element_7_3">####</label>
		</span>
		 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Cep-Tel </label>
		<span>
			<input id="element_8_1" name="element_8_1" class="element text" size="3" maxlength="3" value="<?php echo $cep_tel[1].$cep_tel[2].$cep_tel[3]?>" type="number" required> -
			<label for="element_8_1">0(###)</label>
		</span>
		<span>
			<input id="element_8_2" name="element_8_2" class="element text" size="3" maxlength="3" value="<?php echo $cep_tel[4].$cep_tel[5].$cep_tel[6]?>" type="number" required> -
			<label for="element_8_2">###</label>
		</span>
		<span>
	 		<input id="element_8_3" name="element_8_3" class="element text" size="4" maxlength="4" value="<?php echo $cep_tel[7].$cep_tel[8].$cep_tel[9].$cep_tel[10]?>" type="number" required>
			<label for="element_8_3">####</label>
		</span>
		 
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Email </label>
		<div>
			<input id="element_9" name="element_9" class="element text medium" type="email" maxlength="255" value="<?php echo $email?>"/> 
		</div> 
		</li>		
		<li id="li_15" >
		<label class="description" for="element_15">Başvurumu iptal et? </label>
		<span>
			<input id="element_15_1" name="element_15_1" class="element checkbox" type="checkbox"<?php echo ($is_active==0 ? 'checked' : '');?> />
<label class="choice" for="element_15_1">Evet</label>
		</li>
		<li id="li_14" >
		<label class="description" for="element_14">İletişim Bilgileri (Telefon numaralarınız) Gizlensin mi? </label>
		<span>
			<input id="element_14_1" name="element_14_1" class="element checkbox" type="checkbox" <?php echo ($is_visible==0 ? 'checked' : '');?> />
<label class="choice" for="element_14_1">Evet</label>

		</span><p class="guidelines" id="guide_14"><small>İletişim bilgilerinizin güvenliği açısından standart olarak sadece email adresinizi herkese açık sunuyoruz, eğer isterseniz gizlenmesin seçeneğiyle herkese açık yapabilir, yada güvenli olarak gönderilsin seçeneğini kullanabilirsiniz.

*Güvenli seçenek: Sizin iletişim bilgilerinize istekte bulunan kişilerin cep telefonuna numaralarınız iletilir ve  veritabanında kayıt altında tutulur bu bilgiler.</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="940683" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			E-DEVLET 2014</a>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>


