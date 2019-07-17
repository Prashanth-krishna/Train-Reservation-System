<html>
<head>
<?php
include "header.php";
?>
</head>
<body>
<?php    include "top.php"; ?>
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
<br/>
<br/>
<br/>
<br/>
<center><h2 align = center>Manage FeedBack</h2></center>


<form method = post>
<table align = center>

<tr>
<td>
Enter FeedBack ID</td><td><input type = text name = feedbackid></td>
</tr>

<tr>
<td>
Enter Name</td><td><input type = text name = name></td>
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
<td colspan = 2 ALIGN = CENTER>
<input type = submit name = remove value = Remove>
<input type = submit name = search value = Search>
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
echo "$n record saved"; 
}

if(isset($_POST['modify']))
{
$feedbackid = $_POST['feedbackid'];
$name = $_POST['name'];
$mobileno = $_POST['mobileno'];
$email = $_POST['email'];
$date = $_POST['date'];
$ymsg = $_POST['ymsg'];

$query = "update feedback set name='$name',mobileno='$mobileno',email='$email',date='$date',ymsg='$ymsg' where feedbackid=$feedbackid";
$n = my_iud($query);
echo "$n record modified"; 
}

if(isset($_POST['remove']))
{
$feedbackid = $_POST['feedbackid'];
$name = $_POST['name'];
$mobileno = $_POST['mobileno'];
$email = $_POST['email'];
$date = $_POST['date'];
$ymsg = $_POST['ymsg'];

$query = "delete from feedback where feedbackid=$feedbackid";
$n = my_iud($query);
echo "$n record removed"; 
}

if(isset($_POST['search']))
{
$query = "select * from feedback";
$rs = my_select($query);
$n = mysql_num_rows($rs);
echo "<table align = center border = 1>";
echo "<tr>";
echo "<td>FeedBack ID</td>";
echo "<td>Name</td>";
echo "<td>Mobile No.</td>";
echo "<td>Email</td>";
echo "<td>Date</td>";
echo "<td>Message</td>";
echo "</tr>";
while($column=mysql_fetch_array($rs))
{

echo "<tr>";
echo "<td>$column[0]</td>";
echo "<td>$column[1]</td>";
echo "<td>$column[2]</td>";
echo "<td>$column[3]</td>";
echo "<td>$column[4]</td>";
echo "<td>$column[5]</td>";

echo "</tr>";
}
echo "</table>";
}
?>


</div>
<?php  include "bottom.php"; ?>
</body>
</html>