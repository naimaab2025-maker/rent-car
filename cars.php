<?php
session_start();
require_once "includes/conn.php";
require_once "includes/sidebar.php";

// DELETE CAR
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM cars WHERE car_id=$id");
}

// SAVE CAR
if (isset($_POST['save'])) {
  $taariko = $_POST['taariko'];
  $color = $_POST['color'];
  $model = $_POST['model'];
  $status = $_POST['status'];
  $payment = $_POST['payment'];

  $sql = "INSERT INTO cars (taariko, color, model, status, payment)
  VALUES ('$taariko', '$color', '$model', '$status', '$payment')";
  mysqli_query($conn, $sql);
}

// FETCH FOR EDIT
$editData = null;
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $result = mysqli_query($conn, "SELECT * FROM cars WHERE car_id=$id");
  $editData = mysqli_fetch_assoc($result);
}

// UPDATE CAR
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $taariko = $_POST['taariko'];
  $color = $_POST['color'];
  $model = $_POST['model'];
  $status = $_POST['status'];
  $payment = $_POST['payment'];

  $result = mysqli_query($conn, "UPDATE cars SET
    taariko='$taariko',
    color='$color',
    model='$model',
    status='$status',
    payment='$payment'
    WHERE car_id=$id");
}
?>

<div class="container-fluid">

  <!-- 1. ADD BUTTON: Shows only when form is hidden -->
  <?php if (!isset($_GET['add']) && !$editData) { ?>
    <a href="?add=1" class="btn btn-primary mb-3">Add New Car</a>
  <?php } ?>

  <!-- 2. FORM: Opens only if 'add' or 'edit' is active -->
  <?php if (isset($_GET['add']) || $editData) { ?>
    <div class="card">
      <div class="card-body">
        <form method="POST" action="?">
          <input type="hidden" name="id" value="<?php echo $editData['car_id'] ?? ''; ?>">
          <div class="row">
            <div class="col-lg-6">
              <label>Taariko</label>
              <input type="text" name="taariko" class="form-control" value="<?php echo $editData['taariko'] ?? ''; ?>">
            </div>
            <div class="col-lg-6">
              <label>Color</label>
              <input type="text" name="color" class="form-control" value="<?php echo $editData['color'] ?? ''; ?>">
            </div>
            <div class="col-lg-6">
              <label>Model</label>
              <input type="text" name="model" class="form-control" value="<?php echo $editData['model'] ?? ''; ?>">
            </div>
            <div class="col-lg-6">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="Available" <?php if (($editData['status'] ?? '') == 'Available')
                  echo 'selected'; ?>>
                  Available</option>
                <option value="Rented" <?php if (($editData['status'] ?? '') == 'Rented')
                  echo 'selected'; ?>>Rented
                </option>
              </select>
            </div>
            <div class="col-lg-6">
              <label>Payment</label>
              <input type="text" name="payment" class="form-control" value="<?php echo $editData['payment'] ?? ''; ?>">
            </div>
          </div>
          <br>
          <?php if ($editData) { ?>
            <button name="update" class="btn btn-warning">Update Car</button>
          <?php } else { ?>
            <button name="save" class="btn btn-primary">Save Car</button>
          <?php } ?>

          <a href="?" class="btn btn-secondary">Close</a>
        </form>
      </div>
    </div>
  <?php } ?>

  <!-- 3. TABLE: Always visible -->
  <?php
  $result = mysqli_query($conn, "SELECT * FROM cars ORDER BY car_id DESC");
  ?>
  <div class="card mt-3">
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Taariko</th>
            <th>Color</th>
            <th>Model</th>
            <th>Status</th>
            <th>Payment</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td>
                <?php echo $row['car_id']; ?>
              </td>
              <td>
                <?php echo $row['taariko']; ?>
              </td>
              <td>
                <?php echo $row['color']; ?>
              </td>
              <td>
                <?php echo $row['model']; ?>
              </td>
              <td>
                <?php echo $row['status']; ?>
              </td>
              <td>
                <?php echo $row['payment']; ?>
              </td>
              <td>
                <a href="?edit=<?php echo $row['car_id']; ?>" class="btn btn-warning">Edit</a>
                <a href="?delete=<?php echo $row['car_id']; ?>" class="btn btn-danger"
                  onclick="return confirm('Delete this car?')">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require_once "includes/footer.php"; ?>