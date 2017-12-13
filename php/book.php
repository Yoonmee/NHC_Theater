<?php
include('config.php');

$user_id = $_POST['user_id'];
$screen_id = $_POST['screen_id'];

//price 갖고오기
$sql = "SELECT THEATERID FROM NHC_SCREEINGPLAY WHERE ID='{$screen_id}'";
$result = odbc_do($con, $sql);
$row = odbc_fetch_assoc($result);
$theater_id = $row['THEATERID'];

//2. screen's current book ++
$sql = "UPDATE NHC_SCREEINGPLAY SET CURRENTBOOK = CURRENTBOOK + 1 WHERE ID='{$screen_id}'";
$result = odbc_do($con, $sql);

//3. book 테이블에 추가
$sql = "INSERT INTO BOOK(USERID, THEATERID, PLAYID, BOOKTIME) VALUES ('{$user_id}', '{$theater_id}', '{$screen_id}', CURRENT_TIMESTAMP)";
$result = odbc_do($con, $sql);

odbc_close($con);
?>
