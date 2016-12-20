<?php
include ( "account.php"    );
($dbh = mysql_connect($hostname, $username, $password)
        or die("Unable to connect"));
mysql_select_db ($project);
//$_GET[] is an array.
$user    = $_POST["user"];
$pass     = $_POST["pass"];
//echo "Hello";
echo $user;
echo $pass;
$s="Select * from Users where UserID = '$user' and Password='$pass'";
$t = mysql_query( $s) or die (mysql_error());
if (mysql_num_rows($t)>0){
	header('location:http://localhost/index.php');
}
else{
	echo "<script type='text/javascript'>alert('Wrong password or User Name')</script>";
	header('refresh: 0 url = http://localhost/login.php');
}
?>
