<?php
  session_start();

  if(!isset($_POST['ID']) || !isset($_POST['Password'])
        || !isset($_POST['Name']) || !isset($_POST['Phone'])){
    echo "<meta http-equiv='refresh' content='0;url=ymlogin.php'>";
    exit;
  }

  include("config.php");

  $sql = "INSERT INTO NHC_USER (ID, PASSWORD, TYPE, NAME, PHONE, PAYNUM, GRADE) VALUES('".$_POST['name']."', '".$_POST['ID']."', '".$_POST['PW']."','".$_POST['Email']."')";
  $result = mysqli_query($conn, $sql);

 ?>
