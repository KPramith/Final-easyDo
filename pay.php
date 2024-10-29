<?php
$errors = [];
$showForm = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values 
    $workerName = htmlspecialchars(trim($_POST['worker_name']));
    $rentAmount = htmlspecialchars(trim($_POST['rent_amount']));
    $cardNumber = htmlspecialchars(trim($_POST['card_number']));
    $expiryDate = htmlspecialchars(trim($_POST['expiry_date']));
    $cvv = htmlspecialchars(trim($_POST['cvv']));
    
    // Validate Worker Name
    if (empty($workerName)) {
        $errors[] = "Worker name is required.";
    }
    
    // Validate Rent Amount
    if (empty($rentAmount) || !is_numeric($rentAmount) || $rentAmount <= 0) {
        $errors[] = "Please enter a valid rent amount.";
    }
    
    // Validate Card Number
    if (empty($cardNumber) || !preg_match("/^\d{16}$/", $cardNumber)) {
        $errors[] = "Card number must be 16 digits.";
    }
    
    // Validate Expiry Date 
    if (empty($expiryDate) || !preg_match("/^(0[1-9]|1[0-2])\/\d{2}$/", $expiryDate)) {
        $errors[] = "Expiry date must be in MM/YY format.";
    } else {
        list($month, $year) = explode('/', $expiryDate);
        $currentYear = date("y");
        $currentMonth = date("m");
        
        if ($year < $currentYear || ($year == $currentYear && $month < $currentMonth)) {
            $errors[] = "The expiry date is invalid or expired.";
        }
    }
    
    // Validate CVV
    if (empty($cvv) || !preg_match("/^\d{3}$/", $cvv)) {
        $errors[] = "CVV must be 3 digits.";
    }

    // If no errors, process payment
    if (empty($errors)) {
        $showForm = false;
        echo "<div class='payment-success'>
                <h2>Payment Confirmation</h2>
                <p>Thank you, $workerName. Your payment of $$rentAmount has been processed.</p>
                <a href='pay.php' class='back-button'>Make Another Payment</a>
              </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Rent Payment</title>
    <link rel="stylesheet" href="css/pay.css">
</head>
<body>
<?php include('includes/header.php'); ?>
    <?php if ($showForm): ?>
    <div class="pay">
        <h2 class="pay_rent">PAY ME</h2>
        
        <?php if (!empty($errors)): ?>
        <div class="error-container">
            <ul class="error-list">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <form action="pay.php" method="POST">
            <div class="form-group">
                <label for="worker_name">Worker Name</label>
                <input type="text" id="worker_name" name="worker_name" 
                       value="<?php echo isset($workerName) ? $workerName : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="rent_amount">Rent Amount</label>
                <input type="number" id="rent_amount" name="rent_amount" 
                       value="<?php echo isset($rentAmount) ? $rentAmount : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number" 
                       value="<?php echo isset($cardNumber) ? $cardNumber : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="expiry_date">Expiry Date</label>
                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" 
                       value="<?php echo isset($expiryDate) ? $expiryDate : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" required>
            </div>
            <div class="form-group">
                <button type="submit">Pay Rent</button>
            </div>
        </form>
    </div>
    <?php endif; ?>
</body>
</html>
