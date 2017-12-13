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
$user = odbc_fetch_row($result);

if (!isset($user)) {
  echo "<script>alert('User Session Update failed.');history.back();</script>";
  exit;
}

$_SESSION['user_id'] = $user_id;

odbc_close($con);

header("Refresh:0; url=../user/");
?>
