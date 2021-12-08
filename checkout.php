<?php include "header.php"; ?>
<h1>Checkout</h1>

<from action="code.checkout.php" method="post">
    <button type="submit" name="checkout">Click Me</button>
</from>

<?php include "code.stripe1.php"; ?>

<?php include "footer.php"; ?>