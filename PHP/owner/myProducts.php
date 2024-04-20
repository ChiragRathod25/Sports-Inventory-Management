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
  <title>My Products</title>
</head>

<body>
  <!--Grid-Container Start-->
  <div class="grid-container">
    <!--Header Start-->
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
    <!--Sidebar End-->

    <!--Main-Container Start-->
    <main class="main-container">
      <!-- MAIN CONTAINER -->
      <div class="container">
        <?php
        $server = "localhost";
        $username = "root";
        $password = "Sports@Inv2937";
        $database = "Sports-Inventory-Management";
        $connect = mysqli_connect($server, $username, $password, $database);
        if (!$connect) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (isset($_GET['category_id'])) {
          $category_id = $_GET['category_id'];

          // Fetch category name
          $category_name_sql = "SELECT name FROM category WHERE category_id = $category_id";
          $category_name_result = mysqli_query($connect, $category_name_sql);
          $category_name_row = mysqli_fetch_assoc($category_name_result);
          $category_name = $category_name_row['name'];
          echo '<h1 class="table-title">' . $category_name . '</h1>';
          $sql = "SELECT p.product_id,p.price AS price ,s.name AS sport_name, c.name AS category_name, b.name AS brand_name, p.name, p.description
            FROM product p
            INNER JOIN sport s ON p.sport_id = s.sport_id
            INNER JOIN category c ON p.category_id = c.category_id
            INNER JOIN brand b ON p.brand_id = b.brand_id
            WHERE p.category_id = $category_id";
          $result = mysqli_query($connect, $sql);
          if (mysqli_num_rows($result) > 0) {
            echo '<table class="tbl">
                  <tr class="header">
                      <th>No</th>
                      <th>Brand</th>
                      <th>Product ID</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>View</th>
                      <th>Remove</th>
                  </tr>';
            $row_number = 1;
            while ($row = mysqli_fetch_assoc($result)) {
              // Display each product as a table row
              echo '<tr>
                    <td>' . $row_number . '</td>
                    <td>' . $row['brand_name'] . '</td>
                    <td>' . $row['product_id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['price'] . '</td>
                    <td>' . $row['description'] . '</td>
                    <td class="remove"><a href="/php/owner/viewProduct.php?product_id=' . $row['product_id'] . '"><span class="material-symbols-outlined">
                    more
                    </span></td>
                    <td class="remove"><a href="/php/owner/removeProduct.php?product_id=' . $row['product_id'] . '?>"><span class="material-symbols-outlined text-blue">delete</span></a></td>

                  </tr>';
              $row_number++;
            }
            echo '</table>';
          } else {
            echo '<h2>No products found for this category.</h2>';
          }
          mysqli_free_result($result);
          mysqli_close($connect);
        } else {
          echo 'Error: Category ID not provided.';
        }
        ?>
      </div>
    </main>
    <!--Main-Container End-->
  </div>
  <!--Grid-Container End-->
</body>

<script src="../../JS/headerFooter.js"></script>
<script src="../../JS/default.js"></script>

</html>