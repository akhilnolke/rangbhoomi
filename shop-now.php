<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rangbhoomi | Product </title>
<!-- stylesheet css link -->
    <link rel="stylesheet" href="assets/css/stylesheet.css">  
<!-- scrip JS link -->
<script src="assets/js/script.js"></script>
<!--ajax for scroll header-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!--slider js link-->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- slick-carousel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
<!-- Bootstrap 5 links -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <main class="main-container">
        <div class="">
            <!-- header -->
                <header class=" header-top-sticky" >
                <nav class="navbar navbar-expand-sm navbar-dark  stickyhead">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="index.html">
                        <img class="logo" src="assets/img/main-logo.png" alt="logo">
                      </a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse justify-content-center collapse-mob" id="collapsibleNavbar">
                        <ul class="navbar-nav menu-container">
                          <li class="nav-item menu-list head-menu">
                            <a class="nav-link text-dark nested-menu" href="#">Painting</a>
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
                        </ul>
                      </div>
                      <form class="d-flex sign-in-btn gap-2 align-items-center position-relative">
                             <img class="head-icon" src="assets/img/cart.png" alt="cart img">
                             <span class="items-added fw-bold position-absolute">0</span>
                             <svg  viewBox="0 0 24 24">
                                 <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                             </svg>
                            <button class="btn btn-dark rounded-pill py-1 px-3 zoom" type="button">Sign In</button>
                        </form>
                    </div>
                  </nav>
            </header>
 
              <div class="separator d-flex align-items-center text-center justify-content-center my-3 gap-4 product-bg" style=" background-image: url(assets/img/bg-footer.jpg);">
                <h2>Shop Now</h2>
            </div>
             
         <section class="">
             <div class="container">
                 <div class="d-flex justify-content-between px-2 align-items-center">
                     <h2 class="">Shop by choice</h2>
                     <div>
                        <label for="language">Sort by:</label>
                        <select class="py-1 rounded" name="language" id="language">
                          <option value="java" selected>Featured</option>
                          <option value="javascript">Best Selling</option>
                          <option value="python">Price, low to high</option>
                          <option value="python">Price, high to low</option>
                          <option value="python">Date, old to new</option>
                          <option value="python">Date, new to old</option>
                        </select>
                     </div>
                 </div>
                 <div class="art-paint-container py-3">
                   <div class="row">
                       <div class="col-xl-4">
                           <img class="w-100" src="assets/img/steve-johnson-1.jpg" alt="">
                       </div>
                       <div class="col-xl-4">
                           <img class="w-100" src="assets/img/steve-johnson-1.jpg" alt="">
                       </div>
                       <div class="col-xl-4">
                           <img class="w-100" src="assets/img/steve-johnson-1.jpg" alt="">
                       </div>
                       
                   </div>  
                 </div>
             </div>
         </section>
 
<!-- footer -->
<footer class="footer p-5" style="background-image:url(assets/img/bg-footer.jpg) ;">
    <div class="row text-center align-items-center">
        <div class="col-md-4 left-col-footer">
            <h2 class="text-white">Quick Menu</h2>
            <p><a class="text-white" href="#">Painting</a></p>
            <p><a class="text-white" href="#">Drawing</a></p>
            <p><a class="text-white" href="#">Prints</a></p>
            <p><a class="text-white" href="#">Photography</a></p>
        </div>
        <div class="col-md-4 mid-col-footer position-relative">
          <img src="assets/img/logo-footer.png" alt="footer logo">
          <p class="text-white">"Largest aggregator for original paintings"</p>
        </div>
        <div class="col-md-4 right-col-footer">
            <h2 class="text-white">Connect With Us</h2>
            <div class="social-links">
                <a href="#"><img src="assets/img/facebook.png" alt="facebook"></a>
                <a href="#"><img src="assets/img/instagram.png" alt="instagram"></a>
                <a href="#"><img src="assets/img/twitter.png" alt="twitter"></a>
                <a href="#"><img src="assets/img/youtube.png" alt="youtube"></a>
            
        </div>
        <p class="text-white py-3 m-0">2023 | Privacy Policy</p>
        </div>
    </div>
</footer>
        </div>
    </main>
     <script>
     // sticky header js
$(function() {
    $(window).on("scroll", function() {
        if($(window).scrollTop() > 50) {
            $(".stickyhead").addClass("activee");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
           $(".stickyhead").removeClass("activee");
        }
    });
});
 </script>
</body>
</html>