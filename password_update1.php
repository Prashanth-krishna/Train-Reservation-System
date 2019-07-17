<?php
ob_start();
session_start();
if(isset($_SESSION['id']))
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>:: Password Change ::</title>
</head>

<body topmargin="0" bottommargin="0" bgcolor="#CCCC99">
<table bgcolor="#FFCCFF" style="margin-top:0" align="center" width="800px" border="1" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center" width="800px" height="140px"><img align="middle" width="800px" height="140px" src="images/Banner.jpg" />
</td></tr><tr><td colspan="2" bgcolor="#330000" align="center" height="5px">
<h2 style="text-align:center; color:#FFFFFF; font-family:Verdana, Geneva, sans-serif; margin-top:3px">

Welcome To Online Train-Ticket Reservation</h2></td></tr>

<tr><td colspan="2" bgcolor="#CC6600" align="center" style="color:#FFFFCC; font-size:14px">
|| <b><?php echo date("D d-M-Y");?></b> ||</td></tr>
  <tr><td height="124"><marquee onmouseover="this.stop();" onmouseout="this.start();" draggable="auto" bgcolor="#663333" loop="-1" dropzone="move" direction="left" behavior="alternate" scrollamount="2" scrolldelay="1">
     <img border="1" height="80" width="120" src="buses/1.jpg" />
     <img height="80" width="120" src="buses/1.jpg" />
     <img height="80" width="120" src="buses/2.jpg" />
     <img height="80" width="120" src="buses/3.jpg" />
     <img height="80" width="120" src="buses/4.jpg" />
     <img height="80" width="120" src="buses/5.jpg" />
     <img height="80" width="120" src="buses/6.jpg" />
     <img height="80" width="120" src="buses/7.jpg" />
     <img height="80" width="120" src="buses/8.jpg" />
     <img height="80" width="120" src="buses/9.jpg" />
     <img height="80" width="120" src="buses/10.jpg" />
     <img height="80" width="120" src="buses/11.jpg" />
     <img height="80" width="120" src="buses/12.jpg" />
     <img border="1" height="80" width="120" src="buses/13.jpg" />
     
     </marquee></td></tr>
<tr>
  <td align="center" height="300"> 

<table width="530" height="180" align="center" cellpadding="0" cellspacing="0" class="table">
<tr>
  <td height="50" align="center" bgcolor="#FFFFFF" style="font-family:Verdana, Geneva, sans-serif">
  <form method="post">
<dd><br />Old Password:<font color=#FF0000>*</font>     
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="oldp" value="" /></dd>
    <br /><br />
<dd>New Password:<font color=#FF0000>*</font> &nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="newp" value="" /></dd><br /><br />
<dd>Confirm Password:<font color=#FF0000>*</font> <input type="password" name="conp" value="" /></dd><br /><br />
<?php
require("config.php");

$uid=$_SESSION['id'];

$sql = mysql_query("select * from register where id = '$uid'");
$r = mysql_fetch_array($sql);
$password = $r['password'];

if(isset($_POST['s'])){
	$oldp = $_POST['oldp'];
	$newp = $_POST['newp'];
	$conp = $_POST['conp'];
	
 	if($oldp=='' || $oldp=='' || $newp==''){
		echo "<table class=table cellpadding=0 cellspacing=0 align=center bgcolor=#FFFF66 style=font-family:verdana;>
		<tr><td><font color=#FF0000 size=2>&nbsp;Please Enter The Password in All Fields &nbsp;</font></td></tr></table>";
	}
	else if($oldp!=$password){
			echo "<table class=table cellpadding=0 cellspacing=0 align=center bgcolor=#FFFF66 style=font-family:verdana;>
		<tr><td><font color=#FF0000 size=2>&nbsp;The Old Password is incorrect &nbsp;</font></td></tr></table>";
			}
	
	else if($newp != $conp){
		echo "<table class=table cellpadding=0 cellspacing=0 align=center bgcolor=#FFFF66 style=font-family:verdana;>
		<tr><td><font color=#FF0000 size=2>&nbsp; New Password and Confirm Password are not match &nbsp;</font></td></tr></table>";
		}
		
else{
	$sql = mysql_query("update register set password='$newp' where id='$uid' AND password='$oldp'");
	header('location:Home.php?id=$uid');
	?>
    <script>
	alert('Password Successfully changed');
	</script>
    <?php
	
	}

}

?>
<hr />
<input style="background-color:#990000; color:#FFFFFF; font-family:Verdana; font-weight:700; border-style:double" type="submit" name="s" value="SUBMIT" />
<a href="Home.php?id=<?php echo $uid;?>"> &nbsp; Back&nbsp; </a>
 
 
 </form></table></td></tr>
<tr><td colspan="3" align="center" bgcolor="#000000" style="font-family:Verdana, Geneva, sans-serif; size:3px; color:#FFF; padding-top:20px; padding-bottom:20px">
</td></tr>
</table>

<?php
}
else
{
	header("Location:Home.php?id=$uid");
}
?>
