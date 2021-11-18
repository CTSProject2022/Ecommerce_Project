<?php
session_start();


//checks if user is logged in
include "code.isLoggedIn.php";



//checks if id is in the url
if (isset($_GET["id"])) {
    $item_id = $_GET["id"];
} else {
    echo "no id in the url";
    exit();
}




include "connection.php";

$sql = "INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `cart_item_added`, `cart_item_quantity`, `cart_item_status`) VALUES (NULL, '$user_id', '$item_id', current_timestamp(), '1', 'cart');";



if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";

    // header("location: detail.php?id=$item_id");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
