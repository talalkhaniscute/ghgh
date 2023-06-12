<!DOCTYPE html>
<html>
<head>
  <title>Order List</title>
  <style>
    table {
      border-collapse: collapse;
      width: 90%;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #2b2916;
      color:white;
    }

    button {
      height: 30px;
      font-size: 14px;
      font-weight: bold;
      padding: 5px;
      border: none;
      background-color: #54b86c;
      color: white;
      cursor: pointer;
    }

    button:hover {
      background-color: green;
    }
  </style>
</head>
<body>
  <h1 style="text-align:center">Order List</h1>
<!-- Place this code where you want to display the success or error message -->
<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';

if ($status === 'success') {
  echo "<p style='color: green;'>Order deleted successfully</p>";
} elseif ($status === 'error') {
  echo "<p style='color: red;'>Error deleting order</p>";
}
?>

  <table>
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Customer Name</th>
        <th>Order Date</th>
        <th>Order Quantity</th>
        <th>Total Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
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

        // Fetch orders from the database
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["order_id"] . "</td>";
            echo "<td>" . $row["customer_name"] . "</td>";
            echo "<td>" . $row["order_date"] . "</td>";
            echo "<td>" . $row["order_quantity"] . "</td>";
            echo "<td>" . $row["order_totalprice"] . "</td>";
            echo "<td><form action='deleteorder.php' method='POST'><input type='hidden' name='order_id' value='" . $row["order_id"] . "'><button type='submit' name='delete' style='background-color:red;'>Delete</button></form></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No orders found.</td></tr>";
        }

        $conn->close();
      ?>
    </tbody>
  </table><br><br>
  <div>
    <a href="Dashboard.html"><button>Return</button></a>
  </div>
</body>
</html>
