<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        nav {
            background-color: #fff;
            color: #333;
            text-align: right;
            padding: 10px 0;
        }
        nav a {
            color: #333;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        nav a:hover {
            background-color: #555;
        }
        /* Add some basic styling for the cards */
        .card {
            border: 1px solid #fff;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            text-align: center;
            position: relative;
        }
        .card img {
            max-width: 100%;
            height: auto;
        }
        /* Style for the rows */
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .remove-button {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #ff5555;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <nav>
        <center><h1 style="color:red">FASHION FLAIR</h1></center>
        <a href="adminhome.php">HOME</a>
        <a href="product.php">ADD PRODUCTS</a>
        <a href="vieworder.php">VIEW ORDER</a>
        <a href="viewproduct.php">VIEW PRODUCTS</a> 
        <a href="viewcustomer.php">VIEW CUSTOMERS</a>
        <a href="viewfeed.php">FEEDBACK</a>
    </nav>

    <?php
    $con = mysqli_connect("localhost", "nirmalamca_user56", "v.AvD~XaQ2jc", "nirmalamca_user56") or die("Cannot connect: " . mysqli_error($con));

    // Check if a product removal request is received
    if (isset($_GET['remove_product'])) {
        $productId = mysqli_real_escape_string($con, $_GET['remove_product']);

        // Perform the product removal from the database
        $sql = "DELETE FROM product WHERE productid = $productId";
        $result = $con->query($sql);

        // Check the result and provide feedback (you might want to handle errors more gracefully)
        if ($result) {
            echo "<script>alert('Product removed successfully');</script>";
        } else {
            echo "<script>alert('Error removing product');</script>";
        }
    }

    // Fetch data from the database
    $sql = "SELECT * FROM product";
    $result = $con->query($sql);

    // Number of products per row
    $productsPerRow = 3;

    // Display products and images using cards
    if ($result) {
        if ($result->num_rows > 0) {
            $counter = 0;
            echo '<div class="row">'; // Start the first row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<button class="remove-button" onclick="confirmRemove(' . $row['productid'] . ')">Remove</button>';
                echo '<img src="image/' . $row['image'] . '" alt="' . $row['name'] . '">';
                echo '<h2>' . $row['name'] . '</h2>';
                echo '<p>' . $row['category'] . '</p>';
                echo '<p>' . $row['productid'] . '</p>';
                echo '<p>$' . $row['price'] . '</p>';
                echo '</div>';
                
                $counter++;
                // Check if it's time to start a new row
                if ($counter % $productsPerRow == 0) {
                    echo '</div>'; // End the current row
                    echo '<div class="row">'; // Start a new row
                }
            }
            echo '</div>'; // End the last row
        } else {
            echo "0 results";
        }
        // Free result set
        $result->free_result();
    } else {
        echo "Query failed: " . $con->error;
    }

    // Close the database connection
    $con->close();
    ?>

    <script>
        function confirmRemove(productId) {
            var result = confirm("Are you sure you want to remove this product?");
            if (result) {
                // If the user confirms, redirect to the same page with the product ID as a parameter
                window.location.href = 'viewproduct.php?remove_product=' + productId;
            }
        }
    </script>
</body>
</html>