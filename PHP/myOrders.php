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
            flex-direction: row;
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
        
        $connect = new mysqli($server, $username, $password, $database);
        
        
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
        
        require('Registration_and_Login/checkuser.php');
        
        $customer_id = $_SESSION['username'];
        $sqlquery = "SELECT COUNT(*) AS total FROM `orders` WHERE `customer_id` = '$customer_id'";
        $result = mysqli_query($connect, $sqlquery);
        $row = mysqli_fetch_assoc($result);
        $total_orders = $row['total'];
        
        $results_per_page = 4; 
        $total_pages = ceil($total_orders / $results_per_page);
      
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $results_per_page;

        $sqlquery = "SELECT `orders`.order_id, `orders`.order_date, product.name, product.price, order_items.quantity, product_sizes.size, product_colors.color 
                    FROM `orders` 
                    INNER JOIN order_items ON `orders`.order_id = order_items.order_id 
                    INNER JOIN product ON order_items.product_id = product.product_id 
                    INNER JOIN product_variants ON order_items.variant_id = product_variants.variant_id 
                    INNER JOIN product_sizes ON product_variants.size_id = product_sizes.size_id 
                    INNER JOIN product_colors ON product_variants.color_id = product_colors.color_id 
                    WHERE `orders`.customer_id = '$customer_id'
                    ORDER BY `orders`.order_id
                    LIMIT $offset, $results_per_page";

        $result = mysqli_query($connect, $sqlquery);

        if ($result->num_rows > 0) {
            $currentOrderId = 0;
            $totalPrice = 0;
           
        $orderCount = ($current_page - 1) * $results_per_page;

            
            while($row = $result->fetch_assoc()) {
                if ($currentOrderId != $row['order_id']) {
                    if ($orderCount > 0) {
                        // echo "<tr><td colspan='5'>Total Price</td><td>" . $totalPrice . "</td></tr>"; 
                        echo "</table>"; 
                        echo "</div>"; 
                        echo "</form>"; 
                        $totalPrice = 0; 
                    }
                    $orderCount++;
                    $currentOrderId = $row['order_id'];
                    echo "<form action='create_order_pdf.php' method='get' class='flex-column'>"; 
                    echo "<input type='hidden' name='order_id' value='" . $currentOrderId . "'>"; 
                    echo "<div class='order-header'>"; 
                    echo "<h3>Order ID: " . $orderCount . "</h3>";
                    echo "<button type='submit'>Generate Bill</button>"; // Submit button
                    echo "</div>"; 
                    echo "<table border='1' style='width:100%' >";
                    echo "<tr><th>Order Date</th><th>Product Name</th><th>Size</th><th>Color</th><th>Price</th><th>Quantity</th></tr>";
                }
                $totalPrice += $row['price'] * $row['quantity']; 
                echo "<tr><td>" . $row['order_date'] . "</td><td>" . $row['name'] . "</td><td>" . $row['size'] . "</td><td>" . $row['color'] . "</td><td>" . $row['price'] . "</td><td>" . $row['quantity'] . "</td></tr>";
            }
            if ($orderCount > 0) {
                echo "<tr><td colspan='5'>Total Price</td><td>" . $totalPrice . "</td></tr>"; // 
                echo "</table>"; 
                echo "</div>"; 
                echo "</form>"; 
            }

         
            echo "<div>";
            for ($page = 1; $page < $total_pages; $page++) {
                echo "<a href='/PHP/myOrders.php?page=$page'>$page</a> ";
            }
            echo "</div>";

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
