<?php
session_start();
@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $fulldesc = $_POST['fulldesc'];

    // Upload image
    $targetDirectory = "uploads" . DIRECTORY_SEPARATOR;
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if $uploadOk is set to 0 by an error
    $imageFilename = basename($_FILES["image"]["name"]);
$targetFile = $targetDirectory . $imageFilename;

if (move_uploaded_file($_FILES["image"]["tmp_name"], str_replace('\\', '/', $targetFile))) {
    $image = $imageFilename;
    $sql = "INSERT INTO exhibitor (name, fulldesc, image) VALUES ('$name', '$fulldesc', '$image')";

    if ($conn->query($sql) === TRUE) {
      
		echo '<script>alert("exhibitor added successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
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
		<div class="row"style="
    margin-left: 325px;
    margin-top: 48px;
    margin-right: 96px;

">
		<h2>Exhibitors</h2>
		<!-- Styled Table Card-->
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				                    				<div class="card table-card">
					<div class="card-body"style="width: 93%";
  >
						<div class="modal-body">

							<form class="separate-form" method="post" action="add_exhibitor.php" enctype="multipart/form-data">
								<input type="hidden" name="id" value="">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
											<div class="form-group">
												<label for="member-name" class="col-form-label">Name</label>
												<input name="name"  class="form-control" type="text" value="" />
											</div>
										 </div>
										<!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
											<div class="form-group">
												<label for="member-name" class="col-form-label">Designation</label>
												<input name="fulldesc"  class="form-control" type="text" value="" />
											</div> 
										</div> -->
										<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
											<div class="form-group">
											<label for="image" class="col-form-label">Select Image:</label>
                                      <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
																								
											</div>
										</div>
									</div>
									<br>
									<div class="form-group">
										<label for="additional-msg" class="col-form-label">Descriptions</label>
										<textarea name="fulldesc" class="form-control" id="blogs_fulldes"></textarea>
									</div><br><br>
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















