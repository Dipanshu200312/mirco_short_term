<?php
// Include your database connection file
include 'config.php';

// Check if the form is submitted for updating a blog post
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $fulldesc = $_POST['fulldesc'];

    // Check if a new image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Handle image upload
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = "uploads/" . $image_name;

        // Move the uploaded file to the designated folder
        if (move_uploaded_file($image_tmp_name, $image_folder)) {
            $image = $image_name;
        } else {
            echo "<p style='color: red;'>Failed to upload image.</p>";
            exit;
        }
    } else {
        // If no new image is uploaded, retain the old image
        $image = $_POST['existing_image'];
    }

    $sql = "UPDATE blog SET name = ?, fulldesc = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $fulldesc, $image, $id);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>Blog post updated successfully!</p>";
        header("Location: blog.php"); // Redirect to blog.php after a successful update
        exit;
    } else {
        echo "<p style='color: red;'>Error updating blog post: " . $conn->error . "</p>";
    }
}

// Check if a blog post ID is passed for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM blog WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $blog = $result->fetch_assoc();
} else {
    echo "No blog post selected for editing.";
    exit;
}

$conn->close();
?>
<head>
    <?php
    $title = "Dashboard";
    include 'partials/title-meta.php'; ?>

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="assets/css/vendor/daterangepicker.css">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="assets/css/vendor/jquery-jvectormap-1.2.2.css">

    <?php include 'partials/head-css.php'; ?>
</head>

<body>
	
    <!-- Begin page -->
    <div class="wrapper">
        <?php include 'partials/left-sidebar.php'; ?>
        <!-- Table Start -->
		<div class="row"style="margin-left: 325px; margin-top: 48px; margin-right: 96px;">
		    <h2>Edit blog</h2>
		    <!-- Styled Table Card-->
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-card">
        <div class="card-body" style="width: 93%;">
            <div class="modal-body">
                <form class="separate-form" action="edit_blog.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
                    <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($blog['image']); ?>">
                    
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="member-name" class="col-form-label">Name</label>
                                <input name="name" class="form-control" type="text" value="<?php echo htmlspecialchars($blog['name']); ?>" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="additional-msg" class="col-form-label">Descriptions</label>
                        <textarea name="fulldesc" class="form-control" id="blogs_fulldes"><?php echo htmlspecialchars($blog['fulldesc']); ?></textarea>
                    </div>
                    
                    <!-- Adding more margin between the last input and button -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary" name="update" value="Update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


        <?php include 'partials/footer.php'; ?>
    </div>

    <?php include 'partials/right-sidebar.php'; ?>
    <?php include 'partials/footer-scripts.php'; ?>

    <!-- Daterangepicker js -->
    <script src="assets/js/vendor/moment.min.js"></script>
    <script src="assets/js/vendor/daterangepicker.js"></script>

    <!-- Apex Charts js -->
    <script src="assets/js/vendor/apexcharts.min.js"></script>

    <!-- Vector Map js -->
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Dashboard App js -->
    <script src="assets/js/pages/dashboard.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
</body>
</html>
