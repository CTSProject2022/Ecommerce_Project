<?php
session_start(); // Running session on a page

if (isset($_POST["login"])) {
    echo "You clicked a button";  //output when button iss clicked

    include "connection.php";    //connection to the data base

    $email = $_POST["email"];       // POST must be in all caps
    $password = $_POST["password"];

    //my procederial code 
    $sql = "SELECT * FROM users WHERE users.email = '$email' "; // Find emails thare inside the data base
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) { // while loop
            echo "You found an email"; //output

            //Vertify Password 
            $db_password = $row["password"];
            // row pull information from the database

            if (password_verify($password, $db_password)) {
                echo "Password match";

                $_SESSION["user_id"] = $row["user_id"]; // Running session on a page
                $_SESSION["first_name"] = $row["first_name"]; // Running session on a page
                $_SESSION["last_name"] = $row["last_name"]; // Running session on a page
                $_SESSION["user_type"] = $row["user_type"]; // Running session on a page

                // Redirect User to another page Below code
                //header("location: homepage.php");

            } else {

                echo "Password do not match";
            }
        }
    } else {
        echo "No email found";
    }
}





include "header.php"; ?>

<h1>Login</h1>


<form action="login.php" method="post">

    <p>Email</p>
    <p><input type="text" name="email"></p>

    <p>Password</p>
    <p><input type="text" name="password"></p>

    <p><input type="submit" name="login"></p>

</form>

<?php include "footer.php"; ?>