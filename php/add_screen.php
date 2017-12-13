<?php
include('config.php');

$play_id = $_POST['play_id'];
$theater_id = $_POST['theater_id'];
$price = $_POST['price'];
$seats = $_POST['seats'];
$time = $_POST['time'];

$screen_time = strtotime($time);

$sql = "INSERT INTO NHC_SCREEINGPLAY(PLAYID,THEATERID, MAXBOOK, PRICE, SCREENTIME) VALUES ('{$play_id}', '{$theater_id}', '{$seats}', '{$price}', '{$screen_time}')";
$result = odbc_do($con, $sql);

odbc_close($con);
?>
