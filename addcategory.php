<html>
    <head>
        <style>
            body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
	    background-size:100% 100%;
        }

        nav {
            background-color: #333;
            color: #fff;
            text-align: right;
            padding: 10px 0;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        nav a:hover {
            background-color: #555;
        }
	
	 #button {
            background-color: #4CAF50;
            color: white;
	    width:270px;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        #button:hover {
            background-color: #45a049;
        }
    
            </style>
        
    </head>
    <body>
   

	<center>
        <h1>ADD CATEGORY</h1>
        <form method="POST" action="">
            Add Category <input type="text" name="name"><br><br>
            <input type="submit" id="button" name="submit" value="ADD">
        </form>
	</center>
    </body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
	$con=mysqli_connect("localhost","nirmalamca_user56","v.AvD~XaQ2jc","nirmalamca_user56")or die("cannot connect".mysqli_error());
        $query="insert into category(name)values('$category_name')";
        $result=mysqli_query($con,$query);
        if($result)
        {
            echo "<script>alert('Category Added Successfully')</script>";
        }
    }
?>