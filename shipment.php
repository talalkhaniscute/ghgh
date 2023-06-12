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
  <form action="shipments.php" method="POST">
    <div class="header">
      <h1>Talal Traders</h1>
    </div>

    <div class="receipt-form">
      <div class="form-group">
        <label for="shipment_id">Shipment ID</label>
        <input type="number" id="shipment" name="shipment_id">
      </div>

      <div class="form-group">
        <label for="supplier_name">Supplier Name</label>
        <input type="text" id="supplier_name" name="supplier_name">
      </div>

      <div class="form-group">
        <label for="supplier_contact">Supplier Contact</label>
        <input type="number" id="supplier_contact" name="supplier_contact">
      </div>

      <div class="form-group">
        <label for="supplier_address">Supplier Address</label>
        <input type="text" id="supplier_address" name="supplier_address">
      </div>
      <div class="form-group">
        <label for="order_quantity">Order Quantity</label>
        <input type="number" id="order_quantity" name="order_quantity">
      </div>
      <div class="form-group">
        <label for="shipment_price">Shipment Price</label>
        <input type="number" id="shipment_price" name="shipment_price">
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
</body>
</html>
