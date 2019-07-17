<?php ob_start();?>
<html>
<head>
<?php
include "header.php";
?>
</head>
<body>
<?php include "top.php"; ?>
<div>
<?php
/*
on anonymous page, any one can visit
strangers(anonymous) are also allowed
*/
@session_start();
include "dbconfigure.php";
$msg="";
if(verifyuser())
{
$un=fetchusername();
$msg="Welcome $un , <br /><a href='signout.php'>Signout</a>";
}
else
{
$msg="Welcome Guest ,";
$msg.="<br/>Existing user <a href='signin.php'>Signin</a>";
$msg.="<br/>New user <a href='signup.php'>Signup</a>";
}
?>


<html >
<head>

</head>
<body>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
	<br/>	
			
				<h2 >SignIn Page</h2>		
					
<form method="post">
<table  width="360" border="0" align = center style = "position : absolute ; top : 250px ; left : 600px">
<tr>
<td>Enter username</td>
<td>
<input type="text" name="username">
</td>
</tr>
<tr>
<td>
Enter your password
</td>
<td>
<input type="password" name="pwd" >
</td>
</tr>

<tr>
<td>Remember Me</td>
<td><input type="checkbox" name="rem"  value='yes'>
</td>
</tr>
<tr>
<td colspan='2' align='center'>
<input type="submit" name="login"  value="login">
</td>
</tr>
</table>
</form>
<?php
if(isset($_REQUEST['login']))
{
$username=$_REQUEST['username'];
$pwd=$_REQUEST['pwd'];
//syntax to fetch value of checkbox
if(isset($_REQUEST['rem']))
$remember='yes';
else
$remember='no';
//echo "<br/>$username,$pwd,$remember";

//1. check if user is valid or not
$query="select count(*) from siteuser where username='$username' and pwd='$pwd'";
include_once "dbconfigure.php";
$ans=my_one($query);
if($ans==1)
{
//2. save username and pwd to session variables
$_SESSION['sun']=$username;
$_SESSION['spwd']=$pwd;

//3. if remember is yes, save them to cookies too
if($remember=='yes')
{
setcookie('cun',$username,time()+60*60*24*7);
setcookie('cpwd',$pwd,time()+60*60*24*7);
}

//4. fetch role of user
$query="select role from siteuser where username='$username' and pwd='$pwd'";
$ans=my_one($query);
//echo "<br/>You are a valid user and your role is $ans";
$targetpage=$ans."_home.php";
header("Location:$targetpage");

}
else
{
header("Location:loginerror.php");
}


}
?>
		
			</body>
</html>

</div>
<?php  include "bottom.php "?>
</body>
</html>