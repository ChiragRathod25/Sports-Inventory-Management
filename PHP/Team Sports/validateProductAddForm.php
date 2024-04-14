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
    $sport_id=$_POST['sport'];
    $category_id=$_POST['category'];
    $brand_id=$_POST['brand'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $description=$_POST['description'];

    $sql = "SELECT MAX(product_id) as productID FROM product";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $productID = $row['productID'];
    $productID++;

    $sql = "INSERT INTO product (product_id,sport_id,category_id,brand_id,name,price,description) VALUES ('$productID','$sport_id','$category_id','$brand_id','$name','$price','$description')";

    if (mysqli_query($connect, $sql)) {
        echo "<script>alert('Product added successfully with product ID: " . $productID . "');window.location.href='./productadd.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    if (isset($_POST['specifications'])) {
        foreach ($_POST['specifications'] as $specification) {
            $name = $specification['name'];
            $value = $specification['value'];
            $sql = "INSERT INTO Specifications (product_id, specification_name, value) VALUES ('$productID', '$name', '$value')";
            mysqli_query($connect, $sql);
        }
    }

    
    
    if(isset($_FILES['image'])){
        $errors= array();
        foreach($_FILES['image']['tmp_name'] as $key => $tmp_name ){
            $file_name = $key.$_FILES['image']['name'][$key];
            $file_size =$_FILES['image']['size'][$key];
            $file_tmp =$_FILES['image']['tmp_name'][$key];
            $file_type=$_FILES['image']['type'][$key];  
            
            // Add file upload validation here
            if(empty($errors)==true){
                $file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", $file_name); // Replace special characters and spaces
                if(file_exists("uploads/".$file_name)==false){
                    if (!is_dir('uploads')) {
                        mkdir('uploads', 0777, true); // Create the directory if it doesn't exist
                    }
                    move_uploaded_file($file_tmp,"uploads/".$file_name);
                }else{                                  
                    $new_dir="uploads/".$file_name.time();
                    rename($file_tmp,$new_dir);               
                }
                                
                $file_path = "uploads/".$file_name;
                $stmt = $connect->prepare("INSERT INTO productimages (product_id, file_path) VALUES (?, ?)");
                $stmt->bind_param("ss", $productID, $file_path);
                if (!$stmt->execute()) {
                    die("Query failed: " . $stmt->error);
                }
            }else{
                print_r($errors);
            }
        }
        if(empty($errors)){
            echo "Success";
        }
    }
}
?>