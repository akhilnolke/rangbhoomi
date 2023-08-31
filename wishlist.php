<?php
  $page = 'Wishlist';
  include('inc/header.php'); 
  $userId = $_SESSION['UserID'];
$wishlist = $obj->GetWishlistItemsByUserId($userId);
  ?>
  <style>
  .icon-container {
    display: flex;
    justify-content: center;
    align-items: center;
}
.icon-gap {
    display: inline-block;
    width: 10px; /* Adjust the width as needed */
}

.icon-link {
    font-size: 24px; /* Adjust the font size as needed */
    color: black; /* Adjust the color as needed */
}
   .box-wish {
        margin-bottom: 0;
        display: flex;
        flex-direction: column;
 
    }

    .row-eq-height {
        display: flex;
        flex-wrap: wrap;
    }
    .icon-link:hover {
    color: #f6c0b6; /* Change the color on hover */
   
}

.empty-wishlist-message {
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.empty-wishlist-message p {
    font-size: 18px;
    margin: 10px 0;
}

.empty-wishlist-message a {
    color: #ff816a;;
    text-decoration: none;
    font-weight: bold;
}

.empty-wishlist-message a:hover {
    text-decoration: underline;
}

</style>
<body>
  <main class="main-container">
    <div class="contain-wrapper">
      <!-- header -->
      
      <!--wishlist page-->
     <section class="wishlist">
    <div class="separator d-flex align-items-center text-center justify-content-center my-4 gap-4">
        <h2 class="fw-bold">Wishlist</h2>
    </div>
    <div class="container">
        <div class="row row-eq-height">
            <?php if (empty($wishlist)) { ?>
                 <div class="col-12 text-center">
                    <div class="empty-wishlist-message">
                        <img class="" src="assets/img/wishlist-img.png" alt="wishlist img" style="width:100px">
                        <p>Your wishlist is empty.</p>
                        <p><a href="index.php">Start exploring</a> to add items to your wishlist.</p>
                    </div>
                </div>
            <?php } else {
                foreach ($wishlist as $item) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="box-wish">
                            <div class="wish-image" style="margin-bottom: 20px;">
                                <img src="admin/assets/images/Artwork/<?php echo $item['product_image']; ?>" alt="wish-image"/>
                            </div>
                            <div class="content-wish">
                                <h5><?php echo $item['product_name']; ?></h5>
                                <!--<p>by: <?php echo $item['product_author']; ?></p>-->
                                <div class="price-size">
                                    <p class="text-black">₹ <?php echo $item['product_price']; ?></p>
                                    <p class="text-black">Canvas size <?php echo $item['product_width'] . 'x' . $item['product_height']; ?></p>
                                </div>
                            </div>
                            <hr class="line-color">
                            <div class="icon-container">
                                <a href="cart.php" class="icon-link">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>
                                <span class="icon-gap"></span> <!-- Add a gap between icons -->
                                <a href="admin/inc/process.php?deleteWishlists=<?php echo $item['id']; ?>" class="icon-link">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</section>
    </div><br>
    <!--wishlist page end-->
    <!-- footer -->
    <?php
      include('inc/footer.php'); 
      ?>
 
  </main>
</body>
</html>