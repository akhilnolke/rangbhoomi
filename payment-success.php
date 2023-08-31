<?php
session_start();
require('inc/header.php');
require('config.php');
require_once 'common.php';
$applicatF = new Ranghboomii();
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
$success = true;


$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
	
	$razorpayOrderId = $_SESSION['razorpay_order_id'];
	$razorpayPaymentId = $_POST['razorpay_payment_id'];
 	$name = $_SESSION['billing_name'];
	$email = $_SESSION['billing_email'];
 	$contact = $_SESSION['billing_phone'];
    $subtotal = $_SESSION['subtotal'];
	$paymentStatus = 'SUCCESS';
	$updatestamp=date('Y-m-d h:i:s');
  	$stmt = $applicatF->runQuery("SELECT * FROM onlinepayment WHERE email='$email' and razorpayOrderId='$razorpayOrderId'");
// 	$stmt->execute(array(":email1"=>$email));
	$rows = $stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() > 0)
	{
		$errMSG = "You have already submited.";    
	}
	else
	{
	
	if($applicatF->updatePayStatus($email, $razorpayOrderId, $razorpayPaymentId, $paymentStatus, $updatestamp ))
		{			
			
		$successMSG = "Your payment has been completed successfuly..";
	
		$to = $email;
//  		$to = 'jaspreetsingh9088@gmail.com';
			$subject = 'payment success';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=ISO-8859-1" . "\r\n";

// More headers
$headers .= 'From:'.'gagan13420@gmail.com' . "\r\n";

$message .= '<div class="container">
      <div class="row">
		<div class="col-md-12" style="padding-left: 490px;">
		</div>
 		</div>
    </div>
    
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class=text-center>
     <h6 style="
  color: #000000;
    text-align: center;
    font-size: 20px;
    font-weight: 600;
    margin-top: 36px;
" class="thanks-order">Thank you. Your order has been received.</h6>
        </div>
    
        
         <div class="wrap-contact100" style="    margin: 0 auto;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    width: 80%;
    padding: 24px;
    background: #fff;">
   
        <h4 style=" font-size: 28px;
    font-weight: 600 !important;
    width: 96%;
   color:#2e524a;
    text-align: center;
    margin-top: 40px;
    margin-bottom: 24px;"
    class="">Order details</h4>
        <table style="    width: 66%;
    margin: 0 auto;">
  <tbody>
  
     <tr colspan="2">
    <td colspan="" class="calorir" style="text-align:start; font-weight:bold; font-size: 20px;">Your Name:</td>
    <td colspan="" class="calorirs" style="text-align:end;  padding: 15px;"> <small>'.$_SESSION["billing_name"].' </small></span></td>
  </tr>
   <tr colspan="2">
    <td colspan="" class="calorir" style="text-align:start;  font-weight:bold;font-size: 20px;">Your Email:</td>
    <td colspan="" class="calorirs" style="text-align:end;  padding: 15px;"> <small> '.$_SESSION["billing_email"].' </small> </td>
  </tr>
  
     <tr colspan="2">
    <td colspan="" class="calorir" style="text-align:start; font-weight:bold; font-size: 20px;">Order ID:</td>
    <td colspan="" class="calorirs" style="text-align:end;  padding: 15px;"><small>  '.$_POST["razorpay_order_id"].' </small></td>
  </tr>
  
     <tr colspan="2">
    <td colspan="" class="calorir" style="text-align:start;  font-weight:bold;font-size: 20px;">Payment ID:</td>
    <td colspan="" class="calorirs" style="text-align:end; padding: 15px;"><small>'.$_POST["razorpay_payment_id"].' </small></td>
  </tr>
   
     <tr colspan="2">
    <td colspan="" class="calorir" style="text-align:start; font-weight:bold; font-size: 20px;">Mobile Number:</td>
    <td colspan="" class="calorirs" style="text-align:end;padding: 15px;"><small>'.$_SESSION["billing_phone"].'</small></td>
  </tr>
 
    <tr colspan="2">
    <td colspan="" class="calorir" style="text-align:start; font-weight:bold; font-size: 20px;">Amount:</td>
    <td colspan="" class="calorirs" style="text-align:end;  padding: 15px;"><small> INR '.$_SESSION["subtotal"].' </small></td>
  </tr>
</tbody>
</table><br>

 </div>
    </div>
    <div class="col-lg-2"></div>
     </div>
    </div>';


$headers .= 'Cc:'. 'gagan13420@gmail.com' . "\r\n";
 $mailto = mail($to,$subject,$message,$headers);
   
	// payment email successful end				
			
		}
		else
		{
			$errMSG = "sorry , Query could no execute...";
		}
	
  //$html = "{$_POST['razorpay_payment_id']}";
}
}
else
{
$paymentStatus = 'FAILURE';
$updatestamp=date('Y-m-d h:i:s');
$applicatF->updatePayStatus($email, $razorpayOrderId, $razorpayPaymentId, $paymentStatus, $updatestamp );
}

?> 


<style>
@media (min-width:0) and (max-width:567px){

h5.quitww {
    width: 100% !important;
    margin-top: 30px !important;
    text-align: center !important;
}
section.bft-1 {
    margin-top: 20px !important;
}
h4.join-tea {
    margin-top: 0px !important;
}
a.btn.btn-primary.go-to-prof {
    font-family: ui-serif;
    justify-content: center;
    display: flex;
    text-decoration: underline;
}
section.elementor-section.elementor-top-section.elementor-element.elementor-element-d74604c.elementor-section-boxed.elementor-section-height-default.elementor-section-height-default {
    margin-top: 0px !important;
}
}
.pay-sucss-row{
    justify-content:center;
    text-align:center;
}
    h1.Check-out {
 
    font-weight: 600 !important;
}
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
li.my-accounts {
    text-transform: capitalize;
    font-size: 16px;
    
}
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
     
    text-align: center;
    margin-bottom:0px;
}
h6.odd-2 {
    text-align: center;
    
    font-weight: 600;
    margin-top: 5px;
    margin-bottom: 5px;
}
h4.headnames {
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
     .contain-payment{
         width:100% !important;
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
.elementor-button.elementor-size-xs {
    font-size: 13px;
    padding: 16px 20px;
    border-radius: 0 !important;
   position: unset !important;
    background: #2e524a !important;
    display: block !important;
    margin: auto !important;
    margin-top: 14px !important;
}
button.elementor-button.elementor-size-xs {
    position: unset !important;
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
.elementor-field-textual.elementor-size-md {
    font-size: 16px;
    min-height: 47px;
    padding: 16px 16px;
    border-radius: 0 !important;
     
    background: white;
    border: 0 !important;
}
.elementor-button.elementor-size-xs {
    font-size: 13px;
    padding: 16px 20px;
    border-radius: 0 !important;
    position: absolute !important;
    right: 66px;
    background: #2e524a !important;
}
span.elementor-button-text {
 
    font-size: 16px;
}
.elementor-icon i, .elementor-icon svg {
    width: 1em;
    height: 1em;
    position: relative;
    display: block;
    bottom: 6px !important;
    top: 150px;
    right: 50px;
}
h5.quitww {
    width: 56%;
    font-style: italic;
  
    margin-top: 74px;
}
.svg_success svg {
    width: 100px;
    color: #000;
}
.whole-pay-table {
    margin: 0 auto;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    width: 80%;
    padding: 24px 0;
        background: #fff;

}
a.go-to-prof {
    background: #000;
    color: #fff;
    padding: 8px 12px;
    border-radius: 5px;
}
a.go-to-prof  svg{
    width: 20px;
    margin-right: 4px;
    margin-bottom: 2px;
}
</style>

<section style="    background: #f7c1b7;
    padding: 25px 0;">
    
     <div class="container contain-payment">
      <div class="row pay-sucss-row">
		<div class="col-md-12">
		 <div class="breadcrum-title-two wow fadeInUp">
			
			  <!--<h1 class="Check-out"><//?php //echo $name; ?></h1>-->
			  <div class="svg_success">
			      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
			          <path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" /></svg>
			  </div>
			 <p class="h2-subtitle-two">Your payment has been completed successfuly..</p>
         </div>
		
		</div>
 		</div>
    </div>
    
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class=text-center>
                <h6 class="thanks-order fw-bold my-3">Thank you. Your order has been received.</h6>
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
                <h6 class=odd-2>INR <?php echo $subtotal; ?>
                </h6>
            </div>
             <div class="col-lg-3 bl">
                <h6 class=odd-1>Payment method:</h6>
                <h6 class=odd-2>Razorpay</h6>
            </div>
        </div>
        
         <div class="wrap-contact100 whole-pay-table  rounded my-5">
        <h4 class=" headnames my-0">Order details</h4>
	   <?php
	if(isset($errMSG)){
			?>
			<div class="alert alert-danger alert-dismissible"  style="margin-top:20px; margin-bottom:20px;">
                 <h4 style="font-size: 14px; text-align:center;"><i class="icon fa fa-ban"></i> <?php echo $errMSG; ?></h4>
             </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
		    <div class="alert alert-success alert-dismissible mx-2 my-2">
                 <h4 style="text-align:center;font-size:20px;"><i class="icon fa fa-check"></i> <?php echo $successMSG; ?></h4>
               
            </div>
        <?php
	}
 	?> 
        <table style="margin:0 auto;" class="mt-2">
  <tbody>
    
   
     <tr colspan="2">
    <td colspan="" class="calorir fw-bold" style="text-align:start;">Your Name:</td>
    <td colspan="" class="calorirs" style="text-align:end;"> <small><?php echo $name; ?> </small></span></td>
  </tr>
   <tr colspan="2">
    <td colspan="" class="calorir fw-bold" style="text-align:start;">Your Email:</td>
    <td colspan="" class="calorirs" style="text-align:end;"> <small><?php echo $email; ?> </small> </td>
  </tr>
  
     <tr colspan="2">
    <td colspan="" class="calorir fw-bold" style="text-align:start;">Order ID:</td>
    <td colspan="" class="calorirs" style="text-align:end;"><small><?php echo $razorpayOrderId; ?> </small></td>
  </tr>
  
    <tr colspan="2">
    <td colspan="" class="calorir fw-bold" style="text-align:start;">Payment ID:</td>
    <td colspan="" class="calorirs" style="text-align:end;"><small><?php echo $razorpayPaymentId; ?> </small></td>
  </tr>
     <tr colspan="2">
    <td colspan="" class="calorir fw-bold" style="text-align:start;">Mobile Number:</td>
    <td colspan="" class="calorirs" style="text-align:end;"><small><?php echo $contact; ?></small></td>
  </tr>
  <!--  <tr colspan="2">-->
  <!--  <td colspan="" class="calorir" style="text-align:start;">Service:</td>-->
  <!--  <td colspan="" class="calorirs" style="text-align:end;"><small>   </small></td>-->
  <!--</tr>-->
    <tr colspan="2">
    <td colspan="" class="calorir fw-bold" style="text-align:start;">Amount:</td>
    <td colspan="" class="calorirs" style="text-align:end;"><small>INR <?php echo $subtotal; ?></small></td>
  </tr>
</tbody>
</table><br>
<!--<a href="my-account"><div class="profilebtn">Go to your profile</div></a>-->
<div class="text-start ml-3">
  
<a class="go-to-prof" href="sellers-home.php" role="button">  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
    </svg>Home</a>
    
</div>
 </div>
    </div>
    <div class="col-lg-2"></div>
    </div>
    
    
    </div>
</section>
<?php include('inc/footer.php'); ?>