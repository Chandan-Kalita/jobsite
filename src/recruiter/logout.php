<?php
session_start();
session_destroy();
include '../inc/function.inc.php';
redirect('login.php');
echo 1;
?>