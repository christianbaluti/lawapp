<?php
require 'config.php';
session_start();


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize variables to store form data
    $caseName = '';
    $caseDescription = '';
    
    // Check if caseName and caseDescription are set and not empty
    if (isset($_POST['caseName']) && isset($_POST['caseDescription']) && !empty($_POST['caseName']) && !empty($_POST['caseDescription'])) {
        // Sanitize user input to prevent SQL injection
        $caseName = mysqli_real_escape_string($conn, $_POST['caseName']);
        $caseDescription = mysqli_real_escape_string($conn, $_POST['caseDescription']);
        
        // Get the current date
        $currentDate = date('Y-m-d');
        
        // Replace 'client_id' with the actual client ID, which you should obtain from your session
        $clientID = $_SESSION['user_id']; // Update the key as per your session structure
        
        // SQL query to insert a new case
        $sql1 = "INSERT INTO cases (name, description, startdate, clientid) VALUES ('$caseName', '$caseDescription', '$currentDate', $clientID)";
        
        // Execute the query
        if (mysqli_query($conn, $sql1)) {
            // Case added successfully
            header("Location: ../home.php");
            exit();
        } else {
            // Error in case insertion
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Handle form validation errors (e.g., empty fields)
        echo "Please fill in all required fields.";
    }
}
?>
