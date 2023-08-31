<?php
session_start();
$page = 'Payment';
include('inc/header.php');

// Get the subtotal and order ID from the URL
$subtotal = isset($_GET['subtotal']) ? $_GET['subtotal'] : 0;
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : '';

// Include the Razorpay PHP library
require 'razor/vendor/razorpay/razorpay/Razorpay.php';

// Set your Razorpay API keys
$razorpay_key_id = 'rzp_test_QpTKK3wXAhekon';
$razorpay_key_secret = 'QEklLk21Tf4xSnPBvhcvSqSu';

// Initialize the Razorpay client
$razorpay = new Razorpay\Api\Api($razorpay_key_id, $razorpay_key_secret);

// Handle Razorpay payment response
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['razorpay_payment_id'])) {
    $paymentId = $_POST['razorpay_payment_id'];

    // Verify the payment
    try {
        $payment = $razorpay->payment->fetch($paymentId)->capture(array('amount' => $subtotal * 100));

        // Payment successful, update checkout status to "success"
        $updateSuccess = $users->UpdateCheckoutStatus($order_id, 'success');

        if ($updateSuccess) {
            header('Location: thank_you.php');
            exit;
        } else {
            $error = "Failed to update checkout status.";
        }
    } catch (Exception $e) {
        // Payment failed
        $error = $e->getMessage();
    }
}
?>
 
<body>
  <main class="main-container">
    <!-- header -->
    
     
      <div class="contain-wrapper">
        <!--Payment-->
        <section class="payment-section mb-5">
            <div class="separator d-flex align-items-center text-center justify-content-center my-4 gap-4">
            <h2 class="fw-bold">Choose Payment Method</h2>
          </div>
            <div class="payment-container">
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
              <!--form-->
              <div class="payment-container">
               <form method="post" id="razorpay_form">
                    <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
              <div class="row ">
                  <div class="col-md-12">
                       <label for="exampleInputnumber1" class="form-label m-0 fw-bold">Card Number*</label>
                         <input id="card_number"   class="form-control" required pattern="(\d{4}\s?){4}" placeholder="0000 0000 0000 0000"   maxlength="19">
                       <!--<input type="number" class="form-control" id="card_number" aria-describedby="numberHelp" placeholder="0000 0000 0000 0000"   required pattern="(\d{4}\s?){4}"   maxlength="19">-->
                  </div>
                  <div class="col-md-6 mt-2">
                     <div class="exp-wrapper">
                         <label for="exampleInputnumber1" class="form-label m-0 fw-bold">Expiry Date*</label>
                         <br>
                          <input autocomplete="off" class="exp" id="month" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="MM" type="text" data-pattern-validate />
                          <input autocomplete="off" class="exp" id="year" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="YY" type="text" data-pattern-validate />
                    </div>
                  </div>
                  <!--<div class="col-md-6 mt-2">-->
                  <!--     <label for="exampleInputYear1" class="form-label m-0 fw-bold">Expiry Year</label>-->
                  <!--     <input type="number" class="form-control" id="exampleInputYear1" aria-describedby="yearHelp" placeholder="YYYY">-->
                  <!--</div>-->
                  <div class="col-md-6 mt-2">
                       <label for="exampleInputCvv1" class="form-label m-0 fw-bold">CVV*</label>
                       <br>
                       <!--<input type="number" class="form-control" id="exampleInputCvv1" aria-describedby="cvvHelp" placeholder="123"  maxlength="3" size="3">-->
                       <input type="text" class="exp w-100" id="cvvInput" maxlength="3" placeholder="CVV">
                  </div>
              </div>
              <hr style="color: #c7c7c7;">
              <div class="form-check py-1">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                      <label class="form-check-label fw-bold" for="flexRadioDefault1">
                        Cash on delivery / Pay on Delivery
                      </label>
                    </div>
                    <div class="form-check py-1">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                      <label class="form-check-label fw-bold" for="flexRadioDefault2">
                       Other UPI 
                       <p class="fw-normal m-0">Please Enter Your ID</p>
                       <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="EX: MobileNumber@upi" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary btn-dark text-white" type="button" id="button-addon2">Verify</button>
                        </div>
                      </label>
                    </div>
                    <div class="text-right">
                          <button type="submit" class="btn btn-dark px-4">Pay with Razorpay</button>
                         <!--<a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="1280" data-id="3">Order Now</a> -->
                         </form>
                         <?php if (isset($error)): ?>
        <p class="text-danger"><?php echo $error; ?></p>
    <?php endif; ?>
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
  
  <!--razorpayment script-->
  

  
</body>
 <script>
     card_number.addEventListener('keyup',function (e) {
  // console.log(e.keyCode);
  if (e.keyCode !== 8) {
    if (this.value.length === 4 || this.value.length === 9 || this.value.length === 14) {
      this.value = this.value += ' ';
    }
  }
});
 </script>
 <!--date year payment form validation script-->
  <script>
const monthInput = document.querySelector('#month');
const yearInput = document.querySelector('#year');

const focusSibling = function(target, direction, callback) {
  const nextTarget = target[direction];
  nextTarget && nextTarget.focus();
  // if callback is supplied we return the sibling target which has focus
  callback && callback(nextTarget);
}

// input event only fires if there is space in the input for entry. 
// If an input of x length has x characters, keyboard press will not fire this input event.
monthInput.addEventListener('input', (event) => {

  const value = event.target.value.toString();
  // adds 0 to month user input like 9 -> 09
  if (value.length === 1 && value > 1) {
      event.target.value = "0" + value;
  }
  // bounds
  if (value === "00") {
      event.target.value = "01";
  } else if (value > 12) {
      event.target.value = "12";
  }
  // if we have a filled input we jump to the year input
  2 <= event.target.value.length && focusSibling(event.target, "nextElementSibling");
  event.stopImmediatePropagation();
});

yearInput.addEventListener('keydown', (event) => {
  // if the year is empty jump to the month input
  if (event.key === "Backspace" && event.target.selectionStart === 0) {
    focusSibling(event.target, "previousElementSibling");
    event.stopImmediatePropagation();
  }
});

const inputMatchesPattern = function(e) {
  const { 
    value, 
    selectionStart, 
    selectionEnd, 
    pattern 
  } = e.target;
  
  const character = String.fromCharCode(e.which);
  const proposedEntry = value.slice(0, selectionStart) + character + value.slice(selectionEnd);
  const match = proposedEntry.match(pattern);
  
  return e.metaKey || // cmd/ctrl
    e.which <= 0 || // arrow keys
    e.which == 8 || // delete key
    match && match["0"] === match.input; // pattern regex isMatch - workaround for passing [0-9]* into RegExp
};

document.querySelectorAll('input[data-pattern-validate]').forEach(el => el.addEventListener('keypress', e => {
  if (!inputMatchesPattern(e)) {
    return e.preventDefault();
  }
}));
 </script>
</html>