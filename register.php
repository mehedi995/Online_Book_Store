<?php session_start(); ?>

<!DOCTYPE html>

<html>
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
									<h1 class="title">Welcome to Registeration.</h1>
						
									<div class="entry">
									<br><br>
										<?php
											if(isset($_GET['error']))
											{
												echo '<font color="red">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
											
											if(isset($_GET['ok']))
											{
												echo '<font color="blue">You are successfully Registered..</font>';
												echo '<br><br>';
											}
										
										?>
									
										<table>
											<form action="process_register.php" method="POST" onsubmit="return Validate()" name="vform">
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													 <td><b>User Name:</b>&nbsp;&nbsp;</td>
													 <td><input type='text' size="30" maxlength="30" name='unm'></td>
													 <td>&nbsp;</td>
													
												</tr>
												<tr><td>&nbsp;</tr>	

												<tr>
													<td><b>E-mail:</b>&nbsp;&nbsp;</td>
													<td><input type='text' name='mail' size="30"></td>
													
												</tr>

												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Phone Number:</b>&nbsp;&nbsp;</td>
													<td><input type='text' name='phone' size="30"></td>
													
												</tr>
												
												<tr><td>&nbsp;</tr>

												<tr>
													<td><b>Password:</b>&nbsp;&nbsp;</td>
													<td><input type='password' name='pwd' size="30"></td>
													 
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Confirm Password:</b>&nbsp;&nbsp;</td>
													<td><input type='password' name='cpwd' size="30"></td>
													
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												<tr>
													<td><b>Address:</b>&nbsp;&nbsp;</td>
													<td> <textarea input type='text' name='address' rows="2" cols="30"> </textarea></td> 
													
												</tr>

												<tr><td>&nbsp;</tr>

												<tr>
													<td><b>District:</b>&nbsp;&nbsp;</td>
													<td><input type='text' name='district' size="30"></td>
													
												</tr>
												
												<tr><td>&nbsp;</tr>

												<tr>
													<td><b>City:</b>&nbsp;&nbsp;</td>
													<td>
													<select style="width: 200px;" name="city">
														
															<option>Dhaka </option>
															<option>Comilla </option>
															<option>Chittagang </option>
															<option>Natore </option>
															<option>Pabna </option>
															<option>Rajshahi </option>
															<option>Sylhet </option>
															<option>Narayanganj </option>
															<option>Jamalpur </option>
															<option>Barisal </option>
															<option>khulna </option>
															<option>Feni </option>
															<option>Gazipur </option>
															<option>Dinajpur </option>
															<option>Bogra </option>
														
													</select>
												
												</tr>
												
												<tr><td>&nbsp;</tr>
												
												
												
												<tr>
													<td colspan='2' align='center'>
														<input type='submit' value="  OK  ">
													</td>
												</tr>
											</form>
										</table>
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


<script type="text/javascript">
 var fullname = document.forms["vform"]["fnm"];
 var username = document.forms["vform"]["unm"];
 var pass = document.forms["vform"]["pwd"];
 var c_pass = document.forms["vform"]["cpwd"];
 var g_nder = document.forms["vform"]["gender"];
 var email = document.forms["vform"]["mail"];
 var contact = document.forms["vform"]["contact"];
 var cty = document.forms["vform"]["city"];
 
 function Validate(){
if(fullname.value==""){
			alert("Fullname required.....");
			return false;
}

if(username.value==""){
			alert("Username required.....");
			return false;
}
if(pass.value==""){
			alert("Password required.....");
			return false;
}
if(c_pass.value==""){
			alert("Confirm password required.....");
			return false;
}
if(c_pass.value!=pass.value){
			alert("Password match required.....");
			return false;
}

if(g_nder.value==""){
			alert("Gender required.....");
			return false;
}
if(email.value==""){
			alert("Email required.....");
			return false;
}
if(contact.value==""){
			alert("Contact required.....");
			return false;
}

if(city.value==""){
			alert("City required.....");
			return false;
}			
}
</script>
