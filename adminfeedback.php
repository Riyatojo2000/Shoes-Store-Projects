<html>
    <head>
<style>
        body {
            font-family: Ariel, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #964B00;
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
        th
        {
            background-color: brown;
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
        </head>
       
<body style="height: 100p%; width: 100p%; background-image: url(image/reg3.png);background-repeat: no-repeat;background-size: cover;">
<center>
<H1><b>FEEDBACK<b></H1>
</center>
<center>
    <?php
    $con=mysqli_connect("localhost","nirmalamca_user56","v.AvD~XaQ2jc","nirmalamca_user56")or die("cannot connect".mysqli_error());
    $query = "SELECT name,email,rating,comments FROM feedback";
    $res = mysqli_query($con, $query) or die("Query Failed");

    echo "<table>";
    echo "<tr><th>NAME</th><th>EMAIL</th><th>COMMENTS</th></tr>";
    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

mysqli_free_result($res);

mysqli_close($con);
?>
</center>