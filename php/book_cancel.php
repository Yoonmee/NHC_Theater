<?php
include('config.php');

$user_id = $_POST['user_id'];
$book_id = $_POST['book_id'];

//screen id 갖고오기
$sql = "SELECT SCREENID FROM BOOK WHERE ID='{$book_id}'";
$result = odbc_do($con, $sql);
$row = odbc_fetch_assoc($result);
$screen_id = $row['SCREENID'];

//price 갖고오기
$sql = "SELECT PRICE FROM NHC_SCREEINGPLAY WHERE ID='{$screen_id}'";
$result = odbc_query($con, $sql);
$row = odbc_fetch_assoc($result);
$price = $row['PRICE'];



//1. book에서 삭제
$sql = "DELETE FROM NHC_BOOK WHERE ID='{$book_id}'";
$result = odbc_do($con, $sql);

//3. screen's current book --
$sql = "UPDATE NHC_SCREEINGPLAY SET CURRENTBOOK = CURRENTBOOK -1 WHERE ID='{$screen_id}'";
$result = odbc_do($con, $sql);

odbc_close($con);
?>
