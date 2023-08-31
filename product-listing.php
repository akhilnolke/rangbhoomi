<?php
  $page = 'Product Listing';
  include('inc/header.php'); 
  
$category = $_GET['category'];
$CategoryProduct = $obj->GetArtProductsByCategory($category);
// $minPrice = $_GET['min_price']; // Get the minimum price from the query parameters
// $maxPrice = $_GET['max_price']; // Get the maximum price from the query parameters

// $CategoryProduct = $obj->GetArtProductsByCategoryAndPrice($category, $minPrice, $maxPrice);

  
  ?>
<body>
  <main class="main-container">
    <div class="contain-wrapper">
      <!-- header -->
      
      
        <!--Product listing section-->
        <section class="product-listing-section">
          <div class="product-listing-content-wrap">
            <div class="sortby-wrap text-end p-3">
              <select class="px-3 py-1 rounded-pill" aria-label="Default select example">
                <option selected>Sort by:</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="py-4">
              <div class="row">
                <!--left side col #product-filter-->
                <div class="col-lg-3">
                  <div class="filter-content-wrap">
                    <h4 class="border-bottom">Filter</h4>
                    <form method="get" action="productlist.php">
                    <div class="filter-price">
                      <p class="fw-bold m-0" style="font-size: 19px;">Price</p>
                      <div class="price-input">
                        <div class="field border-right">
                          <span>Min</span>
                          <input type="number" class="input-min" value="2500">
                        </div>
                        <div class="field ml-2">
                          <span>Max</span>
                          <input type="number" class="input-max" value="7500">
                        </div>
                      </div>
                      <div class="slider">
                        <div class="progress"></div>
                      </div>
                      <div class="range-input">
                      <!-- Your existing price input fields here -->
                         <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                        <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                      </div>
                       <button type="submit">Apply Filter</button>
                    </div>
                    </form>
                    
                    <div class="filter-accordion mt-3">
                      <div class=" ">
                        <div class="accordion" id="accordionExample">
                          <div class="card border-end-0 border-top-0 border-start-0 border-bottom ">
                            <div class="card-header p-0 " id="headingOne">
                              <h2 class="mb-2" data-toggle="collapse" data-target="#collapseOne">
                                <button type="button" class="border-0 bg-white px-0 btn-plus-minus" ><i class="fa fa-plus"></i>Category</button>
                              </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                                <p>dcfw</p>
                              </div>
                            </div>
                          </div>
                          <div class="card border-end-0 border-top-0 border-start-0 border-bottom">
                            <div class="card-header p-0" id="headingTwo">
                              <h2 class="mb-2">
                                <button type="button" class="border-0 bg-white px-0 btn-plus-minus" data-toggle="collapse" data-target="#collapseTwo"><i class="fa fa-plus"></i>Medium</button>
                              </h2>
                            </div>
                            <div id="collapseTwo" class="collapse  " aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                <p>Second Tab Content</p>
                              </div>
                            </div>
                          </div>
                          <div class="card border-end-0 border-top-0 border-start-0 border-bottom">
                            <div class="card-header p-0" id="headingThree">
                              <h2 class="mb-2">
                                <button type="button" class="border-0 bg-white  px-0 btn-plus-minus" data-toggle="collapse" data-target="#collapseThree"><i class="fa fa-plus"></i>Material</button>
                              </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <p>Third Tab Content</p>
                              </div>
                            </div>
                          </div>
                          <div class="card border-end-0 border-top-0 border-start-0 border-bottom">
                            <div class="card-header p-0" id="headingFour">
                              <h2 class="mb-2">
                                <button type="button" class="border-0 bg-white  px-0 btn-plus-minus" data-toggle="collapse" data-target="#collapseFour"><i class="fa fa-plus"></i>price</button>
                              </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <p>Third Tab Content</p>
                              </div>
                            </div>
                          </div>
                          <div class="card border-end-0 border-top-0 border-start-0 border-bottom">
                            <div class="card-header p-0" id="headingFive">
                              <h2 class="mb-2">
                                <button type="button" class="border-0 bg-white  px-0 btn-plus-minus" data-toggle="collapse" data-target="#collapseFive"><i class="fa fa-plus"></i>Size</button>
                              </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <div class="filter-size">
                                  <p>Size</p>
                                  <div class="d-flex gap-3">
                                    <button type="button" class="btn btn-outline-secondary">S</button>  
                                    <button type="button" class="btn btn-outline-secondary">M</button>  
                                    <button type="button" class="btn btn-outline-secondary">L</button>  
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card border-end-0 border-top-0 border-start-0 border-bottom">
                            <div class="card-header p-0" id="headingSix">
                              <h2 class="mb-2">
                                <button type="button" class="border-0 bg-white  px-0 btn-plus-minus" data-toggle="collapse" data-target="#collapseSix"><i class="fa fa-plus"></i>orientation</button>
                              </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <p>Third Tab Content</p>
                              </div>
                            </div>
                          </div>
                          <div class="card border-end-0 border-top-0 border-start-0 border-bottom">
                            <div class="card-header p-0" id="headingSeven">
                              <h2 class="mb-2">
                                <button type="button" class="border-0 bg-white  px-0 btn-plus-minus" data-toggle="collapse" data-target="#collapseSeven"><i class="fa fa-plus"></i>subject</button>
                              </h2>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <p>Third Tab Content</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--right side col #product-->
                <div class="col-lg-9">
                  <!--<div class="row">-->
                  
                  <!--</div>-->
                  
                  <div class="row">
                     
                      <?php while($row = mysqli_fetch_array($CategoryProduct)){ ?>
                    <div class="col-md-3 col-rt-prod-list">
                      <div class="product-content_wrap rounded">
                        <div class="wish-image" style=" ">
                          <img src="admin/assets/images/Artwork/<?=$row['image'];?>" alt="wish-image"> 
                        </div>
                        <div class="title-artist-wrap px-1 py-1">
                          <h6 class="m-0 fw-bold"><?=$row['title'];?></h6>
                          <p>Rahul Kumar</p>
                          <div class=" ">
                            <p class="text-black m-0"><?=$row['category'];?></p>
                            <p class="text-black m-0">Canvas</p>
                            <div class="d-flex justify-content-between" style="height:20px">
                              <p class="text-black m-0"><?=$row['width'];?>x<?=$row['height'];?></p>
                              <p>₹<?=$row['art_price'];?></p>
                            </div>
                          </div>
                        </div>
                        <div class="">
                          <div class="favorite-addcart-section d-flex justify-content-center align-items-center p-2  gap-2">
                            <div class="favorite-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg " viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                              </svg>
                            </div>
                            <div class="add-to-cart-icon fav-cart-icon d-flex justify-content-center align-items-center">
                              <svg class="layer-svg "  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z" />
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                     <?php } ?>
                  </div>
                  
                  
                  
                  
                  
                  <!--looking for what section-->
                  <section class="py-2">
                      <div class="  lookin-wt-wrap">
                    <div class="row">
                      <div class="col-md-3">
                        <img class="w-100" src="assets/img/looking-for-what.png" />
                      </div>
                      <div class="col-md-9">
                        
                          <h2>Didn't find what you are looking for? </h2>
                          <p>Tell us and we'll try our best to make it available for you. </p>
                          <textarea class="w-100" id="textWhat" type="text" name="text" placeholder="Give your feedback here..." rows="6" cols="50"></textarea>
                          <div class=" text-end">
                            <button type="button" class="btn btn-dark">Send</button>
                          </div>
                       
                      </div>
                    </div>
                     </div>
                  </section>
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
    
  </main>
  <script>
    $(document).ready(function () {
    // Add minus icon for collapse element which is open by default
    $(".collapse.show").each(function () {
    $(this)
      .prev(".card-header")
      .find(".fa")
      .addClass("fa-minus")
      .removeClass("fa-plus");
    });
    
    // Toggle plus minus icon on show hide of collapse element
    $(".collapse")
    .on("show.bs.collapse", function () {
      $(this)
        .prev(".card-header")
        .find(".fa")
        .removeClass("fa-plus")
        .addClass("fa-minus");
    })
    .on("hide.bs.collapse", function () {
      $(this)
        .prev(".card-header")
        .find(".fa")
        .removeClass("fa-minus")
        .addClass("fa-plus");
    });
    });
    
    
    
    const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    range = document.querySelector(".slider .progress");
    let priceGap = 1000;
    
    priceInput.forEach((input) => {
    input.addEventListener("input", (e) => {
    let minPrice = parseInt(priceInput[0].value),
      maxPrice = parseInt(priceInput[1].value);
    
    if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
      if (e.target.className === "input-min") {
        rangeInput[0].value = minPrice;
        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
      } else {
        rangeInput[1].value = maxPrice;
        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
      }
    }
    });
    });
    
    rangeInput.forEach((input) => {
    input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInput[0].value),
      maxVal = parseInt(rangeInput[1].value);
    
    if (maxVal - minVal < priceGap) {
      if (e.target.className === "range-min") {
        rangeInput[0].value = maxVal - priceGap;
      } else {
        rangeInput[1].value = minVal + priceGap;
      }
    } else {
      priceInput[0].value = minVal;
      priceInput[1].value = maxVal;
      range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
      range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
    }
    });
    });
    
    
 
    // gets a reference to the heartDOm
const heartDOM = document.querySelector('.wishlist-heart');
// initialized like to false when user hasnt selected
let liked = false;

// create a onclick listener
heartDOM.onclick = (event) => {
	// check if liked 
	liked = !liked; // toggle the like ( flipping the variable)
	
	// this is what we clicked on
	const target = event.currentTarget;
	
	if (liked) {
		// remove empty heart if liked and add the full heart
		target.classList.remove('far');
		target.classList.add('fas', 'pulse');
	} else {
		// remove full heart if unliked and add empty heart
		target.classList.remove('fas');
		target.classList.add('far');
	}
}

heartDOM.addEventListener('animationend', (event) => {
	event.currentTarget.classList.remove('pulse');
})
  </script>
</body>
</html>