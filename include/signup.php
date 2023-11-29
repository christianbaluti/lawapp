<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the signup form when the user submits it
    require 'config.php'; // You need to include a file with database connection details

    // Retrieve user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user input (you can add more validation as needed)
    if (empty($email) || empty($password)) {
        // Handle validation errors, for example, by redirecting back to the signup page
        header("Location: signup.php?error=emptyfields");
        exit();
    }

    // Check if the email is already in use
    $sql = "SELECT email FROM clientuser WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Handle email already in use, for example, by redirecting back to the signup page
        header("Location: signup.php?error=emailtaken");
        exit();
    }

    // Hash the password (you should use a strong password hashing method)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $sql = "INSERT INTO clientuser (email, clientpassword) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $hashedPassword);

    if ($stmt->execute()) {
        // Registration successful, you can redirect the user to a login page or a confirmation page
        header("Location: login.php?signup=success");
        exit();
    } else {
        // Handle database error, for example, by redirecting back to the signup page
        header("Location: signup.php?error=sqlerror");
        exit();
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
