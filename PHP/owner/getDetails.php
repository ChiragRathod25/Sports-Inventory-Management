<?php
require('../dbconnect.php');
?>
<?php

require('checkuser.php');
// Fetch data from the database
$sql = "SELECT * FROM brand ORDER BY brand_id ";
$brands = mysqli_query($connect, $sql);
$sql="SELECT * FROM sport ORDER BY sport_id";
$sports=mysqli_query($connect,$sql);
$sql="SELECT * FROM category ORDER BY category_id";
$category=mysqli_query($connect,$sql);

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
    echo "<h3>Sports</h3>";
    while($row=mysqli_fetch_assoc($sports)){
        echo "Sport ID: " . $row["sport_id"]. " - Sport Name: " . $row["name"]. "<br>";
    }
}
else{
    echo "No sports found";
}

if(mysqli_num_rows($category)>0){
    echo "<h3>Category</h3>";
    while($row=mysqli_fetch_assoc($category)){
        $selectedSportID=$row["sport_id"];
        $sql="SELECT name FROM sport WHERE sport_id = '$selectedSportID'";
        $result = mysqli_query($connect, $sql);
        $row2 = mysqli_fetch_assoc($result);
        if ($row2) {
            echo "Category ID: " . $row["category_id"]. " - Category Name: " . $row["name"]. " - Sport ID : " .$row["sport_id"]. " - Sport Name: ".$row2["name"]. "<br>";
        } else {
            echo "Category ID: " . $row["category_id"]. " - Category Name: " . $row["name"]. " - Sport ID : " .$row["sport_id"]. " - Sport Name: Not found<br>";
        }
    }
}
else{
    echo "No category found";
}
?>