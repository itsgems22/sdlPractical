<!DOCTYPE html>
<html>
<head>
  <title>Employee Search - Indexed Array in PHP</title>
  <style>
    body {
      font-family: Arial;
      background-color: #f9f9f9;
      padding: 30px;
    }

    .container {
      max-width: 450px;
      background: white;
      padding: 25px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    input {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    button {
      margin-top: 15px;
      padding: 10px;
      width: 100%;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .result {
      margin-top: 20px;
      font-weight: bold;
    }

    .success { color: green; }
    .fail { color: red; }
  </style>
</head>
<body>

<div class="container">
  <h2>Search Employee</h2>
  <form method="post">
    <label>Enter Employee Name:</label>
    <input type="text" name="empName" required>
    <button type="submit">Search</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_name = strtolower(trim($_POST['empName']));

    // Indexed array of employee names
    $employees = [
      "John", "Jane", "Michael", "Sarah", "David",
      "Emily", "Chris", "Laura", "James", "Emma",
      "Daniel", "Sophia", "Robert", "Olivia", "William",
      "Liam", "Chloe", "Ethan", "Isabella", "Ava"
    ];

    // Convert array to lowercase for case-insensitive search
    $lower_employees = array_map('strtolower', $employees);

    if (in_array($employee_name, $lower_employees)) {
      echo "<div class='result success'>✔️ Employee <strong>$employee_name</strong> found in the records.</div>";
    } else {
      echo "<div class='result fail'>❌ Employee <strong>$employee_name</strong> not found.</div>";
    }
  }
  ?>
</div>

</body>
</html>
