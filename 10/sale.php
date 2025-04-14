<!DOCTYPE html>
<html>
<head>
  <title>Sell Medicine</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Sell Medicine</h2>
  <form method="POST" action="">
    <label>Medicine Name:</label>
    <input type="text" name="name" required>

    <label>Quantity Sold:</label>
    <input type="number" name="sold" required>

    <input type="submit" name="sell" value="Record Sale">
  </form>
  <br>
  <a href="inventory.php">View Inventory</a>
</div>

<?php
require 'db.php';

if (isset($_POST['sell'])) {
    $name = $_POST['name'];
    $sold = $_POST['sold'];

    $check = $conn->query("SELECT * FROM medicines WHERE name='$name'");

    if ($check->num_rows > 0) {
        $medicine = $check->fetch_assoc();
        $newQty = $medicine['quantity'] - $sold;

        if ($newQty >= 0) {
            $conn->query("UPDATE medicines SET quantity=$newQty WHERE name='$name'");
            echo "<p style='color:green; text-align:center;'>Sale recorded.</p>";
        } else {
            echo "<p style='color:red; text-align:center;'>Not enough stock.</p>";
        }
    } else {
        echo "<p style='color:red; text-align:center;'>Medicine not found.</p>";
    }
}
?>
</body>
</html>
