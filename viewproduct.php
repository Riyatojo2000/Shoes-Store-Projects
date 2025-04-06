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
            width: 300px; /* Fixed width for each card */
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
     button
        {
    border: 2px solid black;
    padding: 1em;
    width: 80%;
    margin-left: 30px;
    cursor: pointer;
    margin-top: 2em;
    font-weight: bold;
    position: relative;
        }
 button::before
{
    content:"";
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 0;
    background-color: black;
    transition: all .5s;
    margin: 0;
}
 button::after
{
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 0;
    background-color: black;
    transition: all .5s;
}
 button:hover::before
{
    width: 30%;
}
 button:hover::after
{
    width: 30%;
}

    </style>
</head>
<body>
<nav>
    <center><h1 style="color:red">SHIELDED SKULLS</h1></center>
    <a href="afterloginadmin.php">HOME</a>
    <a href="addproduct.php">ADD PRODUCTS</a>
    <a href="addcategory.php">ADD CATEGORY</a>
    <a href="product.php">VIEW PRODUCTS</a> 
    <a href="viewcustomers.php">VIEW CUSTOMERS</a>
    <a href="viewfeedback.php">VIEW FEEDBACK</a>
</nav>
<center>
<h1>HELMETS</h1>
</center>
<main>
    <div class="product-list">
        <?php
        // Establish your database connection
        $con=mysqli_connect("localhost","nirmalamca_user39","x3?Y0TzbnAUy","nirmalamca_user39")or die("cannot connect".mysqli_error());

        // Delete product if requested
        if (isset($_GET['frame_id'])) {
            $frame_id = $_GET['frame_id'];

            // Use prepared statements to prevent SQL injection
            $query = "DELETE FROM PRODUCT WHERE productid = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("i", $frame_id);
            $stmt->execute();
            
            // Redirect back to this page after deletion
            header("Location: product.php");
            exit();
        }

        // Fetch data from the database
        $query = 'SELECT * FROM PRODUCT'; // Modify the query to match your table name
        $result = mysqli_query($con, $query) or die("Query Failed");

        // Display product information
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="product-card">
                <img class="product-img" src="./image/<?php echo htmlspecialchars($row['productimage']); ?>" alt="<?php echo htmlspecialchars($row['P_name']); ?>">
                <h3><?php echo htmlspecialchars($row['productname']); ?></h3>
                <p>Size: <?php echo htmlspecialchars($row['productsize']); ?></p>
                <p>Category: <?php echo htmlspecialchars($row['productcategory']); ?></p>
                <p>Price: $<?php echo htmlspecialchars($row['productprice']); ?></p>
                <button class="add">
                    <a href="product.php?frame_id=<?php echo $row['productid']; ?>&action=delete" style="text-decoration: none;">Remove</a>
                </button>
            </div>
        <?php } ?>
    </div>
</main>

</body>
</html>