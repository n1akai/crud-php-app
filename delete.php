<?php
require "layout/header.php";
require "users/users.php";

if (!isset($_GET["id"])) {
  require "layout/not_found.php";
  exit();
}

$userId = $_GET["id"];

$user = getUserById($userId);
if (!$user) {
  require "layout/not_found.php";
  exit();
}

deleteUser($userId);
session_start();
$_SESSION["msg"] = "😊 Deleted Successfuly";
header("Location: index.php");
exit();
