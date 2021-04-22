<?php
require_once 'connection.php';
if(!session_id()) session_start();
$user_id = $_SESSION["user_id"];

$ad_title=isset($_POST['ad_title'])?$_POST['ad_title']:"";
$ad_details=isset($_POST['ad_details'])?$_POST['ad_details']:"";
$date= date("Y-m-d");
$price=isset($_POST['price'])?$_POST['price']:"";
$price=floatval($price);
$category_id=isset($_POST['category_id'])?$_POST['category_id']:"";
$moderator_id=isset($_POST['moderator_id'])?$_POST['moderator_id']:"";
$status_id="PN";

$SQL = "INSERT INTO Advertisements(advtitle, advdetails, advdatetime, price, category_id, user_id, moderator_id, status_id) VALUES(";
$SQL.="'".$ad_title."', '".$ad_details."', '".$date."', '".$price."', '".$category_id."', '".$user_id."', '".$moderator_id."', '".$status_id."')";
$result = mysqli_query($connection,$SQL);

if (!$result) { //if the query fails
    die("Database access failed: " . mysqli_error($connection));
}
else
    header("Location:successful_new_ad.php");
?>
