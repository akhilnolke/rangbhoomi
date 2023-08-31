<?php
//  ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);
// ob_start();
define('DbHost', 'localhost');
define('DbUser', 'mit_rangbhoomi');
define('DbPass', '9U*sh^rz?AQX');
define('DbName', 'mit_rangbhoomi');

class Rangbhoomi{

    function __construct() {

        $this->con = mysqli_connect(DbHost, DbUser, DbPass, DbName) or die('Could not connect: ' . mysqli_connect_error());
        date_default_timezone_set('Asia/Kolkata');
    }

    function num_rows($q) {
        $sqlquery = mysqli_num_rows($q);
        return $sqlquery;
    }

    function fetch_array($q) {
        $sqlquery = mysqli_fetch_array($q, MYSQLI_ASSOC);
        return $sqlquery;
    }

    function query($q) {
        $sqlquery = mysqli_query($this->con, $q);
        return $sqlquery;
    }

    function lastId($q) {
        $sqlquery = mysqli_insert_id($this->con);
        return $sqlquery;
        // $last_id = $q->insert_id;
        //return $last_id;
    }
    /* Admin Login*/
     public function LoginId($username,$password) {
         $password = md5($password);
         $t = "SELECT * from `admin_db` WHERE `username` = '$username' AND `password` = '$password'";
        //checking if the username is available in the table
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
          $count_row = $sqlquery->num_rows;
        if ($count_row == 1) {
            // this login var will use for the session thing
			
            $_SESSION['AdminID'] = $user_data['id'];
            $_SESSION['Email'] = $user_data['username'];
            $_SESSION['Name'] = $user_data['Name'];
       
             return true;
        } else {
            return false;
        }	
    }
	
    
	  /* Get Admin Data */
     public function GetAdminDetails($adminid) {
        $t = "SELECT * FROM `admin_db` WHERE `id` = '$adminid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
    /*signup */
      public function Signup($username,$email,$password,$phone,$activationcode,$usertype) {
         $password = md5($password);
        $t = "INSERT INTO `users` SET `username` = '$username',`email` = '$email',`password` = '$password',`phone` = '$phone',`Activation_code` = '$activationcode',`usertype` = '$usertype'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
         /* Get email already exixts validation ID*/
     public function GetEmailBySignup($email) {
        $t = "SELECT * FROM `users` WHERE `email` = '$email'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
    /* Activation code*/
        public function UpdateStatusByactivationcode($activationcode) {
         $t = "UPDATE users SET `Status` = '1' WHERE `Activation_code` ='$activationcode'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
    }
    
      /* User Login*/
	  
      public function UserLoginId($email, $phone, $password) {
     $password = md5($password);
     echo $t = "SELECT * FROM users WHERE (email = '$email' OR phone = '$phone') AND password = '$password' AND Status = '1'";
     $sqlquery = $this->query($t);
     $user_data = $this->fetch_array($sqlquery);
     $count_row = $sqlquery->num_rows;
     if ($count_row == 1) {
         $_SESSION['UserID'] = $user_data['user_id'];
         $_SESSION['Email'] = $user_data['email'];
         $_SESSION['Phone'] = $user_data['phone'];
         $_SESSION['Name'] = $user_data['username'];
         return true;
     } else {
         return false;
     }
 }
 
       /* User by email by id*/
   public function UserByEmail($email, $phone) {
     $t = "SELECT * FROM users WHERE email = '$email' OR phone = '$phone'";
     $sqlquery = $this->query($t);
     $user_data = $this->fetch_array($sqlquery);
     return $user_data;
 }

 /* Get email already exixts validation ID*/
 public function GetEmailBySignups($email) {
    $t = "SELECT * FROM `users` WHERE `email` = '$email'";
    $sqlquery = $this->query($t);
    $user_data = $this->fetch_array($sqlquery);
    return $user_data;
  }

      /* Get userid */
      
        public function GetIdBySignup($userid) {
        $t = "SELECT * FROM `users` WHERE `user_id` = '$userid'";
        $sqlquery = $this->query($t);
         $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }


 /*Update Reset Password */
    
      public function ResetPasswords($id,$password,$activationcodes) {
         $password = md5($password); 
         $t = "UPDATE `users` SET `Password` = '$password' WHERE `user_id` = '$id' AND `Activation_code` = '$activationcodes'";
         $sqlquery = $this->query($t);
         return $sqlquery;
    }
    
      /*Add Slider */
    
      public function InsertSlider($title,$image) {
         //$password = md5($password);
        $t = "INSERT INTO `banner` SET `Title` = '$title',`Image` = '$image'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
      /* Get Slider*/
     public function GetAllSliders() {
        $t = "SELECT * FROM `banner`";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      /* Get Slider*/
     public function GetAllSliderss() {
        $t = "SELECT * FROM `banner`";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      /* Get Slider By ID*/
     public function GetSliderById($id) {
        $t = "SELECT * FROM `banner` WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
       /* Edit Slider */
    
      public function SliderEdit($id,$title,$image) {
          $t = "UPDATE `banner` SET `Title` = '$title',`Image` = '$image' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     /* Delete   Slider */
	 public function DeleteSlider($id) {
        // $all = implode(",", $_POST["ids"]);
         $t = "DELETE FROM `banner` WHERE `id`='$id'";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
    }
    
    
     /* Add categories */
    
      public function insertCategories($category_name,$category_image) {
         //$password = md5($password);
        $t = "INSERT INTO `categories` SET `Category_name` = '$category_name',`Category_image` = '$category_image'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
      /*  categories*/
     public function GetAllCategories() {
        $t = "SELECT * FROM `categories`";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
       /*  categories*/
  public function GetAllCategoryWithProductCount() {
    $query = "SELECT c.*, COUNT(aw.id) AS product_count
              FROM categories c
              LEFT JOIN art_work aw ON c.Category_name = aw.category
              GROUP BY c.Category_name
              ORDER BY c.id ASC
              LIMIT 4";

    $result = $this->query($query);

    return $result;
}


 /* Get  categories By ID*/
     public function GetCategoriesById($id) {
     $t = "SELECT * FROM `categories` WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      } 
      
 /* Edit  categories */
    
      public function EditCategories($id,$category_name,$category_image) {
          $t = "UPDATE `categories` SET `Category_name` = '$category_name',`Category_image` = '$category_image' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
        
    }
    
     /* Delete   categories */
	 public function DeleteCategories($id) {
        // $all = implode(",", $_POST["ids"]);
         $t = "DELETE FROM `categories` WHERE `id`='$id'";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
    }
    
      /*Add Product */
    
      public function InsertProducts($product_category,$product_image,$product_name,$product_price,$product_sale_price,$offer,$rating,$description) {
         //$password = md5($password);
        $t = "INSERT INTO `products` SET `product_category_name` = '$product_category',`image` = '$product_image',`product_name` = '$product_name',`price` = '$product_price',`sale_price` = '$product_sale_price',`offer` = '$offer',`rating` = '$rating',`description` = '$description'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
     /*  All Products*/
     public function GetAllProducts() {
        $t = "SELECT * FROM `products`";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      } 
      
       /* Get  product By ID*/
     public function GetProductById($id) {
     $t = "SELECT * FROM `products` WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      } 
      /* Edit  product */
    
      public function EditProducts($id,$product_category,$product_image,$product_name,$product_price,$product_sale_price,$offer,$rating,$description) {
          $t = "UPDATE `products` SET `product_category_name` = '$product_category',`image` = '$product_image',`product_name` = '$product_name',`price` = '$product_price',`sale_price` = '$product_sale_price',`offer` = '$offer',`rating` = '$rating',`description` = '$description' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
        
    }
     /* Delete   product */
	 public function DeleteProducts($id) {
        // $all = implode(",", $_POST["ids"]);
         $t = "DELETE FROM `products` WHERE `id`='$id'";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
    }
         /* Get Aboutus By ID*/
     public function GetAboutuussById() {
        $t = "SELECT * FROM `about_us` WHERE `id` = 1 ";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      /* Edit Aboutus */
    
      public function EditAboutus($id,$title,$image,$content) {
        $t = "UPDATE `about_us` SET `title` = '$title',`image` = '$image',`content` = '$content' WHERE `id` = 1";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }	
    
       /* Get  Why Choose   us By ID*/
     public function GetWhyChooseUsById() {
        $t = "SELECT * FROM `why_choose_us` WHERE `id` = 1 ";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
    
     /* Edit Why Choose   us */
    
      public function EditWhyChooseUs($id,$heading,$sub_heading,$title1,$content1,$image1,$title2,$content2,$image2,$title3,$content3,$image3,$title4,$content4,$image4,$left_image) {
        $t = "UPDATE `why_choose_us` SET `heading` = '$heading',`sub_heading` = '$sub_heading',`title1` = '$title1',`content1` = '$content1',`image1` = '$image1',`title2` = '$title2',`content2` = '$content2',`image2` = '$image2',`title3` = '$title3',`content3` = '$content3',`image3` = '$image3',`title4` = '$title4',`content4` = '$content4',`image4` = '$image4',`left_image` = '$left_image' WHERE `id` = 1";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    //   Artist Section
    
    /*Add Artist art work */
    
      public function insertArtWork($userid,$title,$image,$installed_hardware,$decorative_frame,$category,$medium,$maaterial,$subject,$styles,$year,$width,$height,$keywords,$review,$availability_for_sale,$packaging,$art_price,$commission_price,$shipping_price,$listed_price,$range_price,$for_sale,$upload_image,$material,$canvas_wrap,$selected_files_str,$tableData) {
         //$password = md5($password);
        $t = "INSERT INTO `art_work` SET `artist_id` = '$userid',`title` = '$title',`image` = '$image',`installed_hardware` = '$installed_hardware',`decorative_frame` = '$decorative_frame',`category` = '$category',`medium` = '$medium',`maaterial` = '$maaterial',`subject` = '$subject',`styles` = '$styles',`year` = '$year',`width` = '$width',`height` = '$height',`keywords` = '$keywords',`review` = '$review',`availability_for_sale` = '$availability_for_sale',`packaging` = '$packaging',`art_price` = '$art_price',`commission_price` = '$commission_price',`shipping_price` = '$shipping_price',`listed_price` = '$listed_price',`range_price` = '$range_price',`for_sale` = '$for_sale',`upload_image` = '$upload_image',`materials` = '$material',`canvas_wrap` = '$canvas_wrap',`selectimages` = '$selected_files_str',`tableData` = '$tableData'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
   public function GetProductByArtistId($artistid) {
    $t = "SELECT * FROM `art_work` WHERE `artist_id` = '$artistid' AND `status` = 0"; // Adding status condition
    $sqlquery = $this->query($t);
    return $sqlquery;
}

      
      
         /* Get  product By Artist ID*/
     public function GetArtProductsById($id) {
        $t = "SELECT * FROM `art_work` WHERE `id` = '$id' ";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
   /* Get profile by Artist ID */
public function GetProfileByArtistId($artistid) {
    $t = "SELECT usertype, profile_image, state, country, email, username, phone 
          FROM `users` 
          WHERE `user_id` = '$artistid' AND `usertype` = 'artist'";
    $sqlquery = $this->query($t);
    $user_data = $this->fetch_array($sqlquery);
    return $user_data;
}

 /* Get art By title*/
   // Function to fetch artwork data for a single product by product ID
public function GetArtByProductId($product_id) {
    $t = "SELECT * FROM `art_work` WHERE `id` = '$product_id'";
    $sqlquery = $this->query($t);
    $artwork_data = array();

    if ($this->num_rows($sqlquery) > 0) {
        while ($row = $this->fetch_array($sqlquery)) {
            // Assuming 'selectimages' is the column containing comma-separated image URLs
            $imageUrls = explode(',', $row['selectimages']);

            // Create an array for this artwork
            $artwork = array(
                'title' => $row['title'],
                 'image' => $row['image'], 
                'image_urls' => $imageUrls,
            );

            // Add this artwork to the artwork_data array
            $artwork_data[] = $artwork;
        }
    }

    return $artwork_data;
}

 /* Get art By title*/
     public function GetArtByid($art_id) {
        $t = "SELECT * FROM `art_work` WHERE `id` = '$art_id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }

public function InsertCartitems($title, $product_image, $artwork_id, $price, $quantity, $category, $size) {
    $existingCartItemQuery = "SELECT * FROM `cart` WHERE `user_id` = '$artwork_id' AND `Art_name` = '$title'";
    $existingCartItemResult = $this->query($existingCartItemQuery);
    
    if ($this->num_rows($existingCartItemResult) > 0) {
        // Product already in cart, update quantity
        $existingCartItem = $this->fetch_array($existingCartItemResult);
        $newQuantity = $existingCartItem['quantity'] + $quantity;
        $id = $existingCartItem['id'];
        $user_id = $existingCartItem['user_id'];
        $this->UpdateQuantity($id, $newQuantity, $user_id);
    } else {
        //$password = md5($password);
        $t = "INSERT INTO `cart` SET `Art_name` = '$title',`product_image` = '$product_image',`user_id` = '$artwork_id',`price` = '$price',`quantity` = '$quantity',`category` = '$category',`art_size` = '$size'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
}

    
// Modify your GetCartItemByuserid function to get cart items by user_id
public function GetCartItemByUserId($user_id) {
    $query = "SELECT * FROM `cart` WHERE `user_id` = '$user_id'";
    $sqlquery = $this->query($query);
    $cart_items = array();

    while ($row = $this->fetch_array($sqlquery)) {
        $cart_items[] = $row;
    }

    return $cart_items;
}

// update quantity
// ...

public function UpdateQuantity($id, $quantity, $user_id) {
   
    $t = "UPDATE `cart` SET `quantity` = '$quantity' WHERE `id` = '$id' AND `user_id` = '$user_id'";
    $sqlquery = $this->query($t);
    return $sqlquery;
}


// remove cart item 

// ...

public function RemoveCartItem($user_id, $item_id) {
    $t = "DELETE FROM `cart` WHERE `user_id` = '$user_id' AND `id` = '$item_id'";
    $sqlquery = $this->query($t);
    return $sqlquery;
}

// get cart product to checkout

// Modify your GetCartItemByuserid function to get cart items by user_id
public function GetCartItemToCheckoutByUserId($user_id) {
    $query = "SELECT * FROM `cart` WHERE `user_id` = '$user_id'";
    $sqlquery = $this->query($query);
    $cart_itemss = array();

    while ($row = $this->fetch_array($sqlquery)) {
        $cart_itemss[] = $row;
    }

    return $cart_itemss;
}

 /*edit Artist art work */
    
      public function EditArtwork($id,$userid,$title,$image,$installed_hardware,$decorative_frame,$category,$medium,$maaterial,$subject,$styles,$year,$width,$height,$keywords,$review,$availability_for_sale,$packaging,$art_price,$commission_price,$shipping_price,$listed_price,$range_price,$for_sale,$upload_image,$material,$canvas_wrap,$selected_files_str,$tableData) {
         //$password = md5($password);
         $t = "UPDATE `art_work` SET `artist_id` = '$userid',`title` = '$title',`image` = '$image',`installed_hardware` = '$installed_hardware',`decorative_frame` = '$decorative_frame',`category` = '$category',`medium` = '$medium',`maaterial` = '$maaterial',`subject` = '$subject',`styles` = '$styles',`year` = '$year',`width` = '$width',`height` = '$height',`keywords` = '$keywords',`review` = '$review',`availability_for_sale` = '$availability_for_sale',`packaging` = '$packaging',`art_price` = '$art_price',`commission_price` = '$commission_price',`shipping_price` = '$shipping_price',`listed_price` = '$listed_price',`range_price` = '$range_price',`for_sale` = '$for_sale',`upload_image` = '$upload_image',`materials` = '$material',`canvas_wrap` = '$canvas_wrap',`selectimages` = '$selected_files_str',`tableData` = '$tableData'  WHERE `id`='$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    // cart count
public function getCartItemCountByUserId($user_id) {
    $query = "SELECT COUNT(*) as cart_count FROM `cart` WHERE `user_id` = '$user_id'";
    $sqlquery = $this->query($query);
    $row = $this->fetch_array($sqlquery);

    return $row['cart_count'];
}


 /* get art products */
     public function GetAllARTProducts() {
        $t = "SELECT * FROM `art_work`";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }

/* get art category */
public function GetArtByCategory($category) {
    $query = "SELECT * FROM `art_work` WHERE `category` = '$category'";
    $result = $this->query($query);
    $artworks = [];
    
    while ($row = $this->fetch_array($result)) {
        $artworks[] = $row;
    }
    
    return $artworks;
}

// original painting category 
public function GetOriginalPaintings() {
    $category = "Original Paintings"; // Specify the category you want
    $query = "SELECT * FROM `art_work` WHERE `category` = '$category'";
    $result = $this->query($query);
    $artworks = [];
    
    while ($row = $this->fetch_array($result)) {
        $artworks[] = $row;
    }
    
    return $artworks;
}

//  get category OriginalsPaintings limit 4
public function GetLast4OriginalsPaintings() {
    $category = "Original Paintings"; // Specify the category you want
    $query = "SELECT * FROM `art_work` WHERE `category` = '$category' ORDER BY `id` DESC LIMIT 4";
    $result = $this->query($query);
    $artworks = [];
    
    while ($row = $this->fetch_array($result)) {
        $artworks[] = $row;
    }
    
    return $artworks;
}


// single image category


/* Get Original Paintings Category Products */
public function GetOriginalPaintingsProducts() {
    $t = "SELECT * FROM `art_work` WHERE category = 'Original Paintings' ORDER BY id ASC LIMIT 1";
    $sqlquery = $this->query($t);
    //$user_data = $this->fetch_array($sqlquery);
    return $sqlquery;
}


/* Get user data by user_id */
public function GetIdByUser($userid) {
    $t = "SELECT * FROM `users` WHERE `user_id` = '$userid'";
    $sqlquery = $this->query($t);
    $user_data = $this->fetch_array($sqlquery);
    return $user_data;
}


 /* get art products */
     public function GetAllARTProductss() {
        $t = "SELECT * FROM `art_work` ORDER BY id ASC LIMIT 8";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      /* get art products */
     public function GetARTOneProductss() {
        $t = "SELECT * FROM `art_work` ORDER BY id DESC LIMIT 1";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }




/* Edit Profile */
public function EditProfilee($userid, $profile_image, $name, $email, $phone, $country, $state, $pin_code, $about) {
     $t = "UPDATE `users` SET `profile_image` = '$profile_image',`username` = '$name',`email` = '$email',`phone` = '$phone',`country` = '$country',`state` = '$state',`pin_code` = '$pin_code',`about` = '$about' WHERE `user_id` = '$userid'";
    $sqlquery = $this->query($t);
    return $sqlquery;
}

/* Get Artist */
public function GetArtists() {
    $query = "SELECT * FROM `users` WHERE usertype = 'artist' ORDER BY user_id  ASC LIMIT 2";
    $result = $this->query($query);
    return $result;
}

 /*Add Reviews */
    
      public function InsertReview($rating,$review,$name,$email) {
         //$password = md5($password);
        $t = "INSERT INTO `reviews` SET `rating` = '$rating',`review` = '$review',`name` = '$name',`email` = '$email'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }

/* getreviews*/
     public function GetAllReviews() {
        $t = "SELECT * FROM `reviews` ORDER BY id DESC LIMIT 4";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      

// add wishlist items
 
 public function AddToWishlist($artworkId, $userId, $productName, $productPrice, $productImage, $productWidth, $productHeight, $productCategory) {
        // Assuming you have a database connection
         $query = "INSERT INTO `wishlist` (`artwork_id`, `user_id`, `product_name`, `product_price`, `product_image`, `product_width`, `product_height`, `product_category`) 
              VALUES ('$artworkId', '$userId', '$productName', '$productPrice', '$productImage', '$productWidth', '$productHeight', '$productCategory')";
        $sqlquery = $this->query($query); // Assuming you have a method for executing queries

        return $sqlquery;
    }
//  check wishlist items
public function CheckIfInWishlist($artworkId) {
    // Assuming you have a database connection
    $query = "SELECT COUNT(*) FROM `wishlist` WHERE `artwork_id` = '$artworkId'";
    $result = $this->query($query); // Assuming you have a method for executing queries
    $row = mysqli_fetch_array($result);

    return $row[0] > 0; // Returns true if the item is in the wishlist, false otherwise
}


// remove wishlist items
public function RemoveFromWishlist($artworkId) {
    // Assuming you have a database connection
    $query = "DELETE FROM `wishlist` WHERE `artwork_id` = '$artworkId'";
    $sqlquery = $this->query($query); // Assuming you have a method for executing queries

    return $sqlquery;
}

// get wishlist items
public function GetWishlistItemsByUserId($userId) {
    $query = "SELECT * FROM wishlist WHERE user_id = '$userId'";
    $result = $this->query($query); // Execute the query

    // Fetch and return the results
    $wishlistItems = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $wishlistItems[] = $row;
    }
    return $wishlistItems;
}

// count wishlist
public function GetWishlistItemCountByUserId($userId) {
    $query = "SELECT COUNT(*) AS count FROM wishlist WHERE user_id = '$userId'";
    $result = $this->query($query); // Assuming you have a method for executing queries
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    } else {
        return 0; // Return 0 if there's an error or no items in the wishlist
    }
}

 /* Delete   wishlist */
	 public function deleteWishlist($id) {
        // $all = implode(",", $_POST["ids"]);
         $t = "DELETE FROM `wishlist` WHERE `id`='$id'";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
    }
    
/* Get  product By category*/
     public function GetArtProductsByCategory($category) {
        $t = "SELECT * FROM `art_work` WHERE `category` = '$category'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }


// Update delete status
public function DeleteProductssssss($id, $status) {
    $t = "UPDATE `art_work` SET `status` = '$status' WHERE `id` = '$id'";
    $sqlquery = $this->query($t);
    return $sqlquery;
}




// /* Get products by category and within a price range */
// public function GetArtProductsByCategoryAndPrice($category, $minPrice, $maxPrice) {
//   $sqlQuery = "SELECT * FROM art_work WHERE category = '$category' AND art_price BETWEEN $minPrice AND $maxPrice";
// echo $sqlQuery; // Check the query in your browser's console

//     $sqlquery = $this->query($t);
//     return $sqlquery;
// }


// artist section end

}
?>