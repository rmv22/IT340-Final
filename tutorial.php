<!DOCTYPE html>
<html>
<body>
<?php 
include ( "account.php" );
$rows = array();
($dbh = mysql_connect($hostname, $username, $password)
        or die("Unable to connect"));
mysql_select_db ($project); 
$selected_category = $_GET['category'];
$s="Select * from Videos where ClassName = '$selected_category'";
$t = mysql_query( $s) or die (mysql_error());
$count = mysql_num_rows($t);
while($count>0){
  $rows[]=mysql_fetch_assoc($t);
  $count=$count-1;
}
$items=$rows;
foreach ($items as $item){
    $VideoLink=$item['VideoLink'];
    echo $VideoLink;
}
?>
</body>
</html>

