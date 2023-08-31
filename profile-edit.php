<?php
session_start();
$page = 'Profile Edit';
include('inc/header.php'); 
$userid = $_SESSION['UserID'];
$EditUser = $obj->GetIdByUser($userid);
  ?>
  <style>
      .img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
 
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
.edit-upload-img{
    display:none;
}
.upload-label{
    cursor:pointer;
}
img#profile-image {
    width: 150px;
    height: 150px;
    object-fit: cover;
}
  </style>
<body>
  <main class="main-container">
    <div class="contain-wrapper">
      <!-- header -->
      <div class="separator d-flex align-items-center text-center justify-content-center my-4 gap-4">
            <h2 class="fw-bold">Profile Edit</h2>
          </div>
 
        <!--Profile Edit-->
         <div class="container-xl px-4 mt-5">
            <form class="" action="admin/inc/process.php?action=EditProfile" method="post" enctype="multipart/form-data">  
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header fw-bold">Profile Picture</div>
                <div class="card-body text-center">
                  <img id="profile-image" class="img-account-profile rounded-circle mb-2" src="admin/assets/images/profileimage/<?=$EditUser['profile_image'];?>" alt="">
                  <br>
                  <label class="bg-dark text-white px-3 py-2 rounded pe-auto upload-label">
                    <input id="image-input" name="profile_image" class="edit-upload-img" type="file" onchange="handleImageUpload(event)">
                    <input id="image-input" name="profile_image1" class="edit-upload-img" type="hidden" onchange="handleImageUpload(event)" value="<?php echo $EditUser['profile_image'];?>">
                    Edit image
                  </label>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header fw-bold">Account Details</div>
                <div class="card-body">
                    <form class="" action="admin/inc/process.php?action=EditProfile" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="userid" value="<?php echo $EditUser['user_id'];?>" />
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (  name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Name</label>
                                <input class="form-control" id="inputFirstName" name="name" type="text" placeholder="Enter your first name" value="<?php echo $EditUser['username'];?>">
                            </div>
                             <div class="col-md-6">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" name="email" type="email" placeholder="Enter your email address" value="<?php echo $EditUser['email'];?>">
                        </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (  name)-->
                            <!-- Form Group (Email address)-->
                          <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" name="phone" type="tel" placeholder="Enter your phone number" value="<?php echo $EditUser['phone'];?>">
                            </div>
                            <div class="col-md-6">
                            <label class="small mb-1" for="inputCountry">country</label>
                            <input class="form-control" id="inputCountry" name="country" type="text" placeholder="Enter your country" value="<?php echo $EditUser['country'];?>">
                        </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                           <div class="col-md-6">
                                <label class="small mb-1" for="inputState">State</label>
                                <input class="form-control" name="state" id="inputState" type="text" placeholder="Enter your state" value="<?php echo $EditUser['state'];?>">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPincode">pin code</label>
                                <input class="form-control" name="pin_code" id="inputPincode" type="number" placeholder="Enter your pincode" value="<?php echo $EditUser['pin_code'];?>">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (location)-->
                            <div class="col-md-12">
                                <label for="w3review">About</label>
                                <textarea class="w-100 form-control" id="w3review" name="about" rows="9" cols="50">
                                   <?php echo $EditUser['about'];?>
                                </textarea>
                            </div>
                        </div>
                       
                    
                        <!-- Save changes button-->
                        <button class="btn btn-dark" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
      </div>
        <!-- footer -->
        <?php
          include('inc/footer.php'); 
          ?>
          
</main>
</body>
  <script>
    function handleImageUpload(event) {
      const imageInput = event.target;
      const profileImage = document.getElementById('profile-image');
      
      if (imageInput.files && imageInput.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
          profileImage.src = e.target.result;
        };
        
        reader.readAsDataURL(imageInput.files[0]);
      }
    }
  </script>
</html>

