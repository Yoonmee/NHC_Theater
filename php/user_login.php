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
  exit;
}
else {
  echo "$result";
  echo odbc_num_rows($result);
}

while(odbc_fetch_row($result))
{
  $id = odbc_result($result, 1);
  $name = odbc_result($result, 4);
  $email = odbc_result($result, 5);
  $grade = odbc_result($result, 7);
  $cash = odbc_result($result, 8);
}

$user = odbc_fetch_array($result);

$_SESSION['user_id'] = $id;
$_SESSION['user_name'] = $name;
$_SESSION['user_email'] = $email;
$_SESSION['user_grade'] = $grade;
$_SESSION['user_cash'] = $cash;

echo $_SESSION['user_id'];
echo $_SESSION['user_name'];
echo $_SESSION['user_email'];
echo $_SESSION['user_grade'];
echo $_SESSION['user_cash'];

if (!isset($user)) {
  echo "<script>alert('User Login failed.');history.back();</script>";
  exit;
}

odbc_close($con);

//header("Refresh:0; url=../user/");
?>
