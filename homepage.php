<?php
include 'connection.php';

if(!session_id()) session_start();
$user_id = $_SESSION["user_id"];

function displayAds($result)
{
    // Start a table, with column headers
    echo "\n<table>\n<tr>\n" .
        "\n\t<th>Title ID</th>" .
        "\n\t<th>Details</th>" .
        "\n\t<th>Date</th>" .
        "\n\t<th>Price</th>" .
        "\n\t<th>Category</th>" .
        "\n\t<th>Moderator ID</th>" .
        "\n\t<th>Status ID</th>" .
        "\n</tr>";

    // Until there are no rows in the result set,
    // fetch a row into the $row array and ...
    while ($row = @ mysqli_fetch_row($result))
    {
        // ... start a TABLE row ...
        echo "\n<tr>";

        // ... and print out each of the attributes
        // in that row as a separate TD (Table Data).
        foreach($row as $data)
        echo "\n\t<td> $data </td>";

        // Finish the row
        echo "\n</tr>";  
    }

    // Then, finish the table
    echo "\n</table>\n";
}

//make an SQL statement and send it via the connection */
$query = "SELECT advtitle, advdetails, advdatetime, price, category_id, moderator_id, status_id FROM Advertisements WHERE user_id='".$user_id."'";
$result = mysqli_query($connection,$query);

if (!$result)
    die("Database access failed: " . mysqli_error($connection));
?>


<html>
    <head>
        <link href="DevProject/resources/css/ads.css" type="text/css" rel="stylesheet">
        <link href="DevProject/resources/img/ads.JPG">
        <title>User Login</title>
    </head>
    <body>
        <div class="container">
            <div class="ad-wrapper">
                Welcome <?php echo $user_id ?> 
                <button class="button-logout-wrapper"><a href="logout.php">Logout</a></button>
            </div>
            <div class="table-content">
                <h1>Advertisements</h1>
                    <?php
                        // Display the results
                        displayAds($result);
                    ?>
            </div>
            <div>
                <input class="button-wrapper" onclick="document.location='add_advertisement.php'" type="button" value="ADD">
            </div>
        </div>
    </body>
</html>