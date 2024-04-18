<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="../CSS/Home Page/style.css" />
    <link rel="stylesheet" href="../CSS/Home Page/header-footer.css" />
    <link rel="stylesheet" href="../CSS/viewCart.css" />

</head>
<body>
   <my-header></my-header> 
   <section>
    <?php
    $server = "localhost";
    $username = "root";
    $password = "Sports@Inv2937";
    $database = "Sports-Inventory-Management";
    
    // Create connection
    $connect = new mysqli($server, $username, $password, $database);
    
    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Get all orders
    $sqlquery = "SELECT orders.order_id, orders.order_date, product.name, product.price, cart_items.quantity 
                 FROM orders 
                 INNER JOIN cart_items ON orders.cart_id = cart_items.cart_id 
                 INNER JOIN product ON cart_items.product_id = product.product_id";
    
    $result = $connect->query($sqlquery);
    
    if ($result->num_rows > 0) {
        echo "<table border='1' >";
        echo "<tr><th>Order ID</th><th>Order Date</th><th>Product Name</th><th>Price</th><th>Quantity</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['order_id'] . "</td><td>" . $row['order_date'] . "</td><td>" . $row['name'] . "</td><td>" . $row['price'] . "</td><td>" . $row['quantity'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $connect->close();
    ?>
</section>
<my-footer></my-footer>
</body>
  <script src="../JS/headerFooter.js"></script>
  <script src="../JS/default.js"></script>
  </html>