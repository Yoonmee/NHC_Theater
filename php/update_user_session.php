<?php
include('config.php');
//
// $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MariaDB: " . mysqli_connect_error();
// }

$user_id = $_SESSION['user_id'];
if(!isset($user_id))
  exit;

//find
$sql = "SELECT * FROM NHC_USER WHERE ID='$user_id'";
$result = odbc_do($con, $sql);

while(odbc_fetch_row($result))
{
  $id = odbc_result($result, 1);
  $name = odbc_result($result, 4);
  $email = odbc_result($result, 5);
  $grade = odbc_result($result, 7);
  $cash = odbc_result($result, 8);
}

$user = odbc_fetch_array($result);

if (!isset($user)) {
  echo "<script>alert('User Session Update failed.');history.back();</script>";
  exit;
}


$_SESSION['user_id'] = $id;
$_SESSION['user_name'] = $name;
$_SESSION['user_email'] = $email;
$_SESSION['user_grade'] = $grade;
$_SESSION['user_cash'] = $cash;

odbc_close($con);

header("Refresh:0; url=../user/");
?>
