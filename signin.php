<?php ob_start();?>
<html>
<head>

<?php
include "header.php";
?>
</head>
<body>
<?php include "top.php"; ?>
<div>


<html >
<head>

</head>
<body>
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
	<table>
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

</td>
</tr>
</table>		

		
			</body>
</html>

</div>
<?php  include "bottom.php "?>
</body>
</html>