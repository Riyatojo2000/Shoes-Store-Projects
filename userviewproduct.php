<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        /* Style your product cards here */
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
        .product-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            margin-left: 30px;
            width: 310px; /* Fixed width for each card */
            display: inline-block;
            overflow: hidden; /* Hide overflow to keep images within the card */
            transition: transform 0.3s ease;
        }
        .product-card:hover 
        {
            transform: scale(1.2); /* Scales the card on hover */
        }
        .product-img {
            width: 100%; /* Take the full width of the container */
            height: auto; /* Maintain the original image ratio */
            object-fit: contain; /* Contain the image within the container */
            border-radius: 5px; /* Add border radius to images */
        }
.add
{
	background-color:brown;
	width:150px;
	height:40px;

}
.go-to-cart
{
	background-color:red;
	width:150px;
	height:40px;
}
button:hover
{
	background-color:aqua;
}
a
{
	color:black;
	text-decoration:none;
	
}
a:hover
{
	color:black;
}

    </style>
</head>
<body>
<nav>
    <center><h1 style="color:red">SHIELDED SKULLS</h1></center>
    <a href="afterloginuser.php">HOME</a>
    <a href="viewproductuser.php">VIEW PRODUCTS</a>
    <a href="viewcart.php">GO-TO-CART</a>
    <a href="#">MY ORDERS</a>
    <a style="color:red" href="contact.php">CONTACT</a>
</nav>
<center>
<h1>HELMETS</h1>
</center>
<main>
    <div class="product-list">
        <?php
        // Establish your database connection
        $con=mysqli_connect("localhost","nirmalamca_user39","x3?Y0TzbnAUy","nirmalamca_user39")or die("cannot connect".mysqli_error());
	//include 'connection.php';

        // Fetch data from the database
        $query = 'SELECT * FROM PRODUCT'; // Modify the query to match your table name
        $result = mysqli_query($con, $query) or die("Query Failed");

        // Display product information
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="product-card">
                <img class="product-img" src="./image/<?php echo htmlspecialchars($row['productimage']); ?>" alt="<?php echo htmlspecialchars($row['productname']); ?>">
                <h3><?php echo htmlspecialchars($row['productname']); ?></h3>
                <p>Size: <?php echo htmlspecialchars($row['productsize']); ?></p>
                <p>Category: <?php echo htmlspecialchars($row['productcategory']); ?></p>
                <p>Price: $<?php echo htmlspecialchars($row['productprice']); ?></p>
                <button class="add">
                    <a href="buy.php?h_id=<?php echo $row['productid']; ?>">BUY NOW</a>
                </button>
		 <button class="go-to-cart">
                    <a href="cart.php?product_id=<?php echo $row['productid']; ?>" style="text-decoration: none;">ADD TO CART</a>
                </button>
            </div>
        <?php } ?>
    </div>
</main>

</body>
</html>







