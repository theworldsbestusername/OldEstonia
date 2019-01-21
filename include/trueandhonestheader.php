<?php
session_start();
error_reporting(0);
include_once($_SERVER["DOCUMENT_ROOT"] . "/include/dbconnect.php");
$username = $_SESSION["username"];
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];
?>