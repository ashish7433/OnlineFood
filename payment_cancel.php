<?php
session_start();

// Show Cancel Message and Redirect to Make Order Page
echo "<script>alert('Dummy payment was cancelled.');</script>";
echo "<script>window.location.replace('make_order.php');</script>";
?>