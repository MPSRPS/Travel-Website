<?php
// Check if form fields are set
if(isset($_POST['from'], $_POST['to'], $_POST['arrival_date'], $_POST['leaving_date'])) {
    // Retrieve form data
    $from_city = $_POST['from'];
    $to_city = $_POST['to'];
    $arrival_date = $_POST['arrival_date'];
    $leaving_date = $_POST['leaving_date'];

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "travel");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert data into the database
    $sql = "INSERT INTO bookings (from_city, to_city, arrival_date, leaving_date) VALUES ('$from_city', '$to_city', '$arrival_date', '$leaving_date')";

    if (mysqli_query($conn, $sql)) {
        echo "Booking saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close MySQL connection
    mysqli_close($conn);
} else {
    // Handle case when form fields are not set
    echo "Form fields are not set. Please fill out the form completely.";
}
?>
