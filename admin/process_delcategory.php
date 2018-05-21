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
		if(empty($_POST['del']))
		{
			$msg[]="Please full fill all requirement";
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
		
			
		
			$delcat=$_POST['del'];
			
			$query="delete from categorys where category_name ='$delcat' ";
		
			$stmt = oci_parse($con,$query);
			
			// Execute the query
			oci_execute($stmt) or die ("Can't Execute Query...") ;

			
			header("location:category.php");
		}
	}
	else
	{
		header("location:index.php");
	}
?>
	
	