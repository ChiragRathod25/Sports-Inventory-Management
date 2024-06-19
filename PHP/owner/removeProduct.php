<?php
require('../database_connection.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    
    $delete_variants_query = "DELETE FROM product_variants WHERE product_id = '$product_id'";
    mysqli_query($conn, $delete_variants_query);

    $delete_sizes_query = "DELETE FROM product_sizes WHERE product_id = '$product_id'";
    mysqli_query($conn, $delete_sizes_query);
    
    $delete_colors_query = "DELETE FROM product_colors WHERE product_id ='$product_id'";
    mysqli_query($conn, $delete_colors_query);
    
    $delete_colors_query = "DELETE FROM productimages WHERE product_id ='$product_id'";
    mysqli_query($conn, $delete_colors_query);
    
    $delete_product_query = "DELETE FROM product WHERE product_id = '$product_id'";
    mysqli_query($conn, $delete_product_query);
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    echo "Product ID not provided.";
}
?>
