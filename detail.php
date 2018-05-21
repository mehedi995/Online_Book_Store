<?php session_start();
    
	require('includes/config.php');
	
	$id=$_GET['id'];
	
	$q="select * from books where book_id=$id";
	
		$stmt = oci_parse($con,$q);
		
		// Execute the query
		oci_execute($stmt) or die ("Can't Execute Query...") ;
	
	$row = oci_fetch_assoc($stmt);

?>
<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" />
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/java.js"></script>
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
									<h1 class="title"><?php echo $row['BOOK_NAME'];?></h1>
									<div class="entry">
										<?php
										
											echo '	<table border="0" width="100%">
												 <tr>
													<td><hr color="purple"></td>
												</tr>
												 <tr align="center" bgcolor="#EEE9F3">
													 <td>Item Details</td>
												</tr>
												<tr>
													<td><hr color="purple"></td>
												</tr>
											 </table>
											
											<table border="0"  width="100%" bgcolor="#ffffff">
										

												<tr> 
													<td width="50%" height="100%">
														<table border="0"  width="100%" height="100%">
															<tr valign="top">
																<td align="right" width="10%">NAME</td>
																<td width="6%">: </td>
																<td align="left">'.$row['BOOK_NAME'].'</td>
															</tr>

															<tr>
																<td align="right">BOOK ID</td>
																<td>: </td>
																<td align="left">'.$row['BOOK_ID'].'</td>
																
															</tr>
															
															<tr>
																<td align="right">ISBN</td>
																<td>: </td>
																<td align="left">'.$row['ISBN'].'</td>
																
															</tr>
															
																					
															<tr>
																<td align="right">Publisher </td>
																<td>: </td>
																<td align="left">'.$row['PUBLISHER_NAME'].'</td>
																
															</tr>											
															
															<tr>
																<td align="right"> Edition</td>
																<td>: </td>
																<td align="left">'.$row['EDITION'].'</td>
																
															</tr>
															
															<tr>
																<td align="right">  PAGES</td>
																<td>: </td>
																<td align="left">'.$row['PAGE'].'</td>
															</tr>
															
															<tr>
																<td align="right"> PRICE</td>
																<td>: </td>
																<td align="left">'.$row['PRICE'].'</td>
															</tr>
														</table>
										
														
													</td>
												</tr>
											</table>
										
											
											<table border="0" width="100%">
												 <tr>
													<td><hr color="purple"></td>
												</tr>

												<tr>
													<td><hr color="purple"></td>
												</tr>
																		
											 </table>
																				

											 
											 <tr><td colspan=2><hr color="purple"></td></tr>
											
											<table border="0" width="100%">
												
												 <tr align="center" bgcolor="#EEE9F3">';
												 
												 if(isset($_SESSION['status']))
												 {
													echo ' <td><a href="process_cart.php?nm='.$row['BOOK_NAME'].'&cat='.$_GET['cat'].'&rate='.$row['PRICE'].'&bookid='.$row['BOOK_ID'].'">
														<img src="images/addcart.jpg">
													</a></td>';
												}
												else
												{
													echo '<td><img src="images/addcart.jpg"><br><a href="register.php"> <h4>Please Login..</h4></a></td>';
												}
												echo '</tr>
											</table>';
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
