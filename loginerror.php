<html>
<head>
<?php
include "header.php";
?>
</head>
<body>
<?php    include "top.php" ?>
<br/>
<br/>
<br/>
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


<html>
<head>

</head>
<body>

			
				<h2 >Login Failed</h2>
				
				
							
			</body>
</html>

</div>
<?php  include "bottom.php "?>
</body>
</html>