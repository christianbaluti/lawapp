<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> <?php
            session_start(); // Start or resume the session

        
                echo $pagename;
            
            ?> - law consultancy</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/w3.css">
</head>

<body>
        <!--start of nav bar-->
        <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-app-indicator">
                        <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"></path>
                        <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                    </svg></span><span>law consultancy</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link <?php if ($pagename=='Home') {
                        // code...
                        echo "active";
                    } else {
                        // code...
                        echo 'hi';
                    }
                     ?>" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($pagename=='Services') {
                        // code...
                        echo "active";
                    } else {
                        // code...
                        echo 'hi';
                    } ?>" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($pagename=='About') {
                        // code...
                        echo "active";
                    } else {
                        // code...
                        echo 'hi';
                    } ?>" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($pagename=='FAQ') {
                        // code...
                        echo "active";
                    } else {
                        // code...
                        echo 'hi';
                    } ?>" href="faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($pagename=='Contacts') {
                        // code...
                        echo "active";
                    } else {
                        // code...
                        echo 'hi';
                    } ?>" href="contacts.php">Contacts</a></li>
                </ul><p> <?php 

                // Check if the user is logged in
                    if (isset($_SESSION['user_id'])) {
                        $user_email = $_SESSION['username'];
                        echo $user_email;
                        echo ' - <span> <a style="text-decoration: none!important; color: black;font-weight: bold;" href="logout.php"> Log Out</a> </span>';
                    }
                    else {
                        echo '<a class=" " style="text-decoration: none!important;" role="button" href="signup.php">Sign Up</a> <span>Or</span> <a class=" " style="text-decoration: none!important;" role="button" href="login.php">Log In</a>';
                    }
                    


                 ?> </p>
            </div>
        </div>
    </nav><!--end of nav bar-->