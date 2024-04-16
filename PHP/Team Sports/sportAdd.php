<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="../../CSS/owner/owner.css">
  <link rel="stylesheet" href="../../CSS/Home Page/style.css" />
    <link rel="stylesheet" href="../../CSS/Home Page/header-footer.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        #brandForm {
            width: 40%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
        }
        
        #brandForm label {
            display: block;
            margin-bottom: 5px 0;
        }
        
        #brandForm input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        #brandForm button {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            margin-bottom: 5px ;
        }
        
        #brandForm button:hover {
            background-color: #0056b3;
        }
    </style>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <title>Shop dashboard</title>
</head>

<body>
  <!--Grid-Container Strat-->
  <div class="grid-container">
    <!--Header Start-->
    <header class="flex-row">
      <div class="header-left">
        <input type="search" placeholder="search..." class="search"/>
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
      <div class="sidebar-title">
        <div class="sidebar-logo">
          <span class="logo">
            <img src="../../CSS/logos/logo4.jpeg" alt="">
          </span>Hit Inventory
        </div>
      </div>
      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
            bar_chart_4_bars
            </span><a href="/HTML/Owner/owner_page.html">Dashboard</a>
        </li>
        <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
            category
            </span><a href="/HTML/Owner/category.html">Category</a>
        </li>
        <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
            account_box
            </span><a href="/HTML/Owner/Customer.html">Customers</a>
        </li>
        <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
            add_shopping_cart
            </span><a href="/HTML/Owner/purchase_order.html">Purchase Orders</a>
        </li>
        <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
            add_shopping_cart
            </span><a href="/HTML/Owner/Customer's_order.html">Customer's Orders</a>
        </li>
        <!-- <li class="sidebar-list-item">
          <span class="material-symbols-outlined">
            settings
            </span>Setting
        </li> -->
      </ul>
    </aside>
    <!--Sidebar End-->

    <!--Main-Container Strat-->
    <main class="main-container">
    <section>
    
    <!-- New Brand Add -->
     <form method="POST" id="brandForm">
        <label for="sport">Sport Name:</label>
        <input type="text" name="sportName" id="sportName" required>
        <button type="submit">Submit</button>
    </form>
    <?php
$server="localhost";
$username="root";
$password="Sports@Inv2937";
$database = "Sports-Inventory-Management";

    $connect=mysqli_connect($server,$username,$password,$database);
    if(!$connect){
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sportName = strtoupper($_POST["sportName"]); 
       
        $sql = "SELECT MAX(sport_id) as sport_id FROM sport";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $sport_id = $row['sport_id'];
        $sport_id++;
        // Insert data into the database
        $sql = "INSERT INTO sport (name,sport_id) VALUES ('$sportName','$sport_id')";
        if (mysqli_query($connect, $sql)) {
            echo "Sport added successfully with sport ID: " . $sport_id;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    }
?>

    </section>
    </main>
    <!--Main-Container End-->
  </div>
  <!--Grid-Container End-->
  <!--Script-->
  <!--ApexCharts-->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.46.0/apexcharts.min.js"></script>
<script src="../../JS/Owner/dash_board.js"></script>
<script src="../../JS/headerFooter.js"></script>
<script src="../../JS/default.js"></script>
</html>