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
<center><h2 align = center>Manage Trains</h2></center>
<form method = post enctype='multipart/form-data'>
<table align = center>
<tr>
<td>
train ID</td><td><input type = text name = id></td>
<tr>

<td>Train Name</td> <td><input type = text name = train_name></td>
</tr>
<tr>


<tr>
<td>From Stop</td><td><input type = text name = from_stop></td>
</tr>

<tr>
<td>To Stop</td><td><input type = text name = to_stop></td>
</tr>

<tr>
<td>Departure Time</td><td><input type = time name = dept_time></td>
</tr>


<tr>
<td>Arrival Time</td><td><input type = time name = arrival_time></td>
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
$train_name = $_POST['train_name'];

$from_stop = $_POST['from_stop'];
$to_stop = $_POST['to_stop'];
$dept_time = $_POST['dept_time'];
$arrival_time = $_POST['arrival_time'];
$distance = $_POST['distance'];
$fare = $_POST['fare'];


$query = "insert into train values('','$train_name','$from_stop','$to_stop','$dept_time','$arrival_time','$distance','$fare')";
$n = my_iud($query);
echo "$n record saved"; 
}

if(isset($_POST['modify']))
{
$id = $_POST['id'];
$train_name = $_POST['train_name'];

$from_stop = $_POST['from_stop'];
$to_stop = $_POST['to_stop'];
$dept_time = $_POST['dept_time'];
$arrival_time = $_POST['arrival_time'];
$distance = $_POST['distance'];
$fare = $_POST['fare'];
$query = "update train set train_name='$train_name',from_stop='$from_stop',to_stop='$to_stop',dept_time='$dept_time',arrival_time='$arrival_time',distance='$distance',fare='$fare' where id='$id'";
$n = my_iud($query);
echo "$n record modified"; 
}

if(isset($_POST['remove']))
{
$id = $_POST['id'];

$query = "delete from train where id=$id";
$n = my_iud($query);
echo "$n record removed"; 
}

if(isset($_POST['search']))
{


$query = "select * from train";
$rs = my_select($query);
$n = mysql_num_rows($rs);
echo "<table align = center border = 1 width=100%>";
echo "<tr>";
echo "<th>train ID</th>";
echo "<th>train Name</th>";
echo "<th>From Stop</th>";
echo "<th>To Stop</th>";
echo "<th>Departure Time</th>";
echo "<th>Arrival Time</th>";
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