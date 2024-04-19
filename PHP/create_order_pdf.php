<?php
$server = "localhost";
$username = "root";
$password = "Sports@Inv2937";
$database = "Sports-Inventory-Management";

$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
require_once('vendor/tecnickcom/tcpdf/tcpdf.php');
$order_id = $_GET['order_id'];
// Fetch the order details
$sqlquery = "SELECT * FROM `orders` JOIN `customer` ON orders.customer_id = customer.customer_id WHERE order_id = '$order_id'";
$result = mysqli_query($connect, $sqlquery);
$order = mysqli_fetch_assoc($result);

// Fetch the order items
$sqlquery = "SELECT * FROM `order_items` JOIN `product` ON order_items.product_id = product.product_id WHERE order_id = '$order_id'";
$result = mysqli_query($connect, $sqlquery);

$html = '
<style>

*{   
    font-size: 12px;
}
div>p{
    padding: 0;
    margin:  0;
}
</style>
<div>
<p>Order Date: ' . $order['order_date'] . '</p>
<p>Name: ' . $order['first_name'] . ' ' . $order['last_name'] . '</p>
<p>Email: ' . $order['email'] . '</p>
<p>Address: ' . $order['address'] . '</p>
<p>Phone Number: ' . $order['phone_number'] . '</p>
</div>
<h2>Order Items</h2>
<table border="1" cellspacing="0" cellpadding="5">
<tr>
<th width="15%">Sr. Number</th>
<th width="50%">Product Name</th>
<th width="15%">Quantity</th>
<th width="20%">Price</th>
</tr>
';

$total = 0;
$serial_number = 1;
while($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
    <td>' . $serial_number . '</td>
    <td>' . $row['name'] . '</td>
    <td>' . $row['quantity'] . '</td>
    <td>' . $row['price'] . '</td>
    </tr>
    ';
    $total += $row['price'] * $row['quantity'];
    $serial_number++;
}

$html .= '<tr>
<td colspan="3">Total</td>
<td>' . $total . '</td>
</tr>
</table>';

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle($order['first_name'] . ' ' . $order['last_name']);

// // Set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' ' . $order_id, PDF_HEADER_STRING);

// Path to your logo image
$logo = './logo4.jpeg';

// Dimensions of the logo image (in mm)
$logo_width = 5;
// $logo_height = 50;

// Position of the logo image (in mm)
// $x = 10;
// $y = 10;

// $pdf->Image($logo, $x, $y, $logo_width, $logo_height);

// Your header title
$header_title = 'HT Sports';

// Your header string
$header_string = 'www.htsports.com';

$pdf->SetHeaderData($logo, $logo_width, $header_title . ' ' . $order_id, $header_string);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Add a page
$pdf->AddPage();

// Write the HTML to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF
$pdf->Output('order_' . $order_id . '.pdf', 'I');
?>