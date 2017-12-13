<?php

require 'PHPMailerAutoload.php';

function SendMail( $ToEmail, $MessageHTML, $MessageTEXT ) {
  require_once ( 'class.phpmailer.php' ); // Add the path as appropriate
  $Mail = new PHPMailer();
  $Mail->IsSMTP(); // Use SMTP
  $Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
  $Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
  $Mail->SMTPAuth    = TRUE; // enable SMTP authentication
  $Mail->SMTPSecure  = "tls"; //Secure conection
  $Mail->Port        = 587; // set the SMTP port
  $Mail->Username    = 'ymhwang119@gmail.com'; // SMTP account username
  $Mail->Password    = 'gkrtmqrl11'; // SMTP account password
  $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
  $Mail->CharSet     = 'UTF-8';
  $Mail->Encoding    = '8bit';
  $Mail->Subject     = '예매내역 발송';
  $Mail->ContentType = 'text/html; charset=utf-8\r\n';
  $Mail->From        = 'ymhwang119@gmail.com';
  $Mail->FromName    = 'NHC_Theater Admin';
  $Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

  $Mail->AddAddress( $ToEmail ); // To:
  $Mail->isHTML( TRUE );
  $Mail->Body    = $MessageHTML;
  $Mail->AltBody = $MessageTEXT;
  $Mail->Send();
  $Mail->SmtpClose();

  if ( $Mail->IsError() ) { // ADDED - This error checking was missing
    return FALSE;
  }
  else {
    return TRUE;
  }
}
//
// $ToEmail = $_POST['user_email'];
// $ToName  = $_POST['user_name'];
// $MessageHTML = $_POST['user_name'].'예매내역';
// $MessageTEXT = "test";
$ToEmail = "ymhwang119@naver.com";
$ToName  = "yonnmee";
$MessageHTML = "gg";
$MessageTEXT = "test";


$Send = SendMail( $ToEmail, $MessageHTML, $MessageTEXT );
if ( $Send ) {
  echo "<h2> Sent OK</h2>";
}
else {
  echo "<h2> ERROR</h2>";
}
die;
?>
