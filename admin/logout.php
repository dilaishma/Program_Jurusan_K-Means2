<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['akses']);
session_destroy();
header("Location:../index.php");
?>