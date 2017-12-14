<?php
include('config.php');

$play_id = $_POST['play_id'];
$theater_id = $_POST['theater_id'];
//$price = $_POST['price'];
//$seats = $_POST['seats'];
//$time = $_POST['time'];

//$screen_time = strtotime($time);

$sql1 = "SELECT * FROM NHC_SCREENINGPLAY";
$result1 = odbc_do($con, $sql1);
$num = odbc_num_rows($result1);

$sql2 = "INSERT INTO NHC_SCREENINGPLAY(ID,PLAYID,THEATERID) VALUES ('{$num}', '{$play_id}', '{$theater_id}')";
$result2 = odbc_do($con, $sql2);

odbc_close($con);
?>
