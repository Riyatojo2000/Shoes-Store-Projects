<!DOCTYPE html>
<html lang="en">
<head>
	<style>
	
	body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
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
	.container{
	height: 100vh;
	width: 100%;
	background: linear-gradient(45deg,indigo,cyan,lime);
	background-size: 300% 300%;
	animation: color 12s ease-in-out infinite; 
	}

	@keyframes color{
	0%{
		background-position: 0 50%;
	}
	50%{
		background-position: 100% 50%;
	}
	100%{
		background-position: 0 50%;
	}
	}

	#wer
	{
		background-color: bisque;
		color:blue;
		width:150px;
		height:30px;
		font-sixe:large;
		border-radius:10px;
	}
	#wer:hover
	{
		background-color:hotpink;
		cursor:pointer;
		cursor:brown;
	}
</style>
</head>




	<body class="container">
	 <center>
	 <h1>ADD PRODUCT</h1><br><br>
    <form action="" method="post" enctype="multipart/form-data">
        Product Name:<input type="text" name="productName" required><br><br>

		Product Category:
		<select name='category'>
		<?php
			$con=mysqli_connect("localhost","nirmalamca_user56","v.AvD~XaQ2jc","nirmalamca_user56")or die("cannot connect".mysqli_error());
			$query='select * from category';
			$result=mysqli_query($con,$query);
			while($row=mysqli_fetch_array($result))
			{
				echo "<option>" .$row['name']. "</option>";
			}
		?>
		</select><br>

        Product Price:<input type="number" name="productPrice" required><br><br>

        Product Size:<input type="text" name="productSize" required><br><br>

        Product Image:<input type="file" name="productImage" accept="image/*" required><br><br>

        <button type="submit" id="wer" name="submit">ADD PRODUCT</button>
    </form>
	</center>
	
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$productname=$_POST['productName'];
	$productprice=$_POST['productPrice'];
	$productcategory=$_POST['productCategory'];
	$productsize=$_POST['productSize'];
	$productimage=$_FILES['productImage']['name'];
      $productimagetmp=$_FILES['productImage']['name'];
		$con=mysqli_connect("localhost","nirmalamca_user56","x3?Y0TzbnAUy","nirmalamca_user56")or die("cannot connect".mysqli_error());
		
		
		
		$query="insert into product(productName,productPrice,productCategory,productSize,productimage) values ('$name','$price','$category','$size','$image')";
		$result=mysqli_query($con,$query)or die("insert query failed.....".mysqli_error());
		if($result)
		{
			echo '<script>alert("Registered Sucessfully")</script>';
		}
		mysqli_close($con);
}
?>