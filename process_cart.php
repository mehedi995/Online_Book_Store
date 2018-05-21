<?php session_start();

	if(isset($_GET['nm']) and isset($_GET['cat']) and isset($_GET['rate']))
	{
		//add item
		$_SESSION['cart'][] = array("bookid"=>$_GET['bookid'],"nm"=>$_GET['nm'],"cat"=>$_GET['cat'],"rate"=>$_GET['rate'],"qty"=>"1");
		header("location: viewcart.php?bookname=".$_GET['nm']);
	}

	else if(isset($_GET['id']))
	{
		//del a item
		$id = $_GET['id'];
		unset($_SESSION['cart'][$id]);
		header("location: viewcart.php?bookno=".$_GET['id']);
	}
	
	else if(!empty($_POST))
	{  
		//update qty
		foreach($_POST as $id=>$val)
		{
			$_SESSION['cart'][$id]['qty']=$val;
			header("location: viewcart.php?bookname=".$_GET['nm']);
		}
	}


?>