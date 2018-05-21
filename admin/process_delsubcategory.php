<?php
session_start();
if (!isset($_SESSION['unm']))
					{
						header("location:index.php");
						
					}
require('includes/config.php');
	if(empty($_POST['subcatnm']))
		{
			echo "No Selected Category";
			
		}
		else
		{
			
			$cid=$_POST['subcatnm'];
			
			$q="delete from sub_categorys where sub_category_name = '$cid' ";
		
			$stmt = oci_parse($con,$q);
			
			// Execute the query
			oci_execute($stmt) or die ("Can't Execute Query...") ;

			
			$qr = "delete from books where subcat_name like ' %$cid'";
			
			$stmt = oci_parse($con, $qr);
			
			// Execute the query
			oci_execute($stmt) or die ("Can't Execute Query...") ;
			
			header("location:category.php");
		}
?>
	
	