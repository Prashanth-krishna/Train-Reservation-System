<html>
<head>
<?php include "header.php" ?>
</head>


<body>
<?php include "top.php";  ?>
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
<a href = admin_home.php><img src = goback.png></a>
<div>
<br/>
<br/>
<center><h2 align = center>Manage Users</h2></center>
<form method = post enctype='multipart/form-data'>
<table align = center>
<tr>
<td>
User ID</td><td><input type = text name = id></td>
<tr>

<td>User Name</td> <td><input type = text name = name></td>
</tr>
<tr>


<tr>
<td>Gender</td><td><input type = text name = gender></td>
</tr>

<tr>
<td>Date of Birth</td><td><input type = date name = dob></td>
</tr>

<tr>
<td>Mobile</td><td><input type = text name = mobile></td>
</tr>


<tr>
<td>Address</td><td><input type = text name = address></td>
</tr>

<tr>
<td>Pin Code</td><td><input type = text name = pin_code></td>
</tr>


<tr>
<td>Email</td><td><input type = email name = email></td>
</tr>

<tr>
<td>Password</td><td><input type = text name = password></td>
</tr>

<tr>
<td>Registration Date</td><td><input type = date name = reg_date></td>
</tr>

<tr>
<td colspan = 2>
<input type = submit name = save value = Save>
<input type = submit name = modify value = Modify>
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
$id = $_POST['id'];
$name = $_POST['name'];

$gender = $_POST['gender'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$pin_code = $_POST['pin_code'];
$email = $_POST['email'];
$password = $_POST['password'];
$reg_date = $_POST['reg_date'];


$query = "insert into register values('','$name','$gender','$dob','$mobile','$address','$pin_code','$email','$password','$reg_date')";
$n = my_iud($query);
echo "$n record saved"; 
}

if(isset($_POST['modify']))
{
$id = $_POST['id'];
$name = $_POST['name'];

$gender = $_POST['gender'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$pin_code = $_POST['pin_code'];
$email = $_POST['email'];
$password = $_POST['password'];
$reg_date = $_POST['reg_date'];

$query = "update register set user_id='$user_id',bus_id='$bus_id',bus_name='$bus_name',from_stop='$from_stop',to_stop='$to_stop',journey_date='$journey_date',booking_date='$booking_date',seat_no_booked='$seat_no_booked',dept_time='$dept_time',distance='$distance',fare='$fare' where id='$id'";
$n = my_iud($query);
echo "$n record modified"; 
}

if(isset($_POST['remove']))
{
$id = $_POST['id'];

$query = "delete from register where id=$id";
$n = my_iud($query);
echo "$n record removed"; 
}

if(isset($_POST['search']))
{


$query = "select * from register";
$rs = my_select($query);
$n = mysql_num_rows($rs);
echo "<table align = center border = 1 width=100%>";
echo "<tr>";
echo "<th>User ID</th>";
echo "<th>User Name</th>";
echo "<th>Gender</th>";
echo "<th>Date of Birth</th>";
echo "<th>Mobile</th>";
echo "<th>Address</th>";
echo "<th>Pin Code</th>";
echo "<th>Email ID</th>";
echo "<th>Password</th>";
echo "<th>Registration Date</th>";
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
echo "<td>$column[6]</td>";
echo "<td>$column[7]</td>";

echo "<td>$column[8]</td>";

echo "<td>$column[9]</td>";
echo "</tr>";
}
echo "</table>";
}
?>


</div>
<!-- Bottom section -->
<?php include "bottom.php" ?>
</body>
</html>