<?php
session_start();
if(isset($_SESSION['id']))
{
require("config.php");
$uid = $_SESSION['id'];
$train = $_GET['train'];
$seat = $_GET['seat'];
$choice = $_GET['c'];
$traint = $train.'train';
$date = date("Y-m-d"); 
 $query = mysql_query("select * from train where id ='$train'");
	$re1 = mysql_fetch_array($query);
		$train_name = $re1['train_name'];
		$from = $re1['from_stop'];
		$to = $re1['to_stop'];
		$dept_time = $re1['dept_time'];
		$arrival_time = $re1['arrival_time'];
		$distance = $re1['distance'];
		$fare = $re1['fare'];
	if($choice !='')
	{
		if($choice=='W' && $seat==1)
		{
		 $query2 = "select * from $traint where status='Available' AND state='$choice' limit 0,$seat";
	$p = mysql_query($query2);
	$re = mysql_num_rows($p);
		}
		else
		{
			 $query2 = "select * from $traint where status='Available' limit 0,$seat";
	$p = mysql_query($query2);
	$re = mysql_num_rows($p);
		}
	if($re>=$seat)
	{
		while($r = mysql_fetch_array($p))
		{
			$id = $r['id'];
		 $q3 = mysql_query("update $traint set status ='Booked' where id='$id'");
		 $q4 = mysql_query("insert into user_history(user_id, train_id,train_name, from_stop , to_stop, booking_date, seat_no_booked, dept_time, distance, fare) values('".$uid."','".$train."','".$train_name."', '".$from."', '".$to."', '".$date."', '".$id."', '".$dept_time."', '".$distance."', '".$fare."')");

	}
	?>
        <script>
		alert("Thank you!Your booking request has been processed and equal amount is deducted from your account")
		window.location = "Home.php?id=<?php echo $uid; ?>";
        </script>
        <?php
		}
	else
	{
		?>
        <script>
		alert("Your required seats are more then available seats");
		</script>
        <?php
	}
	}
}
?>