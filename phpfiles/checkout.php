<?php
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

$apiKey = "rzp_test_YourApiKey";
$apiSecret = "YourApiSecret";

$api = new Api($apiKey, $apiSecret);

$orderData = [
    'receipt'         => 3456,
    'amount'          => 50000, // Amount in paise (500 INR)
    'currency'        => 'INR',
    'payment_capture' => 1 // 1 for automatic capture
];

$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Checkout</h2>
    <form id="razorpay-form" action="verify.php" method="POST">
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="<?php echo $apiKey; ?>"
            data-amount="<?php echo $amount; ?>"
            data-currency="INR"
            data-order_id="<?php echo $razorpayOrderId; ?>"
            data-buttontext="Pay with Razorpay"
            data-name="Your Site Name"
            data-description="Test Transaction"
            data-image="https://your_logo_url"
            data-prefill.name="Your Name"
            data-prefill.email="email@example.com"
            data-prefill.contact="9999999999"
            data-theme.color="#ff6842">
        </script>
        <input type="hidden" name="hidden">
    </form>
</body>
</html>
