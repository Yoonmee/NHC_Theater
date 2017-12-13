<?php
include('config.php');

$play_id = $_POST['play_id'];
$play_name = $_POST['play_name'];
$runningtime = $_POST['runningtime'];
$price = $_POST['price'];

$screen_time = strtotime($runningtime);

$sql = "INSERT INTO NHC_PLAY(ID, NAME, RUNNINGTIME, PRICE) VALUES ('{$play_id}', '{$play_name}', '{$screen_time}', '{$price}')";
$result = odbc_exec($con, $sql);
echo "$result";

odbc_close($con);
?>
<!--
<meta http-equiv="refresh" content="0;url=../admin/index.php">
-->
