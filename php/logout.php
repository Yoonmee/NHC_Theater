<?php
//logout
if(session_destroy())
{
    header("Location: ../index.php");
}
?>
