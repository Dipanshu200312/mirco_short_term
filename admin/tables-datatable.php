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
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Amount	</th>
                            <th>Payment_id	</th>
                            <th>Association</th>
                            <th>Gstin</th>
                            <th>Pincode</th>
                            <th>State	</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Created</th>






                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM user_form";
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
                                    <td>".$row['company']."</td>
                                    <td>".$row['amount']."</td>
                                 <td>".$row['payment_id']."</td>
                                    <td>".$row['association']."</td>
                                    <td>".$row['gstin']."</td>
                                    <td>".$row['pincode']."</td>
                                    <td>".$row['state']."</td>
                                    <td>".$row['city']."</td>
                                    <td>".$row['address']."</td>
                                     <td>".$row['created']."</td>



                                                                        
                                    
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