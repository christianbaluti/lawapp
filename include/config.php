<?php
$host = "localhost"; // Your MySQL server host (usually "localhost")
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password
$database = "lawapp"; // Your database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
