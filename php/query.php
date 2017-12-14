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

while(odbc_fetch_row($result))
{
  $id = odbc_result($result, 1);
  $theaterid = odbc_result($result, 2);
  $playid = odbc_result($result, 3);
  $screentime = odbc_result($result, 4);
  $price = odbc_result($result, 5);
/*
  echo $id;
  echo $name;
  echo $runningtime;
  echo $price;*/
  $obj = array("ID"=>$id, "THEATERID"=>$theaterid, "PLAYID"=>$playid, "SCREENTIME"=>$screentime, "PRICE"=>$price);
  $rows[] = $obj;
}
/*
while ($r = @odbc_fetch_row($result)) {
  $rows[] = $r;
}
*/
echo json_encode($rows);
odbc_close($con);
?>
