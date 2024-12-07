<?php
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

$apiKey = "rzp_test_YourApiKey";
$apiSecret = "YourApiSecret";

$api = new Api($apiKey, $apiSecret);

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $razorpayPaymentId = $_POST['razorpay_payment_id'];
    $razorpayOrderId = $_SESSION['razorpay_order_id'];

    try {
        $attributes = [
            'razorpay_order_id' => $razorpayOrderId,
            'razorpay_payment_id' => $razorpayPaymentId
        ];

        $api->utility->verifyPaymentSignature($attributes);
    } catch (Exception $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
    echo "<p>Your payment was successful</p>";
    // Save order details to the database or update status
} else {
    echo "<p>Your payment failed</p>";
}
?>
