<?php include('../login/session.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Arama Formu</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container_form">
	
		<h1><a>Arama Formu</a></h1>
<form method="POST" action="ara.php" name="kayitform" id="kayitform">
					<div class="form_description">
			<h2>Arama Formu</h2>
			<p>Burdan gereksinim duyduğunuz bakıcıyı arayabilirsiniz.</p>
		</div>						
			<ul >
			
					<li id="li_2" >
		<label class="description" for="element_2">İl </label>
		<div>
		<select class="element select medium" id="element_2" name="element_2"> 
			<option value="" selected="selected" ></option>
<option value="1" >ESKİŞEHİR</option>
<option value="2" >ANKARA</option>
<option value="3" >İSTANBUL</option>

		</select>
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">İlçe </label>
		<div>
		<select class="element select medium" id="element_3" name="element_3"> 
			<option value="" selected="selected"></option>
<option value="1" >Tepebaşı</option>
<option value="2" >Odunpazarı</option>
<option value="3" >Sivrihisar</option>

		</select>
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Mahalle </label>
		<div>
		<select class="element select medium" id="element_4" name="element_4"> 
			<option value="" selected="selected"></option>
<option value="1" >Büyükdere</option>
<option value="2" >Şirintepe</option>
<option value="3" >Batıkent</option>

		</select>
		</div> 
		</li>		<li id="li_1" >
		<label class="description" for="element_1">Eğitim Durumu </label>
		<div>
		<select class="element select medium" id="element_1" name="element_1"> 

<option value="1" >Farketmez</option>
<option value="2" >Üniversite</option>
<option value="3" >Lise</option>
<option value="4" >İlkokul</option>

		</select>
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Yaş Aralığı Giriniz</label>
		<div>
			<input id="element_5" name="element_5" class="element text small" type="number" maxlength="255" value="" required>
			<p></p>
			<input id="element_5_2" name="element_5_2" class="element text small" type="number" maxlength="255" value="" required>
<!--		<select class="element select medium" id="element_5" name="element_5"> 
			<option value="" selected="selected"></option>
<option value="1" >Farketmez</option> 
<option value="2" >18-25 yaşları arasında</option>
<option value="3" >25-35 yaşları arasında</option>
<option value="4" >35-55 yaşları arasında</option>
<option value="5" >55 üstü</option>

		</select>-->
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Cinsiyet </label>
		<div>
		<select class="element select medium" id="element_6" name="element_6"> 

<option value="1" >Farketmez</option>
<option value="2" >Kadın</option>
<option value="3" >Erkek</option>

		</select>
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Tecrübeli Mi? </label>
		<div>
		<select class="element select medium" id="element_7" name="element_7"> 

<option value="1" >Farketmez</option>
<option value="2" >Evet</option>

		</select>
		</div> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Dini </label>
		<div>
		<select class="element select medium" id="element_8" name="element_8"> 

<option value="1" >Farketmez</option>
<option value="2" >İslam</option>
<option value="3" >Hristiyan</option>
<option value="4" >Yahudi</option>
<option value="5" >Ateist</option>

		</select>
		</div> 
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Çalışma Süresi </label>
		<div>
		<select class="element select medium" id="element_9" name="element_9"> 

<option value="1" >Gündüz</option>
<option value="2" >Gece</option>
<option value="3" >Yatılı</option>

		</select>
		</div> 
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Kendi çocuğu olmalı mı? </label>
		<div>
		<select class="element select medium" id="element_10" name="element_10"> 

<option value="1" >Farketmez</option>
<option value="2" >Evet</option>

		</select>
		</div><p class="guidelines" id="guide_10"><small>Aranan bakıcının kendine ait çocuğu var mı yok mu bilgisi.</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="942455" />
			    
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
