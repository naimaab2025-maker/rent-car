<?php
session_start();
require_once "includes/conn.php"; 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>EmailCHIMP | Responsive Bootstrap 4 Admin Dashboard Template</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico" />
      <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="assets/css/backend.css?v=1.0.2">
      <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="assets/vendor/remixicon/fonts/remixicon.css">
      <link rel="stylesheet" href="assets/vendor/@icon/dripicons/dripicons.css">
      
      <link rel='stylesheet' href='assets/vendor/fullcalendar/core/main.css' />
      <link rel='stylesheet' href='assets/vendor/fullcalendar/daygrid/main.css' />
      <link rel='stylesheet' href='assets/vendor/fullcalendar/timegrid/main.css' />
      <link rel='stylesheet' href='assets/vendor/fullcalendar/list/main.css' />
      <link rel="stylesheet" href="assets/vendor/mapbox/mapbox-gl.css">  </head>
  <body class=" ">

   <?php
      if(isset($_POST["submit"])) {
         // var_dump($_POST);
          $usermail = $_POST["usermail"];
          $password = $_POST["password"];


         $query = "SELECT * FROM users WHERE email = '$usermail' AND password = md5($password)";
         $result = mysqli_query($conn, $query);
         $num_of_rows = mysqli_num_rows($result);
         if($num_of_rows > 0) {
            //Username and password are correct
            //Set session variable for the user
            $_SESSION["username"] = $usermail;

            //Take further action
            
            echo "Login succesful";
            //Move the user from login page to index.php page
            header("location: index.php");
         } else {
            $_SESSION["username"] = "incorrect";
         }



      }
   ?>
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    
      <div class="wrapper">
      <section class="login-content">
         <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
               <div class="col-12">
                  <div class="row align-items-center">
                     <div class="col-lg-6">
                        <h2 class="mb-2">Sign In</h2>
                        <p>To Keep connected with us please login with your personal info.</p>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="mb-0">Email</label>
                                    <input name="usermail" class="form-control" type="email" placeholder=" ">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="mb-0">Password</label>
                                    <input name="password" class="form-control" type="password" placeholder=" "> 
                                    <div>
                                    <?php
                                    if(isset($_SESSION["username"]) && $_SESSION["username"] == 'incorrect') {
                                       echo "Incorrect username or password";
                                    }
                                    ?>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <a href="auth-recoverpw.html" class="text-primary float-right">Forgot Password?</a>
                              </div>
                           </div>
                           <button name="submit" type="submit" class="btn btn-primary btn-lg">Sign In</button>
                           <p class="mt-3">
                              Create an Account <a href="auth-sign-up.html" class="text-primary">Sign Up</a>
                           </p>
                        </form>
                     </div>
                     <div class="col-lg-6 mb-lg-0 mb-4 mt-lg-0 mt-4">
                        <img src="assets/images/login/01.png" class="img-fluid w-80" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
    
    <!-- Backend Bundle JavaScript -->
    <script src="assets/js/backend-bundle.min.js"></script>
    
    <!-- Flextree Javascript-->
    
    <!-- Table Treeview JavaScript -->
    <script src="assets/js/table-treeview.js"></script>
    
    <!-- Masonary Gallery Javascript -->
    
    <!-- Mapbox Javascript -->
    
    <!-- Fullcalender Javascript -->
    <script src='assets/vendor/fullcalendar/core/main.js'></script>
    <script src='assets/vendor/fullcalendar/daygrid/main.js'></script>
    <script src='assets/vendor/fullcalendar/timegrid/main.js'></script>
    <script src='assets/vendor/fullcalendar/list/main.js'></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="assets/js/sweetalert.js"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="assets/js/vector-map-custom.js"></script>
    
    <!-- Chart Custom JavaScript -->
    
    <!-- Chart Custom JavaScript -->
    <script src="assets/js/chart-custom.js"></script>
    
    <!-- slider JavaScript -->
    <script src="assets/js/slider.js"></script>
    
    <!-- app JavaScript -->
    <script src="assets/js/app.js"></script>
  </body>
</html>