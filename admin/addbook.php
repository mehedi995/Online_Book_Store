<?php session_start();
require('includes/config.php');
?>

<!DOCTYPE html >

<html >
<head>
		<?php
			include("includes/head.inc.php");
		?>
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
		<div class="post" style="margin-left:100px">
			<h1 class="title" >Add Book</h1>
			<div class="entry" >
				<form action='process_addbook.php' method='POST' enctype="multipart/form-data">
				
						<br><b>Book Name:</b><br>
						<input type='text' name='name' size='40'>
						<br><br>
						
						 <br><b>Edition:</b><br>
						<input type='text' name='edition' size='40'>
						<br><br>
						
						<b>ISBN:</b><br>
						<input type='text' name='isbn' size='40'>
						<br><br>

						<b>Language:</b><br>
						<input type='text' name='language' size='40'>
						<br><br>

						<b>PRICE:</b><br>
						<input type='text' name='price' size='40'>
						<br><br>

						<b>Discount:</b><br>
						<input type='text' name='discount' size='40'>
						<br><br>

						
						<b>PAGE(s):</b><br>
						<input type='text' name='page' size='40'>
						<br><br>


						<b>Category Name:</b><br>
						<select name="cat">
									<?php
													
											$query="select * from categorys ";
			                             

											$stmt = oci_parse($con,$query);
			
											$res=oci_execute($stmt) or die("wrong query");
											
											//$row=oci_fetch_assoc($stmt);
											
											while($row=oci_fetch_assoc($stmt))
											{
												echo "<option>".$row['CATEGORY_NAME'];
												$category_id= $row['CATEGORY_ID'];
											}
									
											
									?>
						</select>

						<br>
						<br>
						<b> Sub Category Name:</b><br>
						<select name="subcat">
									<?php
													
											$query="select * from sub_categorys  " ;
			

											$stmt = oci_parse($con,$query);
			
											$res=oci_execute($stmt) or die("wrong query");
											
											//$row=oci_fetch_assoc($stmt);
											
											while($row=oci_fetch_assoc($stmt))
											{
												echo "<option>".$row['SUB_CATEGORY_NAME'];
											}
			
											
									?>
						</select>
						
						<br>
						<br>
						<b> Publisher Name:</b><br>
						<select name="publisher">
									<?php
													
											$query="select * from publishers ";
			

											$stmt = oci_parse($con,$query);
			
											$res=oci_execute($stmt) or die("wrong query");
											
											//$row=oci_fetch_assoc($stmt);
											
											while($row=oci_fetch_assoc($stmt))
											{
												echo "<option>".$row['PUBLISHER_NAME'];
											}
			
											
									?>
						</select>
						<br>
						<br>						

	                    <b> Author Name:</b><br>
						<select name="author">
										<?php
													
											$query="select * from authors ";
			

											$stmt = oci_parse($con,$query);
			
											$res=oci_execute($stmt) or die("wrong query");
											
											//$row=oci_fetch_assoc($stmt);
											
											while($row=oci_fetch_assoc($stmt))
											{
												echo "<option>".$row['AUTHOR_NAME'];
											}
			
											
									?>
						</select>
						<br><br>

						
						<input  type='submit'  value='   OK   '  >
				</form>
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
