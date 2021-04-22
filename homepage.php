<?php
include 'connection.php';

if(!session_id()) session_start();
//include("global.php");
$user_id = $_SESSION["user_id"];

//make an SQL statement and send it via the connection */
$query = "SELECT * FROM Advertisements WHERE user_id='".$user_id."'";
$result = mysqli_query($connection,$query);

if (!$result)
    die("Database access failed: " . mysqli_error($connection));

$row_count = mysqli_num_rows($result);

$html = "<tr>
            <th>Title</th>
            <th>Details</th>
            <th>Date</th>
            <th>Price</th>
            <th>Category ID</th>
            <th>Moderator ID</th>
            <th>Status ID</th>
        <tr>";


/*iterate through the result set*/
for ($j = 0; $j < $row_count; ++$j) {
    $row = mysqli_fetch_array($result);
    $html.="<tr><td>".$row["advtitle"]."</td><td>".$row["advdetails"]."</td><td>".$row["advdatetime"]."</td><td>".$row["price"]."</td><td>".$row["moderator_id"]."</td><td>".$row["category_id"]."</td><td>".$row["status_id"]."</td></tr>";
}
mysqli_close($connection);

?>

<html>
    <head>
        <link href="./resources/css/ads.css" type="text/css" rel="stylesheet">
        <link href="./resources/img/ads.JPG">
        <title>User Login</title>
    </head>
    <body>
        <div class="container">
            <div class="ad-wrapper">
                Welcome <?php echo $user_id ?> 
                <button id="logout" class="button-wrapper" type="submit" value="submit">Logout</button>
                <script type="text/javascript">
                    document.getElementById("logout").onclick = function () {
                        location.href = "/logout.php";
                    };
                </script>   
            </div>
            <div class="table-content">
                <h1>Advertisement</h1>
                <table>
                    <tr>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Category ID</th>
                    <th>Moderator_ID</th>
                    <th>Status_ID</th>
                    </tr>
                    
                    <?php
                        echo $row_count;
                    ?>
                
                </table>
            </div>
            <div >
                <input class="button-wrapper" onclick="document.location='./DevProject/adv_form.html'" type="button" value="ADD">
            </div>
        </div>
    </body>
</html>