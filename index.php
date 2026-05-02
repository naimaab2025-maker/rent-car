<?php
session_start();
require_once "includes/conn.php";
require_once "includes/sidebar.php";

// TOTAL CARS
$totalCars = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM cars"))['total'];

// AVAILABLE CARS
$availableCars = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM cars WHERE status='Available'"))['total'];

// RENTED CARS
$rentedCars = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM cars WHERE status='Rented'"))['total'];

// CUSTOMERS
$totalCustomers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM customers"))['total'];

// TRANSACTIONS
$totalTransactions = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM transactions"))['total'];
?>

<div class="container-fluid">

<div class="row">

  <!-- TOTAL CARS -->
  <div class="col-lg-3">
    <div class="card text-white bg-primary mb-3">
      <div class="card-body">
        <h5>Total Cars</h5>
        <h2><?php echo $totalCars; ?></h2>
      </div>
    </div>
  </div>

  <!-- AVAILABLE -->
  <div class="col-lg-3">
    <div class="card text-white bg-success mb-3">
      <div class="card-body">
        <h5>Available Cars</h5>
        <h2><?php echo $availableCars; ?></h2>
      </div>
    </div>
  </div>

  <!-- RENTED -->
  <div class="col-lg-3">
    <div class="card text-white bg-danger mb-3">
      <div class="card-body">
        <h5>Rented Cars</h5>
        <h2><?php echo $rentedCars; ?></h2>
      </div>
    </div>
  </div>

  <!-- CUSTOMERS -->
  <div class="col-lg-3">
    <div class="card text-white bg-info mb-3">
      <div class="card-body">
        <h5>Customers</h5>
        <h2><?php echo $totalCustomers; ?></h2>
      </div>
    </div>
  </div>

</div>

<br>

<div class="row">

  <!-- TRANSACTIONS -->
  <div class="col-lg-3">
    <div class="card text-white bg-warning mb-3">
      <div class="card-body">
        <h5>Transactions</h5>
        <h2><?php echo $totalTransactions; ?></h2>
      </div>
    </div>
  </div>

</div>

</div>

<?php require_once "includes/footer.php"; ?>