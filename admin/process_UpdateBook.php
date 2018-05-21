<?php
session_start();
if (!isset($_SESSION['unm']))
					{
						header("location:index.php");
						
					}
require('includes/config.php');

	if(!empty($_POST))
	{
		$msg=array();

		if(empty($_POST['price']) || empty($_POST['bid']) )
		{
			$msg[]="Please full fill all requirement";
		}

		if(!(is_numeric($_POST['price'])))
		{
			$msg[]="Price must be in Numeric  Format...";
		}
			
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{	
		
		    $b_id=$_POST['bid'];
			
			$b_price=$_POST['price'];
		
			
			$query="Update  books set price = '$b_price' where book_id= $b_id ";
			
			$stmt = oci_parse($con,$query);
			
			// Execute the query
			oci_execute($stmt) or die ("Can't Execute Query...") ;

			header("location:all_book.php");
		
		}
	}
	else
	{
		header("location:index.php");
	}
?>
	
	