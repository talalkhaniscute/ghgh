<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "distribution"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch the values from the form
$order_id = $_POST['order_id'];
$customer_name = $_POST['customer_name'];
$order_date = $_POST['order_date'];
$order_quantity = $_POST['order_quantity'];
$order_totalprice = $_POST['order_totalprice'];

// Prepare the SQL statement
$sql = "INSERT INTO orders (order_id, customer_name, order_date, order_quantity, order_totalprice) VALUES ('$order_id', '$customer_name', '$order_date', '$order_quantity', '$order_totalprice')";

if ($conn->query($sql) === TRUE) {
  echo "Record inserted successfully.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
    <a style="text-decoration:none; color: green;"href="Dashboard.html"><h1 >Return</h1></a>
</html>