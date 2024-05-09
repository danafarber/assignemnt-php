<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arithmetic Operations</title>
    <script>
        // Function to load and display the history from localStorage
        function loadHistory() {
            const history = localStorage.getItem('arithmeticHistory');
            if (history) {
                document.getElementById('history').innerHTML = history;
            }
        }

        // Function to save a new result to localStorage
        function saveResult(result) {
            let history = localStorage.getItem('arithmeticHistory') || '';
            history += `<div>${result}</div>`;  // Wrapping results in a div for better separation
            localStorage.setItem('arithmeticHistory', history);
            loadHistory(); // Refresh the history display
        }

        // Run on page load
        window.onload = function() {
            loadHistory();
        };
    </script>
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

            // Concatenate all results into a single string
            $fullResult = "Adding $num1 and $num2 gives: $resultAdd<br>" .
                          "Subtracting $num2 from $num1 gives: $resultSub<br>" .
                          "Multiplying $num1 with $num2 gives: $resultMul<br>" .
                          "Dividing $num1 by $num2 gives: $resultDiv";

            // Output the result for JavaScript to capture
            echo "<script>saveResult('$fullResult');</script>";
        } else {
            echo "<script>saveResult('Please enter valid numbers.');</script>";
        }
    }
    ?>
    <form action="" method="post">
        <input type="number" name="num1" required>
        <input type="number" name="num2" required>
        <input type="submit" value="Calculate">
    </form>
    <div id="history">
        <h2>Calculation History</h2>
        <!-- History will be loaded here -->
    </div>
</body>
</html>
