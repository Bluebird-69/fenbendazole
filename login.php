<?php
session_start();

// Dummy user data (replace this with your actual user data)
$users = [
    ['email' => 'user1@example.com', 'password' => '$2y$10$ZP09B8lkuPqAsBbyD0K.0ulm1Fi7p3Jzhv8pwx2aGK4r6cFlFqMiS'], // Password is 'password1'
    ['email' => 'user2@example.com', 'password' => '$2y$10$A78Ft5T6fT2U4aBCPI1OOO5CwOCv3rZQ7mYz7T.Rgi2.e.EQbpjAa'], // Password is 'password2'
];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Find user by email
    $user = array_filter($users, function($u) use ($email) {
        return $u['email'] == $email;
    });

    if (count($user) > 0) {
        $user = reset($user); // Get the first user matching the email

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct
            $_SESSION['email'] = $user['email']; // Store user email in session
            header("Location: dashboard.php"); // Redirect to dashboard or another authorized page
            exit;
        } else {
            // Password is incorrect
            header("Location: login.html?error=invalid_credentials");
            exit;
        }
    } else {
        // User not found
        header("Location: login.html?error=user_not_found");
        exit;
    }
}
?>
