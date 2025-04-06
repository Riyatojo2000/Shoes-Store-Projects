<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 10%;
  border-radius: 45%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<center>
<h2>LOGIN</h2>
</center>

<form method="POST" action=" ">
  <div class="imgcontainer">
    <img src="icon.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="input_box">
   <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username">
</div>
    <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="userpass" placeholder="Enter your password">
          </div>
        
  <div class="button">
          <input type="submit" value="login" name="login">
        </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$userpass=$_POST['userpass'];
        $con=mysqli_connect("localhost","nirmalamca_user56","v.AvD~XaQ2jc","nirmalamca_user56")or die("can't connect.....".mysqli_error());
	$query="SELECT cust_username,cust_pass FROM user_registration";
        $result=mysqli_query($con,$query)or die("select query failed....".mysqli_error());
        while($row=mysqli_fetch_array($result))
        {
		$nm=$row['cust_username'];
		$ps=$row['cust_pass'];
	}
	if($nm==$username && $ps==$userpass)
	{
		echo '<script>alert("Login Sucessfully Completed......")</script>';
	}
	mysqli_close($con);
	}
	else
	{
		echo '<script>alert("password doesent match")</script>';
	}
}
if(isset($_POST['login']))
{
  header("Location:index.php");
}
?>

