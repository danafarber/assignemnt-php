<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arithmetic Operations</title>
</head>

<body>
    <h1>Arithmetic Results</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        if (is_numeric($num1) && is_numeric($num2)) {
            $resultAdd = $num1 + $num2;
            $resultSub = $num1 - $num2;
            $resultMul = $num1 * $num2;
            $resultDiv = $num2 != 0 ? $num1 / $num2 : "Undefined (cannot divide by zero)";

            echo "<p>Adding $num1 and $num2 gives: $resultAdd</p>";
            echo "<p>Subtracting $num2 from $num1 gives: $resultSub</p>";
            echo "<p>Multiplying $num1 with $num2 gives: $resultMul</p>";
            echo "<p>Dividing $num1 by $num2 gives: $resultDiv</p>";
        } else {
            echo "<p>Please enter valid numbers.</p>";
        }
    }
    ?>
    <form action="" method="post">
        <input type="number" name="num1" required>
        <input type="number" name="num2" required>
        <input type="submit" value="Calculate">
    </form>
</body>

</html>