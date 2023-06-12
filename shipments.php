<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "distribution";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$shipmentId = $_POST['shipment_id'];
$supplierName = $_POST['supplier_name'];
$supplierContact = $_POST['supplier_contact'];
$supplierAddress = $_POST['supplier_address'];
$orderQuantity = $_POST['order_quantity'];
$shipmentPrice = $_POST['shipment_price'];

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO shipment (shipment_id, supplier_name, supplier_contact, supplier_address, order_quantity, shipment_price) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssii", $shipmentId, $supplierName, $supplierContact, $supplierAddress, $orderQuantity, $shipmentPrice);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
    <a style="text-decoration:none;color: green;"href="Dashboard.html"><h1 >Return</h1></a>
</html>