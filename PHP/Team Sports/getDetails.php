<?php
$server="localhost";
$username="root";
$password="Sports@Inv2937";
$database = "Sports-Inventory-Management";

$connect=mysqli_connect($server,$username,$password,$database);
if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$sql = "SELECT * FROM brand ORDER BY brand_id ";
$brands = mysqli_query($connect, $sql);
$sql="SELECT * FROM sport ORDER BY sport_id";
$sports=mysqli_query($connect,$sql);



if(mysqli_num_rows($brands)>0){
    echo "<h3>Brands</h3>";
    while($row = mysqli_fetch_assoc($brands)) {
        echo "Brand ID: " . $row["brand_id"]. " - Brand Name: " . $row["name"]. "<br>";
    }
}
else{
    echo "No brand found";
}

if(mysqli_num_rows($sports)>0){
    echo "<h3>Brands</h3>";
    while($row=mysqli_fetch_assoc($sports)){
        echo "Sport ID: " . $row["sport_id"]. " - Sport Name: " . $row["name"]. "<br>";
    }
}
else{
    echo "No sports found";
}


?>