<?php
// Function to create a new user
function createUser($username, $email, $password) {
    $user = [
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT) // Hash the password for security
    ];
    $userJson = json_encode($user);
    file_put_contents('users/' . $username . '.json', $userJson);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user already exists
    if (file_exists('users/' . $username . '.json')) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Create the user
        createUser($username, $email, $password);
        echo "User registration successful. You can now login.";
    }
}
?>
