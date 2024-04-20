<?php
include '../database_connection.php';

var_dump($_POST); // Debugging

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id']) && isset($_POST['price']) && isset($_POST['description'])) {
        $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        $updateProductSql = "UPDATE product SET price = '$price', description = '$description' WHERE product_id = $product_id";
        $result = mysqli_query($conn, $updateProductSql);

        // Check if variant data is present
        if (isset($_POST['size']) && isset($_POST['color']) && isset($_POST['quantity']) && isset($_POST['variant_id'])) {
            $sizes = $_POST['size'];
            $colors = $_POST['color'];
            $quantities = $_POST['quantity'];
            $variant_ids = $_POST['variant_id'];

            // Construct the update variants query
            $updateVariantsSql = "";
            foreach ($variant_ids as $index => $variant_id) {
                $size = mysqli_real_escape_string($conn, $sizes[$index]);
                $color = mysqli_real_escape_string($conn, $colors[$index]);
                $quantity = mysqli_real_escape_string($conn, $quantities[$index]);
                $updateVariantsSql .= "UPDATE variants SET size = '$size', color = '$color', quantity = '$quantity' WHERE variant_id = $variant_id;";
            }

            // Execute update queries
            $result = mysqli_multi_query($conn, $updateVariantsSql);

            if ($result) {
                echo "Product and variants updated successfully.";
            } else {
                echo "Error updating variants: " . mysqli_error($conn);
            }
        } else {
            echo "Product updated successfully.";
        }
        echo "<script>windows.history.go(-2);</script>";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Product ID, price, and description are required.";
    }
} else {
    echo "Invalid request method.";
}
?>