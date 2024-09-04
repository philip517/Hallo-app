<?php
session_start();

// Include the database connection
require 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Prepare and execute SQL query
    $sql = "SELECT id, password FROM users WHERE username = :username";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        // Fetch the user record
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, start a session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            
            // Redirect to the home page
            header("Location: home.php");
            exit();
        } else {
            // Invalid username or password
            echo "Invalid username or password.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>