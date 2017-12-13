<?php

  if(!isset($_POST['ID']) || !isset($_POST['Password'])
        || !isset($_POST['Name']) || !isset($_POST['Email'])){
    echo "<meta http-equiv='refresh' content='0;url=ymlogin.php'>";
    exit;
  }

  include("config.php");

  $sql = "INSERT INTO NHC_USER (ID, PASSWORD, NAME, EMAIL) VALUES('".$_POST['ID']."', '".$_POST['Password']."','".$_POST['Name']."','".$_POST['Email']."')";
  $result = odbc_exec($con, $sql);
 ?>

<meta http-equiv="refresh" content="0;url=../index.php">
