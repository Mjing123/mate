<?php
require_once("../conf/config.php");
$card = @$_POST["card"];
$password = @$_POST["password"];
$passwd = "";
$respond = 0;

$con = mysql_connect($sql_link_host, $sql_link_username, $sql_link_password);
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_query("SET names utf8");

mysql_select_db($sql_link_db, $con);

$sql = "SELECT * FROM account WHERE card=" . $card;

if($card != ""){
$result = mysql_query($sql);


while ($row = mysql_fetch_array($result)){
    $passwd = $row['password'];
}

if($password == $passwd){
    $respond = 1;
}
else{
    $respond = 0;
}
}
$info_json = json_encode($respond);
echo $info_json;
mysql_close($con);
?>