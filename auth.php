<?php
session_start ();
mysql_pconnect(localhost, root, Sobkoviak96, logIn) or die("No connection found");
include 'global_settings.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysql_query("SELECT * FROM loginInfo WHERE username='$username' AND password='$password'");
$checkCred = mysql_num_rows($sql);

if($checkCred > 0){
	while($row = mysql_fetch_array($sql)){
		foreach($row as $key => $val){
			$$key = stripslashes($val);
		}
		session_register('client_logged_in');
		header("Location: Login_success.php");
	}
}
else {
	echo "Login failed: Either your password was incorrect your account has not yet been created.";
}

?>