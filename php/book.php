
<?php

include('config.php');

$user_id = $_POST['user_id'];
$screen_id = $_POST['screen_id'];

//price 갖고오기
$sql = "SELECT PLAYID, THEATERID FROM NHC_SCREENINGPLAY WHERE ID='{$screen_id}'";
$result = odbc_do($con, $sql);
//$row = odbc_fetch_assoc($result);

while(odbc_fetch_row($result))
{
  $play_id = odbc_result($result, 1);
  $theater_id = odbc_result($result, 2);
}

echo $play_id;

$sql = "SELECT PRICE FROM NHC_PLAY WHERE ID='{$play_id}'";
$result = odbc_do($con, $sql);

while(odbc_fetch_row($result))
{
  $price = odbc_result($result, 1);
}

$sql = "UPDATE NHC_USER SET cash = cash - $price WHERE id='$user_id'";
$result = odbc_do($con, $sql);

//2. screen's current book ++
//$sql = "UPDATE NHC_SCREENINGPLAY SET CURRENTBOOK = CURRENTBOOK + 1 WHERE ID='{$screen_id}'";
//$result = odbc_do($con, $sql);

$sql1 = "SELECT * FROM NHC_SCREENINGPLAY";
$result1 = odbc_do($con, $sql1);
$num = odbc_num_rows($result1);

$booktime = date("Ymd");
//3. book 테이블에 추가
$sql = "INSERT INTO NHC_BOOK(ID, USERID, THEATERID, PLAYID, BOOKTIME) VALUES ('{$num}', '{$user_id}', '{$theater_id}', '{$screen_id}', '{$booktime}')";
$result = odbc_do($con, $sql);

if($result)
{
  echo "성공";
}


//$reserve_num = $user_id.'01'.$theater_id.'02'.$playe_id.'03'.$booktime;
//echo("<script language='javascript'>sendmail($reserve_num);</script>");



odbc_close($con);

//header("Refresh:0; url=../php/update_user_session.php");
?>
