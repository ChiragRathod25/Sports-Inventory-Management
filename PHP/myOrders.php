<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="../CSS/Home Page/style.css" />
    <link rel="stylesheet" href="../CSS/Home Page/header-footer.css" />
    <link rel="stylesheet" href="../CSS/viewCart.css" />
    <style>
        .order-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction:row;
    gap: 2rem;
}
    </style>
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
    echo "<h2>My Orders</h2>";
    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
    require('Registration_and_Login/checkuser.php');
    
   
    $customer_id = $_SESSION['username'];

    // Get all orders of the logged-in user
    $sqlquery = "SELECT `orders`.order_id, `orders`.order_date, product.name, product.price, order_items.quantity 
                 FROM `orders` 
                 INNER JOIN order_items ON `orders`.order_id = order_items.order_id 
                 INNER JOIN product ON order_items.product_id = product.product_id 
                 WHERE `orders`.customer_id = '$customer_id'
                 ORDER BY `orders`.order_id";
                 
    $result = mysqli_query($connect, $sqlquery);

 
    
    if ($result->num_rows > 0) {
        $orderCount = 0;
        $currentOrderId = 0;

        
        
        
        while($row = $result->fetch_assoc()) {
            if ($currentOrderId != $row['order_id']) {
                if ($orderCount > 0) {
                    echo "</table>"; // Close the previous table
                    echo "</div>"; // Close the div
                    echo "</form>"; // Close the previous form
                }
                $orderCount++;
                $currentOrderId = $row['order_id'];
                echo "<form action='create_order_pdf.php' method='get' class='flex-column'>"; // Open a new form
                echo "<input type='hidden' name='order_id' value='" . $currentOrderId . "'>"; // Hidden input field for the order ID
                echo "<div class='order-header'>"; // Open a new div
                echo "<h3>Order ID: " . $orderCount . "</h3>";
                echo "<button type='submit'>Generate Bill</button>"; // Submit button
                echo "</div>"; // Close the div
                echo "<table border='1' style='width:100%' >";
                echo "<tr><th>Order Date</th><th>Product Name</th><th>Price</th><th>Quantity</th></tr>";
            }
            echo "<tr><td>" . $row['order_date'] . "</td><td>" . $row['name'] . "</td><td>" . $row['price'] . "</td><td>" . $row['quantity'] . "</td></tr>";
        }
        if ($orderCount > 0) {
            echo "</table>"; // Close the last table
            echo "</div>"; // Close the div
            echo "</form>"; // Close the last form
        }

        
      
        
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