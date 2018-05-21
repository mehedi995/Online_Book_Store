<?php session_start();
require('includes/config.php');
if (!isset($_SESSION['unm']))
					{
						header("location:index.php");
						
					}
?>

<!DOCTYPE html >

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
                       <div id="demo">
					   	<font style="font-size:30px;margin-left:260px">Payment options</font>
						<center>

                    <button type="button"  onclick="loadDoc()">Cash on del</button></center>
</div>

		
                        </body>
</html>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "a.txt", true);
  xhttp.send();
}
</script>