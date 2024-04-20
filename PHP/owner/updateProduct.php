<?php
include '../database_connection.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT p.name, p.price, p.description, GROUP_CONCAT(DISTINCT ps.size) AS sizes, GROUP_CONCAT(DISTINCT pc.color) AS colors, pi.file_path, pv.quantity, pv.variant_id, pv.size_id, pv.color_id
            FROM product p
            LEFT JOIN product_sizes ps ON p.product_id = ps.product_id
            LEFT JOIN product_colors pc ON p.product_id = pc.product_id
            LEFT JOIN productimages pi ON p.product_id = pi.product_id
            LEFT JOIN product_variants pv ON p.product_id = pv.product_id
            WHERE p.product_id = $product_id
            GROUP BY p.product_id";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Product</title>
            <link rel="stylesheet" href="../../CSS/Home Page/style.css" />
            <link rel="stylesheet" href="../../CSS/Home Page/header-footer.css" />
            <link rel="stylesheet" href="../../CSS/Team Sports/productAdd.css" />
            <link rel="stylesheet" href="../../CSS/owner/owner.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        </head>

        <body>
            <div class="grid-container">
                <!--Header Start-->
                <header class="flex-row">
                    <div class="header-left">
                        <input type="search" placeholder="search..." class="search" />
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
                <!--Main-Container Start-->
                <main class="main-container">
                    <section>
                        <form method="POST" id="productAddForm" onsubmit="return validateForm(this)"
                            action="./validateProductUpdateForm.php" enctype="multipart/form-data">
                            <label for="price">Price:</label>
                            <input type="number" id="price" name="price" step="0.01" value="<?php echo $row['price']; ?>">

                            <label for="description">Description:</label>
                            <textarea id="description" name="description"><?php echo $row['description']; ?></textarea>
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <label for="image">Images of Product:</label>
                            <input type="file" id="image" name="image[]" accept="image/*" multiple>

                            <!-- Existing variants -->
                            <!-- <div id="variantsContainer" class="flex-column">
                                <?php
                                $sizes = explode(',', $row['sizes']);
                                $colors = explode(',', $row['colors']);
                                $quantities = explode(',', $row['quantity']);

                                // Loop over existing variants and display them
                                foreach ($sizes as $index => $size) {
                                    echo '<div class="variant">';
                                    echo '<label for="size">Size:</label>';
                                    echo '<input type="text" name="size[]" value="' . $size . '">';

                                    echo '<label for="color">Color:</label>';
                                    echo '<input type="text" name="color[]" value="' . $colors[$index] . '">';

                                    echo '<label for="quantity">Quantity:</label>';
                                    echo '<input type="number" name="quantity[]" value="' . $quantities[$index] . '">';
                                    // Hidden inputs to store variant IDs, size IDs, and color IDs
                                    echo '<input type="hidden" name="variant_id[]" value="' . $row['variant_id'] . '">';
                                    echo '<input type="hidden" name="size_id[]" value="' . $row['size_id'] . '">';
                                    echo '<input type="hidden" name="color_id[]" value="' . $row['color_id'] . '">';
                                    echo '</div>';
                                }
                                ?>
                            </div> -->
                                <?php
                                // Fetch product variants
                                $sql = "
                                    SELECT 
                                        product_variants.variant_id,
                                        product_sizes.size,
                                        product_colors.color,
                                        product_variants.quantity
                                    FROM 
                                        product_variants
                                    JOIN 
                                        product_sizes ON product_variants.size_id = product_sizes.size_id
                                    JOIN 
                                        product_colors ON product_variants.color_id = product_colors.color_id
                                    WHERE 
                                        product_variants.product_id = ?
                                ";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $product_id); // "i" indicates the variable type is integer
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $variants = $result->fetch_all(MYSQLI_ASSOC);

                                // Display variants
                                echo '<div id="variantsContainer" class="flex-column">';
                                foreach ($variants as $variant) {
                                    echo '<div class="variant flex-row" style="gap:5px">';
                                    echo '<div>';
                                    echo '<label for="size">Size:</label>';
                                    echo '<input type="text" name="size[]" value="' . $variant['size'] . '">';
                                    echo '</div>';
                                    
                                    
                                    echo '<div>';
                                    echo '<label for="color">Color:</label>';
                                    echo '<input type="text" name="color[]" value="' . $variant['color'] . '">';
                                    echo '</div>';
                                    
                                    
                                    
                                    echo '<div>';
                                    echo '<label for="quantity">Quantity:</label>';
                                    echo '<input type="number" name="quantity[]" value="' . $variant['quantity'] . '">';
                                    echo '</div>';
                                    
                                    // Hidden inputs to store variant IDs
                                    echo '<input type="hidden" name="variant_id[]" value="' . $variant['variant_id'] . '">';

                                    echo '</div>';
                                
                                
                                
                                
                                }
                                echo '</div>';



                                ?>
                            <button type="button" id="addVariant">Add Variant</button>

                            <div id="specificationsContainer" class="flex-column"></div>

                            <button type="button" id="addSpecification">Add Specification</button>

                            <button type="submit" id="update">Update</button>
                        </form>

                    </section>
                </main>
                <!--Main-Container End-->
            </div>
            <script src="../../JS/headerFooter.js"></script>
            <script src="../../JS/default.js"></script>
            <script src="../../JS/Team Sports/productUpdate.js"></script>
        </body>

        </html>
        <?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product ID not provided.";
}
?>