<?php echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n"; ?>

<?php

include "sendmail.php";

$sendmail = new Sendmail();

$to="ymhwang119@naver.com";
$from="Master";
$subject="메일 제목입니다.";
$body="메일 내용입니다.";

$sendmail->send_mail($to, $from, $subject, $body);




 ?>
