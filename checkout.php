<?php
 session_start();
 require('includes/config.php'); 
 if (!isset($_SESSION['unm']))
					{
						header("location:index.php");
						
					}
	
	//echo $uid;
	// if(isset($submit))
	// {
	// $query="  ";
	
	// $stmt=oci_parse($con, $query) or die("Can't Execute Query...");
	// oci_execute($stmt);
	// header("location:payment_details.php");
	// }


?>

<!DOCTYPE html >

<html >
<head>
		<?php
			include("includes/head.inc.php");
		?>
</head>

<body>
		
				<div id="header">
					<div id="menu">
						<?php
							include("includes/menu.inc.php");
						?>
					</div>
				</div>
				<div id="logo-wrap">
				<div id="logo">
						<?php
							include("includes/logo.inc.php");
						?>
				</div>
				</div>
				
	<?php 

			if(isset($_SESSION['cart'])) {

     $total = 0;

     foreach($_SESSION['cart'] as $id => $qty) {

      $query1=("SELECT * FROM books WHERE book_id = ".$bookid);
       $stmt1 = oci_parse($con,$query1);
       $result = oci_execute($stmt1);

    if($result){

      if($obj = $result->oci_fetch_object()) {


        $cost = $obj->price * $qty;

        $user = $_SESSION["unm"];

       // $query = $mysqli->query();



      $query=("INSERT INTO orders (order_id , book_id , book_name , price, quantity, total, user_email, order_date) VALUES(seq_order_id.nextval ,'$obj->bookid', '$obj->book_name', '$obj->rate', $qty, $cost, '$user', CURRENT_TIMESTAMP)");
      
       $stmt = oci_parse($con,$query);
       $result = oci_execute($stmt);

        // if($query){
        //   $newqty = $obj->qty - $quantity;
        //   if($mysqli->query("UPDATE products SET qty = ".$newqty." WHERE id = ".$product_id)){

        //   }
        }

        //send mail script
        /*$query = $mysqli->query("SELECT * from orders order by date desc");
        if($query){
          while ($obj = $query->fetch_object()){
            $subject = "Your Order ID ".$obj->id;
            $message = "<html><body>";
            $message .= '<p><h4>Order ID ->'.$obj->id.'</h4></p>';
            $message .= '<p><strong>Date of Purchase</strong>: '.$obj->date.'</p>';
            $message .= '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
            $message .= '<p><strong>Product Name</strong>: '.$obj->product_name.'</p>';
            $message .= '<p><strong>Price Per Unit</strong>: '.$obj->price.'</p>';
            $message .= '<p><strong>Units Bought</strong>: '.$obj->units.'</p>';
            $message .= '<p><strong>Total Cost</strong>: '.$obj->total.'</p>';
            $message .= "</body></html>";
            $headers = "From: support@techbarrack.com";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $sent = mail($user, $subject, $message, $headers) ;
            if($sent){
              $message = "";
            }
            else {
              echo 'Failure';
            }
          }
        }*/



      }
    }
  }


unset($_SESSION['cart']);
header("location:checkout.php");

?>

		
     
</div>      
</div>
</body>