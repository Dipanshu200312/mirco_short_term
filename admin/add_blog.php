<?php
session_start();
@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $meta_title = $_POST['meta_title']; // New field for meta title
    $meta_description = $_POST['meta_description']; // New field for meta description
    $fulldesc = $_POST['fulldesc'];

    // Check if image is uploaded
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Upload image
        $targetDirectory = "uploads" . DIRECTORY_SEPARATOR;
        $imageFilename = basename($_FILES["image"]["name"]);
        $targetFile = $targetDirectory . $imageFilename;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a valid image type
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $uploadOk = 0;
            echo "File is not an image.";
        }

        // Check file size (limit to 5MB)
        if ($_FILES["image"]["size"] > 5000000) {
            $uploadOk = 0;
            echo "Sorry, your file is too large.";
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], str_replace('\\', '/', $targetFile))) {
                $image_url = $imageFilename;

                // SQL query to insert blog data into the database
                $sql = "INSERT INTO blog (name, meta_title, meta_description, image, fulldesc) 
                        VALUES ('$name', '$meta_title', '$meta_description', '$image_url', '$fulldesc')";

                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("Blog added successfully!");</script>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No image file was uploaded or there was an error during the upload.";
    }

    $conn->close();
}
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

        <?php include 'partials/menu.php'; ?>

        <!-- Table Start -->
        <div class="row" style="margin-left: 325px; margin-top: 48px; margin-right: 96px;">
            <h2>Add Blog</h2>
            <!-- Styled Table Card-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card table-card">
                    <div class="card-body" style="width: 93%;">
                        <div class="modal-body">

                            <form class="separate-form" method="post" action="add_blog.php" enctype="multipart/form-data">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="name" class="col-form-label">Name</label>
                                                <input name="name" class="form-control" type="text" value="" required />
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="meta_title" class="col-form-label">Meta Title</label>
                                                <input name="meta_title" class="form-control" type="text" value="" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="form-group">
            <label for="meta_description" class="col-form-label">Meta Description</label>
            <textarea name="meta_description" class="form-control" required></textarea>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="form-group">
            <label for="image" class="col-form-label">Upload Image</label>
            <input name="image" class="form-control" type="file" required />
        </div>
    </div>
</div>


                                    <div class="form-group">
                                        <label for="fulldesc" class="col-form-label">Full Description</label>
                                        <textarea name="fulldesc" class="form-control" id="blogs_fulldes" required></textarea>
                                    </div>
                                    <br><br>
                                    <button type="submit" class="btn btn-primary">ADD</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'partials/footer.php'; ?>

    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

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
















