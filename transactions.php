<?php
session_start();
require_once "includes/conn.php";
require_once "includes/sidebar.php";

// DELETE TRANSACTION
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM transactions WHERE transaction_id=$id");
}

// ADD TRANSACTION
if (isset($_POST['submit'])) {
  $customer_id = $_POST['customer_id'];
  $car_id = $_POST['car_id'];

  $sql = "INSERT INTO transactions (customer_id, car_id)
            VALUES ('$customer_id', '$car_id')";

  mysqli_query($conn, $sql);

  // update car status to Rented
  mysqli_query($conn, "UPDATE cars SET status='Rented' WHERE car_id='$car_id'");
}

// FETCH DATA FOR EDIT
$editData = null;
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $result = mysqli_query($conn, "SELECT * FROM transactions WHERE transaction_id=$id");
  $editData = mysqli_fetch_assoc($result);
}

// UPDATE TRANSACTION
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $customer_id = $_POST['customer_id'];
  $car_id = $_POST['car_id'];

  mysqli_query($conn, "UPDATE transactions SET
          customer_id='$customer_id',
          car_id='$car_id'
          WHERE transaction_id=$id");
}
?>

<div class="container-fluid">

  <!-- 1. ADD BUTTON: Shows only when form is closed -->
  <?php if (!isset($_GET['add']) && !$editData) { ?>
    <a href="?add=1" class="btn btn-primary mb-3">Add New Transaction</a>
  <?php } ?>

  <!-- 2. FORM SECTION: Only opens if 'add' or 'edit' is active -->
  <?php if (isset($_GET['add']) || $editData) { ?>
    <div class="card">
      <div class="card-body">
        <form method="POST" action="?">
          <input type="hidden" name="id" value="<?php echo $editData['transaction_id'] ?? ''; ?>">
          <div class="row">

            <!-- CUSTOMER -->
            <div class="col-lg-6">
              <label>Customer</label>
              <select name="customer_id" class="form-control" required>
                <option value="">Select Customer</option>
                <?php
                $customers = mysqli_query($conn, "SELECT * FROM customers");
                while ($c = mysqli_fetch_assoc($customers)) {
                  $selected = ($editData['customer_id'] ?? '') == $c['customer_id'] ? 'selected' : '';
                  ?>
                  <option value="<?php echo $c['customer_id']; ?>" <?php echo $selected; ?>>
                    <?php echo $c['customer_name']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <!-- CAR -->
            <div class="col-lg-6">
              <label>Car</label>
              <select name="car_id" class="form-control" required>
                <option value="">Select Car</option>
                <?php
                // Show available cars OR the currently rented car if we are editing
                $cars = mysqli_query($conn, "SELECT * FROM cars WHERE status='Available'");
                while ($car = mysqli_fetch_assoc($cars)) {
                  ?>
                  <option value="<?php echo $car['car_id']; ?>">
                    <?php echo $car['model']; ?> -
                    <?php echo $car['color']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>

          </div>
          <br>

          <?php if ($editData) { ?>
            <button name="update" class="btn btn-warning">Update Transaction</button>
          <?php } else { ?>
            <button name="submit" class="btn btn-primary">Save Transaction</button>
          <?php } ?>

          <a href="?" class="btn btn-secondary">Close</a>
        </form>
      </div>
    </div>
  <?php } ?>

  <!-- 3. TABLE SECTION -->
  <div class="card mt-3">
    <div class="card-header d-flex justify-content-between">
      <div class="header-title">
        <h4 class="card-title">Transactions</h4>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php
        $result = mysqli_query($conn, "
          SELECT t.*, 
                 c.customer_name, 
                 car.model, 
                 car.color
          FROM transactions t
          JOIN customers c ON t.customer_id = c.customer_id
          JOIN cars car ON t.car_id = car.car_id
          ORDER BY t.transaction_id DESC
        ");
        ?>
        <table id="datatable" class="table data-table table-striped table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Customer</th>
              <th>Car</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $rownumber = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              $rownumber++;
              ?>
              <tr>
                <td>
                  <?php echo $rownumber; ?>
                </td>
                <td>
                  <?php echo $row['customer_name']; ?>
                </td>
                <td>
                  <?php echo $row['model'] . " - " . $row['color']; ?>
                </td>
                <td>
                  <?php echo $row['transaction_date']; ?>
                </td>
                <td>
                  <a class="btn btn-warning" href="?edit=<?php echo $row['transaction_id']; ?>">Edit</a>
                  <a class="btn btn-danger" href="?delete=<?php echo $row['transaction_id']; ?>"
                    onclick="return confirm('Delete this transaction?')">
                    Delete
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php require_once "includes/footer.php"; ?>