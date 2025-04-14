<?php
// Set the cookie (only if not already set)
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    setcookie("user", $username, time() + (86400 * 7)); // 7 days
    header("Location: cookie_example.php"); // Redirect to reload with cookie
    exit();
}

// Delete the cookie
if (isset($_GET['logout'])) {
    setcookie("user", "", time() - 3600); // Expire it in the past
    header("Location: cookie_example.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>PHP Cookie Example</title>
  <style>
    body {
      font-family: Arial;
      padding: 20px;
      background-color: #f0f0f0;
    }

    .container {
      background: white;
      padding: 20px;
      max-width: 400px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    input {
      padding: 10px;
      width: 100%;
      margin-top: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    button {
      margin-top: 15px;
      padding: 10px;
      background: #007bff;
      color: white;
      border: none;
      width: 100%;
      border-radius: 6px;
    }

    a {
      display: inline-block;
      margin-top: 15px;
      color: red;
      text-align: center;
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="container">
  <?php if (isset($_COOKIE['user'])): ?>
    <h3>Welcome, <?= htmlspecialchars($_COOKIE['user']) ?>!</h3>
    <a href="?logout=true">Logout</a>
  <?php else: ?>
    <h3>Set Your Name in Cookie</h3>
    <form method="post">
      <input type="text" name="username" placeholder="Enter your name" required>
      <button type="submit">Save to Cookie</button>
    </form>
  <?php endif; ?>
</div>

</body>
</html>
