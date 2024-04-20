<?php
include '../database_connection.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Construct the DELETE queries
    $delete_variants_query = "DELETE FROM product_variants WHERE product_id = $product_id";
    $delete_sizes_query = "DELETE FROM product_sizes WHERE product_id = $product_id";
    $delete_colors_query = "DELETE FROM product_colors WHERE product_id = $product_id";
    $delete_product_query = "DELETE FROM product WHERE product_id = $product_id";

    // Execute the DELETE queries
    if (mysqli_query($conn, $delete_variants_query) &&
        mysqli_query($conn, $delete_sizes_query) &&
        mysqli_query($conn, $delete_colors_query) &&
        mysqli_query($conn, $delete_product_query)) {
        // Redirect back to a suitable page after deletion
        header("Location: /path/to/suitable/page.php");
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
        // You can also uncomment the following lines to debug further
        echo "delete_variants_query: $delete_variants_query <br>";
        echo "delete_sizes_query: $delete_sizes_query <br>";
        echo "delete_colors_query: $delete_colors_query <br>";
        echo "delete_product_query: $delete_product_query <br>";
    }
} else {
    echo "Product ID not provided.";
}
?>
