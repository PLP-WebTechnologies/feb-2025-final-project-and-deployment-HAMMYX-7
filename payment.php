<?php
// Get the amount from the URL parameter
$amount = isset($_GET['amount']) ? htmlspecialchars($_GET['amount']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background:rgb(233, 247, 245);
            padding: 50px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .pay-btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .pay-btn:hover {
            background: darkgreen;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirm Payment</h1>
        <p>You are about to make a payment of <strong>$<?= $amount ?></strong></p>
        <form action="process_payment.php" method="post">
            <input type="hidden" name="amount" value="<?= $amount ?>">
            <button type="submit" name="pay_now" class="pay-btn">Proceed to Pay</button>
        </form>
    </div>
</body>
</html>
