<?php
require "layout/header.php";
require "users/users.php";
$users = getUsers();
?>

<body>
  <div class="users pt-5 pb-5">
    <div class="container">
      <?php
      session_start();
      if (isset($_SESSION["msg"])) {
        echo "<div class='alert alert-success'>{$_SESSION["msg"]}</div>";
        unset($_SESSION["msg"]);
      }
      ?>
      <div class="pb-4">
        <a class="btn btn-success" href="create.php" role="button">Add new User</a>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Website</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($users as $user) {
              echo "<tr>";
              if (isset($user["extention"])) {
                echo "<td><img class='img-fluid rounded' style='width: 70px; height:70px' src='users/img/{$user['id']}.{$user['extention']}'></td>";
              } else {
                echo "<td></td>";
              }
              echo "<td>{$user['name']}</td>";
              echo "<td>{$user['username']}</td>";
              echo "<td>{$user['email']}</td>";
              echo "<td>{$user['phone']}</td>";
              echo "<td><a href='http://{$user['website']}' target='__blank'>{$user['website']}</a></td>";
              echo "<td>
                    <a href='view.php?id={$user['id']}' class='btn btn-sm btn-primary'>View</a>
                    <a href='update.php?id={$user['id']}' class='btn btn-sm btn-success'>Update</a>
                    <a href='delete.php?id={$user['id']}' class='btn btn-sm btn-danger'>Delete</a>
              </td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php
  require "layout/footer.php";
  ?>
</body>

</html>