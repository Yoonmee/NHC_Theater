<?php
include('config.php');

//작업 성공 여부를 나타내는 flag
$success = true;


//트랜잭션 시작
$result = @mysqli_query($con, "SET AUTOCOMMIT=0");
$result = @mysqli_query($con, "BEGIN");


$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno())
{
  echo "Failed to connect to MariaDB: " . mysqli_connect_error();
}


$cash = $_POST['cash'];
$id = $_POST['user_id'];
$sql = "UPDATE user SET cash = cash + $cash WHERE id='$id'";
$result = @mysqli_query($con, $sql);
if (!$result || @mysqli_affeted_rows($result)==0)
  $success = false;


if (!$success) {
  $result = @mysqli_query("ROLLBACK", $con);
  echo "롤백되었습니다.";
} else {
  $result = @mysqli_query("COMMIT", $con);
  echo "입력되었습니다.";
}

mysqli_close($con);
?>
