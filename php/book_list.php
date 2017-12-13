<?php
include('config.php');

$user_id = $_POST['id'];
$sql = "SELECT * FROM NHC_BOOK WHERE USERID = '{$user_id}'";
$result = odbc_do($con, $sql);
$rows = array();

while ($r = odbc_fetch_assoc($result)) {
  $rows[] = $r;
}

echo json_encode($rows);
odbc_close($con);
?>
