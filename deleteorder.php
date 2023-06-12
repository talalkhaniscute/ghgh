<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "distribution";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the order_id is provided
if (isset($_POST['order_id'])) {
  $order_id = $_POST['order_id'];

  // Delete the order from the database
  $sql = "DELETE FROM orders WHERE order_id = $order_id";

  if ($conn->query($sql) === TRUE) {
    // Redirect back to the orderlist.php page with success message
    header("Location: showorders.php?status=success");
    exit();
  } else {
    // Redirect back to the orderlist.php page with error message
    header("Location: showorders.php?status=error");
    exit();
  }
}

$conn->close();
?>
