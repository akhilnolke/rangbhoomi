<?php
  $page = 'Home';
  include('inc/header.php');
 
  ?>
   <style>
    /* Add this style to change the color of the icon for products in the wishlist */
    .wishlist-button.in-wishlist #wishlist-svg {
      fill: red; /* Change this color as needed */
    }
  </style>
<body>
  <main class="main-container">
   
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <?php
    $totalSlides = mysqli_num_rows($Slider); // Total number of slides
    $activeIndex = 0; // Initialize active slide index
    while ($row = mysqli_fetch_array($Slider)) {
      $activeClass = ($activeIndex === 0) ? 'active' : ''; // Set 'active' class for the first slide
      echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $activeIndex . '" class="' . $activeClass . '" aria-label="Slide ' . ($activeIndex + 1) . '"></button>';
      $activeIndex++;
    }
    ?>
  </div>
  <div class="carousel-inner">
    <?php
    mysqli_data_seek($Slider, 0); // Reset the result pointer to the beginning
    $activeIndex = 0; // Reset active slide index
    while ($row = mysqli_fetch_array($Slider)) {
      $activeClass = ($activeIndex === 0) ? 'active' : ''; // Set 'active' class for the first slide
      ?>
      <div class="carousel-item <?php echo $activeClass; ?>">
        <img src="admin/assets/images/banner/<?=$row['Image'];?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <div class="btn-plus-content">
            <h1 class="text-black"><?=$row['Title'];?></h1>
            <button class="btn-shop rounded-pill fw-norma bg-black text-white" type="button">Shop Now</button>
          </div>
        </div>
      </div>
      <?php
      $activeIndex++;
    }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bg-black" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon bg-black" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


    <div class="">
    
      <div class="contain-wrapper">
          <!--Shop the wall Starting-->
          
          <section class="shop-the-wall-section p-4">
            <div class="separator d-flex align-items-center text-center justify-content-center my-4 gap-4">
            <h2 class="fw-bold">Shop For Your Wall</h2>
          </div>
          
          
             <div class="row mb-3 text-center">
                
                   <?php
    $originalPaintings = $obj->GetOriginalPaintings();

    // Display only the first 3 artworks
    $count = 0;
    foreach ($originalPaintings as $row) {
        if ($count < 4) {
    ?>
                  <div class="col-md-3 col-show-wall-img">
                      <a href="product.php">
                      <div class="product-img">
                            <div class="flip-card">
                              <div class="flip-card-inner">
                                <div class="flip-card-front">
                                  <img src="admin/assets/images/Artwork/<?=$row['image'];?>" alt="<?=$row['title'];?>">
                                </div>
                                <div class="flip-card-back">
                                 <img src="admin/assets/images/Artwork/<?=$row['image'];?>" alt="<?=$row['title'];?>">
                                </div>
                              </div>
                            </div>
                          <!--<img src="admin/assets/images/Artwork/buy-paintings-3.jpg">-->
                          <h4 class="mt-2 mb-0"><?=$row['title'];?></h4>
                          <div class="product-specification ">
                              <p class="mb-1">Canvas <?=$row['width'];?>x<?=$row['height'];?>"</p>
                          <p>₹ <?=$row['art_price'];?></p>
                          </div>
                          
                      </div>
                      </a>
                  </div>
              <?php
            $count++;
        }
    }
    ?>
              </div>
              
              
              <div class="row mb-3 text-center">
    <?php
    $originalPaintings = $obj->GetLast4OriginalsPaintings(); // Use the new function here

    foreach ($originalPaintings as $row) {
    ?>
    <div class="col-md-3 col-show-wall-img">
        <a href="product.php">
        <div class="product-img">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="admin/assets/images/Artwork/<?=$row['image'];?>" alt="<?=$row['title'];?>">
                    </div>
                    <div class="flip-card-back">
                        <img src="admin/assets/images/Artwork/<?=$row['image'];?>" alt="<?=$row['title'];?>">
                    </div>
                </div>
            </div>
            <h4 class="mt-2 mb-0"><?=$row['title'];?></h4>
            <div class="product-specification">
                <p class="mb-1">Canvas <?=$row['width'];?>x<?=$row['height'];?>"</p>
                <p>₹ <?=$row['art_price'];?></p>
            </div>
        </div>
        </a>
    </div>
    <?php
    }
    ?>
</div>

              
            
              
               
          </section>
         
  
        
        <!-- Fourth section (shop by style) -->
        <section class="fourth-sec shop-style-wrapper">
          <div class="separator d-flex align-items-center text-center justify-content-center my-4 gap-4">
            <h2 class="fw-bold">Shop By Style</h2>
          </div>
          <div class="container-fluid">
            <div class="row row-mob w-mob  justify-content-center shop-rw">
                 <?php while($row = mysqli_fetch_array($Latestpainting)) {?>
              <div class="col-md-3 thumbnail">
                <img class=" left-rw-img" src="admin/assets/images/Artwork/<?=$row['image'];?>"  alt="shop by choice img">
              </div>
                               <?php } ?>
              <div class="col-md-9 right-col-shop">
                <div class="row text-center row-mob  right-row-shop">
                    
                    <?php while($row = mysqli_fetch_array($Allpainting)) {?>
                  <div class="col-md-4 mb-1 thumbnail">
                    <div class="btn-shop-bs">
               <!-- Inside the loop that generates the wishlist buttons -->
<a class="wishlist-button" type="button"
   <?php if(isset($_SESSION['UserID'])): ?>
     data-artwork-id="<?=$row['id'];?>"
     data-user-id="<?=$_SESSION['UserID'];?>"
     data-product-name="<?=$row['title'];?>"
     data-product-price="<?=$row['art_price'];?>"
     data-product-image="<?=$row['image'];?>"
     data-product-width="<?=$row['width'];?>"
     data-product-height="<?=$row['height'];?>"
     data-product-category="<?=$row['category'];?>"
   <?php else: ?>
     href="signin-email.php" <!-- Redirect to login page -->
   <?php endif; ?>
>
  <svg id="wishlist-svg" class="cart-fav-svg <?= $row['wishlist_status'] === 'true' ? 'clicked in-wishlist' : ''; ?>" viewBox="0 0 24 24">
    <path fill="currentColor" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" />
  </svg>
</a>



                      <svg class="cart-like-svg"   viewBox="0 0 24 24">
                        <path fill="currentColor" d="M9,20A2,2 0 0,1 7,22A2,2 0 0,1 5,20A2,2 0 0,1 7,18A2,2 0 0,1 9,20M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18M7.2,14.63C7.19,14.67 7.19,14.71 7.2,14.75A0.25,0.25 0 0,0 7.45,15H19V17H7A2,2 0 0,1 5,15C5,14.65 5.07,14.31 5.24,14L6.6,11.59L3,4H1V2H4.27L5.21,4H20A1,1 0 0,1 21,5C21,5.17 20.95,5.34 20.88,5.5L17.3,12C16.94,12.62 16.27,13 15.55,13H8.1L7.2,14.63M9,9.5H13V11.5L16,8.5L13,5.5V7.5H9V9.5Z" />
                      </svg>
                      <a href="shop-now.html" class="text-white">
                        Shop Now 
                        <svg   viewBox="0 0 24 24">
                          <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                        </svg>
                      </a>
                    </div>
                    <img class="" src="admin/assets/images/Artwork/<?=$row['image'];?>" alt="shop by choice img">
                  </div>
                   <?php } ?>
                  
                  
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <!-- fifth section (explore category) -->
        
        <section class="fifth-sec explore-category">
          <div class="separator d-flex align-items-center text-center justify-content-center my-4 gap-4">
            <h2 class="fw-bold">Explore By category</h2>
          </div>
         <div class="row text-center explored_row">
  <?php while($row = mysqli_fetch_array($Category)){ ?>
   <div class="col-md-3 explore-col">
  <div class="explore-container my-2">
    <a class="category-link" href="product-listing.php?category=<?= $row['Category_name']; ?>" >
      <img class="rounded-circle" src="admin/assets/images/categoryimages/<?= $row['Category_image']; ?>" alt="">
      <p class="fw-bold mt-1"><?= $row['Category_name']; ?></p>
      <!--<p><?= $row['Category_name']; ?> <?= $row['product_count']; ?></p>-->
    </a>
  </div>
</div>
  <?php } ?>
</div>

        </section>
        
        
        <!-- Sixth section (Sell Your Paintings) -->
        <section class="sixth-section sell-paintings_wrapper" style="background-image: url(assets/img/paint-background-7vcv1im8f40vi9to.jpg);">
          <div class="know-more-content">
            <h2 class="text-white fw-bold">Sell Your Paintings</h2>
            <h2 class="ml-5 text-white sell-art fw-bold">Other Art Online</h2>
            <p class="py-2 title text-white">Gallerist.in is an online platform for promoting quality art created by artists worldwide.
              With a simple registration process, we allow you to sell paintings as many as you goose,
              with the freedom of putting up the price you want. Marketing team at Gallerist.in supports
              an artist to sell art online by various promotional methods including socialfnedia
              marketing & Google search.
            </p>
          </div>
          <div class="col-md-6">
          </div>
          <button class="btn-know-more btn-hover color-1 border-dark text-dark px-4 py-2 rounded-pill" type="button">KNOW MORE</button>
        </section>
        <!-- SEVENTH SECTION (aboutus section)-->
       <section class="seventh-section aboutus-sec my-4">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6">
                <img class="w-100" src="admin/assets/images/aboutus/<?=$AboutUs['image'];?>" alt="about us image">
              </div>
              <div class="col-md-6">
                <h2 class="text-center fw-bold"><?=$AboutUs['title'];?></h2>
                <p class="text-center py-2"><?=$AboutUs['content'];?>
                </p>
              </div>
            </div>
          </div>
        </section>
        <!-- EIGHT SECTION (why choose us section)-->
        <section class="eight-section whyus-sec my-4">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6">
                <h2 class="text-center fw-bold"><?=$WhyChooseUs['heading'];?></h2>
                <p class="text-center py-2 title-choose"><?=$WhyChooseUs['sub_heading'];?></p>
                <div class="row text-center rt-row-choose-us">
                  <div class="col-md-3 choose-col">
                    <img class="w-100" src="admin/assets/images/<?=$WhyChooseUs['image1'];?>" alt="choose us img">
                    <p class="choose-us-heading"><?=$WhyChooseUs['title1'];?></p>
                    <p class="chhose-us-titles"><?=$WhyChooseUs['content1'];?></p>
                  </div>
                  <div class="col-md-3 choose-col">
                    <img class="w-100" src="admin/assets/images/<?=$WhyChooseUs['image2'];?>" alt="choose us img">
                    <p class="choose-us-heading"><?=$WhyChooseUs['title2'];?></p>
                    <p class="chhose-us-titles"><?=$WhyChooseUs['content2'];?></p>
                  </div>
                  <div class="col-md-3 choose-col">
                    <img class="w-100" src="admin/assets/images/<?=$WhyChooseUs['image3'];?>" alt="choose us img">
                    <p class="choose-us-heading"><?=$WhyChooseUs['title3'];?></p>
                    <p class="chhose-us-titles"><?=$WhyChooseUs['content3'];?></p>
                  </div>
                  <div class="col-md-3 choose-col">
                    <img class="w-100" src="admin/assets/images/<?=$WhyChooseUs['image4'];?>" alt="choose us img">
                    <p class="choose-us-heading"><?=$WhyChooseUs['title4'];?></p>
                    <p class="chhose-us-titles"><?=$WhyChooseUs['content4'];?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 choose-col-rt">
                <img class="w-100" src="admin/assets/images/<?=$WhyChooseUs['left_image'];?>" alt="about us image">
              </div>
            </div>
          </div>
        </section>
        <!-- NINTH SECTION (MEET THE ARTIST)-->
        <section class="ninth-section artist-sec my-4">
               <div class="separator d-flex align-items-center text-center justify-content-center my-4 mx-2 gap-4">
            <h2 class="fw-bold">Meet Our Artist</h2>
          </div>
          <div class="container">
            <!--<div class="py-4">-->
            <!--  <h2 class="text-center fw-bold"></h2>-->
            <!--</div>-->
            <div class="row text-center sss">
                 <?php while($row = mysqli_fetch_array($Artist)){ ?>
              <div class="col-md-3 artist-col">
                <div class="artist-wrapper text-center">
                  <img class="w-100" src="admin/assets/images/profileimage/<?=$row['profile_image'];?>" alt="artst img">
                </div>
                <p class="m-0 py-1 fw-bold"><?=$row['username'];?></p>
                <p class="m-0"><?=$row['state'];?> | <?=$row['country'];?></p>
              </div>
              <?php } ?>
            </div>
          </div>
        </section>
        <!-- tenth section -->
        <section class="tenth-secion p-3">
            <div class="separator d-flex align-items-center text-center justify-content-center my-4   gap-4">
            <h2 class="fw-bold">Testimonial</h2>
          </div>
          <!--<div class="py-4">-->
          <!--  <h2 class="text-center fw-bold">Testimonial</h2>-->
          <!--</div>-->
          <div class="row text-center">
            <div class="col-md-3 testim-col">
              <div class="">
                <img class="w-100" src="assets/img/testimonial-img-1.jpg" alt="testimonial image">
              </div>
              <div class="bottom-wrapper my-3  rounded">
                <div class="d-flex bottom-wrapper-fx gap-2">
                  <img class="rounded-circle" src="assets/img/artist-2.jpg" alt="">
                  <div class="bottom-content text-start">
                    <h4 class="fw-bold">Perfectly Packed</h4>
                    <p class="feed-time fw-bold mb-1">By Pia Rampal | Posted on 8 May 2023</p>
                    <p class="feed-back m-0"> Received a very elegant painting by Bhaskar 
                      C - perfect packed , thanks
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 testim-col">
              <div class=" ">
                <img class="w-100" src="assets/img/testimonial-img-2.jpg" alt="testimonial image">
              </div>
              <div class="bottom-wrapper my-3  rounded">
                <div class="d-flex bottom-wrapper-fx gap-2">
                  <img class="rounded-circle" src="assets/img/artist-4.jpg" alt="">
                  <div class="bottom-content text-start">
                    <h4 class="fw-bold">Perfectly Packed</h4>
                    <p class="feed-time fw-bold mb-1">By Pia Rampal | Posted on 8 May 2023</p>
                    <p class="feed-back m-0"> Received a very elegant painting by Bhaskar 
                      C - perfect packed , thanks
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 testim-col">
              <div class=" ">
                <img class="w-100" src="assets/img/testimonial-img-3.jpg" alt="testimonial image">
              </div>
              <div class="bottom-wrapper my-3  rounded">
                <div class="d-flex bottom-wrapper-fx gap-2">
                  <img class="rounded-circle" src="assets/img/artist-2.jpg" alt="">
                  <div class="bottom-content text-start">
                    <h4 class="fw-bold">Perfectly Packed</h4>
                    <p class="feed-time fw-bold mb-1">By Pia Rampal | Posted on 8 May 2023</p>
                    <p class="feed-back m-0"> Received a very elegant painting by Bhaskar 
                      C - perfect packed , thanks
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 testim-col">
              <div class=" ">
                <img class="w-100" src="assets/img/testimonial-img-3.jpg" alt="testimonial image">
              </div>
              <div class="bottom-wrapper my-3  rounded">
                <div class="d-flex bottom-wrapper-fx gap-2">
                  <img class="rounded-circle" src="assets/img/artist-2.jpg" alt="">
                  <div class="bottom-content text-start">
                    <h4 class="fw-bold">Perfectly Packed</h4>
                    <p class="feed-time fw-bold mb-1">By Pia Rampal | Posted on 8 May 2023</p>
                    <p class="feed-back m-0"> Received a very elegant painting by Bhaskar 
                      C - perfect packed , thanks
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
        <!-- footer -->
        <?php
          include('inc/footer.php'); 
          ?>
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