<html>
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Community Bank Database </title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body>
<div class="topnav">
        <a class="active" href="homepage.html">Home</a>
        <a href="new_advertisement.php">New Advertisement</a>
        <a href="logout.php">Logout</a>
    </div>
        
    </div>
    <div style="padding-left:16px">
        <h2>Create New Advertisement</h2>
        <form method="post" action="add_advertisement.php">
        <table>
                <tr><td>Title:</td><td><input type="varchar" name="ad_title"></td></tr>
                <tr><td>Details:</td><td><input type="varchar" name="ad_details"></td></tr>
                <tr><td>Date:</td><td><input type="timestamp" name="date"></td></tr>
                <tr><td>Price:</td><td><input type="decimal" name="price"></td></tr>
                <tr><td>Category:</td><td><input type="char" name="category_id"></td></tr>
                <tr><td>User Id:</td><td><input type="varchar" name="user_id"></td></tr>
                <tr><td>Moderator Id:</td><td><input type="varchar" name="moderator_id"></td></tr>
                <tr><td>Status Id:</td><td><input type="char" name="status_id"></td></tr>
                <tr><td><input type="submit" value="Submit"></td><td></td>
            </table>
        </form>
    
    </div>
</body>
</html>