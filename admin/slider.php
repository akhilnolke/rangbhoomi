<?php  
include('inc/header.php'); 
  $slider = $obj->GetAllSliders();
?> 
<!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
      <div class="col-lg-12 ">
                <div class="card">
                  <div class="card-body">
                  <div class="btnright"><a class="badge badge-success" href="add-slider.php" style="float:right;" role="button">Add Slider</a> </div>
                    <h4 class="card-title">Slider</h4>
                    <!-- <p class="card-description"> Add class <code>.table-dark</code> </p> -->
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Title </th>
                            <th>Slider Image </th>
                            <th>Created at</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                             <?php while($row = mysqli_fetch_array($slider)) {?>
                          <tr>
                            <td><?=$row['id'];?> </td>
                            <td><?=$row['Title'];?> </td>
                            <td class="py-1">
                              <img src="assets/images/banner/<?=$row['Image'];?>" alt="image" style="height:50px; width:50px;" />
                            </td>
                            <td><?=$row['created_at'];?> </td>
                            <td><a href="edit-slider.php?Id=<?php echo $row['id'];?>" class="badge badge-info">Edit</a> <a href="inc/process.php?deleteSlider=<?php echo $row['id'];?>" class="badge badge-danger">Delete</a></td>
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