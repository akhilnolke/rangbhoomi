<?php
include('inc/header.php'); 

$category = $obj->GetAllCategories();
$id = $_GET['id'];
$editCategory = $obj->GetCategoriesById($id);
  ?>
  
<!--All categories section-->
   <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
 <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <div class="btnright"><a class="badge badge-success" href="categories.php?step=Add" style="float:right;" role="button">Add Category</a> </div>
                    <h4 class="card-title">Category</h4>
                    <!-- <p class="card-description"> Add class <code>.table-dark</code> </p> -->
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Category name </th>
                            <th>Category Image </th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                             <?php while($row = mysqli_fetch_array($category)) {?>
                          <tr>
                            <td><?=$row['id'];?> </td>
                            <td><?=$row['Category_name'];?> </td>
                            <td class="py-1">
                              <img src="assets/images/categoryimages/<?=$row['Category_image'];?>" alt="image" style="height:50px; width:50px;" />
                            </td>
                            <td><a href="categories.php?step=Edit&id=<?php echo $row['id'];?>" class="badge badge-info">Edit</a> <a href="inc/process.php?deleteCategorie=<?php echo $row['id'];?>" class="badge badge-danger">Delete</a></td>
                          </tr>
                           <?php } ?>  
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
              <!--Add category section-->
              
              
              <?php if($_GET['step'] == 'Add') { ?>
                   
 <div class="col-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                        <!--<div class="btnright"><a class="badge badge-success" href="slider.php" style="float:right;" role="button">Slider</a> </div>-->
                    <h4 class="card-title">Add Category</h4>
                    <p class="card-description">Add Category</p>
                    <form class="forms-sample" action="inc/process.php?action=AddCategory" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Category name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="category_name" placeholder="Title">
                      </div><br>
                    
                       <div class="form-group">
                        <label for="exampleInputName1">Category Image</label>
                         <input type="file" class="form-control" id="exampleInputName1" name="category_image" placeholder="upload image" value=""/>
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
           
              
             	<?php } elseif($_GET['step'] == 'Edit') { ?>  
              
               
 <div class="col-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                        <!--<div class="btnright"><a class="badge badge-success" href="slider.php" style="float:right;" role="button">Slider</a> </div>-->
                    <h4 class="card-title">Edit Categories</h4>
                    <p class="card-description">Edit Categories</p>
                    <form class="forms-sample" action="inc/process.php?action=EditCategories" method="post" enctype="multipart/form-data">
                         <input type ="hidden" name="id" value="<?php echo $editCategory['id'];?>" required/>
                      <div class="form-group">
                        <label for="exampleInputName1">Category name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="category_name" placeholder="Title" value="<?=$editCategory['Category_name']?>">
                      </div>
                    
                       <div class="form-group">
                        <label for="exampleInputName1">Category Image</label>
                         <input type="file" class="form-control" id="exampleInputName1" name="category_image" placeholder="upload image" value=""/>
                          <input type="hidden" class="form-control" id="validationCustom0461" name="imgs2" value="<?=$editCategory['Category_image']?>"/><br>
                                         <img src="assets/images/categoryimages/<?=$editCategory['Category_image'];?>" width="70px" height="70px">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
            </div>
              
              <?php } else {} ?> 
             
              <?php  include('inc/footer.php'); ?> 