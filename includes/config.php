<?php 
//$conn=mysqli_connect("localhost","root","","bookstore")or die("Can't Connect...");
$con = oci_connect('bookstore','book', 'localhost:1521/XE');

	if(!$con)
	{
		die('Error connecting database server......');
	}	
?>