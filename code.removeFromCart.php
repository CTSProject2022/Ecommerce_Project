<?php
session_start();


//checks if user is logged in
include "code.isLoggedIn.php";



//checks if id is in the url
if (isset($_GET["id"])) {
    $cart_id = $_GET["id"];
} else {
    echo "no id in the url";
    exit();
}




include "connection.php";

$sql = "DELETE FROM `cart` WHERE `cart`.`cart_id` = $cart_id AND cart.user_id";



if (mysqli_query($conn, $sql)) {
    echo "Item from cart has been deleted !!!!";

    // header("location: detail.php?id=$item_id");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
