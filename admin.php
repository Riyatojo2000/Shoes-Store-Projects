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
  width: 40%;
  border-radius: 50%;
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

<center><h2>ADMIN LOGIN</h2></center>

<form method="post" action="">
  <div class="imgcontainer">
    <img src="" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="submit">Login</button>
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
    $password=$_POST['password'];
    $con=mysqli_connect("localhost","nirmalamca_user56","v.AvD~XaQ2jc","nirmalamca_user56")or die("cannot connect".mysqli_error());
    $query="SELECT admin_username,admin_password FROM admin";
	$result=mysqli_query($con,$query)or die("select query failed.....".mysqli_error());
    while ($row = mysqli_fetch_array($result))
    {
        $nm=$row['admin_username'];
        $ps=$row['admin_password'];
        if($nm==$username && $ps==$password)
         {
            echo '<script>alert("Login Sucessfull")</script>';
            exit(0);
         }
         else
         {
            $flag=1;
         }
    }
    if($flag==1)
    {
        echo '<script>alert("Login UnSucessfull")</script>';
    }
	mysqli_close($con);
}
?>
