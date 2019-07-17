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
<center><h2 align = center>Manage Booking</h2></center>
<form method = post enctype='multipart/form-data'>
<table align = center>
<tr>
<td>
Booking ID</td><td><input type = text name = id></td>
<tr>

<td>User ID</td> <td><input type = text name = user_id></td>
</tr>
<tr>


<tr>
<td>Train ID</td><td><input type = text name = train_id></td>
</tr>

<tr>
<td>Train Name</td><td><input type = text name = train_name></td>
</tr>

<tr>
<td>From Stop</td><td><input type = text name = from_stop></td>
</tr>


<tr>
<td>To Stop</td><td><input type = text name = to_stop></td>
</tr>

<tr>
<td>Journey Date</td><td><input type = date name = journey_date></td>
</tr>


<tr>
<td>Booking Date</td><td><input type = date name = booking_date></td>
</tr>

<tr>
<td>Seat No. Booked</td><td><input type = text name = seat_no_booked></td>
</tr>

<tr>
<td>Department Time</td><td><input type = time name = dept_time></td>
</tr>

<tr>
<td>Distance</td><td><input type = text name = distance></td>
</tr>

<tr>
<td>Fare</td><td><input type = text name = fare></td>
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
$user_id = $_POST['user_id'];

$train_id = $_POST['train_id'];
$train_name = $_POST['train_name'];
$from_stop = $_POST['from_stop'];
$to_stop = $_POST['to_stop'];
$journey_date = $_POST['journey_date'];
$booking_date = $_POST['booking_date'];
$seat_no_booked = $_POST['seat_no_booked'];
$dept_time = $_POST['dept_time'];
$distance = $_POST['distance'];
$fare = $_POST['fare'];


$query = "insert into user_history values('','$user_id','$train_name','$from_stop','$to_stop','$journey_date','$booking_date','$seat_no_booked','$dept_time','$distance','$fare')";
$n = my_iud($query);
echo "$n record saved"; 
}

if(isset($_POST['modify']))
{
$id = $_POST['id'];
$user_id = $_POST['user_id'];

$train_id = $_POST['train_id'];
$train_name = $_POST['train_name'];
$from_stop = $_POST['from_stop'];
$to_stop = $_POST['to_stop'];
$journey_date = $_POST['journey_date'];
$booking_date = $_POST['booking_date'];
$seat_no_booked = $_POST['seat_no_booked'];
$dept_time = $_POST['dept_time'];
$distance = $_POST['distance'];
$fare = $_POST['fare'];

$query = "update user_history set user_id='$user_id',train_id='$train_id',train_name='$train_name',from_stop='$from_stop',to_stop='$to_stop',journey_date='$journey_date',booking_date='$booking_date',seat_no_booked='$seat_no_booked',dept_time='$dept_time',distance='$distance',fare='$fare' where id='$id'";
$n = my_iud($query);
echo "$n record modified"; 
}

if(isset($_POST['remove']))
{
$id = $_POST['id'];

$query = "delete from user_history where id=$id";
$n = my_iud($query);
echo "$n record removed"; 
}

if(isset($_POST['search']))
{


$query = "select * from user_history";
$rs = my_select($query);
$n = mysql_num_rows($rs);
echo "<table align = center border = 1 width=100%>";
echo "<tr>";
echo "<th>Booking ID</th>";
echo "<th>User ID</th>";
echo "<th>train ID</th>";
echo "<th>train Name</th>";
echo "<th>From Stop</th>";
echo "<th>To Stop</th>";
echo "<th>Journey Date</th>";
echo "<th>Booking Date</th>";
echo "<th>Seat No. Booked</th>";
echo "<th>Department Time</th>";
echo "<th>Distance</th>";
echo "<th>Fare</th>";
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
echo "<td>$column[10]</td>";
echo "<td>$column[11]</td>";
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