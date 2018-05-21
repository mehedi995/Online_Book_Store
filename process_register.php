<?php
	require('includes/config.php');
	

/*

function userid_validation(uid,mx,my)  
{  
var uid_len = uid.value.length;  
if (uid_len == 0 || uid_len >= my || uid_len < mx)  
{  
alert("User Id should not be empty / length be between "+mx+" to "+my);  
uid.focus();  
return false;  
}  
return true;  
}  
function passid_validation(passid,mx,my)  
{  
var passid_len = passid.value.length;  
if (passid_len == 0 ||passid_len >= my || passid_len < mx)  
{  
alert("Password should not be empty / length be between "+mx+" to "+my);  
passid.focus();  
return false;  
}
return true;  
}  
function allLetter(uname)  
{   
var letters = /^[A-Za-z]+$/;  
if(uname.value.match(letters))  
{  
return true;  
}  
else  
{  
alert('Username must have alphabet characters only');  
uname.focus();  
return false;  
}  
}  
function alphanumeric(uadd)  
{   
var letters = /^[0-9a-zA-Z]+$/;  
if(uadd.value.match(letters))  
{  
return true;  
}  
else  
{  
alert('User address must have alphanumeric characters only');  
uadd.focus();  
return false;  
}  
}  
function countryselect(ucountry)  
{  
if(ucountry.value == "Default")  
{  
alert('Select your country from the list');  
ucountry.focus();  
return false;  
}  
else  
{  
return true;  
}  
}  
function allnumeric(uzip)  
{   
var numbers = /^[0-9]+$/;  
if(uzip.value.match(numbers))  
{  
return true;  
}  
else  
{  
alert('ZIP code must have numeric characters only');  
uzip.focus();  
return false;  
}  
}  
function ValidateEmail(uemail)  
{  
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(uemail.value.match(mailformat))  
{  
return true;  
}  
else  
{  
alert("You have entered an invalid email address!");  
uemail.focus();  
return false;  
}  
} function validsex(umsex,ufsex)  
{  
x=0;  
  
if(umsex.checked)   
{  
x++;  
} if(ufsex.checked)  
{  
x++;   
}  
if(x==0)  
{  
alert('Select Male/Female');  
umsex.focus();  
return false;  
}  
else  
{  
alert('Form Succesfully Submitted');      
}
</script> */ 
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['unm']) || empty($_POST['district']) || empty($_POST['pwd']) || empty($_POST['cpwd']) || empty($_POST['mail'])||empty($_POST['city'])  || empty($_POST['address']) || empty($_POST['phone'])  )
		{
			$msg.="<li>Please full fill all requirement.";
		}
		
		if($_POST['pwd']!=$_POST['cpwd'])
		{
			$msg.="<li>Please Enter your Password Again.....";
		}
		
		/*if(!preg_match("^[a-z0-9_]+[a-z0-9_.]*@[a-z0-9_-]+[a-z0-9_.-]*\.[a-z]{2,5}$",$_POST['mail']))
		{
			$msg.="<li>Please Enter Your Valid Email Address...";
		}*/
		
		
		
		if(strlen($_POST['pwd'])>10)
		{
			$msg.="<li>Please Enter Your Password in limited Format....";
		}
		
		if($msg!="")
		{
			header("location:register.php?error=".$msg);
		}
		if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
		{
			$unm=$_POST['unm'];
			$email=$_POST['mail'];
			$phone=$_POST['phone'];
			$pwd=$_POST['pwd'];
			$address=$_POST['address'];
			$district=$_POST['district'];
			$city=$_POST['city'];
			
			$query="insert into users(user_id, user_name, user_email, user_phone, password, user_address, user_district,user_city, created_date)
			values(seq_user_id.nextval,'$unm','$email', '$phone','$pwd','$address','$district','$city', sysdate)";
			
			//mysqli_query($conn,$query) or die("Can't Execute Query...");

			// Create a statement. A statement executes the query in the database.
			// A statement also serves as a container for the query result


			// $query="begin
   //           users_pack.insert_users('$unm','$email','$phone','$pwd','$address','$district','$city',sysdate);
			// end;
			// /
			// ";
			$stmt = oci_parse($con,$query);
			
			// Execute the query
			 oci_execute($stmt); 
            

			header("location:register.php?ok=1");
		}
		else
			$msg.="<li>Please Enter Your Valid Email Address...";
		
	}
	else
	{
		header("location:index.php");
	}
?>