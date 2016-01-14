<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>HOŞGELDİNİZ</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Merhaba : <i><?php echo $login_session_name." ".$login_session_lastname." ".$login_session; ?></i> <?php echo date("d/m/Y G:i:s") ?></b>
<br><br>
<b id="menu">
<a href="../basvur/index.php">BAKICI OLMAK İÇİN BAŞVUR</a>
<br>
<br><a href="../ara/index.php">BAKICI ARA</a>
<?php if ($login_session_usermod == 1): ?>
<br><a href="../admin/index.php">YÖNETİM MODÜLÜ</a>
<?php endif; ?>

<br><?php if ($login_session_bakici == 1): ?>
<br><a href="../basvur/yonet.php">BAKICILIK BAŞVURUM</a></b>
<?php endif; ?>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>
