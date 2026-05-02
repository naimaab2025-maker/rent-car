<?php
session_start();
require_once "includes/conn.php";
require_once "includes/sidebar.php";

// DELETE CUSTOMER
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  mysqli_query($conn, "DELETE FROM customers WHERE customer_id=$id");
}

// INSERT CUSTOMER
if (isset($_POST['save'])) {

  $customer_name = $_POST['customer_name'];
  $phone = $_POST['phone'];
  $national_id = $_POST['national_id'];

  $sql = "INSERT INTO customers (customer_name, phone, national_id)
            VALUES ('$customer_name', '$phone', '$national_id')";

  mysqli_query($conn, $sql);
}

// FETCH DATA FOR EDIT
$editData = null;

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];

  $result = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id=$id");
  $editData = mysqli_fetch_assoc($result);
}

// UPDATE CUSTOMER
if (isset($_POST['update'])) {

  $id = $_POST['id'];
  $customer_name = $_POST['customer_name'];
  $phone = $_POST['phone'];
  $national_id = $_POST['national_id'];

  mysqli_query($conn, "UPDATE customers SET
        customer_name='$customer_name',
        phone='$phone',
        national_id='$national_id'
        WHERE customer_id=$id");
}


?>




<div class="container-fluid">

  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12">

          <form method="POST" action="">

            <input type="hidden" name="id" value="<?php echo $editData['customer_id'] ?? ''; ?>">

            <div class="row">

              <div class="col-lg-6">
                <label>Customer Name</label>
                <input type="text" name="customer_name" class="form-control"
                  value="<?php echo $editData['customer_name'] ?? ''; ?>">
              </div>

              <div class="col-lg-6">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $editData['phone'] ?? ''; ?>">
              </div>

              <div class="col-lg-6">
                <label>National ID</label>
                <input type="text" name="national_id" class="form-control"
                  value="<?php echo $editData['national_id'] ?? ''; ?>">
              </div>

            </div>

            <br>

            <?php if ($editData) { ?>
              <button name="update" class="btn btn-warning">Update Customer</button>
            <?php } else { ?>
              <button name="save" type="submit" class="btn btn-primary">Save Customer</button>
            <?php } ?>

          </form>
        </div>

      </div>
    </div>
  </div>
</div>




<?php
$result = mysqli_query($conn, "SELECT * FROM customers ORDER BY customer_id DESC");


?>


<div class="card">
  <div class="card-header d-flex justify-content-between">
    <div class="header-title">
      <h4 class="card-title">Customer LIst</h4>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="datatable" class="table data-table table-striped table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>National ID</th>
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
                <?php //echo $row['customer_id']; ?>
              </td>
              <td>
                <?php echo $row['customer_name']; ?>
              </td>
              <td>
                <?php echo $row['phone']; ?>
              </td>
              <td>
                <?php echo $row['national_id']; ?>
              </td>
              <td><a class="btn btn-warning" href="?edit=<?php echo $row['customer_id']; ?>">Edit</a>

                <a class="btn btn-danger" href="?delete=<?php echo $row['customer_id']; ?>"
                  onclick="return confirm('Delete this customer?')">
                  Delete
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>National ID</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<?php require_once "includes/footer.php"; ?>