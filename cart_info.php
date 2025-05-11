<?php
// Function to update cart information
include ('my_con.php');
$_SESSION["msg"]="";
function updateCartInfo($con)
{
    $count_query = "SELECT COUNT(DISTINCT product_id) AS total_count FROM shoppingcart";
    $count_result = mysqli_query($con, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $total_count = $count_row['total_count'];

    $sum_query = "SELECT SUM(
        CASE 
            WHEN p.discount > 0 THEN (p.price - (p.price * (p.discount / 100)))
            ELSE p.price
        END * s.product_qty
    ) AS total_price
    FROM shoppingcart AS s
    JOIN products AS p ON s.product_id = p.id";

    $sum_result = mysqli_query($con, $sum_query);
    $sum_row = mysqli_fetch_assoc($sum_result);

    $total_price = ($sum_row['total_price']) ? number_format($sum_row['total_price'], 2, '.', '') : 0;

    return array('total_count' => $total_count, 'total_price' => $total_price);
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['CloseBtn'])) {
    // Get the product_id from the form submission
    $product_id = $_POST['product_id'];

    // Retrieve the quantity of the canceled product from the shopping cart
    $cart_qty_query = "SELECT product_id, SUM(product_qty) AS total_qty FROM shoppingcart GROUP BY product_id";
    $cart_result = mysqli_query($con, $cart_qty_query);
    $cart_row = mysqli_fetch_assoc($cart_result);
    $canceled_qty = $cart_row['total_qty'];

    // Update the stock quantity of the corresponding product in the products table
    $update_stock_query = "UPDATE products SET product_qty = product_qty + $canceled_qty WHERE id = '$product_id'";
    mysqli_query($con, $update_stock_query);

    // Delete the canceled product entry from the shopping cart table
    $delete_query = "DELETE FROM shoppingcart WHERE product_id = '$product_id'";
    mysqli_query($con, $delete_query);


    // Redirect to prevent form resubmission
    header("Location: shoping-cart.php");
    exit();
}


// Check if the addToCartBtn is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addToCartBtn'])) {
    // Check if quantity is set, if not, set it to default value 1
    $product_qty = isset($_POST['qty']) ? $_POST['qty'] : 1;
    
    $product_id = $_POST['ID'];

    // Query to get the product quantity from the products table
    $product_query = "SELECT product_qty FROM products WHERE id = '$product_id'";
    $product_result = mysqli_query($con, $product_query);
    
    if ($product_result && mysqli_num_rows($product_result) > 0) {
        $product_data = mysqli_fetch_assoc($product_result);
        $available_qty = $product_data['product_qty'];

        // Check if the requested quantity is available in stock
        if ($available_qty >= $product_qty) {
            // Insert into shopping cart
            $insert_query = "INSERT INTO shoppingcart (product_id, product_qty) VALUES ('$product_id', '$product_qty')";
            mysqli_query($con, $insert_query);

            // Update product quantity in products table
            $update_query = "UPDATE products SET product_qty = product_qty - '$product_qty' WHERE id = '$product_id'";
            mysqli_query($con, $update_query);
        } else {
            // Product quantity not available in stock, handle accordingly (e.g., display error message)
            echo "Requested quantity not available in stock.";
        }
    } else {
        // Product not found in the products table, handle accordingly
        echo "Product not found.";
    }
}



// Assuming $con is your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['place_order'])) {

    $total_price = 0;
    $x=0;
    $products_data = array(); // Initialize an array to store product data
    $cart_query = "SELECT * FROM shoppingcart";
    $cart_result = mysqli_query($con, $cart_query);
    if (mysqli_num_rows($cart_result) > 0) {
        while ($cart_row = mysqli_fetch_assoc($cart_result)) {
            $product_id = $cart_row['product_id'];
            $product_query = "SELECT *, (price - (price * discount / 100)) AS discounted_price, shoppingcart.product_qty AS product_qty FROM products LEFT JOIN shoppingcart ON products.id = shoppingcart.product_id WHERE products.id = '$product_id'";
            $product_result = mysqli_query($con, $product_query);
            $product_data = mysqli_fetch_assoc($product_result);
            $total_price = $product_data['discounted_price'] * $cart_row['product_qty'];
            $x += $total_price;
            $products_data[] = $product_data; // Add product data to the array
        }
    }

    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $order_note = $_POST['order_note'];

    // Insert order data into database
    $insert_order_query = "INSERT INTO orders (first_name, last_name, country, address, city, state, postcode, phone, email, order_note,  products_data, total_sell) VALUES ('$first_name', '$last_name', '$country', '$address', '$city', '$state', '$postcode', '$phone', '$email', '$order_note', '" . serialize($products_data) . "', '$x')";
    mysqli_query($con, $insert_order_query);

    // Clear shopping cart after placing order
    $clear_cart_query = "DELETE FROM shoppingcart";
    mysqli_query($con, $clear_cart_query);

    header("Location: checkout.php");
    exit();
}


// Update cart information
$cart_info = updateCartInfo($con);
$total_count = $cart_info['total_count'];
$total_price = $cart_info['total_price'];
?>

<ul>
    <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i><span><?php echo $total_count; ?></span></a></li>
</ul>
<div class="header__cart__price">item: <span>$<?php echo $total_price; ?></span></div>