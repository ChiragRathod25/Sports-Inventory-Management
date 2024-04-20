<?php
include '../database_connection.php';

var_dump($_POST); // Debugging

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['price']) && isset($_POST['description']) && isset($_POST['size']) && isset($_POST['color']) && isset($_POST['quantity']) && isset($_POST['variant_id']) && isset($_POST['product_id'])) {

        // Sanitize input data
        $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $sizes = $_POST['size'];
        $colors = $_POST['color'];
        $quantities = $_POST['quantity'];
        $variant_ids = $_POST['variant_id'];

        // Update product details
        $updateProductSql = "UPDATE product SET price = '$price', description = '$description' WHERE product_id = $product_id";
        $result = mysqli_query($conn, $updateProductSql);

        // Update product variants
        $updateVariantsSql = "";

        for ($i = 0; $i < count($sizes); $i++) {
            $size = mysqli_real_escape_string($conn, $sizes[$i]);
            $color = mysqli_real_escape_string($conn, $colors[$i]);
            $quantity = mysqli_real_escape_string($conn, $quantities[$i]);
            $variant_id = mysqli_real_escape_string($conn, $variant_ids[$i]);

            // Build update query for each variant
            $updateVariantsSql .= "UPDATE product_variants SET quantity = '$quantity' WHERE variant_id = $variant_id; ";
        }

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
