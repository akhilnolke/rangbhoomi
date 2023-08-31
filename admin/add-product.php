<?php  
include('inc/header.php'); 

?>

 <div class="main-panel">
 <div class="content-wrapper">
 <div class="row">        
 <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                        <div class="btnright"><a class="badge badge-success" href="product.php" style="float:right;" role="button">Products</a> </div>
                    <h4 class="card-title">Add Products</h4>
                    <p class="card-description">Add Products</p>
                    <form class="forms-sample" action="inc/process.php?action=AddProduct" method="post" enctype="multipart/form-data">
                         
                         <div class="form-group">
                        <label for="exampleInputName1">Product Category</label>
                      <select class="form-control form-control-lg" name="product_category" id="exampleFormControlSelect1">
                         <?php while($row = mysqli_fetch_array($ProcuctCategorylist)) {?>
														<option value="<?=$row['Category_name'];?>"> <?=$row['Category_name'];?></option>
														   <?php } ?> 
                      </select>
                        
                      </div><br>
                      <div class="form-group">
                        <label for="exampleInputName1">Product name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="product_name" placeholder="product name">
                        
                      </div><br>
                    
                       <div class="form-group">
                        <label for="exampleInputName1">product Image</label>
                         <input type="file" class="form-control" id="exampleInputName1" name="product_image" placeholder="upload image" value=""/>
                      </div>
                       <div class="form-group">
                        <label for="exampleInputName1">product Price</label>
                         <input type="text" class="form-control" id="exampleInputName1" name="product_price" placeholder="price" value=""/>
                      </div>
                      
                       <div class="form-group">
                        <label for="exampleInputName1">product Sale Price</label>
                         <input type="text" class="form-control" id="exampleInputName1" name="product_sale_price" placeholder="sale price" value=""/>
                      </div>
                         <div class="form-group">
                        <label for="exampleInputName1">offer</label>
                         <input type="text" class="form-control" id="exampleInputName1" name="offer" placeholder="offer" value=""/>
                      </div>
                      
                       <div class="form-group">
                        <label for="exampleInputName1">Rating</label>
                          <select class="form-control form-control-lg" name="rating" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                      </div>
                        <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>

<?php  include('inc/footer.php'); ?> 