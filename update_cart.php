<?php
session_start();
if (isset($_POST['quantity']) && isset($_POST['d_id'])) {
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['d_id'] == $_POST['d_id']) {
            $item['quantity'] = $_POST['quantity'];
            break;
        }
    }
}
header("Location: cart.php");
exit();
?>