<?php

@include 'config.php';



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
        <div class="card-body">
            <button id="downloadExcel" class="btn btn-success mb-3">Download as Excel</button> <!-- Download Button -->
            <div class="table-responsive">
                <table id="basic-datatable" class="table table-striped table-bordered dt-responsive nowrap w-100">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>What was your favorite experience or moment of the event?</th>
                            <th>Did the event meet your expectations?</th>
                            <th>How likely would you attend our events in the future?</th>
                            <th>Why did you attend this  event?</th>
                            <th>How did you hear about this event ?</th>
                            <th>What was your biggest takeaway from the</th>
                            <th>What topics would you want to see more of a future event?</th>
                            <th>Which part of the event was most interesting to you?</th>
                            <th>How would you rate your overall experience at the event?</th>
                            <th>Message</th>
                            <th>Number of years of experience</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM feedback_form2";
                        $result = $conn->query($sql);
                        if (!$result) {
                            die("Query failed: " . $conn->error);
                        }
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$row['phone']."</td>
                                    <td>".$row['favorite_experience']."</td>
                                    <td>".$row['expectations_met']."</td>
                                    <td>".$row['likelihood_future_events']."</td>
                                    <td>".$row['reason_for_attendance']."</td>
                                    <td>".$row['how_heard_about_event']."</td>
                                    <td>".$row['biggest_takeaway']."</td>
                                    <td>".$row['how_heard_about_event']."</td>
                                    <td>".$row['most_interesting_part']."</td>
                                    <td>".$row['overall_experience_rating']."</td>
                                    <td>".$row['how_satisfied']."</td>
                                    <td>".$row['remark']."</td>
                                   
                                    
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='27'>No results found</td></tr>";
                        }

                        // Close the connection
                        $conn->close();
                        ?>                    </tbody>
                </table>
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
    <script>
document.getElementById('downloadExcel').addEventListener('click', function() {
    // Select the table element
    var table = document.getElementById('basic-datatable');
    
    // Convert the table to a worksheet
    var wb = XLSX.utils.table_to_book(table, {sheet: "Data"});
    
    // Create the Excel file and download it
    XLSX.writeFile(wb, 'UserData.xlsx');
});
</script>

    <!-- Datatables js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

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