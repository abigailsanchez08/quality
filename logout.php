<?php
@session_start();
session_destroy();
header("Location:index.php");
$Usuario=NULL;
$Password=NULL;
?>