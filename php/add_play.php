<?php
include('config.php');

$play_id = $_POST['play_id'];
$play_name = $_POST['play_name'];
$runningtime = $_POST['runningtime'];
$price = $_POST['price'];

//$screen_time = date("Y-m-d", strtotime($runningtime));

//echo mb_internal_encoding();
//$play_name = mb_convert_encoding ( $play_name , "UTF-16" );
$sql = "INSERT INTO NHC_PLAY(ID, NAME, RUNNINGTIME, PRICE) VALUES ('{$play_id}', '{$play_name}', '{$runningtime}', '{$price}')";

echo $sql;
$result = odbc_do($con, $sql);
if(!$result)
{
  echo "not result";
}
else {
  echo "$result";
  echo odbc_num_rows($result);
}


odbc_close($con);
?>

<meta http-equiv="refresh" content="0;url=../admin/index.php">
