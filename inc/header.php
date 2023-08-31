<?php 
include('admin/inc/function.php'); 
session_start();
$obj = new Rangbhoomi();
$msg = $_GET['msg'];
$id = $_GET['id'];
$userid = $_SESSION['UserID'];
$useridd = $obj->GetIdBySignup($userid);
$WhyChooseUs = $obj->GetWhyChooseUsById($id);
$AboutUs = $obj->GetAboutuussById($id);
$Slider = $obj->GetAllSliderss();
$Category = $obj->GetAllCategoryWithProductCount();
$artistid = $_SESSION['UserID'];
$artistprofile = $obj->GetProfileByArtistId($artistid);

 $user_id = $_SESSION['UserID'];
// Retrieve cart items for the logged-in user
$cartItemss = $obj->GetCartItemByUserId($user_id);
$cartItemscount = $obj->getCartItemCountByUserId($user_id);
$wishlistItemCount = $obj->GetWishlistItemCountByUserId($user_id); // Assuming you have a method for this

// index page
 $Originalpaintings = $obj->GetOriginalPaintingsProducts();
  $Allpainting = $obj->GetAllARTProductss();
  $Latestpainting = $obj->GetARTOneProductss();
  $Artist = $obj->GetArtists();
  
  
//   product page 
  $artProducts = $obj->GetAllARTProducts();
  $product_id = $_GET['id'];
 $Artgallery = $obj->GetArtByProductId($product_id);
 $art_id = $_GET['id'];
 $ArtProduct = $obj->GetArtByid($art_id);
 $Reviews = $obj->GetAllReviews();
 
  
  
// print_r($_SESSION['UserID']);
// 1. Content Security Policy (CSP):
// header("Content-Security-Policy: default-src 'self';");

// 2. Strict-Transport-Security (HSTS)
header("Strict-Transport-Security: max-age=31536000; includeSubDomains");

// 3. X-Frame-Options (Clickjacking protection):
header("X-Frame-Options: DENY");

// 4. X-XSS-Protection (Cross-Site Scripting protection):
header("X-XSS-Protection: 1; mode=block");

// 5. X-Content-Type-Options (Prevent MIME type sniffing):
header("X-Content-Type-Options: nosniff");

// 6. Referrer-Policy (Control referral information sent to other websites):
header("Referrer-Policy: strict-origin-when-cross-origin");

// 7. Feature-Policy (Control allowed features and APIs):
header("Feature-Policy: geolocation 'self'; camera 'none';");

// 8. Cache-Control (Control caching behavior):
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

// 9. Public-Key-Pins (HPKP - HTTP Public Key Pinning):
header("Public-Key-Pins: max-age=31536000; includeSubDomains");

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Rangbhoomi</title>
      <!-- stylesheet css link -->
      <link rel="icon" type="image/png"  href="assets/img/rangbhoomi-favicon.png">
      <link rel="stylesheet" href="assets/css/stylesheet.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--multistep form link-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!-- scrip JS link -->
      <script src="assets/js/script.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <!--ajax for scroll header-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <!--slider js link-->
      <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
      <!-- slick-carousel -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
      <!-- Bootstrap 5 links -->
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
       <!-- Editor -->
    <!--<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>-->
    <!--<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>-->
   </head>
   <header class="header">
      <nav class="navbar navbar-expand-sm navbar-dark  stickyhead">
         <div class="container-fluid">
            <a class="navbar-brand" href="index">
            <img class="logo" src="assets/img/main-logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end gap-4 collapse-mob" id="collapsibleNavbar">
               <ul class="navbar-nav menu-container">
                  <li class="nav-item menu-list head-menu">
                     <a class="nav-link text-dark nested-menu" href="product-listing">Painting</a>
                  </li>
                  <li class="nav-item menu-list head-menu">
                     <a class="nav-link text-dark paint nested-menu" href="#">Drawing</a>
                  </li>
                  <li class="nav-item menu-list head-menu">
                     <a class="nav-link text-dark nested-menu" href="#">Prints</a>
                  </li>
                  <li class="nav-item menu-list head-menu">
                     <a class="nav-link text-dark nested-menu" href="#">Photography</a>
                  </li>
                  <div class="head-inp-wrap position-relative">
                     <input type="text" class="header-main-search" placeholder="Search"/>
                     <svg viewBox="0 0 24 24">
                        <path fill=currentColor d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                     </svg>
                  </div>
               </ul>
               
               <form class="d-flex sign-in-btn gap-3 position-relative align-items-center">
                    <a href="cart" style="position: relative; display: inline-block;">
    <svg viewBox="0 0 24 24">
        <path d="M17,18A2,2 0 0,1 19,20A2,2 0 0,1 17,22C15.89,22 15,21.1 15,20C15,18.89 15.89,18 17,18M1,2H4.27L5.21,4H20A1,1 0 0,1 21,5C21,5.17 20.95,5.34 20.88,5.5L17.3,11.97C16.96,12.58 16.3,13 15.55,13H8.1L7.2,14.63L7.17,14.75A0.25,0.25 0 0,0 7.42,15H19V17H7C5.89,17 5,16.1 5,15C5,14.65 5.09,14.32 5.24,14.04L6.6,11.59L3,4H1V2M7,18A2,2 0 0,1 9,20A2,2 0 0,1 7,22C5.89,22 5,21.1 5,20C5,18.89 5.89,18 7,18M16,11L18.78,6H6.14L8.5,11H16Z" />
    </svg>
    <span style="background-color: #f6c0b6; color: black; padding: 2px 6px; border-radius: 50%; font-size: 12px; position: absolute; top: -8px; right: -8px;"><?php echo $cartItemscount; ?></span>
</a>  
                     <a href="wishlist" style="position: relative; display: inline-block;">
  <svg viewBox="0 0 24 24">
    <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
  </svg>
  <span class="wishlist-count" style="background-color: #f6c0b6; color: black; padding: 2px 6px; border-radius: 50%; font-size: 12px; position: absolute; top: -8px; right: -8px;"><?=$wishlistItemCount;?></span>
</a>

                     <!--<span class="items-added rounded-circle position-absolute fw-bold">0</span>-->
     
     
      <?php if(empty($_SESSION['UserID'])) { ?>
                  <a href="signin-email">
                  <button class="btn btn-dark rounded-pill py-1 px-4 zoom" type="button">LogIn</button>
                  </a>
                   <?php } else { ?>
                  
                  <!-- toggle list-->
                  <ul class="list-unstyled p-0 m-0">
                        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu header-dropdown-toggle p-0" aria-labelledby="navbarDropdown">
            <!--<li><a class="dropdown-item"  href="admin/inc/process.php?action=UserLogout"> -->
            <!--      <button class="btn btn-dark rounded-pill py-1 px-4 zoom" type="button">Logout</button>-->
            <!--      </a></li>-->
            <li><a class="dropdown-item p-2" href="cart.php">
                <svg viewBox="0 0 24 24">
                   <path d="M17,18A2,2 0 0,1 19,20A2,2 0 0,1 17,22C15.89,22 15,21.1 15,20C15,18.89 15.89,18 17,18M1,2H4.27L5.21,4H20A1,1 0 0,1 21,5C21,5.17 20.95,5.34 20.88,5.5L17.3,11.97C16.96,12.58 16.3,13 15.55,13H8.1L7.2,14.63L7.17,14.75A0.25,0.25 0 0,0 7.42,15H19V17H7C5.89,17 5,16.1 5,15C5,14.65 5.09,14.32 5.24,14.04L6.6,11.59L3,4H1V2M7,18A2,2 0 0,1 9,20A2,2 0 0,1 7,22C5.89,22 5,21.1 5,20C5,18.89 5.89,18 7,18M16,11L18.78,6H6.14L8.5,11H16Z" />
                </svg>
                Cart
            </a></li>
            <hr class="m-0" style="color:#e5e5e5">
            <li><a class="dropdown-item p-2" href="wishlist.php">
                  <svg viewBox="0 0 24 24">
                       <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                    </svg>
                    Wishlist
            </a></li>
            <hr class="m-0" style="color:#e5e5e5">
            <li><a class="dropdown-item p-2" href="sellers-home.php">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M17.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,9A1.5,1.5 0 0,1 19,10.5A1.5,1.5 0 0,1 17.5,12M14.5,8A1.5,1.5 0 0,1 13,6.5A1.5,1.5 0 0,1 14.5,5A1.5,1.5 0 0,1 16,6.5A1.5,1.5 0 0,1 14.5,8M9.5,8A1.5,1.5 0 0,1 8,6.5A1.5,1.5 0 0,1 9.5,5A1.5,1.5 0 0,1 11,6.5A1.5,1.5 0 0,1 9.5,8M6.5,12A1.5,1.5 0 0,1 5,10.5A1.5,1.5 0 0,1 6.5,9A1.5,1.5 0 0,1 8,10.5A1.5,1.5 0 0,1 6.5,12M12,3A9,9 0 0,0 3,12A9,9 0 0,0 12,21A1.5,1.5 0 0,0 13.5,19.5C13.5,19.11 13.35,18.76 13.11,18.5C12.88,18.23 12.73,17.88 12.73,17.5A1.5,1.5 0 0,1 14.23,16H16A5,5 0 0,0 21,11C21,6.58 16.97,3 12,3Z" />
                </svg>
                    Start Selling
            </a></li>
            
             <hr class="m-0" style="color:#e5e5e5">
<?php if (!empty($_SESSION['UserID'])) { ?>
    <li><a class="dropdown-item p-2" href="profile-edit.php?profile=<?=$_SESSION['UserID'];?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="currentColor" d="M8,12H16V14H8V12M10,20H6V4H13V9H18V12.1L20,10.1V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H10V20M8,18H12.1L13,17.1V16H8V18M20.2,13C20.3,13 20.5,13.1 20.6,13.2L21.9,14.5C22.1,14.7 22.1,15.1 21.9,15.3L20.9,16.3L18.8,14.2L19.8,13.2C19.9,13.1 20,13 20.2,13M20.2,16.9L14.1,23H12V20.9L18.1,14.8L20.2,16.9Z" />
        </svg>
        Edit Profile
    </a></li>
<?php } ?>

            
            <li><hr class="dropdown-divider m-0"></li>
            <li><a class="dropdown-item"  href="admin/inc/process.php?action=UserLogout"> 
                  <button class="btn btn-dark rounded-pill py-1 px-4 zoom w-100" type="button">Logout</button>
                  </a></li>
          </ul>
        </li>
                  </ul>
                    <?php } ?>
               </form>
            </div>
         </div>
      </nav>
   </header>