<?php
$con = odbc_connect('TIBERO', 'HR', 'tibero');

if (!$con)
{
  echo "Failed to connect to TIBERODB: ";
}
?>
