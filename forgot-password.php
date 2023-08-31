<?php
  $page = 'Forgot Password';
  include('inc/header.php'); 
  ?>
<body>
  <main class="main-container">
    <div class="contain-wrapper">
      <!-- header -->
 
        <!--SIGN IN-->
        <section class="sign-in-section mb-4">
          <div class="sign-in-wrapper py-5">
            <div class="container">
              <div class="row signin-rw rounded">
                <div class="col-lg-6  px-0">
                  <img src="assets/img/sighnup-img.png" alt="sign up art img" class="w-100 h-100">
                </div>
                <div class="col-lg-6">
             

                <form name="signupform" id="signupform" class="sign-in-form" action="admin/inc/process.php?action=ForgotPass" autocomplete="off" method="post">
                      <?php
						 if($msg == 'emailsent'){ ?>
							<div class="alert alert-success" id="alert" role="alert" style=" width:43%; border: 1px solid #dbdbdb;text-align: center; margin: 0px auto;">Check Your Email</div>					
			<?php } elseif($msg == 'invalid-email'){ ?>
				<div class="alert alert-danger" id="alert" role="alert" style=" width:43%; border: 1px solid #821c46;text-align: center; margin: 0px auto;">Invalid Email</div>
                <?php } ?>
                <input type="hidden" class="hide" name="token" id="token" value=""> 
                    <h2 class="m-0">Confirm your email</h2>
                    <p>Here!</p>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text px-2 bg-white">
                        <img src="assets/img/email-icon.png" class="email-img" alt="email img">
                        </span>
                      </div>
                      <input type="email" class="form-control" placeholder="Email" id="usrr" name="email" required>
                    </div>
                    <a href="forgot-password-confirm.php">
                    <button type="submit" class="btn w-100 login-btn mt-3">Confirm Email</button>
                    </a>
                  </form>
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