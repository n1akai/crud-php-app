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
?>

<div class="user pt-5 pb-5">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3 class="h3">View User: <?= $user["username"] ?></h3>
      </div>
      <div class="table-responsive">
        <table class="table m-0">
          <tbody>
            <tr>
              <th>Name:</th>
              <td><?= $user['name'] ?></td>
            </tr>
            <tr>
              <th>Username:</th>
              <td><?= $user['username'] ?></td>
            </tr>
            <tr>
              <th>Email:</th>
              <td><?= $user['email'] ?></td>
            </tr>
            <tr>
              <th>Phone:</th>
              <td><?= $user['phone'] ?></td>
            </tr>
            <tr>
              <th>Website:</th>
              <td><a href='http://<?= $user['website'] ?>' target='__blank'><?= $user['website'] ?></a></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-body">
        <a class="btn btn-success" href="update.php?id=<?= $user["id"] ?>" role="button">Update</a>
        <a class="btn btn-danger" href="delete.php?id=<?= $user["id"] ?>" role="button">Delete</a>
      </div>
    </div>
  </div>
</div>

<?php
require "layout/footer.php";
