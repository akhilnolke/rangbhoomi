<?php  
include('inc/header.php'); 
  $product = $obj->GetAllProducts();
?> 
<!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
      <div class="col-lg-12 ">
                <div class="card">
                  <div class="card-body">
                  <div class="btnright"><a class="badge badge-success" href="add-product.php" style="float:right;" role="button">Add Product</a> </div>
                    <h4 class="card-title">Products</h4>
                    <!-- <p class="card-description"> Add class <code>.table-dark</code> </p> -->
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Product category </th>
                             <th> Product name </th>
                            <th>Product Image </th>
                            <th>Product Price </th>
                             <th>Sale Price </th>
                            
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                             <?php while($row = mysqli_fetch_array($product)) {?>
                          <tr>
                            <td><?=$row['id'];?> </td>
                            <td><?=$row['product_category_name'];?> </td>
                            <td><?=$row['product_name'];?> </td>
                            <td class="py-1">
                              <img src="assets/images/productimage/<?=$row['image'];?>" alt="image" style="height:50px; width:50px;" />
                            </td>
                             <td><?=$row['price'];?> </td>
                            <td><?=$row['sale_price'];?> </td>
                            <td><a href="edit-product.php?Id=<?php echo $row['id'];?>" class="badge badge-info">Edit</a> <a href="inc/process.php?deleteProduct=<?php echo $row['id'];?>" class="badge badge-danger">Delete</a></td>
                          </tr>
                           <?php } ?>  
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end row -->
              </div>
               <!-- end container -->
              </div>
              <?php 

              include('inc/footer.php'); ?> 