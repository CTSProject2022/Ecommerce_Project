<?php //PHP header




include "connection.php";

$sql = "SELECT * FROM SELECT * FROM cart, items WHERE cart.item_id = items.item_id AND cart.user_id = 1 AND cart.cart_item_status = 'cart' ";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {

    $cart = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($cart as $item) {
        $subtotal += $item["item_price"];
    }
} else {
    echo "0 results";
}
