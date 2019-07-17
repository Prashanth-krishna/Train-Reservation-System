<html>
<head>
<?php
include "header.php";
?>
</head>
<body>
<?php    include "top.php"; ?>
<?php
session_start();
$u = $_SESSION['sun'];
?>
<div>
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
<br/>
<h2 align = center>FeedBack</h2>

<br/>
<br/>
<form method = post>
<table align = center>



<tr>
<td>
Enter Name</td><td><input type = text name = name value = "<?php echo $u; ?>" readonly></td>
</tr>
<tr>
<td>Enter Mobile No.</td> <td><input type = text name = mobileno></td>
</tr>
<tr>
<td>
Email ID</td><td><input type = text name = email></td>
</tr>
<tr>
<td>Date</td><td><input type = text name = date></td>
</tr>
<tr>
<td>Your Message</td><td><textarea name = ymsg></textarea></td>
</tr>
<tr>
<td align = center>
<input type = submit name = save value = Submit>

</td>
</tr>
</table>
</form>
<?php
include "dbconfigure.php";
if(isset($_POST['save']))
{
$name = $_POST['name'];
$mobileno = $_POST['mobileno'];
$email = $_POST['email'];
$date = $_POST['date'];
$ymsg = $_POST['ymsg'];
$query = "insert into feedback values('','$name','$mobileno','$email','$date','$ymsg')";
$n = my_iud($query);
echo "$n record saved<br/>Your FeedBack Is Sent Successfully"; 
}


?>


</div>
<?php  include "bottom.php"; ?>
</body>
</html>