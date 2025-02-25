<?php
// Include your database connection file (config.php)
include 'config.php';

// Check if 'id' is set in the $_GET array
if (isset($_GET['id'])) {
    // Sanitize and assign the speaker ID
    $speaker_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Assuming you have a query to delete the speaker based on the ID
    $sql = "DELETE FROM speaker WHERE id = $speaker_id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Speaker deleted successfully!";
    } else {
        echo "Error deleting speaker: " . $conn->error;
    }
} else {
    echo "Speaker ID is not provided.";
}

// Close the database connection
$conn->close();
?>
