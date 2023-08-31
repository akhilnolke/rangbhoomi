<?php  
include('inc/header.php'); 
$id = $_GET['Id'];
$EditSlider = $obj->GetSliderById($id);

?>
 <div class="main-panel">
 <div class="content-wrapper">
 <div class="row">        
 <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                        <div class="btnright"><a class="badge badge-success" href="slider.php" style="float:right;" role="button">Slider</a> </div>
                    <h4 class="card-title">Edit Slider</h4>
                    <p class="card-description">Edit Slider</p>
                    <form class="forms-sample" action="inc/process.php?action=EditSlider" method="post" enctype="multipart/form-data">
                         <input type = "hidden" name="id" value="<?php echo $EditSlider['id'];?>" required/>
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="Title" value="<?=$EditSlider['Title']?>">
                      </div>
                    
                       <div class="form-group">
                        <label for="exampleInputName1">Slider Image</label>
                         <input type="file" class="form-control" id="exampleInputName1" name="image" placeholder="upload image" value=""/>
                          <input type="hidden" class="form-control" id="validationCustom0461" name="imgs1" value="<?=$EditSlider['Image']?>"/><br>
                                         <img src="assets/images/banner/<?=$EditSlider['Image'];?>" width="70px" height="70px">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>

<?php  include('inc/footer.php'); ?> 