<?php

session_start();

if ((isset($_SESSION['login_user']))) {

header ("Location: profile.php");

}
include('login.php'); // Includes Login Script
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>E-DEVLET GİRİŞ SAYFASI</title>
<link href="style2.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>E-DEVLET GİRİŞ SAYFASI</h1>
<div id="form_container">
<div id="login">
<h2>Login Form</h2>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>
