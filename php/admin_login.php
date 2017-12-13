<?php
include('config.php');

$user_id = $_POST['inputID'];
$user_pw = $_POST['inputPassword'];
if(!isset($user_id) || !isset($user_pw))
   exit;

//find
$sql = "SELECT * FROM NHC_USER WHERE TYPE='2' and ID='$user_id' AND PASSWORD='$user_pw'";
$result = odbc_do($con, $sql);
$admin = odbc_fetch_row($result);

if (!isset($admin)) {
   echo "<script>alert('Admin Login failed.');history.back();</script>";
   exit;
}

$_SESSION['admin'] = $admin;

odbc_close($con);

header("Refresh:0; url=../admin/");
?>
