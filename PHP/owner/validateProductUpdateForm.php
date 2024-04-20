<?php
include '../database_connection.php';

var_dump($_POST); // Debugging

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id']) && isset($_POST['price']) && isset($_POST['description'])) {
        $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $sizes = $_POST['size'];
        $colors = $_POST['color'];
        $quantities = $_POST['quantity'];
        $variant_ids = $_POST['variant_id'];
        $updateProductSql = "UPDATE product SET price = '$price', description = '$description' WHERE product_id = $product_id";
        $result = mysqli_query($conn, $updateProductSql);
        $updateVariantsSql = "";
        // Execute update queries
        $result = mysqli_multi_query($conn, $updateVariantsSql);

        if ($result) {
            echo "Product and variants updated successfully.";
        } else {
            echo "Error updating product and variants: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>
