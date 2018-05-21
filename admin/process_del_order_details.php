<?php
session_start();
if (!isset($_SESSION['unm']))
					{
						header("location:index.php");
						
					}
require('includes/config.php');

			$query="delete from order_details where ORDER_ID =".$_GET['orderid'];
		
			$stmt = oci_parse($con,$query);

			$res=oci_execute($stmt) or die("wrong query");

			header("location:order_details.php");

?>