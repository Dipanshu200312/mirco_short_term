<?php

@include 'config.php';
session_start();
// Assuming $conn is your database connection

// Query to count the total number of entries in the 'user_form' table
$query = "SELECT COUNT(*) as total_entries FROM user_form";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalEntries = $row['total_entries']; 
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>




<head>
    <?php
    $title = "Dashboard";
    include 'partials/title-meta.php'; ?>

    <!-- Daterangepicker css -->
   

    <!-- Vector Map css -->
  

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
                   
                    
                    include 'partials/page-title.php'; ?>

                    <div class="row">
                        <div class="col-xxl-3 col-sm-4">
                            <div class="card widget-flat text-bg-pink">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="ri-eye-line widget-icon"></i>
                                    </div>
                                    <?php
@include 'config.php';

// Assuming $conn is your MySQLi database connection

// Query to count the total number of entries in the 'user_form' table
$query = "SELECT COUNT(*) as total_entries FROM user_form";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalEntries = $row['total_entries'];

    echo "<h6 class='text-uppercase mt-0' title='Customers'>Daily Visits</h6>";
    echo "<h2 class='my-2'>$totalEntries</h2>";
} 
?>

                                    <p class="mb-0">
                                        
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <?php
@include 'config.php';

// Assuming $conn is your MySQLi database connection

// Query to count the total number of entries in the 'speaker' table
$query = "SELECT COUNT(*) as total_entries FROM speaker";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalEntries = $row['total_entries'];
    
    // HTML structure
    echo '<div class="col-xxl-3 col-sm-4">';
    echo '    <div class="card widget-flat text-bg-purple">';
    echo '        <div class="card-body">';
    echo '            <div class="float-end">';
    echo '                <i class="ri-wallet-2-line widget-icon"></i>';
    echo '            </div>';
    echo '            <h6 class="text-uppercase mt-0" title="Speakers">Total Speakers</h6>';
    echo '            <h2 class="my-2">' . $totalEntries . '</h2>';
            
    echo '        </div>';
    echo '    </div>';
    echo '</div>';
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>


<?php
@include 'config.php';

// Assuming $conn is your MySQLi database connection

// Query to count the total number of entries in the 'exhibitor' table
$query = "SELECT COUNT(*) as total_entries FROM exhibitor";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalEntries = $row['total_entries'];
    
    // HTML structure
    echo '<div class="col-xxl-3 col-sm-4">';
    echo '    <div class="card widget-flat text-bg-purple">';
    echo '        <div class="card-body">';
    echo '            <div class="float-end">';
    echo '                <i class="ri-wallet-2-line widget-icon"></i>';
    echo '            </div>';
    echo '            <h6 class="text-uppercase mt-0" title="exhibitor">Total Exhibitor</h6>';
    echo '            <h2 class="my-2">' . $totalEntries . '</h2>';
            
    echo '        </div>';
    echo '    </div>';
    echo '</div>';
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

<?php
@include 'config.php';

// Assuming $conn is your MySQLi database connection

// Query to count the total number of entries in the 'exhibitor' table
$query = "SELECT COUNT(*) as total_entries FROM user_form";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalEntries = $row['total_entries'];
    
    // HTML structure
    echo '<div class="col-xxl-3 col-sm-12">';
    echo '    <div class="card widget-flat text-bg-purple">';
    echo '        <div class="card-body"style="
    background-color: aliceblue;
">';
    echo '            <div class="float-end">';
    echo '                <i class="ri-wallet-2-line widget-icon"></i>';
    echo '            </div>';
    echo '            <h6 class="text-uppercase mt-0" title="exhibitor"style="
    color: black;
">Total user and admin</h6>';
    echo '            <h2 class="my-2"style="
    color: black;
">' . $totalEntries . '</h2>';
    echo '            <canvas id="exhibitorChart" width="100" height="80"></canvas>';
    echo '        </div>';
    echo '    </div>';
    echo '</div>';

    // JavaScript to create the chart
    echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
    echo '<script>';
    echo 'var ctx = document.getElementById("exhibitorChart").getContext("2d");';
    echo 'var myChart = new Chart(ctx, {';
    echo '    type: "bar",';
    echo '    data: {';
    echo '        labels: ["user and admin"],';
    echo '        datasets: [{';
    echo '            label: "Total user and admin",';
    echo '            data: [' . $totalEntries . '],';
    echo '            backgroundColor: "rgba(75, 192, 192, 0.2)",';
    echo '            borderColor: "rgba(75, 192, 192, 1)",';
    echo '            borderWidth: 1';
    echo '        }]';
    echo '    },';
    echo '    options: {';
    echo '        scales: {';
    echo '            y: {';
    echo '                beginAtZero: true';
    echo '            }';
    echo '        }';
    echo '    }';
    echo '});';
    echo '</script>';
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>



                    
            <!-- content -->

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

  

    <!-- Apex Charts js -->


    <!-- Vector Map js -->

   

    <!-- Dashboard App js -->
  


    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>