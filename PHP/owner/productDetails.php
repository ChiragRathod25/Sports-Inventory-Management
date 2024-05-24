<?php
require('../dbconnect.php');
?>
<?php
require('checkuser.php');
$sportId = $_GET['sport_id'];
$sql = "SELECT * FROM category WHERE sport_id = '$sportId' ORDER BY category_id";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value=\"" . $row["category_id"] . "\">" . $row["name"] . "</option>";
}
?>