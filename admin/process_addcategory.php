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
		if(empty($_POST['cat']))
		{
			$msg[]="Please full fill all requirement.";
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
	
		
			$cat=$_POST['cat'];
			
			$query="insert into categorys(category_id, category_name) values(seq_category_id.nextval,'$cat')";

			$stmt = oci_parse($con,$query);
			
			// Execute the query
			oci_execute($stmt) or die ("Can't Execute Query...") ;
			
			//mysql_close($conn);
			header("location:category.php");
		}
	}
	else
	{
		header("location:index.php");
	}
?>
	
	