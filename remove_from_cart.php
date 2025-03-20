<?php
session_start();
if (isset($_GET['d_id'])) {
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['d_id'] == $_GET['d_id']) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}
header("Location: cart.php");
exit();
?>