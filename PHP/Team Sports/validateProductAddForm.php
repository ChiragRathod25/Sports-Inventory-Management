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
        $sportName = strtoupper($_POST["sport"]); 
        $sportName="India";

        $sql = "SELECT MAX(sport_id) as sport_id FROM sport";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $sport_id = $row['sport_id'];
        $sport_id++;


        $sport_id=$_GET['sport_id']);
        $category_id=$_POST['category_id']);
        $brand_id=$_POST['brand_id']);
        $name=$_POST['name']);
        $price=$_POST['price']);
        $description=$_POST['description']);

        $sql = "SELECT MAX(product_id) as productID FROM product";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $productID = $row['productID'];
        $productID++;

        $sql = "INSERT INTO product (product_id,sport_id,category_id,brand_id,name,price,description) VALUES ('$productID','$sport_id','$category_id','$brand_id','$name','$price','$description');

        if (mysqli_query($connect, $sql)) {
            echo "<script>alert('Brand added successfully with brand ID: " . $sport_id . "');window.location.href='./productadd.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $productId = // get the product ID
            if (isset($_POST['specifications'])) {
                foreach ($_POST['specifications'] as $specification) {
                    $name = $specification['name'];
                    $value = $specification['value'];
                    $sql = "INSERT INTO Specifications (product_id, specification_name, value) VALUES ('$productId', '$name', '$value')";
                    mysqli_query($connect, $sql);
                }
            }
            else{
                
            }
        }
    }

    
?>
