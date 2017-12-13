<?php
include('config.php');

//작업 성공 여부를 나타내는 flag
$success = true;


//트랜잭션 시작
$result = @odbc_do($con, "SET AUTOCOMMIT=0");
$result = @odbc_do($con, "BEGIN");

//
// $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
// if (mysqli_connect_errno())
// {
//   echo "Failed to connect to MariaDB: " . mysqli_connect_error();
// }


$cash = $_POST['cash'];
$id = $_POST['user_id'];
$sql = "UPDATE NHC_USER SET cash = cash + $cash WHERE id='$id'";
$result = @odbc_do($con, $sql);
if (!$result || @odbc_fetch_row($result)==0)
  $success = false;


if (!$success) {
  $result = @odbc_do("ROLLBACK", $con);
  echo "롤백되었습니다.";
} else {
  $result = @odbc_do("COMMIT", $con);
  echo "입력되었습니다.";
}

odbc_close($con);
?>
