
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
       
        echo '<script>alert("Speaker deleted successfully!");</script>';
    } else {
        echo "Error deleting speaker: " . $conn->error;
    }
} 

// Close the database connection
$conn->close();
?>
<?php include 'partials/main.php'; ?>

<head>
    <?php
    $title = "Datatables";
    include 'partials/title-meta.php'; ?>

    <!-- Datatables css -->
    <link href="assets/css/vendor/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <?php include 'partials/head-css.php'; ?>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <?php include 'partials/menu.php'; ?>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <?php
                    $sub_title = "Tables";
                    $page_title = "Data Tables";
    include 'partials/page-title.php'; ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="container">
                                    <a href="add_speaker.php">
                                        <button type="button" class="btn btn-primary"
                                            style="margin-left: 30px;width: 179px;">Add New</button>
</a>
                                    </div>

                                    <div class="card-body">
                                        <hr>
                                        <?php
                            $sql = "SELECT * FROM speaker";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                    echo "  <table  id='basic-datatable' class='table table-striped dt-responsive nowrap w-100'>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                 
                                                <th>created</th>    
                                                <th>Action</th>                                       
                                            </tr>
                                        </thead>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>".$row["id"]."</td>
                                                    <td>".$row["name"]."</td>
                                                   
                                                    <td>".$row["created"]."</td>
                                                    <td>
               
                <a href='tbl_speaker.php?id=" . $row["id"] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this speaker?\");'>Delete</a>
            </td>
                                                    <!-- Add more cells based on your database schema -->
                                                  </tr>";
                                        }
                                    
                                        echo "</table>";
                                    
                                        // Store data in session
                                        $_SESSION['data'] = $result->fetch_all(MYSQLI_ASSOC);
                                    } else {
                                        echo "0 results";
                                    }
                                    
                                    // Close the database connection
                                    $conn->close();
                                    ?>





                                        </table>


                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div> <!-- end row-->




                        <?php include 'partials/footer.php'; ?>

                    </div>

                    <!-- ============================================================== -->
                    <!-- End Page content -->
                    <!-- ============================================================== -->

                </div>
                <!-- END wrapper -->

                <?php include 'partials/right-sidebar.php'; ?>

                <?php include 'partials/footer-scripts.php'; ?>

                <!-- Datatables js -->
                <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
                <script src="assets/js/vendor/dataTables.bootstrap5.min.js"></script>
                <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
                <script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
                <script src="assets/js/vendor/fixedColumns.bootstrap5.min.js"></script>
                <script src="assets/js/vendor/dataTables.fixedHeader.min.js"></script>
                <script src="assets/js/vendor/dataTables.buttons.min.js"></script>
                <script src="assets/js/vendor/buttons.bootstrap5.min.js"></script>
                <script src="assets/js/vendor/buttons.php5.min.js"></script>
                <script src="assets/js/vendor/buttons.flash.min.js"></script>
                <script src="assets/js/vendor/buttons.print.min.js"></script>
                <script src="assets/js/vendor/dataTables.keyTable.min.js"></script>
                <script src="assets/js/vendor/dataTables.select.min.js"></script>

                <!-- Datatable Demo Aapp js -->
                <script src="assets/js/pages/datatable.init.js"></script>

                <!-- App js -->
                <script src="assets/js/app.min.js"></script>

</body>

</html>















