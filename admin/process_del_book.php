<?php
session_start();
if (!isset($_SESSION['unm']))
					{
						header("location:index.php");
						
					}
require('includes/config.php');

			$query="delete from books where book_id =".$_GET['sid'];
		
			$stmt = oci_parse($con,$query);
			
			// Execute the query
			oci_execute($stmt) or die ("Can't Execute Query...") ;

			
			
			header("location:all_book.php");

?>