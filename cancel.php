<?php
$uid = $_GET['id'];
$sid = $_GET['seat_id'];
$bid = $_GET['train_id'];
$traint = $bid."train";
$delete = $_GET['did'];
require("config.php");

$query = mysql_query("delete from user_history where id = '$delete'");

echo $query1 = mysql_query("update $traint set status = 'Available' where id = '$sid'");
header("location:myticket.php?id=$uid");
?>