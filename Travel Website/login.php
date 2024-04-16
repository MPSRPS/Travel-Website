<?php
// Start session to persist user login state
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = ""; // Change this if your database password is different
    $dbname = "travel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get username and password from the form submission
    $username = $_POST['uname'];
    $password = $_POST['pwd'];

    // Validate username and password
    // To prevent SQL injection, use prepared statements
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
        $user = $result->fetch_assoc();
        if ($password === $user['password']) { // Directly compare passwords
            // Password is correct, log in the user
            $_SESSION['username'] = $username;
            // Redirect to a dashboard or home page 
            header("Location: index.html");
            exit;
        } else {
            // Password is incorrect
            echo "Incorrect password. Please try again.";
        }
    } else {
        // Username not found
        echo "Username not found. Please register.";
    }

    // Close database connection
    $conn->close();
}
?>
