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
$result = odbc_exec($con, $sql) or die(odbc_errormsg());
;
//$user = odbc_fetch_row($result);
if(!$result)
{
  echo "not result";
}
else {
  echo "$result";
  echo odbc_num_rows($result);
}

$user = array();

while($r = odbc_fetch_row($result))
{
  $user[] = $r;
  //echo "$ID $PW";
}

echo"$user['ID']";

$_SESSION['user'] = $user;


if (!isset($user)) {
  echo "<script>alert('User Login failed.');history.back();</script>";
  exit;
}

odbc_close($con);

//header("Refresh:0; url=../user/");
?>
