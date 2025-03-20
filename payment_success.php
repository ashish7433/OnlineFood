<?php
session_start();
include("connection/connect.php");

// Get Payment ID from URL (dummy payment ID)
$payment_id = $_GET['payment_id'];

// Insert Order into Database
foreach ($_SESSION["cart_item"] as $item) {
    $SQL = "INSERT INTO users_orders(u_id, title, quantity, price, payment_method, payment_id) VALUES ('" . $_SESSION["user_id"] . "', '" . $item["title"] . "', '" . $item["quantity"] . "', '" . $item["price"] . "', 'Razorpay', '" . $payment_id . "')";
    mysqli_query($db, $SQL);
}

// Clear Cart
unset($_SESSION["cart_item"]);

// Show Success Message
echo "<script>alert('Payment successful. Your order has been placed!');</script>";
echo "<script>window.location.replace('your_orders.php');</script>";
?>