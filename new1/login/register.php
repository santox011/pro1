<?php
include 'connect.php'; // Fixed 'Include' to 'include' (PHP is case-sensitive)

// Check if 'Sign up' button was clicked
if (isset($_POST['Sign up'])) { 
    $username = $_POST['username']; // Fixed $_post to $_POST (case-sensitive)
    $Email = $_POST['Email'];       // Same fix for $_POST
    $password = $_POST['password'];
    $password = md5($password);     // Encrypt password with md5

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE Email = '$Email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Email Address Already Exists";
    } else {
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (username, Email, password)
                        VALUES ('$username', '$Email', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            header("Location: index1.php");
            exit(); // Add exit to stop further code execution
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Check if 'Login' button was clicked
if (isset($_POST['Login'])) {
    $Email = $_POST['Email'];
    $password = $_POST['password'];
    $password = md5($password); // Encrypt password with md5

    // Verify credentials
    $sql = "SELECT * FROM users WHERE Email = '$Email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['Email'] = $row['Email'];
        header("Location: homepage.php");
        exit();
    } else {
        echo "Invalid Email or Password";
    }
}
?>
