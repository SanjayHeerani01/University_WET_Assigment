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
            cursor: pointer;
        }

        table {
            width: 100%;
            text-align: center;
        }

        td,
        th {
            padding: 5px;
        }

        .cnfrm_btn {
            padding: 10px;
        }

        /* Form Styles */
        #yearFilterForm {
            margin: 20px;
            display: flex;
            /* Add flex display */
            align-items: center;
            /* Vertically center elements */
        }

        h6 {
            font-weight: bold;
            margin-right: 10px;
            margin-bottom: 0;
            /* Remove default bottom margin */
        }

        select {
            padding: 10px;
            /* Adjust padding as needed */
            border-radius: 5px;
            margin-right: 10px;
        }

        .cnfrm_btn {
            padding: 10px 20px;
            background-color: #7fad39;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .sell_form {
            border: 1px solid #ebebeb;
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
    <?php
    include ('my_con.php');

    // Default to showing the total sell for the current year
    $currentYear = date('Y');
    $selectedYear = $currentYear;
    $monthlySells = array();

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $selectedYear = $_POST['year'];

        // Retrieve the total sell for each month of the selected year
        $query = "SELECT MONTH(order_datetime) AS month, SUM(total_sell) AS monthly_sell FROM orders WHERE YEAR(order_datetime) = ? GROUP BY MONTH(order_datetime)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $selectedYear);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $monthlySells[$row['month']] = $row['monthly_sell'];
        }
        $stmt->close();
    } else {
        // Retrieve the total sell for each month of the current year
        $query = "SELECT MONTH(order_datetime) AS month, SUM(total_sell) AS monthly_sell FROM orders WHERE YEAR(order_datetime) = ? GROUP BY MONTH(order_datetime)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $currentYear);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $monthlySells[$row['month']] = $row['monthly_sell'];
        }
        $stmt->close();
    }
    ?>
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
                            <li><a href="#">Total sell</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="heading_stock">
                        <span>Total Sell</span>
                    </div>
                    <div class="sell_form">
                        <div class="row justify-content-end" style="margin-right:10px;">
                            <form id="yearFilterForm" method="post">
                                <h6>Select Year:</h6>
                                <select name="year" id="year">
                                    <?php for ($year = 2020; $year <= 2030; $year++) { ?>
                                        <option value="<?php echo $year; ?>" <?php if ($year == $selectedYear)
                                               echo 'selected'; ?>><?php echo $year; ?></option>
                                    <?php } ?>
                                </select>
                                <button type="submit" class="site-btn cnfrm_btn">Filter</button>
                            </form>
                        </div>
                        <table border='1'>
                            <tr>
                                <th>S.No</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Total Sell</th>
                            </tr>
                            <?php for ($month = 1; $month <= 12; $month++) { ?>
                                <tr>
                                    <td><?php echo $month; ?></td>
                                    <td><?php echo date("F", mktime(0, 0, 0, $month, 1)); ?></td>
                                    <td><?php echo $selectedYear; ?></td>
                                    <td><?php echo isset($monthlySells[$month]) ? $monthlySells[$month] : 0; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th colspan="3">Total Sell of <?php echo $selectedYear; ?>:</th>
                                <th><?php echo array_sum($monthlySells); ?></th>
                            </tr>
                        </table>
                        
                    </div>
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
                            <li>Address: Karach Sindh Pakistan</li>
                            <li>Phone: +92 3322067 460</li>
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