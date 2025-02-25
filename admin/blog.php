<?php
// Include your database connection file (config.php)
include 'config.php';

// Check if 'id' is set in the $_GET array
if (isset($_GET['id'])) {
    // Sanitize and assign the blog ID
    $blog_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Assuming you have a query to delete the blog based on the ID
    $sql = "DELETE FROM blog WHERE id = $blog_id";
    $result = $conn->query($sql);

    if ($result) {
        
        echo '<script>alert("blog deleted successfully!");</script>';
    } else {
        echo "Error deleting blog: " . $conn->error;
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
                    
                <div class="container my-4">
                                    <a href="add_blog.php">
                                        <button type="button" class="btn btn-primary"
                                            style="margin-left: 30px;width: 179px;">Add New</button>
</a>
                                    </div>

                <?php
// Include your database connection file
include 'config.php';

// Fetch all blog posts
$sql = "SELECT * FROM blog";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table id='basic-datatable' class='table table-striped dt-responsive nowrap w-100'>
            <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                 <th>meta_title</th>
                  <th>meta_description</th>
                   <th>image</th>
                   <th>fulldesc</th>
                   <th>updated_at</th> 
                <th>created_at</th>  
                <th>Action</th>                                         
            </tr>
          </thead>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["name"]."</td>
                <td>".$row["meta_title"]."</td>
                 <td>".$row["meta_description"]."</td>
                 <td>".$row["image"]."</td>
                  <td>".substr($row["fulldesc"], 0, 100).(strlen($row["fulldesc"]) > 100 ? '...' : '')."</td>
                   <td>".$row["updated_at"]."</td>
                    <td>".$row["created_at"]."</td>
                    
                <td>
                    <a href='edit_blog.php?id=" . $row["id"] . "' class='btn btn-warning'>Edit</a>
                    <a href='blog.php?delete_id=" . $row["id"] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this blog post?\");'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Check if a blog post is requested to be deleted
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $sql = "DELETE FROM blog WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>Blog post deleted successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error deleting blog post: " . $conn->error . "</p>";
    }
}

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
                <script>
    $(document).ready(function () {
        // Delete button click event
        $('.btn-delete').on('click', function () {
            var blogId = $(this).data('id');
            // Confirm deletion
            if (confirm('Are you sure you want to delete this blog?')) {
                // Send an AJAX request to delete_blog.php
                $.ajax({
                    type: 'GET',
                    url: 'delete_blog.php?id=' + blogId,
                    success: function (response) {
                        // Reload the page after successful deletion
                        alert(response); // Display the response (for debugging)
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>


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















