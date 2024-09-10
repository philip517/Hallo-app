<?php

session_start();
require "config/conn.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize it
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_EMAIL);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_EMAIL);


    // Prepare SQL query to insert data
    $sql = "INSERT INTO website (name,url,description,password) VALUES (:name, :url,:description,:password)";

    try {
        // Prepare and execute the statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':password', $password);

        // Execute the statement
        $stmt->execute();
        $_SESSION['msg'] =  "Data successfully inserted!";
        header("Location: home.php");

    } catch (PDOException $e) {
        $_SESSION['msg'] = "Error: " . $e->getMessage();
        header("Location: home.php");
    }
} else {
    echo "Invalid request method.";
}
?>