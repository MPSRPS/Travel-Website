<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "travel");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch booking data from the database
$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<p>Booking ID: " . $row["id"]. " - From: " . $row["from_city"]. " - To: " . $row["to_city"]. " - Arrival Date: " . $row["arrival_date"]. " - Leaving Date: " . $row["leaving_date"]. "</p>";
        // You can customize this output based on your database structure
    }
} else {
    echo "<p>No bookings found.</p>";
}

// Close MySQL connection
mysqli_close($conn);
?>
