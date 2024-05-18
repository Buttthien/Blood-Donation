<?php
session_start();
include('connect\connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello
        <?php
        if(isset($_SESSION['userName']))
        {
            $userName = $_SESSION['userName'];
            $query = mysqli_query($conn, "SELECT account.* FROM `account` WHERE account.userName='$userName'");

            while($row=mysqli_fetch_array($query))
            {
                echo $row['Private_Name'];
            }
        }
        ?>
    </h1>
    
</body>
</html>