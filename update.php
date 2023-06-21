<?php
require "layout/header.php";
require "users/users.php";

if (!isset($_GET["id"])) {
  require "layout/not_found.php";
  exit();
}

$userId = $_GET["id"];
$user = getUserById($userId);

$formErrors = [
  "name" => "",
  "username" => "",
  "email" => "",
  "phone" => "",
  "website" => "",
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $user = array_merge($user, $_POST);

  $isvalid = validateUser($user, $formErrors);

  if ($isvalid) {
    $user = updateUser($_POST, $userId);
    if ($_FILES['pircture']["error"] == 0) {
      uploadImage($_FILES['pircture'], $user);
    }
    session_start();
    $_SESSION["msg"] = "😊 Updated Successfuly";
    header("Location: index.php");
    exit();
  }
}


if (!$user) {
  require "layout/not_found.php";
  exit();
}
?>



<div class="update pt-5 pb-5">
  <?php include "_form.php" ?>
</div>

<?php
require "layout/footer.php";
