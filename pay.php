<?php
include('inc/header.php');
require('config.php');
require('razorpay-php/Razorpay.php');
require_once 'common.php';
use Razorpay\Api\Api;
$onlinePay = new Ranghboomii();
 
$sql9 = $DB_con->prepare( "select max(pID) as pID from onlinepayment");
$sql9->execute();
$result9 = $sql9->fetch(PDO::FETCH_ASSOC);
$pID = $result9['pID'];
$mOrderID= "0000".$pID;
$api = new Api($keyId, $keySecret);

if(isset($_POST['btn-submit']))
{
 $userid =  $_POST['userid']; 
 $billing_address =  $_POST['billing_address'];
 $billing_email =  $_POST['billing_email'];
 $billing_area = $_POST['billing_area'];
 $billing_land = $_POST['billing_land'];
 $billing_name = $_POST['billing_name'];
 $billing_phone = $_POST['billing_phone'];
 $billing_city = $_POST['billing_city'];
 $billing_state = $_POST['billing_state'];
 $billing_pincode = $_POST['billing_pincode'];
 $billing_country = $_POST['billing_country'];
 $shipping_address =  $_POST['shipping_address'];
 $shipping_email =  $_POST['shipping_email'];
 $shipping_area = $_POST['shipping_area'];
 $shipping_land = $_POST['shipping_land'];
 $shipping_name = $_POST['shipping_name'];
 $shipping_phone = $_POST['shipping_phone'];
 $shipping_city = $_POST['shipping_city'];
 $shipping_state = $_POST['shipping_state'];
 $shipping_pincode = $_POST['shipping_pincode'];
 $shipping_country = $_POST['shipping_country'];
 $subtotal = $_POST['subtotal'];
 $pname = $_POST['pname'];
 $gst = $_POST['gst'];
 $shipping = $_POST['shipping'];
 $paymentStatus ="PENDING";
 $makerstamp=date('Y-m-d h:i:s');
 $updatestamp=date('Y-m-d h:i:s');
 $_SESSION['subtotal']= $_POST['subtotal'];
 $_SESSION['pname']= $_POST['pname'];
 $_SESSION['billing_name'] = $billing_name;
 $_SESSION['userid'] = $userid;
 $_SESSION['billing_email'] = $billing_email;
 $_SESSION['billing_phone'] = $billing_phone;
 $razorpayPaymentId ="";


$orderData = [
    'receipt'         => 3456,
    'amount'          => $subtotal, // 2000 rupees in paise
    'currency'        => $curncy,
    'payment_capture' => 1 // auto capture
]; 


// echo $total_price; 


$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $subtotal = $orderData['amount'];

if ($displayCurrency !== $curncy)
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=$curncy";
    // $exchange = json_decode(file_get_contents($url), true);

    //  $displayAmount = $exchange['rates'][$displayCurrency] * $total_prices / 1;
}

$data = [
   "key"               => $keyId,
    "amount"            => $subtotal,
    "name"              => $pname,
    "description"       => $pname,
    // "image"             => "",
    "prefill"           => [
    "name"              => $billing_name,
	"userid"              => $userid,
    "email"             =>$billing_email,
     "contact"           => $billing_phone,
    ],
    "notes"             => [
    "address"           => $billing_address,
    "merchant_order_id" => $mOrderID,
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];
if ($displayCurrency !== $curncy)
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}
            //  $pnames = implode(',', $pname);
		if($onlinePay->razorPayOnline($userid,$billing_address,$billing_email,$billing_area,$billing_land,$billing_name,$billing_phone,$billing_city,$billing_state,$billing_pincode,$billing_country,$shipping_address,$shipping_email,$shipping_area,$shipping_land,$shipping_name,$shipping_phone,$shipping_city,$shipping_state,$shipping_pincode,$shipping_country,$subtotal,$pname,$shipping,$gst,$razorpayOrderId,$razorpayPaymentId))
			
		{			
		$successMSG = "Your payment has been done successfully.";
			$json = json_encode($data);
		}
		else
		{
			$errMSG = "sorry , Query could no execute...";
		}		
	}

?> 


<style>
/*    h1.Check-out {*/
/*    font-family: 'Ananda Neptouch' !important;*/
/*    font-weight: 600 !important;*/
/*}*/
ul.breadcrumb.bdr {
    text-align: center;
    width: 97%;
}

a.opaa {
    text-transform: capitalize;
    font-size: 16px;
    color: #2e524a7a;
 
}
a.opaa:hover {
    color: #fda043;
}
/*li.my-accounts {*/
/*    text-transform: capitalize;*/
/*    font-size: 16px;*/
/*    font-family: 'calibre', sans-serif !important;*/
/*}*/
/*h6.thanks-order {*/
/*    text-align: center;*/
/*    font-size: 15px;*/
/*    font-family: 'calibre', sans-serif !important;*/
/*    border:2px dashed;*/
/*    padding: 16px;*/
/*    font-weight: 600;*/
/*    margin-top: 36px;*/
/*}*/
h6.odd-1 {
    font-size: 16px;
    font-family: 'calibre', sans-serif !important;
    text-align: center;
    margin-bottom:0px;
}
h6.odd-2 {
    text-align: center;
 
    font-weight: 600;
    margin-top: 5px;
    margin-bottom: 5px;
}
.headnames {
    font-size: 28px;
 
    font-weight: 600 !important;
    width: 96%;
    text-align: center;
    margin-top: 40px;
    margin-bottom: 24px;
}
.col-lg-3.bl {
    border-left: 1px solid #dfdfdf;
}
span.viaa {
    font-size: 12px;
    margin-left: 3px;
 
}
td.calorirr {
    font-size: 22px;
}
td.calorir {
    padding: 15px;
    font-size: 16px;
}
td.calorirss {
    padding: 15px;
}
td.calorirs {
    padding: 15px;
}
@media only screen and (min-width: 0px) and (max-width: 567px){
       h5.quitww {
    text-align: center !important;
    width: 100% !important;
    margin-top: 40px !important;
} 
section.elementor-section.elementor-top-section.elementor-element.elementor-element-d74604c.elementor-section-boxed.elementor-section-height-default.elementor-section-height-default {
    margin-top: 0px !important;
}
h4.join-tea {
    margin-top: 0px!important;
}
section.bft-1 {
    margin-top: 50px !important;
}
    .col-lg-3.bl {
    border-bottom: 1px solid #dfdfdf;
    text-align: center;
    margin-top: 8px;
    margin-bottom: 0px;
    border-left: 0px;
}
ul.breadcrumb.bdr {
    text-align: center;
    width: 85%;
}
 
 
td.calorir {
    padding: 15px;
    font-size: 12px;
}
td.calorirs {
    padding: 15px;
    font-size: 12px;
}
td.calorirss {
    padding: 15px;
    font-size: 12px;
}
td.calorirr {
    font-size: 18px;
}

}
.bgfoottt {
    background-image: url(assets/images/bar-footer-1.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    height: 450px;
    background-position: center;
}
section.bft-1 {
    margin-top: 90px;
}
h4.join-tea {
    text-align: center;
    margin-top: 112px;
    font-size: 44px;
 
    font-weight: 600;
}
p.pa-1 {
  
    text-align: center;
}
 
 
h5.quitww {
    width: 56%;
    font-style: italic;
    
    margin-top: 74px;
}

input.razorpay-payment-button {
    
    height: 72%;
    width: 119px;
    background-color: #292929;
    border: unset;
    color: #f2f2f2;
    font-size: x-large;
    
    border-radius: 5px;
    font-size: 18px;
    padding: 10px;

}
.pay-form{
    text-align:center;
}
	 
.whole-pay-table{
margin: 0 auto;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    width: 80%;
    padding: 24px 0;
}	
</style>
 
<div class="SSSS" >		

		<div class="separator d-flex align-items-center text-center justify-content-center my-4 gap-4">
            <h2 class="fw-bold">Order Review</h2>
          </div>
			           
<!--<ul class="breadcrumb bdr">-->
<!--  <li class="Hmee"><a href="index.php" class="opaa">Home</a></li>-->
<!--  <li class="linee2"><span class="linee33">/</span></li>-->
<!--  <li class="my-accounts">Order Review</li>-->
<!--</ul>-->
		      </div>
			</div>
		  </div>
		</div>
	   </div>
	  </section>
	</div>
</div>



<section style="background: #f7c1b7;padding: 25px 0;" >
    <div class="container-fluid">
    <div class="row">
        
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            
            <div class=text-center>
                <h6 class="headnames">Please review your order.</h6>
        </div>
        <div class="row">
            <div class="col-lg-3 bl">
                <h6 class=odd-1>Order number:</h6>
                <h6 class=odd-2>9271</h6>
            </div>
             <div class="col-lg-3 bl">
                <h6 class=odd-1>Date:</h6>
                <h6 class=odd-2>December 12, 2022</h6>
            </div>
             <div class="col-lg-3 bl">
                <h6 class=odd-1>Total: </h6>
                <h6 class=odd-2> <?php echo$displayCurrency;?> <?php echo $subtotal; ?>
                </h6>
            </div>
             <div class="col-lg-3 bl">
                <h6 class=odd-1>Payment method:</h6>
                <h6 class=odd-2>Razorpayment</h6>
            </div>
        </div>
                        <h4 class="headnames">Order details</h4>
        
         <div class="wrap-contact100 whole-pay-table rounded bg-white">
	 
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
     
        <table  style="margin:0 auto;width: 80%;">
  <tbody>
      <tr colspan="2">
    <td colspan="" class="calorirr fw-bold pb-2" style="text-align:start;">PRODUCT</td>
    <td colspan="" class="calorirr fw-bold pb-2" style="text-align:end;">TOTAL</td>
     
  </tr>
 
   <?php foreach ($cartItemss as $item): ?>
     <tr colspan="2">
    <td colspan="" class="calorirss pl-0" style="text-align:start;"><strong> <?php echo $item['Art_name']; ?></strong> <strong class="product-quantity">×<?php echo $item['quantity']; ?></strong></td>
    <td colspan="" class="calorirss pr-0" style="text-align:end;"><?php echo$displayCurrency;?> <span> ₹<?php echo $item['price'] * $item['quantity']; ?>  </span> 
    </tr>

    
     <?php endforeach; ?>
 
   <tr colspan="2">
    <td colspan="" class="calorir fw-bold pl-0" style="text-align:start;">Shipping:</td>
    <td colspan="" class="calorirs pr-0" style="text-align:end;"> <small><?php echo$displayCurrency;?> </small> <span class="viaa"><?php echo $shippingPrice; ?></span></td>
  </tr>
  	 <tr colspan="2">
    <td colspan="" class="calorir fw-bold pl-0" style="text-align:start;">GST:</td>
    <td colspan="" class="calorirs pr-0" style="text-align:end;"> <small><?php echo$displayCurrency;?> </small> <span class="viaa"><?php echo $gstPrice; ?></span></td>
  </tr>
    
     <tr colspan="2">
    <td colspan="" class="calorir fw-bold pl-0 pb-0" style="text-align:start;">Total:</td>
    <td colspan="" class="calorirs pr-0 pb-0" style="text-align:end;"><?php echo$displayCurrency;?> <?php echo $total = $subtotal + $gstPrice + $shippingPrice;?></td>
  </tr>
  
</tbody>
</table>
<br>
<!--PAY NOW BUTTON-->
        <div class="row pricing-slider-two">
		<div class="col-lg-3"> </div>
            <div class="col-lg-6"> 
		 
              <div class="pricing-box-two wow fadeInUp" data-wow-delay=".4s"><br>
                
  				  <div class="payment">
   <form action="payment-success.php" method="POST" class="pay-form">
	<script 
	src="https://checkout.razorpay.com/v1/checkout.js"  
	data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['subtotal']?>"
    data-currency=<?=$curncy;?>
    data-name="<?php echo $data['name']?>" 
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="3456"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== $curncy) { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== $curncy) { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
	     <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
<input type="hidden" name="shopping_order_id" value="3456">
<input type="hidden" name="callback_url" value="payment-success.php">
<input type="hidden" name="cancel_url" value="payment-success.php">
</form>
	</div>
    </div>
            </div>
 		<div class="col-lg-3"> </div>
         </div>
</div>
</div>
         
        <div class="col-lg-2"></div>
 
</div>
</div>
    
    
    <!--pay now-->
    
    
   
         </div>
</section>
<?php include('inc/footer.php'); ?>