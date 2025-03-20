<?php
if (!empty($_GET["action"])) {
    $productId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
    $quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '';

    switch ($_GET["action"]) {
        case "add":
            if (!empty($quantity)) {
                // Fetch product details from the database
                $stmt = $db->prepare("SELECT * FROM dishes WHERE d_id = ?");
                $stmt->bind_param('i', $productId);
                $stmt->execute();
                $productDetails = $stmt->get_result()->fetch_object();

                if ($productDetails) {
                    // Create an item array
                    $itemArray = array(
                        $productDetails->d_id => array(
                            'title' => $productDetails->title,
                            'd_id' => $productDetails->d_id,
                            'quantity' => $quantity,
                            'price' => $productDetails->price
                        )
                    );

                    // Check if the cart already exists in the session
                    if (!empty($_SESSION["cart_item"])) {
                        // Check if the item already exists in the cart
                        if (in_array($productDetails->d_id, array_keys($_SESSION["cart_item"]))) {
                            // Update the quantity if the item exists
                            foreach ($_SESSION["cart_item"] as $k => $v) {
                                if ($productDetails->d_id == $k) {
                                    if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $quantity;
                                }
                            }
                        } else {
                            // Add the new item to the cart
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                        }
                    } else {
                        // Create the cart session if it doesn't exist
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
            }
            break;

        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                // Remove the item from the cart
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($productId == $v['d_id']) {
                        unset($_SESSION["cart_item"][$k]);
                    }
                }
            }
            break;

        case "empty":
            // Empty the entire cart
            unset($_SESSION["cart_item"]);
            break;

        case "check":
            // Redirect to the checkout page
            header("location: checkout.php");
            exit(); // Ensure no further code is executed after the redirect
            break;
    }
}
?>