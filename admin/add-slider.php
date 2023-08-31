<?php  
include('inc/header.php'); 

?>

 <div class="main-panel">
 <div class="content-wrapper">
 <div class="row">        
 <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                        <div class="btnright"><a class="badge badge-success" href="slider.php" style="float:right;" role="button">Slider</a> </div>
                    <h4 class="card-title">Add Slider</h4>
                    <p class="card-description">Add Slider</p>
                    <form class="forms-sample" action="inc/process.php?action=AddSlider" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="Title">
                      </div><br>
                    
                       <div class="form-group">
                        <label for="exampleInputName1">Slider Image</label>
                         <input type="file" class="form-control" id="exampleInputName1" name="image" placeholder="upload image" value=""/>
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>

<?php  include('inc/footer.php'); ?> 