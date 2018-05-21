<?php 
session_start();
if (!isset($_SESSION['unm']))
					{
						header("location:index.php");
						
					}
require('includes/config.php');

	$q= " 
		 BEGIN 
			  totalBooks(); 
			 
		  END; " ;

	$stmt = oci_parse($con,$q);
  
    $res=oci_execute($stmt) or die("wrong query");

    oci_result($stmt, $total);

	
	?>

<!DOCTYPE html>

<html >
<head>
		<?php
			include("includes/head.inc.php");
		?>
		<style>
			table{padding:5px;border:10px solid gray}
			td,th{padding:15px}
			
		</style>
</head>
<body>
<!-- start header -->
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
<!-- end header -->
<!-- start page -->

<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title"></h1>
			<div class="entry">
				
					<table border='1' WIDTH='100%'>
						<tr>
								<td WIDTH='10%' style="color:darkgreen"> <b><u>Total Book</u></b>
									
								<?php	
		                        echo $total ; 
								
								?>

							
						</tr>
						<?php
							/*
							$count=1;
							while($row=oci_fetch_assoc($stmt))
							{
							echo '<tr>
										<td>'.$count.'
										<td>'.$row['con_nm'].'
										<td>'.$row['con_email'].'
										<td>'.$row['con_query'].'
										<td><a href="process_del_contact.php?sid='.$row['con_id'].'"><img src="images/drop.png" ></a>
												
									
									</tr>';
									$count++;

							}

							*/
						?>

					</TABLE>
				
			</div>
			
		</div>
		
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>


</body>
</html>
