<html>
<head>
<?php
include "header.php";
?>
</head>
<body background = "mpimages/bns.jpg">
<?php    include "top.php" ?>
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
<a href = admin_home.php><img src = goback.png></a>
<div>

<html >
<head>
<script type="text/javascript" src="calendarDateInput.js">

/***********************************************
* Jason's Date Input Calendar- By Jason Moon http://calendar.moonscript.com/dateinput.cfm
* Script featured on and available at http://www.dynamicdrive.com
* Keep this notice intact for use.
***********************************************/
</script>
</head>
<body>
<br/>
<br/>
			
				<center><h2 align = center>MANAGE PROFILE</h2></center>
				
				
					<p>

<form method="post">
<table width="360" border="0" align = center>
<tr>
<td>
Enter your Name</td>
<td><input type="text" name="username" ></td>
</tr>
<tr>
<td>
Enter your password</td>
<td>
<input type="password" name="pwd" ></td>
</tr>
<tr>
<td>Enter your Date of birthday</td>
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
<td>Enter hint question</td>
<td>
<input type="text" name="hintq" ></td>
</tr>
<tr>
<td>
Enter hint answer</td>
<td><input type="text" name="hinta" ></td>
</tr>
<tr>
<td>
Enter your emailid</td>
<td><input type="text" name="emailid" ></td>
</tr>
<tr>
<td>
Enter your SMS no.</td>
<td><input type="text" name="smsno" ></td>
</tr>
<td>
Enter your Role</td>
<td>
<input type="text" name="role" >
</td></tr>
<tr>
<td>
<input type="submit" name="search" value="View Profile"/></td>


<td><input type="submit" name="modify"  value="Update Profile"/></td>

</tr>
</table>
</form>
<?php
include "dbconfigure.php";
if(isset($_POST['save']))
{
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$hintq = $_POST['hintq'];
$hinta = $_POST['hinta'];
$emailid = $_POST['emailid'];
$smsno = $_POST['smsno'];
$role =  $_POST['role'];

$query = "insert into siteuser values('$username','$pwd','$dob','$gender','$hintq','$hinta','$emailid','$smsno','$role')";
$n = my_iud($query);
echo "$n record saved"; 
}

if(isset($_POST['modify']))
{
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$hintq = $_POST['hintq'];
$hinta = $_POST['hinta'];
$emailid = $_POST['emailid'];
$smsno = $_POST['smsno'];
$role =  $_POST['role'];

$query = "update siteuser set pwd='$pwd',dob='$dob',gender='$gender',hintq='$hintq',hinta='$hinta',emailadd='$emailid',smsno='$smsno',role='$role' where username='$username' ";
$n = my_iud($query);
echo "$n record modified"; 
}

if(isset($_POST['remove']))
{
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$hintq = $_POST['hintq'];
$hinta = $_POST['hinta'];
$emailid = $_POST['emailid'];
$smsno = $_POST['smsno'];
$role =  $_POST['role'];

$query = "delete from siteuser where username='$username'";
$n = my_iud($query);
echo "$n record removed"; 
}

if(isset($_POST['search']))
{
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$hintq = $_POST['hintq'];
$hinta = $_POST['hinta'];
$emailid = $_POST['emailid'];
$smsno = $_POST['smsno'];
$role =  $_POST['role'];

$query = "select * from siteuser";
$rs = my_select($query);
$n = mysql_num_rows($rs);
echo "$n record found"; 
echo "<table align = center border = 1>";
echo "<tr>";
echo "<td>UserName.</td>";
echo "<td>Password</td>";
echo "<td>Date of Birth</td>";
echo "<td>Gender</td>";
echo "<td>HintQ</td>";
echo "<td>HintA</td>";
echo "<td>Email ID</td>";
echo "<td>Contact No.</td>";
echo "<td>Role</td>";
echo "</tr>"; 
while($row = mysql_fetch_array($rs))
{
echo "<tr>";
echo "<td>$row[0]</td>" ;
echo "<td>$row[1]</td>" ;
echo "<td>$row[2]</td>" ;
echo "<td>$row[3]</td>" ;
echo "<td>$row[4]</td>" ;
echo "<td>$row[5]</td>" ;
echo "<td>$row[6]</td>" ;
echo "<td>$row[7]</td>" ;
echo "<td>$row[8]</td>" ;
echo "</tr>";
}
echo "<table>";
}
?>

		
			</body>
</html>


</div>
<?php  include "bottom.php "?>
</body>
</html>