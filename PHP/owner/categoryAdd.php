<?php
require('../dbconnect.php');
?>
<?php

// Fetch data from the database
$sql = "SELECT * FROM customer";
// $result = mysqli_query($connect, $sql);

$sql="SELECT * FROM sport ORDER BY sport_id";
$sports=mysqli_query($connect,$sql);


// Function to escape special characters in HTML
// function escape($string) {
    // return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="../../CSS/Home Page/style.css" />
  <link rel="stylesheet" href="../../CSS/owner/owner.css">
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

      #brandForm input[type="text"],
      #brandForm select {
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
    </style>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <title>Add Category</title>
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
    <owner-sidebar></owner-sidebar>
    </aside>
    <!--Sidebar End-->

    <!--Main-Container Strat-->
    <main class="main-container">
        <section>
    
            <!-- New Brand Add -->
             <form method="POST" id="brandForm">
                <label for="brandName">Category Name:</label>
                <input type="text" name="brandName" id="brandName" required>
                <select name="sport" id="sport">
                    <?php
                    
        
        if(mysqli_num_rows($sports)>0){
            while($row=mysqli_fetch_assoc($sports)){
                echo "<option>" . $row["name"]. "</option>";
            }
        }
        else{
            echo "No sports found";
        }
        
        
        ?>
                </select>
                <button type="submit">Submit</button>
            </form>
            <?php
        
            $connect=mysqli_connect($server,$username,$password,$database);
            if(!$connect){
                die("Connection failed: " . mysqli_connect_error());
            }
        
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $brandName = $_POST["brandName"]; 
                $selectedSport=$_POST['sport'];
                
                $sql="SELECT sport_id FROM sport as sport_id WHERE name = '$selectedSport'";
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_assoc($result);
                $sport_id = $row['sport_id'];
        
                $sql = "SELECT MAX(category_id) as categoryID FROM category";
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_assoc($result);
                $categoryID = $row['categoryID'];
                $categoryID++;
                // Insert data into the database
                $sql = "INSERT INTO category (name,sport_id,category_id ) VALUES ('$brandName','$sport_id','$categoryID')";
                if (mysqli_query($connect, $sql)) {
                    echo "Category successfully added for sports ID : " . $sport_id;
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