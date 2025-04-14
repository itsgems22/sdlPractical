<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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
      padding: 10px;
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
  <h2>Calculate Area of Shape</h2>

  <!-- Shape Selection Form -->
  <form method="post">
    <label>Select Shape:</label><br><br>
    <input type="radio" name="shape" value="triangle" required> Triangle<br>
    <input type="radio" name="shape" value="square"> Square<br>
    <input type="radio" name="shape" value="circle"> Circle<br><br>

    <?php
    // Show relevant input fields after shape selection
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['shape'])) {
        $shape = $_POST['shape'];

        if ($shape === 'triangle') {
            echo '<label>Base:</label><input type="number" step="any" name="base" required>';
            echo '<label>Height:</label><input type="number" step="any" name="height" required>';
        } elseif ($shape === 'square') {
            echo '<label>Side:</label><input type="number" step="any" name="side" required>';
        } elseif ($shape === 'circle') {
            echo '<label>Radius:</label><input type="number" step="any" name="radius" required>';
        }
    }
    ?>

    <br><br>
    <input type="submit" value="Calculate">
  </form>

  <?php
  // Base class
  class Shape {
    public function area() {
      return 0;
    }
  }

  // Derived classes
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
      return pi() * pow($this->radius, 2);
    }
  }

  // Processing after form submission
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['shape'])) {
    $shape = $_POST['shape'];
    $area = 0;

    if ($shape == 'triangle' && isset($_POST['base'], $_POST['height'])) {
      $shapeObj = new Triangle($_POST['base'], $_POST['height']);
    } elseif ($shape == 'square' && isset($_POST['side'])) {
      $shapeObj = new Square($_POST['side']);
    } elseif ($shape == 'circle' && isset($_POST['radius'])) {
      $shapeObj = new Circle($_POST['radius']);
    }

    if (isset($shapeObj)) {
      $area = $shapeObj->area();
      echo "<div class='result'>Area of $shape = " . round($area, 2) . "</div>";
    }
  }
  ?>

</div>

</body>
</html>
