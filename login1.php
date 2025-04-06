<html>

<body>

<center>
<HI>CUSTOMER LOGIN</H1>

<form method="post" action=">

Username:<input type="text" name="cust_username"><br>

Password: <input type="password" name="cust_password" placeholder=Enter password"><br>
<input type="Submit" name="submit" value="LOGIN">

<a href="reg1.php">NEW USER</a><br><br>

<a href="forgot.php">forgot password?</a><br><br>

</form

</center>
</body>

</html>

<?php

if(issetts POST["submit"]))
{

$custuser=$_POST["cust_username"];

$custpass=$_POST["cust_password"];

scon=mysqli_connect("localhost","pgroup2243"," paroog22437, pgroup2243")

db=mysqli_select_db($con,db pgroup2243)or die( couldn't connect to server); 
$query="select * from user_registration where cust_username='$custuser' and cust_password='$custpass'";
$result=mysqli_query($con,$query)or die("select Query failed...".mysql_error());

while($row=mysqli_fetch_array($result))
{
$un=$row[5];

$pw=$row[6];
}

if($un==custuser && $pw==$custpass)
{

echo success";
}
else
{
echo fall":
}
mysqli_close($con);
?>
