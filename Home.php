<html>
<head>
<?php include "header.php" ?>
</head>


<body>
<?php include "top.php"  ?>
<div style = "position : absolute ; top : 200px ; left : 300px">
















<?php
session_start();
if(isset($_SESSION['id']))
{
?>



<script type="text/javascript" src="C:\Users\NARPAT\Desktop\basiccalendar.js"></script>


<link rel="stylesheet" href="style/table.css" />
<link rel="stylesheet" href="style/style.css" />
<style>
a{cursor:default;}
</style>

</head>

<body topmargin="0" bottommargin="0">




<table bgcolor="#FFFFCC" style="margin-top:0" align="center" width="807" border="1" cellpadding="0" cellspacing="0">

<tr><td colspan="3" bgcolor="#330000" align="center" height="5px">
<h1 style="text-align:center; color:#FFFFFF; font-size:22px; font-family:Verdana, Geneva, sans-serif; margin-top:3px">

Welcome To Online Train-Ticket Reservation</h1></td></tr>

<tr><td colspan="3" bgcolor="#CC6600" align="center" style="color:#FFFFCC; font-size:14px">
|| <b><?php echo date("D d-M-Y");?></b> ||</td></tr>                             			
     
<!-- end header -->
<?php
require("config.php");
if(isset($_SESSION['id']))
{
$uid = $_SESSION['id'];	
$sql = mysql_query("select * from register where id = '$uid'");
if(mysql_num_rows($sql)>0)
{
	$r = mysql_fetch_array($sql);
	$name = $r['name'];		
}
 ?>
 
 
 
 </td></tr>   <tr><td width="200">
<!-- start leftmenu -->
<dl id="browse"> 
	<!-- <dt>
		<a href=""></a>
	</dt> -->
        &nbsp;<span class="simpletext1">Welcome :<b><?php echo $name;?></b></span>
        
        <hr />					
	
  <dd   style="text-align: left">  
		<img align="absmiddle" src="images/home.png" width="16" height="16" alt="" /><a href="Home.php?id=<?php echo $uid;?>">Home</a>
	</dd>
  <dd style="text-align: left">
		<img align="absmiddle" src="images/password.png" width="16" height="16" alt="" /><a href="password_update.php?id=<?php echo $uid;?>">Change Password</a>
	</dd>
  <dd style="text-align: left">
		<img align="absmiddle" src="images/profile.png" width="16" height="16" alt="" /><a href="profile.php?id=<?php echo $uid;?>">View Profile</a>
	</dd>
	
  <dd style="text-align: left">
		<img align="absmiddle" src="images/ticket.png" width="16" height="16" alt="" /><a href="myticket.php?id=<?php echo $uid;?>">My Tickets</a>
	</dd>
	
   <dd style="text-align: left">
		<img align="absmiddle" src="images/logout.png" width="16" height="16" alt="" /><a href="logout.php">Logout</a>
	</dd>
</dl>
<!-- end leftmenu --></td><td width="380">



</td>
<td width="217">

</tr></table>

<table cellpadding="0" cellspacing="0" border="0" class="maintable" align="center"
               width="805" valign="middle">
<form method="post">
	<tr class="tabtitle">
			<td colspan="4">
				<table cellspacing="0" cellpadding="0" width="800">
					<tr>  
						<td  class="titletext" style="background-color:#990000">
							<font size="3px" style="background-color:#C00; color:#FFF">Search For Train Services </font>
                                                                                            
                                                        
						</td>
						
                             
				  </tr>
				</table>
			</td>
		<tr>
			<td width="20%" class="simpletext">
				From Stop :
			</td>
			<td>
            <select class="html-text-box" style="background-color:; font-style:oblique; width:100px; font-family:Verdana; font-weight:bold" name="from">
            <option value="0" selected="selected">-Select-</option>
            <option value="BARMER">BARMER</option>
            <option value="Delhi">Delhi</option>
            <option value="Jaipur">Jaipur</option>
            <option value="JODHPUR">JODHPUR</option></select>
          </td>
                        <td width="23%"  class="simpletext" align="right">
				To Stop :
			</td>
			<td  align="left">
            <select class="html-text-box" style="font-style:oblique; width:100px; font-family:Verdana; font-weight:bold" name="to">
            <option value="0" selected="selected">-Select-</option>
            <option value="BARMER" >BARMER</option>
            <option value="Delhi">Delhi</option>
            <option value="Jaipur">Jaipur</option>
            <option value="JODHPUR">JODHPUR</option></select>
            </td>
		</tr>
                
                <tr>
			<td >
				Journey Date :
			</td>
			<td  >
				<input type="date" style="border:2; padding:2" name="journeyDate" maxlength="10" size="10" value="" id="journeyDate">
                            
			</td>
                                             
		
		</tr>
		 
		 
		<tr>
			<td colspan="4" height="45" align="center" valign="middle">
                           	<input type="submit" name="search" value="Search" onclick="return callfrm(document.getElementById('currentdate').value);" class="html-button">
			
			 	       <input type="submit" name="resert" value="Reset"  class="html-button">
				  
                        </td>
                </tr>
		<tr>
			<td colspan="4">
				<div class="errormessage" align="center">
					 
				</div>
			</td>
            </tr>  
    </form>
	</table>


<?php
if(isset($_POST['search']))
{
	require('config.php');
	 $from = $_POST['from'];
	 $to = $_POST['to'];
	 
	 $query = mysql_query("select * from train where from_stop ='$from' AND to_stop ='$to'");
	 $c = mysql_num_rows($query);
	if($c>0)
	{
?>
<table width="805" height="62" align="center" cellpadding="2" cellspacing="2" class="table" bordercolor="#000000" b>

<tr align="center"><td width="115">Train Name</td><td width="122">From</td><td width="117">To</td><td width="117">Dept Time</td><td width="119">Arrival Time</td><td width="110">Distance</td><td width="110">Fare</td><td>Available</td><td width="101">&nbsp;</td></tr>
<?php
while($r1 = mysql_fetch_array($query))
{
	$train= $r1['id'];
	$train_name = $r1['train_name'];
	$from = $r1['from_stop'];
	$to = $r1['to_stop'];
	$dept_time = $r1['dept_time'];
	$arrival_time = $r1['arrival_time'];
	$distance = $r1['distance'];
	$fare = $r1['fare'];
	
	$traint = $train.'train';
	$query1 = mysql_query("SELECT * from $traint where status='Available'");
	$c = mysql_num_rows($query1);
?>

<tr align="center"><td><?php echo $train_name;?></td><td><?php echo $from;?></td><td><?php echo $to;?></td><td><?php echo $dept_time;?></td><td><?php echo $arrival_time;?></td><td nowrap="nowrap"><?php echo $distance;?></td><td><?php echo $fare; ?></td><td><?php echo $c;?></td><td><a href="res.php?id=<?php echo $uid;?>&train=<?php echo $train;?>">Book</a>
</td></tr></table>
<?php
}
}
}
?>


     <table class="table" align="center" cellpadding="0" cellspacing="0" width="805">
     <tr><td height="124"><marquee onmouseover="this.stop();" onmouseout="this.start();" draggable="auto" bgcolor="#663333" loop="-1" dropzone="move" direction="left" behavior="alternate" scrollamount="2" scrolldelay="1">
     <img border="1" height="130" width="150" src="traines/14.jpg" />
     <img height="130" width="150" src="traines/1.jpg" />
     <img height="130" width="150" src="traines/2.jpg" />
     <img height="130" width="150" src="traines/3.jpg" />
     <img height="130" width="150" src="traines/4.jpg" />
     <img height="130" width="150" src="traines/5.jpg" />
     <img height="130" width="150" src="traines/6.jpg" />
     <img height="130" width="150" src="traines/7.jpg" />
     <img height="130" width="150" src="traines/8.jpg" />
     <img height="130" width="150" src="traines/9.jpg" />
     <img height="130" width="150" src="traines/10.jpg" />
     <img height="130" width="150" src="traines/11.jpg" />
     <img height="130" width="150" src="traines/12.jpg" />
     <img border="1" height="130" width="150" src="traines/13.jpg" />
     
     </marquee></td>
     <div style="position:absolute; float:right; visibility:hidden">
     <script type="text/javascript">

var todaydate=new Date()
var curmonth=todaydate.getMonth()+1 //get current month (1-12)
var curyear=todaydate.getFullYear() //get current year

document.write(buildCal(curmonth ,curyear, "main", "month", "daysofweek", "days", 1));
</script>



<form>
<select onChange="updatecalendar(this.options)">
<script type="text/javascript">

var themonths=['January','February','March','April','May','June',
'July','August','September','October','November','December']

var todaydate=new Date()
var curmonth=todaydate.getMonth()+1 //get current month (1-12)
var curyear=todaydate.getFullYear() //get current year

function updatecalendar(theselection){
var themonth=parseInt(theselection[theselection.selectedIndex].value)+1
var calendarstr=buildCal(themonth, curyear, "main", "month", "daysofweek", "days", 0)
if (document.getElementById)
document.getElementById("calendarspace").innerHTML=calendarstr
}

document.write('<option value="'+(curmonth-1)+'" selected="yes">Current Month</option>')
for (i=0; i<12; i++) //display option for 12 months of the year
document.write('<option value="'+i+'">'+themonths[i]+' '+curyear+'</option>')


</script>
</select>

<div id="calendarspace">
<script>
//write out current month's calendar to start
document.write(buildCal(curmonth, curyear, "main", "month", "daysofweek", "days", 0))
</script>
</div>

</form>



<script type="text/javascript">

var todaydate=new Date()
var curmonth=todaydate.getMonth()+1 //get current month (1-12)
var curyear=todaydate.getFullYear() //get current year

</script>
     
     </div>
     </tr>
     
</table>                                      

<?php
}
else
{
	header("Location:index.php");
}
}
else
{
	header("Location:Home.php?id=$uid");
}
?>
</body>
</html>














</div>
<!-- Bottom section -->
<?php include "bottom.php" ?>
</body>
</html>