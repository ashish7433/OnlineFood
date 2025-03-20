<?php
session_start();
include("connection/connect.php");

// Razorpay API Key
$apiKey = 'rzp_test_ppNpdxItp3Vc0J'; // Replace with your Razorpay API Key

// Calculate Total Amount
$item_total = 0;
foreach ($_SESSION["cart_item"] as $item) {
    $item_total += ($item["price"] * $item["quantity"]);
}

// Convert total to paise (Razorpay requires amount in the smallest currency unit)
$amount = $item_total * 100; // 1 INR = 100 paise

// Simulate Razorpay Payment
echo '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
      <script>
          var options = {
              key: "' . $apiKey . '", // Your Razorpay API Key
              amount: ' . $amount . ', // Amount in paise
              currency: "INR",
              name: "Food Order",
              description: "Dummy Payment for food order",
              handler: function (response) {
                  // Redirect to payment_success.php with a dummy payment ID
                  window.location.href = "payment_success.php?payment_id=" + response.razorpay_payment_id;
              },
              prefill: {
                  name: "' . $_SESSION["user_name"] . '",
                  email: "' . $_SESSION["user_email"] . '",
                  contact: "' . $_SESSION["user_phone"] . '"
              },
              theme: {
                  color: "#F37254"
              }
          };
          var rzp = new Razorpay(options);
          rzp.open();
      </script>';
?>