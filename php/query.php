<?php
include('config.php');

// $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
// if (mysqli_connect_errno())
// {
//   echo "Failed to connect to MariaDB: " . mysqli_connect_error();
// }


$query = $_POST['query'];
$result = @odbc_do($con, $query);
$rows = array();

while ($r = @odbc_fetch_row($result)) {
  $rows[] = $r;
}

echo json_encode($rows);
odbc_close($con);
?>
