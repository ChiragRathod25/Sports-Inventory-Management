<?php
include '../database_connection.php';

if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $sql = "SELECT p.name, GROUP_CONCAT(DISTINCT ps.size) AS sizes, GROUP_CONCAT(DISTINCT pc.color) AS colors, pi.file_path, pv.quantity
            FROM product p
            LEFT JOIN product_sizes ps ON p.product_id = ps.product_id
            LEFT JOIN product_colors pc ON p.product_id = pc.product_id
            LEFT JOIN productimages pi ON p.product_id = pi.product_id
            LEFT JOIN product_variants pv ON p.product_id = pv.product_id
            WHERE p.product_id = $product_id
            GROUP BY p.product_id";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="../../CSS/owner/owner.css">
      <link rel="stylesheet" href="../../CSS/owner/Customer.css">

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
      <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
      <title>view Product</title>
      <style>
        .product-image {
          border: 2px solid black;
          border-radius: 5px;
          margin-bottom: 15px;
        }
      </style>
    </head>

    <body>
      <div class="grid-container">
        <header class="flex-row">
          <div class="header-left">
            <input type="search" placeholder="search..." class="search" />
            <span class="material-symbols-outlined ">
              search
            </span>
          </div>
          <div class="header-right">
            <span class="material-symbols-outlined">
              account_circle
            </span>
            <span class="material-symbols-outlined">
              notifications
            </span>
            <span class="pro-pic">
              <img src="../../CSS/owner/pro_pic.jpeg" alt="">
            </span>
          </div>
        </header>
        <!--Header End-->
        <!--Sidebar Start-->
        <aside id="sidebar">
          <owner-sidebar></owner-sidebar>
        </aside>
        <main class="main-container">
          <div class="container">
            <h1 class="table-title"><?php echo $row['name']; ?></h1>
            <div class="product-image"><?php echo '<img src="./' . $row['file_path'] . '" width="200px">'; ?></div>
            <table class="tbl">
              <tr class="header">
                <th>Sizes</th>
                <th>Colors</th>
                <th>Quantity</th>
                <th>Update</th>
              </tr>
            <?php
            $query = "SELECT product_variants.quantity, product_sizes.size, product_colors.color 
                      FROM product_variants 
                      INNER JOIN product_sizes ON product_variants.size_id = product_sizes.size_id 
                      INNER JOIN product_colors ON product_variants.color_id = product_colors.color_id 
                      WHERE product_variants.product_id = $product_id";

            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['size'] . '</td>';
                echo '<td>' . $row['color'] . '</td>';
                echo '<td>' . $row['quantity'] . '</td>';
                echo '<td class="remove"><a href="/php/owner/updateProduct.php?product_id=' . $product_id . '"><span class="material-symbols-outlined">upgrade</span></a></td>';
                echo '</tr>';
            }
            ?>
            </table>
          </div>
        </main>
      </div>
    </body>
    <script src="../../JS/headerFooter.js"></script>
    <script src="../../JS/default.js"></script>

    </html>
    <?php
  } else {
    echo "Product not found.";
  }
} else {
  echo "Product ID not provided.";
}
?>