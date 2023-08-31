<?php
  $page = 'Signup';
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
                <form name="signupform" id="signupform" class="sign-in-form" action="admin/inc/process.php?action=SignUp" method="post" autocomplete="off">
                     <?php
							 if($msg == 'sucess'){ ?>
							<div class="alert alert-success" id="alert" role="alert" style=" width:80%;text-align: center; margin: 0px auto;background:#ffcbb5;color: #000;font-weight:bold; border:none;">Email Register Successfully Please Check Your Email to Verify.</div>					
			<?php }  elseif($msg == 'failed'){ ?> <div class="alert alert-danger" id="alert" role="alert" style=" width:40%;text-align: center; margin: 0px auto;color: #fff;font-family: Calibri;">some thing went wrong</div> <?php }
			elseif($msg == 'alreadyemail'){ ?> <div class="alert alert-warning" id="alert" role="alert" style=" width:40%;text-align: center; margin: 0px auto;color: #fff;font-family: Calibri;">This Email already Used, Please try to login</div> <?php }?>
  	                <input type = "hidden" name="id" value="<?php echo ['id'];?>" required/>
                    <h2 class="m-0">Create an account</h2>
                    <p>Lets Go!</p>
                    <div class="mb-3">
                      <select class="form-control" id="userType" name="usertype" required>
                        <option value="" disabled selected>Select User Type</option>
                        <option value="user">User</option>
                        <option value="artist">Artist</option>
                      </select>
                    </div>

                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Name" id="Name" name="username" required>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text px-2 bg-white">
                        <img src="assets/img/email-icon.png" class="email-img" alt="email img">
                        </span>
                      </div>
                      <input type="email" class="form-control" placeholder="Email" id="usrr" name="email" required>
                    </div>
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
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Password" id="pass" name="password" required>
                    </div>
                    <div class="input-group">
                      <input type="password" class="form-control" placeholder="Confirm Password" id="confirmpass" name="password" required>
                    </div>
                     <div id="password-match-error" style="color: red;"></div>
                    <div class="d-flex align-items-center gap-2">
                      <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                      <label class="m-0" for="vehicle1">I agree to<a href="#"> term and conditions</a></label>
                    </div>
                    <button type="submit" class="btn w-100 login-btn mt-3" id="submitBtn" disabled>Create Account</button>
					
                    <div class="mid-or-span position-relative text-center my-4">
                       <span>OR</span>
                    </div>
                    <div class="google-btn">
                      <a href="#">
                      <button class="btn_sign_in_g btn goggle-btn w-100" type="button" id=""><img src="assets/img/devicon_google.png" alt="google-img" class="google"/><span class="fw-bold">Continue with Google</span></button>
                      </a>
                    </div>
                    <div class="accnt-or-not text-center my-5">
                      <p>Already have an account ? <a href="signin.php" class="text-decoration-underline">Log in</a></p>
                    </div>
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

