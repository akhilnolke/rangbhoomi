<?php
  $page = 'Product';
  include('inc/header.php'); 
  $product_id = $_GET['id'];
 $Artgallery = $obj->GetArtByProductId($product_id);
 $art_id = $_GET['id'];
 $ArtProduct = $obj->GetArtByid($art_id);
  ?>
 
  
  
<body>
  <main class="main-container">
    <div class="contain-wrapper">
      <!-- header -->
     
     <!-- Now use the $Artproduct array to display the gallery -->
<section class="product-section">
  <div class="position-relative py-3">
    <div class="row dqed justify-content-center">
      <div class="col-md-2">
        <div class="slider-img-wrapper">
          <?php
          $thumbnailIndex = 1;
          foreach ($Artgallery as $index => $artwork) {
            foreach ($artwork['image_urls'] as $imageUrl) {
              echo '<div class="gallery-item">';
              echo '<img class="demo w-100 mb-3 cursor" src="admin/assets/images/Artwork/' . trim($imageUrl) . '" onclick="currentSlide(' . $thumbnailIndex . ')" alt="' . $artwork['title'] . '">';
              echo '</div>';
              $thumbnailIndex++;
            }
          }
          ?>
        </div>
      </div>
      <div class="col-md-6">
        <?php
        $slideIndex = 1;
        foreach ($Artgallery as $index => $artwork) {
          foreach ($artwork['image_urls'] as $imageUrl) {
            echo '<div class="mySlides" style="' . ($slideIndex === 1 ? 'display:block;' : '') . '">';
            echo '<img class="w-100" src="admin/assets/images/Artwork/' . trim($imageUrl) . '">';
            echo '</div>';
            $slideIndex++;
          }
        }
        ?>
      </div>
    </div>
  </div>
</section>

      <!--section-->
      <!--section (about art and arist)-->
      <section class="art-artist-wrapper px-5 py-2">
          <div class=" ">
              <div class=" ">
                <div class="d-flex justify-content-between align-items-center" >
                  <div class="title-price">
                    <h1 class="fw-bold m-0"><?=$ArtProduct['title'];?></h1>
                    <div class="d-flex gap-3 price-wrapper align-items-baseline">
                      <span class="fw-normal m-0"> <i class="fas fa-rupee-sign" style="color:black;"></i><?=$ArtProduct['art_price'];?></span>
                      <span class="orignl-price text-decoration-line-through"> 1,34,400</span>
                      <span class="offer-perct fs-14 fw-500">5% Offer</span>
                    </div>
                  </div>
                  <div class="WSA-wrapper d-flex gap-3 py-4">
                      <button type="button" class="btn btn-outline-dark" >Art On Wall</button>
                    <svg viewBox="0 0 24 24">
                      <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                    </svg>
                    <svg viewBox="0 0 24 24">
                      <path fill="currentColor" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" />
                    </svg>
                    <!--<svg class=""  viewBox="0 0 24 24">-->
                    <!--   <path fill="currentColor" d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" />-->
                    <!--</svg>-->
                    <a href="#">
                  <button class="btn-buy-now btn btn-dark   py-1 px-4 ">Buy Now</button>
                   </a>
                  <!--<a href="cart.php">-->
                  <!--<button class="btn-buy-now btn btn-dark   py-1 px-4 ">Add to cart</button>-->
                  <!--</a>-->
                  </div>
                </div>
              </div>
            </div>
        <div class="d-flex gap-5 px-4 flex-col">
          <div class="art-detail-info">
            <div class="artist-detail p-24 border rounded p-4 d-grid">
              <div class="d-flex">
                <div class="  w-75 d-flex gap-3 align-items-center">
                  <a href="/artist/ganesha-chary/80341">
                    <div class="artist-prof-img">
                      <img class="link-to" src="assets/img/profile-pic.png" alt="Ganesha Chary Profile" title="">
                    </div>
                  </a>
                  <div class="art-detl ml-24 mt-20">
                    <a href="/artist/ganesha-chary/80341">
                      <h5 class="fw-bold link-to art-title text-dark">Michael</h5>
                    </a>
                    <span class="art-title">Italy</span>
                  </div>
                </div>
              </div>
              <div class="mt-3 art-prof">
                <h5 class="fw-bold">About Artist</h5>
                <p class="mb-24 art-para">I am an artist from Italy, I was done my post graduation in painting from UNIVERSITY OF Italy @ 2003. I am doing my work and exhibited many places. </p>
                <a href="artist-profile.php"><span class="fw-500 art-prof-view link-to">View Profile</span>
                </a>
              </div>
            </div>
            <div class="artist-detail p-24 border rounded p-4 mt-4 d-grid gap-2">
              <h3 class="fw-bold">Art Prints</h3>
              <div class="row art-prnt-rw">
                <div class="col-sm-6">
                  <svg  viewBox="0 0 24 24">
                    <path fill="currentColor" d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z" />
                  </svg>
                  <span>Smooth, acid-free matte paper</span>
                </div>
                <div class="col-sm-6">
                  <svg  viewBox="0 0 24 24">
                    <path fill="currentColor" d="M8 3C5.79 3 4 4.79 4 7V14C4 15.1 4.9 16 6 16H9V20C9 21.1 9.9 22 11 22H13C14.1 22 15 21.1 15 20V16H18C19.1 16 20 15.1 20 14V3H8M8 5H12V7H14V5H15V9H17V5H18V10H6V7C6 5.9 6.9 5 8 5M6 14V12H18V14H6Z" />
                  </svg>
                  <span>Fingerprint-proof coating</span>
                </div>
              </div>
              <div class="row art-prnt-rw">
                <div class="col-sm-6">
                  <svg  viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 19C9.24 19 7 16.76 7 14C7 10.67 12 5.04 12 5.04S17 10.67 17 14C17 16.76 14.76 19 12 19Z" />
                  </svg>
                  <span>Archival pigment inks</span>
                </div>
                <div class="col-sm-6">
                  <svg viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 5.5L10 8H14L12 5.5M18 10V14L20.5 12L18 10M6 10L3.5 12L6 14V10M14 16H10L12 18.5L14 16M21 3H3C1.9 3 1 3.9 1 5V19C1 20.1 1.9 21 3 21H21C22.1 21 23 20.1 23 19V5C23 3.9 22.1 3 21 3M21 19H3V5H21V19Z" />
                  </svg>
                  <span>With high contrast and resolution </span>
                </div>
              </div>
              <div class="">
                <a href="#">
                  <p class="m-0 art-prof-view">
                    Read more about prints
                    <svg  viewBox="0 0 24 24">
                      <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                    </svg>
                  </p>
                </a>
              </div>
            </div>
          </div>
          <div class="art-tab  ">
            <!-- Nav pills -->
            <ul class="nav nav-pills gap-2 align-items-center" role="tablist">
              <li class="nav-item">
                <a class="nav-link active text-dark" data-bs-toggle="pill" href="#home">Original Artwork</a>
              </li>
              <span>|</span>
              <li class="nav-item" id="printTab">
                <a class="nav-link text-dark" data-bs-toggle="pill" href="#menu1">Print</a>
              </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div id="home" class="container tab-pane active">
                <br>
                <div class="content">
                  <div class="content-1">
                    <div class="specifications pt-26">
                      <h5 class="pb-20 fw-bold">Specifications</h5>
                      <table>
                        <tr>
                          <td>Size :</td>
                          <td><?=$ArtProduct['width'];?> X <?=$ArtProduct['height'];?>
                          </td>
                        </tr>
                        <tr>
                          <td>Medium :</td>
                          <td><?=$ArtProduct['medium'];?></td>
                        </tr>
                        <tr>
                          <td>Style :</td>
                          <td><?=$ArtProduct['styles'];?></td>
                        </tr>
                       <tr>
                          <td>Created in :</td>
                          <td><?php echo date('Y', strtotime($ArtProduct['Created_at'])); ?></td>
                        </tr>

                        <tr>
                          <td>Sold by :</td>
                          <td class="fw-500">Artist</td>
                        </tr>
                        <tr>
                          <td>Surface :</td>
                          <td>Shipped Rolled unless rolling not possible</td>
                        </tr>
                        <!--<tr>-->
                        <!--  <td>Lot No :</td>-->
                        <!--  <td>MA341018</td>-->
                        <!--</tr>-->
                        
                          <tr>
                          <td>Ready to hang:</td>
                           <td>
                              <?=$ArtProduct['installed_hardware'];?>   
                            </td>
                        </tr>
                        
                        <tr>
                          <td>International shipping :</td>
                          <td>Yes</td>
                        </tr>
                        
                        <tr>
                          <td>Domestic Ships Within :</td>
                          <td class="fw-500">7 - 10 business days</td>
                        </tr>
                        <tr>
                          <td>International Ships Within :</td>
                          <td class="fw-500">15 - 18 business days</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div id="menu1" class="container tab-pane fade">
                <br>
                <div class="content">
                  <div class="content-1">
                    <div class="specifications pt-26">
                      <h5 class="pb-20 fw-bold">Specifications</h5>
                      <table>
                        <tr>
                          <td>Size :</td>
                          <td>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                              <option selected>Choose Size</option>
                              <option value="1">47 X 38 in | 119.4 X 96.5 cm</option>
                              <option value="2">32 X 16 in | 98.6 X 76..3 cm</option>
                              <option value="3">50 X 50 in | 135.2 X 100.4 cm</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Medium :</td>
                          <td>
                              <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                              <option selected >canvas </option>
                              <option value="1">canvas</option>
                              <option value="2">metal</option>
                              <option value="3">museum paper</option>
                            </select>  
                            </td>
                        </tr>
                        <tr>
                          <td>Style :</td>
                          <td>Folk</td>
                        </tr>
                        <tr>
                          <td>Created in :</td>
                          <td>2023</td>
                        </tr>
                        <tr>
                          <td>Sold by :</td>
                          <td class="fw-500">Artist</td>
                        </tr>
                        <tr>
                          <td>Surface :</td>
                          <td>Shipped Rolled unless rolling not possible</td>
                        </tr>
                        <!--<tr>-->
                        <!--  <td>Lot No :</td>-->
                        <!--  <td>MA341018</td>-->
                        <!--</tr>-->
                        <tr>
                          <td>Ready to hang:</td>
                           <td>
                              <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                              <option selected >Yes </option>
                              <option value="1">Yes</option>
                              <option value="2">No</option>
                            </select>  
                            </td>
                        </tr>
                        <tr>
                          <td>International shipping :</td>
                          <td>Yes</td>
                        </tr>
                        <tr>
                          <td>Domestic Ships Within :</td>
                          <td class="fw-500">10 - 12 business days</td>
                        </tr>
                        <tr>
                          <td>International Ships Within :</td>
                          <td class="fw-500">15 - 18 business days</td>
                        </tr>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div id="menu2" class="container tab-pane fade">
                <br>
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Discrption section-->
      <div class="product-desc product-main-container">
        <div class="pdp-despt">
          <div class="pdp-despt-title border-top border-bottom py-3">
            <h2 class="fs-24 mb-30 fw-600 ">Description</h2>
            <p class="description art-para">Kamadenu series of work , its recent work its very peaceful and calm blue monochroic  work its vibrate positive energy</p>
          </div>
        </div>
      </div>
      
      <div class="wrapper">
        <h2 class="similar-title">More From Artist</h2>
        <hr>
        <div class="my-slider">
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-1.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-2.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-1.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-2.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-1.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-2.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
        </div>
      </div>
      <hr class="m-0" style="width:90%;margin: 0 auto !important; color:#e5e5e5;">
      <!--Slider section-->
      <div class="wrapper">
        <h2 class="similar-title">Similar Art</h2>
        <hr>
        <div class="my-slider">
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-1.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-2.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-1.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-2.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-1.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
          <div>
            <img class="w-100 img-slider-art" src="assets/img/steve-johnson-2.jpg">
            <div class="bottom-content text-start border p-1">
              <h4 class="text-dark name-place m-0">Image Name</h4>
              <p class="painting-size text-dark mb-1 size-price">70 W x 100 H x 0.2 D cm</p>
              <h4 class="text-dark name-place m-0">India</h4>
              <p class="text-dark size-price">$288</p>
            </div>
          </div>
        </div>
      </div>
      
      <!--Reviews Rating section-->
       <section id="testimonials">
        <!--heading--->
 <h2 class="similar-title">Reviews</h2>
        <!--testimonials-box-container------>
        <div class="testimonial-box-container">
            <!--BOX-1-------------->
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        <!--img---->
                        <div class="profile-img">
                            <img src="https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Ninja-2-512.png" />
                        </div>
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>Liam mendes</strong>
                            <span>@liammendes</span>
                        </div>
                    </div>
                    <!--reviews------>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i><!--Empty star-->
                    </div>
                </div>
                <!--Comments---------------------------------------->
                <div class="client-comment">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
                </div>
            </div>
            <!--BOX-2-------------->
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        <!--img---->
                        <div class="profile-img">
                            <img src="https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Ninja-2-512.png" />
                        </div>
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>Noah Wood</strong>
                            <span>@noahwood</span>
                        </div>
                    </div>
                    <!--reviews------>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i><!--Empty star-->
                    </div>
                </div>
                <!--Comments---------------------------------------->
                <div class="client-comment">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
                </div>
            </div>
            <!--BOX-3-------------->
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        <!--img---->
                        <div class="profile-img">
                            <img src="https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Ninja-2-512.png" />
                        </div>
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>Oliver Queen</strong>
                            <span>@oliverqueen</span>
                        </div>
                    </div>
                    <!--reviews------>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i><!--Empty star-->
                    </div>
                </div>
                <!--Comments---------------------------------------->
                <div class="client-comment">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
                </div>
            </div>
            <!--BOX-4-------------->
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        <!--img---->
                        <div class="profile-img">
                            <img src="https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Ninja-2-512.png" />
                        </div>
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>Barry Allen</strong>
                            <span>@barryallen</span>
                        </div>
                    </div>
                    <!--reviews------>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i><!--Empty star-->
                    </div>
                </div>
                <!--Comments---------------------------------------->
                <div class="client-comment">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
                </div>
            </div>
        </div>
      </section>
    </div>
      <!-- footer -->
      <?php
        include('inc/footer.php'); 
        ?>
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
    
    
    $(document).ready(function(){
     $('.my-slider').slick({
       slidesToShow: 5,
       slidesToScroll: 1,
       arrows: true,
       dots: false,
       speed: 300,
       infinite: true,
       autoplaySpeed: 2000,
       autoplay: false,
       responsive: [
     {
       breakpoint: 991,
       settings: {
         slidesToShow: 3,
       }
     },
     {
       breakpoint: 767,
       settings: {
         slidesToShow: 1,
       }
     }
    ]
     });
    });
    
  </script>
  
  
  <script>
  // Function to check if all fields in the Print section are null
  function checkPrintFields() {
    const printFields = document.querySelectorAll("#menu1 select");
    let allFieldsNull = true;

    printFields.forEach((field) => {
      if (field.value !== "Choose Size" && field.value !== "canvas") {
        allFieldsNull = false;
      }
    });

    const printTab = document.getElementById("printTab");

    if (allFieldsNull) {
      // Disable the Print tab
      printTab.classList.add("disabled");
      printTab.querySelector("a").setAttribute("aria-disabled", "true");
    } else {
      // Enable the Print tab
      printTab.classList.remove("disabled");
      printTab.querySelector("a").removeAttribute("aria-disabled");
    }
  }

  // Call the function on page load
  document.addEventListener("DOMContentLoaded", checkPrintFields);

  // Call the function whenever the user interacts with the fields in the Print section
  const printFields = document.querySelectorAll("#menu1 select");
  printFields.forEach((field) => {
    field.addEventListener("change", checkPrintFields);
  });
</script>

</body>
</html>