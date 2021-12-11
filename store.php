<?php include "header.php"; ?>

<h1>Storage Page</h1>


<!-- CSS CODE--->
<style>
    @import url('https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800&display=swap');

    .product-list {
        padding: 20px 10px 20px;
        font-family: 'Nunito Sans', sans-serif;
    }

    .product-list>ul {
        margin: 0 -10px;
        padding: 0;
        list-style: none;
        display: flex;
    }

    .product-list>ul>li {
        width: 25%;
        padding: 10px;

    }

    .white-box {
        border-radius: 5px;
        box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.4);
        background-color: #ffffff;
        padding: 20px 20px;
        transition: all 0.5s ease-in-out;
        position: relative;


        margin-top: 29px;
        top: 20px;







    }

    .wishlist-icon {
        position: absolute;
        right: 12px;
        top: 20px;
    }

    .wishlist-icon img {
        width: 20px;
        height: 20px;
    }

    .product-img {
        min-height: 135px;
    }

    .product-img img {
        max-width: 100%;
        max-height: 130px;
        display: block;
        margin: 0 auto;
    }

    .product-bottom {
        text-align: center;
    }

    .product-name {
        font-size: 17px;
        color: #666;
        text-align: center;
        margin: 10px 0 10px;
        font-weight: 600;
        max-height: 48px;
        min-height: 48px;
        overflow: hidden;
    }

    .price {
        margin-top: 0;
        font-size: 17px;
        font-weight: 600;
        color: #000000;
        font-family: 'Open Sans', sans-serif;
    }

    .blue-btn {
        background: #13cfdf;
        border-radius: 5px;
        color: #ffffff;
        font-weight: 700;
        border: none;
        padding: 0 15px;
        cursor: pointer;
        height: 30px;
        line-height: 30px;
        max-width: 132px;
        margin: 10px auto 0;
        display: block;
        text-align: center;
        text-decoration: none;
    }

    .price .line-through {
        font-size: 14px;
        color: #999999;
        font-weight: 400;
        vertical-align: 1px;
        display: inline-block;
        text-decoration: line-through;
        margin-left: 4px;
    }
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- HTML CODE--->
<div class="container">
    <div class="product-list">
        <div class="row">






            <?php //PHP header

            include "connection.php";

            $sql = "SELECT * FROM items ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {

                    $item_id = $row["item_id"];
                    $item_title = $row["item_title"];
                    $item_description = $row["item_description"];
                    $item_image = $row["item_image"];
                    $item_price = $row["item_price"];

                    $item_cat = $row["item_cat"];
                    $link = "details.php?cat=$item_cat&id=$item_id";

                    //$link = "details.php?id=$item_id";
            ?>

                    <!---out side php tag-->
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="wishlist-icon">
                                <a href="javascript:void(0);"><img src="https://pngimage.net/wp-content/uploads/2018/06/wishlist-icon-png-3.png" /></a>
                            </div>
                            <div class="product-img">
                                <img src="<?php echo $item_image; ?>">
                            </div>
                            <div class="product-bottom">
                                <div class="product-name"><?php echo $item_title; ?></div>
                                <div class="price">
                                    <span class="rupee-icon">TTD $</span><?php echo $item_price; ?>
                                </div>
                                <a href="<?php echo $link; ?>" class="<?php echo $link; ?>">View More</a>
                            </div>
                        </div>
                    </div>


            <?php
                }
            } else {
                echo "0 results";
            }

            //PHP Close
            ?>



















        </div>
    </div>
</div>



<?php include "footer.php"; ?>