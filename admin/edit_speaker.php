<?php
// Include your database connection file (config.php)
include 'config.php';

// Check if 'id' is set in the $_GET array
if (isset($_GET['id'])) {
    // Sanitize and assign the speaker ID
    $speaker_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Assuming you have a query to fetch speaker details based on the ID
    $sql = "SELECT * FROM speaker WHERE id = $speaker_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display a form for editing speaker details
        // ...
    } else {
        echo "Speaker not found!";
    }
} else {
    echo "Speaker ID is not provided.";
}

// Close the database connection
$conn->close();
?>
