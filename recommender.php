<?php include "connection.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



    <script type="text/javascript">
        (function e() {
            var e = document.createElement("script");
            e.type = "text/javascript", e.async = true, e.src = "pk_test_51K25ftLYkgrbGNNzaWDStadXfk5dyCeLMpYYLMCto8sUru5REe4iM5XsJGX1FmrW3uo6dJx89E7vMGHF01hG2GAU00QrZ8rCn3";
            var t = document.getElementsByTagName("script")[0];
            t.parentNode.insertBefore(e, t)
        })();
    </script>
</head>





</head>

<style>
    /*body {
        font-family: "Open Sans", sans-serif;
    }*/

    h2 {
        color: #000;
        font-size: 26px;
        /*font-weight: 300;*/
        text-align: center;
        text-transform: uppercase;
        position: relative;
        margin: 30px 0 80px;
    }

    h2 b {
        color: #ffc000;
    }

    h2::after {
        content: "";
        width: 100px;
        position: absolute;
        margin: 0 auto;
        height: 4px;
        background: rgba(0, 0, 0, 0.2);
        left: 0;
        right: 0;
        bottom: -20px;
    }

    .carousel {
        margin: 50px auto;
        padding: 0 70px;
    }

    .carousel .carousel-item {
        min-height: 330px;
        text-align: center;
        overflow: hidden;
    }

    .carousel .carousel-item .img-box {
        height: 160px;
        width: 100%;
        position: relative;
    }

    .carousel .carousel-item img {
        max-width: 100%;
        max-height: 110%;
        display: inline-block;
        position: absolute;
        bottom: 0;
        margin: 0 auto;
        left: 0;
        right: 0;
    }

    .carousel .carousel-item h4 {
        font-size: 14px;
        margin: 10px 0;
        padding: 0 25px;
        font-weight: 500;
    }

    /* .carousel .carousel-item .btn {
        color: #333;
        border-radius: 0;
        font-size: 11px;
        text-transform: uppercase;
        font-weight: bold;
        background: none;
        border: 1px solid #ccc;
        padding: 5px 10px;
        margin-top: 5px;
        line-height: 16px;
    }

    .carousel .carousel-item .btn:hover,
    .carousel .carousel-item .btn:focus {
        color: #fff;
        background: #000;
        border-color: #000;
        box-shadow: none;  
    } */

    .carousel .carousel-item .btn i {
        font-size: 14px;
        font-weight: bold;
        margin-left: 5px;
    }

    .carousel .thumb-wrapper {
        text-align: center;
    }

    .carousel .thumb-content {
        padding: 15px;
    }

    .carousel-control-prev,
    .carousel-control-next {
        height: 100px;
        width: 40px;
        background: none;
        margin: auto 0;
        background: rgba(0, 0, 0, 0.2);
    }

    .carousel-control-prev i,
    .carousel-control-next i {
        font-size: 30px;
        position: absolute;
        top: 50%;
        display: inline-block;
        margin: -16px 0 0 0;
        z-index: 5;
        left: 0;
        right: 0;
        color: rgba(0, 0, 0, 0.8);
        text-shadow: none;
        font-weight: bold;
    }

    .carousel-control-prev i {
        margin-left: -3px;
    }

    .carousel-control-next i {
        margin-right: -3px;
    }

    .carousel .item-price {
        font-size: 13px;
        padding: 2px 0;
    }

    .carousel .item-price strike {
        color: #999;
        margin-right: 5px;
    }

    .carousel .item-price span {
        color: #86bd57;
        font-size: 110%;
    }

    .carousel .carousel-indicators {
        bottom: -50px;
    }

    .carousel-indicators li,
    .carousel-indicators li.active {
        width: 10px;
        height: 10px;
        margin: 4px;
        border-radius: 50%;
        border-color: transparent;
        border: none;
    }

    .carousel-indicators li {
        background: rgba(0, 0, 0, 0.2);
    }

    .carousel-indicators li.active {
        background: rgba(0, 0, 0, 0.6);
    }

    .star-rating li {
        padding: 0;
    }

    .star-rating i {
        font-size: 14px;
        color: #ffc000;
    }

    .reviews-container {
        display: flex;
        justify-content: center;
    }


    .price {
        /* color: rgb(41, 201, 49); */
        color: rgb(255 167 77);
        font-size: 15px;
        font-weight: 650;
    }
</style>



<body>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2>Recommended <b>Products</b></h2>
                <?php
                if (isset($_GET["cat"]) || ($_GET["id"])) {
                    $item_cat = $_GET["cat"];
                    $item_id = $_GET["id"];
                    $sql = "SELECT * FROM items WHERE item_id > 0 AND item_cat LIKE '$item_cat' AND item_id != $item_id ";


                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                ?>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                            <!-- Carousel indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner">

                                <?php
                                $check = 0;
                                $full_page = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $item_id = $row["item_id"];
                                    $item_title = $row["item_title"];
                                    $item_description = $row["item_description"];
                                    $item_image = $row["item_image"];
                                    $item_price = $row["item_price"];

                                    $item_cat = $row["item_cat"];
                                    $link = "details.php?cat=$item_cat&id=$item_id";
                                    $check = $check + 1;

                                    if ($full_page == 0) {
                                        if ($check == 1) { ?>

                                            <div class="carousel-item active">
                                                <div class="row">
                                                <?php } else { ?>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="row">
                                            <?php }
                                        } ?>
                                            <div class="col-sm-4">
                                                <div class="thumb-wrapper">
                                                    <div class="img-box">

                                                        <a href="<?php echo $link; ?>"> <img src="<?php echo $item_image ?>" class="img-fluid" alt=""></a>
                                                    </div>
                                                    <div class="thumb-content">
                                                        <h4>
                                                            <?php echo mb_strimwidth("$item_title", 0, 50, "..."); ?>
                                                        </h4>
                                                        <p class="price">TTD$</span> <?php echo $english_format_number = number_format($item_price, 2); ?></p>

                                                        <a href="<?php echo $link; ?>" type="button" class="btn btn-warning">View Item</a>
                                                    </div>
                                                    <div class="yotpo bottomLine reviews-container " data-yotpo-product-id="<?php echo "$item_id"; ?>"> </div>

                                                </div>
                                            </div>
                                        <?php
                                        $full_page++;
                                        if ($full_page == 3) {
                                            $full_page = 0;
                                        }
                                    } ?>
                                                </div>
                                            </div>
                                            <!-- Carousel controls -->
                                            <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                                <i class="fa fa-angle-left"></i>
                                            </a>
                                            <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                            </div>
                    <?php
                    } else {
                        echo "<center>No products yet</center>";
                    }
                }
                    ?>

                        </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>

</html>