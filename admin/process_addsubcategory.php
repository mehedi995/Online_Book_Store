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
		if(empty($_POST['subcat']) || empty($_POST['parent']))
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
		
			
		
			$parent = $_POST['parent'];
			$subcat=$_POST['subcat'];
			
			$query="insert into sub_categorys values(seq_sub_category_id.nextval, $parent ,'$subcat')";
				
				$stmt = oci_parse($con,$query);

				oci_execute($stmt) or die("wrong query");

			
			header("location: category.php");
		}
	}
	else
	{
		header("location:index.php");
	}
?>