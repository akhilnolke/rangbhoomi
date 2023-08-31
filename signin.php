<?php
  $page = 'Signin';
  include('inc/header.php'); 
  ?>
<body>
  <main class="main-container">
    <!-- header -->
    
    
      <div class="contain-wrapper">
        <!--SIGN IN-->
        <section class="sign-in-section mb-4">
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
                      <span class="input-group-text">
                        +91
                        <svg viewBox="0 0 24 24">
                          <path fill="current-color" d="M7,10L12,15L17,10H7Z" />
                        </svg>
                      </span>
                    </div>
                    <input type="number" class="form-control" placeholder="Phone Number" id="usr" name="phone" oninput="enforceMaxLength()" maxlength="10" required>
                  </div>
                    <div class="my-4 position-relative">
                      <input type="password" class="form-control" placeholder="Password" id="myPass"name="password" required>
                      <span id="showPass">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            <i class="fa fa-eye" aria-hidden="true" style="display:none;"></i>
                      </span>
                      <div class="d-flex justify-content-between forget-pass-wrap">
                        <p><a href="forgot-password.php">forgot password?</a></p>
                        <p>Sign in with <a href="#">OTP?</a></p>
                      </div>
                    </div>
                    <button type="submit" class="btn w-100 login-btn">Log In</button>
                    <div class="mid-or-span position-relative text-center my-4">
                      <span>OR</span>
                    </div>
                  </form>
                  <div class="google-btn  d-flex justify-content-center gap-4 ">
                 <button id="googleSignInButton" class="btn goggle-btn fw-bold" onclick="handleGoogleSignIn(); return false;">
                      <img src="assets/img/devicon_google.png" alt="google-img">Continue with Google
                    </button>



                            <a href="signin-email.php">
                      <button class="btn goggle-btn fw-bold">
                        <svg  viewBox="0 0 24 24">
                          <path fill="currentColor" d="M13 19C13 18.66 13.04 18.33 13.09 18H4V8L12 13L20 8V13.09C20.72 13.21 21.39 13.46 22 13.81V6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H13.09C13.04 19.67 13 19.34 13 19M20 6L12 11L4 6H20M20 22V20H16V18H20V16L23 19L20 22Z" />
                        </svg>
                        Login with Email
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
<script>
    $(document).ready(function() {
  $("#showPass").click(function() {
    if ($("#myPass").attr("type") == "password") {
      $("#myPass").attr("type", "text");
    } else {
      $("#myPass").attr("type", "password");
    }
  });
  $("#showPass").click(function() {
    $("#showPass i").toggle();
  });
});
</script>

<script src="https://accounts.google.com/gsi/client" async defer></script>

<script>
  function handleGoogleSignIn() {
    google.accounts.id.initialize({
      client_id: '660809795185-6lh3tkoq7mtd6t6mctio9b5binmsh24n.apps.googleusercontent.com',
      callback: handleCredentialResponse,
    });

    google.accounts.id.prompt((notification) => {
      if (notification.isNotDisplayed()) {
        console.log('Google Sign-In prompt not displayed');
      }
    });
  }

  function handleCredentialResponse(response) {
    var credential = response.credential;

    // Send the credential to your server for verification and user authentication
    // You can use Ajax to send the credential to your server

    // Example Ajax code (using jQuery)
    $.ajax({
      type: 'POST',
      url: 'process_google_login.php',
      data: { credential: credential },
      success: function (data) {
        // Handle the response from the server
        if (data.success) {
          // Redirect to the appropriate page
          if (data.usertype === 'user') {
            window.location.href = 'index.php';
          } else if (data.usertype === 'artist') {
            window.location.href = 'sellers-home.php';
          } else {
            console.log('Invalid user type');
          }
        } else {
          console.log('Google login failed');
        }
      },
      error: function (xhr, status, error) {
        console.log('Ajax request failed');
      },
    });
  }
</script>



</html>