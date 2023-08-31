<?php  
include('inc/header.php'); 
$id = $_GET['Id'];
$EditAboutus = $obj->GetAboutuussById($id);

?>
 <div class="main-panel">
 <div class="content-wrapper">
 <div class="row">        
 <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                        <!--<div class="btnright"><a class="badge badge-success" href="product.php" style="float:right;" role="button">Product</a> </div>-->
                    <h4 class="card-title">About us</h4>
                    <p class="card-description">Edit Slider</p>
                    <form class="forms-sample" action="inc/process.php?action=Aboutus" method="post" enctype="multipart/form-data">
                         <input type = "hidden" name="id" value="<?php echo $EditAboutus['id'];?>" required/>
                 
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="title" value="<?=$EditAboutus['title']?>">
                        
                      </div><br>
                    
                       <div class="form-group">
                        <label for="exampleInputName1">Image</label>
                        
                         <input type="file" class="form-control" id="exampleInputName1" name="image" placeholder="upload image" value=""/>
                          <input type="hidden" class="form-control" id="validationCustom0461" name="$imgs1" value="<?=$EditAboutus['image']?>"/><br>
                                         <img src="assets/images/aboutus/<?=$EditAboutus['image'];?>" width="70px" height="70px">
                      </div>
                      
                     
                        <div class="form-group">
                        <label for="exampleTextarea1">Content</label>
                        <textarea class="form-control" name="content" id="exampleTextarea1" rows="4"><?=$EditAboutus['content']?></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>

<?php  include('inc/footer.php'); ?> 