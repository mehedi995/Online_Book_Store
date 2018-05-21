<?php 
session_start();
if (!isset($_SESSION['unm']))
					{
						header("location:index.php");
						
					}
require('includes/config.php');

	$q="select * from books";
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
						<tr>
						<td colspan="7"><a href="addbook.php">Add New Book</a></td>
						</tr>

						<tr>
						<td colspan="7"><a href="BookUpdate.php">Update Book</a></td>
						<tr>
							
<td WIDTH='10%' style="color:darkgreen"><b><u>SR.NO</u></b></td>
<TD style="color:darkgreen" WIDTH='50%'><b><u>NAME</u></b></TD>
<TD style="color:darkgreen" WIDTH='20%'><b><u>EDITION</u></b></TD>
<TD style="color:darkgreen" WIDTH='20%'><b><u>ISBN</u></b></TD>
<TD style="color:darkgreen" WIDTH='20%'><b><u>PAGE</u></b></TD>
<TD style="color:darkgreen" WIDTH='25%'><b><u>CATEGORY</u></b></TD>
<TD style="color:darkgreen" WIDTH='25%'><b><u>SUB CATEGORY</u></b></TD>				
<TD style="color:darkgreen" WIDTH='25%'><b><u> PRICE</u></b></TD>	
<TD style="color:darkgreen" WIDTH='25%'><b><u> DELETE</u></b></TD>

							
						</tr>
						<?php
							$count=1;
							while($row=oci_fetch_assoc($stmt))
							{
							echo '<tr>
										<td>'.$count.'
										<td>'.$row['BOOK_NAME'].'
										<td>'.$row['EDITION'].'
										<td>'.$row['ISBN'].'
										<td>'.$row['PAGE'].'
										<td>'.$row['CAT_NAME'].'
										<td>'.$row['SUBCAT_NAME'].'
										<td>'.$row['PRICE'];

			//	echo "<td><img src='../$row[b_img]' width='50'/>";
										
										
									echo 	'<td><a href="process_del_book.php?sid='.$row['BOOK_ID'].'"><img src="images/drop.png" ></a>
												
									
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
