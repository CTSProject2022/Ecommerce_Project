<?php
session_start();

// Check if user is logged in
include "code.isLoggedIn.php";

// Get cart information
include "code.viewCart.php";

//check if cart is empty
if (empty($cart)) {
    echo "Cart is empty";
    exit();
}


// Calculate subtotal and total (if discounts are applied)

// Insert receipt
$receipt_code = "ABC";

$sql = "INSERT INTO `receipts` (`receipt_id`, `user_id`, `receipt_code`, `receipt_date`, `receipt_subtotal`, `receipt_total`) VALUES (NULL, '$user_id', '$receipt_code', current_timestamp(), '$subtotal', '$total');";

if (mysqli_query($conn, $sql)) {
    $receipt_id = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted ID is: " . $receipt_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Record products purchased and update cart
$sql = "";

foreach ($cart as $item) {
    $cart_id = $item["cart_id"];
    $item_id = $item["item_id"];
    $item_price = $item["item_price"];
    $cart_item_quantity = $item["cart_item_quantity"];




    # code...
    $sql .= "INSERT INTO `purchases` (`purchase_id`, `item_id`, `purchase_item_price`, `purchase_item_quanty`, `purchase_date`, `receipt_id`) VALUES (NULL, '$item_id', '$item_price', '$cart_item_quantity', current_timestamp(), '$receipt_id');";


    $sql .= "UPDATE `cart` SET `cart_item_status` = 'purchased' WHERE `cart`.`cart_id` = $cart_id;";
}

if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
  


// Update items in stock

// Implement stripe payment
