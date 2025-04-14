<!DOCTYPE html>
<html>
<head>
  <title>Shape Area Calculator</title>
  <style>
    body {
      font-family: Arial;
      background-color: #f4f4f4;
      padding: 20px;
    }
    .container {
      max-width: 500px;
      margin: auto;
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-top: 8px;
    }
    .shape-select {
      margin-top: 10px;
    }
    .result {
      margin-top: 20px;
      font-weight: bold;
      color: green;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Area Calculator</h2>
  <form method="post" action="">
    <label><input type="radio" name="shape" value="triangle" required> Triangle</label><br>
    <label><input type="radio" name="shape" value="square"> Square</label><br>
    <label><input type="radio" name="shape" value="circle"> Circle</label><br><br>

    <!-- Dynamic input fields based on shape -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $selected = $_POST['shape'];
        if ($selected == 'triangle') {
            echo '<label>Base:</label><input type="number" step="any" name="base" required>';
            echo '<label>Height:</label><input type="number" step="any" name="height" required>';
        } elseif ($selected == 'square') {
            echo '<label>Side:</label><input type="number" step="any" name="side" required>';
        } elseif ($selected == 'circle') {
            echo '<label>Radius:</label><input type="number" step="any" name="radius" required>';
        }
    }
    ?>

    <br><br>
    <input type="submit" value="Calculate Area">
  </form>

  <?php
  // Base class
  class Shape {
    function area() {
      return 0;
    }
  }

  // Subclasses
  class Triangle extends Shape {
    private $base, $height;
    function __construct($b, $h) {
      $this->base = $b;
      $this->height = $h;
    }
    function area() {
      return 0.5 * $this->base * $this->height;
    }
  }

  class Square extends Shape {
    private $side;
    function __construct($s) {
      $this->side = $s;
    }
    function area() {
      return $this->side * $this->side;
    }
  }

  class Circle extends Shape {
    private $radius;
    function __construct($r) {
      $this->radius = $r;
    }
    function area() {
      return pi() * $this->radius * $this->radius;
    }
  }

  // Processing logic
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['shape'])) {
    $shape = $_POST['shape'];
    $area = 0;
    if ($shape == 'triangle' && isset($_POST['base'], $_POST['height'])) {
      $triangle = new Triangle($_POST['base'], $_POST['height']);
      $area = $triangle->area();
    } elseif ($shape == 'square' && isset($_POST['side'])) {
      $square = new Square($_POST['side']);
      $area = $square->area();
    } elseif ($shape == 'circle' && isset($_POST['radius'])) {
      $circle = new Circle($_POST['radius']);
      $area = $circle->area();
    }

    echo "<div class='result'>Area of $shape = " . round($area, 2) . "</div>";
  }
  ?>
</div>

</body>
</html>
