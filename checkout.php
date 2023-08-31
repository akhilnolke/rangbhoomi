<?php
 session_start();
  $page = 'Checkout';
  include('inc/header.php'); 
  
  ?>
  
<body>
  <main class="main-container">
    <div class="contain-wrapper">
      <!-- header -->
 
      <!--checkout page-->
      <section class="check-page">
        <div class="separator d-flex align-items-center text-center justify-content-center my-4 gap-4">
          <h2 class="fw-bold">Checkout</h2>
        </div>
        <div class="row">
          <div class="col-lg-8">
    
            <!--Billing address -->
            <div class="form-box px-3">
              <!--<input class="form-check-input inpt" type="checkbox" id="myCheck" onclick="myFunction()">-->
              <label for="myCheck" style="font-size: 26px;font-weight: 700; ">Billing Address</label> 
              <div id="text">
                   <form action="pay.php" name="checkout" method="post" class="checkout woocommerce-checkout" action="#" enctype="multipart/form-data" novalidate="novalidate">
                        <input type="hidden" name="userid" class="form-control check mt-1 mb-2" placeholder="" id="userid" value="<?php echo $_SESSION['UserID'];?>">
                <div class="row" >
                     <lable class="shipping-heading">Billing Address* </lable>
                     <div class="col-lg-12">
                          <lable class="shipping-heading"   >Address (Flat, House no., Building, Apartment) </lable>
                    <input name="billing_address" type="text" class="form-control check" placeholder="Flat, House no., Building, Apartment" id="address" required>
                  </div>
                   <div class="col-lg-12">
                        <lable class="shipping-heading"   >Email</lable>
                    <input name="billing_email" type="text" class="form-control check" placeholder="Enter Email" id="email" value="<?=$artistprofile['email'];?>" required>
                  </div>
                  <div class="col-lg-12">
                       <lable class="shipping-heading"   >Area / Street</lable>
                    <input name="billing_area" type="text" class="form-control check" placeholder="Area, Street, Sector, Village" id="area" required>
                  </div>
                  <div class="col-lg-12">
                       <lable class="shipping-heading"   >Landmark*</lable>
                    <input name="billing_land" type="text" class="form-control check" placeholder="Landmark" id="Landmark" required>
                  </div>
                  <div class="col-lg-6">
                    <lable class="shipping-heading"   >Name*</lable>
                    <input name="billing_name" type="text" class="form-control check mt-1 mb-2" placeholder="Enter Your Name" id="Name" value="<?=$artistprofile['username'];?>" required>
                  </div>
                  <div class="col-lg-6">
                    <lable class="shipping-heading"   >Phone Number*</lable>
                    <input name="billing_phone" type="number" class="form-control check mt-1 mb-2" placeholder="Enter Phone Number" id="address" value="<?=$artistprofile['phone'];?>" required>
                  </div>
                     <div class="col-lg-6">
                    <lable class="shipping-heading"   >City*</lable>
                    <input name="billing_city" type="text" class="form-control check mt-1 mb-2" placeholder="Enter Your City" id="Landmark" required>
                  </div>
                  <div class="col-lg-6">
                    <lable class="shipping-heading"   >State*</lable>
                    <input type="text" name="billing_state" class="form-control check mt-1 mb-2" placeholder="Enter Your State" id="Landmark" value="<?=$artistprofile['state'];?>" required>
                  </div>
                     <div class="col-lg-6">
                    <lable class="shipping-heading"   >Pincode*</lable>
                    <input type="number" name="billing_pincode" class="form-control check mt-1 mb-2" placeholder="Enter Pin Code" id="area" required>
                  </div>
                  <div class="col-lg-6">
                    <lable class="shipping-heading"   >Country*</lable>
                    <div class="select-wrapper">
                      <select name="billing_country" class="select" placeholder="select one" required>
                        <option value="India">India</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!--<button type="submit" class=" btn btn-dark save-address-btn">Save address</button>-->
             </div>
              </div>
              <div class="">
                      <div class="form-check py-2">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Use as default address
                        </label>
                      </div>
                      <!--<button type="submit" class=" btn btn-dark save-address-btn">Save address</button>-->
                </div>
            
                    <!--shipping address-->
                    
                      <div class="form-check"> 
                <label class="form-check-label">
                <input type="checkbox"  id="chkPassport"  class="form-check-input" value="" checked>Same as delivery address
                </label>
              </div>
               
            <div class="form-box rounded">
              <h2 style="margin-left: 12px;margin-bottom: 20px;">Shipping Address</h2>
                 <div id="dvPassport">    
          
                <lable class="shipping-heading"  >Shipping Address*</lable>
                <div class="row">
                  <div class="col-lg-12">
                        <lable class="shipping-heading"   >Address (Flat, House no., Building, Apartment)</lable>
                    <input type="text" name="shipping_address" class="form-control check mt-1 mb-2" placeholder="Flat, House no., Building, Apartment" id="address" required>
                  </div>
                   <div class="col-lg-12">
                        <lable class="shipping-heading"   >Email</lable>
                    <input type="text" name="shipping_email" class="form-control check mt-1 mb-2" placeholder="Enter Email" id="email" required>
                  </div>
                  <div class="col-lg-12">
                        <lable class="shipping-heading"   >Area / Street</lable>
                    <input type="text"  name="shipping_area" class="form-control check mt-1 mb-2" placeholder="Area, Street, Sector, Village" id="area" required>
                  </div>
                  <div class="col-lg-12">
                        <lable class="shipping-heading"   >Landmark*</lable>
                    <input type="text"  name="shipping_land" class="form-control check mt-1 mb-2" placeholder="Landmark" id="Landmark" required>
                  </div>
                  <div class="col-lg-6">
                    <lable class="shipping-heading"   >Name*</lable>
                    <input type="text"  name="shipping_name" class="form-control check mt-1 mb-2" placeholder="Enter Your Name" id="Name" required>
                  </div>
                  <div class="col-lg-6">
                    <lable class="shipping-heading"   >Phone Number*</lable>
                    <input type="number"  name="shipping_phone" class="form-control check mt-1 mb-2" placeholder="Enter Phone Number" id="address" required>
                  </div>
                     <div class="col-lg-6">
                    <lable class="shipping-heading"   >City*</lable>
                    <input type="text"  name="shipping_city" class="form-control check mt-1 mb-2" placeholder="Enter Your City" id="Landmark" required>
                  </div>
                  <div class="col-lg-6">
                    <lable class="shipping-heading"   >State*</lable>
                    <input type="text"  name="shipping_state" class="form-control check mt-1 mb-2" placeholder="Enter Your State" id="Landmark" required>
                  </div>
                     <div class="col-lg-6">
                    <lable class="shipping-heading"   >Pincode*</lable>
                    <input type="number"  name="shipping_pincode" class="form-control check mt-1 mb-2" placeholder="Enter Pin Code" id="area" required>
                  </div>
                  <div class="col-lg-6">
                    <lable class="shipping-heading"   >Country*</lable>
                    <div class="select-wrapper">
                      <select name="shipping_country" class="select" placeholder="select one" required>
                        <option value="India">India</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                      </select>
                    </div>
                  </div>
                 
                </div>
                </div>
            </div>
               </div>
          <div class="col-lg-4">
            <div class="sidebar" style="position: sticky;">
                
                
             <?php
// Define shipping and GST prices
$shippingPrice = 5.00; // Example shipping price
$gstPrice = 10.00; // Example GST price

// Calculate subtotal
$subtotal = 0;
foreach ($cartItemss as $item) {
    $productTotal = $item['price'] * $item['quantity'];
    $subtotal += $productTotal;
}
?>

<table class="form-box two" style="width:100%">
    <tr>
        <th class="order-your" colspan="3" style="text-align:center;padding-top: 5px;">Your Order</th>
    </tr>
    <tr style="border-bottom: 1px solid #e9e9e9;">
        <td colspan="2" style="padding-left: 24px;padding-top: 14px;padding-bottom: 10px;font-weight: 600;font-size: 20px;">product</td>
    </tr>
    <?php foreach ($cartItemss as $item): ?>
        <tr>
            <td colspan="2" style="padding-left: 24px;padding-top: 20px;font-weight: 500;font-size: 18px;">
                <?php echo $item['Art_name']; ?> x <span><?php echo $item['quantity']; ?></span>
                <input type="hidden" name="pname" id="subtotal" value="<?=$item['Art_name'];?>">
                 <input type="hidden" name="quantity" id="subtotal" value="<?=$item['quantity'];?>">
           
            </td>
            <td colspan="3" style="text-align:end;padding-right: 24px;padding-top: 20px; font-weight: 600;">
                ₹<?php echo $item['price'] * $item['quantity']; ?>
            </td>  
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="2" style="padding-left: 24px;padding-top: 20px;font-weight: 500;font-size: 18px;">GST</td>
        <td colspan="3" style="text-align:end;padding-right: 24px;padding-top: 20px; font-weight: 600;">
            ₹<?php echo $gstPrice; ?>
        </td>
    </tr>
    <tr style="border-bottom: 1px solid #e9e9e9;">
        <td colspan="2" style="padding-left: 24px;padding-top: 20px;font-weight: 500;font-size: 18px;padding-bottom: 18px;">Shipping Charges</td>
        <td colspan="3" style="text-align:end;padding-right: 24px;padding-top: 20px; font-weight: 600;">
            ₹<?php echo $shippingPrice; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding-left: 24px;padding-top: 20px;padding-bottom: 20px;font-size: 18px; font-weight: 600;">Sub total</td>
        <td colspan="3" style="text-align:end;padding-right: 24px;padding-top: 20px;padding-bottom: 20px; font-weight: 600;">
            ₹<?php echo $total = $subtotal + $gstPrice + $shippingPrice;
           
            
            ?>
            
           


            
        </td>
    </tr>
    <tr>
        <td colspan="3">
           <button class="confirm-button border-0" type="submit" name="btn-submit" value="Place order" id="place_order" data-value="Place order">CONFIRM ORDER</button>
           
            </td>
    </tr>
</table>

              <!-- Within your existing form -->
<input type="hidden" name="subtotal" id="subtotal" value="<?php echo $total; ?>">
<input type="hidden" name="shipping" id="shipping" value="<?php echo $shippingPrice; ?>">
<input type="hidden" name="gst" id="gst" value="<?php echo $gstPrice; ?>">
              
            </div>
             </form>
            
            <div class="sidebar text-center form-box two p-4" style="position: sticky;">
                 <a href="cart.php" class="text-decoration-underline">
               <p class="back-cart m-0">
                    <svg viewBox="0 0 24 24"><path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" /></svg>
               BACK TO CART</p>
                  </a> 
            </div> 
          </div>
        </div>
      </section>
    </div>
      <!--checkout page end-->
      <!-- footer -->
      <?php
        include('inc/footer.php'); 
        ?>
   
  </main>
  </body>
  <!--billing address-->
  <script>
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").hide();
                $("#AddPassport").show();
            } else {
                $("#dvPassport").show();
                $("#AddPassport").hide();
            }
        });
    });
  </script>
 
  <!--billing address end-->
  
  <!--shipping gst item price in hidden feild script -->
  <!-- Add a script to set the hidden field values -->
<script>
    document.getElementById('payButton').addEventListener('click', function() {
        // Set the values of hidden fields
        document.getElementById('subtotal').value = '<?php echo $subtotal; ?>';
        document.getElementById('shipping').value = '<?php echo $shippingPrice; ?>';
        document.getElementById('gst').value = '<?php echo $gstPrice; ?>';
    });
</script>

</html>