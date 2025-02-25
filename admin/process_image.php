<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $fulldesc = $_POST['fulldesc'];

    // Upload image
    $targetDirectory = "uploads" . DIRECTORY_SEPARATOR;
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], str_replace('\\', '/', $targetFile))) {
            // Insert image details into the database
            $image = $targetFile;
            $sql = "INSERT INTO speaker (name, fulldesc, image) VALUES ('$name', '$fulldesc', '$image')";

            if ($conn->query($sql) === TRUE) {
                echo "Image added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>
