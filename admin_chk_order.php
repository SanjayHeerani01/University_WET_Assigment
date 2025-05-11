<!DOCTYPE html>
<html lang="zxx">
<?php include ('my_con.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini Mart</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        .heading_stock {
            background: #7fad39;
            font-size: 20px;
            color: #ffffff;
            font-weight: 700;
            line-height: 50px;
            text-align: center;
        }

        .btn_form {
            padding: 0 20px;
            background: #7fad39;
            font-size: 20px;
            color: #ffffff;
            border: none;
        }

        table {
            text-align: center;
        }

        td,
        th {
            padding: 5px;
        }

        .cnfrm_btn {
            padding: 10px;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
                <div class="col-lg-3">
                    <div class="header__cart">

                        <div class="header__cart__price"><a href="admin_home.php " class="primary-btn">logout</a></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="admin_chk_stock.php">check stock</a></li>
                            <li><a href="admin_add_stock.php">Add stock</a></li>
                            <li><a href="admin_chk_order.php">check orders</a></li>
                            <li><a href="admin_chk_total_sell.php">Total sell</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="heading_stock">
                        <span>Order Details</span>

                    </div>
                    <br>
                    <?php
                    session_start();
                    if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {

                        include ('my_con.php');

                        $query = "SELECT `first_name`,`last_name`, `phone`, `address`, `city`,`country`, `products_data`,`order_datetime` FROM orders";
                        $result = mysqli_query($con, $query);
                        if (mysqli_num_rows($result) > 0) {

                            echo "<table width = 100% border='1' >";
                            echo "<tr><th>Name</th><th>Phone</th><th>Address</th><th>City</th><th>Country</th><th>Products</th><th>Date</th>";

                            // Loop through each row of the result set
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";
                                echo "<td>" . $row['city'] . "</td>";
                                echo "<td>" . $row['country'] . "</td>";
                                $products_data = unserialize($row['products_data']);
                                $product_info = "";
                                foreach ($products_data as $index => $product) {
                                    $product_info .= $product['NAME'] . " (Qty: " . $product['product_qty'] . ")";
                                    if ($index < count($products_data) - 1) {
                                        $product_info .= ", ";
                                    }
                                }
                                echo "<td>" . $product_info . "</td>";
                                echo "<td>" . $row['order_datetime'] . "</td>";
                                $x = $row['email'];
                                echo "<td>
                                        <form action='https://formsubmit.co/".$x."' method='POST'>
                                            <input type='hidden' value='Your order has been confirmed'>
                                            <input type='submit' name='' class='site-btn cnfrm_btn' value='confirm'>
                                        </form>
                                    </td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "No records found";
                        }

                        // Close the database connection
                        mysqli_close($con);
                    } else {
                        header("Location: admin_home.php");
                        exit;
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Karachi Sindh Pakistan</li>
                            <li>Phone: +92 3322067460</li>
                            <li>Email: lohanasanjay460@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> All rights reserved | This
                                template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a
                                    href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>