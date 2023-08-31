<?php
  $page = 'Seller Home';
  include('inc/header.php'); 
  ?>
<body>
  <main class="main-container">
    <div class="contain-wrapper">
      <!-- header -->
      
      <!--seller home page-->
      <section class="seller-home-section">
        <div class="seller-content">
          <div class="seller-container">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="seller-deal-str">
                  <div class="deal-content">
                    <h2>Start Your Seller Journey</h2>
                    <p>Start selling your art and become a member, So  start trustable journey with us</p>
                    <a href="uploaded-artwork.php">
                    <button type="button" class="btn btn-dark rounded-pill mt-3">Start Selling</button>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <img class="w-100" src="assets/img/seller-deal.png" alt="start selling img">
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col-md-6">
                <img class="w-100" src="assets/img/payment-method.png" alt="start selling img">
              </div>
              <div class="col-md-6">
                <div class="seller-deal-str">
                  <div class="deal-content">
                    <h2 class="text-center">Simply need these things to start</h2>
                    <div class="fig-imgs d-flex justify-content-between align-items-center text-center
                      ">
                      <figure class="figure">
                        <img src="assets/img/indian-gst.png" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        <figcaption class="figure-caption">GST Details</figcaption>
                      </figure>
                      <figure class="figure">
                        <img src="assets/img/pan-card.png" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        <figcaption class="figure-caption">PAN Details</figcaption>
                      </figure>
                      <figure class="figure">
                        <img src="assets/img/BankAccountIcon.png" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        <figcaption class="figure-caption">Active Bank Account</figcaption>
                      </figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="why-see-with-us">
            <div class="text-center title-sell-wid-us">
              <h2 class="m-0 text-white p-2">Why Sell With Us</h2>
            </div>
            <div class="content_sell p-4">
              <div class="row">
                <div class="col-md-4">
                  <div class="outside">
                    <div class="mid-inside-content">
                      <img class="mb-1" src="assets/img/Onboarding_logo_Payments 1.png" alt="rupee img">
                      <div>
                        <h4>No hidden charges</h4>
                        <hr class="hr-inside">
                        <p>Use our simple pricing calculator to decide the best and competitive selling price </p>
                      </div>
                      <div class=" text-center">
                          <a href="uploaded-artwork.php">
                        <button type="button" class="btn btn-dark rounded-pill text-center px-3">Start Selling</button>
                          </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="outside">
                    <div class="mid-inside-content">
                      <img class="mb-1" src="assets/img/Onboarding_logo_Mobile 1.png" alt="rupee img">
                      <div>
                        <h4>Business on the go</h4>
                        <hr class="hr-inside">
                        <p>Download our Flipkart Seller App to manage your business anywhere, anytime</p>
                      </div>
                      <div class=" text-center">
                        <button type="button" class="btn btn-dark rounded-pill text-center px-3">Start Selling</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="outside">
                    <div class="mid-inside-content">
                      <img class="mb-1" src="assets/img/Onboarding_logo_Support 1.png" alt="rupee img">
                      <div>
                        <h4>24x7 Seller Support</h4>
                        <hr class="hr-inside">
                        <p>All your queries and issues are answered by our dedicated Seller Support Team</p>
                      </div>
                      <div class=" text-center">
                        <button type="button" class="btn btn-dark rounded-pill text-center px-3">Start Selling</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--seller home page end-->
    </div>
      <!-- footer -->
      <?php
        include('inc/footer.php'); 
        ?>
   
  </main>
</body>
</html>
<script>
  $(function(){
  $('.selectpicker').selectpicker();
  });
</script>