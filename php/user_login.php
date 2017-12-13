<?php
include("config.php");

// $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
// if (mysqli_connect_errno())
// {
//   echo "Failed to connect to MariaDB: " . mysqli_connect_error();
// }

$user_id = $_POST['inputID'];
$user_pw = $_POST['inputPassword'];
if(!isset($user_id) || !isset($user_pw))
  exit;

//find
$sql = "SELECT * FROM NHC_USER WHERE id='{$user_id}' AND password='{$user_pw}'";
$result = odbc_exec($con, $sql);
//$user = odbc_fetch_row($result);
if(!$result)
{
  echo "not result";
}

while(odbc_fetch_row($result))
{
  $ID = odbc_result($result, 1);
  $PW = odbc_result($result, 2);

  echo "$ID $PW";
}





/*
if (!isset($user)) {
  echo "<script>alert('User Login failed.');history.back();</script>";
  exit;
}
*/

$_SESSION['user'] = $user;

odbc_close($con);

//header("Refresh:0; url=../user/");
?>
