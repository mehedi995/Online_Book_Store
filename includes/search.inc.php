
<ul>
			<li id="login">
				
						<?php
						require('includes/config.php');
							if(isset($_SESSION['status']))
							{
								echo '<h2>Hello :  '.$_SESSION['unm'].'</h2>';
							}
							else
							{
								echo '<form action="process_login.php" method="POST" onsubmit="return Validate()" name="vform">
										<h2>LogIn</h2>
											<b>Username:</b>
											<br><input type="text" name="usernm"><br>
											<br>
											
											
											<b>Password:</b>
											<br><input type="password" name="pwd">
											<input type="submit" id="x" value="Login" />
										</form>';
										
							}
						?>
			</li>

			<li id="search">
					
				<h2>Search</h2>
				<form method="GET" action="search_result.php">
					<fieldset>
					<input type="text" id="s" name="s" value="" placeholder="Search Book....." />
					<br>

					<b>Types By:</b>
					<select name="types">

						<option>BOOK_NAME</option>
						<option>ISBN </option>
						<option>CAT_NAME </option>
						<option>SUBCAT_NAME</option>
						<option>AUTHOR_NAME</option>
						<option>PUBLISHER_NAME</option>

					</select>

					<input type="submit" id="x" value="Search" />
					</fieldset>
				</form>
			</li>
			<li>
				<h2>Categories</h2>
				<ul>
					
					
					<!--
					<li><a href="#">Economics</a></li>
					<li><a href="#">Fiction</a></li>
					<li><a href="#">Forestry & WildLife</a></li>
					<li><a href="#">Health & Physics</a></li>
					<li><a href="#">Historical</a></li>
					<li><a href="#">Social</a></li>
					<li><a href="#">Sports & Physical Education</a></li>
					<li><a href="#">Terrorism</a></li>
					<li><a href="#">Tourism</a></li>
					<li><a href="#">Tracking </a></li>
					<li><a href="#">Yoga</a></li>
					-->
								<?php
										
			
										$query="select * from categorys ";
			
											$stmt = oci_parse($con,$query);
			
												// Execute the query
											oci_execute($stmt) or die ("Can't Execute Query...") ;

											
										while($row=oci_fetch_assoc($stmt))
											{
												echo '<li><a href="subcat.php?cat='.$row['CATEGORY_ID'].'&catnm='.$row["CATEGORY_NAME"].'">'.$row["CATEGORY_NAME"].'</a></li>';
												//pass catid not catnm
											}
			
											oci_close($con);
								?>
				</ul>
			</li>
			
		</ul>
		
<script type="text/javascript">
 
 var username = document.forms["vform"]["usernm"];
 var pass = document.forms["vform"]["pwd"];
 
 
 function Validate(){

if(username.value==""){
			alert("Username required.....");
			return false;
}
if(pass.value==""){
			alert("Password required.....");
			return false;
}

}

</script>
		