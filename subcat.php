<?php
require('includes/config.php');
 session_start();


	
	//$cat=$_GET['cat_nm'];
	
	$q = " select * from sub_categorys where category_id = ".$_GET['cat'];

			$stmt = oci_parse($con,$q);
			
			// Execute the query
			oci_execute($stmt) or die ("Can't Execute Query...") ;
	
	$row1 = oci_fetch_assoc($stmt);
	
	if($_GET['catnm']==$row1['SUB_CATEGORY_NAME'])
	{
		header("location:booklist.php?subcatid=".$row1['SUB_CATEGORY_ID']."&subcatnm=".$row1["SUB_CATEGORY_NAME"]);
		
	}
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
						<div class="post">
							<h1 class="title"><?php echo $_GET['catnm'];?></h1>
							<div class="entry">
						
								<?php
									Do
									{
										
										echo '<li><a href="booklist.php?subcatid='.$row1['SUB_CATEGORY_ID'].'&subcatnm='.$row1["SUB_CATEGORY_NAME"].'">'.$row1['SUB_CATEGORY_NAME'].'</a></li>';
										//&subcatnm='.$row1["subcat_nm"].'
									} 
									while($row1 = oci_fetch_assoc($stmt))
								?>
							
							</div>
							
						</div>
						
					</div>
					<!-- end content -->
					
					<!-- start sidebar -->
					<div id="sidebar">
							<?php
								include("includes/search.inc.php");
							?>
					</div>
					<!-- end sidebar -->
					<div style="clear: both;">&nbsp;</div>
				</div>
			<!-- end page -->
			
			<!-- start footer -->
				<div id="footer">
							<?php
								include("includes/footer.inc.php");
							?>
				</div>
			<!-- end footer -->
</body>
</html>
