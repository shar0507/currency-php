<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
</head>
<body>

<?php
    function convertCurrency($amount, $fromCurrency, $toCurrency) {
        $exchangeRate = 75; 

        if ($fromCurrency === 'USD' && $toCurrency === 'INR') {
            return $amount * $exchangeRate;
        } elseif ($fromCurrency === 'INR' && $toCurrency === 'USD') {
            return $amount / $exchangeRate;
        } else {

            return null;
        }
    }

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $amount = $_POST["amount"];
        $fromCurrency = $_POST["fromCurrency"];
        $toCurrency = $_POST["toCurrency"];

        $convertedAmount = convertCurrency($amount, $fromCurrency, $toCurrency);

        if ($convertedAmount !== null) {
            echo "<p>Converted Amount: " . number_format($convertedAmount, 2) . " $toCurrency</p>";
        } else {
            echo "<p>Unsupported currency conversion</p>";
        }
    }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="amount">Amount:</label>
    <input type="number" name="amount" required>

    <label for="fromCurrency">From:</label>
    <select name="fromCurrency" required>
        <option value="USD">USD</option>
        <option value="INR">INR</option>
        <!-- Add more currency options if needed -->
    </select>

    <label for="toCurrency">To:</label>
    <select name="toCurrency" required>
        <option value="USD">USD</option>
        <option value="INR">INR</option>
        <!-- Add more currency options if needed -->
    </select>

    <button type="submit">Convert</button>
</form>

</body>
</html>
