<?php session_start();?>

<!DOCTYPE html>

<html>
<head>

		<?php
			include("includes/head.inc.php");
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        
		
</head>

<body style=" background: url(bgground1.jpg);">
   <audio src="beep9.m4a" autoplay>

<embed src="beep9.m4a" width="180" height="90" hidden="true" />
</audio>
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
							<h1 class="title">Welcome to 
							<?php 
								if(isset($_SESSION['status']))
								{
									echo $_SESSION['unm']; 
								}
								else
								{	
									echo 'Book Store';
								}
							?>
							</h1>
							<div class="entry">
								<br>
								
								<br>		
								 <img class="mySlides w3-animate-fading" src="t1.gif" style="width:100%">
								 
								  <img class="mySlides w3-animate-fading" src="images (24).jpeg" style="width:100%">
								  <img class="mySlides w3-animate-fading" src="images (26).jpeg" style="width:100%">
								 <br>
								 <br>
								 

						<video width="500" height="600" controls>
						
						<source src="Bookstore 30 Sec Ad.mp4" type="video/mp4" >
  
</video>
  
								
								<br><br>
								
							</div>
							
						</div>
						
					</div>
					
					<div id="sidebar">
							<?php
								include("includes/search.inc.php");
							?>
					</div>
					
					<div style="clear: both;">&nbsp;</div>
				</div>
			
				<div id="footer">
							<?php
								include("includes/footer.inc.php");
							?>
				</div>
				
				<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 4000);    
}
</script>
			
</body>
</html>
