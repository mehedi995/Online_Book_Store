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
			<h1 class="title" >Update Book</h1>
			<div class="entry" >
				<form action='process_UpdateBook.php' method='POST' enctype="multipart/form-data">
						
						<b>Book ID:</b><br>
						<select name="bid">
									<?php
													
											$query="select * from books ";
			

											$stmt = oci_parse($con,$query);
			
											$res=oci_execute($stmt) or die("wrong query");
											
											//$row=oci_fetch_assoc($stmt);
											
											while($row=oci_fetch_assoc($stmt))
											{
												echo "<option>".$row['BOOK_ID'];
											}
			
											
									?>
						</select>


						<b>PRICE:</b><br>
						<input type='text' name='price' size='40'>

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
