<?php

include ( "account.php");
($dbh = mysql_connect($hostname, $username, $password)
        or die("Unable to connect"));
mysql_select_db ($project);
$firstName  = $_POST["firstName"];
$lastName   = $_POST["lastName"];
$userID  = $_POST["userID"];
$password   = $_POST["password"];
$major  = $_POST["major"];
$s = "select * from Users where UserID = '$userID'";
$t = mysql_query( $s) or die (mysql_error());
echo mysql_num_rows($t);
if (mysql_num_rows($t)>0){
	echo "<script type='text/javascript'>alert('Existing user. Please Login')</script>";
	header('refresh: 0 url = http://localhost/login.php');
}
else{
	$sql = "Insert into Users values('', '$firstName', '$lastName', '$major','$userID', '$password')";
$t = mysql_query( $sql) or die (mysql_error());
	header('refresh: 0 url = http://localhost/index.php');
}
?>
