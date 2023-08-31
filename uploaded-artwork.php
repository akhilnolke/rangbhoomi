<?php
  $page = 'Uploaded Artwork';
  include('inc/header.php'); 
  $artistid = $_SESSION['UserID'];
  $artistproduct = $obj->GetProductByArtistId($artistid);
  
  ?>
  <style>
/* Default styles for larger screens */


/* Media query for smaller devices (e.g., tablets) */
@media (max-width: 992px) {
  .equal-sized-image {
    height: 150px; /* Adjust the height for smaller devices */
  }
}

/* Media query for even smaller devices (e.g., smartphones) */
@media (max-width: 768px) {
  .equal-sized-image {
    height: 100px; /* Adjust the height for even smaller devices */
  }
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
              <ul class="d-flex upload-art-list list-unstyled align-items-center flex-wrap">
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
                <a href="upload-art.php">
                <button type="button" class="btn btn-dark px-3 artwork-btn">Add New Artwork</button>
                </a>
              </ul>
            </div>
          </div>
          <div class="upload-arts-container">
            <div class="upload-arts-content p-4 text-right">
              <span class="fw-bold">Filter:</span>
              <select class=" " aria-label="Default select example" style="width:120px ; padding: 5px">
                <option selected>All</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <span class="inp-srch-svg position-relative ">
                <input type="input" class="border search-inp-tag" placeholder="Search titles and tags" />
                <svg  viewBox="0 0 24 24">
                  <path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                </svg>
              </span>
            </div>
          </div>
          
          
          <div class="artworks-uploaded p-5">
            <div class="artworks-uploaded-content">
              <div>
                  
                  
    <div class="row">
  <?php while($row = mysqli_fetch_array($artistproduct)) {?>
    <div class="col-md-3 col-upload-arts">
      <div class="bg-white rounded">
        <div class="upload-img-container">
          <a href="product?id=<?=$row['id'];?>">
  <img class="w-100 rounded equal-sized-image img-fluid" src="admin/assets/images/Artwork/<?=$row['image'];?>" alt="psychedelic img" />
</a>

          <div class="upload-img-content p-2">
            <p class="m-0 fw-bold"><?=$row['title'];?></p>
            
            <?php
            $created_at = $row['Created_at'];
            // Convert the date string to a timestamp and then format it as "12 March 2022"
            $formatted_date = date("j F Y", strtotime($created_at));
            ?>
            <p class="m-0">Publish since <?=$formatted_date;?></p>
           
            <p class="m-0">
              <a href="seller-edit-product?Id=<?php echo $row['id'];?>" style="color: black;">
                View and Edit Product
                <svg viewBox="0 0 24 24">
                  <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                </svg>
              </a>
            </p>
          </div>
          
          
          <!-- Button trigger modal -->  
<!-- Button trigger modal -->  
<button type="button" class="btn text-center w-100 p-0" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$row['id'];?>">
  <div class="del-product ">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
    </svg>
  </div>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$row['id'];?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <h5 class="modal-title fw-bold" id="exampleModalLabel<?=$row['id'];?>">Delete Your Artwork</h5>
      </div>
      <div class="modal-body">
        <p class="text-center">Are you sure you want to delete this?<br> There is no way of recovering it.</p>
        <div class="modal-footer justify-content-center border-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" data-productid="<?=$row['id'];?>" id="deleteButton">Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>

        </div>
      </div>
    </div>
  <?php } ?>
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
  
  <!--delete product script -->
  
<script>
document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll("[data-productid]");

  deleteButtons.forEach(deleteButton => {
    deleteButton.addEventListener("click", function () {
      const productId = this.getAttribute("data-productid");
      const modalId = "exampleModal" + productId; // Get the modal ID

      fetch("admin/inc/process.php?action=deleteproductss", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "id=" + encodeURIComponent(productId),
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Close the modal
            const modal = new bootstrap.Modal(document.getElementById(modalId));
            modal.hide();

            // Reload the page
            location.reload();
          } else {
            console.error("Error updating status:", data.error);
          }
        })
        .catch(error => {
          console.error("Fetch error:", error);
        });
    });
  });
});
</script>




  
  
  
</body>
</html>