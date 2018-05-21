<?php session_start();

require('includes/config.php');
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['usernm']))
		{
			$msg="No such User";
		}
		
		if(empty($_POST['pwd']))
		{
			$msg="Password Incorrect........";
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
						
			$unm=$_POST['usernm'];
			
			$q="select * from users where user_name='$unm'";
			
			$stmt = oci_parse($con,$q);
			
			$res=oci_execute($stmt) or die("wrong query");
			
			$row=oci_fetch_assoc($stmt);
			
			if(!empty($row))
			{
				if($_POST['pwd']==$row['PASSWORD'])
				{
					$_SESSION=array();
					$_SESSION['unm']=$row['USER_NAME'];
					$_SESSION['uid']=$row['PASSWORD'];
					$_SESSION['status']=true;
					
					if($_SESSION['unm']!="admin")
					{
						header("location:index.php");
					}
					else
					{
						header("location:admin/index.php");
					}
				}
				
				else
				{
					echo 'Incorrect Password....';
				}
			}
			else
			{
				echo 'Invalid User !';
			}
		}
	
	}
	else
	{
		header("location:index.php");
	}
			
?>