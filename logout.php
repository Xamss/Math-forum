<?php
session_start();
unset($_SESSION['signed_in']);
header("location: login.php");
?>