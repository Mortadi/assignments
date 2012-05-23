<?php

$num1 = 0;
$num2 = 0;
$func = '+';
$answer = 0;

if (isset($_POST['num1'])) {
  $num1 = $_POST['num1'];
  }
if (isset($_POST['num2'])) {
  $num2 = $_POST['num2'];
  }
if (isset($_POST['func'])) {
  $func = $_POST['func'];
  }



switch ($func) {
  case '-':
    $answer = $num1 - $num2;
    break;
  case '*':
    $answer = $num1 * $num2;
    break;
  case '/':
    $answer = $num1 / $num2;
    break;
  case '+':
  default:
    $answer = $num1 + $num2;
    break;
}

$total = $answer * 1.13;
?>

<!DOCTYPE html>
<html lang="en-ca">
<head>
  <meta charset="utf-8">
  <title>Money Calculator Assignment</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<form action="index.php" method="post">
	
  <label for="num1">1st Number:</label>
  <input type="number" id="num1" name="num1">

  <label for="num2">2nd Number:</label>
  <input type="number" id="num2" name="num2">

  <label for="func">Function:</label>
  <select id="func" name="func">
    <option value="+">+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
  </select>

  <button type="submit" id="submit">Calculate + tax</button>

  <strong>$<?php echo number_format($total, 2); ?></strong>

</form>

</body>
</html>
