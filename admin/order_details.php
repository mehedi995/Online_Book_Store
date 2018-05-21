<?php 
session_start();
if (!isset($_SESSION['unm']))
					{
						header("location:index.php");
						
					}
require('includes/config.php');

	$q="select * from orders ORDER BY order_date desc ";
	 //$res=mysqli_query($conn,$q) or die("Can't Execute Query...");
	
	$stmt = oci_parse($con,$q);
			
			// Execute the query
	oci_execute($stmt) or die ("Can't Execute Query...") ;

	?>

<!DOCTYPE html >

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
						
							
<td WIDTH='10%' style="color:darkgreen"><b><u>SR.NO</u></b></td>
<TD style="color:darkgreen" WIDTH='50%'><b><u>ORDER ID</u></b></TD>
<TD style="color:darkgreen" WIDTH='20%'><b><u>BOOK ID</u></b></TD>
<TD style="color:darkgreen" WIDTH='20%'><b><u>BOOK NAME</u></b></TD>
<TD style="color:darkgreen" WIDTH='20%'><b><u>PRICE</u></b></TD>
<TD style="color:darkgreen" WIDTH='25%'><b><u>QUANTITY</u></b></TD>			
<TD style="color:darkgreen" WIDTH='25%'><b><u> TOTAL</u></b></TD>	
<TD style="color:darkgreen" WIDTH='25%'><b><u>USER EMAIL</u></b></TD>
<TD style="color:darkgreen" WIDTH='25%'><b><u>ORDER DATE</u></b></TD>

							
						</tr>
						<?php
							$count=1;
							while($row=oci_fetch_assoc($stmt))
							{
							echo '<tr>
										<td>'.$count.'
										<td>'.$row['ORDER_ID'].'
										<td>'.$row['BOOK_ID'].'
										<td>'.$row['BOOK_NAME'].'
										<td>'.$row['PRICE'].'
										<td>'.$row['QUANTITY'].'
										<td>'.$row['TOTAL'].'
										<td>'.$row['USER_EMAIL'].'
										<td>'.$row['ORDER_DATE'];

			//	echo "<td><img src='../$row[b_img]' width='50'/>";
										
										
										'<td><a href="" ></a>
												
									
								</tr>';
									$count++;
							}
						?>

					</TABLE>
				
			</div>
			
		</div>
		
	</div>
	
	<div style="clear: both;">&nbsp;</div>
</div>

</body>
</html>
