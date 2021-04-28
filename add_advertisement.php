<?php
require_once 'connection.php';
if(!session_id()) session_start();
$user_id = $_SESSION["user_id"];
?>

<html>
<head>
    <link href="DevProject/resources/css/adv_form.css" type="text/css" rel="stylesheet">
  <title>Create Advertisement</title>
</head>
<body class="container-wrapper">
    <div class="container">
        <div class="ad-wrapper">
            Welcome <?php echo $user_id ?>
            <button class="button-logout-wrapper"><a href="logout.php">Logout</a></button>   
        </div>
    </div>
    <div class="box">
        <div class="box-elements" > 
            <form method="post" action="submit_new_ad.php">
                <h1 class="form-title"> Create Advertisement</h1>
                <p>

                <label class="boxes">
                    AdvTitle: 
                </label><br>
                <input type="varchar" name="ad_title"><br><br>

                <label class="boxes">
                    AdvDetails: 
                </label><br>
                <input type="varchar" name="ad_details"><br><br>

                <label class="boxes">
                    Category: 
                </label><br>
                <select name="category_id">
                    <option type="varchar" value="CAT">Cars and Trucks</option>
                    <option type="varchar" value="HOU">Housing</option>
                    <option type="varchar" value="ELC">Electronics</option>
                    <option value="CCA">Child Care</option>
                </select><br><br>

                <label class="boxes">
                    Price: 
                </label><br>
                <input type="decimal(6,2)" name="price"><br><br>

                <label class="boxes">
                    Moderator: 
                </label><br>
                <select name="moderator_id">
                    <option type="varchar" value="Jsmith">Jessie Smith</option>
                    <option type="varchar" value="Ajackson">Antonio Jackson</option>
                    <option type="varchar" value="">None</option>
                </select>
                </p>

                <label class="boxes">
                    Date: <?php echo date("m-d-Y");?>
                </label><br>

            <div>
                <input class="button-wrapper2" type="submit" value="SUBMIT">
            </div>
            </form>
            <button class="button-wrapper2"><a href="homepage.php">Back to homepage</a></button>
    </div>
</body>
</html>
