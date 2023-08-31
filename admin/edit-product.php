<?php  
include('inc/header.php'); 
$id = $_GET['Id'];
$EditProduct = $obj->GetProductById($id);

?>
 <div class="main-panel">
 <div class="content-wrapper">
 <div class="row">        
 <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                        <div class="btnright"><a class="badge badge-success" href="product.php" style="float:right;" role="button">Product</a> </div>
                    <h4 class="card-title">Edit Product</h4>
                    <p class="card-description">Edit Product</p>
                    <form class="forms-sample" action="inc/process.php?action=EditProduct" method="post" enctype="multipart/form-data">
                         <input type = "hidden" name="id" value="<?php echo $EditProduct['id'];?>" required/>
                   <div class="form-group">
                        <label for="exampleInputName1">Product Category</label>
                      <select class="form-control form-control-lg" name="product_category" id="exampleFormControlSelect1">
                            <option value="<?php echo $EditProduct ['product_category_name'];?>"selected> <?php echo $EditProduct['product_category_name'];?> </option>
                         <?php while($row = mysqli_fetch_array($ProcuctCategorylist)) {?>
														<option value="<?=$row['Category_name'];?>"> <?=$row['Category_name'];?></option>
														   <?php } ?> 
                      </select>
                        
                      </div><br>
                      <div class="form-group">
                        <label for="exampleInputName1">Product name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="product_name" placeholder="product name" value="<?=$EditProduct['product_name']?>">
                        
                      </div><br>
                    
                       <div class="form-group">
                        <label for="exampleInputName1">product Image</label>
                        
                         <input type="file" class="form-control" id="exampleInputName1" name="product_image" placeholder="upload image" value=""/>
                          <input type="hidden" class="form-control" id="validationCustom0461" name="imgs4" value="<?=$EditProduct['image']?>"/><br>
                                         <img src="assets/images/productimage/<?=$EditProduct['image'];?>" width="70px" height="70px">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputName1">product Price</label>
                         <input type="text" class="form-control" id="exampleInputName1" name="product_price" placeholder="price" value="<?=$EditProduct['price']?>"/>
                      </div>
                      
                       <div class="form-group">
                        <label for="exampleInputName1">product Sale Price</label>
                         <input type="text" class="form-control" id="exampleInputName1" name="product_sale_price" placeholder="sale price" value="<?=$EditProduct['sale_price']?>"/>
                      </div>
                         <div class="form-group">
                        <label for="exampleInputName1">offer</label>
                         <input type="text" class="form-control" id="exampleInputName1" name="offer" placeholder="offer" value="<?=$EditProduct['offer']?>"/>
                      </div>
                      
                       <div class="form-group">
                        <label for="exampleInputName1">Rating</label>
                          <select class="form-control form-control-lg" name="rating" id="exampleFormControlSelect1">
                               <option value="<?php echo $EditProduct ['rating'];?>"selected> <?php echo $EditProduct['rating'];?> </option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                      </div>
                        <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"><?=$EditProduct['description']?></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>

<?php  include('inc/footer.php'); ?> 