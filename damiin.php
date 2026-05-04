<?php
session_start();
require_once "includes/conn.php";
require_once "includes/sidebar.php";

// DELETE CUSTOMER
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM damiin WHERE damiin_id=$id");
}

// INSERT CUSTOMER
if (isset($_POST['save'])) {
  $damiin_name = $_POST['damiin_name'];
  $phone = $_POST['phone'];
  $shirkadda = $_POST['shirkadda'];

  $sql = "INSERT INTO damiin (damiin_name, phone, shirkadda)
            VALUES ('$damiin_name', '$phone', '$shirkadda')";

  mysqli_query($conn, $sql);
}

// FETCH DATA FOR EDIT
$editData = null;
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $result = mysqli_query($conn, "SELECT * FROM damiin WHERE damiin_id=$id");
  $editData = mysqli_fetch_assoc($result);
}

// UPDATE DAMIIN
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $damiin_name = $_POST['damiin_name'];
  $phone = $_POST['phone'];
  $shirkadda = $_POST['shirkadda'];

  mysqli_query($conn, "UPDATE damiin SET
        damiin_name='$damiin_name',
        phone='$phone',
        shirkadda='$shirkadda'
        WHERE damiin_id=$id");
}
?>

<div class="container-fluid">

  <!-- 1. ADD BUTTON: Shows only when the form is closed -->
  <?php if (!isset($_GET['add']) && !$editData) { ?>
    <a href="?add=1" class="btn btn-primary mb-3">Add New Damiin</a>
  <?php } ?>

  <!-- 2. FORM SECTION: Only opens if 'add' or 'edit' is in the URL -->
  <?php if (isset($_GET['add']) || $editData) { ?>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <form method="POST" action="?">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <input type="hidden" name="id" value="<?php echo $editData['damiin_id'] ?? ''; ?>">
                  <div class="form-group">
                    <label>Damiin Name</label>
                    <input class="form-control" name="damiin_name" type="text" placeholder="Enter Damiin name"
                      value="<?php echo $editData['damiin_name'] ?? ''; ?>">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label>Phone </label>
                    <input class="form-control" name="phone" type="text" placeholder="Enter phone"
                      value="<?php echo $editData['phone'] ?? ''; ?>">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label>Shirkadda</label>
                    <input class="form-control" name="shirkadda" type="text" placeholder="Enter shirkadda"
                      value="<?php echo $editData['shirkadda'] ?? ''; ?>">
                  </div>
                </div>
              </div>

              <?php if ($editData) { ?>
                <button name="update" class="btn btn-warning">Update Damiin</button>
              <?php } else { ?>
                <button name="save" class="btn btn-primary">Save Damiin</button>
              <?php } ?>

              <a href="?" class="btn btn-secondary">Close</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <!-- 3. TABLE SECTION: Always Visible -->
  <?php
  $result = mysqli_query($conn, "SELECT * FROM damiin ORDER BY damiin_id DESC");
  ?>

  <div class="card mt-3">
    <div class="card-header d-flex justify-content-between">
      <div class="header-title">
        <h4 class="card-title">Damiin List</h4>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="datatable" class="table data-table table-striped table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Damiin Name</th>
              <th>Phone</th>
              <th>Shirkadda</th>
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
                  <?php echo $row['damiin_name']; ?>
                </td>
                <td>
                  <?php echo $row['phone']; ?>
                </td>
                <td>
                  <?php echo $row['shirkadda']; ?>
                </td>
                <td>
                  <a class="btn btn-warning" href="?edit=<?php echo $row['damiin_id']; ?>">Edit</a>
                  <a class="btn btn-danger" href="?delete=<?php echo $row['damiin_id']; ?>"
                    onclick="return confirm('Delete this damiin?')">
                    Delete
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Damiin Name</th>
              <th>Phone</th>
              <th>Shirkadda</th>
              <th>Actions</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<?php require_once "includes/footer.php"; ?>