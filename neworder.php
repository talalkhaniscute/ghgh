<!DOCTYPE html>
<html>
<head>
  <title>eStore</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #333;
      color: #fff;
      padding: 20px;
    }

    .header h1 {
      margin: 0;
    }

    .receipt-form {
      max-width: 500px;
      margin: 50px auto;
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
      display: block;
    }

    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group input[type="date"],
    .form-group input[type="submit"] {
      width: 100%;
      padding: 8px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    .form-group input[type="submit"] {
      width: 50%;
      padding: 8px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      background-color: green;
      color:white;
    }
    .form-group input[type="submit"]:hover {
      transition: 0.4s;
      background-color:#009900;
    }
    .form-group .half-width {
      width: 50%;
      float: left;
      box-sizing: border-box;
    }

    .form-group .half-width:nth-child(even) {
      padding-left: 10px;
    }

    .form-group .half-width:nth-child(odd) {
      padding-right: 10px;
    }

    .form-group::after {
      content: "";
      display: table;
      clear: both;
    }
    .form-group .half-width select {
      width: 100%;
      padding: 8px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
  </style>
</head>
<body>
  <form action="order.php" method="POST">
    <div class="header">
      <h1>Talal Traders</h1>
    </div>

    <div class="receipt-form">
      <div class="form-group">
        <label for="order_id">Order ID</label>
        <input type="number" id="order_id" name="order_id">
      </div>

      <div class="form-group">
        <label for="customer_name">Customer Name</label>
        <input type="text" id="customer_name" name="customer_name">
      </div>
      <div class="form-group">
        <div class="half-width">
          <label for="item_id">Item ID:</label>
          <select name="item_id" id="item_id" required>  
      <?php
          // Database connection details
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "distribution";

          // Create connection
          $conn = new mysqli($servername,$username,$password,$dbname);

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          

          // Fetch item IDs and names from the inventory table
          $sql = "SELECT item_id, item_name FROM inventory";
          $result = $conn->query($sql);

          // Display item IDs and names as options
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $itemId = $row['item_id'];
              $itemName = $row['item_name'];
              echo "<option value='$itemId'>$itemId ($itemName)</option>";
            }
          }

          // Close the database connection
          $conn->close();
          ?>
          </select>
        </div>
      <div class="form-group">
        <div class="half-width">
        <label for="order_date">Order Date</label>
        <input type="date" id="order_date" name="order_date">
      </div>
      </div>

      <div class="form-group">
        <label for="order_quantity">Order Quantity</label>
        <input type="number" id="order_quantity" name="order_quantity">
      </div>
      <div class="form-group">
        <label for="priceperpiece">Price Per Piece</label>
        <input type="number" id="priceperpiece" name="priceperpiece">
      </div>
      <div class="form-group">
        <label for="order_totalprice">Order Total Price</label>
        <input type="number" id="order_totalprice" name="order_totalprice">
      </div>
      
      <div class="form-group">
        <label>Actions</label>
        <span class="icon ship">&#128736;</span>
        <span class="icon print">&#128438;</span>
      </div>
      <div class="form-group">
        <input type="submit" value="Submit">
      </div>
    </div>
  </form>
  
  <script>
    // Calculate total price when quantity or price per piece changes
    const quantityInput = document.getElementById('order_quantity');
    const priceInput = document.getElementById('priceperpiece');
    const totalPriceInput = document.getElementById('order_totalprice');

    function calculateTotalPrice() {
      const quantity = quantityInput.value;
      const price = priceInput.value;
      const totalPrice = quantity * price;

      totalPriceInput.value = totalPrice.toFixed(2);
    }

    quantityInput.addEventListener('input', calculateTotalPrice);
    priceInput.addEventListener('input', calculateTotalPrice);
  </script>
</body>
</html>
