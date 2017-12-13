<?php
include('config.php');

$user_id = $_POST['inputID'];
$user_pw = $_POST['inputPassword'];
if(!isset($user_id) || !isset($user_pw))
   exit;

//find
$sql = "SELECT * FROM NHC_USER WHERE TYPE=2 and ID='$user_id' AND PASSWORD='$user_pw'";
$result = odbc_exec($con, $sql) or die(odbc_errormsg());

if(!$result)
{
  echo "not result";
}
else {
  echo "$result";
  echo odbc_num_rows($result);
}

while(odbc_fetch_row($result))
{
  $id = odbc_result($result, 1);
  $name = odbc_result($result, 4);
}

$admin = odbc_fetch_array($result);

if (!isset($admin)) {
   echo "<script>alert('Admin Login failed.');history.back();</script>";
   exit;
}

$_SESSION['admin_id'] = $id;
$_SESSION['admin_name'] = $name;

odbc_close($con);

header("Refresh:0; url=../admin/");
?>
