
<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

$connection = mysql_connect("localhost", "root", "**");
mysql_query("SET NAMES 'utf8'");

// Selecting Database
$db = mysql_select_db("edevlet", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User

$ses_sql=mysql_query("select tc_no,Ad,Soyad,is_superuser from vatandas_kimlik where tc_no='$user_check'", $connection);

$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['tc_no'];
$login_session_name =$row['Ad'];
$login_session_lastname =$row['Soyad'];
$login_session_usermod =$row['is_superuser'];

$ses_sql2=mysql_query("select is_active from bakici where tc_no='$user_check'", $connection);
$row2 = mysql_fetch_assoc($ses_sql2);
$login_session_bakici =$row2['is_active'];

$ses_sql_bakici=mysql_query("select il,ilce,mah from adres where tc_no='$user_check'", $connection);
$row3 = mysql_fetch_assoc($ses_sql_bakici);
$basvur_session_bakici_il = $row3['il'];
$basvur_session_bakici_ilce =$row3['ilce'];
$basvur_session_bakici_mah =$row3['mah'];


if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location:../login/index.php'); // Redirecting To Home Page
}
?>
