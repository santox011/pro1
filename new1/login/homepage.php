<?php 
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div>
        <p>
            Hello 
            <?php 
            if (isset($_SESSION['Email'])) {
                $Email = $_SESSION['Email'];
                $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.Email = '$Email'");

                while ($row = mysqli_fetch_array($query)) {
                    echo htmlspecialchars($row['username']);
                }
            } else {
                echo "Guest";
            }
            ?>
        </p>
    </div>
</body>
</html>
