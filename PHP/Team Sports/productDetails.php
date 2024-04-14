<?php
$connect = mysqli_connect("localhost", "root", "Sports@Inv2937", "Sports-Inventory-Management"); // replace with your connection details
$sportId = $_GET['sport_id'];
$sql = "SELECT * FROM category WHERE sport_id = '$sportId' ORDER BY category_id";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value=\"" . $row["category_id"] . "\">" . $row["name"] . "</option>";
}
?>