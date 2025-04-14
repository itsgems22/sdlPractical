<!DOCTYPE html>
<html>
<head>
  <title>PHP Inheritance Example - Shape Area</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      padding: 30px;
    }

    .container {
      max-width: 500px;
      margin: auto;
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
    }

    button {
      margin-top: 15px;
      padding: 10px 15px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
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
  <h2>Area Calculator using Inheritance (PHP)</h2>

  <form method="post">
    <label>Select Shape:</label>
    <select name="shape" onchange="this.form.submit()" required>
      <option value="">-- Choose Shape --</option>
      <option value="rectangle" <?= isset($_POST['shape']) && $_POST['shape'] == 'rectangle' ? 'selected' : '' ?>>Rectangle</option>
      <option value="circle" <?= isset($_POST['shape']) && $_POST['shape'] == 'circle' ? 'selected' : '' ?>>Circle</option>
      <option value="triangle" <?= isset($_POST['shape']) && $_POST['shape'] == 'triangle' ? 'selected' : '' ?>>Triangle</option>
    </select>
    <br>

    <?php
    // Show inputs based on shape
    if (isset($_POST['shape'])) {
        $shape = $_POST['shape'];
        if ($shape == "rectangle") {
            echo '<label>Length:</label><input type="number" step="any" name="length" required>';
            echo '<label>Width:</label><input type="number" step="any" name="width" required>';
        } elseif ($shape == "circle") {
            echo '<label>Radius:</label><input type="number" step="any" name="radius" required>';
        } elseif ($shape == "triangle") {
            echo '<label>Base:</label><input type="number" step="any" name="base" required>';
            echo '<label>Height:</label><input type="number" step="any" name="height" required>';
        }

        echo '<button type="submit" name="calculate">Calculate Area</button>';
    }
    ?>
  </form>

  <?php
  // Base class
  class Shape {
    public function area() {
      return 0;
    }
  }

  class Rectangle extends Shape {
    private $length, $width;
    function __construct($l, $w) {
      $this->length = $l;
      $this->width = $w;
    }
    function area() {
      return $this->length * $this->width;
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

  // Calculate area
  if (isset($_POST['calculate']) && isset($_POST['shape'])) {
      $shape = $_POST['shape'];
      $area = 0;

      if ($shape == "rectangle" && isset($_POST['length'], $_POST['width'])) {
          $obj = new Rectangle($_POST['length'], $_POST['width']);
      } elseif ($shape == "circle" && isset($_POST['radius'])) {
          $obj = new Circle($_POST['radius']);
      } elseif ($shape == "triangle" && isset($_POST['base'], $_POST['height'])) {
          $obj = new Triangle($_POST['base'], $_POST['height']);
      }

      if (isset($obj)) {
          echo "<div class='result'>Area of $shape: " . round($obj->area(), 2) . "</div>";
      }
  }
  ?>
</div>

</body>
</html>
