<?php
require_once 'dbconfig.php';
// ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1); 
//  error_reporting(E_ALL);
// ob_start();
class Ranghboomii {

	private $conn;

	public function __construct() {
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
	}

	public function runQuery( $sql ) {
		$stmt = $this->conn->prepare( $sql );
		return $stmt;
	}

	public function lasdID() {
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}


	public function razorPayOnline($userid,$billing_address,$billing_email,$billing_area,$billing_land,$billing_name,$billing_phone,$billing_city,$billing_state,$billing_pincode,$billing_country,$shipping_address,$shipping_email,$shipping_area,$shipping_land,$shipping_name,$shipping_phone,$shipping_city,$shipping_state,$shipping_pincode,$shipping_country,$subtotal,$pname,$shipping,$gst,$razorpayOrderId,$razorpayPaymentId) {
		try {
	   	$stmt = $this->conn->prepare( "INSERT INTO onlinepayment(userid,billing_address,billing_email,billing_area,billing_land,billing_name,billing_phone,billing_city,billing_state,billing_pincode,billing_country,shipping_address,shipping_email,shipping_area,shipping_land,shipping_name,shipping_phone,shipping_city,shipping_state,shipping_pincode,shipping_country,subtotal,pname,shipping,gst,razorpayOrderId,razorpayPaymentId) 	
			VALUES(:userid_o,:billing_address_o,:billing_email_o,:billing_area_o,:billing_land_o,:billing_name_o,:billing_phone_o,:billing_city_o,:billing_state_o,:billing_pincode_o,:billing_country_o,:shipping_address_o,:shipping_email_o,:shipping_area_o,:shipping_land_o,:shipping_name_o,:shipping_phone_o,:shipping_city_o,:shipping_state_o,:shipping_pincode_o,:shipping_country_o,:subtotal_o,:pname_o,:shipping_o,:gst_o,:razorpayOrderId_o,:razorpayPaymentId_o)");
	     	$stmt->bindparam( ":userid_o", $userid);
			$stmt->bindparam( ":billing_address_o", $billing_address);
  			$stmt->bindparam( ":billing_email_o", $billing_email);
  			$stmt->bindparam( ":billing_area_o", $billing_area);
  			$stmt->bindparam( ":billing_land_o", $billing_land);
  			$stmt->bindparam( ":billing_name_o", $billing_name);
  			$stmt->bindparam( ":billing_phone_o", $billing_phone); 
			$stmt->bindparam( ":billing_city_o", $billing_city); 
			$stmt->bindparam( ":billing_state_o", $billing_state);
			$stmt->bindparam( ":billing_pincode_o", $billing_pincode);
			$stmt->bindparam( ":billing_country_o", $billing_country);
		    $stmt->bindparam( ":shipping_address_o", $shipping_address);
  			$stmt->bindparam( ":shipping_email_o", $shipping_email);
  			$stmt->bindparam( ":shipping_area_o", $shipping_area);
  			$stmt->bindparam( ":shipping_land_o", $shipping_land);
  			$stmt->bindparam( ":shipping_name_o", $shipping_name);
  			$stmt->bindparam( ":shipping_phone_o", $shipping_phone); 
			$stmt->bindparam( ":shipping_city_o", $shipping_city); 
			$stmt->bindparam( ":shipping_state_o", $shipping_state);
			$stmt->bindparam( ":shipping_pincode_o", $shipping_pincode);
			$stmt->bindparam( ":shipping_country_o", $shipping_country);
			$stmt->bindparam( ":subtotal_o", $subtotal);
			$stmt->bindparam( ":pname_o", $pname);
			$stmt->bindparam( ":shipping_o", $shipping);
			$stmt->bindparam( ":gst_o", $gst);
 		    $stmt->bindparam( ":razorpayOrderId_o", $razorpayOrderId);
			$stmt->bindparam( ":razorpayPaymentId_o", $razorpayPaymentId);
			$stmt->execute();
			return $stmt;
        //  print_r($stmt);
		} catch ( PDOException $ex) {
			echo $ex->getMessage();
		}
	}
	
	public function updatePayStatus($email, $razorpayOrderId, $razorpayPaymentId, $paymentStatus, $updatestamp) {
		try {
			$stmt = $this->conn->prepare( "UPDATE onlinepayment SET razorpayPaymentId=:razorpayPaymentId,paymentStatus=:paymentStatus,updatestamp=:updatestamp WHERE billing_email=:billing_email and razorpayOrderId='$razorpayOrderId'");
			$stmt->bindparam( ":billing_email", $email);
  			$stmt->bindparam( ":razorpayPaymentId", $razorpayPaymentId);
			$stmt->bindparam( ":paymentStatus", $paymentStatus);
  			$stmt->bindparam( ":updatestamp", $updatestamp);
			$stmt->execute();
			return $stmt;

		} catch ( PDOException $ex ) {
			echo $ex->getMessage();
		}
	}
}