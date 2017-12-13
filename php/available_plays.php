<?php
include('config.php');

$theater_id = $_POST['theater_id'];
$sql = "SELECT * FROM NHC_PLAY";
$result = odbc_do($con, $sql);
$rows = odbc_fetch_row($result);
echo json_encode($rows);

/*

while ($r = odbc_fetch_assoc($result)) {
  $rows[] = $r;
}

$plays = array();

foreach ($rows as $play) {
  $play_id = $play['PLAYID'];
  $sql = "SELECT * FROM NHC_SCREEINGPLAY WHERE THEATERID = '{$theater_id}' AND PLAYID = '{$play_id}'";
  $result = odbc_do($con, $sql);

  //if 0 -> add movie
  $num_rows = odbc_num_rows($result);
  if (!$num_rows) {
    $plays[] = $play;
  }
}

echo json_encode($plays);
*/
odbc_close($con);
?>
