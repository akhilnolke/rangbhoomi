<?php
$page = 'Signin Email';
include('inc/header.php'); 
  ?>
<body>
  <main class="main-container">
    <div class="contain-wrapper">
      <!-- header -->
 
        <!--SIGN IN-->
        <section class="sign-in-section">
          <div class="sign-in-wrapper py-5">
            <div class="container">
              <div class="row signin-rw rounded">
                <div class="col-lg-6  px-0">
                  <img src="assets/img/signin-png.png" alt="sign in art img" class="w-100 h-100">
                </div>
                <div class="col-lg-6">
                  <form name="signupform" id="signupform" class="sign-in-form" action="admin/inc/process.php?action=UserLogins" method="post">
                    <h2 class="m-0">Welcome!</h2>
                    <p>Sign in to your account</p>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text px-2 bg-white">
                        <img src="assets/img/email-icon.png" class="email-img" alt="email img">
                        </span>
                      </div>
                      <input type="email" class="form-control" placeholder="Email" id="usr" name="email" required>
                    </div>
                    <div class="my-4">
                      <input type="Password" class="form-control" placeholder="Password" id="Passw" name="password" required>
                      <div class="d-flex justify-content-between forget-pass-wrap">
                        <p><a href="forgot-password.php">forgot password?</a></p>
                        <!--<p>Sign in with <a href="#">OTP?</a></p>-->
                      </div>
                    </div>
                    <button type="submit" class="btn w-100 login-btn">Log In</button>
                    <div class="mid-or-span position-relative text-center my-4">
                      <span>OR</span>
                    </div>
                  </form>
                    <div class="google-btn  d-flex justify-content-center gap-4 ">
                      <a href="google-login/googlelogin.php"><button class="btn goggle-btn fw-bold"><img src="assets/img/devicon_google.png" alt="google-img">Continue with Google</button></a>
                      <a href="signin.php">
                        <button class="btn goggle-btn fw-bold">
                          <svg  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M17,19V5H7V19H17M17,1A2,2 0 0,1 19,3V21A2,2 0 0,1 17,23H7C5.89,23 5,22.1 5,21V3C5,1.89 5.89,1 7,1H17M9,7H15V9H9V7M9,11H13V13H9V11Z" />
                          </svg>
                          Login with Phone
                        </button>
                      </a>
                    </div>
                    <div class="accnt-or-not text-center my-5">
                      <p> <a href="signup.php">don't have an account ?</a></p>
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
   
  </main>
</body>
</html>