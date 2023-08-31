<?php include('inc/header.php');

$activationcode = $_GET['code'];
$ActivationCode = $obj->UpdateStatusByactivationcode($activationcode);
	?>

	<div class="container">
	  
         <?php if(empty($ActivationCode)) { ?>
       <div class="alert alert-danger" role="alerttt" style="float: right; width: 44%;text-align: center; margin: 0 0 00 155px;">Not Activate</div>	        
         <?php  } else { ?>
           <div class="alert alert-success" role="alerttt" style="width: 44%;
    text-align: center;
    font-size: 30px;
    margin: 0 auto;
    font-family: sans-serif;
    height: 50px;">Account activated please sign in</div>
                 
          <?php  }  ?>
           </div>	            
	                  			                      			               
				

<?php include('inc/footer.php');?> 