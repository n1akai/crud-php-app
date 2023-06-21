<div class="container">
  <div class="card">
    <div class="card-header">
      <h3 class="h3">
        <?php
        if ($user['id']) {
          echo "Update User: {$user['username']}";
        } else {
          echo "Add new User";
        }
        ?>
      </h3>
    </div>
    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="name" value="<?= $user["name"] ?>" class="form-control <?= $formErrors["name"] ? "is-invalid" : "" ?>">
          <div class="invalid-feedback">
            <?= $formErrors["name"] ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" value="<?= $user["username"] ?>" class="form-control <?= $formErrors["username"] ? "is-invalid" : "" ?>">
          <div class="invalid-feedback">
            <?= $formErrors["username"] ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="text" name="email" value="<?= $user["email"] ?>" class="form-control <?= $formErrors["email"] ? "is-invalid" : "" ?>">
          <div class="invalid-feedback">
            <?= $formErrors["email"] ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Phone</label>
          <input type="text" name="phone" value="<?= $user["phone"] ?>" class="form-control <?= $formErrors["phone"] ? "is-invalid" : "" ?>">
          <div class="invalid-feedback">
            <?= $formErrors["phone"] ?>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Website</label>
          <input type="text" name="website" value="<?= $user["website"] ?>" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" name="pircture" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>