<?php
$pagename = 'Sign Up';
require 'navbar_lawyer.php';

// Include the database connection file
require 'include/config.php';

// Initialize the email message variable
$emailMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM lawyeruser WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // Email is already taken
        $emailMessage = 'Email already taken by another user';
    } else {
        // Email is available, you can proceed with user registration

        // Hash the user's password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user's information into the database with the hashed password
        $insertUserQuery = "INSERT INTO lawyeruser (email, type, lawyerpassword) VALUES ('$email', '$type', '$hashedPassword')";
        if ($conn->query($insertUserQuery) === true) {
            // User registration successful, you can redirect to a success page
            header("Location: login_lawyer.php");
            exit();
        } else {
            // Registration failed, handle the error
            $emailMessage = 'Registration failed, please try again.';
        }
    }
}

?>

<section class="py-5">
    <div class="container py-5">
        <div class="row mb-4 mb-lg-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2">Sign up</p>
                <h2 class="fw-bold">Welcome</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body text-center d-flex flex-column align-items-center">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                            </svg></div>
                        <form method="post" action="signup_lawyer.php">
                            <div class="mb-3">
                                <input class="form-control" type="email" name="email" placeholder="Your email">
                                <?php if (!empty($emailMessage)): ?>
                                    <div class="text-danger"><?php echo $emailMessage; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <select  name="type"  class="form-control" placeholder="Your specific law field?">
                                    <option value="General">Your specific law field?</option>
                                    <option value="Real Estate Attorney">Real Estate Attorney</option>
                                    <option value="Criminal Attorney">Criminal Attorney</option>
                                    <option value="Family Lawyer">Family Lawyer</option>
                                    <option value="Personal Injury Lawyer">Personal Injury Lawyer</option>
                                    <option value="Employment Lawyer">Employment Lawyer</option>
                                </select>
                            </div>
                            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                            <div class="mb-3"><button class="btn btn-primary shadow d-block w-100" type="submit">Sign up</button></div>
                            <p class="text-muted">Already have an account?&nbsp;<a href="login_lawyer.php">Log in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
// Tabs
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" theVibe", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " theVibe";
}

// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();
</script>




    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>