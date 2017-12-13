<?php

  if(!isset($_POST['ID']) || !isset($_POST['Password'])
        || !isset($_POST['Name']) || !isset($_POST['Phone'])){
    echo "<meta http-equiv='refresh' content='0;url=ymlogin.php'>";
    exit;
  }

  include("config.php");

  $sql = "INSERT INTO NHC_USER (ID, PASSWORD, NAME, PHONE) VALUES('".$_POST['ID']."', '".$_POST['Password']."','".$_POST['Name']."','".$_POST['Phone']."')";
  $result = odbc_exec($con, $sql);
 ?>

<meta http-equiv="refresh" content="0;url=../index.php">
