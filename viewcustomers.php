<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	 th
        {
            background-color: crimson;
            color: whitesmoke;
        }
        table {
            background-color: whitesmoke;
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto; /* Center the table */
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
    <title>Helmet Shop</title>
</head>
<body>


     <center>
	<h1>CUSTOMER INFORMATION</h1>
        <?php
        $con=mysqli_connect("localhost","nirmalamca_user56","v.AvD~XaQ2jc","nirmalamca_user56")or die("cannot connect".mysqli_error());
        $query = "SELECT cust_id, cust_username, cust_address, cust_phonenumber FROM user_registration";
        $res = mysqli_query($con, $query) or die("Query Failed");

        echo "<table>";
        echo "<tr><th>CUSTOMER ID</th><th>NAME</th><th>ADDRESS</th><th>PHONE</th></tr>";

        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>" . $row['cust_id'] . "</td>";
            echo "<td>" . $row['cust_username'] . "</td>";
            echo "<td>" . $row['cust_address'] . "</td>";
            echo "<td>" . $row['cust_phonenumber'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        // Free result set
        mysqli_free_result($res);
        // Close connection
        mysqli_close($con);
        ?>
    </center>

</body>
</html>