<script>
function sendmail(input){
post("../php/sendmail.php",
{user_id: "<?php echo $_SESSION['user_id']; ?>",
  user_name: "<?php echo $_SESSION['user_name']; ?>",
  user_email: "<?php echo $_SESSION['user_email']; ?>",
   reserve_num: input} );
}
</script>

<?php
include('config.php');

$user_id = $_POST['user_id'];
$screen_id = $_POST['screen_id'];

//price 갖고오기
$sql = "SELECT THEATERID FROM NHC_SCREEINGPLAY WHERE ID='{$screen_id}'";
$result = odbc_do($con, $sql);
$row = odbc_fetch_assoc($result);
$theater_id = $row['THEATERID'];

//2. screen's current book ++
$sql = "UPDATE NHC_SCREEINGPLAY SET CURRENTBOOK = CURRENTBOOK + 1 WHERE ID='{$screen_id}'";
$result = odbc_do($con, $sql);

$booktime = CURRENT_TIMESTAMP;
//3. book 테이블에 추가
$sql = "INSERT INTO BOOK(USERID, THEATERID, PLAYID, BOOKTIME) VALUES ('{$user_id}', '{$theater_id}', '{$screen_id}', '{$booktime}')";
$result = odbc_do($con, $sql);

$reserve_num = $user_id.'01'.$theater_id.'02'.$playe_id.'03'.$booktime;
echo("<script language='javascript'>sendmail($reserve_num);</script>"); 



odbc_close($con);
?>
