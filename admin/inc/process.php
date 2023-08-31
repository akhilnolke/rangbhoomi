<?php 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
ob_start();
session_start();
include('function.php');
$users = new Rangbhoomi();
$con = mysqli_connect(DbHost, DbUser, DbPass, DbName) or die('Could not connect:' . mysqli_connect_error());
 define('BASE_URL', 'https://www.mitdevelop.com/rangbhoomi/');
 
//  Admin Section
 
/* Login */

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'LoginFunction') {
    extract($_REQUEST);
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);
    
    $data = $users->LoginId($username,$password);

    if ($data):
        header('location:../index.php?msg=suc');
    else:
        header('location:../login.php?msg=fail');
    endif;
} 

/* Logout */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Logout') {
     session_start(); 
    session_unset();
    session_destroy();
    header("location:../login.php");
}

// Admin Section end

// User Section

/*user  Logout */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'UserLogout') {
     session_start(); 
    session_unset();
    session_destroy();
    header("location:../../index.php");
}

 /* User Sign Up */

elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'SignUp') {
    extract($_REQUEST);
     $email = mysqli_real_escape_string($con, $email);
     $password = mysqli_real_escape_string($con, $password);
     $username = mysqli_real_escape_string($con, $username);
     $phone = mysqli_real_escape_string($con, $phone);
    $phone = mysqli_real_escape_string($con, $phone);
    $usertype = mysqli_real_escape_string($con, $usertype);
     
    $EmailValidation = $users->GetEmailBySignup($email);
     if($EmailValidation['email'] == $email) {
 header('location:../../signup.php?msg=alreadyemail');
// echo 'This Email already Used, Please try to login';
}else{
    
    
    function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
     
  $activationcode = generateRandomString();
   
     $data = $users->Signup($username,$email,$password,$phone,$activationcode,$usertype);

     if ($data):
        
       $subject = "Please verify your email address";
$to = $email;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:gagan13420@gmail.com'. "\r\n";
$message .= 'Welcome  <b>'. $username. '</b><br>'. "\r\n";
$message .= 'Thanking you for joining us. '. "\r\n\r\n\r\n";
$message .= '

 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	   
	  <tbody>

		
		<tr>
		  <td align="center">
			<table class="col-600" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:0; width: 100%;">
			  <tbody>
				<tr>
				  <td align="center" style="border: 1px solid #e5e5e5;;">
					<table class="col-600" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
					  <tbody>
						<tr>
						  <td align="right">
							<table width="287" border="0" align="left" cellpadding="0" cellspacing="0" class="col2" style="">
							  <tbody>
								<tr>
								  <td align="center">
									<table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">
									  </td>
									  </tr>
									  </tbody>
									</table>
								  </td>
								</tr>
							  </tbody>
							</table>
						  </td>
						</tr>
					   
			   <section class="middle_section" style="">
					  <div class="" style="padding:20px 0;">
<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8">
  <tr>
	<td>
	  <table style="background-color: #f7c1b7; max-width:100%;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		  <td style=";">&nbsp;</td>
		</tr>
		<tr>
		  <td style="text-align:center;">
			<a href="#" title="logo" target="_blank">
			  <img width="30%" src="'.BASE_URL.'assets/img/main-logo.png" title="logo" alt="logo">
			</a>
		  </td>
		</tr>
		<tr>
		  <td style="height:20px;">&nbsp;</td>
		</tr>
		<tr>
		  <td>
			<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:left;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
			  <tr>
				<td style="height:40px;">&nbsp;</td>
			  </tr>
			  <tr>
				<td style="padding:0 35px;">
				  <h1 style="color:#063e5d; font-weight:500; margin:0;font-size:32px; text-align:center;">Activate your account
				   <span style="display:block; margin-left:auto; margin-right:auto; margin-top:19px; margin-bottom:30px; border-bottom:1px solid #cecece; width:100px;"></span>
				  </h1>
			  
				  <p style="color:#455056; font-size:17px;line-height:24px; margin:0;font-weight:500;">Hi  '.$RecoveryEmail["username"].'</p>
				  <br/>
				  <p style="font-family: Tahoma, sans-serif; color:#455056; font-size:15px;line-height:24px; margin:0;">

There was a request to activate your account!

If you did not make this request then please ignore this email.

Otherwise, please click below to activate your account: 
				  </p><br>
				  
				  <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">Regards,</p>
				   <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">Team Rangbhoomi</p>
				 
				 
				</td>
			  </tr>
			  <br>
			 	<tr>
					<td height="5" align="center">
					
						 Click Here to Activate Your Account:<b><a href="'.BASE_URL.'activation.php?code='.$activationcode.'">Activate Account</a></b><br>
					
					</td>
						
		</tr>
			  <tr>
				<td style="height:40px;">&nbsp;</td>
			  </tr>
			</table>
		  </td>
		<tr>
		  <td style="height:20px;">&nbsp;</td>
		</tr>
		<tr>
		  <td style="text-align:center;">
			<!-- <a  href= "https://hira.one/" style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>https://www.hira.one/</strong></a> -->
		  </td>
		</tr>
		<tr>
		  <td style="">&nbsp;</td>
		</tr>
	  </table>
	</td>
  </tr>
</table>


					  </div>
					  </div>
					</section>
						
						<tr>
					   <td align="center">
						 <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
						   <tbody>
							 <tr>
							   <td align="center" bgcolor="#34495e" background="https://kkosha.mitdevelop.com/assets/images/tea-bannerr-copy.jpg" height="185">
							   
								 <table class="col-600" width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
								   <tbody>
									 <tr>
									   <td align="center" style="font-family: Raleway,  sans-serif; font-size:22px; font-weight: 500; color:#858585;">Follow US</td>
									 </tr>
								   </tbody>
								 </table>
								 <br>
								 
								 <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
								<tbody>
									 <tr style="justify-content:center;width: 60%; ;margin: 0 auto;padding: 31px;">
									   <td align="center" width="10%" style=" padding:0 10px;vertical-align: top;">
										 <a href="#" target="_blank"> <img src="'.BASE_URL.'admin/assets/images/instagram.png"> </a>
									   </td>
									   <td align="center" class="margin" width="10%" style=" padding:0 10px;vertical-align: top;">
										 <a href="#" target="_blank"> <img src="'.BASE_URL.'admin/assets/images/facebook.png"> </a>
									   </td>
									 <td align="center" width="10%" style=" padding:0 10px;vertical-align: top;">
										 <a href="#" target="_blank"> <img src="'.BASE_URL.'admin/assets/images/linkedin.png"> </a>
									   </td>
									 <td align="center" width="10%" style=" padding:0 10px;vertical-align: top;">
										 <a href="#" target="_blank"> <img src="'.BASE_URL.'admin/assets/images/youtube.png"> </a>
									   </td>
									 </tr>
								   </tbody>
								 </table>
								 <br>
								 <br>
								 <table class="col-600" width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
								   <tbody>
									 <tr>
									   <td align="center" style="font-family: Raleway,  sans-serif; font-size:12px; font-weight: 500; color:#858585;">You recieved this email from Rangbhoomi. If you would like to unsubscribe. <a href="#">click here</a></td>
									 </tr>
								   </tbody>
								 </table>
							   </td>
							 </tr>
						   </tbody>
						 </table>
					   </td>
					 </tr>
				   </tbody>
				 </table>
			   </td>
			
			  </tbody>
			</table>
'. "\r\n";

  $headers .= 'Cc:'. "\r\n";
 $mailto = mail($to,$subject,$message,$headers);
 
          header('location:../../signup.php?msg=sucess');
        //   echo 'Account Created Successfully!';
     else:
        header('location:../../signup.php?msg=failed');
        // echo 'Something Wrong !';
    endif; 
}
    
}
 
/* User Login */ 
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'UserLogins') {
    extract($_REQUEST);
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);
    $phone = mysqli_real_escape_string($con, $phone);
  
    $userinf = $users->UserByEmail($email, $phone);

    if (empty($userinf)) {
        echo 'Account with this email or phone number does not exist';
    } elseif (!isset($userinf['Status']) || $userinf['Status'] != 1) {
        echo 'Verification Pending. Please Check Your Email And Verify Your Account.';
    } elseif ($userinf['Status'] == 2) {
        echo 'Your Account Is Blocked, Please Contact Administrator';
    } else {
        if (($usertype == 'user' && $userinf['email'] != $email) || ($usertype == 'artist' && $userinf['email'] != $email)) {
            echo 'Invalid login credentials';
        } else {
            $data = $users->UserLoginId($email, $phone, $password);

            if ($data) {
                if ($userinf['usertype'] == 'user') {
                    header('Location: ../../index.php?msg=success');
                    exit();
                } elseif ($userinf['usertype'] == 'artist') {
                    header('Location: ../../sellers-home.php?msg=success');
                    exit();
                } else {
                    // Handle invalid user types
                    echo 'Invalid user type';
                }
            } else {
                header('Location: ../../signin-email.php?msg=fail');
                exit();
            }
        }
    }
}





 /* Forgot Password */
   
 elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ForgotPass') {
	extract($_REQUEST);
	   
$RecoveryEmail = $users->GetEmailBySignups($email);
	 if($RecoveryEmail['email'] == $email) {
		 
	 $id = $RecoveryEmail['user_id'];
	 $activationcodes = $RecoveryEmail['Activation_code'];
	
	$to = $email;
			$subject = 'Reset Password';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:guribwi123@gmail.com'."\r\n";
 $message .= ' 
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	   
	  <tbody>

		
		<tr>
		  <td align="center">
			<table class="col-600" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:0; width: 100%;">
			  <tbody>
				<tr>
				  <td align="center" style="border: 1px solid #e5e5e5;;">
					<table class="col-600" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
					  <tbody>
						<tr>
						  <td align="right">
							<table width="287" border="0" align="left" cellpadding="0" cellspacing="0" class="col2" style="">
							  <tbody>
								<tr>
								  <td align="center">
									<table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">
									  </td>
									  </tr>
									  </tbody>
									</table>
								  </td>
								</tr>
							  </tbody>
							</table>
						  </td>
						</tr>
					   
			   <section class="middle_section" style="">
					  <div class="" style="padding:20px 0;">
<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8">
  <tr>
	<td>
	  <table style="background-color: #f7c1b7; max-width:100%;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		  <td style=";">&nbsp;</td>
		</tr>
		<tr>
		  <td style="text-align:center;">
			<a href="#" title="logo" target="_blank">
			  <img width="30%" src="'.BASE_URL.'assets/img/main-logo.png" title="logo" alt="logo">
			</a>
		  </td>
		</tr>
		<tr>
		  <td style="height:20px;">&nbsp;</td>
		</tr>
		<tr>
		  <td>
			<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:left;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
			  <tr>
				<td style="height:40px;">&nbsp;</td>
			  </tr>
			  <tr>
				<td style="padding:0 35px;">
				  <h1 style="color:#063e5d; font-weight:500; margin:0;font-size:32px; text-align:center;">Reset Password
				   <span style="display:block; margin-left:auto; margin-right:auto; margin-top:19px; margin-bottom:30px; border-bottom:1px solid #cecece; width:100px;"></span>
				  </h1>
			  
				  <p style="color:#455056; font-size:17px;line-height:24px; margin:0;font-weight:500;">Hi  '.$RecoveryEmail["username"].'</p>
				  <br/>
				  <p style="font-family: Tahoma, sans-serif; color:#455056; font-size:15px;line-height:24px; margin:0;">

There was a request to change your password!

If you did not make this request then please ignore this email.

Otherwise, please click below to change your password: 
				  </p><br>
				  
				  <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">Regards,</p>
				   <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">Team Rangbhoomi</p>
				 
				 
				</td>
			  </tr>
			  <tr>
				<td style="text-align:center;">
				<a href="'.BASE_URL.'forgot-password-confirm.php?code='.$activationcodes.'&id='.$id.'" style="background:#000;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;text-align:center;">Reset Password</a>
				 
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;">&nbsp;</td>
			  </tr>
			</table>
		  </td>
		<tr>
		  <td style="height:20px;">&nbsp;</td>
		</tr>
		<tr>
		  <td style="text-align:center;">
			<!-- <a  href= "https://hira.one/" style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>https://www.hira.one/</strong></a> -->
		  </td>
		</tr>
		<tr>
		  <td style="">&nbsp;</td>
		</tr>
	  </table>
	</td>
  </tr>
</table>


					  </div>
					  </div>
					</section>
						
						<tr>
					   <td align="center">
						 <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
						   <tbody>
							 <tr>
							   <td align="center" bgcolor="#34495e" background="https://kkosha.mitdevelop.com/assets/images/tea-bannerr-copy.jpg" height="185">
							   
								 <table class="col-600" width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
								   <tbody>
									 <tr>
									   <td align="center" style="font-family: Raleway,  sans-serif; font-size:22px; font-weight: 500; color:#858585;">Follow US</td>
									 </tr>
								   </tbody>
								 </table>
								 <br>
								 
								 <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
									<tbody>
									 <tr style="justify-content:center;width: 60%; ;margin: 0 auto;padding: 31px;">
									   <td align="center" width="10%" style=" padding:0 10px;vertical-align: top;">
										 <a href="#" target="_blank"> <img src="'.BASE_URL.'admin/assets/images/instagram.png"> </a>
									   </td>
									   <td align="center" class="margin" width="10%" style=" padding:0 10px;vertical-align: top;">
										 <a href="#" target="_blank"> <img src="'.BASE_URL.'admin/assets/images/facebook.png"> </a>
									   </td>
									 <td align="center" width="10%" style=" padding:0 10px;vertical-align: top;">
										 <a href="#" target="_blank"> <img src="'.BASE_URL.'admin/assets/images/linkedin.png"> </a>
									   </td>
									 <td align="center" width="10%" style=" padding:0 10px;vertical-align: top;">
										 <a href="#" target="_blank"> <img src="'.BASE_URL.'admin/assets/images/youtube.png"> </a>
									   </td>
									 </tr>
								   </tbody>
								 </table>
								 <br>
								 <br>
								 <table class="col-600" width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
								   <tbody>
									 <tr>
									   <td align="center" style="font-family: Raleway,  sans-serif; font-size:12px; font-weight: 500; color:#858585;">You recieved this email from Rangbhoomi. If you would like to unsubscribe. <a href="#">click here</a></td>
									 </tr>
								   </tbody>
								 </table>
							   </td>
							 </tr>
						   </tbody>
						 </table>
					   </td>
					 </tr>
				   </tbody>
				 </table>
			   </td>
			
			  </tbody>
			</table>
 ';
 // $headers .= 'Cc:'. "\r\n";
 $mailto = mail($to,$subject,$message,$headers);

 
	if ($mailto)
		  header('location:../../forgot-password.php?msg=emailsent');
}
else{
  header('location:../../forgot-password.php?msg=invalid-email');
   
}
}

/*Update Reset password*/
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ResetPassword') {
    extract($_REQUEST);
     $password = mysqli_real_escape_string($con, $password);
     $activationcodes = mysqli_real_escape_string($con, $activationcodes);
   
  $data = $users->ResetPasswords($id,$password,$activationcodes);
 
   if ($data):
        header('location:../../forgot-password-confirm.php?msg=succ');
    else:
        header('location:../../forgot-password-confirm.php?msg=faill');
    endif;  
}
 
 /* Add slider */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AddSlider') {
    extract($_REQUEST);
     $title = mysqli_real_escape_string($con, $title);
     $image = mysqli_real_escape_string($con, $image);
    
	  if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
           $desired_dir1 = "../assets/images/banner/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $image = $_FILES['image']['name'];
    }
      
	  $data = $users->InsertSlider($title,$image);
    
    if ($data):
        header('location:../slider.php?msg=suc');
    else:
        header('location:../add-slider.php?msg=fail');
    endif;
	}
	
 /* Edit slider  */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'EditSlider') {
    extract($_REQUEST);
       if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
           $desired_dir1 = "../assets/images/banner/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $image = $_FILES['image']['name'];
         if (!empty($image)) {
           echo $image = $_FILES['image']['name'];
        } else {
            echo $image = $imgs1;
        }
        
    }
      
     $data=$users->SliderEdit($id,$title,$image);

    if ($data):
        header('location:../slider.php?msg=suc');
    else:
        header('location:../edit-slider.php?msg=fail');
    endif;
    
}
/* Delete  Slider  */
 elseif (isset($_REQUEST['deleteSlider'])) {
    extract($_REQUEST);
	 $id = $deleteSlider;
	  $data = $users->DeleteSlider($id);

    if ($data):  
        header('location:../slider.php?msg=sucdel&step=Add');
    else:
        header('location:../slider.php?msg=fail&step=Add');
    endif;
	}

 /* Add  categories */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AddCategory') {
    extract($_REQUEST);
	if (isset($_FILES['category_image'])) {
        $file_name = $_FILES['category_image']['name'];
        $file_size = $_FILES['category_image']['size'];
        $file_tmp = $_FILES['category_image']['tmp_name'];
        $file_type = $_FILES['category_image']['type'];
           $desired_dir1 = "../assets/images/categoryimages/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $category_image = $_FILES['category_image']['name'];
    }
	  $data = $users->insertCategories($category_name,$category_image);
    
    if ($data):
        header('location:../categories.php?msg=suc&step=Add');
    else:
        header('location:../categories.php?msg=fail&step=Add');
    endif;
	}

  /* Edit service categories  */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'EditCategories') {
    extract($_REQUEST);
     if (isset($_FILES['category_image'])) {
        $file_name = $_FILES['category_image']['name'];
        $file_size = $_FILES['category_image']['size'];
        $file_tmp = $_FILES['category_image']['tmp_name'];
        $file_type = $_FILES['category_image']['type'];
           $desired_dir1 = "../assets/images/categoryimages/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $category_image = $_FILES['category_image']['name'];
         if (!empty($category_image)) {
           echo $category_image = $_FILES['category_image']['name'];
        } else {
            echo $category_image = $imgs2;
        }
        
    }
     $data=$users->EditCategories($id,$category_name,$category_image);

    if ($data):
         header('location:../categories.php?msg=editsuc&step=Edit&id='.$id);
    else:
        header('location:../categories.php?msg=fail&step=Edit');
    endif;
    
}
/* Delete  categories  */
 elseif (isset($_REQUEST['deleteCategorie'])) {
    extract($_REQUEST);
	 $id = $deleteCategorie;
	  $data = $users->DeleteCategories($id);

    if ($data):  
        header('location:../categories.php?msg=sucdel&step=Add');
    else:
        header('location:../categories.php?msg=fail&step=Add');
    endif;
	}
	
	 /* Add product */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AddProduct') {
    extract($_REQUEST);
     $product_category = mysqli_real_escape_string($con, $product_category);
     $product_image = mysqli_real_escape_string($con, $product_image);
     $product_name = mysqli_real_escape_string($con, $product_name);
     $product_price = mysqli_real_escape_string($con, $product_price);
     $product_sale_price = mysqli_real_escape_string($con, $product_sale_price);
     $offer = mysqli_real_escape_string($con, $offer);
      $rating = mysqli_real_escape_string($con, $rating);
     $description = mysqli_real_escape_string($con, $description);
    
	  if (isset($_FILES['product_image'])) {
        $file_name = $_FILES['product_image']['name'];
        $file_size = $_FILES['product_image']['size'];
        $file_tmp = $_FILES['product_image']['tmp_name'];
        $file_type = $_FILES['product_image']['type'];
        $desired_dir1 = "../assets/images/productimage/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $product_image = $_FILES['product_image']['name'];
    }
      
	  $data = $users->InsertProducts($product_category,$product_image,$product_name,$product_price,$product_sale_price,$offer,$rating,$description);
    
    if ($data):
        header('location:../product.php?msg=suc');
    else:
        header('location:../add-product.php?msg=fail');
    endif;
	}
	
  /* Edit product  */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'EditProduct') {
    extract($_REQUEST);
    $product_category = mysqli_real_escape_string($con, $product_category);
     $product_image = mysqli_real_escape_string($con, $product_image);
     $product_name = mysqli_real_escape_string($con, $product_name);
     $product_price = mysqli_real_escape_string($con, $product_price);
     $product_sale_price = mysqli_real_escape_string($con, $product_sale_price);
     $offer = mysqli_real_escape_string($con, $offer);
      $rating = mysqli_real_escape_string($con, $rating);
     $description = mysqli_real_escape_string($con, $description);
     if (isset($_FILES['product_image'])) {
        $file_name = $_FILES['product_image']['name'];
        $file_size = $_FILES['product_image']['size'];
        $file_tmp = $_FILES['product_image']['tmp_name'];
        $file_type = $_FILES['product_image']['type'];
           $desired_dir1 = "../assets/images/productimage/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $product_image = $_FILES['product_image']['name'];
         if (!empty($product_image)) {
           echo $product_image = $_FILES['product_image']['name'];
        } else {
            echo $product_image = $imgs4;
        }
        
    }
     $data=$users->EditProducts($id,$product_category,$product_image,$product_name,$product_price,$product_sale_price,$offer,$rating,$description);

    if ($data):
         header('location:../product.php?msg=editsuc');
    else:
        header('location:../edit-product.php?msg=fail');
    endif;
    
}

/* Delete  products  */
 elseif (isset($_REQUEST['deleteProduct'])) {
    extract($_REQUEST);
	 $id = $deleteProduct;
	  $data = $users->DeleteProducts($id);

    if ($data):  
        header('location:../product.php?msg=sucdel');
    else:
        header('location:../product.php?msg=fail');
    endif;
	}
	
			/* Edit About us */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Aboutus') {
    extract($_REQUEST);
     $title = mysqli_real_escape_string($con, $title);
     $image = mysqli_real_escape_string($con, $image);
     $content = mysqli_real_escape_string($con, $content);
    
	if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
           $desired_dir1 = "../assets/images/aboutus/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $image = $_FILES['image']['name'];
		   if (!empty($image)) {
           echo $image = $_FILES['image']['name'];
        } else {
            echo $image = $imgs1;
        }
	 }
   
     $data=$users->EditAboutus($id,$title,$image,$content);

    if ($data):
          header('location:../aboutus.php?id=1');
    else:
        header('location:../aboutus.php?msg=fail');
    endif; 
    
}

	/* Edit Why Choose   us */
	
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'WhyChooseUs') {
    extract($_REQUEST);
     $heading = mysqli_real_escape_string($con, $heading);
     $sub_heading = mysqli_real_escape_string($con, $sub_heading);
     $title1 = mysqli_real_escape_string($con, $title1);
     $image1 = mysqli_real_escape_string($con, $image1);
     $content1 = mysqli_real_escape_string($con, $content1);
     $title2 = mysqli_real_escape_string($con, $title2);
     $image2 = mysqli_real_escape_string($con, $image2);
     $content2 = mysqli_real_escape_string($con, $content2);
     $title3 = mysqli_real_escape_string($con, $title3);
     $image3 = mysqli_real_escape_string($con, $image3);
     $content3 = mysqli_real_escape_string($con, $content3);
     $title4 = mysqli_real_escape_string($con, $title4);
     $image4 = mysqli_real_escape_string($con, $image4);
     $content4 = mysqli_real_escape_string($con, $content4);
     $left_image = mysqli_real_escape_string($con, $left_image);
    
    		if (isset($_FILES['image1'])) {
        $file_name = $_FILES['image1']['name'];
        $file_size = $_FILES['image1']['size'];
        $file_tmp = $_FILES['image1']['tmp_name'];
        $file_type = $_FILES['image1']['type'];
           $desired_dir1 = "../assets/images/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $image1 = $_FILES['image1']['name'];
		   if (!empty($image1)) {
           echo $image1 = $_FILES['image1']['name'];
        } else {
            echo $image1 = $imgs1;
        }
	 }
	 
	 	if (isset($_FILES['image2'])) {
        $file_name = $_FILES['image2']['name'];
        $file_size = $_FILES['image2']['size'];
        $file_tmp = $_FILES['image2']['tmp_name'];
        $file_type = $_FILES['image2']['type'];
           $desired_dir1 = "../assets/images/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $image2 = $_FILES['image2']['name'];
		   if (!empty($image2)) {
           echo $image2 = $_FILES['image2']['name'];
        } else {
            echo $image2 = $imgs2;
        }
	 }
	 	if (isset($_FILES['image3'])) {
        $file_name = $_FILES['image3']['name'];
        $file_size = $_FILES['image3']['size'];
        $file_tmp = $_FILES['image3']['tmp_name'];
        $file_type = $_FILES['image3']['type'];
           $desired_dir1 = "../assets/images/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $image3 = $_FILES['image3']['name'];
		   if (!empty($image3)) {
           echo $image3 = $_FILES['image3']['name'];
        } else {
            echo $image3 = $imgs3;
        }
	 }
	 
	 	if (isset($_FILES['image4'])) {
        $file_name = $_FILES['image4']['name'];
        $file_size = $_FILES['image4']['size'];
        $file_tmp = $_FILES['image4']['tmp_name'];
        $file_type = $_FILES['image4']['type'];
           $desired_dir1 = "../assets/images/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $image4 = $_FILES['image4']['name'];
		   if (!empty($image4)) {
           echo $image4 = $_FILES['image4']['name'];
        } else {
            echo $image4 = $imgs4;
        }
	 	}
	 	if (isset($_FILES['left_image'])) {
        $file_name = $_FILES['left_image']['name'];
        $file_size = $_FILES['left_image']['size'];
        $file_tmp = $_FILES['left_image']['tmp_name'];
        $file_type = $_FILES['left_image']['type'];
           $desired_dir1 = "../assets/images/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $left_image = $_FILES['left_image']['name'];
		   if (!empty($left_image)) {
           echo $left_image = $_FILES['left_image']['name'];
        } else {
            echo $left_image = $leftimgs;
        }
	 	}
   
     $data=$users->EditWhyChooseUs($id,$heading,$sub_heading,$title1,$content1,$image1,$title2,$content2,$image2,$title3,$content3,$image3,$title4,$content4,$image4,$left_image);

    if ($data):
          header('location:../why-choose-us.php?id=1');
    else:
        header('location:../why-choose-us.php?msg=fail');
    endif; 
    
}


// User Section end


            //   Artist Section

 /* Add  Artist Art Work */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ArtworkForm') {
    extract($_REQUEST);

	if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
           $desired_dir1 = "../assets/images/Artwork/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $image = $_FILES['image']['name'];
    }
    
    if (isset($_FILES['upload_image'])) {
        $file_name = $_FILES['upload_image']['name'];
        $file_size = $_FILES['upload_image']['size'];
        $file_tmp = $_FILES['upload_image']['tmp_name'];
        $file_type = $_FILES['upload_image']['type'];
           $desired_dir1 = "../assets/images/Artwork/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $upload_image = $_FILES['upload_image']['name'];
    }
    
   
    
  // Handle file upload
    if (isset($_FILES['select_files'])) {
        $select_files = $_FILES['select_files'];
        $selected_files = array();

        foreach ($select_files['name'] as $key => $value) {
            $file_name = $select_files['name'][$key];
            $file_size = $select_files['size'][$key];
            $file_tmp = $select_files['tmp_name'][$key];
            $file_type = $select_files['type'][$key];
            $desired_image_dir = "../assets/images/Artwork/"; // Directory to store image files

            // Get the file extension
            $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            // Check if the file is an image (jpg, jpeg, png, gif)
            if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                // Move the image file to the image directory
                move_uploaded_file($file_tmp, "$desired_image_dir/" . $file_name);

                $selected_files[] = $file_name; // Store the image file name in an array
            }
        }

        // If there are selected image files, convert the array to a comma-separated string
        $selected_files_str = implode(',', $selected_files);
    } else {
        // If no image files were selected, handle this case accordingly.
        // For example, you can set a default image or show an error message.
        $selected_files_str = '';
    }
// Retrieve keywords from the form using $_REQUEST['keyword']
    if (isset($_REQUEST['keyword'])) {
        // Use implode to join the keywords into a comma-separated string
        $keywords = implode(',', $_REQUEST['keyword']);
    } else {
        // If the 'keyword' array is not set or empty, set an empty string for the keywords
        $keywords = '';
    }
    
 
    
    
   $data = $users->insertArtWork($userid,$title,$image,$installed_hardware,$decorative_frame,$category,$medium,$maaterial,$subject,$styles,$year,$width,$height,$keywords,$review,$availability_for_sale,$packaging,$art_price,$commission_price,$shipping_price,$listed_price,$range_price,$for_sale,$upload_image,$material,$canvas_wrap,$selected_files_str,$tableData);
    
    
    if ($data):
        
        header('location:../../uploaded-artwork.php?msg=suc');
    else:
        header('location:../../upload-art.php?msg=fail');
    endif;
	}
	
	 /* Add cart items */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Addtocarts') {
    extract($_REQUEST);
     $title = mysqli_real_escape_string($con, $title);
     $product_image = mysqli_real_escape_string($con, $product_image);
     $artwork_id = mysqli_real_escape_string($con, $artwork_id);
     $price = mysqli_real_escape_string($con, $price);
     $quantity = mysqli_real_escape_string($con, $quantity);
     $category = mysqli_real_escape_string($con, $category);
      $size = mysqli_real_escape_string($con, $size);
    
	  if (isset($_FILES['product_image'])) {
        $file_name = $_FILES['product_image']['name'];
        $file_size = $_FILES['product_image']['size'];
        $file_tmp = $_FILES['product_image']['tmp_name'];
        $file_type = $_FILES['product_image']['type'];
           $desired_dir1 = "../assets/images/cartitems/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $product_image = $_FILES['product_image']['name'];
    }
      
	  $data = $users->InsertCartitems($title,$product_image,$artwork_id,$price,$quantity,$category,$size);
    
    if ($data):
        header('location:../../cart.php?msg=suc');
    else:
        header('location:../../cart.php?msg=success');
    endif;
	}
 
 // update quantity
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'UpdateQuantity') {
    extract($_REQUEST);
    
      $data=$users->UpdateQuantity($id, $quantity, $user_id);

    if ($data) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to update quantity'));
    }
}





// ... remove cart item  ...

elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'RemoveItem') {
    extract($_REQUEST);

    $data = $users->RemoveCartItem($user_id, $item_id);

    if ($data) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to remove item'));
    }
}

	/* Edit artwork */
	
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'editArtworkForm') {
    extract($_REQUEST);
$id = mysqli_real_escape_string($con, $id);
$userid = mysqli_real_escape_string($con, $userid);
$title = mysqli_real_escape_string($con, $title);
$image = mysqli_real_escape_string($con, $image);
$installed_hardware = mysqli_real_escape_string($con, $installed_hardware);
$decorative_frame = mysqli_real_escape_string($con, $decorative_frame);
$category = mysqli_real_escape_string($con, $category);
$medium = mysqli_real_escape_string($con, $medium);
$material = mysqli_real_escape_string($con, $material);
$subject = mysqli_real_escape_string($con, $subject);
$styles = mysqli_real_escape_string($con, $styles);
$year = mysqli_real_escape_string($con, $year);
$width = mysqli_real_escape_string($con, $width);
$height = mysqli_real_escape_string($con, $height);
$keywords = mysqli_real_escape_string($con, $keywords);
$review = mysqli_real_escape_string($con, $review);
$availability_for_sale = mysqli_real_escape_string($con, $availability_for_sale);
$packaging = mysqli_real_escape_string($con, $packaging);
$art_price = mysqli_real_escape_string($con, $art_price);
$commission_price = mysqli_real_escape_string($con, $commission_price);
$shipping_price = mysqli_real_escape_string($con, $shipping_price);
$listed_price = mysqli_real_escape_string($con, $listed_price);
$range_price = mysqli_real_escape_string($con, $range_price);
$for_sale = mysqli_real_escape_string($con, $for_sale);
$upload_image = mysqli_real_escape_string($con, $upload_image);
$material = mysqli_real_escape_string($con, $material);
$canvas_wrap = mysqli_real_escape_string($con, $canvas_wrap);
$selected_files_str = mysqli_real_escape_string($con, $selected_files_str);
$tableData = mysqli_real_escape_string($con, $tableData);


    
    		if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
           $desired_dir1 = "../assets/images/Artwork/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $image = $_FILES['image']['name'];
		   if (!empty($image)) {
           echo $image = $_FILES['image']['name'];
        } else {
            echo $image = $img1;
        }
	 }
	 
	 	if (isset($_FILES['upload_image'])) {
        $file_name = $_FILES['upload_image']['name'];
        $file_size = $_FILES['upload_image']['size'];
        $file_tmp = $_FILES['upload_image']['tmp_name'];
        $file_type = $_FILES['upload_image']['type'];
           $desired_dir1 = "../assets/images/Artwork/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $upload_image = $_FILES['upload_image']['name'];
		   if (!empty($upload_image)) {
           echo $upload_image = $_FILES['upload_image']['name'];
        } else {
            echo $upload_image = $imgs1;
        }
	 }
	 	
	 
if (isset($_FILES['select_files'])) {
    $select_files = $_FILES['select_files'];
    $selected_files = array();

    foreach ($select_files['name'] as $key => $value) {
        $file_name = $select_files['name'][$key];
        $file_size = $select_files['size'][$key];
        $file_tmp = $select_files['tmp_name'][$key];
        $file_type = $select_files['type'][$key];
        $desired_image_dir = "../assets/images/Artwork/"; // Directory to store image files

        // Get the file extension
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Check if the file is an image (jpg, jpeg, png, gif)
        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            // Move the image file to the image directory
            move_uploaded_file($file_tmp, "$desired_image_dir/" . $file_name);

            $selected_files[] = $file_name; // Store the image file name in an array
        }
    }

    // If there are selected image files, convert the array to a comma-separated string
    $selected_files_str = implode(',', $selected_files);
} else {
    // If no image files were selected, handle this case accordingly.
    // For example, you can set $selected_files_str to a default value or an empty string.
    $selected_files_str = '';
}
// Retrieve keywords from the form using $_REQUEST['keyword']
    if (isset($_REQUEST['keyword'])) {
        // Use implode to join the keywords into a comma-separated string
        $keywords = implode(',', $_REQUEST['keyword']);
    } else {
        // If the 'keyword' array is not set or empty, set an empty string for the keywords
        $keywords = '';
    }
     $data=$users->EditArtwork($id,$userid,$title,$image,$installed_hardware,$decorative_frame,$category,$medium,$maaterial,$subject,$styles,$year,$width,$height,$keywords,$review,$availability_for_sale,$packaging,$art_price,$commission_price,$shipping_price,$listed_price,$range_price,$for_sale,$upload_image,$material,$canvas_wrap,$selected_files_str,$tableData);

    if ($data):
        header('Location: ../../seller-edit-product.php?Id=' . $id);
    else:
        header('location:../../seller-edit-product.php?msg=fail');
    endif; 

}


/* Edit Profile */

elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'EditProfile') {
    extract($_REQUEST);
     	if (isset($_FILES['profile_image'])) {
        $file_name = $_FILES['profile_image']['name'];
        $file_size = $_FILES['profile_image']['size'];
        $file_tmp = $_FILES['profile_image']['tmp_name'];
        $file_type = $_FILES['profile_image']['type'];
           $desired_dir1 = "../assets/images/profileimage/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $profile_image = $_FILES['profile_image']['name'];
		   if (!empty($profile_image)) {
           echo $profile_image = $_FILES['profile_image']['name'];
        } else {
            echo $profile_image = $profile_image1;
        }
	 }
    $data = $users->EditProfilee($userid, $profile_image, $name, $email, $phone, $country, $state, $pin_code, $about);

    if ($data) {
        header('Location: ../../profile-edit.php?user_id=' . $userid); // Corrected variable name here
    } else {
        header('Location: ../../profile-edit.php?msg=failllll');
    }
}


/* Add Reviews */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'reviews') {
    extract($_REQUEST);
     $rating = mysqli_real_escape_string($con, $rating);
     $review = mysqli_real_escape_string($con, $review);
     $name = mysqli_real_escape_string($con, $name);
     $city = mysqli_real_escape_string($con, $city);
     $email = mysqli_real_escape_string($con, $email);
	  
      
	  $data = $users->InsertReview($rating,$review,$name,$email);
    
    if ($data):
        header('location:../../product.php?msg=suc');
    else:
        header('location:../../product.php?msg=fail');
    endif;
	}




/* Add to Wishlist */
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'wishlist') {
    extract($_REQUEST);
    $artworkId = mysqli_real_escape_string($con, $artwork_id);
    $userId = mysqli_real_escape_string($con, $user_id);
    $productName = mysqli_real_escape_string($con, $product_name);
    $productPrice = mysqli_real_escape_string($con, $product_price);
    $productImage = mysqli_real_escape_string($con, $product_image);
    $productWidth = mysqli_real_escape_string($con, $product_width);
    $productHeight = mysqli_real_escape_string($con, $product_height);
    $productCategory = mysqli_real_escape_string($con, $product_category);

	  if (isset($_FILES['productImage'])) {
        $file_name = $_FILES['productImage']['name'];
        $file_size = $_FILES['productImage']['size'];
        $file_tmp = $_FILES['productImage']['tmp_name'];
        $file_type = $_FILES['productImage']['type'];
           $desired_dir1 = "../assets/images/Artwork/";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $productImage = $_FILES['productImage']['name'];
    }



    // Check if the item is already in the wishlist
    $isInWishlist = $users->CheckIfInWishlist($artworkId);

    if ($isInWishlist) {
        // Remove the item from the wishlist
        $data = $users->RemoveFromWishlist($artworkId);
    } else {
        // Add the item to the wishlist
        $data = $users->AddToWishlist($artworkId, $userId, $productName, $productPrice, $productImage, $productWidth, $productHeight, $productCategory);
    }
    
    if ($data) {
        header('location:../../product.php?msg=suc');
    } else {
        header('location:../../product.php?msg=fail');
    }
}


/* Delete  wishlist  */
 elseif (isset($_REQUEST['deleteWishlists'])) {
    extract($_REQUEST);
	 $id = $deleteWishlists;
	  $data = $users->deleteWishlist($id);

    if ($data):  
        header('location:../../wishlist.php?msg=sucdel');
    else:
        header('location:../../wishlist.php?msg=fail');
    endif;
	}


 // Update delete status
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'deleteproductss') {
    extract($_REQUEST);
   
    $data = $users->DeleteProductssssss($id, 1); // Update status to 1 (deleted)

    if ($data) {
        header('location:../../uploaded-artwork.php?msg=suc');
    } else {
        header('location:../../uploaded-artwork.php?msg=fail');
    }
}




// 	Artist End

?>






