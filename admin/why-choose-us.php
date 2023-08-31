<?php  
include('inc/header.php'); 
$id = $_GET['Id'];
$EditWhyChooseUs = $obj->GetWhyChooseUsById($id);

?>
 <div class="main-panel">
 <div class="content-wrapper">
 <div class="row">        
 <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                        <!--<div class="btnright"><a class="badge badge-success" href="product.php" style="float:right;" role="button">Product</a> </div>-->
                    <h4 class="card-title">Why Choose Us</h4>
                    <p class="card-description">Edit Why Choose Us</p>
                    <form class="forms-sample" action="inc/process.php?action=WhyChooseUs" method="post" enctype="multipart/form-data">
                         <input type = "hidden" name="id" value="<?php echo $EditWhyChooseUs['id'];?>" required/>
                 
                 
                 
                 <div class="form-group">
                        <label for="exampleInputName1">Heading</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="heading" placeholder="title" value="<?=$EditWhyChooseUs['heading']?>">
                        
                      </div><br>
                      
                       <div class="form-group">
                        <label for="exampleInputName1">Sub Heading</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="sub_heading" placeholder="title" value="<?=$EditWhyChooseUs['sub_heading']?>">
                        
                      </div><br>
                    
                      <div class="form-group">
                        <label for="exampleInputName1">Title1</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="title1" placeholder="title" value="<?=$EditWhyChooseUs['title1']?>">
                        
                      </div>
                    
                       <div class="form-group">
                        <label for="exampleInputName1">Image1</label>
                        
                         <input type="file" class="form-control" id="exampleInputName1" name="image1" placeholder="upload image" value=""/>
                          <input type="hidden" class="form-control" id="validationCustom0461" name="imgs1" value="<?=$EditWhyChooseUs['image1']?>"/><br>
                        <img src="assets/images/<?=$EditWhyChooseUs['image1'];?>" width="70px" height="70px">
                      </div>
                      
                     
                        <div class="form-group">
                        <label for="exampleTextarea1">Content1</label>
                        <textarea class="form-control" name="content1" id="exampleTextarea1" rows="4"><?=$EditWhyChooseUs['content1']?></textarea>
                      </div><br>
                              <div class="form-group">
                        <label for="exampleInputName1">Title2</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="title2" placeholder="title" value="<?=$EditWhyChooseUs['title2']?>">
                    
                      </div>
                    
                       <div class="form-group">
                        <label for="exampleInputName1">Image2</label>
                        
                         <input type="file" class="form-control" id="exampleInputName1" name="image2" placeholder="upload image" value=""/>
                          <input type="hidden" class="form-control" id="validationCustom0461" name="imgs2" value="<?=$EditWhyChooseUs['image2']?>"/><br>
                        <img src="assets/images/<?=$EditWhyChooseUs['image2'];?>" width="70px" height="70px">
                      </div>
                      
                     
                        <div class="form-group">
                        <label for="exampleTextarea1">Content2</label>
                        <textarea class="form-control" name="content2" id="exampleTextarea1" rows="4"><?=$EditWhyChooseUs['content2']?></textarea>
                      </div><br>
                        <div class="form-group">
                        <label for="exampleInputName1">Title3</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="title3" placeholder="title" value="<?=$EditWhyChooseUs['title3']?>">
                        
                      </div>
                    
                       <div class="form-group">
                        <label for="exampleInputName1">Image3</label>
                        
                         <input type="file" class="form-control" id="exampleInputName1" name="image3" placeholder="upload image" value=""/>
                          <input type="hidden" class="form-control" id="validationCustom0461" name="imgs3" value="<?=$EditWhyChooseUs['image3']?>"/><br>
                        <img src="assets/images/<?=$EditWhyChooseUs['image3'];?>" width="70px" height="70px">
                      </div>
                      
                     
                        <div class="form-group">
                        <label for="exampleTextarea1">Content3</label>
                        <textarea class="form-control" name="content3" id="exampleTextarea1" rows="4"><?=$EditWhyChooseUs['content3']?></textarea>
                      </div><br>
                      
                       <div class="form-group">
                        <label for="exampleInputName1">Title4</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="title4" placeholder="title" value="<?=$EditWhyChooseUs['title4']?>">
                      </div>
                    
                       <div class="form-group">
                        <label for="exampleInputName1">Image4</label>
                         <input type="file" class="form-control" id="exampleInputName1" name="image4" placeholder="upload image" value=""/>
                          <input type="hidden" class="form-control" id="validationCustom0461" name="imgs4" value="<?=$EditWhyChooseUs['image4']?>"/><br>
                        <img src="assets/images/<?=$EditWhyChooseUs['image4'];?>" width="70px" height="70px">
                      </div>
                      
                     
                        <div class="form-group">
                        <label for="exampleTextarea1">Content4</label>
                        <textarea class="form-control" name="content4" id="exampleTextarea1" rows="4"><?=$EditWhyChooseUs['content4']?></textarea>
                      </div>
                      
                       <div class="form-group">
                        <label for="exampleInputName1">left Image</label>
                         <input type="file" class="form-control" id="exampleInputName1" name="left_image" placeholder="upload image" value=""/>
                          <input type="hidden" class="form-control" id="validationCustom0461" name="leftimgs" value="<?=$EditWhyChooseUs['left_image']?>"/><br>
                        <img src="assets/images/<?=$EditWhyChooseUs['left_image'];?>" width="70px" height="70px">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>

<?php  include('inc/footer.php'); ?> 