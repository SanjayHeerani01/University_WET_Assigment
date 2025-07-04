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
                        <span>Add New Stock</span>

                    </div>
                    <br>
                    <?php session_start(); ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Name" aria-label="name"
                                    name='NAME'>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Category" aria-label="Category"
                                    name='CATEGORY'>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Price" aria-label="Price"
                                    name='PRICE'>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Discount" aria-label="Discount"
                                    name='DISCOUNT'>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Quantity" aria-label="Quantity"
                                    name='product_qty'>
                            </div>
                            <div class="col">
                                <input type="file" class="form-control" aria-label="image" name='IMG'>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Product Details"
                                    aria-label="details" name='product_details'>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col" style="text-align:center">
                                <input type="submit" value="ADD" name="ADD" class="btn_form" style="" />
                            </div>

                        </div>
                    </form>
                    <?php
                    include ('my_con.php');

                    if (isset($_POST['ADD'])) {
                        $Name = $_POST['NAME'];
                        $Category = $_POST['CATEGORY'];
                        $Price = $_POST['PRICE'];
                        $Discount = $_POST['DISCOUNT'];
                        $Quantity = $_POST['product_qty'];
                        $p_details = $_POST['product_details'];

                        // Check if price, quantity, and discount are greater than or equal to zero
                        if ($Price >= 0 && $Quantity >= 0 && $Discount >= 0) {

                            if (
                                $_FILES['IMG']['type'] == "image/jpeg" ||
                                $_FILES['IMG']['type'] == "image/png" ||
                                $_FILES['IMG']['type'] == "image/jpg"
                            ) {
                                $path = "img/product/" . $_FILES['IMG']['name'];
                                $np = $_FILES['IMG']['name'];

                                // Check if product with the same name and category exists
                                $existing_product_query = "SELECT * FROM products WHERE NAME = '$Name' AND CATEGORY = '$Category' LIMIT 1";
                                $existing_product_result = mysqli_query($con, $existing_product_query);

                                if (mysqli_num_rows($existing_product_result) > 0) {
                                    // Product with the same name and category exists, update the existing product
                                    $existing_product_data = mysqli_fetch_assoc($existing_product_result);
                                    $existing_product_id = $existing_product_data['ID'];

                                    // Update the existing product details
                                    $update_query = "UPDATE products SET PRICE = '$Price', IMAGE = '$np', DISCOUNT = '$Discount', product_qty = product_qty + '$Quantity', product_details = '$p_details' WHERE ID = '$existing_product_id'";
                                    mysqli_query($con, $update_query);
                                    echo "Product with the same name and category already exists. Updated the existing product.";
                                } else {
                                    // Product with the same name and category does not exist, insert a new product
                                    if (move_uploaded_file($_FILES['IMG']['tmp_name'], $path)) {
                                        $query = "INSERT INTO products (NAME, PRICE, IMAGE, DISCOUNT, CATEGORY, product_qty, product_details) VALUES ('$Name','$Price','$np','$Discount','$Category','$Quantity','$p_details')";
                                        mysqli_query($con, $query) or die(mysqli_error($con));
                                        echo "Item Successfully inserted";
                                    } else {
                                        echo "File is not uploaded";
                                    }
                                }
                            } else {
                                echo "Image is not selected or invalid image format";
                            }
                        } else {
                            echo "Price, quantity, and discount must be greater than or equal to zero";
                        }
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