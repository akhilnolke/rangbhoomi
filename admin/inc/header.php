<?php 
session_start(); 
include('function.php');
$obj = new Rangbhoomi();
$msg = $_GET['msg']; 
$ProcuctCategorylist = $obj->GetAllCategories();
//      if(!isset($_SESSION['AdminID']))
// {
//     $_SESSION['s_urlRedirectDir'] = $_SERVER['REQUEST_URI'];
//     $_SESSION['s_activId'] = true;
//      header("Location:index.php"); exit();

// }
// $adminid = $_SESSION['AdminID'];
// $admininfo = $obj->GetAdminDetails($adminid);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rangbhoomi Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/rangbhoomi-favicon.png" />
  </head>
  
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php include('inc/sidebar.php'); ?>
    
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php include('inc/top-menu.php'); ?>