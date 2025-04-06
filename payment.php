<!DOCTYPE html>
<html>

<body style="height: 100%; width: 600px; background-image: url(image/reg2.jpg); background-repeat: no-repeat;">
    <form method="post" action="">
        <label style="color:white">
            <center>
                <h3 id="h3"><b><p>SELECT PAYMENT METHOD</p></b></h3>
                <input type="radio" id="upi" name="pay" value="UPI">
                <label for="upi">UPI</label><br>
                <input type="radio" id="Cash" name="pay" value="Cash">
                <label for="Cash">Cash</label><br><br>
                <input type="submit" name="submit" value="Submit payment"><br><br><br>
            </center>
        </label>
    </form>
</body>

</html>

<?php
session_start();

$con = mysqli_connect("localhost", "nirmalamca_user56", "v.AvD~XaQ2jc", "nirmalamca_user56") or die("Cannot connect: " . mysqli_error($con));

if (isset($_POST['submit'])) {
    $payment = isset($_POST['pay']) ? $_POST['pay'] : '';
    $custid = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
    $custname = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    if (isset($_GET['productid']) && isset($_GET['size'])) {
        $productId = $_GET['productid'];
        $selectedSize = $_GET['size'];

        $sqlProduct = "SELECT * FROM product WHERE productid='$productId'";
        $resultProduct = $con->query($sqlProduct);

        if ($resultProduct) {
            $rowProduct = $resultProduct->fetch_assoc();
            $name = $rowProduct['name'];
            $price = $rowProduct['price'];

            $sqlPayment = "INSERT INTO payment (custid, productid, productname, customername, payment_method) VALUES ('$cust_id', '$productid', '$name', '$cust_name', '$payment')";
            $resultPayment = mysqli_query($con, $sqlPayment);
            if ($resultPayment)
             {
            
                $orderId = mysqli_insert_id($con);
             }
            

            $sqlOrder = "INSERT INTO order (productid, productname, productprice, product_size, customerid, customername,paymentid) VALUES ('$productId', '$name', '$price','$cust_id', '$cust_name','$order_id')";
            $resultOrder = mysqli_query($con, $sqlOrder);

            $sqlUpdateStock = "UPDATE product SET stock = stock - 1 WHERE productid = '$productId'";
            $resultUpdateStock = mysqli_query($con, $sqlUpdateStock);

            
            if ($resultOrder && $resultPayment) {
                echo "<script>alert('Payment successful!'); window.location='';</script>";
            } else {
                echo '<script>alert("Failed")</script>';
            }
            mysqli_close($con);
        } 
        }
    
}
?>