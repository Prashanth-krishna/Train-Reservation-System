<?php
session_start();
if(isset($_SESSION['id']))
{
	require("config.php");
$uid = $_SESSION['id'];

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Online train-Ticket Reservation ::</title>
<link rel="stylesheet" href="style/table.css" />
<style>
a{cursor:default;}
</style>


</head>

<body topmargin="0" bottommargin="0" bgcolor="#CCCC99">
<table bgcolor="#FFCCFF" style="margin-top:0" align="center" width="800px" border="1" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center" width="800px" height="140px"><img align="middle" width="800px" height="140px" src="images/Banner.jpg" />
</td></tr><tr><td colspan="2" bgcolor="#330000" align="center" height="5px">
<h2 style="text-align:center; color:#FFFFFF; font-family:Verdana, Geneva, sans-serif; margin-top:3px">

Welcome To Online train-Ticket Reservation</h2></td></tr>

<tr><td colspan="2" bgcolor="#CC6600" align="center" style="color:#FFFFCC; font-size:14px">
|| <b><?php echo date("D d-M-Y");?></b> ||</td></tr>
</table>

<br />
<br />

<?php
$query = mysql_query("select * from user_history where user_id = '$uid'");
if(mysql_num_rows($query)>0)
{
	
?>
<table border="1" bordercolor="#000000" width="805" height="62" align="center" cellpadding="1" class="table">

<tr align="center"><td width="115">train Name</td><td width="122">From</td><td width="117">To</td><td width="117">Journey Date</td><td width="117">Booking Date</td><td width="117">Seat No.</td><td width="117">Dept Time</td><td width="110">Distance</td><td width="110">Fare</td><td width="101">Operations</td></tr>
<tr>&nbsp;</tr>
<?php
while($r = mysql_fetch_array($query))
{
	$id = $r['id'];
	$train_id = $r['train_id'];
	$train_name = $r['train_name'];
	$from_stop = $r['from_stop'];
	$to_stop = $r['to_stop'];
	$journey_date = $r['journey_date'];
	$booking_date= $r['booking_date'];
	$seat_no_booked = $r['seat_no_booked'];
	$dept_time = $r['dept_time'];
	$distance = $r['distance'];
	$fare = $r['fare'];
	?>
    <tr align="center">
    <td width="115"><?php echo $train_name; ?></td>
    <td><?php echo $from_stop; ?></td>
    <td><?php echo $to_stop; ?></td>
    <td><?php echo $journey_date; ?></td>
    <td><?php echo $booking_date; ?></td>
    <td><?php echo $seat_no_booked; ?></td>
    <td><?php echo $dept_time; ?></td>
    <td><?php echo $distance; ?></td>
    <td><?php echo $fare; ?></td>
    <td>
    <form name="f">
    <input type="button" name="cancel" value="Cancel" onclick="clk()" />
    </form>
    </td></tr>
    <?php
}?>
</table>
<?php
}else
{
	?>
    <script>
	alert("You dont have any booking history");
	window.location = "Home.php?id=<?php echo $uid; ?>";
	</script>
<!--    <h2 style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif">You Dont Have any Booking History</h2>
-->    <?php
}
?>
<a href="Home.php?id=<?php echo $uid;?>">Back to Home</a>
<script>
function clk()
{
	var cancel = confirm("Are You Sure You Want to Cancel the Ticket");
	if(cancel == true)
	{
		window.location = "cancel.php?id=<?php echo $uid; ?>&seat_id=<?php echo $seat_no_booked; ?>&train_id=<?php echo $train_id; ?>&did=<?php echo $id;?>";
	}
	
}

</script>
<?php
}
else
{
	header("Location:Home.php?id=$uid");
}
?>
</body>
</html>

