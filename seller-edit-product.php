<?php
  $page = 'Upload Art';
  include('inc/header.php'); 
  
    $id = $_GET['Id'];
  $artistproduct = $obj->GetArtProductsById($id); 
  
  ?>
  
  <style>
      /* CSS Part */
#imagePreview {
    width: 100%; /* Adjust the width of the image preview to fit its container */
    height: 100%; /* Adjust the height of the image preview to fit its container */
}

#imagePreview img {
    width: 100%; /* Set the width of the image to 100% of its container */
    height: 100%; /* Set the height of the image to 100% of its container */
    object-fit: cover; /* Scale the image to cover the entire container while maintaining aspect ratio */
}

.uploaded-images {
    display: flex;
    flex-wrap: wrap;
    gap: 10px; /* Adjust the value as needed */
}

.uploaded-image {
    width: 30%;
    height: auto;
    margin-bottom: 10px; /* Adjust the value as needed */
}



  </style>
<body>
  <main class="main-container">
    <div class="contain-wrapper">
      <!-- header -->
 
        <!--upload artwork-->
        <section class="upload-art-work">
          <div class="upload-art-content">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
              <ul class="d-flex upload-art-list list-unstyled">
                <li><a  href="#">My Artwork</a></li>
                <li><a  href="#">My Products</a></li>
                <li><a  href="#">My Earning</a></li>
              </ul>
              <ul class="d-flex upload-art-list list-unstyled align-items-center">
                <li><a  href="#">View My Shop</a></li>
                <li><a  href="#">Help</a></li>
                <li>
                  <a  href="#">
                    My Account
                    <svg viewBox="0 0 24 24">
                      <path fill="currentColor" d="M7,10L12,15L17,10H7Z" />
                    </svg>
                  </a>
                </li>
                <a href=" ">
                <button type="button" class="btn btn-dark px-3 artwork-btn">Add New Artwork</button>
                </a>
              </ul>
            </div>
          </div>
          <div class="upload-ur-art-container ">
            <div class="row">
              <div class="col-md-3 col-left-upld-imgs">
                <p class="bck-btn">
                  <svg  viewBox="0 0 24 24">
                    <path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
                  </svg>
                  Back
                </p>
               <div class="bg-upload">
    <h2>Image preview</h2>
    <p class="m-0">This image will be displayed on your product</p>
    <div class="upload-col-left-img" id="imagePreview">
        <?php
        if ($artistproduct['image']) {
            echo '<img src="admin/assets/images/Artwork/' . $artistproduct['image'] . '" alt="Product Image">';
        } else {
            echo 'No image available';
        }
        ?>
    </div>
</div>
              </div>
              <div class="col-md-9 col-right-upld-imgs">
                <div class="upload-right-content-form">
                  <div class="container-fluids">
                    <div class="row justify-content-center">
                      <div class=" ">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                          <h2 id="heading">Art work</h2>
                          <form id="msform" action="admin/inc/process.php?action=editArtworkForm" method="post" enctype="multipart/form-data">
                               <input type = "hidden" name="id" value="<?php echo $artistproduct['id'];?>" required/>
                               <input class="" type="hidden" name="userid" id="inlineRadio2" value="<?php echo $_SESSION['UserID'];?>">
                               
                                <!-- Add this input field to hold the calculated commission price -->
                                    <input type="hidden" name="commission_price" id="commission_price">
                                    
                                    <!-- Add this input field to hold the calculated listed price -->
                                    <input type="hidden" name="listed_price" id="listed_price">
                                    
                                     <!-- Add this input field to hold the calculated listed price -->
                                    <input type="hidden" name="shipping_price" id="shipping_price">
                            <!-- progressbar -->
                            <ul id="progressbar">
                              <li class="active" id="account"><strong>Images</strong></li>
                              <li id="personal"><strong>Description</strong></li>
                              <li id="payment"><strong>Price & detail</strong></li>
                              <li id="Prints"><strong>Prints</strong></li>
                              <li id="confirm"><strong>Final</strong></li>
                            </ul>
                            <!--<div class="progress">-->
                            <!--  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>-->
                            <!--</div>-->
                            <br>
                            <!-- fieldsets 1 -->
                            <fieldset>
                              <div class="form-card">
                                <div class="row">
                                  <!--<div class="col-7">-->
                                  <!--    <h2 class="fs-title">Account Information:</h2>-->
                                  <!--</div>-->
                                  <!--<div class="col-5">-->
                                  <!--    <h2 class="steps">Step 1 - 4</h2>-->
                                  <!--</div>-->
                                </div>
                                <h2 class="fs-title">Title</h2>
                                <input type="text" name="title" placeholder="Title" value="<?=$artistproduct['title']?>"/> 
                                                                   <div class="row">
                                        <label class="upload-img-lbl">
                                            Upload Image
                                            <input id="uploadFile" type="file" name="image" class="img preview-img-inp" accept="image/gif, image/jpeg, image/png" />
                                            <input type="hidden" class="img preview-img-inp" id="uploadFile" name="img1" value="<?=$artistproduct['image']?>"/>
                                        </label>
                                    </div>
                              </div>
                              <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <!-- fieldsets 2 -->
                            <fieldset>
                              <div class="form-card">
                                <div class="row">
                                  <!--<div class="col-7">-->
                                  <!--    <h2 class="fs-title">Personal Information:</h2>-->
                                  <!--</div>-->
                                  <!--<div class="col-5">-->
                                  <!--    <h2 class="steps">Step 2 - 4</h2>-->
                                  <!--</div>-->
                                </div>
                                <div class="row">
                                  <h2 class="fs-title">Description</h2>
                                  <div class="">
                                  <p class="fs-title-content fw-bold">Does this artwork come with installed hardware, ready to hang?</p>
                                  <div class="form-chk-box form-check-inline">
                                     <input class="" type="radio" name="installed_hardware" id="inlineRadio2" value="<?=$artistproduct['installed_hardware']?>" <?php if ($artistproduct['installed_hardware'] == 'Yes') echo 'checked'; ?>>
                                    <label class="form-check-label" for="flexCheckChecked">
                                    Yes
                                    </label>
                                  </div>
                                  <div class="form-chk-box form-check-inline">
                                    <input class="" type="radio" name="installed_hardware" id="inlineRadio3" value="<?=$artistproduct['installed_hardware']?>" <?php if ($artistproduct['installed_hardware'] == 'No') echo 'checked'; ?>>
                                    <label class="form-check-label" for="flexCheckChecked">
                                    No
                                    </label>
                                  </div>
                                </div>
                                  <div class="">
    <p class="fs-title-content fw-bold">Does the artwork include a decorative frame?</p>
    <div class="form-chk-box form-check-inline">
        <input class="" type="radio" name="decorative_frame" id="inlineRadio2" value="Yes"
            <?php if ($artistproduct['decorative_frame'] == 'Yes') echo 'checked'; ?>>
        <label class="form-check-label" for="inlineRadio2">
            Yes
        </label>
    </div>
    <div class="form-chk-box form-check-inline">
        <input class="" type="radio" name="decorative_frame" id="inlineRadio3" value="No"
            <?php if ($artistproduct['decorative_frame'] == 'No') echo 'checked'; ?>>
        <label class="form-check-label" for="inlineRadio3">
            No
        </label>
    </div>
</div>

                                  <div class="col-md-6">
                                    <label class="fieldlabels">Category</label> 
                                    <input type="text" name="category" placeholder="Category" value="<?=$artistproduct['category']?>"/> 
                                  </div>
                                  <div class="col-md-6">
                                    <label class="fieldlabels">Medium</label> 
                                    <input type="text" name="medium" placeholder="Medium" value="<?=$artistproduct['medium']?>"/> 
                                  </div>
                                  <div class="col-md-6">
                                    <label class="fieldlabels">Material</label> 
                                    <input type="text" name="maaterial" placeholder="Material" value="<?=$artistproduct['maaterial']?>"/> 
                                  </div>
                                  <div class="col-md-6">
                                    <label class="fieldlabels">Subject</label> 
                                    <input type="text" name="subject" placeholder="Subject" value="<?=$artistproduct['subject']?>"/> 
                                  </div>
                                  <div class="col-md-6">
                                    <label class="fieldlabels">Styles</label> 
                                    <input type="text" name="styles" placeholder="Styles" value="<?=$artistproduct['styles']?>"/> 
                                  </div>
                                  <div class="col-md-6">
                                    <label class="fieldlabels">Year</label> 
                                    <input type="text" name="year" placeholder="Year" value="<?=$artistproduct['year']?>"/> 
                                  </div>
                                </div>
                                
                               <!-- Size section -->
                                <div class="row">
                                  <h2 class="fs-title m-0">Sizes</h2>
                                  <div class="col-md-6">
                                    <label class="fieldlabels">Width</label>
                                    <input type="text" name="width" id="width" placeholder="Width (inches)" value="<?=$artistproduct['width']?>"/>
                                  </div>
                                  <div class="col-md-6">
                                    <label class="fieldlabels">Height</label>
                                    <input type="text" name="height" id="height" placeholder="Height (inches)" value="<?=$artistproduct['height']?>"/>
                                  </div>
                                </div>

                                
                                 <div class="row">
                                    <div class="col-12 title-description">
                                      <h2 class="fs-title m-0">Keyword</h2>
                                      <p class="m-0">Please add keywords from 6 to 10, to let the collector find your artwork more easily</p>
                                      <input type="text" id="listInput" placeholder="Enter 6 - 10 keywords" maxlength="12" value="<?=$artistproduct['keywords']?>"/>
                                      <ul id="listContainer" class="list-unstyled"></ul>
                                      <input type="hidden" name="keyword[]" id="keywordInput" value="">
                                    </div>
                                  </div>
                                <div class="row">
                                  <div class="col-12 title-description">
                                    <h2 class="fs-title m-0 ">Description</h2>
                                    <p class="fw-bold m-0">What’s Your inspiration?</p>
                                    <p class="fw-bold m-0">What was your thoughts while make this?</p>
                                    <p class="fw-bold m-0">Why did you choose the medium,subject matter,style?</p>
                                    <textarea id="w3review" name="review" rows="8" placeholder="Description" cols="50"><?=$artistproduct['review']?></textarea>
                                  </div>
                                </div>
                              </div>
                              <input type="button" name="next" class="next action-button" value="Next" /> 
                              <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <!-- fieldsets 3 -->
                            <fieldset>
                              <div class="form-card">
                                <div class="row">
                                  <!--<div class="col-7">-->
                                  <!--    <h2 class="fs-title">Image Upload:</h2>-->
                                  <!--</div>-->
                                  <!--<div class="col-5">-->
                                  <!--    <h2 class="steps">Step 3 - 4</h2>-->
                                  <!--</div>-->
                                </div>
                               <div class="">
    <h2 class="fs-title">Availability for sale</h2>
    <div class="form-chk-box form-check-inline">
        <input class="" type="radio" name="availability_for_sale" id="inlineRadio2" value="Sale"
            <?php if ($artistproduct['availability_for_sale'] == 'Sale') echo 'checked'; ?>>
        <label class="form-check-label" for="inlineRadio2">
            Sale
        </label>
    </div>
    <div class="form-chk-box form-check-inline">
        <input class="" type="radio" name="availability_for_sale" id="inlineRadio3" value="Made to order"
            <?php if ($artistproduct['availability_for_sale'] == 'Made to order') echo 'checked'; ?>>
        <label class="form-check-label" for="inlineRadio3">
            Made to order
        </label>
    </div>
    <div class="form-chk-box form-check-inline">
        <input class="" type="radio" name="availability_for_sale" id="inlineRadio4" value="For display only"
            <?php if ($artistproduct['availability_for_sale'] == 'For display only') echo 'checked'; ?>>
        <label class="form-check-label" for="inlineRadio4">
            For display only
        </label>
    </div>
</div>

                                <div>
    <h2 class="fs-title">Packaging</h2>
    <div class="d-flex gap-5">
        <div class="form-check form-check-inline inline-checkboxes p-0">
            <img src="assets/img/box-3d.png" alt="box Img">
            <br>
            <input class="" type="radio" name="packaging" id="inlineRadio1" value="box"
                <?php if ($artistproduct['packaging'] == 'box') echo 'checked'; ?>>
            <label class="form-check-label" for="inlineRadio1">box</label>
        </div>
        <div class="form-check form-check-inline inline-checkboxes p-0">
            <img src="assets/img/roll-3d.jpg" alt="roll Img">
            <br>
            <input class="" type="radio" name="packaging" id="inlineRadio2" value="roll"
                <?php if ($artistproduct['packaging'] == 'roll') echo 'checked'; ?>>
            <label class="form-check-label" for="inlineRadio2">rolled</label>
        </div>
        <div class="form-check form-check-inline inline-checkboxes p-0">
            <img src="assets/img/crate-3d.jpg" alt="crate Img">
            <br>
            <input class="" type="radio" name="packaging" id="inlineRadio3" value="crate"
                <?php if ($artistproduct['packaging'] == 'crate') echo 'checked'; ?>>
            <label class="form-check-label" for="inlineRadio3">crate</label>
        </div>
    </div>
</div>

                                
                           <div class="">
  <h2 class="fs-title mb-0">Price</h2>
  <p class="">Price your artwork and see all prices the collector will see</p>

   <!-- Art Price Input -->
  <div class="row mb-2">
    <div class="col-3">
      <label for="inputPrice6" class="col-form-label fw-bold pl-0">Art Price</label>
    </div>
    <div class="col-3">
      <input type="text" id="inputPrice6" name="art_price" class="form-control m-0" placeholder="Enter Price" aria-describedby="passwordHelpInline" value="<?=$artistproduct['art_price']?>">
    </div>
  </div>

  <!-- Display the calculated Commission -->
  <div class="row mb-2 align-items-center">
    <div class="col-3">
      <label for="inputPrice6" class="col-form-label fw-bold pl-0">Your Commission</label>
    </div>
    <div class="col-3">
      <p id="commissionDisplay" class="col-auto m-0 pl-0">₹0.00</p>
    </div>
  </div>

  <!-- Display the calculated Shipping & Handling -->
  <div class="row mb-2 align-items-center">
    <div class="col-3">
      <label for="inputPrice6" class="col-form-label fw-bold pl-0">Shipping & Handling</label>
    </div>
    <div class="col-3">
      <p id="shippingDisplay" class="col-auto m-0 pl-0">₹0.00</p>
    </div>
  </div>

  <!-- Display the calculated Listed Price -->
  <div class="row mb-2 align-items-center">
    <div class="col-3">
      <label for="inputPrice6" class="col-form-label fw-bold pl-0">Listed Price</label>
    </div>
    <div class="col-3">
      <p id="listedPriceDisplay" class="col-auto m-0 pl-0">₹0.00</p>
    </div>
  </div>
</div>

                                 
                                     
                                    
                              </div>
                              <input type="button" name="next" class="next action-button" value="Next" /> 
                              <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <!-- fieldsets 4 -->
                            <fieldset>
                              <div class="form-card">
                                <div class="row">
                                  <!--<div class="col-7">-->
                                  <!--    <h2 class="fs-title">Image Upload:</h2>-->
                                  <!--</div>-->
                                  <!--<div class="col-5">-->
                                  <!--    <h2 class="steps">Step 3 - 4</h2>-->
                                  <!--</div>-->
                                </div>
                                <div class="mb-2">
    <h2 class="fs-title m-0">Availability for sale</h2>
    <div class="form-chk-box form-check-inline">
        <input class="" type="radio" name="for_sale" id="inlineRadio2" value="Sale"
            <?php if ($artistproduct['for_sale'] == 'Sale') echo 'checked'; ?>>
        <label class="form-check-label" for="inlineRadio2">
            Sale
        </label>
    </div>
    <div class="form-chk-box form-check-inline">
        <input class="" type="radio" name="for_sale" id="inlineRadio3" value="not for sale"
            <?php if ($artistproduct['for_sale'] == 'not for sale') echo 'checked'; ?>>
        <label class="form-check-label" for="inlineRadio3">
            Not for sale
        </label>
    </div>
</div>

                                <div class="mb-2">
                                    <h2 class="fs-title m-0">Images</h2>
                                    <p class="m-0">upload an image which would be printed</p>
                                  <div id="image-upload">
                                    <label for="upload" class="upload-img-lbl">Upload Image
                                      <input type="file" class="" id="upload" name="upload_image" accept="image/*" onchange="previewImage(event)"/>
                                        <input type="hidden" class="" id="validationCustom0461" name="imgs1" value="<?=$artistproduct['upload_image']?>"/><br>
                                        
                                      </label>
                                      <div id="preview-container" class="position-relative">
                                        <img id="preview" src="#" alt="Image Preview">
                                        <button id="delete" onclick="deleteImage(event)">x</button>
                                      </div>
                                    </div>
                                     <img src="admin/assets/images/Artwork/<?=$artistproduct['upload_image'];?>" width="30%" height="30%">
                                </div>
                                
                                
                            <!-- Material section -->
                            <div class="mb-2">
                              <h2 class="fs-title m-0">Material</h2>
                              <div class="form-check material-form p-0">
                                <input class="m-0 material-checkbox" type="checkbox" name="material" value="Fine art paper" id="material-fine-art">
                                <label class="form-check-label" for="material-fine-art">
                                  Fine art paper
                                </label>
                              </div>
                              <div class="form-check material-form p-0">
                                <input class="m-0 material-checkbox" type="checkbox" name="material" value="Canvas" id="material-canvas" checked>
                                <label class="form-check-label" for="material-canvas">
                                  Canvas
                                </label>
                              </div>
                            </div>


                                



                                
                                
                          <div class="mb-2">
    <h2 class="fs-title m-0">Default canvas wrap colour</h2>
    <div class="form-chk-box form-check-inline">
        <input class="" type="radio" name="canvas_wrap" id="whiteCanvasRadio" value="white canvas"
            <?php if (trim($artistproduct['canvas_wrap']) == 'white canvas') echo 'checked'; ?>>
        <label class="form-check-label" for="whiteCanvasRadio">
            White canvas
        </label>
    </div>
    <div class="form-chk-box form-check-inline">
        <input class="" type="radio" name="canvas_wrap" id="blackCanvasRadio" value="black canvas"
            <?php if (trim($artistproduct['canvas_wrap']) == 'black canvas') echo 'checked'; ?>>
        <label class="form-check-label" for="blackCanvasRadio">
            Black canvas
        </label>
    </div>
</div>


                                
                                
                                
                                                       
                            <!-- Price section -->
                            <div class="mb-2">
                              <h2 class="fs-title m-0">Price</h2>
                               <label for="price-range" class="form-label">Select price range: ₹</label>
                              <input type="range" name="range_price" class="form-range" id="price-range" min="0" max="10000" step="100" value="5000">
                            <!-- Hidden input field to store the table data -->
                                <input type="hidden" name="tableData[]" id="tableData" value="">
                              <!-- Display the selected price range -->
                              <span>₹<span id="price-range-value">5000</span> - ₹<span id="price-range-max">6000</span></span>
                            
                              <!-- Price Table for Fine art paper -->
                              <div class="table-responsive">
                                <table class="table table-borderless" id="price-table-fine-art">
                                  <thead>
                                    <tr>
                                      <th scope="col">Material</th>
                                      <th scope="col">Size</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Your Royalty</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <!-- The table rows will be dynamically added by the JavaScript script -->
                                  </tbody>
                                </table>
                              </div>
                            
                              <hr class="table-hr">
                            
                              <!-- Price Table for Canvas -->
                              <div class="table-responsive">
                                <table class="table table-borderless" id="price-table-canvas">
                                  <thead>
                                    <tr>
                                      <th scope="col">Material</th>
                                      <th scope="col">Size</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Your Royalty</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <!-- The table rows will be dynamically added by the JavaScript script -->
                                  </tbody>
                                </table>
                              </div>
                            </div>


                             
                                 
                              </div>
                              <input type="button" name="next" class="next action-button" value="Next" /> 
                              <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <!-- fieldsets 5 -->
                            <fieldset>
                              <div class="form-card">
                                    <div class="row">
                                  <div class="col p-0">
                                    <h2 class="fs-title">Upload images</h2>
                                    <p class="m-0 upload-description">You will also upload more pictures related to this artwork here, because it is really hepful to saw your images of 
                                    art  from every direction  </p>
                                    <div class="form-group fileUpload">
    <input type="file" class="upload" name="select_files[]" multiple id="upload-img"/>
    <input type="hidden" class="upload" id="upload-img" name="imgss1" multiple value="<?=$artistproduct['selectimages']?>"/><br>
    <span>
        <svg viewBox="0 0 24 24">
            <path fill="currentColor" d="M11 20H6.5Q4.22 20 2.61 18.43 1 16.85 1 14.58 1 12.63 2.17 11.1 3.35 9.57 5.25 9.15 5.88 6.85 7.75 5.43 9.63 4 12 4 14.93 4 16.96 6.04 19 8.07 19 11 20.73 11.2 21.86 12.5 23 13.78 23 15.5 23 17.38 21.69 18.69 20.38 20 18.5 20H13V12.85L14.6 14.4L16 13L12 9L8 13L9.4 14.4L11 12.85Z" />
        </svg>
        Upload
    </span>
</div>

<div class="mb-2">
    <h2 class="fs-title m-0">Uploaded Images</h2><br>
    <div id="uploaded-images-container" class="uploaded-images">
        <?php
        $imageFilenames = explode(',', $artistproduct['selectimages']);
        foreach ($imageFilenames as $filename) {
            if (!empty($filename)) {
                echo '<img src="admin/assets/images/Artwork/' . $filename . '" class="uploaded-image" alt="Uploaded Image">';
            }
        }
        ?>
    </div>
</div>


                                    <div class="img-thumbs img-thumbs-hidden" id="img-preview"></div>
                                    <!--<button type="submit" class="btn btn-dark">Upload</button>-->
                                  </div>
                                </div>
                                <div class="row justify-content-center">
                                  <!--<div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>-->
                                </div>
                                <br><br>
                                <div class="row justify-content-center">
                                  <div class="col-7 text-center">
                                    <!--<h5 class="purple-text text-center">You Have Successfully Signed Up</h5>-->
                                  </div>
                                </div>
                              </div>
                                   <input type="submit" id="submitBtn" name="next" class="next action-button" value="Save" /> 
                              <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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
  
  <!--according to sizes shoW 3 sizes of art script -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Attach event listeners to the material checkboxes and price range input to call calculateSizes when the values change
<!-- Attach event listeners to the material checkboxes and price range input to call calculateSizes when the values change -->
document.querySelectorAll('input[name="material"]').forEach(materialCheckbox => {
  materialCheckbox.addEventListener('change', calculateSizes);
});
document.getElementById('price-range').addEventListener('input', calculateSizes);

// Function to calculate the aspect ratio
function calculateAspectRatio(width, height) {
  const gcd = (a, b) => (b === 0 ? a : gcd(b, a % b));
  const commonFactor = gcd(width, height);
  return `${width / commonFactor}:${height / commonFactor}`;
}

// Function to round down to the nearest whole number or .5 decimal place
function roundDown(num) {
  const roundedNum = Math.floor(num * 2) / 2;
  return Math.floor(roundedNum) === roundedNum ? roundedNum : roundedNum.toFixed(1);
}

// Function to calculate sizes, prices, and royalties based on the entered width and height
function calculateSizes() {
  const width = parseFloat(document.getElementById('width').value);
  const height = parseFloat(document.getElementById('height').value);
  const materialCheckboxes = document.querySelectorAll('input[name="material"]:checked');
  const priceRange = parseFloat(document.getElementById('price-range').value);
  const pricePerSquareInch = priceRange / 100; // Adjust the price range as needed
  const royaltyPercentage = 0.3; // 30% royalty

  // Calculate aspect ratio and determine the shorter dimension
  const aspectRatio = calculateAspectRatio(width, height);
  const [numerator, denominator] = aspectRatio.split(':');
  const isPortrait = width < height;
  const shorterDimension = isPortrait ? width : height;

  // Define the standard sizes
  const standardSizes = [8, 12, 24, 48];

  // Update the tables with the calculated sizes, prices, and royalties for each standard size
  const tableFineArt = document.getElementById('price-table-fine-art');
  const tbodyFineArt = tableFineArt.getElementsByTagName('tbody')[0];
  tbodyFineArt.innerHTML = '';

  const tableCanvas = document.getElementById('price-table-canvas');
  const tbodyCanvas = tableCanvas.getElementsByTagName('tbody')[0];
  tbodyCanvas.innerHTML = '';

  for (const size of standardSizes) {
    const displayedHeight = roundDown((size * parseInt(denominator)) / parseInt(numerator));

    // Calculate the price for this size
    const price = calculatePriceForSize(width, displayedHeight, pricePerSquareInch);

    // Calculate the royalty for this size (30% of the calculated price)
    const royalty = price * royaltyPercentage;

    // Update the table rows for each material and size
    for (const materialCheckbox of materialCheckboxes) {
      const material = materialCheckbox.value;
      const table = material === 'Fine art paper' ? tableFineArt : tableCanvas;
      const tbody = table.getElementsByTagName('tbody')[0];
      const row = tbody.insertRow();
      row.insertCell().textContent = material;
      row.insertCell().textContent = `${size}" x ${displayedHeight}"`;
      row.insertCell().textContent = `₹${price.toFixed(2)}`;
      row.insertCell().textContent = `₹${royalty.toFixed(2)}`; // Royalty price (30%)
    }
  }

  // Hide the table headings based on the checked status of material checkboxes
  const materialFineArtChecked = document.getElementById('material-fine-art').checked;
  const materialCanvasChecked = document.getElementById('material-canvas').checked;

  const tableFineArtHeading = tableFineArt.getElementsByTagName('thead')[0];
  tableFineArtHeading.style.display = materialFineArtChecked ? 'table-header-group' : 'none';

  const tableCanvasHeading = tableCanvas.getElementsByTagName('thead')[0];
  tableCanvasHeading.style.display = materialCanvasChecked ? 'table-header-group' : 'none';
}

// Function to calculate the price for each size based on the calculated height and the price per square inch
function calculatePriceForSize(width, displayedHeight, pricePerSquareInch) {
  return width * displayedHeight * pricePerSquareInch;
}




 // Function to update the table data in the hidden input field
    function updateTableData() {
      const tableDataArray = [];
      const tableFineArtRows = document.querySelectorAll('#price-table-fine-art tbody tr');
      const tableCanvasRows = document.querySelectorAll('#price-table-canvas tbody tr');

      tableFineArtRows.forEach(row => {
        const rowData = {
          material: row.cells[0].textContent,
          size: row.cells[1].textContent,
          price: row.cells[2].textContent,
          royalty: row.cells[3].textContent
        };
        tableDataArray.push(rowData);
      });

      tableCanvasRows.forEach(row => {
        const rowData = {
          material: row.cells[0].textContent,
          size: row.cells[1].textContent,
          price: row.cells[2].textContent,
          royalty: row.cells[3].textContent
        };
        tableDataArray.push(rowData);
      });

      document.getElementById('tableData').value = JSON.stringify(tableDataArray);
    }

   // Function to save table data using AJAX
function saveTableDataToDatabase(tableData) {
  // Create a hidden input element to store the table data as a JSON string
  const tableDataInput = document.createElement('input');
  tableDataInput.setAttribute('type', 'hidden');
  tableDataInput.setAttribute('name', 'tableData');
  tableDataInput.value = JSON.stringify(tableData);

  // Append the hidden input element to the form
  const form = document.getElementById('msform'); // Replace 'your-form-id' with the actual ID of your form
  form.appendChild(tableDataInput);

  // Submit the form with the table data included
  form.submit();
}


 // Attach event listener to the submit button
    $('#submitBtn').on('click', function() {
      // Update the table data in the hidden input field
      updateTableData();

      // Get the table data as an array
      const tableDataArray = JSON.parse($('#tableData').val());

      // Save the table data to the database using AJAX
      saveTableDataToDatabase(tableDataArray);
    });

// Attach event listeners to the size fields and material checkboxes to call the calculateSizes function when the values change
document.getElementById('width').addEventListener('input', calculateSizes);
document.getElementById('height').addEventListener('input', calculateSizes);

// Initial calculation of sizes, prices, and royalties based on the default width and height (if any)
calculateSizes();

</script>
  
  
</body>
<!--multi step form script-->
<script>
  $(document).ready(function(){
  
  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;
  var current = 1;
  var steps = $("fieldset").length;
  
  setProgressBar(current);
  
  $(".next").click(function(){
  
  current_fs = $(this).parent();
  next_fs = $(this).parent().next();
  
  //Add Class Active
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show();
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
  step: function(now) {
  // for making fielset appear animation
  opacity = 1 - now;
  
  current_fs.css({
  'display': 'none',
  'position': 'relative'
  });
  next_fs.css({'opacity': opacity});
  },
  duration: 500
  });
  setProgressBar(++current);
  });
  
  $(".previous").click(function(){
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //Remove class active
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show();
  
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
  step: function(now) {
  // for making fielset appear animation
  opacity = 1 - now;
  
  current_fs.css({
  'display': 'none',
  'position': 'relative'
  });
  previous_fs.css({'opacity': opacity});
  },
  duration: 500
  });
  setProgressBar(--current);
  });
  
  function setProgressBar(curStep){
  var percent = parseFloat(100 / steps) * curStep;
  percent = percent.toFixed();
  $(".progress-bar")
  .css("width",percent+"%")
  }
  
  $(".submit").click(function(){
  return false;
  })
  
  });
  
  // upload art  images script 
var imgUpload = document.getElementById('upload-img')
  , imgPreview = document.getElementById('img-preview')
  , imgUploadForm = document.getElementById('form-upload')
  , totalFiles
  , previewTitle
  , previewTitleText
  , img;
  
  imgUpload.addEventListener('change', previewImgs, true);
  
  function previewImgs(event) {
  totalFiles = imgUpload.files.length;
  
   if(!!totalFiles) {
  imgPreview.classList.remove('img-thumbs-hidden');
  }
  
  for(var i = 0; i < totalFiles; i++) {
  wrapper = document.createElement('div');
  wrapper.classList.add('wrapper-thumb');
  removeBtn = document.createElement("span");
  nodeRemove= document.createTextNode('x');
  removeBtn.classList.add('remove-btn');
  removeBtn.appendChild(nodeRemove);
  img = document.createElement('img');
  img.src = URL.createObjectURL(event.target.files[i]);
  img.classList.add('img-preview-thumb');
  wrapper.appendChild(img);
  wrapper.appendChild(removeBtn);
  imgPreview.appendChild(wrapper);
  
  $('.remove-btn').click(function(){
    $(this).parent('.wrapper-thumb').remove();
  });    
  
  }
  
  
  }



  // add keyword (upload art)
 document.addEventListener("DOMContentLoaded", function() {
  var listInput = document.getElementById("listInput");
  var listContainer = document.getElementById("listContainer");
  var keywordInput = document.getElementById("keywordInput");
  var keywordCount = 0; // Variable to keep track of the number of keywords

  function addKeyword() {
    if (keywordCount >= 12) {
      alert("You can only add up to 12 keywords.");
      return;
    }

    var keyword = listInput.value.trim();
    if (keyword !== "") {
      var listItem = document.createElement("li");
      listItem.textContent = keyword;
      listItem.innerHTML += '<button class="delete-button" onclick="removeKeyword(this)">X</button>';
      listContainer.appendChild(listItem);
      listInput.value = "";
      keywordCount++; // Increment the keyword count

      updateKeywordInput();
    }
  }

  function removeKeyword(button) {
    var listItem = button.parentNode;
    listContainer.removeChild(listItem);
    keywordCount--; // Decrement the keyword count
    updateKeywordInput();
  }

  function updateKeywordInput() {
    var keywords = [];
    var listItems = listContainer.getElementsByTagName("li");
    for (var i = 0; i < listItems.length; i++) {
      keywords.push(listItems[i].textContent);
    }
    keywordInput.value = keywords.join(",");
  }

  listInput.addEventListener("keydown", function(event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      addKeyword();
    }
  });

  listContainer.addEventListener("click", function(event) {
    if (event.target.classList.contains("delete-button")) {
      removeKeyword(event.target);
    }
  });
});

  
  
//   upload single img script (upload-art)
$(function() {
    $("#uploadFile").on("change", function() {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() { // set image data as background of div
                $("#imagePreview").html('<img src="' + this.result + '" alt="Product Image">');
            }
        }
    });
});


// single image (upload art work #print)
var upload = document.getElementById('upload');
var preview = document.getElementById('preview');
var previewContainer = document.getElementById('preview-container');
var deleteBtn = document.getElementById('delete');

upload.addEventListener('change', previewImage);

function previewImage(event) {
  if (upload.files && upload.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
      previewContainer.style.display = 'block';
      deleteBtn.style.display = 'inline-block';
    };
    reader.readAsDataURL(upload.files[0]);
  } else {
    deleteImage();
  }
}

function deleteImage(event) {
  event.preventDefault(); // Prevent the default action (page refresh) on button click
  upload.value = ''; // Clear the selected file
  preview.src = '#'; // Clear the preview image source
  previewContainer.style.display = 'none'; // Hide the preview container
  deleteBtn.style.display = 'none'; // Hide the delete button
}

</script>

									<!--get shippinf price list price and commision accoeding to price  -->
<!-- Add this script before the closing </body> tag or in a separate JavaScript file -->
<script>
  // Function to update the calculated values
  function updatePrices() {
    // Get the art price entered by the artist
    const artPrice = parseFloat(document.getElementById('inputPrice6').value);

    // Calculate the commission (30% of art price)
    const commission = artPrice * 0.3;

    // Calculate the shipping (40% of art price)
    const shipping = artPrice * 0.4;

    // Calculate the listed price (50% of art price)
    const listedPrice = artPrice * 0.5;

    // Update the displayed values
    document.getElementById('commissionDisplay').textContent = '₹' + commission.toFixed(2);
    document.getElementById('shippingDisplay').textContent = '₹' + shipping.toFixed(2);
    document.getElementById('listedPriceDisplay').textContent = '₹' + listedPrice.toFixed(2);

    // Store the calculated values in hidden input fields
    document.getElementById('commission_price').value = commission.toFixed(2);
    document.getElementById('shipping_price').value = shipping.toFixed(2);
    document.getElementById('listed_price').value = listedPrice.toFixed(2);
  }

  // Add an event listener to the art price input field to trigger the updatePrices function on input change
  document.getElementById('inputPrice6').addEventListener('input', updatePrices);

  // Perform the initial calculations when the page loads
  updatePrices();
</script>



</html>