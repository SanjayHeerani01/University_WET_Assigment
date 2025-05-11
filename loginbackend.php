<?php
// Start the session to store user information
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == 'ashii' && $password == 'admin1122'){
        $_SESSION['loggedin'] = true;
        header("Location: admin_chk_order.php");
        exit;
    } else {
        exit;
    }
} else {
    header("Location: admin_home.php");
    exit;
}
?>
