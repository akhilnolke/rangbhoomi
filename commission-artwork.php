<?php
  $page = 'Commission Artwork';
  include('inc/header.php'); 
  ?>
<body>
  <main class="main-container">
    <div class="contain-wrapper">
      <!-- header -->
 
        <!--commision artwork-->
        <section class="commission-art-sec">
          <div class="commission-art-content-wrap">
            <div class="container-fluid">
              <div class="position-relative py-3">
                <div class="row dqed justify-content-between">
                  <div class="col-md-1">
                    <div class="slider-img-wrapper commission-art-img">
                      <img class="demo   mb-3 cursor" src="assets/img/child_river.png"  onclick="currentSlide(1)" alt="The Woods">
                      <img class="demo   mb-3 cursor" src="assets/img/027384164265177 1.png"  onclick="currentSlide(2)" alt="Cinque Terre">
                      <img class="demo   mb-3 cursor" src="assets/img/child_river.png"  onclick="currentSlide(3)" alt="Mountains and fjords">
                      <img class="demo   mb-3 cursor" src="assets/img/027384164265177 1.png"  onclick="currentSlide(2)" alt="Cinque Terre">
                      <img class="demo   mb-3 cursor" src="assets/img/child_river.png"  onclick="currentSlide(1)" alt="The Woods">
                      <img class="demo   mb-3 cursor" src="assets/img/027384164265177 1.png"  onclick="currentSlide(2)" alt="Cinque Terre">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="mySlides" style="display:block;">
                      <img class="w-100" src="assets/img/child_river.png"  >
                    </div>
                    <div class="mySlides">
                      <img class="w-100" src="assets/img/027384164265177 1.png"  >
                    </div>
                    <div class="mySlides">
                      <img class="w-100" src="assets/img/child_river.png"  >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div nclasss="col-rt-comm-art-content">
                      <div class="commision-art-price">
                        <p class="fw-bold">₹12,521</p>
                      </div>
                      <div class="commision-art-title">
                        <p class="">A boy standing near by a river under the tree - Oil painting</p>
                      </div>
                      <div class="commision-art-description">
                        <p class="fw-bold">
                          Oil Painting
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path d="M20.902 7.09l-2.317-1.332-1.341-2.303H14.56L12.122 2 9.805 3.333H7.122L5.78 5.758 3.341 7.09v2.667L2 12.06l1.341 2.303v2.666l2.318 1.334L7 20.667h2.683L12 22l2.317-1.333H17l1.341-2.303 2.317-1.334v-2.666L22 12.06l-1.341-2.303V7.09h.243zm-6.097 6.062l.732 3.515-.488.363-2.927-1.818-3.049 1.697-.488-.363.732-3.516-2.56-2.181.121-.485 3.537-.243 1.341-3.273h.488l1.341 3.273 3.537.243.122.484-2.44 2.303z"></path>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                          </svg>
                        </p>
                      </div>
                      <div class="commision-art-figures mb-3">
                        <p class="m-0">Figures Number*</p>
                        <select class="select-price w-100 py-3 px-2" aria-label="Default select example">
                          <option selected>2 (₹4,999)</option>
                          <option value="1">2 (₹8,000)</option>
                          <option value="2">2 (₹10,000)</option>
                          <option value="3">2 (₹15,000)</option>
                          <option value="4">2 (₹20,499)</option>
                        </select>
                      </div>
                      <div class="commision-art-personalize mb-3">
                        <div class="wt-validation wt-mb-xs-2" data-selector="listing-page-personalization" data-personalization-required="">
                          <label for="listing-page-personalization-textarea" class="wt-label wt-text-caption wt-mt-xs-2 m-0" id="personalization-field-label">
                          Add your personalisation
                          </label>
                          <br>
                          <textarea class="wt-textarea wt-textarea  " id="listing-page-personalization-textarea" aria-labelledby="personalization-field-label" aria-describedby="personalization-instructions" rows="2" cols="54" aria-required="true"></textarea>
                        </div>
                      </div>
                      <div class="commision-art-btn-cart mb-2">
                        <button type="button" class="btn btn-dark w-100 rounded-pill">Add to Cart</button>
                      </div>
                      <div class="commision-art-star-seller">
                        <div class="d-flex gap-2 align-items-baseline">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path fill="currentColor" d="M20.902 7.09l-2.317-1.332-1.341-2.303H14.56L12.122 2 9.805 3.333H7.122L5.78 5.758 3.341 7.09v2.667L2 12.06l1.341 2.303v2.666l2.318 1.334L7 20.667h2.683L12 22l2.317-1.333H17l1.341-2.303 2.317-1.334v-2.666L22 12.06l-1.341-2.303V7.09h.243zm-6.097 6.062l.732 3.515-.488.363-2.927-1.818-3.049 1.697-.488-.363.732-3.516-2.56-2.181.121-.485 3.537-.243 1.341-3.273h.488l1.341 3.273 3.537.243.122.484-2.44 2.303z"></path>
                          </svg>
                          <p><span>Star Seller.</span>This seller consistently earned 5-star reviews, dispatched on time, and replied quickly to any messages they received.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <section class="all-reviews-section">
                  <div class="row">
                    <div class="col-lg-7">
                      <div class="reviews d-flex">
                        <p>
                          269 reviews
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                          </svg>
                        </p>
                      </div>
                      <!--tabs-->
                      <ul class="nav nav-pills border-bottom all-review-tabs" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Reviews for this item</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Reviews for this shop</button>
                        </li>
                      </ul>
                      <div class="tab-content py-3 px-2" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                          <div class="d-flex gap-2">
                            <img src="assets/img/027384164265177 1.png" class="rounded-circle person-review-profile-img">
                            <div class="revw-name-title w-100">
                              <p class="m-0">Rahul</p>
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                              </span>
                            </div>
                            <div style="width: 75%;text-align: right;">
                              <p class="date-m-y">07 Jun, 2023</p>
                            </div>
                          </div>
                          <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                          <hr>
                          <div class="d-flex gap-2">
                            <img src="assets/img/027384164265177 1.png" class="rounded-circle person-review-profile-img">
                            <div class="revw-name-title  w-100">
                              <p class="m-0">Rahul</p>
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                              </span>
                            </div>
                            <div style="width: 75%;text-align: right;">
                              <p class="date-m-y">07 Jun, 2023</p>
                            </div>
                          </div>
                          <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                          <div class="d-flex gap-2">
                            <img src="assets/img/027384164265177 1.png" class="rounded-circle person-review-profile-img">
                            <div class="revw-name-title  w-100">
                              <p class="m-0">Rahul</p>
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                              </span>
                            </div>
                            <div style="width: 75%;text-align: right;">
                              <p class="date-m-y">07 Jun, 2023</p>
                            </div>
                          </div>
                          <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                          <hr>
                          <div class="d-flex gap-2">
                            <img src="assets/img/027384164265177 1.png" class="rounded-circle person-review-profile-img">
                            <div class="revw-name-title w-100">
                              <p class="m-0">Rahul</p>
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                </svg>
                              </span>
                            </div>
                            <div style="width: 75%;text-align: right;">
                              <p class="date-m-y">07 Jun, 2023</p>
                            </div>
                          </div>
                          <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                      </div>
                      <!--tabs-->
                    </div>
                    <div class="col-lg-5">
                    </div>
                  </div>
                </section>
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
</body>
</html>