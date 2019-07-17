
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Online Train-Ticket Reservation ::</title>
<!--<link rel="stylesheet" href="style.css" />-->
<style>
.table tr td {
	border-bottom-width: 1px;
	border-right-width: 1px;
	border-bottom-style: solid;
	border-right-style: outset
	border-right-color: darkred;
	border-bottom-color: darkred;
}

.table {
	border-left-width: 1px;
	border-top-width: 1px;
	border-left-style: outset;
	border-top-style: solid;
	border-left-color: darkred;
	border-top-color: darkred;
	font-size: 16px;
}
a{
	background-color:#3366FF;
	text-align:center;
	text-decoration:none;
	font-family:Verdana, Geneva, sans-serif;
	color:#FFF;
	border:groove;
    font-weight:550;
}
</style>



</head>

<body topmargin="0" bottommargin="0" bgcolor="#CCFF99">
<div align="center" style="width:807">

<embed src="banner3.swf" quality="high" type="application/x-shockwave-flash" wmode="transparent" width="807" height="150" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="always"></embed>

</div>
<table bgcolor="#FFCCFF" style="margin-top:0" align="center" width="800px" border="1" cellpadding="0" cellspacing="0">
<tr><td height="5px" align="center" bgcolor="#330000" colspan="2">
<h2 style="text-align:center; color:#FFFFFF; font-family:Verdana, Geneva, sans-serif; margin-top:3px">

Welcome To Online Train-Ticket Reservation</h2></td></tr>




<tr><td height="153" colspan="2">

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="800" height="150">
  <param name="movie" value="project.swf" />
  <param name="quality" value="high" />
  <param name="allowFullScreen" value="false" />
  <param name="allowScriptAccess" value="always" />
  <embed src="project.swf"
         quality="high"
         type="application/x-shockwave-flash"
         width="800"
         height="150"
         allowFullScreen="false"
         pluginspage="http://www.macromedia.com/go/getflashplayer"
         allowScriptAccess="always" />
</object>

 
  </td></tr>

<tr><td bgcolor="#CCCCCC" bordercolordark="#FFFFFF" align="left" colspan="2">
<h3 style="font-family:Verdana, Geneva, sans-serif; color: #000; margin-bottom:0px; margin-top:0px">Login Screen</h3></td></tr>

<tr><td width="398">

<form method="post" name="f">


<p style="font-family:Verdana, Geneva, sans-serif" align="center">&nbsp;</p>
<p style="font-family:Verdana, Geneva, sans-serif" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <input style="size:auto; width:150px" id="user" type="text" name="user"  />
</p>
<p style="font-family:Verdana, Geneva, sans-serif" align="center">Password:  
  <input type="password" id="pass" name="pass" style="size:auto; width:150px" />
</p>
<center>
<input type="submit" onclick="validate()" value="Login" name="s" style="background-color:maroon; height:20px; color:#FFF; font-weight:50" /> &nbsp;&nbsp; 
<a href="train_rev.php" style="cursor:default; font-size:12px; background-color:#900;">New User</a></center>
</form>
<?php
@session_start();
require("config.php");
if(isset($_POST['s'])){
$name = $_POST['user'];	
$pass = $_POST['pass']; 

  $sql = mysql_query("select * from register where email='$name' AND password='$pass'");
  if(mysql_num_rows($sql)==0)
  {
	  
     
      
	  
  }
  else
  {
	  
      
      
	  $sql1 = mysql_query("select * from register where email='$name' AND password='$pass'");
	  $r = mysql_fetch_array($sql1);
	  $id = $r['id'];
	  $_SESSION['id'] = $id;
	  @header("Location:Home.php?id=$id");
  }
}

?>

</td><td width="400">
<center><a href = adminlogin.php>Admin Login</a></center>
</td>
</tr>
</table>
<div align="center">
Copyright &nbsp; Prashanth
</div>

</body>
</html>
