<?php 

session_start(); // Start a session (if not already started)

// Check if the user is already logged in; if so, redirect them to a welcome page
if (isset($_SESSION['user_id'])) {
    header("Location: ../home.php"); // Replace 'welcome.php' with the page you want to redirect logged-in users to
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the login form submission
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Validate user input here (e.g., check if email and password match)

        // Assuming you have a database connection (db_connection.php), query the database to validate the user
        require 'config.php';

        // Sanitize user input
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $clientpassword = $_POST['password']; // Note: Password should be hashed in your database

        // Query your database to find the user based on their email
        $sql = "SELECT clientid, email, clientpassword FROM clientuser WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                // User found, verify the password
                $row = mysqli_fetch_assoc($result);
                if (password_verify($clientpassword, $row['clientpassword'])) {
                    // Password is correct; create a session
                    $_SESSION['user_id'] = $row['clientid'];
                    $_SESSION['username'] = $row['email'];

                    // Redirect to a welcome or dashboard page
                    header("Location: ../home.php"); // Replace 'welcome.php' with the page you want to redirect to after login
                    exit();
                } else {
                    $error = "Incorrect password. Please try again.";
                }
            } else {
                $error = "User not found. Please register or check your email.";
            }
        } else {
            $error = "Database error. Please try again later.";
        }

        // Close the database connection
        mysqli_close($conn);
    }
}

 ?>