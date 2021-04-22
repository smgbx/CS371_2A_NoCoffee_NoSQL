<?php
require_once 'connection.php';

$ad_title=isset($_POST['ad_title'])?$_POST['ad_title']:"";
$ad_details=isset($_POST['ad_details'])?$_POST['ad_details']:"";
$date=isset($_POST['date'])?$_POST['date']:"";
$price=isset($_POST['price'])?$_POST['price']:"";
$category_id=isset($_POST['category_id'])?$_POST['category_id']:"";
$user_id=isset($_POST['user_id'])?$_POST['user_id']:"";
$moderator_id=isset($_POST['moderator_id'])?$_POST['moderator_id']:"";
$status_id=isset($_POST['status_id'])?$_POST['status_id']:"";

$SQL = "INSERT INTO employees(advtitle, advdetails, advdatetime, price, category_id, user_id, moderator_id, status_id) VALUES(";
$SQL.="'".$ad_title."', '".$ad_details."', '".$date."', '".$price."', '".$category_id."', '".$user_id."', '".$moderator_id."', '".$status_id."')";
$result = mysqli_query($connection,$SQL);

if (!$result) //if the query fails
    die("Database access failed: " . mysqli_error($connection));
else
    echo("Connection successful");

$SQL.="'".$ad_title."', '".$ad_details."', '".$date."', '".$price."', '".$category_id."', '".$user_id."', '".$moderator_id."', '".$status_id."')";
    if($ad_title !=''&& $ad_details !='' && $date !=''&& $price !=''&& $category_id !=''&& $user_id !=''&& $moderator_id !=''&& $status_id !='')
    {
    header("Location:record_added_successfully.php");
    }
?>
