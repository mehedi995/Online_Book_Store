<?php session_start();
require('includes/config.php');
if (!isset($_SESSION['unm']))
					{
						header("location:index.php");
						
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
		<div class="post" style="margin-left:100px">
			<h1 class="title"></h1>
			<div class="entry" style="min-height:400px">


				<form action='process_addcategory.php' method='POST' onsubmit="return Validate()" name="vform">
					<h2 style="color:white"> CATEGORY </h2>
					<br></br>
						<b style="color:darkgreen">ADD CATEGORY </b>
							<br/>
							<input type='text' name= 'cat' size='25'>
							
							<input type='submit'  value='  ADD  '>
							
							<br><br>
				</form>
				<br>

				<hr>
				<form action='process_delcategory.php' method='POST'>
							
						<br>	
						<b style="color:darkgreen">DELETE CATEGORY </b>						
							<br>
								<select name="del">
									<?php
									
										
			
											$query="select * from categorys ";
			

											$stmt = oci_parse($con,$query);
			
											$res=oci_execute($stmt) or die("wrong query");
											
											//$row=oci_fetch_assoc($stmt);
											
											while($row=oci_fetch_assoc($stmt))
											{
												echo "<option>".$row['CATEGORY_NAME'];
											}
			
											
									?>
								</select>
						
							
							<input type='submit' value='  DELETE  '>
				</form>
				<br>
				
				<hr>

				<form action='process_addsubcategory.php' method='POST' onsubmit="return Validate1()" name="vform">
							<h2 style="color:white">SUB-CATEGORY </h2>

							<br><br>
							<b style="color:darkgreen">PARENT CATEGORY </b>
							<br>
									
										<select  name="parent">
											<?php
											
												require('includes/config.php');
					
													$query="select * from categorys ";
					
													$stmt = oci_parse($con,$query);
					
													$res=oci_execute($stmt) or die("wrong query");
													
													while($row=oci_fetch_assoc($stmt))
													{
														echo "<option value='".$row['CATEGORY_ID']."'>".$row['CATEGORY_NAME'];
														//PASS ID NOT NAME
													}
					
													
											?>
										</select>
									
									
									<br>
									<br>
							<b style="color:darkgreen">ADD SUB-CATEGORY </b>
									<br>
										<input type='text' name= 'subcat' size='25'>
										
										<input type='submit'  value='  ADD  '>
									
									<br><br>	
				</form>

				<hr>

				<form action='process_delsubcategory.php' method='POST'>
						
						<br><br>
						<b style="color:darkgreen">DELETE SUB-CATEGORY </b>						
							<br> 
								<select  name="subcatnm">
									<?php
									
										
			
											$query="select * from categorys ";
			
                                            $stmt = oci_parse($con,$query);
			
											$res=oci_execute($stmt) or die("wrong query");
											
											while($row=oci_fetch_assoc($stmt))
											{
												echo "<option>".$row['CATEGORY_NAME'];
												$qq = "select * from sub_categorys where CATEGORY_ID=".$row['CATEGORY_ID'];
												

                                            $stmts = oci_parse($con,$qq);
			
											$ress=oci_execute($stmts) or die("wrong query");

												while($roww=oci_fetch_assoc($stmts))
												{
													echo "<option value='".$roww['SUB_CATEGORY_ID']."'> --> ".$roww['SUB_CATEGORY_NAME'];
												}
												
											}
			
											//mysqli_close($link);
									?>
								</select>
						
							
							<input type='submit' value=' DELETE '>
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

<script type="text/javascript">
 
 var catnm = document.forms["vform"]["cat"];
 
 
 
 function Validate(){

if(catnm.value==""){
			alert("Category name required.....");
			return false;
}

}
</script>



<script type="text/javascript">
 
 var subcatnm = document.forms["vform"]["subcat"];
 
 
 
 function Validate1(){

if(subcatnm.value==""){
			alert("Sub Category name required.....");
			return false;
}

}
</script>
