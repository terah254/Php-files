<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .calculator {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2em;
            color: #333;
        }
    </style><title>Multipurpose Calculator</title>
    
</head>
<body>
    <div class="calculator">
        <h2>Multipurpose Calculator</h2>
        <form method="post">
            <input type="number" name="num1" placeholder="Enter first number" required>
            <input type="number" name="num2" placeholder="Enter second number">
            <select name="operation" required>
                <option value="">Select Operation</option>
                <option value="add">Addition (+)</option>
                <option value="subtract">Subtraction (-)</option>
                <option value="multiply">Multiplication (*)</option>
                <option value="divide">Division (/)</option>
                <option value="exponent">Exponentiation (^)</option>
                <option value="percentage">Percentage (%)</option>
                <option value="sqrt">Square Root (√)</option>
                <option value="log">Logarithm (log)</option>
            </select>
            <button type="submit" name="calculate">Calculate</button>
        </form>

        <?php
        if (isset($_POST['calculate'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'] ?? null; // Optional for some operations
            $operation = $_POST['operation'];
            $result = null;

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    $result = $num2 != 0 ? $num1 / $num2 : "Undefined (Division by zero)";
                    break;
                case 'exponent':
                    $result = $num1 ** $num2;
                    break;
                case 'percentage':
                    $result = ($num1 / 100) * $num2;
                    break;
                case 'sqrt':
                    $result = $num1 >= 0 ? sqrt($num1) : "Invalid input (negative number)";
                    break;
                case 'log':
                    $result = $num1 > 0 ? log($num1) : "Invalid input (log of non-positive number)";
                    break;
                default:
                    $result = "Invalid operation";
            }

            echo "<div class='result'><strong>Result:</strong> $result</div>";
        }
        ?>
    </div>
</body>
</html>