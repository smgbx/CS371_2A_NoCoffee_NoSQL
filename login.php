<?php
include "connection.php";

if(!session_id()) session_start();

$text="";

if (isset($_POST['user_id'])) {
    $user_id=isset($_POST['user_id'])?$_POST['user_id']:"";
    $query = "SELECT * FROM Users WHERE user_id='".$user_id."'";
    $result = mysqli_query($connection,$query);

    if (!$result)
        $text="Error. Please contact the administrator of the database.";
    else {
        $row_count = mysqli_num_rows($result);

        if ($row_count>=1) {
            $text="User found";  
            $_SESSION["user_id"] = $user_id;
        } else {
            $text="No user was found. Please try again."; 
        }
    }
    if (isset($_SESSION["user_id"])) {
        header("Location: homepage.php");
    }
}

?>

<html>
    <head>
        <title>User Login</title>
        <meta charset="UTF-8">
        <link href="./DevProject/resources/css/customer_login.css" type="text/css" rel="stylesheet">
    </head>
    <body class="container-wrapper">
        <div class="box">
            <form method="post" action="login.php">
                <div class="user-wrapper">
                    USER ID: <input class="input-box" type="varchar" name="user_id" placeholder="Enter User ID" ?>
                </div>
                <div>
                    <button class="button-wrapper" type="submit" value="submit">
                        Login </button>
                </div>
            </form>
        </div> 
        <?php
            echo $text;
        ?>
    </body>
</html>