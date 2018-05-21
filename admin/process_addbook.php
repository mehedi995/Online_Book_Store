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

		if(empty($_POST['name']) || empty($_POST['language']) || empty($_POST['publisher'])|| empty($_POST['edition']) ||
		 empty($_POST['isbn']) || empty($_POST['page']) || empty($_POST['price']) || empty($_POST['subcat'])|| empty($_POST['cat']) )
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
		
			$b_nm=$_POST['name'];
			$b_cat=$_POST['cat'];
			$b_subcat=$_POST['subcat'];
			$b_edition=$_POST['edition'];
			$b_publisherId=$_POST['publisher'];
			$b_language=$_POST['language'];			
			$b_isbn=$_POST['isbn'];
			$b_pages=$_POST['page'];
			$b_price=$_POST['price'];
			$b_author=$_POST['author'];
			$b_discount=$_POST['discount'];
		
			
			$query="insert into books values (seq_book_id.nextval, '$b_nm', '$b_edition', $b_isbn ,'$b_language', $b_price,
			$b_discount , $b_pages, '$b_cat', '$b_subcat', '$b_author', '$b_publisherId' )";
			
			$stmt = oci_parse($con,$query);
			
			// Execute the query
			oci_execute($stmt) or die ("Can't Execute Query...") ;

			header("location:addbook.php");
		
		}
	}
	else
	{
		header("location:index.php");
	}
?>
	
	