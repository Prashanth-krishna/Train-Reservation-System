<html>
<head>
<?php
include "header.php";
?>
</head>
<body>
<?php    include "top.php" ?>
<div>
<html>
<head>
<script type="text/javascript" src="calendarDateInput.js">


</script>

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
			
				<h2>Signup page</h2>
				
	
<form method="post">
<table border="0" width="400" height = 500 align = center style = "position : absolute ; top : 250px ; left : 600px">
<tr>
<td>
Enter your Name</td>
<td><input type="text" name="username" >
</td>
</tr>
<tr><td>
Enter your password</td>
<td><input type="password" name="pwd" >
</td>
</tr>
<tr>
<td>
Enter your Date of birthday</td>
<td>
<script>DateInput('dob', true, 'YYYY-MM-DD')</script>
</td>
</tr>
<tr>
<td>
Enter your gender</td>
<td><input type="radio" name="gender"  value='male' checked>Male
&nbsp;&nbsp;&nbsp;
<input type="radio" name="gender"  value='female'>Female
</td>
</tr>
<tr>
<td >
Enter hint Question</td>
<td>
<textarea name="hintq" ></textarea>
</td></tr>
<tr>
<td valign='top'>
Enter hint answer</td>
<td><textarea name="hinta" ></textarea>
</td>
</tr>
<tr>
<td>
Enter your emailid</td>
<td><input type="text" name="emailid" >
</td>
</tr>
<tr>
<td>
Enter your SMS no.</td>
<td>
<input type="text" name="smsno" ></td>
</tr>

<tr>
<td colspan='2' align='center'>
<input type="submit" name="save"  value="save"/>
</td>
</tr>
</table>
</form>
<?php

include "dbconfigure.php" ;
if(isset($_POST["save"]))
{
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$hintq=$_POST['hintq'];
$hinta=$_POST['hinta'];
$emailid=$_POST['emailid'];
$smsno=$_POST['smsno'];
$role="customer";
$query="insert into siteuser values('$username','$pwd','$dob','$gender','$hintq','$hinta','$emailid','$smsno','$role')";
$n = my_iud($query);
echo "<br/>$n record saved" ;
}

?>


	
			</body>
</html>


</div>
<?php  include "bottom.php "?>
</body>
</html>