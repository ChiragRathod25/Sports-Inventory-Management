<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:sports-inventory-management.database.windows.net,1433; Database = Sports-Inventory-Management", "SportsHT29", "{your_password_here}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "SportsHT29", "pwd" => "{your_password_here}", "Database" => "Sports-Inventory-Management", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sports-inventory-management.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>