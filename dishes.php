<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

include_once 'product-action.php'; // Include the product action file for cart functionality
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Dishes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <span style="width:200px; height:50px; background-color:white;"> <img class="img-rounded" width="20%" src="images/FluxMENUMASTER.jpeg" alt="" style=" width:150px; height=50px;"></span>
                <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Canteens <span class="sr-only"></span></a> </li>
                        <?php
                        if (empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
                                  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>';
                        } else {
                            echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>
                                  <li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="page-wrapper">
    <div class="top-links" style="height:60px; padding-top:20px; position:sticky; top:60px; background:white; z-index:1000; background-color:#b8dfe0; color:black;">
    <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Canteen</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>">Pick Your favorite food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay</a></li>
                </ul>
            </div>
        </div>

        <?php
        // Fetch restaurant details
        $ress = mysqli_query($db, "SELECT * FROM restaurant WHERE rs_id='$_GET[res_id]'");
        $rows = mysqli_fetch_array($ress);
        ?>

        <section class="inner-page-hero bg-image" data-image-src="images/img/restrrr.png">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><?php echo '<img src="admin/Res_img/' . $rows['image'] . '" alt="Canteen logo">'; ?></figure>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                <p><?php echo $rows['address']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container m-t-30">
            <div class="row">
                <!-- Cart Section -->
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="widget widget-cart">
                        <div class="widget-heading" style="background-color:#a7c957;">
                            <h3 class="widget-title text-dark">Your Cart</h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-body" style="max-height: 400px; overflow-y: auto;">
                            <?php
                            $item_total = 0;
                            if (!empty($_SESSION["cart_item"])) {
                                foreach ($_SESSION["cart_item"] as $item) {
                                    echo '<div class="title-row">
                                            ' . $item["title"] . '<a href="dishes.php?res_id=' . $_GET['res_id'] . '&action=remove&id=' . $item["d_id"] . '">
                                            <i class="fa fa-trash pull-right"></i></a>
                                          </div>
                                          <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                <input type="text" class="form-control b-r-0" value="₹' . $item["price"] . '" readonly>
                                            </div>
                                            <div class="col-xs-4">
                                                <input class="form-control" type="text" readonly value="' . $item["quantity"] . '">
                                            </div>
                                          </div>';
                                    $item_total += ($item["price"] * $item["quantity"]);
                                }
                            } else {
                                echo '<p>Your cart is empty.</p>';
                            }
                            ?>
                            <div class="price-wrap text-xs-center">
                                <p>TOTAL</p>
                                <h3 class="value"><strong>₹<?php echo $item_total; ?></strong></h3>
                                <p>Free Delivery!</p>
                                <?php
                                if ($item_total == 0) {
                                    echo '<a href="checkout.php?res_id=' . $_GET['res_id'] . '&action=check" class="btn btn-danger btn-lg disabled">Checkout</a>';
                                } else {
                                    echo '<a href="checkout.php?res_id=' . $_GET['res_id'] . '&action=check" class="btn btn-success btn-lg active">Checkout</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu Section -->
                <div class="col-md-8">
                    <div class="menu-widget" id="2">
                        <div class="widget-heading" style="background-color:#d6833a;">
                            <h3 class="widget-title text-dark">MENU</h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-body">
                            <?php
                            // Fetch dishes for the selected restaurant
                            $stmt = $db->prepare("SELECT * FROM dishes WHERE rs_id='$_GET[res_id]'");
                            $stmt->execute();
                            $products = $stmt->get_result();
                            if (!empty($products)) {
                                foreach ($products as $product) {
                                    echo '<div class="food-item">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-lg-8">
                                                    <form method="post" action="dishes.php?res_id=' . $_GET['res_id'] . '&action=add&id=' . $product['d_id'] . '">
                                                        <div class="rest-logo pull-left">
                                                            <a class="restaurant-logo pull-left" href="#">' . '<img src="admin/Res_img/dishes/' . $product['img'] . '" alt="Food logo">' . '</a>
                                                        </div>
                                                        <div class="rest-descr">
                                                            <h6><a href="#">' . $product['title'] . '</a></h6>
                                                            <p>' . $product['slogan'] . '</p>
                                                        </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info">
                                                    <span class="price pull-left" style="margin-right:10px">₹' . $product['price'] . '</span>
                                                    <input class="b-r-0" type="text" name="quantity" value="1" size="2" style="margin-left: 30px; margin-bottom: 5px; border:none; background-color: #d4a373; text-align: center;">
                                                    <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add To Cart">
                                                </div>
                                                </form>
                                            </div>
                                        </div>';
                                }
                            } else {
                                echo '<p>No dishes available for this restaurant.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row bottom-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 payment-options color-gray">
                                <h5>Payment Options</h5>
                                <ul>
                                    <li><a href="#"><img src="images/paypal.png" alt="Paypal"></a></li>
                                    <li><a href="#"><img src="images/mastercard.png" alt="Mastercard"></a></li>
                                    <li><a href="#"><img src="images/maestro.png" alt="Maestro"></a></li>
                                    <li><a href="#"><img src="images/stripe.png" alt="Stripe"></a></li>
                                    <li><a href="#"><img src="images/bitcoin.png" alt="Bitcoin"></a></li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-4 address color-gray">
                                <h5>Address</h5>
                                <p>65 / Ground Floor Kumpta Street Opp. Shipping House Fort, Mumbai, Mumbai, 400001, India</p>
                                <h5>Phone: 75696969855</h5>
                            </div>
                            <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                <h5>Additional Information</h5>
                                <p>Join thousands of other restaurants who benefit from having partnered with us.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>
</html>