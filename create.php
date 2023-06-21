<?php
require "layout/header.php";
require "users/users.php";

$user = [
  "id" => "",
  "name" => "",
  "username" => "",
  "email" => "",
  "phone" => "",
  "website" => "",
];

$formErrors = [
  "name" => "",
  "username" => "",
  "email" => "",
  "phone" => "",
  "website" => "",
];

$isvalid = true;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $user = array_merge($user, $_POST);

  $isvalid = validateUser($formErrors, $formErrors);

  if ($isvalid) {
    $user = createUser($_POST);

    if ($_FILES['pircture']["error"] == 0) {
      uploadImage($_FILES['pircture'], $user);
    }
    session_start();
    $_SESSION["msg"] = "😊 Added Successfuly";
    header("Location: index.php");
    exit();
  }
}





?>

<div class="create pt-5 pb-5">
  <?php include "_form.php" ?>
</div>

<?php
require "layout/footer.php";
