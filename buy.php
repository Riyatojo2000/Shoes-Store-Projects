<!DOCTYPE html>
<html lang="en">
<head>
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
	height: 86vh;
	width: 100%;
	background: linear-gradient(45deg,crimson,indigo,cyan,lime);
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
<body>
    <nav>
        <center><h1 style="color:red">SHIELDED SKULLS</h1></center>
        <a href="viewproductuser.php">BACK</a>
    </nav>

    <div class="container">
        <?php
        require('../connection.php');
	//$con=mysqli_connect("localhost","nirmalamca_user39","x3?Y0TzbnAUy","nirmalamca_user39")or die("cannot connect".mysqli_error());
        //include 'connection.php';

        if(isset($_GET['h_id']))
        {
            $h_id = $_GET['h_id'];
      

            $query = "SELECT * FROM PRODUCT WHERE productid = '$h_id'";
            $result = mysqli_query($con, $query);
            $product = mysqli_fetch_assoc($result);

            if($product)
            {
        ?>
                <center>
		        <img class='product-img' src='../image/<?php echo $product["productimage"]; ?>' width="450" height="400" alt='<?php echo $product["productname"]; ?>'><br><br>
                
                <h2><?php echo htmlspecialchars($product['productname']); ?></h2>
                <p>Size: <?php echo htmlspecialchars($product['productsize']); ?></p>
                <p>Category: <?php echo htmlspecialchars($product['productcategory']); ?></p>
                <p>Price: $<?php echo htmlspecialchars($product['productprice']); ?></p>
                <button class="add">
                    <a href="order.php?product_id=<?php echo $h_id; ?>">BUY RIGHT NOW</a>
                </button>
                </center>
        <?php
            }
            else
            {
                echo "Product not found";
            }
        }
        ?>
    </div>
</body>
</html>
