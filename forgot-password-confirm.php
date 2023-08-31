<?php
  $page = 'Forgot Password Confirm';
  include('inc/header.php');
  $id = $_GET['id'];
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
                <form name="signupform" id="signupform" class="sign-in-form" action="admin/inc/process.php?action=ResetPassword" method="post">
  	               <input type = "hidden" name="id" value="<?php echo $id;?>"/>
                    <h2 class="m-0">Confirm your password</h2>
                    <p>Lets Go!</p>
                     <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Password" id="pass" name="password" required>
                        <input type = "hidden" name="activationcodes" value="<?php echo $_GET['code'];?>"/>
                    </div>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Confirm Password" id="confirmpass" name="password" required>
                    </div>
                      <div id="password-match-error" style="color: red;"></div>
                 
                    <button type="submit" class="btn w-100 login-btn mt-3"id="submitBtn" disabled>Confirm password</button>
                     
                   
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

