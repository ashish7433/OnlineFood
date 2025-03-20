<?php
session_start();
include("connection/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Your Cart</h2>
        <?php
        if (empty($_SESSION['cart'])) {
            echo '<p>Your cart is empty.</p>';
        } else {
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $key => $item) {
                        $item_total = $item['price'] * $item['quantity'];
                        $total += $item_total;
                        ?>
                        <tr>
                            <td><?php echo $item['title']; ?></td>
                            <td>₹<?php echo $item['price']; ?></td>
                            <td>
                                <form method="post" action="update_cart.php">
                                    <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                                    <input type="hidden" name="d_id" value="<?php echo $item['d_id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </form>
                            </td>
                            <td>₹<?php echo $item_total; ?></td>
                            <td>
                                <a href="remove_from_cart.php?d_id=<?php echo $item['d_id']; ?>" class="btn btn-sm btn-danger">Remove</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total</strong></td>
                        <td><strong>₹<?php echo $total; ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
            <?php
        }
        ?>
    </div>
</body>
</html>