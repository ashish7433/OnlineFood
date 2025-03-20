<?php
/*
session_start();
include("connection/connect.php");

// Include PayPal SDK
require 'path/to/paypal-sdk/autoload.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

// PayPal API Context
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'YOUR_CLIENT_ID',     // Replace with your PayPal Client ID
        'YOUR_CLIENT_SECRET'  // Replace with your PayPal Client Secret
    )
);

// Calculate Total Amount
$item_total = 0;
foreach ($_SESSION["cart_item"] as $item) {
    $item_total += ($item["price"] * $item["quantity"]);
}

// Set Payer
$payer = new Payer();
$payer->setPaymentMethod("paypal");

// Set Amount
$amount = new Amount();
$amount->setCurrency("USD")
    ->setTotal($item_total);

// Set Transaction
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setDescription("Payment for food order");

// Set Redirect URLs
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("http://yourwebsite.com/payment_success.php")
    ->setCancelUrl("http://yourwebsite.com/payment_cancel.php");

// Create Payment
$payment = new Payment();
$payment->setIntent("sale")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));

try {
    // Create Payment and Redirect to PayPal
    $payment->create($apiContext);
    header("Location: " . $payment->getApprovalLink());
} catch (Exception $ex) {
    echo $ex->getMessage();
}
*/
?>
