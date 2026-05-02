<?php
session_start();
if(!isset($_SESSION["username"])) {
    header('location: login.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Rent Car | Responsive Bootstrap 4 Admin Dashboard Template</title>
      
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
  <body class=" color-light ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
     
<div class="iq-sidebar  sidebar-default ">
          <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
              <a href="backend/index.html" class="header-logo">
                  <img src="assets/images/logo.png" class="img-fluid  light-logo" alt="logo"><h5 class="logo-title text-white ml-3 mt-1">Rent Car</h5>
              </a>
              <div class="iq-menu-bt-sidebar ">
                  <svg class="svg-icon feather feather-repeat wrapper-menu animated rotation"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"></polyline>
                  <path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path>
                  </svg>
              </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
              <nav class="iq-sidebar-menu">
                        <ul id="iq-sidebar-toggle" class="iq-menu">
                             <li class="">
                                  <a href="backend/index.html" class="svg-icon">                        
                                          <svg class="svg-icon feather feather-home"  width="20" height="20" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline>
                                          </svg>
                                      <span class="ml-3">Dashboards</span>
                                  </a>
                             </li>
                             <li class="">
                                    <a href="cars.php" class="">
                                         <svg class="svg-icon feather feather feather-send" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                         <line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                         </svg>
                                        <span class="ml-3">Cars</span>
                                    </a>
                                <ul id="Customers" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                </ul>
                             </li>
                             <li class="">
                                    <a href="customer.php" class="">
                                         <svg class="svg-icon feather feather feather-send" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                         <line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                         </svg>
                                        <span class="ml-3">Customers</span>
                                    </a>
                                <ul id="Customers" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                </ul>
                             </li>
                           
                                    <li class="">
                                    <a href="damiin.php" class="">
                                         <svg class="svg-icon feather feather feather-send" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                         <line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                         </svg>
                                        <span class="ml-3">Damiin</span>
                                    </a>
                                <ul id="Customers" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                </ul>
                             </li>       
                             <li class="">
                                    <a href="transactions.php" class="">
                                         <svg class="svg-icon feather feather feather-send" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                         <line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                         </svg>
                                        <span class="ml-3">Transactions</span>
                                    </a>
                                <ul id="Customers" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                </ul>
                             </li>            
                             
                             <li class="">
                                <a href="#otherpage" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                    <i>
                                        <svg width="20" class="svg-icon" id="iq-main-9" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                        </svg>
                                    </i>
                                    <span>See more</span>
                                    <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                    <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                </a>
      
      
                                <ul id="otherpage" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
      
      
                       
                             <li class=" ">
                                            <a href="#user" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                                <i class="las la-user-cog"></i><span>User Details</span>
                                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                            </a>
                                            <ul id="user" class="iq-submenu collapse" data-parent="#otherpage">
                                                    <li class="">
                                                        <a href="app/user-profile.html">
                                                            <i class="las la-id-card"></i><span>User Profile</span>
                                                        </a>
                                                    </li>
                                            </ul>
                                        </li>
                        
                          
                             </li>
                           
                             <li class="">
                                    <a href="logout.php" class="">
                                        <i class="las la-receipt"></i><span>Logout</span>
                                    </a>
                                <ul id="pages-invoice" class="iq-submenu collapse"  data-parent="#otherpage">
                                </ul>
                             </li>
                             
                           
                        </ul>
                    </nav>
              <div class="p-3"></div>
          </div>
          </div>       <div class="iq-top-navbar">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light">
      
              <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                  <i class="ri-menu-line wrapper-menu"></i>
                  <a href="index.html" class="header-logo">
                  <img src="assets/images/logo.png" class="img-fluid  light-logo" alt="logo"><h5 class="logo-title ml-3 mt-1">Rent Car</h5>
                      
                  </a>
                  <div class="navbar-breadcrumb">
                                  <h4>Dashboard</h4>
                              </div>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                  <div class="iq-search-bar device-search">
                      <form action="#" class="searchbox">
                      <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                      <input type="text" class="text search-input" placeholder="Search for your document , people,...">
                      </form>
                  </div>
                  <div class="d-flex align-items-center">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                      <i class="ri-menu-3-line"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">  
                          <li class="nav-item nav-icon search-content">
                                    <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-search-line"></i>
                                    </a>
                                    <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                        <form action="#" class="searchbox p-2">
                                            <div class="form-group mb-0 position-relative">
                                            <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                            <a href="#" class="search-link"><i class="las la-search"></i></a> 
                                            </div>
                                        </form>
                                    </div>
                                </li>               
                          <li class="nav-item nav-icon dropdown"> 
                              <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButtontwo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-notification-line"></i>
                                            <span class="bg-primary dots"></span>
                                        </a>
                              <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButtontwo">
                                  <div class="card shadow-none m-0">
                                      <div class="card-body p-0 ">
                                      <div class="p-4">
                                                  <a href="#" class="iq-sub-card">
                                                      <div class="media align-items-center cust-card pb-4">
                                                          <div class="">
                                                              <img class="avatar-50 rounded-small" src="assets/images/user/01.jpg" alt="01">
                                                          </div>
                                                          <div class="media-body ml-4">
                                                              <div class="d-flex align-items-center justify-content-between">
                                                                  <h5 class="mb-0">Emma Watson</h5>
                                                                  <small class="text-dark"><b>12 : 47 pm</b></small>
                                                              </div>
                                                              <small class="mb-0 font-size-14">Lorem ipsum dolor sit amet</small>
                                                          </div>
                                                      </div>
                                                  </a>
                                                  <a href="#" class="iq-sub-card">
                                                      <div class="media align-items-center cust-card">
                                                          <div class="">
                                                              <img class="avatar-50 rounded-small" src="assets/images/user/02.jpg" alt="02">
                                                          </div>
                                                          <div class="media-body ml-4">
                                                              <div class="d-flex align-items-center justify-content-between">
                                                                  <h5 class="mb-0">Ashlynn Franci</h5>
                                                                  <small class="text-dark"><b>11 : 30 pm</b></small>
                                                              </div>
                                                              <small class="mb-0 font-size-14">Lorem ipsum dolor sit amet</small>
                                                          </div>
                                                      </div>
                                                  </a>
                                                  <a href="#" class="iq-sub-card">
                                                      <div class="media align-items-center cust-card pt-3">
                                                          <div class="">
                                                              <img class="avatar-50 rounded-small" src="assets/images/user/03.jpg" alt="03">
                                                          </div>
                                                          <div class="media-body ml-4">
                                                              <div class="d-flex align-items-center justify-content-between">
                                                                  <h5 class="mb-0">Kianna Carder</h5>
                                                                  <small class="text-dark"><b>11 : 21 pm</b></small>
                                                              </div>
                                                              <small class="mb-0 font-size-14">Lorem ipsum dolor sit amet</small>
                                                          </div>
                                                      </div>
                                                  </a>
                                              </div>
                                      <a class="right-ic btn btn-primary btn-block position-relative iq-logout" href="#" role="button">
                                                View All
                                                  </a>                                   
                                      </div>
                                  </div>
                              </div>
                          </li>
      
                          <li class="nav-item nav-icon dropdown"> 
                              <a href="#" class="search-toggle iq-user-toggle dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="assets/images/user/one.png" class="img-fluid rounded-small" alt="user">
                                        </a>
                          <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <div class="card mb-0">
                                    
                                              <div class="card-body p-0">
                                                  <div class="profile-header">
                                                              <div class="profile-details">
                                                                  <a href="app/user-profile.html" class="iq-sub-card"> 
                                                                      <div class="rounded bg-info iq-card-icon-small">
                                                                          <i class="ri-file-user-line"></i>
                                                                      </div>
                                                                      <div class="media-body">
                                                                      <h5 class="mb-0">My Profile</h5>
                                                                      <p class="mb-0 font-size-14">View personal profile details</p>
                                                                      </div>
                                                                  </a>
                                                              </div>
                                                              <div class="profile-details">
                                                                  <a href="app/user-profile-edit.html" class="iq-sub-card">
                                                                      <div class="rounded bg-success iq-card-icon-small">
                                                                          <i class="ri-profile-line"></i>
                                                                      </div>
                                                                      <div class="media-body">
                                                                      <h5 class="mb-0">Edit Profile</h5>
                                                                      <p class="mb-0 font-size-14">Modify Your details</p>
                                                                      </div>
                                                                  </a>
                                                              </div>
      
                                                              <div class="profile-details">
                                                              <a href="app/user-account-setting.html" class="iq-sub-card">
                                                                      <div class="rounded bg-danger iq-card-icon-small">
                                                                          <i class="ri-account-box-line"></i>
                                                                      </div>
                                                                      <div class="media-body">
                                                                      <h5 class="mb-0">Account</h5>
                                                                      <p class="mb-0 font-size-14">Manage your account parameters.</p>
                                                                      </div>
                                                                  </a>
                                                              </div>
      
      
                                                              <div class="profile-details">
                                                                  <a href="app/user-privacy-setting.html" class="iq-sub-card border-none">
                                                                      <div class="rounded bg-warning iq-card-icon-small">
                                                                      <i class="ri-lock-line"></i>
                                                                      </div>
                                                                      <div class="media-body">
                                                                      <h5 class="mb-0">Settings</h5>
                                                                      <p class="mb-0 font-size-14">Control your privacy parameters.</p>
                                                                      </div>
                                                                  </a>
                                                              </div>
                                                      
                                                  </div>
      
                                                  <a class="right-ic btn btn-primary btn-block   position-relative iq-logout" href="logout.php" role="button">
                                                
                                                Log Out
                                            </a>
                                             
      
                                  </div>
                              </div>
                              </div>
                             
                          </li>                    
                          </ul>                     
                      </div> 
                  </div>
                  </div>
              </nav>
          </div>
      </div>
         
      <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">