<?php
 session_start();
  $page = 'Cart';
include('inc/header.php'); 
 $user_id = $_SESSION['UserID'];
// Retrieve cart items for the logged-in user
$cartItems = $obj->GetCartItemByUserId($user_id);
// print_r($cartItems);

?>
   
<body>
  <main class="main-container">
    <!-- header -->
    
    <div class="contain-wrapper">
      <div class="">
        <!--CART PAGE-->
        <section class="cart-section">
          <div class="separator d-flex align-items-center text-center justify-content-center my-4 gap-4">
            <h2 class="fw-bold">cart</h2>
          </div>
          <section class="h-100 h-custom">
            <div class="  h-100 py-4">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col" class="h5 border-top-0"> </th>
                          <th scope="col" class=" border-top-0">Name</th>
                          <th scope="col" class=" border-top-0">Category</th>
                          <th scope="col" class=" border-top-0">Price</th>
                          <th scope="col" class=" border-top-0">Quantity</th>
                          <th scope="col" class=" border-top-0">Total</th>
                          <th scope="col" class=" border-top-0"> </th>
                        </tr>
                      </thead>
                       <tbody>
                           
                        <?php if (count($cartItems) > 0): ?>
    <?php foreach ($cartItems as $item): ?>
        <tr>
            <th scope="row">
                <div class="d-flex align-items-center">
                    <img src="admin/assets/images/Artwork/<?php echo $item['product_image']; ?>" alt="<?php echo $item['title']; ?>" class="rounded-3" style="width: 75px;">
                </div>
            </th>
            <td class="align-middle mob-tx-size">
                <p class="mb-2 fw-bold"><?php echo $item['Art_name']; ?></p>
                <p class="mb-0 fw-normal"><?php echo $item['art_size']; ?></p>
                <p class="mb-0 fw-normal">Arcylic on Canvas</p>
            </td>
            <td class="align-middle mob-tx-size">
                <p class="mb-0" style="font-weight: 500;"><?php echo $item['category']; ?></p>
            </td>
            <td class="align-middle mob-tx-size">
                <p class="mb-0" style="font-weight: 600;">₹<span class="item-price"><?php echo $item['price']; ?> </span></p>
            </td>
            <td class="align-middle mob-tx-size">
    <div class="d-flex flex-row">
        <div class="number">
            <span class="minus">-</span>
            <input class="counter_num" type="number" name="quantity" value="<?php echo $item['quantity']; ?>" data-id="<?php echo $item['id']; ?>" data-user-id="<?php echo $item['user_id']; ?>">
            <span class="plus">+</span>
        </div>
    </div>
</td>
          <td class="align-middle mob-tx-size total-price">
    <p class="mb-0" style="font-weight: 600;"><span class="item-total-price item-price"><?php echo $item['price'] *  $item['quantity']; ?></span></p>
</td>
<?php
// Calculate the total price
$totalPrice = $item['price'] * $item['quantity'];

// Store the total price in a session variable
$_SESSION['total_price'] = $totalPrice;
 ?>


            <td class="align-middle">
                <svg viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                </svg>
            </td>
          <td class="align-middle mob-tx-size">
    <button type="button" class="btn btn-dark rounded-pill px-3 btn-remove-item" data-user-id="<?php echo $item['user_id']; ?>" data-item-id="<?php echo $item['id']; ?>">Remove</button>
</td>

        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="7" class="text-center">Your cart is empty</td>
    </tr>
<?php endif; ?>
                        
                      </tbody>
                    </table>
                    </div>
                    </th>
                    </tr>
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <div class="row accept-payment-wrapper">
            <div class="col-lg-6 col-cart">
              <div class="payment-method-content form-box two p-3">
                <div>
                  <h4>We accept</h4>
                </div>
                <hr style="color: #c7c7c7;">
                <div class="d-flex gap-3 flex-wrap">
                  <img src="assets/img/visa 1.png" alt="pay icon">
                  <img src="assets/img/mastercard.png" alt="pay icon">
                  <img src="assets/img/Americamexpress.png" alt="pay icon">
                  <img src="assets/img/paypal.png" alt="pay icon">
                  <img src="assets/img/COD.png" alt="pay icon">
                  <img src="assets/img/UPI.png" alt="pay icon">
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-cart">
              <div class="sidebar" style="position: sticky;">
                <table class="form-box two" style="width:100%">
                  <tbody>
                    <tr>
                      <th class="order-your px-4 fw-normal" colspan="3" style="padding-top: 5px;">Summary</th>
                    </tr>
<?php
// Calculate the total item cost
$totalCost = 0;
foreach ($cartItems as $item) {
    $itemTotal = $item['price'] * $item['quantity'];
    $totalCost += $itemTotal; // Add the item's total to the total cost
}

// Define the shipping charge
$shippingCharge = 10; // Change this to your actual shipping charge
?>

                    <tr style="">
                      <td colspan="2" style="padding-left: 24px;padding-top: 20px;padding-bottom: 10px;font-weight: 600;">Total item cost</td>
                     <td colspan="3" style="text-align:end;padding-right: 24px;padding-top: 20px;padding-bottom: 10px;font-weight: 500;">
              <span id="total-item-cost">0.00</span>
                  </td>

                    </tr>
                    <tr style="border-bottom: 1px solid #c7c7c7;">
                      <td colspan="2" style="padding-left: 24px;padding-top: 20px;padding-bottom: 10px;font-weight: 600;">Shipping Charges</td>
                      <td colspan="3" style="text-align:end;padding-right: 24px;padding-top: 20px;padding-bottom: 10px;font-weight: 500;"><span id="shipping-charge">0.00</span></td>
                    </tr>
                    <tr>
                      <td  class="pb-3" colspan="2" style="padding-left: 24px;padding-top: 20px;font-weight: 600;">Total Amount</td>
                      <td colspan="3" style="text-align:end;padding-right: 24px;padding-top: 4px;"><span id="total-price-with-shipping">0.00</span></td>
                    </tr>
                    <tr>
                      <td colspan="3"><a href="checkout.php"><button class="confirm-button border-0">Proceed to Checkout</button></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- footer -->
    <?php
      include('inc/footer.php'); 
      ?>
  </main>
</body>

<!--quantity script -->



<!-- Inside your cart.php file -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        updateItemTotal($input);
        updateQuantityInDatabase($input);
        return false;
    });

    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        updateItemTotal($input);
        updateQuantityInDatabase($input);
        return false;
    });

    $(".counter_num").on("input", function () {
        updateItemTotal($(this));
        updateQuantityInDatabase($(this));
    });

 function updateItemTotal($input) {
    var $row = $input.closest('tr');
    var price = parseFloat($row.find('.item-price').text().replace('₹', '').trim());
    var quantity = parseInt($input.val()); // Get the latest quantity directly from the input
    var total = price * quantity;
    $row.find('.item-total-price').text('₹' + total.toFixed(2)); // Update the total price
}



    function updateQuantityInDatabase($input) {
        var quantity = parseInt($input.val());
        var id = $input.data('id');
        var user_id = $input.data('user-id');

        $.ajax({
            url: 'admin/inc/process.php?action=UpdateQuantity', // Update this URL
            method: 'POST',
            data: { user_id: user_id, id: id, quantity: quantity },
            success: function (response) {
                if (response.status === 'success') {
                    updateItemTotal($input);
                } else {
                    // Handle error or show an error message
                }
            },
            error: function (xhr, status, error) {
                console.log(error); // Debugging: Log the error to the console
                // Handle error if needed
            }
        });
    }
});
</script>



<!--remove item from add to cart script -->
<script>
$(document).ready(function () {
    // ... Existing code ...

    $('.btn-remove-item').click(function () {
        var user_id = $(this).data('user-id');
        var item_id = $(this).data('item-id');

        $.ajax({
            url: 'admin/inc/process.php?action=RemoveItem', // Update this URL
            method: 'POST',
            data: { user_id: user_id, item_id: item_id },
            success: function (response) {
                // Refresh the cart content after successful removal
                location.reload();
            },
            error: function (xhr, status, error) {
                console.log(error); // Debugging: Log the error to the console
                // Handle error if needed
            }
        });
    });
});
</script>

<script>
        // Update the total item cost on page load
        var totalItemCost = <?php echo $totalCost; ?>;
        document.getElementById('total-item-cost').textContent = '₹' + totalItemCost.toFixed(2);

        // Update the shipping charge
        var shippingCharge = <?php echo $shippingCharge; ?>;
        document.getElementById('shipping-charge').textContent = '₹' + shippingCharge.toFixed(2);

        // Update the total price with shipping
        var totalPriceWithShipping = totalItemCost + shippingCharge;
        document.getElementById('total-price-with-shipping').textContent = '₹' + totalPriceWithShipping.toFixed(2);
    </script>


<script>
    // Get references to all plus and minus buttons
    var minusButtons = document.querySelectorAll('.minus');
    var plusButtons = document.querySelectorAll('.plus');

    // Add click event listeners to all buttons
    minusButtons.forEach(function(button) {
        button.addEventListener('click', reloadPage);
    });

    plusButtons.forEach(function(button) {
        button.addEventListener('click', reloadPage);
    });

    // Function to reload the page
    function reloadPage() {
        location.reload();
    }
</script>


</html>